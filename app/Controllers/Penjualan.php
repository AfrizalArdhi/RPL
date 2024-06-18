<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPenjualan;
use App\Models\ModelSatuan;

class Penjualan extends BaseController
{   
    protected $ModelProduk;
    protected $ModelKategori;
    protected $ModelSatuan;
    protected $ModelPenjualan;
    
    public function __construct() {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelPenjualan = new ModelPenjualan();
        helper('number');
        helper('form');
    }
    
    public function index()
    {
        $data =[
            'no_faktur'=> $this->ModelPenjualan->NoFaktur(),
            'judul'=> 'Penjualan',
            'subjudul'=> '',
            'menu' => 'penjualan',
            'submenu' => '',
            'page' => 'v_penjualan',
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
            'penjualan' => $this->ModelPenjualan->AllData(),
            'cart' => \Config\Services::cart()
        ];
        return view('v_template', $data);
    }
    
    public function cek(){
        $cart = \Config\Services::cart();
        $response = $cart->contents();
        $data = json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    //insert
    public function add(){
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('idprod'),
            'qty'     => 1,
            'price'   => $this->request->getPost('harga'),
            'name'     => $this->request->getPost('nama'),
            'options' => array(
                'kode' => $this->request->getPost('kode'),
                'hargabeli' => $this->request->getPost('hargabeli'),
                'stokprod' =>$this->request->getPost('stokprod'),
                'idbahan' =>$this->request->getPost('idbahan')
            )
        ));
        session()->setFlashdata('pesan', 'Ditambahkan ke Keranjang!');
        return redirect()->to(base_url('Penjualan'));
        
    }
    public function update(){
        $cart = \Config\Services::cart();
        $i = 1;
        foreach ($cart->contents() as $key => $value){
            $cart->update(array(
                'rowid'=> $value['rowid'],
                'qty'=> $this->request->getPost('qty'. $i++),
            ));
        }
        return redirect()->to(base_url('Penjualan'));
    }

    public function updatee(){
        $cart = \Config\Services::cart();
        $i = 1;
        foreach ($cart->contents() as $key => $value){
            $cart->update(array(
                'rowid'=> $value['rowid'],
                'qty'=> $this->request->getPost('qty'. $i++),
            ));
        }
        return redirect()->to(base_url('Penjualan/keranjang'));
    }
    //delete
    
    public function del(){
        $cart = \Config\Services::cart();
        $cart->destroy();
    }

    public function delprod($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('Penjualan'));
    }

    public function delprodd($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('Penjualan/keranjang'));
    }
    
}
