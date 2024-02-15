<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
});

Route::get('template', function () {
    return view('template.navbar');
});

// LOGIN
Route::get('/login',[LoginController::class, 'login']);
Route::post('/login',[LoginController::class, 'auth']);
Route::get('/home',[LoginController::class, 'hm']);
Route::get('logout',[LoginController::class, 'logout']);

// SISWA
Route::get('siswa', [SiswaController::class, 'index']);
Route::get('siswa/create', [SiswaController::class, 'create']);
Route::post('siswa/add', [SiswaController::class, 'add']);
Route::get('siswa/delete/{nisn}', [SiswaController::class, 'delete']);
Route::get('siswa/edit/{nisn}', [SiswaController::class, 'edit']);
Route::post('siswa/update/{nisn}', [SiswaController::class, 'update']);

// USER
Route::get('user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user/add', [UserController::class, 'add']);
Route::post('user/cari', [UserController::class, 'cari']);
Route::get('user/edit/{id_user}', [UserController::class, 'edit']);
Route::post('user/update/{id_user}', [UserController::class, 'update']);
Route::get('user/delete/{id_user}', [UserController::class, 'delete']);


// KELAS
Route::get('kelas',[KelasController::class, 'index']);
Route::get('kelas/create',[KelasController::class, 'create']);
Route::post('kelas/add',[KelasController::class, 'add']);
Route::get('kelas/edit/{id_kelas}',[KelasController::class, 'edit']);
Route::post('kelas/update/{id_kelas}',[KelasController::class, 'update']);
Route::get('kelas/delete/{id_kelas}',[KelasController::class, 'delete']);

// GURU 
Route::get('guru', [GuruController::class, 'index']);
Route::get('guru/create', [GuruController::class, 'create']);
Route::post('guru/add', [GuruController::class, 'add']);
Route::get('guru/edit/{id_guru}', [GuruController::class, 'edit']);
Route::post('guru/update/{id_guru}', [GuruController::class, 'update']);
Route::get('guru/delete/{id_guru}', [GuruController::class, 'delete']);

// KEHADIRAN
Route::get('kehadiran',[KehadiranController::class, 'index']);
Route::get('kehadiran/create',[KehadiranController::class, 'create']);
Route::post('kehadiran/add',[KehadiranController::class, 'store']);
Route::get('kehadiran/delete/{id_kehadiran}',[KehadiranController::class, 'delete']);
Route::get('kehadiran/edit/{id_kehadiran}',[KehadiranController::class, 'edit']);
Route::post('kehadiran/update/{id_kehadiran}',[KehadiranController::class, 'update']);
// Route::post('kehadiran/store',[KehadiranController::class, 'store']);

// INDUSTRI
Route::get('industri', [IndustriController::class, 'index']);
Route::get('industri/create', [IndustriController::class, 'create']);
Route::post('industri/add', [IndustriController::class, 'add']);
Route::get('industri/delete/{id_industri}', [IndustriController::class, 'delete']);
Route::get('industri/edit/{id_industri}', [IndustriController::class, 'edit']);
Route::post('industri/update/{id_industri}', [IndustriController::class, 'update']);

// MONITORING
Route::get('monitoring', [MonitoringController::class, 'index']);
Route::get('monitoring/create', [MonitoringController::class, 'create']);
Route::post('monitoring/add', [MonitoringController::class, 'add']);
Route::post('monitoring/edit/{id_monitoring}', [MonitoringController::class, 'edit']);
Route::get('monitoring/update/{id_monitoring}', [MonitoringController::class, 'update']);
Route::get('monitoring/delete/{id_monitoring}', [MonitoringController::class, 'delete']);

// AKTIVITAS
Route::get('aktivitas',[AktivitasController::class, 'index']);
Route::get('aktivitas/create',[AktivitasController::class, 'create']);
Route::post('aktivitas/add',[AktivitasController::class, 'add']);

// TEMPLATE
Route::get('tmp', [TemplateController::class, 'index']);
Route::get('tmp/user', [TemplateController::class, 'user']);
Route::get('dasboard', [TemplateController::class, 'ds']);