<?php


use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\Editor\EditordashboardController;
use App\Http\Controllers\Employer\EmployeeTaskController;
use App\Http\Controllers\Employer\EmployerdashboardController;
use App\Http\Controllers\Pages\PagesController;
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
Route::get('/employerdashboard', [EmployerdashboardController ::class, 'index'])->name('employerdashboard');
Route::post('/adminstorejob', [AdminDashboardController ::class, 'adminstorejob'])->name('adminstorejob');	
Route::get('/adminviewjob', [AdminDashboardController ::class, 'adminviewjob'])->name('viewjobs');	
Route::get('/create-writer-account', [PagesController ::class, 'writerregister'])->name('writer_register');	
Route::get('/store-writer', [PagesController ::class, 'storewriter'])->name('storewriter');	
Route::get('/createjob', [EmployeeTaskController ::class, 'createjob'])->name('createjob');	
                        

Route::middleware(['auth','role:employer'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/createjob', [EmployeeTaskController ::class, 'createjob'])->name('createjob');	
    Route::post('/storejob', [EmployeeTaskController ::class, 'storejob'])->name('storejob');	
    Route::get('/my-jobs', [EmployeeTaskController ::class, 'alljobs'])->name('alljobs');	
 
});
Route::middleware(['auth','role:writer'])->prefix('writer')->name('writer.')->group(function () {
    
});
Route::middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
});

