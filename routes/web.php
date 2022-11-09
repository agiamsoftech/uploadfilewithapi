<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

use App\Http\Controllers\UserController;


Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->to('/home');
	}else{
    	return redirect('/login');
	}
});

Auth::routes();

Route::get('home', function () {
    return view('home');
});

