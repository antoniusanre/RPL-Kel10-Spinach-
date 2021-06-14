<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Mitra_Detail Order.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <header>
        <div class="container">
            <div class="atas">
                <a href="">
                    <img class="logo" src="/img/logo.png" />
                </a>
                <i class="fas fa-store-alt fa-lg" style="position: fixed; float: right; top: 34px; right: 2.3%;"></i>
                <a class="sUname">Agrirental</a>
                <a class="panah">&#10095;</a>
                <a href="" class="sAkun2">Orderan</a>
                <a class="panah2">&#10095;</a>
                <a href="" class="srincian">Periksa Rincian</a>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/rental/profile">
                            <span class="icon"><i class="fas fa-store-alt"></i></span>
                            <span class="profil">Profil Mitra</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/produk">
                            <span class="icon"><i class="fas fa-car"></i></span>
                            <span class="produk">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/order">
                            <span class="icon"><i class="fas fa-clipboard-list" style="color: #4ACFAC;"></i></span>
                            <span class="orderan" style="color: #4ACFAC;">Orderan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/penyewa">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="keluar">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="baris1">
        <hr class="kotak">
        <a class="sstatus">Status</a>
        <div class="garis"></div>
    </div>
    <div class="baris2">
        <hr class="kotak2">
        <div class="NoOrder">
            <a class="order">No. Order</a>
            <a class="noorder"><?= $order['id_rental']; ?></a>
        </div>
        <div class="garis2"></div>
        <hr class="garis3">
        <div class="garis4"></div>
        <div class="AlamatPengguna">
            <a class="alamat">Alamat</a>
            <a class="namalengkap"><?= $order['nama_p']; ?></a>
            <a class="notelp"><?= $order['telepon_p']; ?></a>
            <a class="detail"><?= $order['titik_temu']; ?></a>
        </div>
    </div>
    <div class="baris3">
        <hr class="kotak3">
        <div class="garis5"></div>
        <hr class="garis6">
        <div class="garis7"></div>
        <div class="JenisRental">
            <a class="jrent">Jenis Rental</a>
            <a class="jenis"><?= ($order['jenis_rental'] == 'd') ? 'Drop Off' : 'Lepas Kunci'; ?></a>
        </div>
        <a class="tgldari"><?= $order['start_date']; ?></a>
        <a class="sampai">-</a>
        <a class="tglsampai"><?= $order['end_date']; ?></a>
        <div class="TanggalBooking">
            <a class="tgl">Tanggal Booking</a>
        </div>
    </div>
    <div class="baris4">
        <hr class="kotak4">
        <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 21.6%; background: none; top: 590px;"></i>
        <a class="username"><?= $order['username_p']; ?></a>
    </div>
    <div class="baris5">
        <hr class="kotak5">
        <a class="info">Informasi Pembayaran</a>
        <hr class="garis8">
        <div class="inp">
            <img src="/img/<?= $order['pict_prod']; ?>" style="width: 78px; height: 78px; left: 21.6%; top: 710px; position: absolute;">
            <a class="judulproduk"><?= $order['judul']; ?></a>
            <a class="merekjenis"><?= $order['merk']; ?> - <?= $order['jenis']; ?></a>
            <a class="totalharga">Rp <?= $order['harga']; ?></a>
            <a class="pesantext"><?= $order['note']; ?></a>
        </div>
        <a class="pesan">Pesan:</a>
        <a class="metpem">Metode Pembayaran:</a>
        <a class="cod" style="margin-left: 83%; margin-top: 485px; position: absolute;">Cash On Delivery(COD)</a>
    </div>
    <div class="pilih">
        <a class="status"><?= $order['status']; ?></a>
        <form action="/rental/orderUpdate" method="post">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <input type="hidden" name="statusl" value="<?= $order['status']; ?>">
            <select name="status" id="">
                <?php if ($order['status'] == 'Konfirmasi1') : ?>
                    <option value="" disabled selected></option>
                    <option value="Menunggu">Lanjut</option>
                    <option value="Batal">Batal</option>
                <?php elseif ($order['status'] == 'Menunggu' || $order['status'] == 'Berlangsung') : ?>
                    <option value="" disabled selected></option>
                <?php elseif ($order['status'] == "Konfirmasi2") : ?>
                    <option value="" disabled selected></option>
                    <option value="Selesai">Lanjut</option>
                    <option value="Bermasalah">Bermasalah</option>
                <?php endif; ?>
            </select>
    </div>
    <button type="submit">Update Status</button>
    </form>
    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>