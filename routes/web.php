<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AidController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\IdentificationPaperController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MdicalEntryController;
use App\Http\Controllers\OrphanController;
use App\Http\Controllers\PaidController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostWebController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\entryaidsController;
use App\Models\Entry;
use App\Models\Mdical_entry;
use App\Models\Status;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
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



//TODO::index page
Route::get('/index', [IndexController::class, 'index'])->name('index');



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
    Route::post('person/{person}', [PersonController::class, 'update'])->name('person.update');
    Route::get('person/{person}/edit', [PersonController::class, 'edit'])->name('person.edit');
    Route::delete('person/{person}', [PersonController::class, 'destroy'])->name('person.destory');
});
//قسم النواقص
Route::get('nawaqis', [IdentificationPaperController::class, 'indexAll'])->name('papers.nawaqis');

///قسم الاعانات
Route::resource('aids', AidController::class);
/////////////////////////////Start section Orphan////////////////////////////
Route::resource('sponsors', SponsorController::class);
Route::resource('types', TypeController::class);
Route::resource('paids', PaidController::class);
//TODO:: Add Orphan
Route::controller(OrphanController::class)->group(function () {
    Route::get('filter/create/{sponsor}', [OrphanController::class, 'create_filter'])->name('filter.create');
    Route::post('filter/{sponsor}', [OrphanController::class, 'filter'])->name('orphans.filter');
    Route::get('filter/{sponsor}', [OrphanController::class, 'filter']);
    Route::post('orphans/{sponsor}', [OrphanController::class, 'create'])->name('orphans.create');
    Route::post('orphan/{sponsor}', [OrphanController::class, 'store'])->name('orphans.store');
    Route::get('orphans', [OrphanController::class, 'index'])->name('orphans.index');
    Route::get('orphans/{orphan}', [OrphanController::class, 'show'])->name('orphans.show');
    Route::post('orphans/{orphan}', [OrphanController::class, 'update'])->name('orphans.edit');
    Route::delete('orphans/{orphan}', [OrphanController::class, 'destroy'])->name('orphans.destroy');
});
//TODO:: Add paid to sponsor
Route::controller(PaidController::class)->group(function () {
    Route::get('paids/create/{sponsor}', [PaidController::class, 'create'])->name('paids.create');
    Route::post('paids/{sponsor}', [PaidController::class, 'store'])->name('paids.store');
    Route::get('paids/{paid}', [PaidController::class, 'show'])->name('paids.show');
    Route::get('paids/maly/{sponsor}', [PaidController::class, 'maly'])->name('paids.maly');
});

//////////////////////////////////start section role and permission///////////////////
//TODO:: Add role
Route::resource('roles', RoleController::class);
//TODO:: Add permission
Route::resource('permissions', PermissionController::class);
//TODO:: Add user
Route::resource('users', UserController::class);

//TODO:: convert to excel file
Route::get('/excel', [ExcelController::class, 'entries']);

//exort exel
Route::get('/export', [EntryController::class, 'export']);



/////////////////////////////Start section posts on app////////////////////////////
//TODO:: add post to app
Route::resource('posts', PostWebController::class);
//aid_entry
//Route::get('/pe', [entryaidsController::class, 'getaid']);
Route::get('peee/{entry_id}', [entryaidsController::class, 'getaid'])->name('entry.aids');
//Route::get('/peee', [EntryController::class, 'allentryandaid']);
Route::post('/createaiid', [entryaidsController::class, 'store'])->name('create.aids');
//Route::post('/createaiid', [entryaidsController::class, 'store'])->name('creatspecific.aids');

//Route::post('/createaiiid', [entryaidsController::class, 'getentryforaid'])->name('create.aids');

//Route::post('/createaiiid', [entryaidsController::class, 'getentryforaid'])->name('specific.aids');
//Route::get('/createaiiiid', [entryaidsController::class, 'getentryforaiddd'])->name('specificentry.aids');

//اضافة اعانة للمدرجين
Route::get('/createaid', [entryaidsController::class, 'create']);
