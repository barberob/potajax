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

//Route::get('/', 'IndexController@index')->name('index');

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/', 'CategoriesController@listCat')->name('index');

Route::get('/map', 'SubcategoriesController@listAll')->name('Allmap');
//Route::get('/map', 'SubcategoriesController@listSubcat')->name('map');
Route::get('/map/{category_id}', 'SubcategoriesController@listCat')->name('Catmap');
Route::get('/map/{category_id}/{subcategory_id}', 'SubcategoriesController@listSubcat')->name('Subcatmap');



// Route vers la page d'un shop
Route::get('/shop/{id}', 'ShopController@details')->name('shop');

// Route vers la page Mes Favoris
Route::get('/favorites', 'FavoritesController@index')->name('favorites');

Route::get('/add/favorites', 'FavoritesController@add')->name('add-favorites');


Route::get('/account', 'UsersController@index')->name('account');

// La page où on présente les liens de redirection vers les providers
Route::get("social-login", "SocialiteController@socialLogin");

// La redirection vers le provider
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('socialite.redirect');

// Le callback du provider
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('socialite.callback');

Route::get('/shops', 'ShopsController@listShop')->name('shops');



Route::get('/API/get_marker', 'MapController@get')->name('create_Marker');
Route::post('/API/get_marker', 'MapController@post')->name('create_Marker');
