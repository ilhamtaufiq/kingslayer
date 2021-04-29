<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KoordinatModel;

class KoordinatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->KoordinatModel =  new KoordinatModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Koordinat',
            'koordinat' => $this->KoordinatModel->AllData(),
        ];
        return view('admin.koordinat.v_index', $data);
    }
}
