<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KegiatanModel extends Model
{
    public function AllData()
    {
       return DB::table('tbl_kegiatan')->get();
    }
}
