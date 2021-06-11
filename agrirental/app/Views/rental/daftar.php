<?= $this->extend('layout/templaten'); ?>

<?= $this->section('content'); ?>


<link rel="stylesheet" href="/css/signUpMitra.css">
<script src="https://kit.fontawesome.com/7b2e6c4dc6.js" crossorigin="anonymous"></script>

<body background="/img/background.jpg">
    <header>
        <div class="atas">
            <a href="">
                <img src="/img/logo.png" class="logo">
            </a>
        </div>
    </header>
    <div class="signupForm">
        <h1>Halo, <?= session()->nama; ?> ayo isi detail mitramu!</h1>
        <form action="/rental/create" method="post">
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Nama Mitra" name="nama_r" value="<?= old('nama_r'); ?>">
                <p><?= ($validation->hasError('nama_r') ? $validation->getError('nama_r') : ''); ?></p>
            </div>
            <div class="textbox">
                <i class="far fa-id-card"></i>
                <input type="text" placeholder="NIK" name="nik_r" value="<?= old('nik_r'); ?>">
                <p><?= ($validation->hasError('nik_r') ? $validation->getError('nik_r') : ''); ?></p>
            </div>
            <div class="textbox">
                <i class="far fa-address-book"></i>
                <input type="text" placeholder="Provinsi" name="provinsi_r" value="<?= old('provinsi_p'); ?>">
                <p><?= ($validation->hasError('provinsi_r') ? $validation->getError('provinsi_r') : ''); ?></p>
            </div>
            <div class="textbox">
                <i class="fas fa-city"></i>
                <input type="text" placeholder="Kota/Kabupaten" name="kota_r" value="<?= old('kota_r'); ?>">
                <p><?= ($validation->hasError('kota_r') ? $validation->getError('kota_r') : ''); ?></p>
            </div>
            <div class="textbox">
                <i class="fas fa-city"></i>
                <input type="text" placeholder="Kecamatan" name="kecamatan_r" value="<?= old('kecamatan_r'); ?>">
                <p><?= ($validation->hasError('kecamatan_r') ? $validation->getError('kecamatan_r') : ''); ?></p>
            </div>
            <div class="textbox">
                <i class="far fa-building"></i>
                <input type="text" placeholder="Alamat Rinci" name="alamat_r" value="<?= old('alamat_r'); ?>">
                <p><?= ($validation->hasError('alamat_r') ? $validation->getError('alamat_r') : ''); ?></p>
            </div>
            <button type="submit"><span></span>Daftar</button>
        </form>
    </div>
</body>




<?= $this->endSection(); ?>