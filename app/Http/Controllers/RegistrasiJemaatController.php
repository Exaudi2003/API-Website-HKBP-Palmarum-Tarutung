<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class RegistrasiJemaatController extends Controller
{
    public function viewAllRegistrasiJemaat(){
        $pindah = DB::select('CALL viewAllJemaat()');
        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addRegistrasiJemaat(Request $request){

        

        try {
            $data = DB::table('jemaat')->insert([
                'id_registrasi' => $request->id_registrasi,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'gelar_depan' => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_hub_keluarga' => $request->id_hub_keluarga,
                'id_pendidikan' => $request->id_pendidikan,
                'id_bidang_pendidikan' => $request->id_bidang_pendidikan,
                'id_pekerjaan' => $request->id_pekerjaan,
                'nama_pekerjaan_lain' => $request->nama_pekerjaan_lain,
                'gol_darah' => $request->gol_darah,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'keterangan'=> $request->keterangan,
                'status' => 1
            ]);
            
            // $data = DB::statement('CALL addRegistrasiJemaat(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
            //     $request->id_registrasi,
            //     $request->nama_depan,
            //     $request->nama_belakang,
            //     $request->gelar_depan,
            //     $request->gelar_belakang,
            //     $request->tempat_lahir,
            //     $request->tanggal_lahir,
            //     $request->jenis_kelamin,
            //     $request->id_hub_keluarga,
            //     $request->id_pendidikan,
            //     $request->id_bidang_pendidikan,
            //     $request->id_bidang_pendidikan_lain,
            //     $request->id_pekerjaan,
            //     $request->nama_pekerjaan_lain,
            //     $request->gol_darah,
            //     $request->alamat,
            //     $request->no_telepon,
            //     $request->keterangan
            // ]);
        
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
            return ApiFormatter::createApi('400', 'Error');
        }
    }

    public function updateRegistrasiJemaat(Request $request){
        try {
            $id_jemaat = $request->input('id_jemaat');
            $data = DB::table('jemaat')->where('id_jemaat', $request->id_jemaat)->update([
                'id_registrasi' => $request->id_registrasi,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'gelar_depan' => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_hub_keluarga' => $request->id_hub_keluarga,
                'id_pendidikan' => $request->id_pendidikan,
                'id_bidang_pendidikan' => $request->id_bidang_pendidikan,
                // 'id_bidang_pendidikan_lain' => $request->id_bidang_pendidikan_lain,
                'id_pekerjaan' => $request->id_pekerjaan,
                'nama_pekerjaan_lain' => $request->nama_pekerjaan_lain,
                'gol_darah' => $request->gol_darah,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon,
                'keterangan'=> $request->keterangan,
            ]);
            $data = DB::statement('CALL updateJemaat(?)',[$id_jemaat]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewRegistrasiJemaatById($id){
        $pindah = DB::select('CALL viewJemaatById(?)',[$id]);

        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditRegistrasiJemaat($id){
        $pindah = DB::select('CALL viewEditJemaat(?)',[$id]);
        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteRegistrasiJemaat($id){
        
        $pindah = DB::select('CALL deleteJemaat(?)',[$id]);

        if($pindah){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
