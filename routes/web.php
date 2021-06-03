<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DataPendudukController;


use Illuminate\Support\Facades\Route;

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






Route::get('/', [DesaController::class, 'index'])->name('home');



Route::get('/profile', [DesaController::class, 'profile']);



// Route::get('/agenda', 'AgendaController@index');
Route::get('/data-penduduk', [DataPendudukController::class, 'data']);
Route::get('/detail-penduduk/detail/{id}', [DataPendudukController::class, 'detailpenduduk']);
Route::get('/visi-misi', [DesaController::class, 'visi']);
Route::get('/pengaduan', [DesaController::class, 'pengaduan']);

Route::get('/album', [AlbumController::class, 'index'])->name('album');
Route::get('/album/{detail}', [AlbumController::class, 'detail'])->name('detail-album');
// Route::get('/album/{detail}/{photo}', [AlbumController::class, 'photo'])->name('photo');


Route::get('/list-aparatur', [DesaController::class, 'aparatur']);
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/surat', [SuratController::class, 'surat'])->name('surat');


Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita}/{slug}', [BeritaController::class, 'show']);




//LOGIN LOGOUT
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/postlogin', [AuthController::class, 'postlogin']);

Route::post('/surat', [SuratController::class, 'kirimPermintaan']);


Route::post('/pengaduan', [DesaController::class, 'kirimPengaduan']);


Route::group(['middleware' => 'auth'], function () {


    Route::get('/visimisi-admin', [AdminController::class, 'visimisi']);
    Route::post('/visimisi-admin', [AdminController::class, 'updateVisi']);



    Route::get('/profil-desa', [AdminController::class, 'profiledesa']);
    Route::post('/profil-desa/{id}', [AdminController::class, 'updateProfileDesa']);


    //ROUTE NOMOR PENTING ADMIN
    Route::get('/nomor-penting', [AdminController::class, 'nomorpenting']);
    Route::delete('/nomor-penting/{id}', [AdminController::class, 'deleteNoPenting']);
    Route::post('/nomor-penting', [AdminController::class, 'storeNoPenting']);







    //ROUTE PENDUDUK ADMIN
    Route::get('/pengaduan-admin', [AdminController::class, 'pengaduan']);
    Route::get('/pengaduan-admin/{id}', [AdminController::class, 'detailPengaduan']);
    Route::post('/approve-pengaduan/{id}', [AdminController::class, 'approve']);
    Route::delete('/pengaduan-admin/{id}', [AdminController::class, 'deletePengaduan']);





    //ROUTE PENDUDUK ADMIN
    Route::get('/edit-penduduk/{penduduk}', [DataPendudukController::class, 'edit']);
    Route::post('/edit-penduduk/{penduduk}', [DataPendudukController::class, 'update']);
    Route::delete('/list-penduduk/{penduduk}', [DataPendudukController::class, 'delete']);
    Route::get('/list-penduduk', [DataPendudukController::class, 'list']);
    Route::get('/input-penduduk', [DataPendudukController::class, 'add']);
    Route::post('/input-penduduk', [DataPendudukController::class, 'store']);



    //ROUTE ALBUM ADMIN
    Route::get('/album-admin', [AlbumController::class, 'albumAdmin'])->name('show');
    Route::post('/album-admin', [AlbumController::class, 'tambahAlbum'])->name('add');
    Route::delete('/album-admin/photo/{id}', [AlbumController::class, 'deletePhoto'])->name('delete-photo');
    Route::delete('/album-admin/delete/{id}', [AlbumController::class, 'delete'])->name('delete');
    Route::post('/album-admin/save', [AlbumController::class, 'savePhoto'])->name('save-photo');



    Route::get('/test', [AdminController::class, 'test'])->name('test');


    //ROUTE SURAT ADMIN
    Route::get('/surat-admin/lihat/{id}', [SuratController::class, 'detail'])->name('detail-surat');
    Route::get('/surat-admin', [SuratController::class, 'listsurat'])->name('list-surat');
    Route::delete('/surat-admin/delete/{id}', [SuratController::class, 'delete']);
    Route::post('/surat-admin', [SuratController::class, 'jsurat'])->name('jenis-surat');
    Route::delete('/surat-admin/{id}', [SuratController::class, 'hapus']);



    //ROUTE AGENDA ADMIN
    Route::get('/agenda-admin/edit/{id}', [AgendaController::class, 'edit'])->name('edit-agenda');
    Route::post('/agenda-admin/update/{id}', [AgendaController::class, 'update'])->name('update-agenda');
    Route::get('/agenda-admin', [AgendaController::class, 'show'])->name('list-agenda');
    Route::get('/agenda-admin/add', [AgendaController::class, 'add']);
    Route::post('/agenda-admin/add', [AgendaController::class, 'create']);
    Route::delete('/agenda-admin/{id}', [AgendaController::class, 'hapus']);


    //ROUTE APARATUR ADMIN
    Route::get('/aparatur-desa', [AdminController::class, 'aparatur']);
    Route::get('/edit-aparatur/{id}', [AdminController::class, 'edit'])->name('edit-aparatur');
    Route::post('/update-aparatur/{id}', [AdminController::class, 'update'])->name('update-aparatur');
    Route::delete('/aparatur-desa/{aparatur}', [AdminController::class, 'hapus']);
    Route::post('/aparatur-desa', [AdminController::class, 'aparaturstore']);



    //ROUTE BERITA ADMIN
    Route::delete('/list-berita/{id}', [BeritaController::class, 'deleteCategories']);
    Route::post('/list-berita', [BeritaController::class, 'addKategori'])->name('add-kategori');
    Route::get('/list-berita', [BeritaController::class, 'listberita']);
    Route::delete('/list-berita/delete/{idBerita}', [BeritaController::class, 'hapus']);
    Route::get('/list-berita/{idBerita}/{idCategories}', [BeritaController::class, 'editBerita'])->name('edit-berita');
    Route::post('/list-berita/{idBerita}/{idCategories}', [BeritaController::class, 'updateBerita'])->name('update-berita');
    Route::post('/tulis-berita', [BeritaController::class, 'store']);
    Route::get('/tulis-berita', [BeritaController::class, 'write']);
    Route::post('/upload', [BeritaController::class, 'upload'])->name('post.image');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/form', [AdminController::class, 'form']);

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
