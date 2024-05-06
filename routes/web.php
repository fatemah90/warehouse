<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/token', function () {
    return csrf_token(); 
});
// route::get('/warehouses',[WarehouseController::class,'index']);
// route::get('/warehouse/{id}',[WarehouseController::class,'show']);
route::get('/i/{id}',[ItemController::class,'update']);
// route::put('/warehouse/{id}',[WarehouseController::class,'update']);
// route::delete('/warehouse/{id}',[WarehouseController::class,'delete']);
// Route::resource('/item',ItemController::class);