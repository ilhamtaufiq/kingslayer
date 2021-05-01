<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PekerjaanModel;
use App\Models\KegiatanModel;
use App\Models\DesaModel;
use App\Models\KecamatanModel;

use DB;

class PekerjaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->PekerjaanModel =  new PekerjaanModel();
        $this->KegiatanModel = new KegiatanModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->DesaModel = new DesaModel();

    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pekerjaan',
            'pekerjaan' => $this->PekerjaanModel->AllData(),
            'kegiatan' => $this->KegiatanModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'desa' => $this->DesaModel->AllData(),
        ];
        return view('admin.pekerjaan.v_index', $data);
    }
    public function getDesa(Request $request)
	{
		$states = DB::table("tbl_desa")
		->where("id_kecamatan",$request->id_kecamatan)
		->pluck("desa","id_desa");
		return response()->json($states);
	}

    public function add()
    {
        $data = [
            'title' => 'Tambah Daftar Pekerjaan',
            'pekerjaan' => $this->PekerjaanModel->AllData(),
            'kegiatan' => $this->KegiatanModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'desa' => $this->DesaModel->AllData(),
            'kec' => DB::table("tbl_kecamatan")->pluck("kecamatan","id_kecamatan"),
         ];
        return view('admin.pekerjaan.v_add', $data);
    }
    public function insert()
    {
        Request()->validate([
            'id_kegiatan' => 'required',
            'pekerjaan' => 'required',
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'pagu' => 'required',
            'tahun' => 'required|integer|min:1997|max:2030',
        ],
        [
            'id_kegiatan' => 'required',
            'pekerjaan' => 'required',
           // 'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'pagu' => 'required',
            'tahun.required' => 'Hanya Diperbolehkan Tahun 1997-2030',
        ],
    );


    $data = [
        'id_kegiatan' => Request()->id_kegiatan,
        'pekerjaan' => Request()->pekerjaan,
        'id_desa' => Request()->id_desa,
        'id_kecamatan' => Request()->id_kecamatan,
        'pagu' => Request()->pagu,
        'tahun' => Request()->tahun,
    ];
    
    $this->PekerjaanModel->InsertData($data);
    return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Ditambahkan');

    }

    public function edit($id_pekerjaan)
    {
        $data = [
            'title' => 'Edit Data Pekerjaan',
            'pekerjaan' => $this->PekerjaanModel->DetailData($id_pekerjaan),
            'kegiatan' => $this->KegiatanModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'desa' => $this->DesaModel->AllData(),
            'kec' => DB::table("tbl_kecamatan")->pluck("kecamatan","id_kecamatan"),

        ];
        return view('admin.pekerjaan.v_edit', $data);
    }

    public function update($id_pekerjaan )
    {
        Request()->validate([
            'id_kegiatan' => 'required',
            'pekerjaan' => 'required',
            'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'pagu' => 'required',
            'tahun' => 'required|integer|min:1997|max:2030',
        ],
        [
            'id_kegiatan' => 'required',
            'pekerjaan' => 'required',
           // 'id_desa' => 'required',
            'id_kecamatan' => 'required',
            'pagu' => 'required',
            'tahun.required' => 'Hanya Diperbolehkan Tahun 1997-2030',

        ],
    );
            $data = [
                'id_kegiatan' => Request()->id_kegiatan,
                'pekerjaan' => Request()->pekerjaan,
                'id_desa' => Request()->id_desa,
                'id_kecamatan' => Request()->id_kecamatan,
                'pagu' => Request()->pagu,
                'tahun' => Request()->tahun,
    
            ];
            $this->PekerjaanModel->UpdateData($id_pekerjaan,$data);
            return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Diubah');  
    }


    public function delete($id_pekerjaan )
    {
        $this->PekerjaanModel->DeleteData($id_pekerjaan);
        return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Dihapus ');
    }
}
