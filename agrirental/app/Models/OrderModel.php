<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orderan';
    protected $primaryKey = 'id_order';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_order', 'o_produk', 'o_penyewa', 'o_rental', 'waktu_sewa', 'biaya', 'status'];

    public function getOrder($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_order' => $id])->first();
        }
    }
}
