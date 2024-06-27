<?php

namespace App\Controllers;

class Sistem extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Data Sistem',
            'dataSistem' => $dataSistem,
        ];
        return view('sistem/index', $data);
    }

    public function updateSistem()
    {
        $id = $this->request->getPost('idProfileSistem');
        $this->profileModel->update(
            $id,
            [
                'appName' => $this->request->getPost('appName'),
                'companyName' => $this->request->getPost('companyName'),
            ]
        );

        session()->setFlashdata('pesan', 'Update Profile sistem Berhasil');
        return redirect()->to(base_url('sistem'));
    }
}
