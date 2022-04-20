<?php

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

Route::get('/', 'MicropostsController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow'); //フォローする
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow'); //アンフォローする
        Route::get('followings', 'UsersController@followings')->name('users.followings'); //ユーザがフォローしているユーザ一覧の表示
        Route::get('followers', 'UsersController@followers')->name('users.followers'); //ユーザをフォローしているユーザ(フォロワー)一覧の表示
    });

    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]); //ユーザ一覧、ユーザ詳細（UsersController）
    
    Route::group(['prefix' => 'microposts/{id}'], function () { //「/microposts/{id}/」が付与されたURLで値を渡す
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite'); //favoriteする
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite'); //unfavoriteする
        Route::get('favorites', 'UsersController@favorites')->name('favorites.favorites'); //favorite一覧の表示
    });
    
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]); //投稿操作
});


