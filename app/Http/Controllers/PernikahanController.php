<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class PernikahanController extends Controller
{
    public function viewAllNikah(){
        $nikah = DB::select('CALL viewAllPernikahan()');
        if($nikah){
            return ApiFormatter::createApi('200', 'Success', $nikah);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addNikah(Request $request){

        try {
            $data = DB::table('pernikahan')->insert([
                'id_registrasi_pernikahan' => $request->id_registrasi_pernikahan,
                'id_gereja_nikah' => $request->id_gereja_nikah,
                'tgl_pernikahan' => $request->tgl_pernikahan,
                'nats_pernikahan' => $request->nats_pernikahan,
                'nama_gereja_non_HKBP' => $request->nama_gereja_non_HKBP,
                'nama_pendeta' => $request->nama_pendeta,
                'keterangan' => $request->keterangan,
                'status' =>1
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
            return ApiFormatter::createApi('400', 'Error');
        }
    }

    public function updateNikah(Request $request){
        
        try {
            $id_pernikahan = $request->input('id_pernikahan');
            $data = DB::table('pernikahan')->where('id_pernikahan', $request->id_pernikahan)->update([
                'id_registrasi_pernikahan' => $request->id_registrasi_pernikahan,
                'id_gereja_nikah' => $request->id_gereja_nikah,
                'tgl_pernikahan' => $request->tgl_pernikahan,
                'nats_pernikahan' => $request->nats_pernikahan,
                'nama_gereja_non_HKBP' => $request->nama_gereja_non_HKBP,
                'nama_pendeta' => $request->nama_pendeta,
                'keterangan' => $request->keterangan,
            ]);
            $data = DB::statement('CALL updatePernikahan(?)',[$id_pernikahan]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewNikahById($id){
        $nikah = DB::select('CALL viewPernikahanById(?)',[$id]);

        if($nikah){
            return ApiFormatter::createApi('200', 'Success', $nikah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditNikah($id){
        $nikah = DB::select('CALL viewEditPernikahan(?)',[$id]);
        if($nikah){
            return ApiFormatter::createApi('200', 'Success', $nikah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteNikah($id){
        
        $nikah = DB::select('CALL deletePernikahan(?)',[$id]);

        if($nikah){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
