<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PekerjaanModel;
use App\Models\KoordinatModel;
class PekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->PekerjaanModel =  new PekerjaanModel();
        $this->KoordinatModel =  new KoordinatModel();

    } 

    public function index()
    {
        $data = [
            'title' => 'Daftar Pekerjaan',
            'pekerjaan' => $this->PekerjaanModel->AllData(),
            'koordinat' =>$this->KoordinatModel->AllData(),
        ];
        return view('admin.pekerjaan.v_index', $data);
    }
}
