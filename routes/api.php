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

    'name' => 'api.',
    'namespace' => 'ApiControllers',

], function () {
    Route::group([
        'prefix' => 'Championships'
    ], function()
    {
        Route::get('index', 'ChampionshipController@index');
        Route::post('create', 'ChampionshipController@store');
        Route::post('edit/{championship}', 'ChampionshipController@update');
        Route::delete('delete/{championship}', 'ChampionshipController@destroy');
    });
});
