<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalModel extends Model
{
    protected $table      = 'rental';
    protected $primaryKey = 'id_rental';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_p', 'nama_r', 'no_cp', 'nama_cp', 'alamat_r', 'email_r', 'pict_rent', 'nik_r', 'provinsi_r', 'kota_r', 'kecamatan_r'];

    public function getRental($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_rental' => $id])->first();
        }
    }
}
