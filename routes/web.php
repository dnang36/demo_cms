<?php

use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\admin\PermissonController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\user\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function (){
    //auth
    Route::get('/',[LoginController::class,'index'])->name('login');
    Route::post('/store',[LoginController::class,'store'])->name('login.store');
    Route::get('/destroy',[LoginController::class,'destroy'])->name('login.out');

    Route::middleware(['auth'])->group(function (){
        //dashboard
        Route::get('/dashboard',[MainController::class,'index'])->name('login.dashboard');

        //users
        Route::prefix('users')->group(function (){
            Route::get('/',[UserController::class,'index'])->name('user.index');
            Route::get('/create',[UserController::class,'create'])->name('user.create');
            Route::post('/create',[UserController::class,'store'])->name('user.store');
            Route::delete('/destroy/{user}',[UserController::class,'destroy'])->name('user.destroy');
            Route::get('/edit/{user}',[UserController::class,'edit'])->name('user.edit');
            Route::put('/edit/{user}',[UserController::class,'update'])->name('user.update');
        });
        //permisson
        Route::prefix('permissons')->group(function (){
            Route::get('/',[PermissonController::class,'index'])->name('permisson.index');
            Route::get('/create',[PermissonController::class,'create'])->name('permisson.create');
            Route::post('/create',[PermissonController::class,'store'])->name('permisson.store');
            Route::get('/edit/{permisson}',[PermissonController::class,'edit'])->name('permisson.edit');
            Route::put('/edit/{permisson}',[PermissonController::class,'update'])->name('permisson.update');
            Route::delete('/destroy/{permisson}',[PermissonController::class,'destroy'])->name('permisson.destroy');
        });

        //role
        Route::prefix('roles')->group(function (){
            Route::get('/',[RoleController::class,'index'])->name('role.index');
        });

        //tag
        Route::prefix('tags')->group(function (){
            Route::get('/',[TagController::class,'index'])->name('tag.index');
            Route::get('/create',[TagController::class,'create'])->name('tag.create');
            Route::post('/create',[TagController::class,'store'])->name('tag.store');
            Route::get('/edit/{tag}',[TagController::class,'edit'])->name('tag.edit');
            Route::put('/edit/{tag}',[TagController::class,'update'])->name('tag.update');
            Route::delete('/destroy/{tag}',[TagController::class,'destroy'])->name('tag.destroy');

        });

        //category
        Route::prefix('categories')->group(function (){
            Route::get('/',[CategoryController::class,'index'])->name('category.index');
            Route::get('/create',[CategoryController::class,'create'])->name('category.create');
            Route::post('/create',[CategoryController::class,'store'])->name('category.store');
            Route::get('/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');
            Route::put('/edit/{category}',[CategoryController::class,'update'])->name('category.update');
            Route::delete('/destroy/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
        });

        //article
        Route::prefix('articles')->group(function (){
            Route::get('/',[ArticleController::class,'index'])->name('article.index');
            Route::get('/create',[ArticleController::class,'create'])->name('article.create');
            Route::post('/create',[ArticleController::class,'store'])->name('article.store');
            Route::delete('/destroy/{article}',[ArticleController::class,'destroy'])->name('article.destroy');
            Route::get('/edit/{article}',[ArticleController::class,'edit'])->name('article.edit');
            Route::put('/edit/{article}',[ArticleController::class,'update'])->name('article.update');
        });
    });


});
