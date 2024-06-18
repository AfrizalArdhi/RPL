<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
    public function AllData(){
        return $this->db->table('tbl_jual')
            ->get()
            ->getResultArray();
    }

    public function NoFaktur(){
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur, 4)) as no_urut from tbl_jual where DATE(tgl_jual)='$tgl'");
        $hasil = $query->getRowArray();
        if($hasil['no_urut']>0){
            $temp = $hasil['no_urut']+1;
            $kd = sprintf('%04s', $temp);
        }else {
            $kd = '0001';
        }
        $no_faktur = date('Ymd').$kd;
        return $no_faktur;
    }
}
