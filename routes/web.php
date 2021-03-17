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

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/', 'CategoriesController@listCat')->name('index');

Route::get('/map', 'SubcategoriesController@listAll')->name('Allmap');
Route::post('/map?search=', 'MapController@post')->name('Recherche');
//Route::get('/map', 'SubcategoriesController@listSubcat')->name('map');
Route::get('/map/{category_id}', 'SubcategoriesController@listCat')->name('Catmap');
Route::get('/map/{category_id}/{subcategory_id}', 'SubcategoriesController@listSubcat')->name('Subcatmap');

// Route vers la page d'un shop
Route::get('/shop/{id}', 'ShopController@details')->name('shop');

// Route vers la page Mes Favoris
Route::get('/favorites', 'FavoritesController@index')->name('favorites');

Route::post('/API/get_favorite', 'FavoritesController@post')->name('create_Favorite');
Route::get('/API/get_favorite', 'FavoritesController@get')->name('create_Favorite');
//Route::get('/add/favorites/{id}', 'FavoritesController@add')->name('add-favorites');

// Route vers la page Mon Compte
Route::get('/myaccount', 'UsersController@index')->name('myaccount');

Route::get('/account', 'UsersController@index')->name('account');
Route::get('/account/add-shop', 'ShopsController@addShop')->middleware('manager')->name('add_shop');
Route::get('/account/update-shop/{id}', 'ShopsController@updateShop')->middleware('manager')->name('update_shop');
Route::post('/account/post-add-shop', 'ShopsController@postAddShop')->middleware('manager')->name('post_add_shop');

// La page où on présente les liens de redirection vers les providers
Route::get("social-login", "SocialiteController@socialLogin");

// La redirection vers le provider
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('socialite.redirect');

// Le callback du provider
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('socialite.callback');

Route::get('/shops', 'ShopsController@listShop')->name('shops');


Route::get('/API/get-categories-list', 'CategoriesController@apiGetCategories')->name('api_get_categories');
Route::get('/API/delete-picture/{id}', 'PictureController@ajaxDelete')->name('delete_picture');

Route::get('/API/get_marker', 'MapController@get')->name('create_Marker');
Route::post('/API/get_marker', 'MapController@post')->name('create_Marker');
