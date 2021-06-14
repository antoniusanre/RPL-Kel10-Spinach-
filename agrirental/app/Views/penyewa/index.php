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
            <div class="collection-sort">
                <button type="submit" name="cari">Cari</button>
            </div>
        </form>
    </div>
</nav>

<section class="products">
    <?php foreach ($produk as $p) : ?>
        <a href="/penyewa/detail/<?= $p['id_produk']; ?>">

            <div class="product-card">
                <div class="product-image" id="card">
                    <img src="/img/<?= $p['pict_prod']; ?>">
                    <h5><?= $p['judul']; ?></h5>
                    <p><?= $p['merk']; ?> - <?= $p['jenis']; ?></p>
                    <h5><?= $p['kota_r'] . ' | ' . $p['kecamatan_r']; ?></h5>
                    <p>Rp <?= $p['harga']; ?></p>
                    <p><?= ($p['rating']) ? $p['rating'] : ''; ?></p>
                    <a href="/penyewa/detail/<?= $p['id_produk']; ?>">Detail</a>
                    <form action="/penyewa/detail/<?= $p['id_produk']; ?>">
                        <button type="submit">Detail</button>
                    </form>
                </div>
        </a>
        </div>
    <?php endforeach; ?>
</section>

<?= $this->endSection(); ?>