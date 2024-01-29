<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;



Route::group(['middleware' => ['auth','hakakses:admin,user']], function(){
    Route::get('/', function () {
        return view('welcome');
    })->middleware('auth');

    Route::get('/home', [TransaksiController::class, 'homes'])->name('homes')->middleware('auth');
    Route::get('/order', [TransaksiController::class, 'order'])->name('order')->middleware('auth');
    Route::get('/customer', [TransaksiController::class, 'customer'])->name('customer')->middleware('auth');
    Route::get('/siswa', [TransaksiController::class, 'siswa'])->name('siswa')->middleware('auth');
    Route::get('/kelas', [TransaksiController::class, 'kelas'])->name('kelas')->middleware('auth');
    Route::get('/pembayaran', [TransaksiController::class, 'pembayaran'])->name('pembayaran')->middleware('auth');
    Route::get('/spp', [TransaksiController::class, 'spp'])->name('spp')->middleware('auth');
    Route::get('/histori', [TransaksiController::class, 'histori'])->name('histori')->middleware('auth');
    Route::get('/petugas', [TransaksiController::class, 'petugas'])->name('petugas')->middleware('auth');
    Route::post('/custinput', [TransaksiController::class, 'custinput'])->name('custinput');
    Route::post('/ordinput', [TransaksiController::class, 'ordinput'])->name('ordinput');
    Route::post('/siswainput', [TransaksiController::class, 'siswainput'])->name('siswainput');
    Route::post('/kelasinput', [TransaksiController::class, 'kelasinput'])->name('kelasinput');
    
    Route::get('/generate-faktur/{id_pembayaran}', [TransaksiController::class, 'generateFaktur'])->name('faktur');

    Route::post('/pembayaraninput', [TransaksiController::class, 'pembayaraninput'])->name('pembayaraninput');
    Route::post('/customeredit/{idc}', [TransaksiController::class, 'custedit'])->name('custedit');
    Route::post('/siswaedit/{nisn}', [TransaksiController::class, 'siswaedit'])->name('siswaedit');
    Route::post('/kelasedit/{id_kelas}', [TransaksiController::class, 'kelasedit'])->name('kelasedit');
    Route::post('/sppedit/{id_spp}', [TransaksiController::class, 'sppedit'])->name('sppedit');
    Route::post('/ordedit/{nofaktur}', [TransaksiController::class, 'ordedit'])->name('ordedit');
    Route::get('/tambahpembayaran/{id_pembayaran}', [TransaksiController::class, 'tambahpembayaran'])->name('tambahpembayaran');
    Route::get('/hapuscust/{idc}', [TransaksiController::class, 'custhapus'])->name('custhapus');
    Route::get('/hapusord/{nofaktur}', [TransaksiController::class, 'ordhapus'])->name('ordhapus');
    Route::get('/hapussiswa/{nisn}', [TransaksiController::class, 'siswahapus'])->name('siswahapus');
    Route::get('/hapuspembayaran/{nisn}', [TransaksiController::class, 'pembayaranhapus'])->name('pembayaranhapus');
    Route::get('/hapuskelas/{id_kelas}', [TransaksiController::class, 'kelashapus'])->name('kelashapus');
    
});

Route::group(['middleware' => ['auth','hakakses:admin']], function(){
    Route::get('/datauser', [TransaksiController::class, 'datau'])->name('datau')->middleware('auth');
});
Route::get('/login', [loginController::class, 'login'])->name('login');
    Route::post('/loginuser', [loginController::class, 'loginuser'])->name('loginuser');
    Route::get('/register', [loginController::class, 'register'])->name('register');
    Route::post('/registeruser', [loginController::class, 'registeruser'])->name('registeruser');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
    Route::get('/{any}', function () {
        return View::make('tampil.error');
    })->where('any', '.*');
    
    Route::get('/{any}', function () {
        return View::make('tampil.error');
    })->where('any', '.*');
    
?>