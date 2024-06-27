<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'kode_peminjaman';
    protected $allowedFields    = ['kode_peminjaman', 'id_admin', 'id_karyawan', 'status', 'tgl_peminjaman'];
    public function getAll()
    {
        $builder = $this->db->table('peminjaman');
        $builder = $builder->select('*');
        $builder->join('admin', 'admin.id_admin = peminjaman.id_admin');
        $builder->join('karyawan', 'karyawan.id_karyawan = peminjaman.id_karyawan');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getKode()
    {
        $builder = $this->db->table('peminjaman');
        $builder->select('*');
        $builder->orderBy('kode_peminjaman', 'DESC');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return $query->getRow(); // Get the first row (largest kode_barang)
        } else {
            return null; // No data found
        }
    }
}
