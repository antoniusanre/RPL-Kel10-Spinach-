<?= $this->extend('/layout/templater'); ?>
<?= $this->section('content'); ?>

<link href="/css/Mitra_Tambah Produk.css" rel="stylesheet" />

<hr class="kotak">
<a class="sstambah">Informasi Produk</a>
<div class="formform">
    <form action="/rental/ubahProduk/" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
        <input type="hidden" name="pict_prodl" value="<?= $produk['pict_prod']; ?>">
        <input type="hidden" name="pict_prod2l" value="<?= $produk['pict_prod2']; ?>">
        <input type="hidden" name="pict_prod3l" value="<?= $produk['pict_prod3']; ?>">
        <input type="hidden" name="pict_prod4l" value="<?= $produk['pict_prod4']; ?>">
        <input type="hidden" name="pict_prod5l" value="<?= $produk['pict_prod5']; ?>">

        <div class="row">
            <div class="col-1">
                <label>Judul Produk</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="judul" placeholder="Max 100 karakter" value="<?= $produk['judul']; ?>">
            </div>
            <p><?= ($validation->hasError('judul') ? $validation->getError('judul') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Deskripsi Produk</label>
            </div>
            <div class="col-2">
                <textarea id="" name="deskripsi" style="height:150px" placeholder="Max 1000 karakter"><?= $produk['deskripsi']; ?></textarea>
            </div>
            <p><?= ($validation->hasError('deskripsi') ? $validation->getError('deskripsi') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Merek</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="merk" placeholder="Contoh: Toyota" value="<?= $produk['merk']; ?>">
            </div>
            <p><?= ($validation->hasError('merk') ? $validation->getError('merk') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Jenis</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="jenis" placeholder="Contoh: Kijang Innova" value="<?= $produk['jenis']; ?>">
            </div>
            <p><?= ($validation->hasError('jenis') ? $validation->getError('jenis') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Harga</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="harga" placeholder="/12Jam (Contoh: 750000)" value="<?= $produk['harga']; ?>">
            </div>
            <p><?= ($validation->hasError('harga') ? $validation->getError('harga') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Tahun Keluaran</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="tahun" value="<?= $produk['tahun']; ?>">
            </div>
            <p><?= ($validation->hasError('tahun') ? $validation->getError('tahun') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Jenis Rental</label>
            </div>
            <div class="col-3">
                <select id="" name="jenis_rental">
                    <option <?= ($produk['jenis_rental'] == 'l') ? 'selected' : ''; ?> value="l">Lepas Kunci</option>
                    <option <?= ($produk['jenis_rental'] == 'd') ? 'selected' : ''; ?> value="d">Drop off</option>
                </select>
            </div>
            <p><?= ($validation->hasError('jenis_rental') ? $validation->getError('jenis_rental') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label for="jenisrental">Plat Nomor</label>
            </div>
            <div class="col-3">
                <select id="" name="plat">
                    <option <?= ($produk['plat'] == 'ganjil') ? 'selected' : ''; ?> value="ganjil">Ganjil</option>
                    <option <?= ($produk['plat'] == 'genap') ? 'selected' : ''; ?> value="genap">Genap</option>
                </select>
            </div>
            <p><?= ($validation->hasError('plat') ? $validation->getError('plat') : ''); ?></p>

        </div>
        <div class="row">
            <div class="col-1">
                <label>Foto Produk</label>
            </div>
            <div class="col-3">
                <input type="file" name="pict_prod" accept="image/*" multiple="multiple" aspect="1" class="poto" value="<?= $produk['pict_prod'];; ?>">
                <p><?= ($validation->hasError('pict_prod') ? $validation->getError('pict_prod') : ''); ?></p>

                <input type="file" name="pict_prod2" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="pict_prod3" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="pict_prod4" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="pict_prod5" accept="image/*" multiple="multiple" aspect="1" class="poto">
            </div>
        </div>
        <div class="tombol">
            <button type="submit" name="ubah_prod">Simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>