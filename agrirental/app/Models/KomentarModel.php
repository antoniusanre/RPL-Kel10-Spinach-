<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table      = 'komentar';
    protected $primaryKey = 'id_komentar';

    protected $useTimestamps = true;
    protected $allowedFields = ['id_prod', 'id_or', 'komen'];

    public function getKomen($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_komentar' => $id])->first();
        }
    }

    public function getKomenProduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->where(['id_prod' => $id])->get()->getResultArray();
        }
    }

    public function countKomen($id = false)
    {
        if ($id == false) {
            return $this->countAll();
        } else {
            return $this->where(['id_prod' => $id])->countAllResults();
        }
    }
}
