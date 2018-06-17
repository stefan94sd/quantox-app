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

Route::match(['get', 'post'], '/', function () {
    return view('god.login');
});
Route::match(['get', 'post'], '/layout', function () {
    return view('layouts.left-sidebar-menu');
});
Route::match(['get', 'post'], '/loginGodAjax', "GodController@loginGod");
Route::match(['get', 'post'], '/logoutGodAjax', "GodController@logOut");
Route::match(['get', 'post'], '/crateHumanAjax', "GodController@createHuman");
Route::match(['get', 'post'], '/listFollowersAjax', "GodController@listFollowers");
Route::match(['get', 'post'], '/endLifeAjax', "GodController@killHuman");

Route::match(['get', 'post'], '/home', function () {
    return view('god.home');
})->middleware("session");
Route::match(['get', 'post'], '/createHuman', function () {
    return view('human.create');
})->middleware("session");
Route::match(['get', 'post'], '/listHumans', function () {
    return view('human.list');
})->middleware("session");
