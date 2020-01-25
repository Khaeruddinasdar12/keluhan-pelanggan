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
	$data = \App\Departmen::select('id', 'nama')->get();
    return view('form', ['data' => $data]);
});

Auth::routes(['register'=> false, 'reset'=>false]); 
Route::post('komentar', 'ClientKomentar@store')->name('input.komentar'); // INPUT KOMENTAR OLEH PELANGGAN
// Route::get('/home', 'HomseController@index')->name('home');

//Mengambil seluruh data komentar
Route::get('komentar', 'TableApi@komentar');
Route::get('komentar/{id}', 'TableApi@detail_komentar');


Route::get('komentar_terbaca', 'TableApi@tabel_komentar_terbaca')->name('table.komentar_terbaca');
Route::get('komentar_belumterbaca', 'TableApi@tabel_komentar_belum_dibaca')->name('table.komentar_belumterbaca'); 
Route::get('test', 'TableApi@test');

Route::prefix('app/admin')->group(function() {
	Route::get('/', 'Komentar@index')->name('admin.index');
	Route::get('/komentar/terbaca', 'Komentar@komentar_terbaca')->name('terbaca');
	Route::get('/komentar/belum-dibaca', 'Komentar@komentar_belumterbaca')->name('belumterbaca');
	Route::get('komentar/{id}/detail', 'TableApi@detail')->name('table.detail'); //tidak boleh di ubah rutenya
	Route::delete('komentar/{id}', 'Komentar@delete');
	Route::put('feedback', 'Komentar@feedback')->name('feedback');

	// Route::post('komentar', 'Komentar@store')->name('input.komentar');
});
