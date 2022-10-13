<?php

use App\Models\Cantact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('cant', 'ContactController@index');

/* Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('contacts', 'ContactController');
    Route::get('/logout', 'UserController@logout');
});


Route::post('/register', 'UserController@register');

Route::post('/login', 'UserController@login');

Route::apiResource('users', 'UserController');
 */

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');
