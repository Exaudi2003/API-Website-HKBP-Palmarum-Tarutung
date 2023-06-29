<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use App\Models\SetSentralisasiController;


class PengeluaranController extends Controller
{
    public function viewAllDetailPengeluaran()
    {
        $detailPengeluaran = DB::table('detail_pengeluaran')->get();
        return response()->json($detailPengeluaran); 

        if ($detailPengeluaran) {
            return ApiFormatter::createApi('200', 'Success', $detailPengeluaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function getSentralisasiData(Request $request)
{
    $mataAnggaran = $request->input('mata_anggaran');

    $sentralisasiData = Sentralisasi::where('mata_anggaran', $mataAnggaran)->get();

    return response()->json($sentralisasiData);
}

public function storePengeluaran(Request $request)
{

        // Retrieve the input values from the request
        $induk_kategori_anggaran = $request->input('induk_kategori_anggaran');
        $kategori_mata_anggaran = $request->input('kategori_mata_anggaran');
        $mata_anggaran = $request->input('mata_anggaran');
        $nama_transaksi = $request->input('nama_transaksi');
        $jumlah_uang = $request->input('jumlah_uang');
        $jumlah_gereja = $request->input('jumlah_gereja');
        $tanggal_transaksi = $request->input('tanggal_transaksi');
        $tanggal_warta = $request->input('tanggal_warta');
        $persembahanTahun = $request->input('persembahanTahun'); // Make sure to retrieve the correct input name
        $keterangan = $request->input('keterangan');

        // Perform the database insertion
        $data = DB::table('detail_pengeluaran')->insert([
            'induk_kategori_anggaran' => $induk_kategori_anggaran,
            'kategori_mata_anggaran' => $kategori_mata_anggaran,
            'mata_anggaran' => $mata_anggaran,
            'nama_transaksi' => $nama_transaksi,
            'jumlah_uang' => $jumlah_uang,
            'jumlah_gereja' => $jumlah_gereja,
            'tanggal_transaksi' => $tanggal_transaksi,
            'tanggal_warta' => $tanggal_warta,
            'persembahanTahun' => $persembahanTahun, // Make sure the column name matches the database column
            'keterangan' => $keterangan,
        ]);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
}

    function deletePengeluaran($id)
    {
        $result = DB::delete('DELETE FROM detail_pengeluaran WHERE id_pengeluaran = ?', [$id]);

        if ($result) {
            return ApiFormatter::createApi('200', 'Success');
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}