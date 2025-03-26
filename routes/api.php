<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobpostController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register' , [AuthController::class , 'register']);
Route::post('/login' , [AuthController::class , 'login']);
Route::post('/logout' , [AuthController::class , 'logout']);


Route::group(['middleware'=>['auth:api']],function(){

Route::get('jobposts', [JobpostController::class, 'getAll']); 
Route::get('jobposts/{id}', [JobpostController::class, 'find']);  
Route::post('jobposts', [JobpostController::class, 'create']);  
Route::put('jobposts/{id}', [JobpostController::class, 'update']); 
Route::delete('jobposts/{id}', [JobpostController::class, 'delete']);  


Route::get('applications', [ApplicationController::class, 'getAll']); 
Route::get('applications/{id}', [ApplicationController::class, 'find']); 
Route::post('applications', [ApplicationController::class, 'create']); 
Route::delete('applications/{id}', [ApplicationController::class, 'delete']); 

});
