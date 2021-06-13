<?= $this->extend('layout/templatepp'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/listProduk.css">
<nav class="product-filter">
    <h1>NAMA PENCARIAN</h1>
    <div class="sort">
        <form action="" method="post">
            <div class="collection-sort">
                <label>Pilih Kabupaten/Kota:</label>
                <select name="kkot" id="keyword">
                    <?php foreach ($kota as $k) : ?>
                        <option value="<?= $k['kota_r']; ?>"><?= $k['kota_r']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="collection-sort">
                <label>Pilih Kecamatan:</label>
                <select name="kkec">
                    <?php foreach ($kecamatan as $ke) : ?>
                        <option value="<?= $ke['kecamatan_r']; ?>"><?= $ke['kecamatan_r']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="collection-sort">
                <br>
                <button type="submit" name="cari">Cari</button>
            </div>
        </form>
    </div>
</nav>

<section class="products">
    <?php foreach ($produk as $p) : ?>
        <div class="product-card">
            <div class="product-image" id="card">
                <img src="/img/Bg1.jpeg">
                <h5><?= $p['judul']; ?></h5>
                <p><?= $p['merk']; ?> - <?= $p['jenis']; ?></p>
                <h5><?= $p['kota_r'] . ' | ' . $p['kecamatan_r']; ?></h5>
                <p>Rp <?= $p['harga']; ?></p>
                <p><?= ($p['rating']) ? $p['rating'] : ''; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?= $this->endSection(); ?>