<?php
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => "v1"],function (){
    
    Route::prefix('users')->group(function () {
        Route::post("/login" , [UsersController::class,'login'])->name('login');
        Route::post("/register" , [UsersController::class,'register'])->name('register');
        Route::post("/forgot" , [UsersController::class,'forgot']);
        Route::post("/reset-password" , [UsersController::class,'reset']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('/products', ProductController::class);
        Route::resource('/users', UsersController::class);
    });
});