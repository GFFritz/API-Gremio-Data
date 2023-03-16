<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'force.json',
    'name' => 'api.',
    'namespace' => 'ApiControllers',

], function () {
    Route::group([
        'prefix' => 'players'
    ], function()
    {
        // Route::resource('create', 'PlayersController')->only('store');
        Route::get('index', 'PlayersController@index');
        Route::post('store', 'PlayersController@store');
        Route::post('edit/{player}', 'PlayersController@update');
        Route::delete('delete/{player}', 'PlayersController@destroy');
    });
});
