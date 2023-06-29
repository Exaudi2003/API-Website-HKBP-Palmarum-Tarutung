<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class MataAnggaranController extends Controller
{
    // FUNCTION MATA ANGGARAN START
    public function viewAllMataAnggaran()
    {
        $mataAnggaran = DB::table('mata_anggaran')->get();
        return response()->json($mataAnggaran); 

        if ($mataAnggaran) {
            return ApiFormatter::createApi('200', 'Success', $mataAnggaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function storeMataAnggaran(Request $request)
    {
        try {
            $request->validate([
                'kategori_mata_anggaran' => 'required',
                'kode_mata_anggaran' => 'required',
                'nama_mata_anggaran' => 'required',
                'jenis_anggaran' => 'required',
                'isSentralisasi' => 'required',
                'keterangan' => 'nullable',
            ]);

            $kategori_mata_anggaran = $request->input('kategori_mata_anggaran');
            $kode_mata_anggaran = $request->input('kode_mata_anggaran');
            $nama_mata_anggaran = $request->input('nama_mata_anggaran');
            $jenis_anggaran = $request->input('jenis_anggaran');
            $isSentralisasi = $request->input('isSentralisasi');
            $keterangan = $request->input('keterangan');

            $data = DB::table('mata_anggaran')->insert([
                'kategori_mata_anggaran' => $kategori_mata_anggaran,
                'kode_mata_anggaran' => $kode_mata_anggaran,
                'nama_mata_anggaran' => $nama_mata_anggaran,
                'jenis_anggaran' => $jenis_anggaran,
                'isSentralisasi' => $isSentralisasi,
                'keterangan' => $keterangan,
            ]);

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function ubahMataAnggaran(Request $request, $id)
    {
        try {
            $kategori_mata_anggaran = $request->get('kategori_mata_anggaran');
            $kode_mata_anggaran = $request->get('kode_mata_anggaran');
            $nama_mata_anggaran = $request->get('nama_mata_anggaran');
            $jenis_anggaran = $request->get('jenis_anggaran');
            $isSentralisasi = $request->get('isSentralisasi');
            $keterangan = $request->get('keterangan');

            $result = DB::update('UPDATE mata_anggaran SET kategori_mata_anggaran = ?, kode_mata_anggaran = ?, nama_mata_anggaran = ?, jenis_anggaran = ?, isSentralisasi = ?, 
                keterangan = ? WHERE id_mata_anggaran = ?', [$kategori_mata_anggaran, $kode_mata_anggaran, $nama_mata_anggaran, $jenis_anggaran, $isSentralisasi, $keterangan, $id]);

            if ($result) {
                return ApiFormatter::createApi('200', 'Success', $result);
            } else {
                return ApiFormatter::createApi('400', 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewMataAnggaranById($id)
    {
        $mataAnggaran = DB::table('mata_anggaran')->where('id_mata_anggaran', $id)->first();

        if ($mataAnggaran) {
            return ApiFormatter::createApi('200', 'Success', $mataAnggaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteMataAnggaran($id)
    {
        $result = DB::delete('DELETE FROM mata_anggaran WHERE id_mata_anggaran = ?', [$id]);

        if ($result) {
            return ApiFormatter::createApi('200', 'Success');
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}