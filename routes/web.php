<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\IdentificationPaperController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\StatusController;
use App\Models\Financial;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
///////////////////////////////Begin RESOURCE/////////////////////////
//TODO:: route entry
Route::resource('entries', EntryController::class);
/* Route::get('entries/{entry}/detials', [EntryController::class, 'detials']); */
//TODO:: route category
Route::resource('categories', CategoryController::class);
//TODO:: route Status
Route::resource('statuses', StatusController::class);
//TODO:: route Paper to entries
Route::resource('papers', IdentificationPaperController::class);
//TODO:: route person or family entries
Route::resource('people', PersonController::class);
//TODO:: route add financial to entries
Route::resource('financials', FinancialController::class);


/////////////////////////////End Resource////////////////////////////

Route::controller(PersonController::class)->group(function () {
    Route::get('person/{entry}', [PersonController::class, 'create'])->name('person.create');
    Route::post('person/{entry}', [PersonController::class, 'store'])->name('person.store');
});
//Route::get('person', [PersonController::class, 'create'])->name('person.create');
