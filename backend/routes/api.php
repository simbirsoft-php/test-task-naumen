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

Route::pattern('uuid', '[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}');

Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');

// Список атрибутов объектов
Route::get('/meta/{type}', 'ApiController@meta');
// Актуальное
Route::get('/list/{type}', 'ApiController@list');
// Архив
Route::get('/archive/{type}', 'ApiController@archive');

// Редактировать объект
Route::post('/list/{type}/{uuid}', 'ApiController@updateObject');

// Поместить в архив
Route::post('/archive/{type}/{uuid}/set', 'ApiController@setArchive');
// Убрать из архива
Route::post('/archive/{type}/{uuid}/remove', 'ApiController@removeArchive');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
