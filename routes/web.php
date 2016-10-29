<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/insertItem', 'ItemController@insertItem');
Route::get('/updateQuantity/{name}/{item_quantity}',['as' => 'updateQuantity', 'uses' => 'ItemController@updateQuantity']);
Route::get('/deleteItem/{item}',['as' => 'deleteItem', 'uses' => 'ItemController@deleteItem']);
Route::get('/deleteOrder/{order}',['as' => 'deleteOrder', 'uses' => 'ShipmentController@deleteOrder']);
Route::get('/product',['as' => 'product', 'uses' => 'ItemController@index']);
Route::get('/shipment',['as' => 'shipment', 'uses' => 'ShipmentController@index']);
Route::post('/addOrder', 'ShipmentController@addOrder');
Route::get('/addShipment/{total_price}/{wastage_price}',['as' => 'addShipment', 'uses' => 'ShipmentController@addShipment']);
Route::get('/batch/{item}',['as' => 'batch', 'uses' => 'BatchController@index']);
Route::post('/enterBatch', 'BatchController@enterBatch');
Route::get('/deleteBatch/{batch}',['as' => 'deleteBatch', 'uses' => 'BatchController@deleteBatch']);
Route::get('/updateBatch/{batch}',['as' => 'updateBatch', 'uses' => 'BatchController@updateBatch']);
Route::get('/customer_list',['as' => 'customer_list', 'uses' => 'CustomerController@index']);
Route::post('/addCustomer', 'CustomerController@addCustomer');
Route::get('/deleteCustomer/{customer}',['as' => 'deleteCustomer', 'uses' => 'CustomerController@deleteCustomer']);
Route::get('/saleToCustomer/{customer}',['as' => 'saleToCustomer', 'uses' => 'SaleController@index']);
Route::get('/updateCustomer/{customer}',['as' => 'updateCustomer', 'uses' => 'CustomerController@updateCustomer']);
Route::post('/updateCustomerInformation', 'CustomerController@updateCustomerInformation');
Route::post('/addTransaction', 'SaleController@addTransaction');
Route::get('/deleteTransaction/{transaction}',['as' => 'deleteTransaction', 'uses' => 'SaleController@deleteTransaction']);
Route::get('/addSale/{total_price}/{total_discount}/{customer_id}/{vat}',['as' => 'addSale', 'uses' => 'SaleController@addSale']);
Route::get('header', function () {
    return view('header');
});






