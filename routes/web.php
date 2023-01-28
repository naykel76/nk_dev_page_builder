<?php

use Naykel\Gotime\Facades\RouteBuilder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{PageBuilder, PageTable};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

RouteBuilder::create('nav-main');

/*
|--------------------------------------------------------------------------
| admin-local Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['web'])->group(function () {

    Route::prefix('page-builder')->name('page-builder')->group(function () {
        Route::get('/{page:slug}/edit', PageBuilder::class)->name('.edit');
        Route::get('/create', PageBuilder::class)->name('.create');
    });

    Route::prefix('pages')->name('pages')->group(function () {
        Route::get('/', PageTable::class)->name('.index');
    });
});

// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
// ///////////////////////////////////////////////////////////////////////////////
// Route::get('/{page}', [PageController::class, 'show'])->name('pages.show');
// ///////////////////////////////////////////////////////////////////////////////
// /** ---------------------------------------------------------------------------
//  *  =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!= MUST RUN LAST =!=
//  * ------------------------------------------------------------------------- */
