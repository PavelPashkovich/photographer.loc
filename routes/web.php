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

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('main.index');
    Route::resources([
        'category' => Admin\CategoryController::class,
        'photo' => Admin\PhotoController::class,
        'user' => Admin\UserController::class,
        'city' => Admin\CityController::class,
        'role' => Admin\RoleController::class,
    ]);
});

Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Profile\IndexController::class, 'index'])->name('main.index');
//    Route::get('comment', [\App\Http\Controllers\Profile\CommentController::class, 'index'])->name('comment.index');
    Route::resources([
        'photo' => Profile\PhotoController::class,
        'liked-photo' => Profile\LikedPhotoController::class,
        'comment' => Profile\CommentController::class,
    ]);
});












Route::get('id', function () {
    dd(auth()->user()->name);
});



Route::get('test', function () {
//    $category = \App\Models\Category::all();
//    $users = \App\Models\User::all();
    $photo = \App\Models\Photo::query()->where('id', '=', 21)->get();
//    foreach ($users as $user) {
//        dump($user->city->name);
//    }
    dd($photo);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
