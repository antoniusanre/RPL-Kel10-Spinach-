<?php

namespace App\Controllers;

use App\Models\PenyewaModel;
use phpDocumentor\Reflection\Types\Null_;

class Penyewa extends BaseController
{
    // deklarasi model
    protected $penyewaModel;
    public function __construct()
    {
        $this->penyewaModel = new PenyewaModel();
    }

    public function index()
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }

        // kirim data ke index
        $data = [
            'title' => 'Welcome ' . session()->nama,
            'penyewa' => $this->penyewaModel->getPenyewa()
        ];

        return view('penyewa/index', $data);
    }

    // fungsi untuk daftar
    public function create()
    {
        // validasi input
        if (!$this->validate([
            'username_p' => [
                'rules' => 'required|is_unique[penyewa.username_p]|min_length[6]|max_length[15]|alpha_numeric',
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'is_unique' => 'Username sudah terdaftar',
                    'min_length' => 'Panjang minimum username 6 karakter',
                    'max_length' => 'Panjang maximum username 15 karakter',
                    'alpha_numeric' => 'Username harus berupa huruf, angka, atau beberapa simbol'
                ]
            ],
            'pw_p' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Panjang minimum password 6 karakter'
                ]
            ],
            'nama_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi!'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin harus diisi!'
                ]
            ],
            'telepon_p' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi!'
                ]
            ],
            'email_p' => [
                'rules' => 'required|valid_email|is_unique[penyewa.email_p]',
                'errors' => [
                    'is_unique' => 'Email sudah terdaftar',
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Penulisan email kurang tepat!'
                ]
            ],
            'birthdate' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir harus diisi!'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/daftar')->withInput()->with('validation', $validation);
        };

        // ambil data inputan
        $data = $this->request->getVar();
        // cek konfirmasi password
        if ($data['pw_p'] != $data['pw_p2']) {
            session()->setFlashdata('pesan', 'Ulangi pengisian password');

            return redirect()->to('/daftar')->withInput();
        }
        // hashing password
        $pw = password_hash($data['pw_p'], PASSWORD_DEFAULT);
        // simpan ke database
        $this->penyewaModel->save([
            'username_p' => $data['username_p'],
            'pw_p' => $pw,
            'nama_p' => $data['nama_p'],
            'jk' => $data['jk'],
            'telepon_p' => $data['telepon_p'],
            'email_p' => $data['email_p'],
            'birthdate' => $data['birthdate'],
            'pict_p' => 'Profile.png',
        ]);

        // kasih informasi kalau udah berhasil terdaftar
        session()->setFlashdata('pesans', 'Anda berhasil terdaftar');

        // balikin ke halaman login untuk login
        return redirect()->to('/login');
    }

    // fungsi untuk login
    public function login()
    {
        // validasi input
        if (!$this->validate([
            'username_p' => 'required',
            'pw_p' => 'required',
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/login')->withInput()->with('validation', $validation);
        };

        // ambil data inputan
        $data = $this->request->getVar();

        // cek username
        $user = $this->penyewaModel->where('username_p', $data['username_p'])->first();

        // cek password
        if ($user && password_verify($data['pw_p'], $user['pw_p'])) {
            // atur data untuk session id dan nama
            $sdata = [
                'id' => $user['id_penyewa'],
                'nama' => $user['nama_p']
            ];
            // masukin session untuk id dan nama
            session()->set($sdata);
            // kalau berhasil masuk ke halaman search produk
            return redirect()->to('/penyewa');
        }

        // kasih pesan kalau username/pw salah
        session()->setFlashdata('pesan', 'Username / Password Anda Salah');

        // kalau gaada username balik lagi ke login
        return redirect()->to('/login');
    }

    // fungsi untuk delete akun
    public function delete($id)
    {
        // langsung hapus berdasarkan id
        $this->penyewaModel->delete($id);

        // kembali ke halaman utama
        return redirect()->to('/');
    }

    // arahkan ke halaman profile
    public function profile()
    {
        $data = [
            'title' => 'Profile ' . session()->nama,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'validation' => \Config\Services::validation(),
        ];
        return view('/penyewa/profile', $data);
    }

    // fungsi untuk update profile
    public function update()
    {
        $profileLama = $this->penyewaModel->getPenyewa(session()->id);
        if ($profileLama['username_p'] == $this->request->getVar('username_p'))


            // validasi input
            if (!$this->validate([
                'username_p' => 'required',
                'nama_p' => 'required',
                'jk' => 'required',
                'telepon_p' => 'required',
                'email_p' => 'required',
                'birthdate' => 'required',
                'pict_p' => [
                    'rules' => 'max_size[pict_p,1024]|is_image[pict_p]|mime_in[pict_p,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar (max: 1MB)',
                        'is_image' => 'Pilih gambar!',
                        'mime_in' => 'Pilih gambar!'

                    ]
                ]
            ])) {
                $validation = \Config\Services::validation();
                // dd($validation);
                return redirect()->to('/penyewa/profile')->withInput()->with('validation', $validation);
            };

        $fileProfile = $this->request->getFile('pict_p');
        $namaLama = $this->request->getFile('pict_pl');

        //cek gambar, apakah tetap gambar lama
        if ($fileProfile->getError() == 4) {
            $namaSampul = $this->request->getVar('pict_pl');
        } else {
            //genereate nama file random
            $namaSampul = $fileProfile->getRandomName();
            //pindahkan gambar
            $fileProfile->move('img', $namaSampul);
            //hapus file lama
            unlink('img/', $namaLama);
        }

        // ambil data inputan
        $data = $this->request->getVar();
        // simpan ke database
        $this->penyewaModel->save([
            'id_penyewa' => session()->id,
            'username_p' => $data['username_p'],
            'nama_p' => $data['nama_p'],
            'jk' => $data['jk'],
            'telepon_p' => $data['telepon_p'],
            'email_p' => $data['email_p'],
            'birthdate' => $data['birthdate'],
            'provinsi_p' => $data['provinsi_p'],
            'kota_p' => $data['kota_p'],
            'kodepos_p' => $data['kodepos_p'],
            'kecamatan_p' => $data['kecamatan_p'],
        ]);

        // kasih informasi kalau udah berhasil terupdate
        session()->setFlashdata('pesans', 'Profile berhasil diperbarui');

        // balikin ke halaman profile
        return redirect()->to('/penyewa/profile');
    }
}
