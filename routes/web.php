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

/*
|--------------------------------------------------------------------------
| Static pages
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/', 'PageController@home')->name('home');
Route::get('/comingsoon', 'PageController@comingsoon');

// TRACK
Route::get('/seo-monitor', 'SEOMonitorController@index')->name('seomonitor');
Route::get('/seo-monitor/websites', 'SEOMonitorController@websites')->name('seomonitor.websites');
Route::get('/seo-monitor/keywords', 'SEOMonitorController@keywords')->name('seomonitor.keywords');

// EXPLORE
Route::get('/seo-monitor/explore', 'SEOMonitorController@explore')->name('seomonitor.explore');
Route::get('/seo-monitor/explore/keyword', 'SEOMonitorController@exploreKeyword')->name('seomonitor.explore.keyword');
Route::get('/seo-monitor/explore/website', 'SEOMonitorController@exploreWebsite')->name('seomonitor.explore.website');

/*
|--------------------------------------------------------------------------
| Resource CRUD
|--------------------------------------------------------------------------
*/

Route::get('/businesses', 'BusinessController@index')->name('businesses.index');
Route::get('/businesses/create', 'BusinessController@create')->name('businesses.create');
Route::post('/businesses/store', 'BusinessController@store')->name('businesses.store');
Route::get('/businesses/{id}', 'BusinessController@show')->name('businesses.show');
Route::get('/businesses/{id}/edit', 'BusinessController@edit')->name('businesses.edit');
Route::post('/businesses/{id}/update', 'BusinessController@update')->name('businesses.update');
Route::post('/businesses/{id}/delete', 'BusinessController@destroy')->name('businesses.destroy');

Route::get('/locations', 'LocationController@index')->name('locations.index');;
Route::get('/locations/create', 'LocationController@create')->name('locations.create');;
Route::post('/locations/store', 'LocationController@store')->name('locations.store');;
Route::get('/locations/{id}', 'LocationController@show')->name('locations.show');;
Route::get('/locations/{id}/edit', 'LocationController@edit')->name('locations.edit');;
Route::post('/locations/{id}/update', 'LocationController@update')->name('locations.update');;
Route::post('/locations/{id}/delete', 'LocationController@destroy')->name('locations.destroy');;

Route::get('/customers', 'CustomerController@index');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers/store', 'CustomerController@store');
Route::get('/customers/{id}', 'CustomerController@show');
Route::get('/customers/{id}/edit', 'CustomerController@edit');
Route::post('/customers/{id}/update', 'CustomerController@update');
Route::post('/customers/{id}/delete', 'CustomerController@destroy');

Route::get('/websites', 'WebsiteController@index')->name('websites.index');
Route::get('/websites/create', 'WebsiteController@create')->name('websites.create');
Route::post('/websites/store', 'WebsiteController@store')->name('websites.store');
Route::get('/websites/{id}', 'WebsiteController@show')->name('websites.show');
Route::get('/websites/{id}/edit', 'WebsiteController@edit')->name('websites.edit');
Route::post('/websites/{id}/update', 'WebsiteController@update')->name('websites.update');
Route::post('/websites/{id}/delete', 'WebsiteController@destroy')->name('websites.destroy');

Route::get('/trackers', 'TrackerController@index')->name('trackers.index');
Route::get('/trackers/create', 'TrackerController@create')->name('trackers.create');
Route::post('/trackers/store', 'TrackerController@store')->name('trackers.store');
Route::get('/trackers/scrape', 'TrackerController@scrapeAll')->name('trackers.scrapeAll');
Route::get('/trackers/{id}', 'TrackerController@show')->name('trackers.show');
Route::get('/trackers/{id}/edit', 'TrackerController@edit')->name('trackers.edit');
Route::post('/trackers/{id}/update', 'TrackerController@update')->name('trackers.update');
Route::post('/trackers/{id}/delete', 'TrackerController@destroy')->name('trackers.destroy');
Route::get('/trackers/{id}/scrape', 'TrackerController@scrape')->name('trackers.scrape');


Route::get('/keywords', 'KeywordController@index');
Route::get('/keywords/create', 'KeywordController@create');
Route::post('/keywords/store', 'KeywordController@store');
Route::get('/keywords/{id}', 'KeywordController@show');
Route::get('/keywords/{id}/edit', 'KeywordController@edit');
Route::post('/keywords/{id}/update', 'KeywordController@update');
Route::post('/keywords/{id}/delete', 'KeywordController@destroy');

Route::post('/serps/store', 'SERPController@store');
Route::post('/serps/{id}/delete', 'SERPController@destroy');