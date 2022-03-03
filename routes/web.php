<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [\App\Http\Controllers\Main\IndexController::class, 'index'])->name('main.index');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('main.index');
    Route::resources([
        'category' => Admin\CategoryController::class,
        'photo' => Admin\PhotoController::class,
        'user' => Admin\UserController::class,
    ]);
});


















Route::get('test', function () {
    $category = \App\Models\Category::all();
//    $user = \App\Models\User::all();
    $photos = \App\Models\Photo::all();
    foreach ($photos as $photo) {
        dump($photo->category->name);
    }

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
