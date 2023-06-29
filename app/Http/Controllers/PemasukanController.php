<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use App\Models\SetSentralisasiController;


class PemasukanController extends Controller
{

    
    public function viewAllDetailPemasukan()
    {
        $detailPemasukan = DB::table('detail_pemasukan')->get();
        return response()->json($detailPemasukan); 

        if ($detailPemasukan) {
            return ApiFormatter::createApi('200', 'Success', $detailPemasukan);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewAllDetailPemasukanById($id)
    {
        $detailPemasukan = DB::table('detail_pemasukan')->where('id_pemasukan', $id)->first();

        if ($detailPemasukan) {
            return ApiFormatter::createApi('200', 'Success', $detailPemasukan);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

public function storePemasukan(Request $request)
    {
        // try {
        //     $request->validate([
        //         'induk_kategori_anggaran' => 'required',
        //         'kategori_mata_anggaran' => 'required',
        //         'mata_anggaran' => 'required',
        //         'isSentralisasi' => 'required',
        //         'tanggal_transaksi' => 'required',
        //         'tanggal_warta' => 'required',
        //         'nama_transaksi' => 'required',
        //         'jenis_transaksi' => 'required',
        //         'nomor_transaksi' => 'required',
        //         'jumlah_uang' => 'required',
        //         'jumlah_sentralisasi' => 'required',
        //         'jumlah_gereja' => 'required',
        //         'persembahanTahun' => 'required', // Make sure the column name matches the validation rule
        //         'bulan_awal' => 'required',
        //         'bulan_akhir' => 'required',
        //         'keterangan' => 'nullable',
        //     ]);
    
            // Retrieve the input values from the request
            $induk_kategori_anggaran = $request->input('induk_kategori_anggaran');
            $kategori_mata_anggaran = $request->input('kategori_mata_anggaran');
            $mata_anggaran = $request->input('mata_anggaran');
            $isSentralisasi = $request->input('isSentralisasi');
            $tanggal_transaksi = $request->input('tanggal_transaksi');
            $tanggal_warta = $request->input('tanggal_warta');
            $nama_transaksi = $request->input('nama_transaksi');
            $jenis_transaksi = $request->input('jenis_transaksi');
            $nomor_transaksi = $request->input('nomor_transaksi');
            $jumlah_uang = $request->input('jumlah_uang');
            $jumlah_sentralisasi = $request->input('jumlah_sentralisasi');
            $jumlah_gereja = $request->input('jumlah_gereja');
            $persembahanTahun = $request->input('persembahanTahun'); // Make sure to retrieve the correct input name
            $bulan_awal = $request->input('bulan_awal');
            $bulan_akhir = $request->input('bulan_akhir');
            $keterangan = $request->input('keterangan');
    
            // Perform the database insertion
            $data = DB::table('detail_pemasukan')->insert([
                'induk_kategori_anggaran' => $induk_kategori_anggaran,
                'kategori_mata_anggaran' => $kategori_mata_anggaran,
                'mata_anggaran' => $mata_anggaran,
                'isSentralisasi' => $isSentralisasi,
                'tanggal_transaksi' => $tanggal_transaksi,
                'tanggal_warta' => $tanggal_warta,
                'nama_transaksi' => $nama_transaksi,
                'jenis_transaksi' => $jenis_transaksi,
                'nomor_transaksi' => $nomor_transaksi,
                'jumlah_uang' => $jumlah_uang,
                'jumlah_sentralisasi' => $jumlah_sentralisasi,
                'jumlah_gereja' => $jumlah_gereja,
                'persembahanTahun' => $persembahanTahun, // Make sure the column name matches the database column
                'bulan_awal' => $bulan_awal,
                'bulan_akhir' => $bulan_akhir,
                'keterangan' => $keterangan,
            ]);

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        // } catch (Exception $error) {
        //     return ApiFormatter::createApi(400, 'Failed');
        // }
    }

    function ubahPemasukan(Request $request, $id)
    {
        // try {
            // $induk_kategori_anggaran = $request->get('induk_kategori_anggaran');
            // $kategori_mata_anggaran = $request->get('kategori_mata_anggaran');
            // $mata_anggaran = $request->get('mata_anggaran');
            // $isSentralisasi = $request->get('isSentralisasi');
            // $tanggal_transaksi = $request->get('tanggal_transaksi');
            // $tanggal_warta = $request->get('tanggal_warta');
            // $nama_transaksi = $request->get('nama_transaksi');
            // $jenis_transaksi = $request->get('jenis_transaksi');
            // $nomor_transaksi = $request->get('nomor_transaksi');
            // $jumlah_uang = $request->get('jumlah_uang');
            // $jumlah_sentralisasi = $request->get('jumlah_sentralisasi');
            // $jumlah_gereja = $request->get('jumlah_gereja');
            // $persembahanTahun = $request->get('persembahanTahun'); // Make sure to retrieve the correct input name
            // $bulan_awal = $request->get('bulan_awal');
            // $bulan_akhir = $request->get('bulan_akhir');
            // // $keterangan = $request->input('keterangan');
            // $keterangan = $request->get('keterangan');

            $result = DB::update('UPDATE detail_pemasukan SET induk_kategori_anggaran = ?, kategori_mata_anggaran = ?, mata_anggaran = ?, isSentralisasi = ?, tanggal_transaksi = ?, tanggal_warta = ?,
            nama_transaksi = ?, jenis_transaksi = ?, nomor_transaksi = ?, jumlah_uang = ?, jumlah_sentralisasi = ?, jumlah_gereja = ?, persembahanTahun = ?, bulan_awal = ?, bulan_akhir = ?,
                keterangan = ? WHERE id_pemasukan = ?', [$induk_kategori_anggaran, $kategori_mata_anggaran, $mata_anggaran, $isSentralisasi, $tanggal_transaksi, $tanggal_transaksi, $tanggal_warta,
                $nama_transaksi, $jenis_transaksi, $nomor_transaksi, $jumlah_uang, $jumlah_sentralisasi, $jumlah_gereja, $persembahanTahun, $bulan_awal, $bulan_akhir, $keterangan, $id]);

            if ($result) {
                return ApiFormatter::createApi('200', 'Success', $result);
            } else {
                return ApiFormatter::createApi('400', 'Failed');
            }
        // } catch (Exception $error) {
        //     return ApiFormatter::createApi('400', 'Failed');
        // }
    }

    function viewMataAnggaranById($id)
    {
        $mataAnggaran = DB::table('mata_anggaran')->where('id_mata_anggaran', $id)->first();

        if ($mataAnggaran) {
            return ApiFormatter::createApi('200', 'Success', $mataAnggaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    function deletePemasukan($id)
    {
        $result = DB::delete('DELETE FROM detail_pemasukan WHERE id_pemasukan = ?', [$id]);

        if ($result) {
            return ApiFormatter::createApi('200', 'Success');
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}