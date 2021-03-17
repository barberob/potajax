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

Route::get('/add/favorites/{id}', 'FavoritesController@add')->name('add-favorites');



// Route vers la page Mon Compte
Route::get('/myaccount', 'UsersController@index')->name('myaccount');

Route::get('/account', 'UsersController@index')->name('account');
Route::get('/account/add-shop', 'ShopsController@addShop')->middleware('manager')->name('add_shop');
Route::get('/account/update-shop/{id}', 'ShopsController@updateShop')->middleware('manager')->name('update_shop');

Route::post('/account/post-add-update-shop/{id?}', 'ShopsController@postAddUpdateShop')
    ->middleware('manager')
    ->name('post_add_update_shop');


// La page où on présente les liens de redirection vers les providers
Route::get("social-login", "SocialiteController@socialLogin");
Route::get("social-login-manager", "SocialiteManagerController@socialManagerLogin");

// Route pour la redirection vers le provider
Route::get('login/{provider}', 'SocialiteController@redirectToProvider')->name('socialite.redirect');
Route::get('login/manager/{provider}', 'SocialiteManagerController@redirectToProviderManager')->name('socialite.manager');

// Route pour le callback du provider
Route::get('login/callback/{provider}', 'SocialiteController@handleProviderCallback')->name('socialite.callback');

// Route du listage des shops
Route::get('/shops', 'ShopsController@listShop')->name('shops');

// Route pour récupérer les catégories
Route::get('/API/get-categories-list', 'CategoriesController@apiGetCategories')->name('api_get_categories');

// Route pour supprimer des images
Route::get('/API/delete-picture/{id}', 'PictureController@ajaxDelete')->name('delete_picture');

// Routes pour créer les markers
Route::get('/API/get_marker', 'MapController@get')->name('create_Marker');
Route::post('/API/get_marker', 'MapController@post')->name('create_Marker');
