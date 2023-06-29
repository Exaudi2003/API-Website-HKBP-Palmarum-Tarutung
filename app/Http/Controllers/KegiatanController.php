<?php

namespace App\Http\Controllers;


use DateTime;
use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function viewAllKegiatan(){
        $kegiatan = DB::select('CALL viewAllKegiatan()');
        if($kegiatan){
            return ApiFormatter::createApi('200', 'Success', $kegiatan);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewKegiatanById($id){
        $kegiatan = DB::select('CALL viewKegiatanById(?)',[$id]);

        if($kegiatan){
            return ApiFormatter::createApi('200', 'Success', $kegiatan);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditKegiatan($id){
        $kegiatan = DB::select('CALL viewEditKegiatan(?)',[$id]);
        if($kegiatan){
            return ApiFormatter::createApi('200', 'Success', $kegiatan);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteKegiatan($id){
        
        $kegiatan = DB::statement('CALL deleteKegiatan(?)',[$id]);

        if($kegiatan){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addKegiatan(Request $request){

        try {
            $nama_jenis_kegiatan = $request->input('nama_jenis_kegiatan');
            $tanggal_kegiatan = $request->input('tanggal_kegiatan');
            $waktu_kegiatan = $request->input('waktu_kegiatan');
            $lokasi_kegiatan = $request->input('lokasi_kegiatan');
            $keterangan = $request->input('keterangan');

            $kegiatan = DB::statement('CALL addKegiatan(?,?,?,?,?)',[$nama_jenis_kegiatan, $lokasi_kegiatan, $tanggal_kegiatan, $waktu_kegiatan, $keterangan]);
        
            if($kegiatan){
                return ApiFormatter::createApi('200', 'Success', $kegiatan);
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


    public function updateKegiatan(Request $request){
        try {
            $id_jenis_kegiatan = $request->id_jenis_kegiatan;

            DB::table('jenis_kegiatan')->where('id_jenis_kegiatan', $request->id_jenis_kegiatan)->update([
                'nama_jenis_kegiatan' => $request->nama_jenis_kegiatan,
                'tanggal_kegiatan' => $request->tanggal_kegiatan,
                'waktu_kegiatan' => $request->waktu_kegiatan,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'keterangan' => $request->keterangan,
            ]);
            $data = DB::statement('CALL updateKegiatanA(?)',[$id_jenis_kegiatan]);

            // return $dataRpp;
            if(!$data){
                return ApiFormatter::createApi('400', 'Failed');
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

}
