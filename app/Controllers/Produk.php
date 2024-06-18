<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBahan;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Produk extends BaseController
{
    protected $ModelProduk;
    protected $ModelKategori;
    protected $ModelSatuan;
    protected $ModelPenjualan;
    protected $ModelBahan;
    
    public function __construct() {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelBahan = new ModelBahan();
        helper('number');
    }
    public function index()
    {
        $data =[
            'judul'=> 'Master Data',
            'subjudul'=> 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
            'bahan' => $this->ModelBahan->AllData(),
        ];
        return view('v_template', $data);
    }
    public function InsertData(){
        if($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk / Barcode',
                'rules' => 'is_unique[tbl_produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} Sudah ada, Masukkan Kode Lain!',
                ]
                ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih1',
                ]
                ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} belum dipilih!',
                ]
                ]
        ])){
            //
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation');
        }
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'id_bahan' => $this->request->getPost('id_bahan'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'gambar' => $this->request->getPost('gambar'),
            // 'stok' => $this->request->getPost('stok'),
        ];
        $this->ModelProduk->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Produk');
    }

    public function UpdateData($id_produk){
        $data = [
            'id_produk' => $id_produk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_satuan' => $this->request->getPost('id_satuan'),
            'id_bahan' => $this->request->getPost('id_bahan'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'gambar' => $this->request->getPost('gambar'),

            // 'stok' => $this->request->getPost('stok'),
            
        ];
        $this->ModelProduk->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!');
        return redirect()->to('Produk');
    }
    public function DeleteData($id_produk){
        $data = [
            'id_produk' => $id_produk,
        ];
        $this->ModelProduk->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Produk');
    }
}
