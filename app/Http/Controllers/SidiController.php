<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class SidiController extends Controller
{
    public function viewAllSidi(){
        $sidi = DB::select('CALL viewAllRegistrasiSidi()');
        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addSidi(Request $request){

        try {
            $data = DB::table('registrasi_sidi')->insert([
                'nama_lengkap' => $request->nama_lengkap,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nats_sidi' => $request->nats_sidi,
                'nama_gereja_non_HKBP' => $request->nama_gereja_non_HKBP,
                'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
                'keterangan' => $request->keterangan,
                'tanggal_sidi' => $request->tanggal_sidi,
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

    public function updateSidi(Request $request){
        try {
            $id_registrasi_sidi = $request->id_registrasi_sidi;
            $data = DB::table('registrasi_sidi')->where('id_registrasi_sidi', $request->id_registrasi_sidi)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nats_sidi' => $request->nats_sidi,
                'nama_gereja_non_HKBP' => $request->nama_gereja_non_HKBP,
                'nama_pendeta_sidi' => $request->nama_pendeta_sidi,
                'keterangan' => $request->keterangan,
                'tanggal_sidi' => $request->tanggal_sidi
            ]);
            $data = DB::statement('CALL updateRegistrasiSidi(?)',[$id_registrasi_sidi]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewSidiById($id){
        $sidi = DB::select('CALL viewRegistrasiSidiById(?)',[$id]);

        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditSidi($id){
        $sidi = DB::select('CALL viewEditRegistrasiSidi(?)',[$id]);
        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteSidi($id){
        
        $sidi = DB::select('CALL deleteRegistrasiSidi(?)',[$id]);

        if($sidi){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
