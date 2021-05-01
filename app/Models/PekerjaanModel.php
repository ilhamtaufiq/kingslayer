<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PekerjaanModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_pekerjaan')
        ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_pekerjaan.id_kegiatan')
        ->join('tbl_desa', 'tbl_desa.id_desa', '=', 'tbl_pekerjaan.id_desa')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_pekerjaan.id_kecamatan')
        ->get();
    }
    
    public function InsertData($data)
    {
        DB::table('tbl_pekerjaan')
        ->insert($data);
    }

    public function DetailData($id_pekerjaan)
    {
        return DB::table('tbl_pekerjaan')
        ->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan', '=', 'tbl_pekerjaan.id_kegiatan')
        ->join('tbl_desa', 'tbl_desa.id_desa', '=', 'tbl_pekerjaan.id_desa')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_pekerjaan.id_kecamatan')
        ->where('id_pekerjaan', $id_pekerjaan)
        ->first();
    }

    public function UpdateData($id_pekerjaan, $data)
    {
        return DB::table('tbl_pekerjaan')
        ->where('id_pekerjaan', $id_pekerjaan)
        ->update($data);
    }


    public function DeleteData($id_pekerjaan)
    {
        return DB::table('tbl_pekerjaan')
        ->where('id_pekerjaan', $id_pekerjaan)
        ->delete();
    }
}
