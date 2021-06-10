<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use App\Models\RentalModel;

class Rental extends BaseController
{
    // deklarasi model
    protected $rentalModel;
    protected $penyewaModel;
    protected $rental;
    public function __construct()
    {
        $this->rentalModel = new RentalModel();
        $this->penyewaModel = new PenyewaModel();
        $this->rental = $this->rentalModel->where(['id_p' => session()->id])->first();
    }

    public function index()
    {
        if (!$this->rental) {

            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => 'Welcome Mitra',
            'mitra' => $this->rental,
            'validation' => \Config\Services::validation(),
        ];

        return view('rental/index', $data);
    }

    public function daftar()
    {
        if ($this->rentalModel->where(['id_p' => session()->id])->first()) {
            return view('rental/index');
        }
        $data = [
            'title' => 'Daftar Mitra',
            'validation' => \Config\Services::validation()
        ];

        return view('rental/daftar', $data);
    }

    public function create()
    {
        // validasi input
        if (!$this->validate([
            'nama_r' => [
                'rules' => 'required|is_unique[rental.nama_r]|min_length[5]|max_length[30]|alpha_numeric_space',
                'errors' => [
                    'required' => 'Nama Mitra harus diisi!',
                    'is_unique' => 'Nama Mitra sudah terdaftar',
                    'min_length' => 'Panjang minimum Nama Mitra 5 karakter',
                    'max_length' => 'Panjang maximum username 30 karakter',
                    'alpha_numeric_space' => 'Username harus berupa huruf, angka, spasi, atau beberapa simbol'
                ]
            ],
            'nik_r' => [
                'rules' => 'required|exact_length[16]',
                'errors' => [
                    'required' => 'NIK harus diisi!',
                    'min_length' => 'Panjang NIK 16 karakter'
                ]
            ],
            'provinsi_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi harus diisi!'
                ]
            ],
            'kota_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota/Kabupaten harus diisi!'
                ]
            ],
            'kecamatan_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus diisi!'
                ]
            ],
            'alamat_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Rinci harus diisi!',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/rental/daftar')->withInput()->with('validation', $validation);
        };

        // ambil data inputan
        $data = $this->request->getVar();

        // ambil data pendaftar dari akun penyewanya
        $user = $this->penyewaModel->getPenyewa(session()->id);

        // simpan ke database
        $this->rentalModel->save([
            'id_p' => session()->id,
            'nama_r' => $data['nama_r'],
            'no_cp' => $user['telepon_p'],
            'nama_cp' => $user['nama_p'],
            'alamat_r' => $data['alamat_r'],
            'email_r' => $user['email_p'],
            'nik_r' => $data['nik_r'],
            'provinsi_r' => $data['provinsi_r'],
            'kota_r' => $data['kota_r'],
            'kecamatan_r' => $data['kecamatan_r'],
            'pict_rent' => 'Profile.png',
        ]);

        // kasih informasi kalau udah berhasil terdaftar
        session()->setFlashdata('pesans', 'Anda berhasil terdaftar');

        // balikin ke halaman rental
        return redirect()->to('/rental');
    }

    // ngarahin ke halaman profile
    public function profile()
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => 'Profile Mitra' . $this->rental['nama_r'],
            'mitra' => $this->rental,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/profile', $data);
    }

    // fungsi untuk update profile
    public function update()
    {
        // rule khusus username
        if ($this->rental['nama_r'] == $this->request->getVar('nama_r')) {
            $rule_user = 'required';
        } else {
            $rule_user = 'required|is_unique[rental.nama_r]|min_length[5]|max_length[30]|alpha_numeric_space';
        }
        // rule khusus email
        if ($this->rental['email_r'] == $this->request->getVar('email_r')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|is_unique[rental.email_r]|valid_email';
        }
        // validasi input
        if (!$this->validate([
            'email_r' => [
                'rules' => $rule_email,
                'errors' => [
                    'is_unique' => 'Email sudah terdaftar',
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Penulisan email kurang tepat!'
                ]
            ],
            'nama_r' => [
                'rules' => $rule_user,
                'errors' => [
                    'required' => 'Nama Mitra harus diisi!',
                    'is_unique' => 'Nama Mitra sudah terdaftar',
                    'min_length' => 'Panjang minimum Nama Mitra 5 karakter',
                    'max_length' => 'Panjang maximum username 30 karakter',
                    'alpha_numeric_space' => 'Username harus berupa huruf, angka, spasi, atau beberapa simbol'
                ]
            ],
            'nik_r' => [
                'rules' => 'required|exact_length[16]',
                'errors' => [
                    'required' => 'NIK harus diisi!',
                    'min_length' => 'Panjang NIK 16 karakter'
                ]
            ],
            'provinsi_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Provinsi harus diisi!'
                ]
            ],
            'no_cp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Contact Person harus diisi!'
                ]
            ],
            'nama_cp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Contact Person harus diisi!'
                ]
            ],
            'kota_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kota/Kabupaten harus diisi!'
                ]
            ],
            'kecamatan_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kecamatan harus diisi!'
                ]
            ],
            'alamat_r' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Rinci harus diisi!',
                ]
            ],
            'pict_rent' => [
                'rules' => 'max_size[pict_rent,1024]|is_image[pict_rent]|mime_in[pict_rent,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max: 1MB)',
                    'is_image' => 'Pilih gambar!',
                    'mime_in' => 'Pilih gambar!'
                ]
            ]
        ])) {
            // dd($validation);
            return redirect()->to('/rental/profile')->withInput();
        };

        $fileProfile = $this->request->getFile('pict_rent');
        $namaLama = $this->request->getVar('pict_rl');
        //cek gambar, apakah tetap gambar lama
        if ($fileProfile->getError() == 4) {
            $namaProfile = $this->request->getVar('pict_rl');
        } else {
            //genereate nama file random
            $namaProfile = $fileProfile->getRandomName();
            //pindahkan gambar
            $fileProfile->move('img', $namaProfile);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }

        // ambil data inputan
        $data = $this->request->getVar();
        // simpan ke database
        $this->rentalModel->save([
            'id_rental' => $this->rental['id_rental'],
            'nama_r' => $data['nama_r'],
            'no_cp' => $data['no_cp'],
            'nama_cp' => $data['nama_cp'],
            'alamat_r' => $data['alamat_r'],
            'email_r' => $data['email_r'],
            'nik_r' => $data['nik_r'],
            'provinsi_r' => $data['provinsi_r'],
            'kota_r' => $data['kota_r'],
            'kecamatan_r' => $data['kecamatan_r'],
            'pict_rent' => $namaProfile,
        ]);

        // kasih informasi kalau udah berhasil terupdate
        session()->setFlashdata('pesans', 'Profile berhasil diperbarui');

        // balikin ke halaman profile
        return redirect()->to('/rental');
    }

    public function produk()
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => 'Produk Mitra ' . $this->rental['nama_r'],
            'mitra' => $this->rental,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/produk', $data);
    }
}