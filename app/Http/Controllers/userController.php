<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function daftarBaptis(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'keterangan' => 'required',
                'jenis_kelamin' => 'required',
                'id_user' => 'required',
            ]);

            $nama_lengkap = $request->input('nama_lengkap');
            $nama_ayah = $request->input('nama_ayah');
            $nama_ibu = $request->input('nama_ibu');
            $tempat_lahir = $request->input('tempat_lahir');
            $tanggal_lahir = $request->input('tanggal_lahir');
            $jenis_kelamin = $request->input('jenis_kelamin');
            $alamat = $request->input('alamat');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('registrasi_baptis')->insert([
                'nama_lengkap' => $nama_lengkap,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'alamat' => $alamat,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            ]);

            // $data = registrasi_baptis::where('id', '=', $registrasi_baptis->id_registrasi_baptis)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('Failed to create user'), 500);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function daftarSidi(Request $request)
    {
        try {
            $request->validate([
                'nama_lengkap' => 'required',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'id_gereja_sidi' => 'required',
                'nama_gereja_non_hkbp' => 'required',
                'id_hub_keluarga' => 'required',
                'keterangan' => 'required',
                'id_user' => 'required',
            ]);

            $nama_lengkap = $request->input('nama_lengkap');
            $nama_ayah = $request->input('nama_ayah');
            $nama_ibu = $request->input('nama_ibu');
            $tempat_lahir = $request->input('tempat_lahir');
            $tanggal_lahir = $request->input('tanggal_lahir');
            $id_gereja_sidi = $request->input('id_gereja_sidi');
            $nama_gereja_non_hkbp = $request->input('nama_gereja_non_hkbp');
            $id_hub_keluarga = $request->input('id_hub_keluarga');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('registrasi_sidi')->insert([
                'nama_lengkap' => $nama_lengkap,
                'nama_ayah' => $nama_ayah,
                'nama_ibu' => $nama_ibu,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'id_gereja_sidi' => $id_gereja_sidi,
                'nama_gereja_non_hkbp' => $nama_gereja_non_hkbp,
                'id_hub_keluarga' => $id_hub_keluarga,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            ]);

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function daftarJemaat(Request $request)
    {
        try {
            $request->validate([
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'gelar_depan' => 'required',
                'gelar_belakang' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'gol_darah' => 'required',
                'id_hub_keluarga' => 'required',
                // 'id_status_pernikahan' => 'required',
                'id_pendidikan' => 'required',
                'id_bidang_pendidikan' => 'required',
                // 'id_bidang_pendidikan_lain' => 'required',
                'id_pekerjaan' => 'required',
                'nama_pekerjaan_lain' => 'required',
                'no_telepon' => 'required',
                'alamat' => 'required',
                'keterangan' => 'required',
                'id_user' => 'required',
            ]);

            $nama_depan = $request->input('nama_depan');
            $nama_belakang = $request->input('nama_belakang');
            $gelar_depan = $request->input('gelar_depan');
            $gelar_belakang = $request->input('gelar_belakang');
            $tempat_lahir = $request->input('tempat_lahir');
            $tanggal_lahir = $request->input('tanggal_lahir');
            $jenis_kelamin = $request->input('jenis_kelamin');
            $gol_darah = $request->input('gol_darah');
            $id_hub_keluarga = $request->input('id_hub_keluarga');
            // $id_status_pernikahan = $request->input('id_status_pernikahan');
            $id_pendidikan = $request->input('id_pendidikan');
            $id_bidang_pendidikan = $request->input('id_bidang_pendidikan');
            // $id_bidang_pendidikan_lain = $request->input('id_bidang_pendidikan_lain');
            $id_pekerjaan = $request->input('id_pekerjaan');
            $no_telepon = $request->input('no_telepon');
            $alamat = $request->input('alamat');
            $nama_pekerjaan_lain = $request->input('nama_pekerjaan_lain');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('jemaat')->insert([
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'gelar_depan' => $gelar_depan,
                'gelar_belakang' => $gelar_belakang,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'gol_darah' => $gol_darah,
                'id_hub_keluarga' => $id_hub_keluarga,
                // 'id_status_pernikahan' => $id_status_pernikahan,
                'id_pendidikan' => $id_pendidikan,
                'id_bidang_pendidikan' => $id_bidang_pendidikan,
                // 'id_bidang_pendidikan_lain' => $id_bidang_pendidikan_lain,
                'id_pekerjaan' => $id_pekerjaan,
                'jenis_kelamin' => $jenis_kelamin,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'nama_pekerjaan_lain' => $nama_pekerjaan_lain,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            ]);

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function daftarNikah(Request $request)
    {
        try {
            $request->validate([
                'tgl_martumpol' => 'required',
                'nama_gereja_martumpol' => 'required',
                'tgl_pemberkatan' => 'required',
                'nama_gereja_pemberkatan' => 'required',
                'nama_lengkap_laki' => 'required',
                'nama_gereja_laki' => 'required',
                'nama_ayah_laki' => 'required',
                'nama_ibu_laki' => 'required',
                'nama_lengkap_perempuan' => 'required',
                'nama_gereja_perempuan' => 'required',
                'nama_ayah_perempuan' => 'required',
                'nama_ibu_perempuan' => 'required',
                'keterangan' => 'required',
                'id_user' => 'required',
            ]);

            $tgl_martumpol = $request->input('tgl_martumpol');
            $nama_gereja_martumpol = $request->input('nama_gereja_martumpol');
            $tgl_pemberkatan = $request->input('tgl_pemberkatan');
            $nama_gereja_pemberkatan = $request->input('nama_gereja_pemberkatan');
            $nama_lengkap_laki = $request->input('nama_lengkap_laki');
            $nama_gereja_laki = $request->input('nama_gereja_laki');
            $nama_ayah_laki = $request->input('nama_ayah_laki');
            $nama_ibu_laki = $request->input('nama_ibu_laki');
            $nama_lengkap_perempuan = $request->input('nama_lengkap_perempuan');
            $nama_gereja_perempuan = $request->input('nama_gereja_perempuan');
            $nama_ayah_perempuan = $request->input('nama_ayah_perempuan');
            $nama_ibu_perempuan = $request->input('nama_ibu_perempuan');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('registrasi_pernikahan')->insert([
                'tgl_martumpol' => $tgl_martumpol,
                'nama_gereja_martumpol' => $nama_gereja_martumpol,
                'tgl_pemberkatan' => $tgl_pemberkatan,
                'nama_gereja_pemberkatan' => $nama_gereja_pemberkatan,
                'nama_lengkap_laki' => $nama_lengkap_laki,
                'nama_gereja_laki' => $nama_gereja_laki,
                'nama_ayah_laki' => $nama_ayah_laki,
                'nama_ibu_laki' => $nama_ibu_laki,
                'nama_lengkap_perempuan' => $nama_lengkap_perempuan,
                'nama_gereja_perempuan' => $nama_gereja_perempuan,
                'nama_ayah_perempuan' => $nama_ayah_perempuan,
                'nama_ibu_perempuan' => $nama_ibu_perempuan,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            ]);

            // $data = registrasi_baptis::where('id', '=', $registrasi_baptis->id_registrasi_baptis)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('Failed to create user'), 500);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function daftarMartumpol(Request $request)
    {
        try {
            $request->validate([
                'nama_gereja_laki' => 'required',
                'id_jemaat_laki' => 'required',
                'nama_ayah_laki' => 'required',
                'nama_ibu_laki' => 'required',
                'nama_gereja_perempuan' => 'required',
                'id_jemaat_perempuan' => 'required',
                'nama_ayah_perempuan' => 'required',
                'nama_ibu_perempuan' => 'required',
                'keterangan' => 'required',
                'id_user' => 'required',
            ]);

            $nama_gereja_laki = $request->input('nama_gereja_laki');
            $id_jemaat_laki = $request->input('id_jemaat_laki');
            $nama_ayah_laki = $request->input('nama_ayah_laki');
            $nama_ibu_laki = $request->input('nama_ibu_laki');
            $nama_gereja_perempuan = $request->input('nama_gereja_perempuan');
            $id_jemaat_perempuan = $request->input('id_jemaat_perempuan');
            $nama_ayah_perempuan = $request->input('nama_ayah_perempuan');
            $nama_ibu_perempuan = $request->input('nama_ibu_perempuan');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('registrasi_calon_mempelai')->insert([
                'nama_gereja_laki' => $nama_gereja_laki,
                'id_jemaat_laki' => $id_jemaat_laki,
                'nama_ayah_laki' => $nama_ayah_laki,
                'nama_ibu_laki' => $nama_ibu_laki,
                'nama_gereja_perempuan' => $nama_gereja_perempuan,
                'id_jemaat_perempuan' => $id_jemaat_perempuan,
                'nama_ayah_perempuan' => $nama_ayah_perempuan,
                'nama_ibu_perempuan' => $nama_ibu_perempuan,
                'keterangan' => $keterangan,
                'id_user' => $id_user
            ]);

            // $data = registrasi_baptis::where('id', '=', $registrasi_baptis->id_registrasi_baptis)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('User created successfully'), 201);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
                // $formatter = new ApiFormatter();
                // return response()->json($formatter->format('Failed to create user'), 500);
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function daftarPindah(Request $request)
    {
        try {
            $request->validate([
                'id_registrasi' => 'required',
                'id_jemaat' => 'required',
                'tgl_pindah' => 'required',
                'nama_gereja' => 'required',
                'keterangan' => 'required',
                'id_user' => 'required',
            ]);

            $id_registrasi = $request->input('id_registrasi');
            $id_jemaat = $request->input('id_jemaat');
            $tgl_pindah = $request->input('tgl_pindah');
            $nama_gereja = $request->input('nama_gereja');
            $keterangan = $request->input('keterangan');
            $id_user = $request->input('id_user');

            $data = DB::table('head_pindah')->insert([
                'id_registrasi' => $id_registrasi,
                'id_jemaat' => $id_jemaat,
                'tgl_pindah' => $tgl_pindah,
                'nama_gereja' => $nama_gereja,
                'keterangan' => $keterangan,
                'id_user' => $id_user,
            ]);

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function keluarga()
    {
        $data = DB::table('hubungan_keluarga')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function pendidikan()
    {
        $data = DB::table('pendidikan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function BidangPendidikan()
    {
        $data = DB::table('bidang_pendidikan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function pekerjaan()
    {
        $data = DB::table('pekerjaan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function jemaat()
    {
        $data = DB::table('jemaat')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function namKeluarga()
    {
        $data = DB::table('registrasi_jemaat')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function gereja()
    {
        $data = DB::table('gereja')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function pelayan()
    {
        // $data = DB::table('pelayan_gereja')->get();
        $result = DB::select('CALL viewAllPelayan()');
        return response()->json($result);

        if($result){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function jadwal()
    {
        $data = DB::table('jadwal_ibadah')->where(['is_deleted' => 0])->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function kegiatan()
    {
        $data = DB::table('jenis_kegiatan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function pemasukan()
    {
        $data = DB::table('pemasukan')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function pengeluaran()
    {
        $data = DB::table('pengeluaran')->get();
        return response()->json($data);

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
