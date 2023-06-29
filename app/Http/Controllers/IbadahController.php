<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class IbadahController extends Controller
{
    public function viewAllIbadah(){
        $ibadah = DB::select('CALL viewAllJadwalIbadah()');
        if($ibadah){
            return ApiFormatter::createApi('200', 'Success', $ibadah);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addIbadah(Request $request){

        try {
            $data = DB::table('jadwal_ibadah')->insert([
                'tgl_ibadah' => $request->tgl_ibadah,
                'id_jenis_minggu' => $request->id_jenis_minggu,
                'id_melayani' => $request->id_melayani,
                'jumlah_pelayan' => $request->jumlah_pelayan,
                'waktu_mulai' => $request->waktu_mulai,
                'nyanyian_1' => $request->nyanyian_1,
                'votum' => $request->votum,
                'nyanyian_2' => $request->nyanyian_2,
                'hukum_taurat' => $request->hukum_taurat,
                'nyanyian_3' => $request->nyanyian_3,
                'pengakuan_dosa' => $request->pengakuan_dosa,
                'nyanyian_4' => $request->nyanyian_4,
                'epistel' => $request->epistel,
                'nyanyian_5' => $request->nyanyian_5,
                'pengakuan_iman' => $request->pengakuan_iman,
                'nyanyian_6' => $request->nyanyian_6,
                'khotbah' => $request->khotbah,
                'nyanyian_7' => $request->nyanyian_7,
                'doa_penutup' => $request->doa_penutup,
                'keterangan' => $request->keterangan
            ]);
        
            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }else{
                return ApiFormatter::createApi('400', 'Failed');
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('Failed to create user'), 500);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewIbadahyId($id){
        $rpp = DB::select('CALL viewJadwalIbadahById(?)',[$id]);

        if($rpp){
            return ApiFormatter::createApi('200', 'Success', $rpp);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteIbadah($id){
        
        $data = DB::select('CALL deleteJadwalIbadah(?)',[$id]);

        if($data){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditIbadah($id){
        $kegiatan = DB::select('CALL viewEditJadwalIbadah(?)',[$id]);
        if($kegiatan){
            return ApiFormatter::createApi('200', 'Success', $kegiatan);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function updateIbadah(Request $request){
        try {
            $id_jadwal_ibadah = $request->input('id_jadwal_ibadah');
            DB::table('jadwal_ibadah')->where('id_jadwal_ibadah', $request->id_jadwal_ibadah)->update([
                'tgl_ibadah' => $request->tgl_ibadah,
                'id_jenis_minggu' => $request->id_jenis_minggu,
                'id_melayani' => $request->id_melayani,
                'jumlah_pelayan' => $request->jumlah_pelayan,
                'waktu_mulai' => $request->waktu_mulai,
                'nyanyian_1' => $request->nyanyian_1,
                'votum' => $request->votum,
                'nyanyian_2' => $request->nyanyian_2,
                'hukum_taurat' => $request->hukum_taurat,
                'nyanyian_3' => $request->nyanyian_3,
                'pengakuan_dosa' => $request->pengakuan_dosa,
                'nyanyian_4' => $request->nyanyian_4,
                'epistel' => $request->epistel,
                'nyanyian_5' => $request->nyanyian_5,
                'pengakuan_iman' => $request->pengakuan_iman,
                'nyanyian_6' => $request->nyanyian_6,
                'khotbah' => $request->khotbah,
                'nyanyian_7' => $request->nyanyian_7,
                'doa_penutup' => $request->doa_penutup,
                'keterangan' => $request->keterangan
            ]);
            $data = DB::statement('CALL updateJadwalIbadah(?)',[$id_jadwal_ibadah]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
