<?php

namespace App\Controllers;

class DetailPeminjaman extends BaseController
{
    public function index($data)
    {
        $dataSistem = $this->profileModel->findAll();
        $dataDetailPeminjaman = $this->detailPeminjamanModel->getByKodePeminjaman($data);
        $data = [
            'title' => 'Profile',
            'dataSistem' => $dataSistem,
            'dataDetailPeminjaman' => $dataDetailPeminjaman,
        ];
        return view('detailPeminjaman/index', $data);
    }

    public function delete()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $kode_peminjaman = $this->request->getPost('kode_peminjaman');

        if (!empty($kode_barang) && !empty($kode_peminjaman)) {
            $this->detailPeminjamanModel
                ->where('kode_barang', $kode_barang)
                ->where('kode_peminjaman', $kode_peminjaman)
                ->delete();
            session()->setFlashdata('pesan', 'Deleta data berhasil');
            return redirect()->to(base_url('detail/' . $kode_peminjaman));
        }
    }
}
