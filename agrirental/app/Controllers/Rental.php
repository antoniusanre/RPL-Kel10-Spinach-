<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\PenyewaModel;
use App\Models\ProdukModel;
use App\Models\RentalModel;

class Rental extends BaseController
{
    // deklarasi model
    protected $rentalModel;
    protected $penyewaModel;
    protected $produkModel;
    protected $orderModel;
    protected $rental;
    protected $produk;
    protected $order;


    // constructor
    public function __construct()
    {
        $this->rentalModel = new RentalModel();
        $this->penyewaModel = new PenyewaModel();
        $this->produkModel = new ProdukModel();
        $this->orderModel = new OrderModel();
        $this->rental = $this->rentalModel->where(['id_p' => session()->id])->first();
        $this->produk = $this->produkModel->where(['id_rental' => $this->rental['id_rental']])->findAll();
        $this->order = $this->orderModel->where(['o_rental' => $this->rental['id_rental']])->findAll();
    }

    // halaman utama rental
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

        return view('rental/profile', $data);
    }

    // form daftar mitra
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

    // daftar jadi mitra
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

    // profile mitra
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

    // edit profile mitra
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

    // produk mitra
    public function produk()
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => 'Produk Mitra ' . $this->rental['nama_r'],
            'mitra' => $this->rental,
            'produk' => $this->produk,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/produk', $data);
    }

    // form tambah produk mitra
    public function tambah()
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => ' Tambah Produk Mitra ' . $this->rental['nama_r'],
            'produk' => $this->produk,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/tambah', $data);
    }

    // tambah produk mitra
    public function tambahProduk()
    {
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[produk.judul]|min_length[5]|max_length[30]|alpha_numeric_space',
                'errors' => [
                    'required' => 'Judul Produk harus diisi!',
                    'is_unique' => 'Judul Produk sudah terdaftar',
                    'min_length' => 'Panjang minimum Judul Produk 5 karakter',
                    'max_length' => 'Panjang maximum Judul Produk 30 karakter',
                    'alpha_numeric_space' => 'Judul Produk harus berupa huruf, angka, spasi, atau beberapa simbol'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Produk harus diisi!',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga per 12 Jam harus diisi!'
                ]
            ],
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk Produk harus diisi!'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Produk harus diisi!'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Keluaran Produk harus diisi!',
                ]
            ],
            'jenis_rental' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis rental harus diisi!',
                ]
            ],
            'plat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Plat Nomor Produk harus diisi!',
                ]
            ],
            'pict_prod' => [
                'rules' => 'max_size[pict_prod,1024]|is_image[pict_prod]|mime_in[pict_prod,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max: 1MB)',
                    'is_image' => 'Pilih gambar!',
                    'mime_in' => 'Pilih gambar!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/rental/tambah')->withInput()->with('validation', $validation);
        };

        $namaPict = '';
        $namaPict2 = '';
        $namaPict3 = '';
        $namaPict4 = '';
        $namaPict5 = '';

        $fileProduk = $this->request->getFile('pict_prod');
        if ($fileProduk->getError() != 4) {

            //genereate nama file random
            $namaPict = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict);
        }
        $fileProduk = $this->request->getFile('pict_prod2');
        if ($fileProduk->getError() != 4) {

            //genereate nama file random
            $namaPict2 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict2);
        }
        $fileProduk = $this->request->getFile('pict_prod3');
        if ($fileProduk->getError() != 4) {

            //genereate nama file random
            $namaPict3 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict3);
        }
        $fileProduk = $this->request->getFile('pict_prod4');
        if ($fileProduk->getError() != 4) {

            //genereate nama file random
            $namaPict4 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict4);
        }
        $fileProduk = $this->request->getFile('pict_prod5');
        if ($fileProduk->getError() != 4) {

            //genereate nama file random
            $namaPict5 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict5);
        }


        // ambil data inputan
        $data = $this->request->getVar();

        // simpan ke database
        $this->produkModel->save([
            'id_rental' => $this->rental['id_rental'],
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'merk' => $data['merk'],
            'jenis' => $data['jenis'],
            'tahun' => $data['tahun'],
            'jenis_rental' => $data['jenis_rental'],
            'plat' => $data['plat'],
            'pict_prod' => $namaPict,
            'pict_prod2' => $namaPict2,
            'pict_prod3' => $namaPict3,
            'pict_prod4' => $namaPict4,
            'pict_prod5' => $namaPict5,
        ]);

        // kasih informasi kalau udah berhasil terdaftar
        session()->setFlashdata('pesans', 'Produk berhasil ditambahkan');

        // balikin ke halaman rental
        return redirect()->to('/rental/produk');
    }

    // detail/form ubah produk mitra
    public function ubah($id = false)
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }
        if ($id == false) {
            return redirect()->to('/rental/produk');
        }
        if ($id)

            $data = [
                'title' => ' Detail Produk Mitra ' . $this->rental['nama_r'],
                'produk' => $this->produkModel->getProduk($id),
                'validation' => \Config\Services::validation(),
            ];
        return view('/rental/ubah', $data);
    }

    // ubah produk mitra
    public function ubahProduk()
    {
        $id = $this->request->getVar('id_produk');
        if ($this->produkModel->getProduk($id)['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[produk.judul]|min_length[5]|max_length[30]|alpha_numeric_space';
        }
        // validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul Produk harus diisi!',
                    'is_unique' => 'Judul Produk sudah terdaftar',
                    'min_length' => 'Panjang minimum Judul Produk 5 karakter',
                    'max_length' => 'Panjang maximum Judul Produk 30 karakter',
                    'alpha_numeric_space' => 'Judul Produk harus berupa huruf, angka, spasi, atau beberapa simbol'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Produk harus diisi!',
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga per 12 Jam harus diisi!'
                ]
            ],
            'merk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merk Produk harus diisi!'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Produk harus diisi!'
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Keluaran Produk harus diisi!',
                ]
            ],
            'jenis_rental' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis rental harus diisi!',
                ]
            ],
            'plat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Plat Nomor Produk harus diisi!',
                ]
            ],
            'pict_prod' => [
                'rules' => 'max_size[pict_prod,1024]|is_image[pict_prod]|mime_in[pict_prod,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (max: 1MB)',
                    'is_image' => 'Pilih gambar!',
                    'mime_in' => 'Pilih gambar!'
                ]
            ]
        ])) {
            return redirect()->to('/rental/ubah/' . $id)->withInput();
        };

        $namaPict = '';
        $namaPict2 = '';
        $namaPict3 = '';
        $namaPict4 = '';
        $namaPict5 = '';

        $fileProduk = $this->request->getFile('pict_prod');
        $namaLama = $this->request->getVar('pict_prodl');
        //cek gambar, apakah tetap gambar lama
        if ($fileProduk->getError() == 4) {
            $namaPict = $this->request->getVar('pict_prodl');
        } else {
            //genereate nama file random
            $namaPict = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }
        $fileProduk = $this->request->getFile('pict_prod2');
        $namaLama = $this->request->getVar('pict_prod2l');
        //cek gambar, apakah tetap gambar lama
        if ($fileProduk->getError() == 4) {
            $namaPict2 = $this->request->getVar('pict_prod2l');
        } else {
            //genereate nama file random
            $namaPict2 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict2);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }
        $fileProduk = $this->request->getFile('pict_prod3');
        $namaLama = $this->request->getVar('pict_prod3l');
        //cek gambar, apakah tetap gambar lama
        if ($fileProduk->getError() == 4) {
            $namaPict3 = $this->request->getVar('pict_prod3l');
        } else {
            //genereate nama file random
            $namaPict3 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict3);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }
        $fileProduk = $this->request->getFile('pict_prod4');
        $namaLama = $this->request->getVar('pict_prod4l');
        //cek gambar, apakah tetap gambar lama
        if ($fileProduk->getError() == 4) {
            $namaPict4 = $this->request->getVar('pict_prod4l');
        } else {
            //genereate nama file random
            $namaPict4 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict5);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }
        $fileProduk = $this->request->getFile('pict_prod5');
        $namaLama = $this->request->getVar('pict_prod5l');
        //cek gambar, apakah tetap gambar lama
        if ($fileProduk->getError() == 4) {
            $namaPict5 = $this->request->getVar('pict_prod5l');
        } else {
            //genereate nama file random
            $namaPict5 = $fileProduk->getRandomName();
            //pindahkan gambar
            $fileProduk->move('img', $namaPict5);
            //hapus file lama
            if ($namaLama != 'Profile.png') {

                unlink('img/' . $namaLama);
            }
        }




        // ambil data inputan
        $data = $this->request->getVar();

        // simpan ke database
        $this->produkModel->save([
            'id_produk' => $id,
            'id_rental' => $this->rental['id_rental'],
            'judul' => $data['judul'],
            'deskripsi' => $data['deskripsi'],
            'harga' => $data['harga'],
            'merk' => $data['merk'],
            'jenis' => $data['jenis'],
            'tahun' => $data['tahun'],
            'jenis_rental' => $data['jenis_rental'],
            'plat' => $data['plat'],
            'pict_prod' => $namaPict,
            'pict_prod2' => $namaPict2,
            'pict_prod3' => $namaPict3,
            'pict_prod4' => $namaPict4,
            'pict_prod5' => $namaPict5,
        ]);

        // kasih informasi kalau udah berhasil terdaftar
        session()->setFlashdata('pesans', 'Produk berhasil diubah');

        // balikin ke halaman rental
        return redirect()->to('/rental/produk');
    }

    // orderan mitra
    public function order()
    {

        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => ' Orderan Mitra ' . $this->rental['nama_r'],
            'produk' => $this->produk,
            'order' => $this->order,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/order', $data);
    }

    // detail orderan mitra
    public function orderDetail()
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }

        $data = [
            'title' => ' Detail Orderan Mitra ' . $this->rental['nama_r'],
            'produk' => $this->produk,
            'order' => $this->order,
            'validation' => \Config\Services::validation(),
        ];
        return view('/rental/orderDetail', $data);
    }

    // update status orderan
    public function orderUpdate()
    {
    }

    // hapus produk
    public function hapus($id = false)
    {
        if (!$this->rental) {
            return redirect()->to('/rental/daftar');
        }
        if ($id == false) {
            return redirect()->to('/rental/produk');
        }
        if (session()->id != $this->rental['id_p']) {
            return redirect()->to('/rental');
        }
        if ($id) {
            //cari nama file dari id
            $produk = $this->produkModel->find($id);
            //cek if default
            if ($produk['pict_prod']) {
                //hapus gambar
                unlink('img/' . $produk['pict_prod']);
            }
            if ($produk['pict_prod2']) {
                //hapus gambar
                unlink('img/' . $produk['pict_prod2']);
            }
            if ($produk['pict_prod3']) {
                //hapus gambar
                unlink('img/' . $produk['pict_prod3']);
            }
            if ($produk['pict_prod4']) {
                //hapus gambar
                unlink('img/' . $produk['pict_prod4']);
            }
            if ($produk['pict_prod5']) {
                //hapus gambar
                unlink('img/' . $produk['pict_prod5']);
            }

            $this->produkModel->delete($id);
            session()->setFlashdata('pesans', 'Produk berhasil dihapus.');

            return redirect()->to('/rental/produk');
        }
    }
}
