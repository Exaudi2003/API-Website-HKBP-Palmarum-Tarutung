<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class SetSentralisasiController extends Controller
{
    public function viewAllSetSentralisasi()
    {
        $setSentralisasi = DB::table('set_sentralisasi')->get();
        return response()->json($setSentralisasi);

        if ($setSentralisasi) {
            return ApiFormatter::createApi('200', 'Success', $setSentralisasi);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function storeSentralisasi(Request $request)
    {
        try {
            $request->validate([
                'persentasi_sentralisasi' => 'required',
                'keterangan' => 'required'
            ]);

            $persentasi_sentralisasi = $request->input('persentasi_sentralisasi');
            $keterangan = $request->input('keterangan');

            $data = DB::table('set_sentralisasi')->insert([
                'persentasi_sentralisasi' => $persentasi_sentralisasi,
                'keterangan' => $keterangan,
            ]);

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function ubahSentralisasi(Request $request, $id)
    {
        try {
            $persentasiSentralisasi = $request->get('persentasi_sentralisasi');
            $keterangan = $request->get('keterangan');

            $result = 
            DB::update('UPDATE set_sentralisasi SET persentasi_sentralisasi = ?, keterangan = ? WHERE id_sentralisasi = ?', [$persentasiSentralisasi, $keterangan, $id]);

            if ($result) {
                return ApiFormatter::createApi('200', 'Success', $result);
            } else {
                return ApiFormatter::createApi('400', 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewSetSentralisasiById($id)
    {
        $setSentralisasi = DB::select('SELECT * FROM set_sentralisasi WHERE id_sentralisasi = ?', [$id]);

        if ($setSentralisasi) {
            return ApiFormatter::createApi('200', 'Success', $setSentralisasi);
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteSetSentralisasi($id)
    {
        $result = DB::delete('DELETE FROM set_sentralisasi WHERE id_sentralisasi = ?', [$id]);

        if ($result) {  
            return ApiFormatter::createApi('200', 'Success');
        } else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
