<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelPenjualan;
use App\Models\ModelSatuan;
use App\Models\ModelKeranjang;
use App\Models\ModelBahan;
use DateTime;

class Keranjang extends BaseController
{   
    protected $ModelProduk;
    protected $ModelKategori;
    protected $ModelSatuan;
    protected $ModelKeranjang;
    protected $ModelPenjualan;
    protected $ModelBahan;
                    

    public function __construct() {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelPenjualan = new ModelPenjualan();
        $this->ModelKeranjang = new ModelKeranjang();
        $this->ModelBahan = new ModelBahan();
        helper('number');
        helper('form');
    }
    
    public function index()
    {
        $data =[
            'no_faktur'=> $this->ModelPenjualan->NoFaktur(),
            'judul'=> 'Kasir',
            'subjudul'=> 'keranjang',
            'menu' => 'keranjang',
            'submenu' => '',
            'page' => 'v_keranjang',
            'nama_pembeli' =>$this->request->getPost('nama_pembeli'),
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
            'penjualan' => $this->ModelPenjualan->AllData(),
            'keranjang' => $this->ModelKeranjang->AllData(),
            'cart' => \Config\Services::cart()
        ];
        return view('v_template', $data);
    }
    //delete
    public function del(){
        $cart = \Config\Services::cart();
        $cart->destroy();
    }
    public function delprodd($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('Penjualan/keranjang'));
    }

    public function InsertData(){
        $cart = \Config\Services::cart();
        date_default_timezone_set("Asia/Jakarta");
        $total = $cart->total();
        $bayar =  floatval($this->request->getPost('bayar'));
        $kembali = $bayar - $total;
        $keterangan = $this->request->getPost('order');
        $data = [
            'no_faktur' =>$this->request->getPost('no_faktur'),
            'tgl_jual' => date('Y-m-d'),
            'jam' =>date('H:i:s'),
            'grand_total' =>$total,
            'dbayar' => $bayar,
            'kembalian' => $kembali,
            'nama_kasir' => session()->get('nama_user'),
            'nama_pelanggan' =>$this->request->getPost('nama_pembeli'),
            'no_meja' =>$this->request->getPost('nomor_meja'),
            'keterangan' =>$keterangan,
        ];
        $this->ModelKeranjang->InsertData($data);

        foreach ($cart->contents() as $item) {
            $profit = ($item['price'] - $item['options']['hargabeli']) * $item['qty'];
            $dataRinci = [
                'no_faktur' =>$this->request->getPost('no_faktur'),
                'kode_produk' => $item['options']['kode'],
                'nama_produk' => $item['name'],
                'tgl_jual' => date('Y-m-d'),
                'jam' =>date('H:i:s'),
                'qty' => $item['qty'],
                'harga_beli' => $item['options']['hargabeli'],
                'harga_jual' => $item['price'],
                'untung' => $profit,
                'total' => $item['subtotal'],
            ];
            $this->ModelKeranjang->InsertRinciData($dataRinci);
        }

        foreach ($cart->contents() as $item) {
            $updatebahan = $item['options']['stokprod'] - $item['qty'];
            $databahan = [
                'id_bahan' => $item['options']['idbahan'],
                'stok' => $updatebahan,
            ];
            $this->ModelKeranjang->UpdateBahan($databahan);
        }
        $cart->destroy();

        return redirect()->to('Penjualan');
    }
}
