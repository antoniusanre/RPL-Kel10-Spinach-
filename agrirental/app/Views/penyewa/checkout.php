<?= $this->extend('layout/templatepp'); ?>
<?= $this->section('content'); ?>
<link href="/css/Checkout.css" rel="stylesheet" />

<div class="alamat pengguna">
    <hr class="kotak">
    <a class="ap">Alamat Pengguna</a>
    <a class="nl"><?= $penyewa['nama_p']; ?></a>
    <a class="nt"><?= $penyewa['telepon_p']; ?></a>
    <a class="al"><?= $penyewa['alamat_p']; ?></a>
    <hr class="garis">
</div>
<div class="baris 2">
    <hr class="kotak2">
    <a class="jr">Pilih Jenis Rental</a>
    <form action="/penyewa/rental" method="post">
        <div class="col-2">
            <select name="jenis_rental">
                <option value="" disabled selected></option>
                <option value="l">Lepas Kunci</option>
                <option value="d">Drop off</option>
            </select>
        </div>

        <div class="garis2"></div>
        <hr class="garis3">
        <a class="tb">Tanggal Booking</a>

        <div class="col-3">
            <input type="datetime-local" name="start_date">
        </div>

        <a class="sampai">-</a>

        <div class="col-4">
            <input type="datetime-local" name="end_date">
        </div>

        <div class="garis4"></div>
</div>
<div class="baris 3">
    <hr class="kotak3">
    <div class="z1">
        <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 560px;"></i>
        <a class="namatoko"><?= $rental['nama_r']; ?></a>
        <img src="jazz.png" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: 130px; position: absolute;">
        <a class="judul"><?= $produk['judul']; ?></a>
        <a class="merek-jenis"><?= $produk['merk']; ?> - <?= $produk['jenis']; ?></a>
    </div>
    <div class="z2">
        <a class="harga12jam">Harga/12 Jam</a>
        <a class="hargaprod">Rp <?= $produk['harga']; ?></a>
    </div>
    <div class="z3">
        <a class="jumlahjam">Jumlah Jam</a>
        <a class="jumlah">1</a>
    </div>
    <div class="z4">
        <a class="harga">Harga</a>
        <a class="hartot">Rp500.000</a>
    </div>
    <hr class="garis5">

    <label>Pesan:</label>
    <div class="col-5">
        <textarea placeholder="(Opsional)" style="margin-left: 5%; margin-top: 220px;"></textarea>
    </div>

    <a class="total">Total Orderan:</a>
    <a class="jumlahtotal">Rp500.000</a>
</div>
<div class="baris4">
    <hr class="kotak4">
    <a class="metode">Metode Pembayaran</a>
    <form action="" class="formform" style="margin-left: 35%; margin-top: 360px; position: absolute; background: none;">
        <input type="radio" name="atm" value=""><img src="bni.jpeg" style="width: 43px; height: 24px; margin-left: 20px; vertical-align: middle; margin-bottom: 10px;"><br>

        <div class="garis6"></div>
        <hr class="garis7">
        <a class="totalp">Total Pembayaran:</a>
        <a class="jumlahtotalp">Rp500.000</a>
        <hr class="garis8">
</div>
<button type="submit" name="order_p">Buat Orderan</button>
</form>

<?= $this->endSection(); ?>