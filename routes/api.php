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

Route::resource('/currencies', 'ApiCurrencyController', [
    'only' => ['index', 'show']
]);

Route::prefix('admin')->group(function () {
    Route::resource('currencies', 'Admin\ApiCurrencyController', [
        'except' => ['edit', 'create']
    ]);
});
