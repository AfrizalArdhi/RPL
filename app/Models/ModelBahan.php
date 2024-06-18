<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBahan extends Model
{
    public function AllData(){
        return $this->db->table('tbl_bahan')
            ->get()
            ->getResultArray();
        
    }
    public function InsertData($data){
        $this->db->table('tbl_bahan')
        ->insert($data);
    }

    public function UpdateData($data){
        $this->db->table('tbl_bahan')
        ->where('id_bahan', $data['id_bahan'])
        ->update($data);
    }

    public function DeleteData($data){
        $this->db->table('tbl_bahan')
        ->where('id_bahan', $data['id_bahan'])
        ->delete($data);
    }
    public function getProductCount()
    {
        return $this->db->table('tbl_bahan')
        ->countAll();
    }
}
