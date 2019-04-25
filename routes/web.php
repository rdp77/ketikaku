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


   // Route::post('login', 'Auth\loginController@authenticate');

// Route::group(['middleware' => 'guest'], function () {



   // homw front end welcome
   Route::get('/', 'welcomeController@data_all')->name('data_all');
   Route::get('/welcome/comment_ajax', 'welcomeController@comment_ajax')->name('welcome_comment_ajax');
   Route::get('/welcome/tnc', 'welcomeController@tnc')->name('welcome_tnc');


//FRONT END
   // profile front end
   Route::get('/profile/{name}', 'frontend\profile\profileController@profile')->name('profile_frontend');   
   Route::get('/comment', 'frontend\profile\profileController@comment')->name('comment_frontend');
   Route::get('/follow', 'frontend\profile\profileController@follow')->name('follow_frontend');
   Route::get('/comment_reply', 'frontend\profile\profileController@comment_reply')->name('comment_reply_frontend');
   Route::get('/following', 'frontend\profile\profileController@following')->name('profile_following_frontend');   
   Route::get('/novel', 'frontend\profile\profileController@novel')->name('profile_novel_frontend');   
   Route::get('/followers', 'frontend\profile\profileController@followers')->name('profile_followers_frontend');   
   Route::get('/subscribing', 'frontend\profile\profileController@subscribing')->name('profile_subscribing_frontend');   

// FRONT END NOVEL
// BOOK
   Route::get('/book/{id}/{name}', 'novel_frontend\bookController@book')->name('frontend_book');
   Route::get('/novel_rate_star', 'novel_frontend\bookController@novel_rate_star')->name('novel_rate_star');
   Route::get('/novel_rate_reply', 'novel_frontend\bookController@novel_rate_reply')->name('novel_rate_reply');
   Route::get('/subscribe', 'novel_frontend\subscribeController@subscribe')->name('subscribe_novel');
   Route::get('/like', 'novel_frontend\likeController@like')->name('like_novel');
   //search novel 
   Route::get('/novel_load_more/{type}', 'novel_frontend\bookController@load_more')->name('load_more');
   // load more Novel
// CHAPTER
   Route::get('/chapter/{creator}/{name}/{id}', 'novel_frontend\chapterController@chapter')->name('frontend_chapter');
   Route::post('/chapter/viewer/{id}', 'novel_frontend\chapterController@viewer')->name('frontend_chapter_viewer');
   Route::get('/chapter_novel_comment', 'novel_frontend\chapterController@chapter_novel_comment')->name('frontend_chapter_novel_comment');
   Route::get('/chapter_novel_comment_reply', 'novel_frontend\chapterController@chapter_novel_comment_reply')->name('frontend_chapter_novel_comment_reply');
//BACKEND 

   // forgot passsword
   Route::get('/forgot_password/page_email', 'frontend\forgot_password\forgot_passwordController@page_email')->name('forgot_password_page_email');
   Route::get('/forgot_password/send_email', 'frontend\forgot_password\forgot_passwordController@send_email')->name('forgot_password_send_email');
   Route::get('/forgot_password/page_reset_password/{token}/{id}', 'frontend\forgot_password\forgot_passwordController@page_reset_password')->name('forgot_password_page_reset_password');
   Route::post('/forgot_password/send_reset_password', 'frontend\forgot_password\forgot_passwordController@send_reset_password')->name('forgot_password_send_reset_password');

Auth::routes();

// Route::group(['middleware' => 'auth'], function () {
//HOME
   Route::get('/home', 'HomeController@index')->name('home');
   Route::get('/notification/notif_bell', 'backend\notif\notificationController@notif_bell')->name('notif_bell');
   Route::get('/verify/{token}/{id}', 'mail\verify_emailController@verify_email')->name('verify_email');
   Route::get('/verified/{token}/{id}', 'mail\verify_emailController@verified_email')->name('verified_email');

//MASTER
   Route::get('/profile_detail/{id}', 'backend\profile\profileController@profile')->name('profile_backend');
   Route::get('/master/master_user/update', 'backend\master\master_userController@update')->name('master_user_update');
   Route::get('/master/master_user/update_sosmed', 'backend\master\master_userController@update_sosmed')->name('master_user_update_sosmed');
   Route::post('/master/master_user/update_image', 'backend\master\master_userController@update_image')->name('master_user_image_update');

   Route::get('/editor/approve_novel', 'backend\editor\approve_novelController@index')->name('approve_novel');
   Route::get('/editor/approve_novel/edit/{id}', 'backend\editor\approve_novelController@edit')->name('approve_novel_edit');
   Route::post('/editor/approve_novel/update', 'backend\editor\approve_novelController@update')->name('approve_novel_update');
   Route::get('/editor/approve_novel/delete/{id}', 'backend\editor\approve_novelController@delete')->name('approve_novel_delete');
   Route::get('/editor/approve_novel/official/{id}', 'backend\editor\approve_novelController@official')->name('approve_novel_official');

   Route::get('/editor/approve_chapter', 'backend\editor\approve_chapterController@index')->name('approve_chapter');
   Route::get('/editor/approve_chapter/edit/{id}', 'backend\editor\approve_chapterController@edit')->name('approve_chapter_edit');
   Route::post('/editor/approve_chapter/update/{id}', 'backend\editor\approve_chapterController@update')->name('approve_chapter_update');
   Route::get('/editor/approve_chapter/delete/{id}', 'backend\editor\approve_chapterController@delete')->name('approve_chapter_delete');

   Route::get('/write/write_novel', 'write\write_novelController@index')->name('write_novel');
   Route::get('/write/write_novel/create', 'write\write_novelController@create')->name('write_novel_create');
   Route::post('/write/write_novel/save', 'write\write_novelController@save')->name('write_novel_save');
   Route::get('/write/write_novel/edit/{id}', 'write\write_novelController@edit')->name('write_novel_edit');
   Route::post('/write/write_novel/update', 'write\write_novelController@update')->name('write_novel_update');
   Route::get('/write/write_novel/delete/{id}', 'write\write_novelController@delete')->name('setting_novel_delete');

   Route::get('/write/write_chapter/{id}', 'write\write_chapterController@index')->name('write_chapter');
   Route::get('/write/write_chapter/create/{id}', 'write\write_chapterController@create')->name('write_chapter_create');
   Route::post('/write/write_chapter/save/{id}', 'write\write_chapterController@save')->name('write_chapter_save');
   Route::get('/write/write_chapter/edit/{id}', 'write\write_chapterController@edit')->name('write_chapter_edit');
   Route::post('/write/write_chapter/update/{id}', 'write\write_chapterController@update')->name('write_chapter_update');
   Route::get('/write/write_chapter/delete/{id}', 'write\write_chapterController@delete')->name('setting_chapter_delete');
// });


   // MASTERRR
   // user
   Route::get('/master/master_user', 'backend\master\master_userController@index')->name('master_user');
   Route::get('/master/master_user/create', 'backend\master\master_userController@create')->name('master_user_create');
   Route::get('/master/master_user/edit/{id}', 'backend\master\master_userController@edit')->name('master_user_edit');
   Route::post('/master/master_user/save', 'backend\master\master_userController@save')->name('master_user_save');
   Route::get('/master/master_user/update', 'backend\master\master_userController@update')->name('master_user_update');
   Route::get('/master/master_user/delete/{id}', 'backend\master\master_userController@delete')->name('master_user_delete');
   // category
   Route::get('/master/master_category', 'backend\master\master_categoryController@index')->name('master_category');
   Route::get('/master/master_category/create', 'backend\master\master_categoryController@create')->name('master_category_create');
   Route::get('/master/master_category/edit/{id}', 'backend\master\master_categoryController@edit')->name('master_category_edit');
   Route::post('/master/master_category/save', 'backend\master\master_categoryController@save')->name('master_category_save');
   Route::get('/master/master_category/update/{id}', 'backend\master\master_categoryController@update')->name('master_category_update');
   Route::post('/master/master_category/delete', 'backend\master\master_categoryController@delete')->name('master_category_delete');






