<?php

use Illuminate\Support\Facades\Route;


Route::get('/', \App\Http\Controllers\SearchController::class)->name('search');
