<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\InvoiceController;

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

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::apiResource('invoices', InvoiceController::class);
// Route::get('/invoices', [InvoiceController::class, 'index']);
// Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
// Route::post('/invoices', [InvoiceController::class, 'store']);
// Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
// Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/teste', [TesteController::class, 'index'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/teste', [TesteController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
