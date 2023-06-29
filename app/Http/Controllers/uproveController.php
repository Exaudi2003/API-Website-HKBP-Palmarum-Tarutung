<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class uproveController extends Controller
{

    public function baptis()
    {
        $data = DB::table('registrasi_baptis')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userBaptis()
    {
        $data = DB::table('registrasi_baptis')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusBaptis1(Request $request, $id)
    {
        DB::table('registrasi_baptis')->where('id_registrasi_baptis', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusBaptis2(Request $request, $id)
    {
        DB::table('registrasi_baptis')->where('id_registrasi_baptis', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function sidi()
    {
        $data = DB::table('registrasi_sidi')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userSidi()
    {
        $data = DB::table('registrasi_sidi')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusSidi1(Request $request, $id)
    {
        DB::table('registrasi_sidi')->where('id_registrasi_sidi', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusSidi2(Request $request, $id)
    {
        DB::table('registrasi_sidi')->where('id_registrasi_sidi', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function pindah()
    {
        $data = DB::table('head_pindah')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userPindah()
    {
        $data = DB::table('head_pindah')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusPindah1(Request $request, $id)
    {
        DB::table('head_pindah')->where('id_head_reg_pindah', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusPindah2(Request $request, $id)
    {
        DB::table('head_pindah')->where('id_head_reg_pindah', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    
    public function prvJemaat()
    {
        $data = DB::table('jemaat')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userPrvJemaat()
    {
        $data = DB::table('jemaat')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusJemaat1(Request $request, $id)
    {
        DB::table('jemaat')->where('id_jemaat', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusJemaat2(Request $request, $id)
    {
        DB::table('jemaat')->where('id_jemaat', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function nikah()
    {
        $data = DB::table('registrasi_pernikahan')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userNikah()
    {
        $data = DB::table('registrasi_pernikahan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusNikah1(Request $request, $id)
    {
        DB::table('registrasi_pernikahan')->where('id_registrasi_nikah', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusNikah2(Request $request, $id)
    {
        DB::table('registrasi_pernikahan')->where('id_registrasi_nikah', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function martumpol()
    {
        $data = DB::table('registrasi_calon_mempelai')->where(['status' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function userMartumpol()
    {
        $data = DB::table('registrasi_calon_mempelai')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function statusMartumpol1(Request $request, $id)
    {
        DB::table('registrasi_calon_mempelai')->where('id_registrasi_calon', $id)->update(['status' => 1]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }

    public function statusMartumpol2(Request $request, $id)
    {
        DB::table('registrasi_calon_mempelai')->where('id_registrasi_calon', $id)->update(['status' => 2]);

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}
