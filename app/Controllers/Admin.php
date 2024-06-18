<?php

namespace App\Controllers;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;
use App\Models\ModelBahan;

class Admin extends BaseController
{
    protected $ModelProduk;
    protected $ModelKategori;
    protected $ModelSatuan;
    protected $ModelBahan;

    public function __construct() {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelBahan = new ModelBahan();
    }
    public function index()
    {
        $data =[
            'judul'=> 'Dashboard',
            'subjudul'=> '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',

            'produk' => $this->ModelProduk->getProductCount(),
            'kategori' => $this->ModelKategori->getProductCount(),
            'satuan' => $this->ModelSatuan->getProductCount(),
            'bahan' => $this->ModelBahan->getProductCount(),
        ];
        return view('v_template', $data);
    }

    public function Setting(){
        $data =[
            'judul'=> 'Setting',
            'subjudul'=> '',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
        ];
        return view('v_template', $data);
    }

}
