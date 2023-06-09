<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PeopleController;
use App\Http\Controllers\Api\PlanetController;
use App\Http\Controllers\Api\StarshipController;
use App\Http\Controllers\Api\ResourceController;

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
// in order to use it we would have to disable the other routes above
// or put this route at the top of the file so it gets matched first
Route::get('/{resource}', [ ResourceController::class, 'index' ]);
