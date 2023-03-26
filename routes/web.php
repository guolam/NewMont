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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
    Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');
    Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
    Route::resource('tweet', TweetController::class);
    // Route::resource('group', GroupController::class);
    // Route::resource('groupmembership', GroupMembershipRequestController::class);
    
    Route::get('/mypage', [UserController::class, 'show'])->name('users.show');
    
    Route::resource('group', GroupController::class)->only(['index', 'create', 'store']);
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('group.show');
    
    
    // Route::get('/groupcontent/create', [GroupContentController::class,'create'])->name('groupcontent.create');
    Route::get('/groupcontent/', [GroupContentController::class, 'index'])->name('groupcontent.index');
    // Route::resource('groupcontent', GroupContentController::class);
    Route::get('/groupcontent/create/{group_id}', [GroupContentController::class, 'create'])->name('groupcontent.create');
    Route::post('/groupcontent/store/{group_id}', [GroupContentController::class, 'store'])->name('groupcontent.store');
    // Route::get('/groupcontent/{group_content_id}', [GroupContentController::class, 'show'])->name('groupcontent.show');
    Route::get('/groupcontent/{group_id}', [GroupContentController::class, 'show'])->name('groupcontent.show');
    

    Route::resource('group_requests', GroupRequestController::class)->only(['index', 'create', 'store']);
    
    Route::post('/group_requests/{id}/approve', [GroupRequestController::class, 'approve'])->name('group_requests.approve');
    Route::post('/group_requests/{id}/reject', [GroupRequestController::class, 'reject'])->name('group_requests.reject');
    
});


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
