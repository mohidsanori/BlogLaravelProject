<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->name('dashboard');
Route::get('/{category_slug}', [FrontendController::class, 'viewCategory']);
Route::get('/{category_slug}/{blog_slug}', [FrontendController::class, 'viewBlog']);
Route::post('savelikedislike', [CommentController::class, 'save_likedislike']);
Route::post('comment', [CommentController::class, 'store']);

Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/admin', [IndexController::class, 'index'])->name('index');
    Route::resource('admin/category', CategoryController::class);
    Route::resource('admin/blog', BlogController::class);
});




require __DIR__ . '/auth.php';
