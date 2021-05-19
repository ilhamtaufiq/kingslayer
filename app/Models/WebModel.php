<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class WebModel extends Model
{ 
    public function DataKecamatan ()
    {
       return DB::table('tbl_kecamatan')->get();
    }
    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('tbl_kecamatan')
        ->where('id_kecamatan', $id_kecamatan)->first();    
    }
    public function DataJenjang()
    {
       return DB::table('tbl_jenjang')->get();
    }

    public function DataSekolah($id_kecamatan)
    {
        return DB::table('tbl_sekolah')        
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
        ->where('tbl_sekolah.id_kecamatan',$id_kecamatan)
        ->get();        
    }
    public function DataSanitasi($id_kecamatan)
    {
        return DB::table('tbl_pekerjaan')
        ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_pekerjaan.id_kegiatan')
        ->join('tbl_desa', 'tbl_desa.id_desa', '=', 'tbl_pekerjaan.id_desa')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_pekerjaan.id_kecamatan')
        ->where('tbl_pekerjaan.id_kecamatan',$id_kecamatan)
        ->get();
    }
    

    public function AllDataSekolah()
    {
        return DB::table('tbl_sekolah')        
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
        ->get();        
    }
    public function AllDataKoordinat()
    {
        return DB::table('tbl_koordinat')
        ->join('tbl_pekerjaan', 'tbl_pekerjaan.id_pekerjaan', '=', 'tbl_koordinat.id_pekerjaan')
        ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_koordinat.id_kegiatan')
        ->get();
    }

    public function detail($id_sekolah)
    {
        return DB::table('tbl_sekolah')        
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang', '=', 'tbl_sekolah.id_jenjang')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_sekolah.id_kecamatan')
        ->where('id_sekolah',$id_sekolah)
        ->first();        
    }
    public function detailSan($id_pekerjaan)
    {
        return DB::table('tbl_pekerjaan')
        ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_pekerjaan.id_kegiatan')
        ->join('tbl_desa', 'tbl_desa.id_desa', '=', 'tbl_pekerjaan.id_desa')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_pekerjaan.id_kecamatan')
        ->where('id_pekerjaan',$id_pekerjaan)
        ->first();        
    }

    public function AllDataKegiatan()
    {
        return DB::table('tbl_kegiatan')->get();        
    }
}
