<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pemetaan Sekolah',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
        ];
        return view('v_web', $data);
    }

    public function kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
        $data = [
            'title' => 'Kecamatan ' . $kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'kec' => $kec,   
            'jenjang' => $this->WebModel->DataJenjang(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'sklh' => $this->WebModel->DataSekolah($id_kecamatan),

        ];
        return view('v_kecamatan', $data);

    }

    public function detail($id_sekolah)
    {
        $sekolah = $this->WebModel->detail($id_sekolah);
        $data = [
            'title' => 'Detail ' .$sekolah->nama_sekolah,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'sekolah' => $sekolah
            

        ];
        return view('v_detail', $data);

    }

}
