<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::resource('student',StudentController::class);
Route::get('/search/', 'PostsController@search')->name('search');
Route::get('student/value/{nim}',[StudentController::class,'value'])->name('student.value');
Route::get('student/print_pdf/{nim}', [StudentController::class,'print_pdf'])->name('print_pdf');