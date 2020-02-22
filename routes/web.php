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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','WelcomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','admin']], function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-register','Admin\DashboardController@registerd');
    Route::get('/role-edit/{id}','Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
    Route::delete('/role-delete/{id}','Admin\DashboardController@registerdelete');

    Route::get('/posts','Admin\PostController@index');
    Route::post('/save-posts','Admin\PostController@store');
    Route::get('/post-edit/{id}','Admin\PostController@edit');
    Route::put('/post-update/{id}','Admin\PostController@update');
    Route::delete('/post-delete/{id}','Admin\PostController@destroy');

});

Route::get('/post/create', 'User\PostController@create')->name('post.create');
Route::post('/post/store', 'User\PostController@store')->name('post.store');
Route::get('/post', 'User\PostController@index')->name('posts');
Route::get('/post/show/{id}', 'User\PostController@show')->name('post.show');
Route::get('/userpost', 'User\PostController@shows')->name('userpost.shows');
Route::delete('/userpost-delete/{id}','User\PostController@destroy');


//Route::post('/comment/store', 'User\CommentController@store')->name('comment.add');
Route::resource('comments', 'User\\CommentController');

