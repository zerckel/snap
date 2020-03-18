<?php

use Illuminate\Support\Facades\App;
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
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'message@showForm');
    Route::post('/', 'message@getInfo');
    Route::get('/error', function (){
        return view('index', ['code' => 'error']);
    });

    Route::get('/{code}', function () {
        $code = Route::current()->code;

        return App::call('App\Http\Controllers\promptMessage@show' ,['code' => $code]);

    });
});
