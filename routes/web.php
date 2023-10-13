<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('register', [LoginController::class, 'registration'])->name('register');
Route::post('register', [LoginController::class, 'submitRegistration'])->name('register.submit');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['prefix' => 'organization'], function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('organization.index');
        Route::get('show/{id}', [OrganizationController::class, 'show'])->name('organization.show');
        Route::get('form/{id?}', [OrganizationController::class, 'create'])->name('organization.create');
        Route::post('store', [OrganizationController::class, 'store'])->name('organization.store');
        Route::post('update/{id}', [OrganizationController::class, 'update'])->name('organization.update');
        Route::get('destroy/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');
    });

    Route::group(['prefix' => 'person'], function () {
        Route::get('index/{id?}', [PersonController::class, 'index'])->name('person.index');
        Route::get('form/{id?}', [PersonController::class, 'create'])->name('person.create');
        Route::post('store', [PersonController::class, 'store'])->name('person.store');
        Route::post('update/{id}', [PersonController::class, 'update'])->name('person.update');
        Route::get('destroy/{id}', [PersonController::class, 'destroy'])->name('person.destroy');
        Route::post('search', [PersonController::class, 'search'])->name('person.search');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('form/{id?}', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});


