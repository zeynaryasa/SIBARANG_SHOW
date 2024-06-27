<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //
        if (session('loggedIn') != true) {
            session()->setFlashdata('pesan', 'Anda Harus Login');
            return redirect()->to(base_url('login'));
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
        if (session('loggedIn') == true) {
            return redirect()->to(base_url('dashboard'));
        }
    }
}
