<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DataBeasiswaController;
use App\Http\Controllers\EksternalBeasiswaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DaftarBeasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;

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





// Login
Route::middleware('guest')->group(function(){

    // Login
    Route::post('/login/auth',[LoginController::class,'store'])->name('login');
    Route::get('/login/auth',[LoginController::class,'create']);

});

Route::middleware('auth')->group(function(){
        // Daftar Beasiswa
        Route::get('/daftar-beasiswa',[DaftarBeasiswaController::class,'create'])->name('daftar-beasiswa');

        Route::post('/daftar-beasiswa',[DaftarBeasiswaController::class,'store'])->name('store-daftar-beasiswa');
});

Route::group(
    ['middleware'=>['auth','role']],
    function(){

        //Laman admin
        Route::get('/admin-side', [AdminController::class, 'index']);
        Route::get('/berita-admin', [BeritaController::class, 'index']);
        Route::get('/tambah-berita-admin', [BeritaController::class, 'create']);
        Route::get('/ubah-berita/{id}', [BeritaController::class, 'edit']);
        Route::post('/edit-berita/{id}', [BeritaController::class, 'update'])->name('berita.ubah');
        Route::get('/berita/hapus/{id}', [BeritaController::class, 'destroy'])->name('berita.hapus');
        
        Route::get('/create-data-beasiswa/{tahun}',[
            DataBeasiswaController::class,'create'])->name('create-data-beasiswa');
        Route::post('/create-data-beasiswa/{tahun}',
            [DataBeasiswaController::class,'store'])->name('store-data-beasiswa');

        Route::get('/hapus-data-beasiswa/{id}/{tahun}',
            [DataBeasiswaController::class,'destroy'])->name('hapus-data-beasiswa');

        // Blog admin
        Route::get('/create-blog/{types}',
            [BlogController::class,'create'])->name('create-blog');
        Route::post('/create-blog',
            [BlogController::class,'store'])->name('store-blog');

        // For upload an image
        Route::post("/upload",
            [BlogController::class,'upload']
        );
    }
);

// Dashboard
Route::get('/dashboard',function(){
    return view('admin.dashboard');
});

Route::get('/about',function(){
    return view('about');
});

// Home
Route::get('/',
    [HomeController::class,'index']
)->name('home');


// Jenis Beasiswa
Route::get('/beasiswaInternal',function(){
    return view('jenisbeasiswa.internal');
});
Route::get('/beasiswaEksternal',
    [EksternalBeasiswaController::class,'index'])->name('beasiswaEksternal');

// Seleksi Beasiswa
Route::get('/seleksi',
    [ DaftarBeasiswaController::class,'show']
)->name('seleksi');

// Data Beasiswa
Route::get('dataBeasiswa/{tahun}',[DataBeasiswaController::class,'index'])->name('dataBeasiswa');

// News
Route::get('{id}/',[BlogController::class,'show'])->name('article');

// Log out
Route::post('logout', LogoutController::class)->name('logout');




