<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPeminjamanModel extends Model
{
    protected $table            = 'detail_peminjaman';
    protected $primaryKey       = 'id_detail_peminjaman';
    protected $allowedFields    = ['kode_peminjaman', 'kode_barang'];

    public function getByKodePeminjaman($kodePeminjaman)
    {
        $builder = $this->db->table('detail_peminjaman');
        $builder->select('*');
        $builder->join('peminjaman', 'peminjaman.kode_peminjaman = detail_peminjaman.kode_peminjaman');
        $builder->join('barang', 'barang.kode_barang = detail_peminjaman.kode_barang');
        $builder->where('detail_peminjaman.kode_peminjaman', $kodePeminjaman);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
