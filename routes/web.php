<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home'	    	   , 'HomeController@index')->name('home');

Route::resource('client' 		   , 'ClientController')->middleware('auth');
Route::resource('product'		   , 'ProductController')->middleware('auth');
Route::resource('payment-condition', 'PaymentConditionController')->middleware('auth');
Route::resource('warehouse'	       , 'WarehouseController')->middleware('auth');
Route::resource('budget'	   	   , 'BudgetController')->middleware('auth');
Route::resource('type-of-product'  , 'TypeOfProductController')->middleware('auth');
Route::resource('product-group'    , 'ProductGroupController')->middleware('auth');
Route::resource('unit-of-measure'  , 'UnitOfMeasureController')->middleware('auth');

Route::prefix('api')->group(function () {

	Route::get('product/search', 'ProductController@search')->name('product.api-search')->middleware('auth');

	Route::get('client/search'  , 'ClientController@search')->name('client.api-search')->middleware('auth');

	Route::get('payment-condition/search', 'PaymentConditionController@search')->name('payment-condition.api-search')->middleware('auth');

	Route::get('product-group/search', 'ProductGroupController@search')->name('ProductGroup.api-search')->middleware('auth');

	Route::get('type-of-product/search', 'TypeOfProductController@search')->name('type-of-product.api-search')->middleware('auth');

	Route::get('unit-of-measure/search', 'UnitOfMeasureController@search')->name('unit-of-measure.api-search')->middleware('auth');

	Route::get('warehouse/search', 'WarehouseController@search')->name('Warehouse.api-search')->middleware('auth');
});