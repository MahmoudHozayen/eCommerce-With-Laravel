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
Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@index')->name('home');
Route::middleware(['auth', 'verified'])->get('/home', 'HomeController@index');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@add')->name('cart.add');
Route::delete('/cart/{id}','CartController@delete')->name('cart.delete');

/*Route::delete('/cart/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
Route::post('/cart/conditions','CartController@addCondition')->name('cart.addCondition');
Route::get('/cart/details','CartController@details')->name('cart.details');*/

	Route::get('/contact', function () {
	    return view('app.contact');
	})->name('contact');

	Route::get('/product-details', function () {
	    return view('app.product_details');
	})->name('product-details');

	Route::get('/products/{id}', function () {
	    return view('app.products');
	});

	Route::get('/products', function () {
	    return view('app.products');
	})->name('products');

	Route::get('/profile', function () {
	    return view('app.profile');
	})->name('profile');

	Route::get('/about', function () {
	    return view('app.about');
	})->name('about');
	Route::get('/Blog', function () {
	    return view('app.Blog.blog');
	})->name('blog');	

Route::middleware(['verified', 'auth', 'admin'])->group(function () {
	Route::get('/admin', 'Administration\AdminController@index')->name('dashboard');
	/* Manage Users Routs */
	Route::get('/admin/manage-users', 'Administration\UsersController@index')->name('manage-users');
	Route::get('/admin/manage-users/add', 'Administration\UsersController@create')->name('Admin-addUser');
	Route::post('/admin/manage-users/add', 'Administration\UsersController@store');
	Route::get('/admin/manage-users/show/{id}', 'Administration\UsersController@show')->name('Admin-showUser');
	Route::get('/admin/manage-users/edit/{id}', 'Administration\UsersController@edit')->name('Admin-editUser');
	Route::post('/admin/manage-users/edit/{id}', 'Administration\UsersController@update');
	Route::delete('/admin/manage-users/delete/{id}', 'Administration\UsersController@destroy')->name('Admin-deleteUser');
	/* Manage Categories Routs */
	Route::get('/admin/manage-categories', 'Administration\CategoriesController@index')->name('manage-categories');
	Route::get('/admin/manage-categories/add', 'Administration\CategoriesController@create')->name('add-categories');
	Route::post('/admin/manage-categories/add', 'Administration\CategoriesController@store');
	Route::get('/admin/manage-categories/show/{id}', 'Administration\CategoriesController@show')->name('show-categories');
	Route::get('/admin/manage-categories/edit/{id}', 'Administration\CategoriesController@edit')->name('edit-categories');
	Route::post('/admin/manage-categories/edit/{id}', 'Administration\CategoriesController@update')->name('update-categories');
	Route::delete('/admin/manage-categories/delete/{id}', 'Administration\CategoriesController@destroy')->name('delete-categories');
	/* Manage Items Routs */
	Route::get('/admin/manage-items', 'Administration\ItemsController@index')->name('manage-items');
	Route::get('/admin/manage-items/add', 'Administration\ItemsController@create')->name('add-items');
	Route::post('/admin/manage-items/add', 'Administration\ItemsController@store');
	Route::get('/admin/manage-items/show/{id}', 'Administration\ItemsController@show')->name('show-items');
	Route::get('/admin/manage-items/edit/{id}', 'Administration\ItemsController@edit')->name('edit-items');
	Route::post('/admin/manage-items/edit/{id}', 'Administration\ItemsController@update')->name('update-items');
	Route::delete('/admin/manage-items/delete/{id}', 'Administration\ItemsController@destroy')->name('delete-items');
});
