<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsItemController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQItemController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TagLinkController;
use App\Http\App\Http\Middleware\Admin;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('uploadavator', [UserInfoController::class, 'uploadAvatar'])
                ->name('uploadavator');
Route::post('updateuser', [UserInfoController::class, 'updateUser'])
                ->name('updateuser');

Route::get('admininfo', [AdminController::class, 'index'])
    ->name('admininfo')
    ->middleware(['auth','admin']);

Route::post('admininfo', [AdminController::class, 'post'])
    ->name('admininfo')
    ->middleware(['auth','admin']);

Route::resource('newsitems', NewsItemController::class);
Route::resource('faqcategories', FAQCategoryController::class);
Route::resource('faq', FAQItemController::class);
Route::resource('tag', TagController::class);

Route::post("/linkTag/{id}", [TagLinkController::class, "linkTag"])
        ->name("linkTag")
        ->middleware(['auth','admin']);

require __DIR__.'/auth.php';
