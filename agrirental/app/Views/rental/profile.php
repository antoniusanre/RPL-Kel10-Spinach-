<?= $this->extend('layout/templater'); ?>
<?= $this->section('content'); ?>
<link href="/css/Mitra_Profil Mitra.css" rel="stylesheet" />

<a class="sprofil">Profil Mitra</a>
<hr class="kotak">
<div class="mitra">
    <hr class="kotak2">
    <i class="fas fa-store-alt fa-3x" style="position: absolute; top: 210px; left: 25%; background: none;"></i>
    <a class="namatoko">Agrirental</a>
    <a class="gabung">Waktu bergabung: 32-13-2100</a>
    <hr class="kotak3">
    <i class="fas fa-car fa-lg" style="left: 23.65%; top: 298px; position: absolute; background: none;"></i>
    <a href="">
        <div class="pproduk">
            <a class="prod">Produk</a>
            <a style="position: absolute; top: 294px;
          right: 51%; color: #4ACFAC;">&#10095;</a>
            <a class="jumlahprod">1</a>
        </div>
    </a>
    <hr class="kotak4">
    <i class="far fa-star fa-lg" style="left: 23.5%; top: 332px; position: absolute; background: none;"></i>
    <a href="">
        <div class="penilaian">
            <a class="nilai">Penilaian Mitra</a>
            <a style="position: absolute; top: 330px;
          right: 51%; color: #4ACFAC" ;>&#10095;</a>
            <a class="nilaimitra">5.0(10)</a>
        </div>
    </a>
</div>
<div class="formform">
    <form>
        <label>Nama Mitra</label>
        <input type="text" id="" name="" value="Agrirental">
        <div class="tombol">
            <a href="">
                <button>Simpan</button>
            </a>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>