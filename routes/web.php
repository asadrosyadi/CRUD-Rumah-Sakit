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
    return view('index');
});

Route::resource('petugas', 'PetugasController');
Route::get('/laporanpetugas', 'PetugasController@laporan');
Route::resource('pasien', 'PasienController');
Route::get('/laporanpasien', 'PasienController@laporan');
Route::resource('dokter', 'DokterController');
Route::get('/laporandokter', 'DokterController@laporan');
Route::resource('tindakan', 'TindakanController');
Route::get('/laporantindakan', 'TindakanController@laporan');
Route::resource('obat', 'ObatController');
Route::resource('pendaftaran', 'PendaftaranController');
Route::resource('rawatpasien', 'RawatpasienController');
Route::resource('rawattindakan', 'RawattindakanController');
Route::get('/laporanrawattindakan', 'RawattindakanController@laporan');
Route::resource('rawatobat', 'RawatobatController');
Route::get('/laporanrawatobat', 'RawatobatController@laporan');

//backup
Route::post('backups/upload', ['as'=>'backups.upload', 'uses'=>'BackupsController@upload']);
Route::post('backups/{fileName}/restore', ['as'=>'backups.restore', 'uses'=>'BackupsController@restore']);
Route::get('backups/{fileName}/dl', ['as'=>'backups.download', 'uses'=>'BackupsController@download']);
Route::resource('backups','BackupsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
