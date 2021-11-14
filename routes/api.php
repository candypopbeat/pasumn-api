<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IpassController;
use App\Http\Controllers\AuthController;

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
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	
	Route::get('/user', function (Request $request) {
		return $request->user();
	});
	
	Route::post('/add', [IpassController::class, 'add']);
	Route::post('/edit', [IpassController::class, 'edit']);
	Route::post('/del', [IpassController::class, 'del']);
	Route::post('/list', [IpassController::class, 'list']);
	Route::post('/show/{show}', [IpassController::class, 'show']);
	
	Route::post('/authcheck', [AuthController::class, 'authcheck']);

});


