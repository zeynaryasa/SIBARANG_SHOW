<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $dataSistem = $this->profileModel->findAll();
        $dataProfile = $this->adminModel->where('id_admin', session('id_admin'))->findAll();
        $data = [
            'title' => 'Profile',
            'dataSistem' => $dataSistem,
            'dataProfile' => $dataProfile,
        ];
        return view('profile/index', $data);
    }
}
