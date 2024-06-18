<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
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
