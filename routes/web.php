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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/resetPasswordLink', function () {
    return view('resetPasswordLink');
});
Route::get('/forgotPassword', function () {
    return view('forgotPassword');
});

Route::get('/datatable', function () {
    return view('datatable');
});

Route::group(['middleware' => 'preventBackHistory'],function() {

Route::get('/changePassword', function () {
    return view('changePassword');
})->middleware('auth');
	
Route::get('/adminDashboard', function () {
    return view('adminDashboard');
})->name('adminDashboard')->middleware('adminAuthenticate');

Route::get('/adminDashboard', [App\Http\Controllers\AdminController::class, 'allShowRecord'])->name('adminDashboard')->middleware('auth','adminAuthenticate');
Route::get('/change_status', [App\Http\Controllers\AdminController::class, 'changeStatus'])->name('change_status')->middleware('auth');

	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth','userAuthenticate');
	Route::get('/editProfile/{id}', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('editProfile')->middleware('auth');
	Route::post('/profile/edit/{id}', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile.edit')->middleware('auth');
	Route::post('editPassword', [App\Http\Controllers\HomeController::class, 'editPassword'])->name('editPassword')->middleware('auth');

	Route::get('/index',[App\Http\Controllers\CountryStateCity::class,'countryShow'])->name('index');
	Route::post('/state',[App\Http\Controllers\CountryStateCity::class,'stateShow'])->name('state');
	Route::post('/city',[App\Http\Controllers\CountryStateCity::class,'showCity'])->name('city');
});



Auth::routes();


Route::post('/loginUser', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginUser');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/forgotPassword', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendEmail'])->name('forgotPassword');

Route::get('/confirmPassword/{token}', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'resetPassword'])->name('confirmPassword');

Route::post('/saveUpdatePassword/{token}', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'saveUpdatePassword'])->name('saveUpdatePassword');

Route::post('/create', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('create');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'fetch'])->name('fetch');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
