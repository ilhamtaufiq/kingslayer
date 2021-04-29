<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->MahasiswaModel =  new MahasiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Chart Mahasiswa',
            //AllData ngambil dari Model MahasiswaModel
            'mahasiswa' => $this->MahasiswaModel->AllData(),
        ];
        //'mahasiswa' adalah nama view di resource
        return view('mahasiswa', $data);
    }
}
