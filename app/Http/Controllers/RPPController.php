<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class RPPController extends Controller
{
    public function viewAllRpp(){
        $rpp = DB::select('CALL viewAllRPP()');
        if($rpp){
            return ApiFormatter::createApi('200', 'Success', $rpp);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addRPP(Request $request){

        try {

            $jemaat = $request->input('id_jemaat');
            $jenis_rpp = $request->input('id_jenis_rpp');
            $tgl_rpp = $request->input('tgl_warta_rpp');
            $keterangan = $request->input('keterangan');

            $data = DB::statement('CALL addRPP(?,?,?,?)',[$jemaat,$jenis_rpp,$tgl_rpp,$keterangan]);
        
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

    public function updateRPP(Request $request){
        try {
            $id_rpp = $request->input('id_rpp');
            $id_jemaat = $request->input('id_jemaat');
            $id_jenis_rpp = $request->input('id_jenis_rpp');
            $tgl_warta_rpp = $request->input('tgl_warta_rpp');
            $keterangan = $request->input('keterangan');

            $dataRpp = json_encode([
                'id_rpp' => $id_rpp,
                'id_jemaat' => $id_jemaat,
                'id_jenis_rpp' => $id_jenis_rpp,
                'tgl_warta_rpp' => $tgl_warta_rpp,
                'keterangan' => $keterangan,

            ]);
            $data = DB::statement('CALL updateRPPA(?, ?, ?, ?, ?)',[$id_rpp, $id_jemaat, $tgl_warta_rpp, $id_jenis_rpp, $keterangan]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewRPPById($id){
        $rpp = DB::select('CALL viewRPPById(?)',[$id]);

        if($rpp){
            return ApiFormatter::createApi('200', 'Success', $rpp);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditRPP($id){
        $rpp = DB::select('CALL viewEditRPP(?)',[$id]);
        if($rpp){
            return ApiFormatter::createApi('200', 'Success', $rpp);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteRPP($id){
        
        $data = DB::select('CALL deleteRPP(?)',[$id]);

        if($data){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
