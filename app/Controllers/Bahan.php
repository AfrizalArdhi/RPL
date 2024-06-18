<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelBahan;

class Bahan extends BaseController
{
    protected $ModelBahan;
    public function __construct() {
        $this->ModelBahan = new ModelBahan();
    }
    public function index()
    {
        $data =[
            'judul'=> 'Master Data',
            'subjudul'=> 'Bahan',
            'menu' => 'masterdata',
            'submenu' => 'bahan',
            'page' => 'v_bahan',
            'bahan' =>$this->ModelBahan->AllData()
        ];
        return view('v_template', $data);
    }
    public function InsertData(){
        $data = [
            'nama_bahan' => $this->request->getPost('nama_bahan'),
            'stok' => $this->request->getPost('stok')
        ];
        $this->ModelBahan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Bahan');
    }

    public function UpdateData($id_bahan){
        $data = [
            'id_bahan' => $id_bahan,
            'nama_bahan' => $this->request->getPost('nama_bahan'),
            'stok' => $this->request->getPost('stok')
        ];
        $this->ModelBahan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!');
        return redirect()->to('Bahan');
    }
    public function DeleteData($id_bahan){
        $data = [
            'id_bahan' => $id_bahan,
        ];
        $this->ModelBahan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Bahan');
    }
}
