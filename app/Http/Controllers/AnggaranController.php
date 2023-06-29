<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class AnggaranController extends Controller
{
    // FUNCTION KATEGORI MATA ANGGARAN START
    public function viewAllKategoriMataAnggaran()
    {
        $kategoriMataAnggaran = DB::table('kategori_mata_anggaran')->get();
        return response()->json($kategoriMataAnggaran); 

        if ($kategoriMataAnggaran) {
            return ApiFormatter::createApi('200', 'Success', $kategoriMataAnggaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function storeKategoriMataAnggaran(Request $request)
    {
        try {
            $request->validate([
                'induk_kategori_anggaran' => 'required',
                'kode_kategori_anggaran' => 'required',
                'nama_kategori_anggaran' => 'required',
                'keterangan' => 'nullable',
            ]);

            $induk_kategori_anggaran = $request->input('induk_kategori_anggaran');
            $kode_kategori_anggaran = $request->input('kode_kategori_anggaran');
            $nama_kategori_anggaran = $request->input('nama_kategori_anggaran');
            $keterangan = $request->input('keterangan');

            $data = DB::table('kategori_mata_anggaran')->insert([
                'induk_kategori_anggaran' => $induk_kategori_anggaran,
                'kode_kategori_anggaran' => $kode_kategori_anggaran,
                'nama_kategori_anggaran' => $nama_kategori_anggaran,
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

    public function ubahKategoriMataAnggaran(Request $request, $id)
    {
        try {
            $induk_kategori_anggaran = $request->get('induk_kategori_anggaran');
            $kode_kategori_anggaran = $request->get('kode_kategori_anggaran');
            $nama_kategori_anggaran = $request->get('nama_kategori_anggaran');
            $keterangan = $request->get('keterangan');

            $result = DB::update('UPDATE kategori_mata_anggaran SET induk_kategori_anggaran = ?, kode_kategori_anggaran = ?, nama_kategori_anggaran = ?, keterangan = ? WHERE id_kategori_anggaran = ?', [$induk_kategori_anggaran, $kode_kategori_anggaran, $nama_kategori_anggaran, $keterangan, $id]);

            if ($result) {
                return ApiFormatter::createApi('200', 'Success', $result);
            } else {
                return ApiFormatter::createApi('400', 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewKategoriMataAnggaranById($id)
    {
        $kategoriMataAnggaran = DB::table('kategori_mata_anggaran')->where('id_kategori_anggaran', $id)->first();

        if ($kategoriMataAnggaran) {
            return ApiFormatter::createApi('200', 'Success', $kategoriMataAnggaran);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteKategoriMataAnggaran($id)
    {
        $result = DB::delete('DELETE FROM kategori_mata_anggaran WHERE id_kategori_anggaran = ?', [$id]);

        if ($result) {
            return ApiFormatter::createApi('200', 'Success');
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

}
    // FUNCTION KATEGORI MATA ANGGARAN END


//////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
