<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class PelayanController extends Controller
{
    public function viewAllPelayan(){
        $pelayan = DB::select('CALL viewAllPelayan()');
        
        if($pelayan){
            return ApiFormatter::createApi('200', 'Success', $pelayan);

            // $response['code'] = '200';
            // $response['message'] = 'success';
            // $response['data'] = $pelayan;
            
        // return response()->json($response);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addPelayan(Request $request){

        try {

            $id_jemaat = $request->input('id_jemaat');
            $tanggal_tahbisan = $request->input('tanggal_tahbisan');
            $jabatan =  $request->input('jabatan');
            $tanggal_akhir_jawatan = $request->input('tanggal_akhir_jawatan');
            $keterangan = $request->input('keterangan');

            $data = DB::statement('CALL addPelayanGereja(?,?,?,?,?)',[$id_jemaat, $tanggal_tahbisan, $jabatan, $tanggal_akhir_jawatan, $keterangan]);
        
            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function updatePelayan(Request $request){
        try {
            $id_pelayan = $request->input('id_pelayan');
            $id_jemaat = $request->input('id_jemaat');
            $tanggal_tahbisan = $request->input('tanggal_tahbisan');
            $jabatan =  $request->input('jabatan');
            $tanggal_akhir_jawatan = $request->input('tanggal_akhir_jawatan');
            $keterangan = $request->input('keterangan');

            $data = DB::statement('CALL updatePelayan(?, ?, ?, ?, ?, ?)',[$id_pelayan, $id_jemaat, $tanggal_tahbisan, $jabatan, $tanggal_akhir_jawatan, $keterangan]);
        
            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewPelayanById($id){
        $pelayan = DB::select('CALL viewPelayanById(?)',[$id]);

        if($pelayan){
            return ApiFormatter::createApi('200', 'Success', $pelayan);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deletePelayan($id){
        
        $data = DB::select('CALL deletePelayan(?)',[$id]);

        if($data){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
