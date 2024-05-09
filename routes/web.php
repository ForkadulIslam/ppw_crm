<?php

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

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BankStatementController;
use App\Http\Controllers\ClientController;

use App\Http\Controllers\CreditAccountController;
use App\Http\Controllers\WorkOrderController;


Route::get('/', [AuthController::class, 'index']);
Route::get('admin', [Admin::class, 'index']);
Route::post('/login',[AuthController::class, 'login']);
Route::get('/logout',[AuthController::class, 'logout']);


Route::group(['prefix'=>'module'],function(){


    Route::resource('client', ClientController::class);

    Route::any('work_order/search',[WorkOrderController::class, 'search']);
    Route::resource('work_order', WorkOrderController::class);
    Route::resource('bank',BankController::class);
    Route::resource('credit_account', CreditAccountController::class);

    Route::get('statement/create',[BankStatementController::class, 'create']);
    Route::post('bank_statement',[BankStatementController::class, 'store']);
    Route::get('statement',[BankStatementController::class, 'index']);
    Route::get('statement/{id}/edit', [BankStatementController::class, 'edit']);
    Route::patch('bank_statement/{statement_id}',[BankStatementController::class, 'update']);
    Route::any('statement/search',[BankStatementController::class,'search']);

});




