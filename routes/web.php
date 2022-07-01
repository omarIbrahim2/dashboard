<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Home\homeController;
use App\Http\Controllers\Users\usersController;
use Illuminate\Routing\RouteRegistrar;
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




Route::get('/' , [AuthController::class , "showRegister"])->name('showRegister');
Route::get('login' , [AuthController::class , 'showLogin'])->name('showLogin');

Route::post('register' , [AuthController::class , 'RegisterAdmin']);
Route::post('logout' , [AuthController::class , 'logout'])->name('logout');
Route::post('login' , [AuthController::class , 'login']);


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard' , [homeController::class , 'index']);
    Route::post('/dashboard/addUser' , [usersController::class , "store"]);
    Route::post('/dashboard/deleteUser' , [usersController::class , "Delete"]);
    Route::post('/dashboard/updateUser' , [usersController::class , "Update"]);

});

