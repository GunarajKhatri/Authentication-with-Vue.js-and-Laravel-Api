<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('main');
});
Route::get('/{any}',function(){
	return view('main');
})->where('any','[A-Za-z]+');
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/