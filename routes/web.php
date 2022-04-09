<?php

use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('video', VideoController::class);

Route::resource('video.link', VideoListController::class)->shallow();
