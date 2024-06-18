<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    public function DataHarian($tgl){
        return $this->db->table('tbl_rinci')
        ->where('tbl_rinci.tgl_jual', $tgl)
        ->select('tbl_rinci.kode_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.qty')
        ->select('tbl_rinci.harga_jual')
        ->select('tbl_rinci.harga_beli')
        ->select('tbl_rinci.untung')
        ->select('tbl_rinci.total')
        ->groupBy('tbl_rinci.kode_produk')
        ->selectSum('tbl_rinci.qty')
        ->selectSum('tbl_rinci.untung')
        ->selectSum('tbl_rinci.total')
        ->get()
        ->getResultArray();
        
    }
    public function DataBulanan($bulan, $tahun){
        return $this->db->table('tbl_rinci')
        ->where('MONTH(tbl_rinci.tgl_jual)', $bulan)
        ->where('YEAR(tbl_rinci.tgl_jual)', $tahun)
        ->select('tbl_rinci.kode_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.qty')
        ->select('tbl_rinci.harga_jual')
        ->select('tbl_rinci.harga_beli')
        ->select('tbl_rinci.untung')
        ->select('tbl_rinci.total')
        ->groupBy('tbl_rinci.kode_produk')
        ->selectSum('tbl_rinci.qty')
        ->selectSum('tbl_rinci.untung')
        ->selectSum('tbl_rinci.total')
                        ->get()
                        ->getResultArray();
    }
    public function DataTahunan($tahun){
        return $this->db->table('tbl_rinci')
        ->where('YEAR(tbl_rinci.tgl_jual)', $tahun)
        ->select('tbl_rinci.kode_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.nama_produk')
        ->select('tbl_rinci.qty')
        ->select('tbl_rinci.harga_jual')
        ->select('tbl_rinci.harga_beli')
        ->select('tbl_rinci.untung')
        ->select('tbl_rinci.total')
        ->groupBy('tbl_rinci.kode_produk')
        ->selectSum('tbl_rinci.qty')
        ->selectSum('tbl_rinci.untung')
        ->selectSum('tbl_rinci.total')
                        ->get()
                        ->getResultArray();
    }
    
    
}