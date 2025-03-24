<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Services;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Profile;
use App\Http\Livewire\Pages\Contact;
use App\Http\Livewire\Pages\NewsAndAnnouncements;
use App\Http\Livewire\Pages\AnnouncementDetail;
use App\Http\Livewire\Services\KkRegistration;
use App\Http\Livewire\Services\AktaRegistration;

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

Route::get('/', \App\Http\Livewire\Pages\Home::class)->name('home');
Route::get('/services', Services::class)->name('services');
Route::get('/kontak', Contact::class)->name('kontak');

// News and Announcements Routes
Route::get('/pengumuman', NewsAndAnnouncements::class)->name('pengumuman');
Route::get('/pengumuman/{id}', AnnouncementDetail::class)->name('pengumuman.detail');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    // Protected routes go here
    Route::get('/profile', Profile::class)->name('profile');
    
    // Protected service routes
    Route::prefix('layanan')->group(function () {
        Route::get('/daftar-ktp', function () {
            return view('services.ktp');
        })->name('services.ktp');
        
        Route::get('/status-ktp', function () {
            return view('services.status');
        })->name('services.status');

        // KK Service Routes
        Route::get('/daftar-kk', KkRegistration::class)->name('services.kk');
        Route::get('/status-kk', function () {
            return view('services.status-kk');
        })->name('services.status-kk');

        // Akta Service Routes
        Route::get('/daftar-akta', AktaRegistration::class)->name('services.akta');
        Route::get('/status-akta', function () {
            return view('services.status-akta');
        })->name('services.status-akta');
    });
});
