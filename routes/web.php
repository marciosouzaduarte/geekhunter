<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/company/delete/{id}', [CompanyController::class, 'delete'])->name('company.delete')->middleware('auth');
Route::get('/company/search', [CompanyController::class, 'search'])->name('company.search')->middleware('auth');
Route::resource('company', CompanyController::class)->middleware('auth');