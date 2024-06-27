<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function prcLogin()
    {
        $id_admin = $this->request->getVar('id_admin');
        $password = $this->request->getVar('password');

        $query = $this->adminModel->where('id_admin', $id_admin)->first();
        if ($query) {
            $psw = $query['password'];
            $has = password_hash($psw, PASSWORD_DEFAULT);
            $verify_psw = password_verify($password, $has);
            if ($verify_psw) {
                $ses_query = [
                    'loggedIn' => true,
                    'id_admin' => $query['id_admin'],
                    'nama_admin' => $query['nama_admin'],

                ];
                session()->set($ses_query);
                session()->setFlashdata('login', 'Login Berhasil');
                return redirect()->to(base_url('dashboard'));
            } else {
                session()->setFlashdata('pesan', 'ID atau Password Salah');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('pesan', 'ID  tidak ditemukan');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session()->setFlashdata('Logout', 'Logout Berhasil');
        return redirect()->to(base_url('login'));
    }
}
