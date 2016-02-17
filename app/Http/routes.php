<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Route::controllers([
//     'auth' => 'Auth\AuthController',
//     'password' => 'Auth\PasswordController'
// ]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Pages routes
Route::get('/', ['as' => 'index', 'uses' => 'PagesController@getIndex']);
Route::get('mail', ['as' => 'mail', 'uses' => 'PagesController@getMail']);

// Users
Route::get('users/edit', 'UsersController@edit');
Route::patch('users/{users}', 'UsersController@update');

// Articles
Route::resource('articles', 'ArticlesController');


// Tags
Route::get('tags/{tags}', 'TagsController@show');

// Route::get('articles', 'ArticlesController@index');
// Route::get('articles/{id}', 'ArticlesController@show')->where('id', '[0-9]+');
// Route::get('articles/{id}/edit', 'ArticlesController@edit')->where('id', '[0-9]+');
// Route::get('articles/create', 'ArticlesController@create');
// Route::post('articles', 'ArticlesController@store');

// Api v1
Route::group(['prefix' => 'api/v1', 'as' => 'api.v1::'], function () {
    Route::get('tags', ['as' => 'tags', function () {
       return App\Tag::all();
    }]);

    Route::post('articles/generate-slug', [
        'as' => 'articles.generate-slug',
        'uses' =>'api\v1\ArticlesController@postGenerateSlug'
    ]);
});

// Dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard::'], function () {
    Route::get('/', ['as' => 'index', function () {
        return 'dashboard';
    }]);

    Route::get('/users', function () {
        return 'all users';
    });
});

// Event
get('broadcast', function () {
    event(new App\Events\UserHasRegistered('lol'));
    return 'broadcast';
});
