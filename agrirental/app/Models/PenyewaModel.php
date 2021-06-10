<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaModel extends Model
{
    protected $table      = 'penyewa';
    protected $primaryKey = 'id_penyewa';

    protected $useTimestamps = true;
    protected $allowedFields = ['username_p', 'pw_p', 'nama_p', 'jk', 'telepon_p', 'alamat_p', 'email_p', 'birthdate', 'provinsi_p', 'kota_p', 'kecamatan_p', 'kodepos_p', 'pict_p'];

    public function getPenyewa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_penyewa' => $id])->first();
        }
    }
}
