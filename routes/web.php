<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tweets', 'TweetController@index')->name('tweets.index');
Route::get('/tweets/create', 'TweetController@create')->name('tweets.create');
Route::post('/tweets', 'TweetController@store')->name('tweets.store');
Route::get('/tweets/{id}', 'TweetController@show')->name('tweets.show');
Route::get('/tweets/{id}/edit', 'TweetController@edit')->name('tweets.edit');
Route::put('/tweets/{id}', 'TweetController@update')->name('tweets.update');
Route::delete('/tweets/{id}', 'TweetController@destroy')->name('tweets.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/{id}/profile', 'UserProfileController@show')->name('user_profile.show');
    Route::get('user/{id}/profile/edit', 'UserProfileController@edit')->name('user_profile.edit');
    Route::put('user/{id}/profile', 'UserProfileController@update')->name('user_profile.update');
});


Route::get('/tweets/{id}/hashtags', 'TweetController@showByHashtag')->name('hash_tags.tweets');