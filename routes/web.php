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


//Route::prefix('/')->group(function () {
    Route::get('/', [\App\Http\Controllers\Main\IndexController::class, 'index'])->name('main.index');
//    Route::prefix('photo')->group(function () {
        Route::get('photo/{slug}', [\App\Http\Controllers\Main\PhotoController::class, 'index'])->name('main.photo.index');
        Route::post('photo/{slug}/comment', [\App\Http\Controllers\Main\PhotoController::class, 'storeComment'])->name('photo.comment.store');
        Route::post('photo/{slug}/like', [\App\Http\Controllers\Main\PhotoController::class, 'storeLike'])->name('photo.like.store');
//    });
//    Route::prefix('category')->group(function () {
        Route::get('/category', [\App\Http\Controllers\Main\CategoryController::class, 'index'])->name('main.category.index');
        Route::get('category/{slug}', [\App\Http\Controllers\Main\CategoryController::class, 'show'])->name('main.category.show');
//    });
//    Route::prefix('user')->group(function () {
        Route::get('user', [\App\Http\Controllers\Main\UserController::class, 'index'])->name('main.user.index');
        Route::get('user/{slug}', [\App\Http\Controllers\Main\UserController::class, 'show'])->name('main.user.show');
        Route::post('user/{slug}/message', [\App\Http\Controllers\Main\UserController::class, 'storeMessage'])->name('main.user.message.store');
//    });
//    Route::prefix('city')->group(function () {
        Route::get('city', [\App\Http\Controllers\Main\CityController::class, 'index'])->name('main.city.index');
        Route::get('city/{slug}', [\App\Http\Controllers\Main\CityController::class, 'show'])->name('main.city.show');
//    });
//});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('main.index');
    Route::resources([
        'category' => Admin\CategoryController::class,
        'photo' => Admin\PhotoController::class,
        'user' => Admin\UserController::class,
        'city' => Admin\CityController::class,
        'role' => Admin\RoleController::class,
        'comment' => Admin\CommentController::class,
    ]);
});

Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Profile\IndexController::class, 'index'])->name('main.index');
    Route::resources([
        'photo' => Profile\PhotoController::class,
        'liked-photo' => Profile\LikedPhotoController::class,
        'comment' => Profile\CommentController::class,
        'user' => Profile\UserController::class,
    ]);
});


/**
 * Add a new route named "send-email". Upon accessing this URL, the "sendEmail"
 * function inside the "EmailController" class will be triggered.
 */
Route::get('send-email', [App\Http\Controllers\EmailController::class, 'sendEmail']);










Route::get('email', function () {
    $photo = \App\Models\Photo::query()->first();
    return \Illuminate\Support\Facades\Mail::to('aaa@bbb.ccc')
        ->send(new \App\Mail\SendPhotoCommentEmail($photo));
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
