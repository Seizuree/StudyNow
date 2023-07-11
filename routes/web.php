<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseSessionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [ViewController::class, 'initialPage']);
Route::get('/login', [ViewController::class, 'showLoginPage']);
Route::get('/register', [ViewController::class, 'showRegisterPage']);
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [ViewController::class, 'showRegisterPage']);
Route::get('/logout', [AuthenticationController::class, 'logout']);
Route::resource('course', CourseController::class);
Route::get('course/subscribe/{courseId}', [UserCourseController::class, 'subscribeCourse']);
Route::resource('user', UserController::class);
Route::resource('usercourse', UserCourseController::class);
Route::get('/courselist', [ViewController::class, 'showCourseListPage']);
Route::get('manageCourse', [ViewController::class, 'showManageCoursePage']);
Route::resource('coursesession', CourseSessionController::class);
Route::post('/user/{id}/update-password', [UserController::class, 'updatePasswordOnly'])->name('update-password');
