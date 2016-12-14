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

Route::get('/', function () {
    return view('rew.welcome');
});

Route::get('/amr','queryAMR_TM_controller@getAMR_TM');
Route::post('/amr','queryAMR_TM_controller@saveExcel');

Route::get('/erpdaily','queryERP_CH_controller@getERP_CH_Daily');
Route::post('/erpdaily','queryERP_CH_controller@saveExcel_Daily');

Route::get('/erpmonthly','queryERP_CH_controller@getERP_CH_Monthly');
Route::post('/erpmonthly','queryERP_CH_controller@saveExcel_Monthly');

Route::get('/comp','filesController@Comparer');
Route::post('/comp','filesController@saveExcelComp');

//save files and move
Route::get('/savedaily','queryERP_CH_controller@saveExcel_Daily');
Route::get('/savemonthly','queryERP_CH_controller@saveExcel_Monthly');
Route::get('/savecomp','filesController@saveExcelComp');
Route::get('/movefiles','filesController@move_files');