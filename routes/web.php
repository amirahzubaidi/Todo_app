<?php

use App\Http\Controllers\TodoappController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoappController::class, 'index']);
Route::post('/', [TodoappController::class,'store']);
Route::patch('/{todoapp}', [TodoappController::class, 'update']);
Route::delete('/{todoapp}',[TodoappController::class, 'destroy']);
