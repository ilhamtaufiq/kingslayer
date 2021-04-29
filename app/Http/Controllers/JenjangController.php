<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenjangModel;

class JenjangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'title' => 'Jenjang',
            'jenjang' => $this->JenjangModel->AllData(),
        ];
        return view('admin.jenjang.v_index', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Tambah Jenjang',
         ];
        return view('admin.jenjang.v_add', $data);
    }

    public function insert()
    {
        Request()->validate([
            'jenjang' => 'required',
            'icon' =>'required',
        ],[
            'jenjang.required' => 'Wajib Diisi!',
            'icon.required' => 'Wajib Diisi!',
        ]);

        $file = Request()->icon;
        $filename = $file->getClientOriginalName();
        $file->move(public_path('icon'), $filename);
        
        $data = [
            'jenjang' => Request()->jenjang,
            'icon' => $filename,

        ];
        $this->JenjangModel->InsertData($data);
        return redirect()->route('jenjang')->with('pesan', 'Data Jenjang Berhasil Ditambahkan');

    }

    public function edit($id_jenjang)
    {
        $data = [
            'title' => 'Edit Jenjang',
            'jenjang' => $this->JenjangModel->DetailData($id_jenjang),
         ];
        return view('admin.jenjang.v_edit', $data);
    }

    public function update($id_jenjang)
    {
        Request()->validate([
            'jenjang' => 'required',
        ],[
            'jenjang.required' => 'Wajib Diisi!',
        ]);

        if (Request()->icon <> "") {
            //Hapus icon lama
            $jenjang = $this->JenjangModel->DetailData($id_jenjang);
            if ($jenjang->icon <> "") {
                # code...
                unlink (public_path('icon').'/'.$jenjang->icon);
            }
            # Jika ingin ganti data icon
            $file = Request()->icon;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('icon'), $filename); 
            $data = [
                'jenjang' => Request()->jenjang,
                'icon' => $filename,
    
            ];
            $this->JenjangModel->UpdateData($id_jenjang,$data);
        }else{
            //Jika tidak ganti icon
            $data = [
                'jenjang' => Request()->jenjang,
    
            ];
            $this->JenjangModel->UpdateData($id_jenjang,$data);
        }
        return redirect()->route('jenjang')->with('pesan', 'Data Jenjang Berhasil Diubah');

    }
    public function delete($id_jenjang )
    {
        //Hapus icon lama
        $jenjang = $this->JenjangModel->DetailData($id_jenjang);
        if ($jenjang->icon <> "") {
                # code...
            unlink (public_path('icon').'/'.$jenjang->icon);
        }        
        $this->JenjangModel->DeleteData($id_jenjang);
        return redirect()->route('jenjang')->with('pesan', 'Data Jenjang Berhasil Dihapus ');
    }
}
