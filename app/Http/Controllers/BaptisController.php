<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class BaptisController extends Controller
{
    public function viewAllBaptis(){
        $baptis = DB::select('CALL viewAllRegistrasiBaptis()');
        if($baptis){
            return ApiFormatter::createApi('200', 'Success', $baptis);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addBaptis(Request $request){

        try {
            $data = DB::table('registrasi_baptis')->insert([
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'tanggal_baptis' => $request->tanggal_baptis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_pendeta' => $request->id_pendeta,
                'keterangan' => $request->keterangan,
                'status' => 1
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

    public function updateBaptis(Request $request){
        try {
            $id_registrasi_baptis = $request->input('id_registrasi_baptis');
            DB::table('registrasi_baptis')->where('id_registrasi_baptis', $request->id_registrasi_baptis)->update([
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'nama_lengkap' => $request->nama_lengkap,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'tanggal_baptis' => $request->tanggal_baptis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_pendeta' => $request->id_pendeta,
                'keterangan' => $request->keterangan
            ]);
            $data = DB::statement('CALL updateRegistrasiBaptis(?)',[$id_registrasi_baptis]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewBaptisById($id){
        $baptis = DB::select('CALL viewRegistrasiBaptisById(?)',[$id]);

        if($baptis){
            return ApiFormatter::createApi('200', 'Success', $baptis);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditBaptis($id){
        $baptis = DB::select('CALL viewEditRegistrasiBaptis(?)',[$id]);
        if($baptis){
            return ApiFormatter::createApi('200', 'Success', $baptis);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteBaptis($id){
        
        $sidi = DB::select('CALL deleteRegistrasiBaptis(?)',[$id]);

        if($sidi){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
