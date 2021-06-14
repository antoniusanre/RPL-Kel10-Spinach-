<?= $this->extend('layout/templatepp'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/listProduk.css">
<nav class="product-filter">
    <h1>Cari Berdasarkan Judul dan Lokasi</h1>
    <div class="sort">
        <form action="/penyewa/cari" method="post">
            <div class="collection-sort">
                <input type="text" name="keyword">
            </div>
            <button type="submit" name="cari">Cari</button>
            <div class="collection-sort">
            </div>
        </form>
    </div>
</nav>

<section class="products">
    <?php foreach ($produk as $p) : ?>
        <a style="text-decoration: none;" href="/penyewa/detail/<?= $p['id_produk']; ?>">
            <div class="product-card">
                <div class="product-image" id="card">
                    <img src="/img/<?= $p['pict_prod']; ?>">
                    <h5><?= $p['judul']; ?></h5>
                    <p><?= $p['merk']; ?> - <?= $p['jenis']; ?></p>
                    <h5><?= $p['kota_r'] . ' | ' . $p['kecamatan_r']; ?></h5>
                    <p>Rp <?= $p['harga']; ?></p>
                    <p><?= ($p['rating']) ? $p['rating'] : ''; ?></p>
                </div>
        </a>
        </div>
    <?php endforeach; ?>
</section>

<?= $this->endSection(); ?>