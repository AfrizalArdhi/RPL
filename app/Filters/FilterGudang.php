<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterGudang implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->level == ''){
            session()->setFlashdata('gagal', 'Silahkan Login Terlebih Dahulu!');
            return redirect()->to(base_url('Auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->level== '3'){
            return redirect()->to(base_url('Bahan'));
        }
    }
}