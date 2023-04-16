<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\NewsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('registration', [LoginController::class, 'registration'])->name('register');
Route::post('post-registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// Password Reset Routes

Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

 /*------------------------
    News ROUTES
 --------------------------*/
Route::group(['prefix' => 'news'],function (){
    Route::get('/',[NewsController::class,'index'])->name('admin.news');
    Route::get('/new', [NewsController::class,'new_news'])->name('admin.news.new');
    Route::post('/new', [NewsController::class,'store_new_news']);
    Route::get('/edit/{id}', [NewsController::class,'edit_news'])->name('admin.news.edit');
    Route::post('/update/{id}', [NewsController::class,'update_news'])->name('admin.news.update');
    Route::get('/delete/{id}', [NewsController::class,'delete_news'])->name('admin.news.delete');
});

/*-------------------------
    BLOG CATEGORIES ROUTES
    --------------------------*/
Route::group(['prefix' => 'category'],function (){
    Route::get('/', [NewsController::class,'category'])->name('admin.news.category');
    Route::post('/', [NewsController::class,'new_category']);
    Route::get('/delete/{id}', [NewsController::class,'delete_category'])->name('admin.news.category.delete');
    Route::post('/update', [NewsController::class,'update_category'])->name('admin.news.category.update');
});
