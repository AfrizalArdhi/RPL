<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;
use App\Models\ModelProduk;
use App\Models\ModelBahan;
use App\Models\ModelPenjualan;
use App\Models\ModelLaporan;
class Laporan extends BaseController
{
    protected $ModelProduk;
    protected $ModelKategori;
    protected $ModelSatuan;
    protected $ModelPenjualan;
    protected $ModelLaporan;
    protected $ModelBahan;

    public function __construct(){
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelPenjualan = new ModelPenjualan();
        $this->ModelBahan = new ModelBahan();
        $this->ModelLaporan = new ModelLaporan();
    }
    public function PrintDataProduk(){
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->AllData(),
            'web' => $this->ModelProduk->AllData(),
            'page' => 'laporan/v_print_lap_produk'
        ];
        return view('laporan/v_template_print_laporan', $data);
    }
    
    public function LaporanHarian(){
        $data=[
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'menu' => 'laporan',
            'submenu' => 'laporan-harian',
            'page' => 'laporan/v_laporan_harian',
        ];
        return view('v_template', $data);
    }
    
    public function LihatLaporanHarian(){
        $tgl = $this->request->getPost('tgl');
        $data = [
            'dataharian' => $this->ModelLaporan->DataHarian($tgl)
        ];

        $response =[
            'data' => view('laporan/v_tabel_laporan_harian', $data)
        ];
        echo json_encode($response);
        // echo dd($this->ModelLaporan->DataHarian($tgl));
    }
    public function LaporanBulanan(){
        $data=[
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'menu' => 'laporan',
            'submenu' => 'laporan-bulanan',
            'page' => 'laporan/v_laporan_bulanan',
        ];
        return view('v_template', $data);
    }
    
    public function LihatLaporanBulanan(){
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun)
        ];

        $response =[
            'data' => view('laporan/v_tabel_laporan_bulanan', $data)
        ];
        echo json_encode($response);
        // echo dd($this->ModelLaporan->DataHarian($tgl));
    }
    public function LaporanTahunan(){
        $data=[
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'menu' => 'laporan',
            'submenu' => 'laporan-tahunan',
            'page' => 'laporan/v_laporan_tahunan',
        ];
        return view('v_template', $data);
    }
    
    public function LihatLaporanTahunan() {
        $tahun = $this->request->getPost('tahun');
    
        $data = [
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun)
        ];
    
        $response = [
            'data' => view('laporan/v_tabel_laporan_tahunan', $data)
        ];
        echo json_encode($response);
    }    
}
