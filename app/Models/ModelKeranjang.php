<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeranjang extends Model
{
    public function AllData(){
        return $this->db->table('tbl_jual')
            ->get()
            ->getResultArray();
        
    }
    public function InsertData($data){
        $this->db->table('tbl_jual')
        ->insert($data);
    }

    public function InsertRinciData($dataRinci){
        $this->db->table('tbl_rinci')
        ->insert($dataRinci);
    }

    public function UpdateBahan($databahan){
        $this->db->table('tbl_bahan')
        ->where('id_bahan', $databahan['id_bahan'])
        ->update($databahan);
    }

    public function UpdateData($data){
        $this->db->table('tbl_jual')
        ->where('id_jual', $data['id_jual'])
        ->update($data);
    }

    public function DeleteData($data){
        $this->db->table('tbl_jual')
        ->where('id_jual', $data['id_jual'])
        ->delete($data);
    }
}
