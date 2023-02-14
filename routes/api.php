<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::apiResource('category',CategoryController::class);

//******************* public routes *******************

//Authentication sancutm
Route::post('/register', [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);
//

//Dashboard
Route::prefix('dashboard/category')->group(function () {
    Route::get('/', [AdminCategoryController::class, "index"]);
    Route::get('/{category}', [AdminCategoryController::class, "show"]);    
});
//

//General



//******************* private routes *******************

//Authentication sancutm
Route::post('logout',[AuthController::class, "logout"])->middleware("auth:sanctum");
//

//Dashboard
Route::prefix('dashboard/category')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/', [AdminCategoryController::class, "store"]);
    Route::put('/{category}', [AdminCategoryController::class, "update"]);
    Route::delete('/{category}', [AdminCategoryController::class, "destroy"]);

});
//
//General
    Route::get('/category/{id}', [CategoryController::class, "show"])->middleware("auth:sanctum");
//

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
