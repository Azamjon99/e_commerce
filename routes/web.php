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

Route::get('/', function () {
return redirect("/login");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/products', 'ProductsController@products')->name('allProduct');
//show man products
Route::get('/manProducts', 'ProductsController@menProducts')->name('manProduct');

//show women products
Route::get('/womenProducts', 'ProductsController@womenProducts')->name('womenProduct');

// search
Route::get('/search', 'ProductsController@search')->name('search');


Route::get('/products/AddToCart/{id}', 'ProductsController@addToCart')->name('AddToCart');

//carts
Route::get('/carts', 'ProductsController@showCarts')->name('cartItems');
//delete cart
Route::get('/products/DeleteCart/{id}', 'ProductsController@DeleteCart')->name('DeleteCart');
//increase number of product
Route::get('/products/increaseProduct/{id}', 'ProductsController@increaseProduct')->name('increaseProduct');


//decrease number of product
Route::get('/products/decreaseProduct/{id}', 'ProductsController@decreaseProduct')->name('decreaseProduct');

//restrict access
Route::get('/admin/products', 'Admin\AdminController@index')->name('admin');
//show update information page
Route::get('/admin/products/{id}', 'Admin\AdminController@editImage')->name('admineditProductImageForm');
Route::get('/admin/products/edit/{id}', 'Admin\AdminController@editProduct')->name('admineditProductForm');
Route::get('/admin/deleteProduct/{id}', 'Admin\AdminController@deleteProduct')->name('adminDeleteProduct');


// update image
Route::post('/admin/update/{id}', 'Admin\AdminController@updateImage')->name('adminDeleteProductr');

// update content
Route::post('/admin/updateContent/{id}', 'Admin\AdminController@update')->name('adminDeleteProducte1');

//display create product

Route::get('/admin/createProduct', 'Admin\AdminController@createProduct')->name('createProduct');


// create product
Route::post('/admin/CreateNewProduct', 'Admin\AdminController@CreateNewProduct')->name('CreateNewProduct');

//delete product

//show payment page
Route::get('/paymentPage', 'Payment\PaymentsController@payment')->name('paymentPage');
//create order
Route::get('/products/createOrder', 'ProductsController@createOrder')->name('createOrder');

Route::get('/checkout', 'ProductsController@checkout')->name('checkout');
