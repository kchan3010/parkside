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
    return view('loan');
});

Route::post('/loan-submission', 'LoanSubmissionController@process');
Route::get('/loan-submission', 'LoanSubmissionController@process');

