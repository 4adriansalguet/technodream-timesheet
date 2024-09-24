<?php

use App\Events\AuthenticationEvent;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\User\UserIndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::match(['get'], 'register', function(){ return redirect('/'); });
Route::match(['get'], 'login', function(){ return redirect('/'); })->name('login');

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::group(['middleware' => 'auth'], function(){
    // user auth controllers
    Route::group(['middleware' => 'is_user'], function(){
        Route::get('/dashboard', [UserIndexController::class, 'index']);
    });

    // admin auth controllers
    Route::group(['middleware' => 'is_admin'], function(){
        Route::get('/admin', [AdminIndexController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminUsersController::class, 'index'])->name('users.page');
        Route::get('/admin/users/add', [AdminUsersController::class, 'ShowAddUser'])->name('users.page.add');
        Route::post('/admin/users/add', [AdminUsersController::class, 'StoreUser'])->name('users.page.store');
    });

});