<?php

namespace App\Controllers;

use App\Models\PenyewaModel;

class Penyewa extends BaseController
{
    protected $penyewaModel;
    public function __construct()
    {
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Welcome to AgriRental',
            'penyewa' => $this->penyewaModel->getPenyewa()
        ];

        return view('penyewa/index', $data);
    }

    public function create()
    {
        // validasi input
        if (!$this->validate([
            'username_p' => 'required',
            'pw_p' => 'required',
            'nama_p' => 'required',
            'jk' => 'required',
            'telepon_p' => 'required',
            'email_p' => 'required',
            'alamat_p' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/daftar')->withInput()->with('validation', $validation);
        };

        $data = $this->request->getVar();
        $pw = password_hash($data['pw_p'], PASSWORD_DEFAULT);
        $this->penyewaModel->save([
            'username_p' => $data['username_p'],
            'pw_p' => $pw,
            'nama_p' => $data['nama_p'],
            'jk' => $data['jk'],
            'telepon_p' => $data['telepon_p'],
            'email_p' => $data['email_p'],
            'alamat_p' => $data['alamat_p'],
        ]);

        session()->setFlashdata('pesan', 'Anda berhasil terdaftar');

        return redirect()->to('/penyewa');
    }

    public function delete($id)
    {
        $this->penyewaModel->delete($id);

        return redirect()->to('/penyewa');
    }
}
