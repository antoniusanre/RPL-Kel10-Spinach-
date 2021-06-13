<?= $this->extend('layout/templatep'); ?>
<?= $this->section('content'); ?>

<link href="/css/UbahPasswordY.css" rel="stylesheet" />

<hr class="kotak">
<a class="tambah">Ubah Password</a>
<hr class="berhasil">
<a class="Y">Password berhasil diubah</a>
<div class="formform">
    <form>
        <div class="row">
            <div class="col-1">
                <label>Password Saat Ini</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Password Baru</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Konfirmasi Password</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="">
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