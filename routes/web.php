<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\IdentificationPaperController;
use App\Http\Controllers\MdicalEntryController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Models\Person;
use App\Models\User;
use App\Notifications\SponsorPublished;
use Illuminate\Support\Facades\Notification;
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

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
///////////////////////////////Start section entries/////////////////////////
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
//Route::resource('people', PersonController::class);
//TODO:: route add financial to entries
Route::resource('financials', FinancialController::class);
//TODO:: route add  the mdical entries
Route::resource('mdicals', MdicalEntryController::class);

/////////////////////////////End Resource////////////////////////////

Route::controller(PersonController::class)->group(function () {
    Route::get('person-create/{entry}', [PersonController::class, 'create'])->name('person.create');
    Route::post('person/{entry}', [PersonController::class, 'store'])->name('person.store');
    Route::get('person/{person}', [PersonController::class, 'show'])->name('person.show');
});
//قسم النواقص
Route::get('nawaqis', [IdentificationPaperController::class, 'indexAll'])->name('papers.nawaqis');



/////////////////////////////Start section Orphan////////////////////////////
Route::resource('sponsors', SponsorController::class);
Route::resource('types', TypeController::class);
//TODO:: Add Orphan
Route::controller(OrphanController::class)->group(function () {
    Route::get('filter/create/{sponsor}', [OrphanController::class, 'create_filter'])->name('orphans.create');
    Route::post('filter/{sponsor}', [OrphanController::class, 'filter'])->name('orphans.filter');
    Route::get('filter/{sponsor}', [OrphanController::class, 'filter']);
});
