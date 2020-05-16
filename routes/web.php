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

//Rekap
Route::get('/export-excel','DetailController@exportExcel');

//login
Route::get('/','AuthController@login');
Route::get('/login','AuthController@login')->name('login');
Route::get('/register','AuthController@register')->name('register');
Route::post('/postregister','AuthController@postregister');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
//akhiran login

//Rekap
Route::get('/rekap','DetailController@rekap');
Route::get('/rekap/{id}/lihat','DetailController@lihat');
//Akhiran Rekap

//Hak Akses admin
Route::group(['middleware' => ['auth','CheckRole:admin']], function(){

	//Siswa
	Route::get('/siswa', 'SiswaController@index');
	Route::post('/siswa/create', 'SiswaController@create');
	Route::get('/siswa/{id}/edit','SiswaController@edit');
	Route::get('/siswa/{id}/delete','SiswaController@delete');
	Route::post('/siswa/{id}/update','SiswaController@update');
	//Akhiran Siswa

	//Rayon
	Route::get('/rayon','RayonController@index');
	Route::post('/rayon/create','RayonController@create');
	Route::get('/rayon/{id}/edit','RayonController@edit');
	Route::get('/rayon/{id}/delete','RayonController@delete');
	Route::post('/rayon/{id}/update','RayonController@update');
	//Akhiran Rayon

	//rombel
	Route::get('/rombel','RombelController@index');
	Route::post('/rombel/create','RombelController@create');
	Route::get('/rombel/{id}/edit','RombelController@edit');
	Route::get('/rombel/{id}/delete','RombelController@delete');
	Route::post('/rombel/{id}/update','RombelController@update');
	//Akhiran Rombel

	//wali
	Route::get('/wali','WaliController@index');
	Route::post('/wali/create','WaliController@create');
	Route::get('/wali/{id}/edit','WaliController@edit');
	Route::post('/wali/{id}/update','WaliController@update');
	Route::get('/wali/{id}/delete','WaliController@delete');
	Route::get('/wali/{id}/tambah','WaliController@tambah');
	Route::get('/wali/{id}/{no}/add','WaliController@add');
	//Akhiran Wali


});
//akhiran hak akses




//awal home
Route::get('/home','HomeController@index');
//akhiran home





// hak akses siswa
Route::group(['middleware' => ['auth','CheckRole:siswa']], function(){

//profile
Route::get('/profile','ProfileController@index');
Route::get('/profile/password','ProfileController@password');
Route::post('/profile/{id}/reset','ProfileController@reset');
//akhiran profile


//Jadwal
Route::get('/set','SetController@index');
Route::post('/set/create','SetController@create');
Route::get('/set/{id}/delete','DetailController@delete');




Route::get('/detail','DetailController@index');
Route::post('/detail/{id}/update','DetailController@update');
//Akiran Jadwal




//kegiatan
Route::get('/kegiatan','KegiatanController@index');
Route::get('/kegiatan/{id}/lihat','KegiatanController@lihat');

//AKhiran Kegiatan




});
//akhiran hak akses siswa


Route::group(['middleware' => ['auth','CheckRole:wali']],function(){
	Route::get('/wali/validasi','WaliController@validasi');
	Route::post('/wali/{id}/hijau','WaliController@hijau');
});
