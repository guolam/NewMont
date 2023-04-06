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
    // コンテンツのsearch
    Route::get('/tweet/search/input', [SearchController::class, 'create'])->name('search.input');
    Route::get('/tweet/search/result', [SearchController::class, 'index'])->name('search.result');
    
    //まだ使ってない。
    Route::get('/tweet/timeline', [TweetController::class, 'timeline'])->name('tweet.timeline');
    
    // ユーザーのサイト (ソロの場合)
    Route::get('user/{user}', [FollowController::class, 'show'])->name('follow.show');
    Route::post('user/{user}/follow', [FollowController::class, 'store'])->name('follow');
    Route::post('user/{user}/unfollow', [FollowController::class, 'destroy'])->name('unfollow');
    Route::post('tweet/{tweet}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('tweet/{tweet}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
    Route::get('/tweet/mypage', [TweetController::class, 'mydata'])->name('tweet.mypage');
    Route::resource('tweet', TweetController::class);
    
    //ソロ用の選択タグ
    
    Route::get('/select', [TweetController::class, 'select'])->name('tweet.select');
    
    // 所属グループ
    Route::get('/mygroup', [UserController::class, 'show'])->name('users.show');
    
    // グループ
    // Route::resource('group', 'App\Http\Controllers\GroupController');
    Route::resource('group', GroupController::class)->only(['index', 'create', 'store']);
    Route::get('/group/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
    Route::put('/group/update/{id}', [GroupController::class, 'update'])->name('group.update');
    // Route::put('/group/update/{group}', [GroupController::class, 'update'])->name('group.update');
    Route::get('/groups/{group}', [GroupController::class, 'show'])->name('group.show');
    
    // グループ内のコンテンツ
    // Route::resource('/groupcontent/', GroupContentController::class);
    Route::get('/groupcontent/', [GroupContentController::class, 'index'])->name('groupcontent.index');
    //編集画面
    // Route::get('/groupcontent/edit/{id}', [GroupContentController::class, 'edit'])->name('groupcontent.edit');
    Route::get('/groupcontent/{group_id}/edit/{id}', [GroupContentController::class, 'edit'])->name('groupcontent.edit');
    //更新処理
    // Route::put('/groupcontent/update/{id}', [GroupContentController::class, 'update'])->name('groupcontent.update');
    Route::put('/groupcontent/update/{id}', [GroupContentController::class, 'update'])->name('groupcontent.update');
    
    // Route::put('/groupcontent/update/{id}', [GroupContentController::class, 'update'])->name('groupcontent.update');
    Route::delete('/groupcontent/delete/{id}', [GroupContentController::class, 'destroy'])->name('groupcontent.destroy');
    // Route::get('/groupcontent/show/{group_id}', [GroupContentController::class, 'show'])->name('groupcontent.show');
   
    
    Route::get('/groupcontent/create/{group_id}', [GroupContentController::class, 'create'])->name('groupcontent.create');
    Route::post('/groupcontent/store/{group_id}', [GroupContentController::class, 'store'])->name('groupcontent.store');
    Route::get('/groupcontent/{group_id}', [GroupContentController::class, 'show'])->name('groupcontent.show');
    Route::get('/groupcontent/update/{group_id}', [GroupContentController::class, 'update'])->name('groupcontent.update');
    // Route::get('/groupcontent/showdetail/{id}', [GroupContentController::class, 'showdetail'])->name('groupcontent.showdetail');

    // リクエスト処理
    Route::resource('group_requests', GroupRequestController::class)->only(['index', 'create', 'store']);
    Route::post('/group_requests/{id}/approve', [GroupRequestController::class, 'approve'])->name('group_requests.approve');
    Route::post('/group_requests/{id}/reject', [GroupRequestController::class, 'reject'])->name('group_requests.reject');

  
});

//ログインしなくても見られる
//地名から検索
Route::get('/search/{perfecture}', [SearchController::class, 'search'])->name('search');

Route::get('/search/result/{id}', [SearchController::class, 'show'])->name('search.result.detail');

Route::get('/groupcontent/showdetail/{id}', [GroupContentController::class, 'showdetail'])->name('groupcontent.showdetail');
Route::get('/tweetshow/{id}', [TweetController::class, 'show'])->name('tweet.showopen');

Route::get('/', function () {
    return view('welcome');
    })->name('welcome');

Route::get('/dashboard', [TweetController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// プロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
