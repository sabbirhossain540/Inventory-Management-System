<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::resource('/employee', 'Api\EmployeeController');
Route::resource('/supplier', 'Api\SupplierController');
Route::resource('/customer', 'Api\CustomerController');
Route::resource('/category', 'Api\CategoryController');
Route::resource('/product', 'Api\ProductController');
Route::resource('/expense', 'Api\ExpansesController');


Route::post('/salary/paid/{id}', 'SalaryController@paid');
Route::get('/salary/getAllSalary', 'SalaryController@getAllSalary');
Route::get('/salary/getMonthWiseSalary/{id}', 'SalaryController@getMonthWiseSalary');
Route::get('/salary/getDataForEdit/{id}', 'SalaryController@test');
Route::post('/salary/salaryUpdate/{id}', 'SalaryController@salaryUpdate');

Route::get('/getting/product/{id}', 'Api\PosController@GetProduct');

//Add to cart Route
Route::get('/addToCart/{id}', 'Api\CartController@addToCart');