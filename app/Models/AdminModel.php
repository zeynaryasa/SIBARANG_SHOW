<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'id_admin';
    protected $allowedFields    = ['id_admin', 'nama_admin', 'alamat_admin', 'posisi_admin', 'password'];
}
