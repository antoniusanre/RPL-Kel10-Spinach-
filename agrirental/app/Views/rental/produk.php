<?= $this->extend('layout/templater'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/Mitra_1Produk.css">


<a class="sProduk">0 Produk</a>

<a href="">
    <div class="edit">
        <hr class="kotak">
        <a href="/rental/tambah" class="sUbah">Tambah Produk Baru</a>
        <i class="fas fa-plus" style="position: fixed; float: right;right: 184px; top: 112px; background: none;"></i>
    </div>
</a>

<div class="judul">
    <table>
        <tr>
            <th style="padding-left: 4.6%; width: 17.9%;">Nama Produk</th>
            <th style="padding-left: 1.4%; width: 9%;">Harga/12 Jam</th>
            <th style="padding-left: 1.4%; width: 9%;">Jumlah Tersewa</th>
            <th style="padding-left: 1.4%; width: 10.3%;">Status</th>
        </tr>
    </table>
</div>
<div class="isi">
    <table>
        <?php foreach ($produk as $p) : ?>
            <tr>
                <td style="padding-left: 4.6%; width: 17.9%;"><a href="" class="judul-merk"><?= $p['judul']; ?><br><?= $p['merk']; ?> - <?= $p['jenis']; ?></a></td>
                <td style="padding-left: 1.4%; width: 9%;">Rp <?= $p['harga']; ?></td>
                <td style="padding-left: 1.4%; width: 9%;">3</td>
                <td style="padding-left: 1.4%; width: 10.3%;">Selesai<a href="/rental/ubah/<?= $p['id_produk']; ?>" class="ubahapus">Ubah</a><br><a href="/rental/hapus/<?= $p['id_produk']; ?>" class="ubahapus">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php if (!$produk) : ?>
    <a class="takde">Tidak ada produk</a>
<?php endif; ?>
<?php if (session()->getFlashdata('pesans')) : ?>
    <p class="takde"><?= session()->getFlashdata('pesans'); ?></p>
<?php endif; ?>

<?= $this->endSection(); ?>