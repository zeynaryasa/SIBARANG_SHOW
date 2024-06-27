<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataAdmin = $this->adminModel->findAll();
        $data = [
            'title' => 'Admin',
            'dataSistem' => $dataSistem,
            'dataAdmin' => $dataAdmin,
        ];
        return view('admin/index', $data);
    }

    public function updateByLogin()
    {
        $id_admin = $this->request->getPost('id_admin');
        $this->adminModel->update($id_admin, [
            'nama_admin' => $this->request->getPost('nama_admin'),
            'alamat_admin' => $this->request->getPost('alamat_admin'),
            'posisi_admin' => $this->request->getPost('posisi_admin'),
            'password' => $this->request->getPost('password'),
        ]);

        session()->setFlashdata('pesan', 'Update data berhasil');
        return redirect()->to(base_url('profile'));
    }

    public function viewInsert()
    {

        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin',
            'dataSistem' => $dataSistem,
        ];
        return view('admin/insert', $data);
    }

    public function insert()
    {
        $this->adminModel->insert([
            'id_admin' => $this->request->getPost('idAdmin'),
            'nama_admin' => $this->request->getPost('namaAdmin'),
            'alamat_admin' => $this->request->getPost('alamatAdmin'),
            'posisi_admin' => $this->request->getPost('posisiAdmin'),
            'password' => $this->request->getPost('password'),
        ]);

        session()->setFlashdata('pesan', 'Insert data berhasil');
        return redirect()->to(base_url('admin'));
    }

    public function viewUpdate($data)
    {

        $a = $this->adminModel->where('id_admin', $data)->find();
        $dataSistem = $this->profileModel->findAll();
        $data = [
            'title' => 'Admin',
            'dataSistem' => $dataSistem,
            'dataAdminById' => $a,
        ];
        return view('admin/update', $data);
    }

    public function update()
    {
        $id_admin = $this->request->getPost(['idAdmin']);
        $this->adminModel->update($id_admin, [
            'nama_admin' => $this->request->getPost('namaAdmin'),
            'alamat_admin' => $this->request->getPost('alamatAdmin'),
            'posisi_admin' => $this->request->getPost('posisiAdmin'),
            'password' => $this->request->getPost('password'),
        ]);

        session()->setFlashdata('pesan', 'Update data berhasil');
        return redirect()->to(base_url('admin'));
    }

    public  function delete()
    {
        $id_admin = $this->request->getPost('id_admin');
        $this->adminModel->delete($id_admin);
        session()->setFlashdata('pesan', 'Delet data berhasil');
        return redirect()->to(base_url('admin'));
    }
}
