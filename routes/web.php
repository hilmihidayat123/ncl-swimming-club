<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



#Route untuk Tampilan Blade-->
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/pendaftaran', function () {
    return view('ncl.pendaftaran');
})->name('pendaftaran');

Route::get('/pelatih', function () {
    return view('ncl.pelatih');
})->name('pelatih');

Route::get('/pengumuman', function () {
    return view('ncl.pengumuman');
})->name('pengumuman');

Route::get('/lokasi', function () {
    return view('ncl.lokasi');
})->name('lokasi');


// ===== pendaftar =====
use App\Http\Controllers\PendaftarController;

Route::get('/pendaftaran', 
    [PendaftarController::class, 'create']
)->name('pendaftaran');

Route::post('/pendaftaran', 
    [PendaftarController::class, 'store']
)->name('pendaftaran.store');

Route::get('/admin/pendaftar', 
    [PendaftarController::class, 'index']
)->name('admin.pendaftar');

Route::get('/admin/pendaftar/{id}/{status}', 
    [PendaftarController::class, 'updateStatus']
)->name('admin.updateStatus');


// ===== layanan =====
use App\Http\Controllers\LayananController;

Route::get('/layanan', [LayananController::class, 'create'])->name('layanan.create');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');



// ===== Murid =====
use App\Http\Controllers\MuridController;

Route::prefix('admin')->group(function () {
    Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
    Route::get('/murid/create', [MuridController::class, 'create'])->name('murid.create');
    Route::post('/murid/store', [MuridController::class, 'store'])->name('murid.store');
    Route::get('/murid/edit/{id}', [MuridController::class, 'edit'])->name('murid.edit');
    Route::put('/murid/update/{id}', [MuridController::class, 'update'])->name('murid.update');
    Route::delete('/murid/delete/{id}', [MuridController::class, 'destroy'])->name('murid.destroy');
});


//---route untuk pelatih
use App\Http\Controllers\PelatihController;

Route::resource('admin/pelatih', PelatihController::class);
Route::get('/pelatih', [PelatihController::class, 'nclPelatih'])
    ->name('ncl.pelatih');

//---- route untuk pengumuman

use App\Http\Controllers\PengumumanController;

/* ===== FRONTEND ===== */
Route::get('/pengumuman', [PengumumanController::class, 'pengumuman']);

/* ===== ADMIN ===== */
Route::prefix('admin')->group(function () {
    Route::resource('pengumuman', PengumumanController::class);
});




// route untuk lokasi
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('lokasi', LocationController::class);
});

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/lokasi', [LocationController::class, 'frontend'])
    ->name('lokasi.frontend');


// ===== LOGIN ADMIN =====
use App\Http\Controllers\Admin\LoginController;



// ===== REGISTER ADMIN =====
use App\Http\Controllers\Admin\AdminRegisterController;
Route::get('/admin/register', [AdminRegisterController::class, 'index'])
    ->name('admin.register.form');

Route::post('/admin/register', [AdminRegisterController::class, 'store'])
    ->name('admin.register.store');
    

use App\Http\Controllers\Admin\AdminSettingsController;

Route::get('/admin/settings',[AdminSettingsController::class,'index'])
->name('admin.settings');

Route::put('/admin/settings',[AdminSettingsController::class,'update'])
->name('admin.settings.update'); 

use App\Models\Admin;





    // ===== Dashboard ADMIN =====
use App\Http\Controllers\Admin\DashboardController;
Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class, 'loginForm'])
        ->name('admin.login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('admin.login.process');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

  

    });
});

use App\Http\Controllers\JadwalController;

Route::prefix('admin')->group(function () {
    Route::resource('jadwal', JadwalController::class);
});

Route::get('/jadwal', [JadwalController::class, 'frontend'])
    ->name('jadwal.frontend');

// route untuk kendali tampilan homme di dashboard admin

use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroCardController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\AboutController;




// Prefix /admin supaya semua ada di area admin
Route::prefix('admin')->group(function () {

// Resourceful routes untuk Hero
   
Route::prefix('admin')->name('hero.')->group(function () {
    Route::get('/hero', [HeroController::class, 'index'])->name('index');
    Route::get('/hero/create', [HeroController::class, 'create'])->name('create');
    Route::post('/hero', [HeroController::class, 'store'])->name('store');
    Route::get('/hero/{hero}/edit', [HeroController::class, 'edit'])->name('edit');
    Route::put('/hero/{hero}', [HeroController::class, 'update'])->name('update');
    Route::delete('/hero/{hero}', [HeroController::class, 'destroy'])->name('destroy');




Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('herocard', HeroCardController::class);
});



   
});

  


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('kelas', KelasController::class);
});


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('ctas', CtaController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('gallery', GalleryController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('about', AboutController::class);
});




});


