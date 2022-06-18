<?php

use Illuminate\Support\Facades\Route;
// use \App\Http\Controllers\SpaController;
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

/*
*   / - root path load the dashboard blade, view 
*/
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


/*
* request to any path, don't process it with Laravel, direct the request to the dashboard view and process it with vue.js
* required settings for the vue.js router and vue routes working properly
*/
Route::view('/{any}', 'dashboard')->where('any', '.*');


