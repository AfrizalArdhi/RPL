<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelTransaksi;

class Transaksi extends BaseController
{
    protected $ModelTransaksi;

    public function __construct() {
        $this->ModelTransaksi = new ModelTransaksi();
    }
    public function index()
    {
        $data =[
            'judul'=> 'Transaksi',
            'subjudul'=> '',
            'menu' => 'transaksi',
            'submenu' => '',
            'page' => 'v_transaksi',
            'transaksi' =>$this->ModelTransaksi->AllData()
        ];
        return view('v_template', $data);
    }
}
