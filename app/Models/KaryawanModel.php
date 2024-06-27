<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'karyawan';
    protected $primaryKey       = 'id_karyawan';
    protected $allowedFields    = ['id_karyawan', 'nama_karyawan', 'alamat_karyawan', 'posisi_karyawan'];
}
