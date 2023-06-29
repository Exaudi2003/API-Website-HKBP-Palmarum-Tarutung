<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RPPController;
use App\Http\Controllers\PelayanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\IbadahController;
use App\Http\Controllers\BaptisController;
use App\Http\Controllers\SidiController;
use App\Http\Controllers\JemaatPindahController;
use App\Http\Controllers\RegistrasiJemaatController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\RegistrasiPernikahanController;


use App\Http\Controllers\userController;
use App\Http\Controllers\uproveController;


use App\Http\Controllers\SetSentralisasiController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\MataAnggaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/rpp', [RPPController::class, 'viewAllRpp']);
Route::get('rpp/{id}', [RPPController::class, 'viewRPPById']);
Route::get('rppEdit/{id}', [RPPController::class, 'viewEditRPP']);
Route::get('/deleteRpp/{id}', [RPPController::class, 'deleteRPP']);
Route::post('/storeRpp', [RPPController::class, 'addRPP']);
Route::put('/updateRpp', [RPPController::class, 'updateRPP']);

Route::get('/pelayanGereja', [PelayanController::class, 'viewAllPelayan']);
Route::get('/deletePelayanGereja/{id}', [PelayanController::class, 'deletePelayan']);
Route::get('pelayanGereja/{id}', [PelayanController::class, 'viewPelayanById']);
Route::post('/storePelayanGereja', [PelayanController::class, 'addPelayan']);
Route::put('/updatePelayanGereja', [PelayanController::class, 'updatePelayan']);

Route::get('/kegiatan', [KegiatanController::class, 'viewAllKegiatan']);
Route::get('/kegiatan/{id}', [KegiatanController::class, 'viewKegiatanById']);
Route::get('/kegiatanEdit/{id}', [KegiatanController::class, 'viewEditKegiatan']);
Route::get('/deleteKegiatan/{id}', [KegiatanController::class, 'deleteKegiatan']);
Route::post('/storeKegiatan', [KegiatanController::class, 'addKegiatan']);
Route::post('/updateKegiatan', [KegiatanController::class, 'updateKegiatan']);

Route::get('/ibadah', [IbadahController::class, 'viewAllIbadah']);
Route::get('ibadah/{id}', [IbadahController::class, 'viewIbadahyId']);
Route::get('ibadahEdit/{id}', [IbadahController::class, 'viewEditIbadah']);
Route::get('/deleteIbadah/{id}', [IbadahController::class, 'deleteIbadah']);
Route::post('/storeIbadah', [IbadahController::class, 'addIbadah']);
Route::post('/updateIbadah', [IbadahController::class, 'updateIbadah']);

Route::get('/baptis', [BaptisController::class, 'viewAllBaptis']);
Route::get('baptis/{id}', [BaptisController::class, 'viewBaptisById']);
Route::get('baptisEdit/{id}', [BaptisController::class, 'viewEditBaptis']);
Route::get('/deleteBaptis/{id}', [BaptisController::class, 'deleteBaptis']);
Route::post('/storeBaptis', [BaptisController::class, 'addBaptis']);
Route::post('/updateBaptis', [BaptisController::class, 'updateBaptis']);

Route::get('/sidi', [SidiController::class, 'viewAllSidi']);
Route::get('sidi/{id}', [SidiController::class, 'viewSidiById']);
Route::get('sidiEdit/{id}', [SidiController::class, 'viewEditSidi']);
Route::get('/deleteSidi/{id}', [SidiController::class, 'deleteSidi']);
Route::post('/storeSidi', [SidiController::class, 'addSidi']);
Route::post('/updateSidi', [SidiController::class, 'updateSidi']);

Route::get('/jemaatPindah', [JemaatPindahController::class, 'viewAllJemaatPindah']);
Route::get('jemaatPindah/{id}', [JemaatPindahController::class, 'viewJemaatPindahById']);
Route::get('jemaatPindahEdit/{id}', [JemaatPindahController::class, 'viewEditJemaatPindah']);
Route::get('/deleteJemaatPindah/{id}', [JemaatPindahController::class, 'deleteJemaatPindah']);
Route::post('/storeJemaatPindah', [JemaatPindahController::class, 'addJemaatPindah']);
Route::post('/updateJemaatPindah', [JemaatPindahController::class, 'updateJemaatPindah']);

Route::get('/RegistrasiJemaat', [RegistrasiJemaatController::class, 'viewAllRegistrasiJemaat']);
Route::get('RegistrasiJemaat/{id}', [RegistrasiJemaatController::class, 'viewRegistrasiJemaatById']);
Route::get('RegistrasiJemaatEdit/{id}', [RegistrasiJemaatController::class, 'viewEditRegistrasiJemaat']);
Route::get('/deleteRegistrasiJemaat/{id}', [RegistrasiJemaatController::class, 'deleteRegistrasiJemaat']);
Route::post('/storeRegistrasiJemaat', [RegistrasiJemaatController::class, 'addRegistrasiJemaat']);
Route::post('/updateRegistrasiJemaat', [RegistrasiJemaatController::class, 'updateRegistrasiJemaat']);

Route::get('/nikah', [PernikahanController::class, 'viewAllNikah']);
Route::get('nikah/{id}', [PernikahanController::class, 'viewNikahById']);
Route::get('nikahEdit/{id}', [PernikahanController::class, 'viewEditNikah']);
Route::get('/deleteNikah/{id}', [PernikahanController::class, 'deleteNikah']);
Route::post('/storeNikah', [PernikahanController::class, 'addNikah']);
Route::post('/updateNikah', [PernikahanController::class, 'updateNikah']);

Route::get('/RegistrasiPernikahan', [RegistrasiPernikahanController::class, 'viewAllRegistrasiPernikahan']);
Route::get('RegistrasiPernikahan/{id}', [RegistrasiPernikahanController::class, 'viewRegistrasiPernikahanById']);
Route::get('RegistrasiPernikahanEdit/{id}', [RegistrasiPernikahanController::class, 'viewEditRegistrasiPernikahan']);
Route::get('/deleteRegistrasiPernikahan/{id}', [RegistrasiPernikahanController::class, 'deleteRegistrasiPernikahan']);
Route::post('/storeRegistrasiPernikahan', [RegistrasiPernikahanController::class, 'addRegistrasiPernikahan']);
Route::post('/updateRegistrasiPernikahan', [RegistrasiPernikahanController::class, 'updateRegistrasiPernikahan']);





Route::post('/daftarBaptis', [userController::class, 'daftarBaptis']);
Route::post('/daftarSidi', [userController::class, 'daftarSidi']);
Route::post('/daftarJemaat', [userController::class, 'daftarJemaat']);
Route::post('/daftarNikah', [userController::class, 'daftarNikah']);
Route::post('/daftarMartumpol', [userController::class, 'daftarMartumpol']);
Route::post('/daftarPindah', [userController::class, 'daftarPindah']);
Route::get('/keluarga', [userController::class, 'keluarga']);
Route::get('/pendidikan', [userController::class, 'pendidikan']);
Route::get('/BidangPendidikan', [userController::class, 'BidangPendidikan']);
Route::get('/pekerjaan', [userController::class, 'pekerjaan']);
Route::get('/jemaat', [userController::class, 'jemaat']);
Route::get('/namKeluarga', [userController::class, 'namKeluarga']);
Route::get('/gereja', [userController::class, 'gereja']);
Route::get('/pelayan', [userController::class, 'pelayan']);
Route::get('/jadwal', [userController::class, 'jadwal']);
Route::get('/kegiatan', [userController::class, 'kegiatan']);
Route::get('/pemasukan', [userController::class, 'pemasukan']);
Route::get('/pengeluaran', [userController::class, 'pengeluaran']);


////////////////////////// API KEUANGAN START///////////////////////////

// SENTRALISASI
Route::get('/setSentralisasi', [SetSentralisasiController::class, 'viewAllSetSentralisasi']);
Route::get('/setSentralisasi/{id}', [SetSentralisasiController::class, 'viewSetSentralisasiById']);
Route::delete('/setSentralisasi/{id}', [SetSentralisasiController::class, 'deleteSetSentralisasi']);
Route::post('/storeSentralisasi', [SetSentralisasiController::class, 'storeSentralisasi']);
Route::put('/ubahSentralisasi/{id}', [SetSentralisasiController::class, 'ubahSentralisasi']);
// Route::get('/setSentralisasi', [SetSentralisasiController::class, 'detailSentralisasi']);

// KATEGORI MATA ANGGARAN
Route::get('/kategoriMataAnggaran', [AnggaranController::class, 'viewAllKategoriMataAnggaran']);
Route::get('/kategoriMataAnggaran/{id}', [AnggaranController::class, 'viewKategoriMataAnggaranById']);
Route::delete('/kategoriMataAnggaran/{id}', [AnggaranController::class, 'deleteKategoriMataAnggaran']);
Route::post('/storeKategoriMataAnggaran', [AnggaranController::class, 'storeKategoriMataAnggaran']);
Route::put('/ubahKategoriMataAnggaran/{id}', [AnggaranController::class, 'ubahKategoriMataAnggaran']);

// MATA ANGGARAN
// Route::get('/mataAnggaran', [MataAnggaranController::class, 'showKategoriMataAnggaranForm']);
Route::get('/mataAnggaran', [MataAnggaranController::class, 'viewAllMataAnggaran']);
Route::get('/mataAnggaran/{id}', [MataAnggaranController::class, 'viewMataAnggaranById']);
Route::post('/storeMataAnggaran', [MataAnggaranController::class, 'storeMataAnggaran']);
Route::put('/ubahMataAnggaran/{id}', [MataAnggaranController::class, 'ubahMataAnggaran']);
Route::delete('/mataAnggaran/{id}', [MataAnggaranController::class, 'deleteMataAnggaran']);

//TRANSAKSI
Route::get('/tambahTransaksi', [TransaksiController::class, 'viewAllIndukMataAnggaran']);
Route::get('/tambahTransaksi', [TransaksiController::class, 'viewAllKategoriMataAnggaran']);
Route::get('/tambahTransaksi/{id}', [TransaksiController::class, 'viewKategoriMataAnggaranById']);
Route::delete('/tambahTransaksi/{id}', [TransaksiController::class, 'deleteKategoriMataAnggaran']);
Route::post('/tambahTransaksi', [TransaksiController::class, 'storeKategoriMataAnggaran']);
Route::put('/tambahTransaksi/{id}', [TransaksiController::class, 'ubahKategoriMataAnggaran']);


////////////////////////// API KEUANGAN END///////////////////////////


Route::put('/uproveBaptis1/{id}', [uproveController::class, 'statusBaptis1']);
Route::put('/uproveBaptis2/{id}', [uproveController::class, 'statusBaptis2']);
// KATEGORI MATA ANGGARAN
Route::get('/kategoriMataAnggaran', [AnggaranController::class, 'viewAllKategoriMataAnggaran']);
Route::get('/kategoriMataAnggaran/{id}', [AnggaranController::class, 'viewKategoriMataAnggaranById']);
Route::delete('/kategoriMataAnggaran/{id}', [AnggaranController::class, 'deleteKategoriMataAnggaran']);
Route::post('/storeKategoriMataAnggaran', [AnggaranController::class, 'storeKategoriMataAnggaran']);
Route::put('/ubahKategoriMataAnggaran/{id}', [AnggaranController::class, 'ubahKategoriMataAnggaran']);

// MATA ANGGARAN
// Route::get('/mataAnggaran', [MataAnggaranController::class, 'showKategoriMataAnggaranForm']);
Route::get('/mataAnggaran', [MataAnggaranController::class, 'viewAllMataAnggaran']);
Route::get('/mataAnggaran/{id}', [MataAnggaranController::class, 'viewMataAnggaranById']);
Route::post('/storeMataAnggaran', [MataAnggaranController::class, 'storeMataAnggaran']);
Route::put('/ubahMataAnggaran/{id}', [MataAnggaranController::class, 'ubahMataAnggaran']);
Route::delete('/mataAnggaran/{id}', [MataAnggaranController::class, 'deleteMataAnggaran']);

//PEMASUKAN
Route::get('/detailPemasukan', [PemasukanController::class, 'viewAllDetailPemasukan']);
Route::get('/detailPemasukan/{id}', [PemasukanController::class, 'viewAllDetailPemasukanById']);
Route::delete('/deletePemasukan/{id}', [PemasukanController::class, 'deletePemasukan']);
Route::post('/storePemasukan', [PemasukanController::class, 'storePemasukan']);
Route::put('/ubahPemasukan/{id}', [PemasukanController::class, 'ubahPemasukan']);
// Route::get('/tambahPemasukan', [PemasukanController::class, 'viewAllKategoriMataAnggaran']);

//PENGELUARAN
Route::get('/detailPengeluaran', [PengeluaranController::class, 'viewAllDetailPengeluaran']);
Route::get('/detailPemasukan/{id}', [PengeluaranController::class, 'viewAllDetailPengeluaranById']);
Route::delete('/deletePengeluaran/{id}', [PengeluaranController::class, 'deletePengeluaran']);
Route::post('/storePengeluaran', [PengeluaranController::class, 'storePengeluaran']);
Route::put('/ubahPengeluaran/{id}', [PengeluaranController::class, 'ubahPengeluaran']);

////////////////////////// API KEUANGAN END///////////////////////////


Route::put('/uproveBaptis1/{id}', [uproveController::class, 'statusBaptis1']);
Route::put('/uproveBaptis2/{id}', [uproveController::class, 'statusBaptis2']);
Route::get('/baptis', [uproveController::class, 'baptis']);
Route::get('/userBaptis', [uproveController::class, 'userBaptis']);

Route::put('/uproveSidi1/{id}', [uproveController::class, 'statusSidi1']);
Route::put('/uproveSidi2/{id}', [uproveController::class, 'statusSidi2']);
Route::get('/sidi', [uproveController::class, 'sidi']);
Route::get('/userSidi', [uproveController::class, 'userSidi']);

Route::put('/uprovePindah1/{id}', [uproveController::class, 'statusPindah1']);
Route::put('/uprovePindah2/{id}', [uproveController::class, 'statusPindah2']);
Route::get('/pindah', [uproveController::class, 'pindah']);
Route::get('/userPindah', [uproveController::class, 'userPindah']);

Route::put('/uproveJemaat1/{id}', [uproveController::class, 'statusJemaat1']);
Route::put('/uproveJemaat2/{id}', [uproveController::class, 'statusJemaat2']);
Route::get('/prvJemaat', [uproveController::class, 'prvJemaat']);
Route::get('/userPrvJemaat', [uproveController::class, 'userPrvJemaat']);

Route::put('/uproveNikah1/{id}', [uproveController::class, 'statusNikah1']);
Route::put('/uproveNikah2/{id}', [uproveController::class, 'statusNikah2']);
Route::get('/nikah', [uproveController::class, 'nikah']);
Route::get('/userNikah', [uproveController::class, 'userNikah']);

Route::put('/uproveMartumpol/{id}', [uproveController::class, 'statusMartumpol']);
Route::get('/martumpol', [uproveController::class, 'martumpol']);
Route::get('/userMartumpol', [uproveController::class, 'userMartumpol']);
