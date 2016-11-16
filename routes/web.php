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
Route::get('/deleteOffer/{offer}',['as' => 'deleteOffer', 'uses' => 'ItemController@deleteOffer']);
Route::get('/product',['as' => 'product', 'uses' => 'ItemController@index']);
Route::get('/offers',['as' => 'offers', 'uses' => 'ItemController@offers']);
Route::post('/addOffer', 'ItemController@addOffer');
Route::post('/addOrder', 'ShipmentController@addOrder');
Route::get('/addShipment/{total_price}/{supplier_id}/{wastage_price}',['as' => 'addShipment', 'uses' => 'ShipmentController@addShipment']);
Route::get('/batch/{item}',['as' => 'batch', 'uses' => 'BatchController@index']);
Route::post('/enterBatch', 'BatchController@enterBatch');
Route::post('/updateBatchInfo', 'BatchController@updateBatchInfo');
Route::get('/deleteBatch/{batch}',['as' => 'deleteBatch', 'uses' => 'BatchController@deleteBatch']);
Route::get('/updateBatch/{batch}',['as' => 'updateBatch', 'uses' => 'BatchController@updateBatchPage']);
Route::get('/customer_list',['as' => 'customer_list', 'uses' => 'CustomerController@index']);
Route::get('/supplier_list',['as' => 'supplier_list', 'uses' => 'CustomerController@supplier']);
Route::post('/addCustomer', 'CustomerController@addCustomer');
Route::post('/addSupplier', 'CustomerController@addSupplier');
Route::get('/deleteCustomer/{customer}',['as' => 'deleteCustomer', 'uses' => 'CustomerController@deleteCustomer']);
Route::get('/deleteSupplier/{supplier}',['as' => 'deleteSupplier', 'uses' => 'CustomerController@deleteSupplier']);
Route::get('/saleToCustomer/{customer}',['as' => 'saleToCustomer', 'uses' => 'SaleController@index']);
Route::get('/orderFromSupplier/{supplier}',['as' => 'orderFromSupplier', 'uses' => 'ShipmentController@index']);
Route::get('/receipt/{sale}',['as' => 'receipt', 'uses' => 'SaleController@receipt']);
Route::get('/sales',['as' => 'sales', 'uses' => 'SaleController@saleList']);
Route::get('/updateCustomer/{customer}',['as' => 'updateCustomer', 'uses' => 'CustomerController@updateCustomer']);
Route::get('/updateSupplier/{supplier}',['as' => 'updateSupplier', 'uses' => 'CustomerController@updateSupplier']);
Route::post('/updateCustomerInformation', 'CustomerController@updateCustomerInformation');
Route::post('/updateSupplierInformation', 'CustomerController@updateSupplierInformation');
Route::post('/addTransaction', 'SaleController@addTransaction');
Route::get('/deleteTransaction/{transaction}',['as' => 'deleteTransaction', 'uses' => 'SaleController@deleteTransaction']);
Route::get('/addSale/{total_price}/{total_discount}/{customer_id}/{vat}',['as' => 'addSale', 'uses' => 'SaleController@addSale']);
Route::get('header', function () {
    return view('header');
});






