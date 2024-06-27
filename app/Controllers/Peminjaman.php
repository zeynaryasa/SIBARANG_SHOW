<?php

namespace App\Controllers;

class Peminjaman extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataPeminjaman = $this->peminjamanModel->getAll();
        $data = [
            'title' => 'Peminjaman',
            'dataSistem' => $dataSistem,
            'dataPeminjaman' => $dataPeminjaman,
        ];
        return view('peminjaman/index', $data);
    }

    public function delete()
    {
        $kode_peminjaman = $this->request->getPost('kode_peminjaman');
        $this->peminjamanModel->delete($kode_peminjaman);
        session()->setFlashdata('pesan', 'Delete data berhasil');
        return redirect()->to(base_url('peminjaman'));
    }

    public function approve()
    {
        $kode = $this->request->getPost('kode_peminjaman');
        $this->peminjamanModel->update(
            $kode,
            [
                'status' => $this->request->getPost('status'),
            ]
        );

        session()->setFlashdata('pesan', 'Konfirmasi Peminjaman Berhasil!');
        return redirect()->to(base_url('peminjaman'));
    }
}
