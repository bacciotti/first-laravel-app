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

Route::get('/companies', 'CompaniesController@index')
    ->name('list_companies')
    ->middleware('auth');
Route::get('/companies/create', 'CompaniesController@create')
    ->name('create_company')
    ->middleware('auth');
Route::post('/companies/create', 'CompaniesController@store')
    ->middleware('auth');
Route::delete('/companies/{id}', 'CompaniesController@destroy')
    ->middleware('auth');
Route::post('/companies/{id}/editCompany', 'CompaniesController@editCompany')
    ->middleware('auth');

Route::get('/employees', 'EmployeesController@index')
    ->name('list_employees')
    ->middleware('auth');
Route::get('/employees/create', 'EmployeesController@create')
    ->name('create_employee')
    ->middleware('auth');
Route::post('/employees/create', 'EmployeesController@store')
    ->middleware('auth');
Route::delete('/employees/{id}', 'EmployeesController@destroy')
    ->middleware('auth');
Route::post('/employees/{id}/editEmployee', 'EmployeesController@editEmployee')
    ->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')
    ->middleware('auth');
