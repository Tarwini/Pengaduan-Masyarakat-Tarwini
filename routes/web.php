<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoregionController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;

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
    return view('landing');
});

Route::get('/logins', function () {
    return view('dashboard.login');
})->name('login');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::get('/register', function () {
    return view('register');
});

Route::post('postregister', 'LoginController@postRegis')->name('register');

//regis
Route::get('/register', 'RegisController@form');
Route::post('/register', 'LoginController@postregistrasi');
Route::POST('/getdesa', 'IndoregionController@getDesa')->name('getDesa');
Route::POST('/getKota', 'IndoregionController@getKota')->name('getKota');
Route::POST('/getkecamatan', 'IndoregionController@getkecamatan')->name('getKecamatan');
Route::POST('/getkabupatan', 'IndoregionController@getkabupatan');
// Route::get('dashboard', function () {
    //     return view('dashboard');
    // });
    
    // pengaduan


// tanggapan

//petugas



Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas,masyarakat']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });

    //pengaduan
Route::get('/pengaduan', 'PengaduanController@index');
Route::get('/pengaduan/create', 'PengaduanController@create');
Route::POST('/pengaduan/store', 'PengaduanController@store');
Route::get('/pengaduan/detail/{id_pengaduan}', 'PengaduanController@show');
Route::PUT('/pengaduan/update/{id_pengaduan}', 'PengaduanController@update');
Route::get('/pengaduan/hapus/{id_pengaduan}', 'PengaduanController@destroy');

//petugas
Route::get('/petugas', 'PetugasController@index');
Route::get('/petugas/create', 'PetugasController@create');
Route::POST('/petugas/store', 'PetugasController@store')->name('store');

//masyarakat
Route::get('/masyarakat', 'MasyarakatController@index');   

//laporan
Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::post('/getlaporan', 'LaporanController@getlaporan')->name('laporan.getlaporan');

Route::get('/cetak', 'PengaduanController@cetak');

});

Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas']], function() {
  //tanggapan
Route::get('/tanggapan', 'TanggapanController@index');
Route::post('/tanggapan/create', 'TanggapanController@statusOnchange')->name('tanggapan');
Route::post('/tanggapan/createOrUpdate', 'TanggapanController@createOrUpdate')->name('tanggapan.createOrUpdate'); 


});

Route::group(['middleware' => ['auth', 'ceklevel:admin,petugas,masyarakat']], function() {
   
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
   
});




   




