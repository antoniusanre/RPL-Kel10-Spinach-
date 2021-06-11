<?= $this->extend('/layout/templater'); ?>
<?= $this->section('content'); ?>

<link href="/css/Mitra_Tambah Produk.css" rel="stylesheet" />

<hr class="kotak">
<a class="sstambah">Informasi Produk</a>
<div class="formform">
    <form>
        <div class="row">
            <div class="col-1">
                <label>Judul Produk</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="" placeholder="Max 100 karakter">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Deskripsi Produk</label>
            </div>
            <div class="col-2">
                <textarea id="" name="" style="height:150px" placeholder="Max 1000 karakter"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Merek</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="" placeholder="Contoh: Toyota">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Jenis</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="" placeholder="Contoh: Kijang Innova">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Harga</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="" placeholder="/12Jam (Contoh: 750000)">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Tahun Keluaran</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Jenis Rental</label>
            </div>
            <div class="col-3">
                <select id="" name="">
                    <option value="" disabled selected></option>
                    <option value="lepaskunci">Lepas Kunci</option>
                    <option value="dropoff">Drop off</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label for="jenisrental">Plat Nomor</label>
            </div>
            <div class="col-3">
                <select id="" name="">
                    <option value="" disabled selected></option>
                    <option value="ganjil">Ganjil</option>
                    <option value="genap">Genap</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Foto Produk</label>
            </div>
            <div class="col-3">
                <input type="file" name="file" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="file" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="file" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="file" accept="image/*" multiple="multiple" aspect="1" class="poto">
                <input type="file" name="file" accept="image/*" multiple="multiple" aspect="1" class="poto">
            </div>
        </div>
        <div class="tombol">
            <a href="">
                <button>Simpan</button>
            </a>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>