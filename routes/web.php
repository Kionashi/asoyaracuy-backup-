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

// Auth routes
Route::group(['middleware' => 'web'], function () {
	Auth::routes();
});
// Frontend routes
Route::group(['middleware' => 'auth', 'namespace' => 'Frontend'], function () {

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/perfil', 'ProfileController@index')->name('profile');
	Route::post('/perfil/pago/editar', 'ProfileController@update')->name('profile/payment/update');
	Route::get('/perfil/pago/agregar', 'ProfileController@createPayment')->name('profile/payment/add');
	Route::post('/perfil/pago/agregar', 'ProfileController@storePayment')->name('profile/payment/store');
	Route::get('/perfil/pago/detalle/{id}', 'ProfileController@paymentDetail')->name('profile/payment/detail');
	Route::get('/perfil/pago/descargar/{id}', 'ProfileController@downloadPDF')->name('profile/payment/download');


});

//Backend
Route::group(['middleware' => 'admin', 'namespace' => 'Backend'], function () {

	//Dashboard
	Route::get('/admin', 'DashboardController@index')->name('admin');

	//Payments
	Route::get('/admin/pagos', 'PaymentController@index')->name('admin/payments');
	Route::get('/admin/pagos/{id}', 'PaymentController@detail')->name('admin/payments/');
	Route::get('/admin/pagos/aprobar/{id}', 'PaymentController@approve')->name('admin/payments/approve/');
	Route::get('/admin/pagos/rechazar/{id}', 'PaymentController@reject')->name('admin/payments/reject/');

	//Users
	Route::get('/admin/usuarios','UserController@index')->name('admin/users');
	Route::get('/admin/usuarios/agregar','UserController@create')->name('admin/users/create');	
	Route::get('/admin/usuarios/{id}','UserController@detail')->name('admin/users/');
	Route::get('/admin/usuarios/editar/{id}','UserController@edit')->name('admin/users/edit/');
	Route::post('/admin/usuarios/editar','UserController@update')->name('admin/users/update');
	Route::get('/admin/usuarios/borrar/{id}','UserController@delete')->name('admin/users/delete/');

	//Specialfee
	Route::get('/admin/cuotas-especiales','SpecialFeeController@index')->name('admin/specialfees');	
	Route::get('/admin/cuotas-especiales/borrar/{id}','SpecialFeeController@delete')->name('admin/specialfees/delete/');	


	//Fee
	Route::get('/admin/cobranzas','FeeController@index')->name('admin/fees');
	Route::get('/admin/cobrar','FeeController@collect')->name('admin/fees/collect');	
	Route::post('/admin/cobranzas/guardar','FeeController@store')->name('admin/fees/store');	

});

