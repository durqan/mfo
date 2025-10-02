<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Stages\ContactsController;
use App\Http\Controllers\Stages\PassportController;
use App\Http\Controllers\Stages\AddressController;
use App\Http\Controllers\LoanReasonsController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\UserIsAuthenticated;
use App\Http\Controllers\PersonalController;

Route::get('/', [MainController::class, 'main_page']);
Route::get('/loan', [LoanController::class, 'view']);
Route::post('/add_contacts', [ContactsController::class, 'add']);
Route::post('/add_passport', [PassportController::class, 'add']);
Route::post('/add_addresses', [AddressController::class, 'add']);
Route::get('/loan_reasons/gets', [LoanReasonsController::class, 'gets']);
Route::post('/add_loan', [LoanController::class, 'add']);
Route::post('/auth', [AuthController::class, 'login']);

Route::middleware(UserIsAuthenticated::class)->group(function (){
    Route::get('/personal', [PersonalController::class, 'view']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
