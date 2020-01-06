<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('soldiers', 'SoldiersController@index');
Route::post('soldiers', 'SoldiersController@store');
Route::get('soldiers/{soldier}', 'SoldiersController@show');
Route::put('soldiers/{soldier}', 'SoldiersController@update');
Route::put('soldiers/{soldier}/updateMartialInfo', 'MartialInfosController@update');
Route::put('soldiers/{soldier}/updateLeaveInfo', 'LeaveInfosController@update');
Route::apiResource('leaves', 'LeavesController', ['parameters' => ['leaves' => 'leave']]);

Route::apiResource('extraDuties', 'ExtraDutiesController');
Route::apiResource('absences', 'AbsencesController');
Route::apiResource('units', 'UnitsController');
