<?php

namespace App\Controllers;

class Barang extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataBarang = $this->barangModel->orderBy('kode_barang', 'DESC')->findAll();
        $data = [
            'title' => 'Barang',
            'dataSistem' => $dataSistem,
            'dataBarang' => $dataBarang,
        ];
        return view('barang/index', $data);
    }

    public function viewInsert()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataBarang = $this->barangModel->getKodeBarang();
        $kodeBarangTerbesar = $dataBarang ? substr($dataBarang->kode_barang, 3) : 0;
        $kodeSelanjutnya = $kodeBarangTerbesar + 1;
        $kodeBaru = 'BRG' . sprintf('%03s', $kodeSelanjutnya);
        $data = [
            'title' => 'Barang',
            'dataSistem' => $dataSistem,
            'kode_barang' => $kodeBaru,
        ];
        return view('barang/insert', $data);
    }

    public function insert()
    {
        $this->barangModel->insert([
            'kode_barang' => $this->request->getVar('kodeBarang'),
            'nama_barang' => $this->request->getVar('namaBarang'),
            'jumlah' => $this->request->getVar('jumlahBarang')
        ]);
        session()->setFlashdata('pesan', 'Insert data berhasil');
        return redirect()->to(base_url('barang'));
    }

    public function viewUpdate($data)
    {
        $dataByKode = $this->barangModel->where('kode_barang', $data)->find();
        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Barang',
            'dataSistem' => $dataSistem,
            'dataBarangByKode' => $dataByKode,
        ];
        return view('barang/update', $data);
    }

    public function update()
    {
        $kode_barang = $this->request->getPost('kodeBarang');
        $this->barangModel->update($kode_barang, [
            'nama_barang' => $this->request->getPost('namaBarang'),
            'jumlah' => $this->request->getPost('jumlahBarang'),
        ]);

        session()->setFlashdata('pesan', 'Update data berhasil');
        return redirect()->to(base_url('barang'));
    }

    public function delete()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $this->barangModel->delete($kode_barang);
        session()->setFlashdata('pesan', 'Delete data berhasil');
        return redirect()->to(base_url('barang'));
    }
}
