<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ContactController;

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

Route::get("/", [HomeController::class,"index"])->name("index");
Route::get("/result/{id}", [HomeController::class,"result"])->name("result");
Route::get("/detail/{slug}", [HomeController::class,"detail"])->name("detail");

Route::get("/login", [UserController::class,"login"])->name("login");
Route::post("/login", [UserController::class,"postLogin"]);
Route::get("/register", [UserController::class,"register"])->name("register");
Route::post("/register", [UserController::class,"postRegister"]);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/logon', [AdminController::class, 'logon'])->name('logon');
Route::post('/logon', [AdminController::class, 'postlogon'])->name('admin.logon');

Route::get('/sign-out', [AdminController::class, 'signOut'])->name('admin.signout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/',[DashBoardController::class,'index'])->name('admin.index');
    Route::resource('category', CategoryController::class);
    Route::get('/category-trash', [CategoryController::class,'trash'])->name('category.trash');
    Route::get('/category/{id}/restore', [CategoryController::class,'restore'])->name('category.restore');
    Route::get('/category/{id}/forceDelete', [CategoryController::class,'forceDelete'])->name('category.forceDelete');
    Route::resource('product', ProductController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('contact', ContactController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});

Route::post('/comments', [App\Http\Controllers\Admin\CommentController::class, 'store'])->name('comments.store');

Route::get('/search', [SearchController::class, 'search'])->name('search');
