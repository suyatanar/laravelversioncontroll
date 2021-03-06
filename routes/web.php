<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestapiController;
use Illuminate\Http\Request;
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
Route::view('/', 'index');
Route::controller(RequestapiController::class)->group(function () {
	Route::any('/data/get_all_records', 'allVersion');
    Route::get('/data/{id}', 'versionByID');
    //Route::get('/data/{timestamp}', 'versionByTimestamp');
    Route::post('/data/{id}', 'checkVersionID');
    Route::post('/data', 'insertID');

    Route::get('/data', function(Request $request) {
    	$id = $timestamp = "";
    	$url = $request->input('request_url');
    	$id = explode("?id=", $url);
    	if(is_array($id) && sizeof($id) > 1){
    		$id = end($id);
    		return (new RequestapiController)->versionByID($id);
    	}

	    $timestamp = explode("?timestamp=", $url);
	    if(is_array($timestamp) && sizeof($timestamp) > 1){
	    	$timestamp = end($timestamp);
	    	return (new RequestapiController)->versionByTimestamp($timestamp);
	    }
    });   
});