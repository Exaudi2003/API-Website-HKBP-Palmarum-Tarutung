<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class JemaatPindahController extends Controller
{
    public function viewAllJemaatPindah(){
        $pindah = DB::select('CALL viewAllJemaatPindah()');
        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addJemaatPindah(Request $request){

        try {

            $data = DB::table('head_pindah')->insert([
                'id_registrasi'=> (int)$request->id_registrasi,
                'id_jemaat'=> (int)$request->id_jemaat, 
                'no_surat_pindah'=> $request->no_surat_pindah,
                'tgl_pindah'=> $request->tgl_pindah, 
                'tgl_warta'=> $request->tgl_warta,
                'id_gereja_tujuan'=> (int)$request->id_gereja_tujuan, 
                'nama_gereja'=> $request->nama_gereja,
                'keterangan'=> $request->keterangan, 
                'status' => 1
            ]);
            
        
            if($data){
                $dataJemaat = DB::table('jemaat')->where('id_jemaat', $request->id_jemaat)->update([
                    'is_deleted' => 1,
                    'keterangan' => "Jemaat Pindah"
                ]);
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
    public function updateJemaatPindah(Request $request){
        try {
            $data = DB::table('head_pindah')->where('id_head_reg_pindah', $request->id_head_reg_pindah)->update([
                'id_registrasi'=> (int)$request->id_registrasi,
                'id_jemaat'=> (int)$request->id_jemaat, 
                'no_surat_pindah'=> $request->no_surat_pindah,
                'tgl_pindah'=> $request->tgl_pindah, 
                'tgl_warta'=> $request->tgl_warta,
                'id_gereja_tujuan'=> (int)$request->id_gereja_tujuan, 
                'nama_gereja'=> $request->nama_gereja,
                'keterangan'=> $request->keterangan, 
            ]);
            
            $pindah = DB::statement('CALL updateJemaatPindah(?)',[$request->id_head_reg_pindah]);
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewJemaatPindahById($id){
        $pindah = DB::select('CALL viewJemaatPindahById(?)',[$id]);

        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditJemaatPindah($id){
        $pindah = DB::select('CALL viewEditJemaatPindah(?)',[$id]);
        if($pindah){
            return ApiFormatter::createApi('200', 'Success', $pindah);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteJemaatPindah($id){
        
        $pindah = DB::select('CALL deletePindahJemaat(?)',[$id]);

        if($pindah){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
