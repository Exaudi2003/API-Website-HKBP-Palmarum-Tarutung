<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;

class RegistrasiPernikahanController extends Controller
{
    public function viewAllRegistrasiPernikahan(){
        $sidi = DB::select('CALL viewAllRegistrasiPernikahan()');
        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function addRegistrasiPernikahan(Request $request){
        try {
            $data = DB::table('registrasi_pernikahan')->insert([
                'id_gereja_martumpol'=> $request->id_gereja_martumpol,
                'tgl_martumpol'=> $request->tgl_martumpol, 
                'tgl_warta_martumpol'=> $request->tgl_warta_martumpol, 
                'nama_gereja_martumpol'=> $request->nama_gereja_martumpol, 
                'nomor_surat_martumpol'=> $request->nomor_surat_martumpol, 
                'nama_pendeta_martumpol'=> $request->nama_pendeta_martumpol, 
                'id_gereja_pemberkatan'=> $request->id_gereja_pemberkatan, 
                'tgl_pemberkatan'=> $request->tgl_pemberkatan, 
                'tgl_warta_pemberkatan'=> $request->tgl_warta_pemberkatan, 
                'nama_gereja_pemberkatan'=> $request->nama_gereja_pemberkatan, 
                'nomor_surat_pemberkatan'=> $request->nomor_surat_pemberkatan, 
                'nama_pendeta_pemberkatan'=> $request->nama_pendeta_pemberkatan, 
                'keterangan'=> $request->keterangan, 
                'nama_lengkap_laki'=> $request->nama_lengkap_laki, 
                'id_jemaat_laki'=> $request->id_jemaat_laki, 
                'id_gereja_laki'=> $request->id_gereja_laki, 
                'nama_gereja_laki'=> $request->nama_gereja_laki, 
                'nama_ayah_laki'=> $request->nama_ayah_laki, 
                'nama_ibu_laki'=> $request->nama_ibu_laki, 
                'nama_lengkap_perempuan'=> $request->nama_lengkap_perempuan, 
                'id_jemaat_perempuan'=> $request->id_jemaat_perempuan, 
                'id_gereja_perempuan'=> $request->id_gereja_perempuan, 
                'nama_gereja_perempuan'=> $request->nama_gereja_perempuan, 
                'nama_ayah_perempuan'=> $request->nama_ayah_perempuan, 
                'nama_ibu_perempuan'=> $request->nama_ibu_perempuan,
                'status' => 1
            ]);

            if($request->id_jemaat_laki == null && $request->id_jemaat_perempuan != null){
            $dataPerempuan = DB::statement('CALL RegistrasiPernikahanJemaatPerempuan(?)',[$request->id_jemaat_perempuan]);
            }
        
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

    public function updateRegistrasiPernikahan(Request $request){
        try {
            $id_registrasi_nikah = $request->input('id_registrasi_nikah');
            $data = DB::table('registrasi_pernikahan')->where('id_registrasi_nikah', $request->id_registrasi_nikah)->update([
                'id_gereja_martumpol'=> $request->id_gereja_martumpol,
                'tgl_martumpol'=> $request->tgl_martumpol, 
                'tgl_warta_martumpol'=> $request->tgl_warta_martumpol, 
                'nama_gereja_martumpol'=> $request->nama_gereja_martumpol, 
                'nomor_surat_martumpol'=> $request->nomor_surat_martumpol, 
                'nama_pendeta_martumpol'=> $request->nama_pendeta_martumpol, 
                'id_gereja_pemberkatan'=> $request->id_gereja_pemberkatan, 
                'tgl_pemberkatan'=> $request->tgl_pemberkatan, 
                'tgl_warta_pemberkatan'=> $request->tgl_warta_pemberkatan, 
                'nama_gereja_pemberkatan'=> $request->nama_gereja_pemberkatan, 
                'nomor_surat_pemberkatan'=> $request->nomor_surat_pemberkatan, 
                'nama_pendeta_pemberkatan'=> $request->nama_pendeta_pemberkatan, 
                'keterangan'=> $request->keterangan, 
                'nama_lengkap_laki'=> $request->nama_lengkap_laki, 
                'id_jemaat_laki'=> $request->id_jemaat_laki, 
                'id_gereja_laki'=> $request->id_gereja_laki, 
                'nama_gereja_laki'=> $request->nama_gereja_laki, 
                'nama_ayah_laki'=> $request->nama_ayah_laki, 
                'nama_ibu_laki'=> $request->nama_ibu_laki, 
                'nama_lengkap_perempuan'=> $request->nama_lengkap_perempuan, 
                'id_jemaat_perempuan'=> $request->id_jemaat_perempuan, 
                'id_gereja_perempuan'=> $request->id_gereja_perempuan, 
                'nama_gereja_perempuan'=> $request->nama_gereja_perempuan, 
                'nama_ayah_perempuan'=> $request->nama_ayah_perempuan, 
                'nama_ibu_perempuan'=> $request->nama_ibu_perempuan,
                'status' => 1
            ]);
            $data = DB::statement('CALL updateRegistrasiPernikahan(?)',[$id_registrasi_nikah]);

            // return $dataRpp;
            if(!$data){
                return "store procedure ngga jalan";
            }
            return ApiFormatter::createApi('200', 'Success', $data);
                
        } catch (Exception $error) {
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewRegistrasiPernikahanById($id){
        $sidi = DB::select('CALL viewRegistrasiPernikahanById(?)',[$id]);

        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function viewEditRegistrasiPernikahan($id){
        $sidi = DB::select('CALL viewEditRegistrasiPernikahan(?)',[$id]);
        if($sidi){
            return ApiFormatter::createApi('200', 'Success', $sidi);
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }

    public function deleteRegistrasiPernikahan($id){
        
        $sidi = DB::select('CALL deleteRegistrasiPernikahan(?)',[$id]);

        if($sidi){
            return ApiFormatter::createApi('200', 'Success');
        }else{
            return ApiFormatter::createApi('400', 'Failed');
        }
    }
}
