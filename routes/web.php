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

// Route::get('/', function () {
// 	$data = DB::table('d_novel')->get();
//     return view('welcome',compact('data'));
// });
Route::get('/', 'welcomeController@data_all')->name('data_all');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// BACKEND NOVEL
Route::get('/write/write_novel', 'write\write_novelController@index')->name('write_novel');
Route::get('/write/write_novel/create', 'write\write_novelController@create')->name('write_novel_create');
Route::post('/write/write_novel/save', 'write\write_novelController@save')->name('write_novel_save');
Route::get('/write/write_novel/edit/{id}', 'write\write_novelController@edit')->name('write_novel_edit');
Route::post('/write/write_novel/update', 'write\write_novelController@update')->name('write_novel_update');
Route::get('/write/write_novel/delete/{id}', 'write\write_novelController@delete')->name('setting_novel_delete');

Route::get('/write/write_chapter/{id}', 'write\write_chapterController@index')->name('write_chapter');

Route::get('/write/write_chapter/create/{id}', 'write\write_chapterController@create')->name('write_chapter_create');
Route::get('/write/write_chapter/save', 'write\write_chapterController@save')->name('write_chapter_save');
Route::get('/write/write_chapter/edit/{id}', 'write\write_chapterController@edit')->name('write_chapter_edit');
Route::get('/write/write_chapter/update', 'write\write_chapterController@update')->name('write_chapter_update');
Route::get('/write/write_chapter/delete/{id}', 'write\write_chapterController@delete')->name('setting_chapter_delete');

//FRONT END
Route::get('/profile/{name}', 'novel_frontend\profileController@profile')->name('profile_frontend');
// Route::get('/book/{name}', 'frontend_controller\bookController@profile')->name('frontend_book');

// FRONT END NOVEL
Route::get('/book/{name}', 'novel_frontend\bookController@book')->name('frontend_book');
Route::get('/novel_rate_star', 'novel_frontend\bookController@novel_rate_star')->name('novel_rate_star');
Route::get('/chapter/{name}', 'novel_frontend\chapterController@chapter')->name('frontend_chapter');

//BACKEND 
Route::get('/profile_detail/{id}', 'backend_controller\profileController@profile')->name('profile_backend');
