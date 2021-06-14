<?php

namespace App\Controllers;

use App\Models\KomentarModel;
use App\Models\OrderModel;
use CodeIgniter\I18n\Time;
use App\Models\PenyewaModel;
use App\Models\ProdukModel;
use App\Models\RentalModel;
use phpDocumentor\Reflection\Types\Null_;

class Penyewa extends BaseController
{
    // deklarasi model
    protected $penyewaModel;
    protected $produkModel;
    protected $rentalModel;
    protected $orderModel;
    protected $komentarModel;
    public function __construct()
    {
        $this->penyewaModel = new PenyewaModel();
        $this->produkModel = new ProdukModel();
        $this->rentalModel = new RentalModel();
        $this->orderModel = new OrderModel();
        $this->komentarModel = new KomentarModel();
    }

    public function index()
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }
        $keyword1 = $this->request->getVar('kkot');
        $keyword2 = $this->request->getVar('kkec');



        if ($keyword1 || $keyword2) {
            $produk = $this->produkModel->cari($keyword1, $keyword2);
        } else {
            $produk = $this->produkModel->getProdukRental();
        }
        // kirim data ke index
        $data = [
            'title' => 'Welcome ' . session()->nama,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'produk' => $produk,
            'kecamatan' => $this->rentalModel->getKecamatan(),
            'kota' => $this->rentalModel->getKota(),
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
        if (!session()->id) {
            return redirect()->to('/login');
        }
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

        // rule khusus username
        if ($profileLama['username_p'] == $this->request->getVar('username_p')) {
            $rule_user = 'required';
        } else {
            $rule_user = 'required|is_unique[penyewa.username_p]|min_length[6]|max_length[15]|alpha_numeric';
        }
        // rule khusus email
        if ($profileLama['email_p'] == $this->request->getVar('email_p')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|is_unique[penyewa.email_p]|valid_email';
        }
        // validasi input
        if (!$this->validate([
            'username_p' => [
                'rules' => $rule_user,
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'is_unique' => 'Username sudah terdaftar',
                    'min_length' => 'Panjang minimum username 6 karakter',
                    'max_length' => 'Panjang maximum username 15 karakter',
                    'alpha_numeric' => 'Username harus berupa huruf, angka, atau beberapa simbol'
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
                'rules' => $rule_email,
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
            // 'pict_p' => [
            //     'rules' => 'max_size[pict_p,1024]|is_image[pict_p]|mime_in[pict_p,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Ukuran gambar terlalu besar (max: 1MB)',
            //         'is_image' => 'Pilih gambar!',
            //         'mime_in' => 'Pilih gambar!'

            //     ]
            // ]
        ])) {
            return redirect()->to('/penyewa/profile')->withInput();
        };

        // $fileProfile = $this->request->getFile('pict_p');
        // $namaLama = $this->request->getVar('pict_pl');
        // //cek gambar, apakah tetap gambar lama
        // if ($fileProfile->getError() == 4) {
        //     $namaProfile = $this->request->getVar('pict_pl');
        // } else {
        //     //genereate nama file random
        //     $namaProfile = $fileProfile->getRandomName();
        //     //pindahkan gambar
        //     $fileProfile->move('img', $namaProfile);
        //     //hapus file lama
        //     if ($namaLama != 'Profile.png') {

        //         unlink('img/' . $namaLama);
        //     }
        // }

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
            // 'pict_p' => $namaProfile
        ]);


        // kasih informasi kalau udah berhasil terupdate
        session()->setFlashdata('pesans', 'Profile berhasil diperbarui');

        // balikin ke halaman profile
        return redirect()->to('/penyewa/profile');
    }

    // arahkan ke halaman ubah pw
    public function pw()
    {
        if (!session()->id) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Ubah Password ' . session()->nama,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'validation' => \Config\Services::validation(),
        ];
        return view('/penyewa/pw', $data);
    }

    // arahkan ke halaman detail produk
    public function detail($id)
    {
        $produk = $this->produkModel->getProduk($id);
        $data = [
            'title' => 'Detail ' . $produk['judul'],
            'produk' => $produk,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'rental' => $this->rentalModel->getRental($produk['id_rental']),
            'komen' => $this->komentarModel->getKomenProduk($id),
            'tkomen' => $this->komentarModel->countKomen($id),
            'tsewa' => $this->orderModel->countOrder($id)
        ];



        return view('/penyewa/detail', $data);
    }

    // arahkan ke halaman checkout
    public function checkout($id = false)
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }
        if ($id == false) {
            return redirect()->to('/penyewa');
        }
        $produk = $this->produkModel->getProduk($id);
        $rental = $this->rentalModel->getRental($produk['id_rental']);

        // kirim data ke checkout
        $data = [
            'title' => 'Pesan ' . $produk['judul'],
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'rental' => $rental,
            'produk' => $produk,
            'validation' => \Config\Services::validation(),

        ];
        return view('penyewa/checkout', $data);
    }

    // handle waktu
    public function waktu($date)
    {
        $separate = explode("T", $date);
        $separate2 = explode("-", $separate[0]);
        $separate3 = explode(":", $separate[1]);
        $year = (int)$separate2[0];
        $month = (int)$separate2[1];
        $day = (int)$separate2[2];
        $hour = (int)$separate3[0];
        $minute = (int)$separate3[1];
        $time = Time::create($year, $month, $day, $hour, $minute);

        return $time;
    }

    // fungsi untuk membuat orderan
    public function pesan()
    {
        // ambil data inputan
        $data = $this->request->getVar();
        // validasi input
        if (!$this->validate([
            'titik_temu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Titik Temu harus diisi!',
                ]
            ],
            'start_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu mulai rental harus diisi!'
                ]
            ],
            'end_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Waktu akhir rental harus diisi!'
                ]
            ],
            'jenis_rental' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Rental harus diisi!'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/penyewa/checkout/' . $data['o_produk'])->withInput()->with('validation', $validation);
        };

        // ambil waktu booking dan ubah ke format php
        $before = $this->waktu($data['start_date']);
        $after = $this->waktu($data['end_date']);

        // ambil waktu selisihnya
        $diff = $before->difference($after);
        // simpan ke waktu sewa
        $waktu_sewa = $diff->getHours();

        // ambil data produk
        $produk = $this->produkModel->getProduk($data['o_produk']);
        $kelipatan = $waktu_sewa / 12;
        if ($kelipatan == 0) $waktu_sewa = 1;
        $biaya = $produk['harga'] * $kelipatan;

        // simpan ke database
        $this->orderModel->save([
            'o_produk' => $data['o_produk'],
            'o_penyewa' => session()->id,
            'o_rental' => $data['o_rental'],
            'start_date' => $before,
            'end_date' => $after,
            'jenis_rental' => $data['jenis_rental'],
            'titik_temu' => $data['titik_temu'],
            'waktu_sewa' => $waktu_sewa,
            'biaya' => $biaya,
            'status' => 'konfirmasi1',
            'note' => $data['note']

        ]);

        // kasih informasi kalau udah berhasil terdaftar
        session()->setFlashdata('pesans', 'Anda berhasil order!');

        // balikin ke halaman login untuk login
        return redirect()->to('/penyewa/order');
    }

    // arahkan ke halaman history pemesanan
    public function order()
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }

        $order = $this->orderModel->getCompleteOrder(session()->id);

        // kirim data ke order
        $data = [
            'title' => 'Orderan ' . session()->nama_p,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'order' => $order,
        ];
        return view('penyewa/order', $data);
    }

    // arahkan ke halaman detail pemesanan
    public function orderDetail()
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }

        $input = $this->request->getVar();
        $idorder = $input['id_order'];

        // kirim data ke order
        $data = [
            'title' => 'Orderan ' . session()->nama_p,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'order' => $this->orderModel->getCompleteOrder4($idorder),
        ];

        return view('penyewa/orderDetail', $data);
    }

    // fungsi untuk update status pemesanan
    public function orderUpdate()
    {
        // terima inputan perintah
        $input = $this->request->getVar();
        $idorder = $input['id_order'];
        // $statusl = $input['statusl'];
        $status = $input['status'];

        // kalau batal
        if ($status == "Batal") {
            $this->orderModel->update($idorder, ['status' => 'Batal']);
        }

        // update status tunggu ke berlangsung
        if ($status == "Berlangsung") {
            $this->orderModel->update($idorder, ['status' => 'Berlangsung']);
        }

        // update status berlangsung ke konfirmasi
        if ($status == "Konfirmasi2") {
            $this->orderModel->update($idorder, ['status' => 'Konfirmasi2']);
        }

        // balikin ke halaman order
        return redirect()->to('/penyewa/order');
    }

    // arahkan ke halaman favorit
    public function favorite()
    {
    }

    // arahkan ke halaman penilaian
    public function nilai()
    {
        // cek udah login atau belum dengan session
        if (!isset(session()->id)) {
            return redirect()->to('/');
        }

        $input = $this->request->getVar();
        $idorder = $input['id_order'];

        $order = $this->orderModel->getOrder($idorder);
        // dd($order);
        $idprod = $order['o_produk'];
        $produk = $this->produkModel->getProduk($idprod);
        $rental = $this->rentalModel->getRental($produk['id_rental']);

        // kirim data ke nilai
        $data = [
            'title' => 'Orderan ' . session()->nama_p,
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),
            'produk' => $produk,
            'rental' => $rental,
            'order' => $order,
        ];
        return view('penyewa/nilai', $data);
    }

    // fungsi update rating
    public function rating()
    {
        // ambil data input
        $input = $this->request->getVar();
        // ambil input rating
        $rate = $input['rating'];

        // simpan id produk dan order
        $idprod = $input['id_produk'];
        $idorder = $input['id_order'];

        // ambil data produk
        $produk = $this->produkModel->getProduk($idprod);

        // ambil data rating
        $rating = $produk['rating'];
        // ambil jumlah produk di order
        $count = $this->orderModel->where(['o_produk' => $idprod])->countAllResults();

        // kalau masih kosong
        if (!$rating) {
            $nilai = (int)$rate;
            // kalau dah ada
        } else {
            $nilai = (int)($rate + $rating * $count) / ($count + 1);
        }

        // dd($nilai);

        // simpan ke db
        $this->produkModel->save([
            'id_produk' => $idprod,
            'rating' => $nilai
        ]);

        // simpan komentar
        $this->komentarModel->save([
            'id_prod' => $idprod,
            'id_or' => $idorder,
            'komen' => $input['komentar'],
        ]);

        return redirect()->to('/penyewa/order');
    }

    public function cari()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'Cari Produk',
            'produk' => $this->produkModel->cari($keyword),
            'penyewa' => $this->penyewaModel->getPenyewa(session()->id),

        ];

        return view('/penyewa/index', $data);
    }
}
