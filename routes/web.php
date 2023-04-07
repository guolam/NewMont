<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::prefix('tweet')->group(function () {
        Route::get('search/input', [SearchController::class, 'create'])->name('search.input');
        Route::get('search/result', [SearchController::class, 'index'])->name('search.result');
        Route::get('search/select', [SearchController::class, 'select'])->name('search.select');
        Route::get('timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');
        Route::get('mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
        Route::get('select', [TweetController::class, 'select'])->name('tweet.select');
    });

    Route::resource('tweet', TweetController::class);

    Route::prefix('user/{user}')->group(function () {
        Route::get('/', [FollowController::class, 'show'])->name('follow.show');
        Route::post('follow', [FollowController::class, 'store'])->name('follow');
        Route::post('unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    });

    Route::prefix('tweet/{tweet}')->group(function () {
        Route::post('favorites', [FavoriteController::class, 'store'])->name('favorites');
        Route::post('unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
    });

    Route::get('mygroup', [UserController::class, 'show'])->name('users.show');
    
    Route::resource('group', GroupController::class)->except(['edit', 'update']);
    // Route::get('group/show/{id}', [GroupController::class, 'show'])->name('group.show');
    Route::get('group/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('group/update/{id}', [GroupController::class, 'update'])->name('group.update');

    Route::resource('groupcontent', GroupContentController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
    Route::prefix('groupcontent/{group_id}')->group(function () {
        Route::get('create', [GroupContentController::class, 'create'])->name('groupcontent.create');
        Route::post('store', [GroupContentController::class, 'store'])->name('groupcontent.store');
        Route::get('edit/{id}', [GroupContentController::class, 'edit'])->name('groupcontent.edit');
        Route::put('update/{id}', [GroupContentController::class, 'update'])->name('groupcontent.update');
        Route::delete('delete/{id}', [GroupContentController::class, 'destroy'])->name('groupcontent.destroy');
    });

    Route::resource('group_requests', GroupRequestController::class)->only(['index', 'create', 'store']);
    Route::prefix('group_requests/{id}')->group(function () {
        Route::post('approve', [GroupRequestController::class,'approve'])->name('group_requests.approve');
    Route::post('reject', [GroupRequestController::class, 'reject'])->name('group_requests.reject');
});
});

// Routes accessible without authentication 認証なくてもOK
Route::prefix('search')->group(function () {
Route::get('{perfecture}', [SearchController::class, 'search'])->name('search');
Route::get('result/{id}', [SearchController::class, 'show'])->name('search.result.detail');
});

Route::get('groupcontent/showdetail/{id}', [GroupContentController::class, 'showdetail'])->name('groupcontent.showdetail');
Route::get('tweetshow/{id}', [TweetController::class, 'show'])->name('tweet.showopen');

Route::get('/', function () {
return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'verified'])->group(function () {
Route::get('dashboard', [TweetController::class, 'index'])->name('dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

});

require __DIR__.'/auth.php';