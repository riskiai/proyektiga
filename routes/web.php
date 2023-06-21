<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProfileDesaController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
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

Route::get('/', [FrontEndController::class,'index'])->name('index');
Route::get('/detail/{id}', [FrontEndController::class,'details'])->name('details');
Route::get('/profile/{id}', [FrontEndController::class,'profile'])->name('profile');
Route::post('/detail/{id}',[CommentController::class,'store'])->name('comments.store');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::middleware(['admin'])->group(function () {
            Route::resource('category', ProductCategoryController::class);
            Route::resource('product', ProductController::class);
            Route::resource('user', UserController::class);
            Route::resource('testimonial', TestimonialController::class);
            Route::resource('statistik', StatistikController::class);
            Route::resource('profile', ProfileDesaController::class);
            Route::resource('transaction', TransactionController::class)->only([
                'index', 'show', 'edit', 'update'
            ]);
            Route::resource('product.gallery', ProductGalleryController::class)->shallow()->only([
                'index', 'create', 'store', 'destroy'
            ]);
            Route::resource('comment', CommentController::class)->shallow()->only([
                'index', 'destroy'
            ]);
            Route::get('laporan',[LaporanController::class,'index'])->name('laporan.index');
            Route::get('cetak_pdf',[LaporanController::class,'cetak_pdf'])->name('cetak_pdf.cetak_pdf');
        });
    });
});


