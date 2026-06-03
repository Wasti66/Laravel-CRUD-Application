<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'UserPages'])->name('UserPages');
Route::get('/getUser', [UserController::class, 'AllUserPages'])->name('getUser');



Route::post('/StoreUser', [UserController::class, 'StoreUser'])->name('StoreUser');
Route::get('/AllUser', [UserController::class, 'AllUser']);
Route::post('/UpdateUser/{id}', [UserController::class, 'UpdateUser'])->name('UserUpdate');
Route::get('/UpdateUser/{id}', [UserController::class,'UpdateUserPages'])->name('UpdateUser');
Route::delete('/DeleteUser/{id}', [UserController::class, 'DeleteUser'])->name('DeleteUser');