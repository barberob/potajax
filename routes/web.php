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

Auth::routes();

Route::get('/', 'CategoriesController@listCat')->name('index');

Route::get('/map', 'SubcategoriesController@listSubcat')->name('map');
Route::get('/map/{category_id}', 'SubcategoriesController@listSubcat')->name('map');

// Route vers la page Mes Favoris

Route::get('/favorites', 'FavoritesController@index')->name('favorites');

// Route vers la page Mon Compte

Route::get('/myaccount', 'UsersController@index')->name('myaccount');

// La page où on présente les liens de redirection vers les providers
Route::get("social-login", "SocialiteController@socialLogin");

// La redirection vers le provider
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('socialite.redirect');

// Le callback du provider
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('socialite.callback');
