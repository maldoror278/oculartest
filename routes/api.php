<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\DetalleController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('blog', App\Http\Controllers\BlogController::class);
Route::post('login', 'App\Http\Controllers\UserController@login');

Route::get('allcategoria', 'App\Http\Controllers\AreaController@index');
Route::post('addcategoria', 'App\Http\Controllers\AreaController@add');

Route::post('alldetalle', 'App\Http\Controllers\DetalleController@index');
Route::post('savedetalle', 'App\Http\Controllers\DetalleController@add');
Route::Delete('deleteDetalle/{id}', 'App\Http\Controllers\DetalleController@destroy');

