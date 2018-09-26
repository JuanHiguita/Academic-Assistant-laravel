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
Auth::routes();
/* Vistas de inicio*/
Route::get('/','HomeController@index')->name('home');
Route::get('/calendar','HomeController@calendar')->name('calendar');
Route::get('/average','HomeController@average')->name('average');
Route::get('/graphics','HomeController@graphics')->name('graphics');

/*Vistas del usuario cuando esta loggeado*/
Route::get('/home','SubjectsController@listar')->name('subject.home');
//Create a new Subject
Route::get('/home/subject/create','SubjectsController@create')->name('subject.create');
//Save Subjects
Route::post('/home','SubjectsController@store')->name('subject.store');
//Delete Subject
Route::get('/home/subject/{id}/delete','SubjectsController@delete')->name('subject.delete');
//show notes for Subject
Route::get('home/subject/{id}', 'SubjectsController@showNotes')->name('subject.show');
//create and edit notes
Route::get('home/notes/{id}', 'SubjectsController@edit')->name('subject.edit');
//Update Subject
Route::post('home/subject/{id}', 'SubjectsController@createNote')->name('subject.createNote');
