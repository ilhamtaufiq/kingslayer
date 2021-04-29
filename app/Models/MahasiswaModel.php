<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    //ambil data dari tabel mahasiswa
    public function AllData()
    {
        //tbl_mahasiswa adalah nama tabel di database
        return DB::table('tbl_mahasiswa')->get();
    }
}
