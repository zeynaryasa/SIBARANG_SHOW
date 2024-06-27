<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'kode_barang';
    protected $allowedFields    = ['kode_barang', 'nama_barang', 'jumlah'];

    public function getKodeBarang()
    {
        $builder = $this->db->table('barang');
        $builder->select('*');
        $builder->orderBy('kode_barang', 'DESC');
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return $query->getRow(); // Get the first row (largest kode_barang)
        } else {
            return null; // No data found
        }
    }
}
