<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('search-videos', [ApiController::class, 'searchVideos']);

Route::get('/', function(){
    return view('principal');
});