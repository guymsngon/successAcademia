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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::get('/term', function () {
    return view('pages.term');
})->name('term');

Auth::routes();

// Show Register Page & Login Page
Route::get('/login', 'AuthController@getLogin')->name('login')->middleware('guest');
Route::get('/register', 'AuthController@getRegister')
    ->name('register')
    ->middleware('guest');


// Register & Login User
Route::post('/login', 'AuthController@login')->name('post_login');
Route::post('/register', 'AuthController@register')->name('post_register');;


// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    Route::Resource('school', 'EstablishmentController');
    Route::Resource('users', 'UserController');
    Route::Resource('branches', 'BrancheController');
    Route::Resource('classes', 'ClasseController');
    Route::Resource('courses', 'CourseController');
    Route::Resource('teacher_courses', 'CourseTeacherController');
    Route::Resource('class_courses', 'ClassCourseController');
    Route::Resource('posts', 'PostController');
    Route::Resource('comments', 'CommentController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/upload_time_table', 'ClasseController@upload')->name('upload');
    Route::get('/upload_time_table/{id}', 'ClasseController@download')->name('download');
    Route::get('/course/{id}', 'PostController@download_file')->name('download_course');
    Route::post('/list_class', 'HomeController@list_class')->name('list_class');
    Route::get('/class_user_index', 'UserController@class_user_index')->name('class_user_index');
    Route::PUT('/class_user/{id}', 'UserController@class_user')->name('class_user');
    Route::get('/space_work', 'HomeController@space_work')->name('space_work');
    Route::get('/post_class/{id}', 'PostController@post_class')->name('post_class');
    Route::get('/supervisor', 'UserController@supervisor')->name('supervisor');
    Route::get('/teachter', 'UserController@teachter')->name('teachter');
    Route::get('/student', 'UserController@student')->name('student');
    Route::get('/success', 'HomeController@success')->name('success');
    Route::post('/logout', 'AuthController@logout')->name('logout');
});
