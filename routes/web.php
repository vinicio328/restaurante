<?php

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

App::setLocale('es');

Auth::routes();

Route::get('home', function () {
	return redirect('/');
});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '', 
	'middleware' => ['auth', 'acl'],
	'is' => 'administrator'], 
	function () {
		Route::resource('elementos', 'ElementoController');
		Route::resource('menus', 'MenuController');
		Route::put('menus/{menu}/attach', 'MenuController@attach')->name('menus.attach');
		Route::put('menus/{menu}/detach', 'MenuController@detach')->name('menus.detach');
		Route::put('menus/{menu}/updateitem', 'MenuController@updateItem')->name('menus.updateitem');
	});


Route::group(['prefix' => '', 
	'middleware' => ['auth', 'acl'],
	'is' => 'cocinero||cajero||mostrador'], 
	function () {
		Route::resource('verorden', 'VerOrdenController');
	});

Route::group(['prefix' => '', 
	'middleware' => ['auth', 'acl'],
	'is' => 'cajero'], 
	function () {
		Route::resource('ordens', 'OrdenController');
		Route::put('ordens/{orden}/attach', 'OrdenController@attach')->name('ordens.attach');
		Route::put('ordens/{orden}/detach', 'OrdenController@detach')->name('ordens.detach');
		Route::put('ordens/{orden}/mover', 'OrdenController@mover')->name('ordens.mover');
		Route::resource('ordens.ordenitems', 'OrdenItemController');
		Route::get('/dynamic_pdf/pdf/{orden_id}', 'PDFController@pdf')->name('orden.print'); 
	});