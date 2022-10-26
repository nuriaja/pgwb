<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\projectController;
use App\Http\Controllers\kontakController;
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

// admin
Route::middleware('auth')->group(function(){
   Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
   Route::get('/mastersiswa/(id_siswa)/hapus',[SiswaController::class,'hapus'])->name('mastersiwa.hapus');
   Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');
   Route::resource('/project',projectcontroller::class);
   Route::resource('/kontak',kontakController::class);
   Route::Resource('/Siswa', SiswaController::class);
});
// Route guest
Route::middleware('guest')->group(function(){
   Route::get('/login', [logincontroller::class, 'index'])->name('login');
   Route::post('/login', [logincontroller::class, 'authenticate']);
});

// Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
// Route::get('/mastersiswa/(id_siswa)/hapus',[SiswaController::class,'hapus'])->name('mastersiwa.hapus');
// Route::get('/login', [logincontroller::class, 'index'])->name('login');
// Route::post('/login', [logincontroller::class, 'authenticate']);
// Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');
// Route::resource('/project',projectcontroller::class);
// Route::resource('/kontak',kontakController::class);


// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/project', function () {
//     return view('project');
// });
// Route::get('/mastersiswa', function () {
//     return view('admin.mastersiswa');
// });
// Route::get('/masterproject', function () {
//     return view('admin.masterproject');
// });
Route::get('/masterkontak', function () {
    return view('admin.masterkontak');
});
Route::get('/', function () {
    return view('admin.app');
});
