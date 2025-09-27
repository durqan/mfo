<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoanController;

Route::get('/', [MainController::class, 'main_page']);
Route::get('/loan', [LoanController::class, 'view']);
