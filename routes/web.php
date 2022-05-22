<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\IdentificationPaperController;
use App\Http\Controllers\StatusController;
use App\Models\Identification_paper;
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

Route::get('/', function () {
    return view('welcome');
});

//////////////////////////////////RESOURCE//////////////////////////
// TODO:: Entry
Route::resource('entries', EntryController::class);
// TODO:: Category entry
Route::resource('categories', CategoryController::class);
// TODO::Status entry
Route::resource('statuses', StatusController::class);
// TODO::Paper Entry
Route::resource('papers', IdentificationPaperController::class);
//////////////////////////////////End Resource///////////////////////
