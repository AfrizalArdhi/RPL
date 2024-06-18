<?php

namespace App\Controllers;
use App\Models\ModelUser;
class Auth extends BaseController
{
    protected $ModelUser;
    public function __construct() {
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data =[
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin(){
        if($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} masih kosong!',
                ]
                ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!',
                ]
                ]
        ])){
            $nama_user = $this->request->getPost('nama_user');
            $password = sha1($this->request->getPost('password'));
            $cek_login = $this->ModelUser->LoginUser($nama_user, $password);
            if($cek_login){
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('level', $cek_login['level']);
                if($cek_login['level'] == 1){
                    return redirect()->to(base_url('Admin'));
                }else if($cek_login['level'] == 2){
                    return redirect()->to(base_url('Penjualan'));
                }else if($cek_login['level'] == 3){
                    return redirect()->to(base_url('Produk'));
                }
            } else{
                session()->setFlashdata('gagal', 'Username atau password salah!');
                return redirect()->to(base_url('Auth'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'))->withInput('validation');
        }
        
    }
    public function LoGout(){
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('level');
        session()->remove('pesan', 'Anda Berhasil Logout!');
        return redirect()->to(base_url('Auth'));
    }


}
