<?php


use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Editor\EditordashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Writer\WriterDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/storeuser', [UserController ::class, 'storeuser'])->name('storeuser');
Route::get('/userdashboard', [UserController::class, 'index'])->name('dashboard');
Route::get('/writerdashboard', [WriterDashboardController::class, 'index'])->name('writerdashboard');
Route::get('/editordashboard', [EditordashboardController ::class, 'index'])->name('editordashboard');
Route::get('/admindashboard', [AdminDashboardController ::class, 'index'])->name('admindashboard');
Route::get('/createjob', [AdminDashboardController ::class, 'createjob'])->name('createjob');	
                                                                 	                                                                                                                                                                                                                                                                                                                                                                                        