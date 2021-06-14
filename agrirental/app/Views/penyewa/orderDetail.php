<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Rincian Order.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="navbar">
        <a href="/"><img src="/img/logo.png" class="logo"></a>
        <ul>
            <li><a href="/rental">MITRA</a></li>
            <li><a href="/#tentang">TENTANG</a></li>
            <li><a href="/penyewa/order">ORDER</a></li>
            <li><a href="/penyewa/profile"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px" id="profile1"> <?= $penyewa['username_p']; ?></a>
            </li>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </div>
    <div class="alamat pengguna">
        <hr class="kotak">
        <a class="ap">Alamat Pengguna</a>
        <a class="nl"><?= $penyewa['nama_p']; ?></a>
        <a class="nt"><?= $penyewa['telepon_p']; ?></a>
        <a class="al"><?= $order['titik_temu']; ?></a>
        <hr class="garis">
    </div>
    <div class="baris 2">
        <hr class="kotak2">
        <a class="jr">Jenis Rental</a>
        <a class="pjr" style="position: absolute; float: left ;margin-left: 34%; width: 30%; margin-top: 45px; background: none;"><?= ($order['jenis_rental'] == 'd') ? 'Drop Off' : 'Lepas Kunci'; ?></a>
        <div class="garis2"></div>
        <hr class="garis3">
        <a class="tb">Tanggal Booking</a>
        <a class="tgldari"><?= $order['start_date']; ?></a>
        <a class="sampai">-</a>
        <a class="tglsampai"><?= $order['end_date']; ?></a>
        <div class="garis4"></div>
    </div>
    <div class="baris 3">
        <hr class="kotak3">
        <div class="z1">
            <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 627px;"></i>
            <a class="namatoko"><?= $order['nama_r']; ?></a>
            <img src="jazz.png" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: 130px; position: absolute;">
            <a class="judul"><?= $order['judul']; ?></a>
            <a class="merek-jenis"><?= $order['merk']; ?> - <?= $order['jenis']; ?></a>
        </div>
        <div class="z2">
            <a class="harga12jam">Harga/12 Jam</a>
            <a class="hargaprod">Rp <?= $order['harga']; ?></a>
        </div>
        <div class="z3">
            <a class="jumlahjam">Jumlah Jam</a>
            <a class="jumlah"><?= $order['waktu_sewa']; ?></a>
        </div>
        <div class="z4">
            <a class="harga">Harga</a>
            <a class="hartot">Rp <?= $order['biaya']; ?></a>
        </div>
        <hr class="garis5">
        <label>Pesan:</label>
        <a class="total">Total Pembayaran:</a>
        <a class="jumlahtotal">Rp <?= $order['biaya']; ?></a>
        <a class="metode">Metode Pembayaran:</a>
        <a class="cod">Cash On Delivery(COD)</a>
        <a class="pesantext"><?= $order['note']; ?></a>

    </div>
    <a href="">
        <button class="button1">Batalkan Orderan</button>
    </a>

    <hr class="kotak4">
    <a class="stat">Status</a>
    <div class="garis6"></div>
    <div class="pilih">
        <a class="status">selesai</a>
        <form action="/penyewa/orderUpdate" method="post"></form>
        <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
        <select name="status" id="">
            <?php if ($order['status'] == 'Konfirmasi1') : ?>
                <option value="" disabled selected></option>
                <option value="Batal">Batal</option>
            <?php elseif ($order['status'] == 'Menunggu') : ?>
                <option value="" disabled selected></option>
                <option value="Berlangsung">Lanjut</option>
                <option value="Batal">Batal</option>
            <?php elseif ($order['status'] == 'Berlangsung') :  ?>
                <option value="" disabled selected></option>
                <option value="Konfirmasi2">Lanjut</option>
            <?php elseif ($order['status'] == "Konfirmasi2") : ?>
                <option value="" disabled selected></option>
            <?php endif; ?>
        </select>
    </div>
    <button type="submit" class="button2">Update Status</button>
    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>