<?= $this->extend('layout/templater'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/Mitra_Detail Order.css">
<div class="baris1">
    <hr class="kotak">
    <a class="sstatus">Status</a>
    <a class="status">selesai</a>
    <div class="garis"></div>
</div>
<div class="baris2">
    <hr class="kotak2">
    <div class="NoOrder">
        <a class="order">No. Order</a>
        <a class="noorder">1234567890</a>
    </div>
    <div class="garis2"></div>
    <hr class="garis3">
    <div class="garis4"></div>
    <div class="AlamatPengguna">
        <a class="alamat">Alamat</a>
        <a class="namalengkap">Rafida Nisa</a>
        <a class="notelp">082113750965</a>
        <a class="detail">Pondok Cipta Blok A No. 88, Bintara, Bekasi Barat</a>
        <a class="kotakab">Kota Bekasi</a>
        <a class="provinsi">Jawa Barat</a>
        <a class="kodepos">17134</a>
    </div>
</div>
<div class="baris3">
    <hr class="kotak3">
    <div class="garis5"></div>
    <hr class="garis6">
    <div class="garis7"></div>
    <div class="JenisRental">
        <a class="jrent">Jenis Rental</a>
        <a class="jenis">Lepas Kunci</a>
        <div class="col-1">
            <input type="datetime-local" disabled>
        </div>
        <div class="col-2">
            <input type="datetime-local" disabled>
        </div>
    </div>
    <a class="sampai">-</a>
    <div class="TanggalBooking">
        <a class="tgl">Tanggal Booking</a>
    </div>
</div>
<div class="baris4">
    <hr class="kotak4">
    <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 21.6%; background: none; top: 590px;"></i>
    <a class="username">rafidanisa</a>
</div>
<div class="baris5">
    <hr class="kotak5">
    <a class="info">Informasi Pembayaran</a>
    <hr class="garis8">
    <div class="inp">
        <img src="jazz.png" style="width: 78px; height: 78px; left: 21.6%; top: 710px; position: absolute;">
        <a class="judulproduk">Mobil mobil an merah</a>
        <a class="merekjenis">Honda - Jazz</a>
        <a class="totalharga">Rp500.000</a>
        <div class="col-3">
            <textarea disabled>Iyaiya</textarea>
        </div>
        <img src="bni.jpeg" style="width: 43px; height: 24px; margin-left: 90%; margin-top: 485px; position: absolute;">
    </div>
    <a class="pesan">Pesan:</a>
    <a class="metpem">Metode Pembayaran:</a>
</div>
<?= $this->endSection(); ?>