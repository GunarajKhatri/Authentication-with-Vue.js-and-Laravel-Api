<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login','AuthController@login');
Route::post('/register','AuthController@register');
Route::middleware('auth:api')->post('/logout','AuthController@logout');
Route::apiResource('/articles','ArticleController');