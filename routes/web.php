<?php

use App\Category;
use Illuminate\Support\Facades\Auth;
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

/* Custom Auth */

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/forgot_password', 'Auth\ForgotPasswordController@index')->name('forgot.password.get');
Route::post('/forgot_password', 'Auth\ForgotPasswordController@sendEmail')->name('forgot.password.post');


Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@index')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@updated')->name('password.update');

/**********/


/* Sales */

Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);



Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

/********/

/* Bussiness */

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);

/**********/

/* Printer */

Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

/**********/


/* Category */

Route::resource('categories', 'CategoryController')->names('categories');

/**********/


/* Client */

Route::resource('clients', 'ClientController')->names('clients');

/*********/


/* Product */

Route::resource('products', 'ProductController')->names('products');

/*********/


/* Providers */
Route::resource('providers', 'ProviderController')->names('providers');

/***********/


/* Purchase */

Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update',
]);

Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

/*********/


/* Change */

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

/********/

/* Users and Roles */

Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');

/**************/

Route::get('reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('reports_date', 'ReportController@reports_date')->name('reports.date');

Route::get('/home', 'HomeController@index')->name('home');