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
        $total_pekerjaan = DB::table('tbl_pekerjaan')->count();
        $anggaran = DB::table('tbl_pekerjaan')->sum('pagu');

        $data = [
            'title' => 'Sistem Informasi Manajemen Sanitasi Kab. Cianjur',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'jenjang' => $this->WebModel->DataJenjang(),
            'sekolah' => $this->WebModel->AllDataSekolah(),
            'pekerjaan' => $this->WebModel->AllDataKoordinat(),
            'kegiatan' => $this->WebModel->AllDataKegiatan(),
            'total_pekerjaan' => $total_pekerjaan,
            'anggaran' => $anggaran,
        ];
        return view('v_web-san', $data);
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
            'sanitasi' => $this->WebModel->DataSanitasi($id_kecamatan),
            'kegiatan' => $this->WebModel->AllDataKegiatan(),

            
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
    public function detailSan($detailSan)
    {
        $pekerjaan = $this->WebModel->detailSan($detailSan);
        $data = [
            'title' => 'Detail ' .$pekerjaan->pekerjaan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'pekerjaan' => $pekerjaan
            

        ];
        return view('v_detail-san', $data);

    }

}
