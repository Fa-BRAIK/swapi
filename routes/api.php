<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\StarshipController;
use App\Http\Controllers\ResourceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('people')->group(static function () {
    // Option B : search included in index by passing a query param ?search=luke
    Route::get('/', [ PeopleController::class, 'index' ]);

    // Option A : search seperated from index
    Route::get('/search', [ PeopleController::class, 'search' ]); 
});

Route::get('planets', [ PlanetController::class, 'index' ]);
Route::get('starships', [ StarshipController::class, 'index' ]);

// Option C : include all routes in one file by using a variable to determine the resource
// we can also pass a query param ?search=luke in this case
Route::get('/{resource}', [ ResourceController::class, 'index' ]);
