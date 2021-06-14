<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orderan';
    protected $primaryKey = 'id_order';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_order', 'o_produk', 'o_penyewa', 'o_rental', 'waktu_sewa', 'biaya', 'status', 'start_date', 'end_date', 'note', 'titik_temu', 'jenis_rental'];

    public function getOrder($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_order' => $id])->first();
        }
    }

    public function countOrder($id = false)
    {
        if ($id == false) {
            return $this->countAll();
        } else {
            return $this->where(['o_produk' => $id])->countAllResults();
        }
    }
    public function countOrderRental($id = false)
    {
        if ($id == false) {
            return $this->countAll();
        } else {
            return $this->where(['o_rental' => $id])->countAllResults();
        }
    }

    public function getCompleteOrder($id)
    {

        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->join('produk', 'orderan.o_produk = produk.id_produk');
        $builder->join('rental', 'orderan.o_rental = rental.id_rental');
        $builder->where(['o_penyewa' => $id]);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function getCompleteOrder2($id)
    {

        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->join('produk', 'orderan.o_produk = produk.id_produk');
        $builder->join('rental', 'orderan.o_rental = rental.id_rental');
        $builder->where(['o_rental' => $id]);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function getCompleteOrder3($id)
    {

        $builder = $this->db->table('orderan');
        $builder->select('*');
        $builder->join('produk', 'orderan.o_produk = produk.id_produk');
        $builder->join('penyewa', 'orderan.o_penyewa = penyewa.id_penyewa');
        $builder->where(['id_order' => $id]);
        $query = $builder->get()->getResultArray();
        return $query[0];
    }
}
