<?php

namespace App\Controllers;

class Karyawan extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataKaryawan = $this->karyawanModel->findAll();
        $data = [
            'title' => 'Karyawan',
            'dataSistem' => $dataSistem,
            'dataKaryawan' => $dataKaryawan,
        ];
        return view('karyawan/index', $data);
    }

    public function viewInsert()
    {
        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Karyawan',
            'dataSistem' => $dataSistem,
        ];
        return view('karyawan/insert', $data);
    }

    public function insert()
    {
        $id_karyawan = $this->request->getPost('idKaryawan');
        $nama_karyawan = $this->request->getPost('namaKaryawan');
        $alamat_karyawan = $this->request->getPost('alamatKaryawan');
        $posisi_karyawan = $this->request->getPost('posisiKaryawan');

        // Cek apakah id_karyawan sudah ada
        $existingKaryawan = $this->karyawanModel->where('id_karyawan', $id_karyawan)->first();

        if ($existingKaryawan) {
            session()->setFlashdata('warning', 'ID Karyawan sudah ada');
        } else {
            $this->karyawanModel->insert([
                'id_karyawan' => $id_karyawan,
                'nama_karyawan' => $nama_karyawan,
                'alamat_karyawan' => $alamat_karyawan,
                'posisi_karyawan' => $posisi_karyawan,
            ]);
            session()->setFlashdata('pesan', 'Insert data berhasil');
        }

        return redirect()->to(base_url('karyawan'));
    }


    public function delete()
    {
        $id_karyawan = $this->request->getPost('id_karyawan');
        $this->karyawanModel->delete($id_karyawan);
        session()->setFlashdata('pesan', 'Delete data berhasil');
        return redirect()->to(base_url('karyawan'));
    }

    public function viewUpdate($data)
    {
        $dataSistem = $this->profileModel->findAll();
        $dataKaryawanById  = $this->karyawanModel->where('id_karyawan', $data)->find();
        $data = [
            'title' => 'Karyawan',
            'dataSistem' => $dataSistem,
            'dataKaryawanById' => $dataKaryawanById,
        ];
        return view('karyawan/update', $data);
    }

    public function update()
    {
        $id_karyawan = $this->request->getPost('idKaryawan');
        $this->karyawanModel->update($id_karyawan, [
            'nama_karyawan' => $this->request->getPost('namaKaryawan'),
            'alamat_karyawan' => $this->request->getPost('alamatKaryawan'),
            'posisi_karyawan' => $this->request->getPost('posisiKaryawan'),
        ]);

        session()->setFlashdata('pesan', 'Update data berhasil');
        return redirect()->to(base_url('karyawan'));
    }
}
