<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/warehouse',[WarehouseController::class,'index']);
Route::get('/warehouse/{id}',[WarehouseController::class,'show']);
Route::post('/warehouse',[WarehouseController::class,'store']);
Route::put('/warehouse/{id}',[WarehouseController::class,'update']);
Route::delete('/warehouse/{id}',[WarehouseController::class,'destroy']);

Route::get('/item',[ItemController::class,'index']);
Route::get('/item/{id}',[ItemController::class,'show']);
Route::post('/item',[ItemController::class,'store']);
Route::put('/item/{id}',[ItemController::class,'update']);
Route::delete('/item/{id}',[ItemController::class,'destroy']);

