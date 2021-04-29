<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SekolahModel;
use App\Models\KecamatanModel;
use App\Models\JenjangModel;


class SekolahController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->SekolahModel = new SekolahModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->JenjangModel = new JenjangModel();


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Sekolah',
            'sekolah' => $this->SekolahModel->AllData(),
        ];
        return view('admin.sekolah.v_index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah Sekolah',
            'kecamatan' => $this->KecamatanModel->AllData(),
            'jenjang' => $this->JenjangModel->AllData(),


         ];
        return view('admin.sekolah.v_add', $data);
    }
    public function insert()
    {
        Request()->validate([
            'nama_sekolah' => 'required',
            'id_jenjang' => 'required',
            'status' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'posisi' => 'required',
        ],
        [
            'nama_sekolah.required' => 'Wajib Diisi!',
            'id_jenjang.required' => 'Wajib Diisi!',
            'status.required' => 'Wajib Diisi!',
            'id_kecamatan.required' => 'Wajib Diisi!',
            'alamat.required' => 'Wajib Diisi!',
            'deskripsi.required' => 'Wajib Diisi!',
            'foto.required' => 'Wajib Diisi!',
            'posisi.required' => 'Wajib Diisi!',
        ],
    );

    $file = Request()->foto;
    $filename = $file->getClientOriginalName();
    $file->move(public_path('foto'), $filename);

    $data = [
        'nama_sekolah' => Request()->nama_sekolah,
        'id_jenjang' => Request()->id_jenjang,
        'status' => Request()->status,
        'id_kecamatan' => Request()->id_kecamatan,
        'alamat' => Request()->alamat,
        'deskripsi' => Request()->deskripsi,
        'foto' =>$filename,
        'posisi' => Request()->posisi,
    ];
    
    $this->SekolahModel->InsertData($data);
    return redirect()->route('sekolah')->with('pesan', 'Data Sekolah Berhasil Ditambahkan');

    }

    public function edit($id_sekolah)
    {
        $data = [
            'title' => 'Edit Data Sekolah',
            'kecamatan' => $this->KecamatanModel->AllData(),
            'jenjang' => $this->JenjangModel->AllData(),
            'sekolah' => $this->SekolahModel->DetailData($id_sekolah),
        ];
        return view('admin.sekolah.v_edit', $data);
    }

    public function update($id_sekolah )
    {
        Request()->validate([
            'nama_sekolah' => 'required',
            'id_jenjang' => 'required',
            'status' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            //'foto' => 'required',
            'posisi' => 'required',
        ],
        [
            'nama_sekolah.required' => 'Wajib Diisi!',
            'id_jenjang.required' => 'Wajib Diisi!',
            'status.required' => 'Wajib Diisi!',
            'id_kecamatan.required' => 'Wajib Diisi!',
            'alamat.required' => 'Wajib Diisi!',
            'deskripsi.required' => 'Wajib Diisi!',
            //'foto.required' => 'Wajib Diisi!',
            'posisi.required' => 'Wajib Diisi!',

        ],
        );
        if (Request()->foto <> "") {
            //Hapus icon lama
            $sekolah = $this->SekolahModel->DetailData($id_sekolah);
            if ($sekolah->foto <> "") {
                # code...
                unlink (public_path('foto').'/'.$sekolah->foto);
            }
            # Jika ingin ganti data icon
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename); 
            $data = [
                'nama_sekolah' => Request()->nama_sekolah,
                'id_jenjang' => Request()->id_jenjang,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'deskripsi' => Request()->deskripsi,
                'foto' =>$filename,
                'posisi' => Request()->posisi,
    
            ];
            $this->SekolahModel->UpdateData($id_sekolah,$data);
        }else{
            //Jika tidak ganti icon
            $data = [
                'nama_sekolah' => Request()->nama_sekolah,
                'id_jenjang' => Request()->id_jenjang,
                'status' => Request()->status,
                'id_kecamatan' => Request()->id_kecamatan,
                'alamat' => Request()->alamat,
                'deskripsi' => Request()->deskripsi,
                'posisi' => Request()->posisi,    
            ];
            $this->SekolahModel->UpdateData($id_sekolah,$data);
        }
        return redirect()->route('sekolah')->with('pesan', 'Data Sekolah Berhasil Diubah');  
    }

    public function delete($id_sekolah )
    {
        $this->SekolahModel->DeleteData($id_sekolah);
        return redirect()->route('sekolah')->with('pesan', 'Data Sekolah Berhasil Dihapus ');
    }

}
