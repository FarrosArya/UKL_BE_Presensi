<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





// /**
//  * route "/register"
//  * @method "POST"
//  */
//REGISTER
// Route::post('/create', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/create', [App\Http\Controllers\Api\RegisterController::class, 'register'])->middleware('jwt.verify');
Route::put('/update/{id}', [App\Http\Controllers\Api\RegisterController::class, 'update'])->middleware('jwt.verify');
Route::get('/get', [App\Http\Controllers\Api\RegisterController::class, 'index'])->middleware('jwt.verify');
Route::get('/get/{id}', [App\Http\Controllers\Api\RegisterController::class, 'show'])->middleware('jwt.verify');
Route::delete('/delete/{id}', [App\Http\Controllers\Api\RegisterController::class, 'destroy'])->middleware('jwt.verify');
//ATTENDANCE
// Route::post('/create', [App\Http\Controllers\Api\AttendanceController::class, 'store'])->middleware('jwt.verify');
// Route::put('/update/{id}', [App\Http\Controllers\Api\AttendanceController::class, 'update'])->middleware('jwt.verify');
// Route::get('/get', [App\Http\Controllers\Api\AttendanceController::class, 'index'])->middleware('jwt.verify');
// Route::get('/get/{id}', [App\Http\Controllers\Api\AttendanceController::class, 'show'])->middleware('jwt.verify');
// Route::delete('/delete/{id}', [App\Http\Controllers\Api\AttendanceController::class, 'destroy'])->middleware('jwt.verify');




/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

use App\http\Controllers\attendanceController;
use App\Models\attendance;

Route::post('/attendance', [attendanceController::class, 'presensi']);
// Route::get('/attendance/history/{id}', [attendanceController::class, 'show1'])->middleware('jwt.verify');
Route::middleware('auth:api')->get('/attendance/history/{id}', [attendanceController::class, 'show1']);
Route::middleware('auth:api')->get('/attendance/summary/{id}', [attendanceController::class, 'summary']);
Route::middleware('auth:api')->post('/attendance/analysis', [attendanceController::class, 'analysis']);     