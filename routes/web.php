<?php

use Illuminate\Support\Facades\Route;

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

Route::namespace('Web')->group(function () { 
    Route::get('/', 'HomeController@index')->name('home'); 
    
    /***************user  login related routes***********/
    Route::get('/login', 'LoginController@login')->name('user-login');
    Route::post('/login', 'LoginController@authenticate')->name('login-authenticate');
    Route::get('/logout', 'LoginController@logout')->name('user-logout');

    /***************user  login related routes***********/
    Route::get('/timeline', 'TimelineController@index')->name('timeline'); 

    Route::get('/profile/{user_id}', 'ProfileController@index')->name('profile');
     
    Route::get('/discover-members', 'ProfileController@suggestions')->name('discover_members');
    Route::get('/follow/{user_id}', 'FollowController@follow')->name('follow');
    
    Route::get('/accept_follow/{notification_from}/{notification_id}', 'FollowController@accept_follow')->name('accept_follow');
    
    Route::post('/save-post-text', 'PostController@save_text_post')->name('add_post_text'); 
    Route::post('/save-post-image', 'PostController@save_image_post')->name('add_post_image');
    Route::post('/save-post-video', 'PostController@save_video_post')->name('add_post_video');

    
    Route::post('/save-comment', 'PostController@save_comment')->name('post_comment');
    
    Route::get('/share-post', 'PostController@share_post')->name('share_post');
    Route::get('/react-post', 'PostController@react_post')->name('react_post');
    
    Route::post('/edit-profile', 'ProfileController@save_profile')->name('edit_profile'); 
    Route::post('/edit-profile-post', 'ProfileController@save_profile1')->name('edit_profile_post');



    /***************user registration    related routes***********/
    Route::get('/signup', 'LoginController@register')->name('user-register');
    Route::post('/save-user', 'LoginController@save_user')->name('save-user');
    Route::get('checkEmail','LoginController@check_email')->name('checkEmail');
    Route::post('reply/comment', 'PostController@replyComment');
});
//Route::get('/login', 'LoginController@login')->name('admin-login');


////  admin routings
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    
    Route::get('/dashboard', 'DashboardController@index')->name('admin-dashboard');


    /*************User Management routes********************/
    Route::get('/users', 'UserController@index')->name('manage-users');
    Route::get('/add-user', 'UserController@add_user')->name('add-user');
    Route::post('/add-user', 'UserController@save_user')->name('save-user-admin');
    Route::get('/delete-user/{user_id}', 'UserController@delete_user')->name('delete-user');
    Route::get('/edit-user/{user_id}', 'UserController@edit_user')->name('edit-user');
    Route::get('/user-status/{user_id}', 'UserController@change_status')->name('change_user_status');


       /*************Post Management routes********************/
    Route::get('/posts', 'PostController@index')->name('manage-posts');
    Route::get('/delete-post/{post_id}', 'PostController@delete_post')->name('delete-post');
    Route::get('/post-status/{post_id}', 'PostController@change_status')->name('change_post_status');



    /************admin login related routes*********/
    Route::get('/', 'LoginController@login')->name('admin-login');
    Route::get('/login', 'LoginController@login')->name('admin-login');
    Route::post('/login', 'LoginController@authenticate')->name('admin-login');
    Route::get('/logout', 'LoginController@logout')->name('admin-logout');
  
 
});
