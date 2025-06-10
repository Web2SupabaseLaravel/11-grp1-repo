<?php

use App\Http\Controllers\ReportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('reports',[ReportController::class,'store']);
Route::get('reports',[ReportController::class,'index']);
Route::put('reports/{id}',[ReportController::class,'update']);
Route::get('reports/{id}',[ReportController::class,'show']);
Route::delete('reports/{id}',[ReportController::class,'destroy']);
Route::get('/dashboard', [ReportController::class, 'dashboard']);

