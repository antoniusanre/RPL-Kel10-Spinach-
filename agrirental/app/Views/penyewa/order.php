<?= $this->extend('layout/templatepp'); ?>
<?= $this->section('content'); ?>
<link href="/css/Orderan Saya.css" rel="stylesheet" />

<?php foreach ($produk as $p) : ?>
    <div class="order1">
        <a class="orderansaya">Orderan Saya</a>
        <hr class="kotak">
        <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 210px;"></i>
        <a class="namatoko">Agrirental</a>
        <a class="status"></a>
        <hr class="garis">
        <img src="/img/jazz.png" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: -174px; position: absolute;">
        <a class="judul"><?= $p['judul']; ?></a>
        <a class="merek-jenis"><?= $p['merk']; ?> - <?= $p['jenis']; ?></a>
        <a class="harga">Rp <?= $p['biaya']; ?></a>
        <hr class="garis2">
        <form action="/penyewa/nilai" method="post">
            <input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>">
            <button type="submit">Nilai</button>
        </form>
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>