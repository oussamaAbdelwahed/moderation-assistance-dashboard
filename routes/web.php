<?php

use App\Http\Controllers\AjaxDashboardChartStatsController;
use App\Http\Controllers\PostStatsController;
use App\Http\Controllers\ProfileStatsController;

use App\Http\Controllers\TestDBController;
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
    return view('welcome');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']])->middleware("super_moderator");
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


//fo the TestDBController
//Route::get("/test1",[TestDBController::class,"test1"]);
Route::get("/ajax_test1",[TestDBController::class,"ajaxTest1"]);
//Route::get("/test2",[TestDBController::class,"ajaxView"]);
Route::get("/stats/get-last7days-stats-g1",[AjaxDashboardChartStatsController::class,"getAllChartsStatsForGroup1"]);
Route::get("/stats/get-last7days-stats-g2",[AjaxDashboardChartStatsController::class,"getAllChartsStatsForGroup2"]);
Route::get("/stats/get-last-signaled-posts-and-profiles-stats-g3",[AjaxDashboardChartStatsController::class,"getLastSignaledPostsAndProfilesGroup3Stats"]);

Route::get("/post/signaled-posts",[PostStatsController::class,"getLast5SignaledPosts"])->name("all-signaled-posts");
Route::get("/blog-users/signaled-profiles",[ProfileStatsController::class,"getLast5SignaledProfiles"])->name("all-signaled-profiles");
Route::get("/blog-users/blacklisted-profiles",[ProfileStatsController::class,"getBlacklistedProfiles"])->name("blacklisted-profiles");
