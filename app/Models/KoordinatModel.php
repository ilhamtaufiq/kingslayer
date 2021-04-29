<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class KoordinatModel extends Model
{
    public function AllData()
    {
        return DB::table('tbl_koordinat')
        ->join('tbl_pekerjaan', 'tbl_pekerjaan.id_pekerjaan', '=', 'tbl_koordinat.id_pekerjaan')
        ->get();
    }

}
