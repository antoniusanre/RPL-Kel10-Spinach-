<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $primaryKey = 'id_produk';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_rental', 'judul', 'rating', 'deskripsi', 'harga', 'merk', 'jenis', 'tahun', 'jenis_rental', 'plat', 'pict_prod', 'pict_prod2', 'pict_prod3', 'pict_prod4', 'pict_prod5'];

    public function getProduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_produk' => $id])->first();
        }
    }

    public function getProdukRental()
    {
        return $this->db->table('produk')->join('rental', 'produk.id_rental=rental.id_rental')->get()->getResultArray();
    }

    public function cari($k1 = false, $k2 = false)
    {
    }
}
