<?= $this->extend('layout/templaten'); ?>

<?= $this->section('content'); ?>


<link rel="stylesheet" href="/css/signup.css">
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
        <form action="/penyewa/create" method="POST">
            <?= csrf_field(); ?>
            <h1>DAFTAR</h1>
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Nama Lengkap" name="nama_p" value="<?= old('name_p'); ?>">
            </div>
            <p><?= ($validation->hasError('nama_p') ? $validation->getError('nama_p') : ''); ?></p>
            <div class="textbox">
                <i class="fas fa-phone"></i>
                <input type="number" placeholder="Nomor Telepon" name="telepon_p" value="<?= old('telepon_p'); ?>">
            </div>
            <p><?= ($validation->hasError('telepon_p') ? $validation->getError('telepon_p') : ''); ?></p>
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Username" id="uname" name="username_p" value="<?= old('username_p'); ?>">
            </div>
            <p><?= ($validation->hasError('username_p') ? $validation->getError('username_p') : ''); ?></p>
            <div class="textbox">
                <i class="far fa-envelope"></i>
                <input type="email" placeholder="Email" name="email_p" value="<?= old('email_p'); ?>">
            </div>
            <p><?= ($validation->hasError('email_p') ? $validation->getError('email_p') : ''); ?></p>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pw_p" value="">
            </div>
            <p><?= ($validation->hasError('pw_p') ? $validation->getError('pw_p') : ''); ?></p>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Konfirmasi Password" name="pw_p2" value="">
            </div>
            <p><?= ($validation->hasError('pw_p2') ? $validation->getError('pw_p2') : ''); ?></p>
            <div class="textbox">
                <i class="fas fa-venus-mars"></i>
                <select name="jk" style="background: none; border: none; font-size: 18px; width: 70%; float: left; margin: 0 18px; outline: none; color: white; cursor: pointer;">
                    <option value="" disabled selected hidden>Jenis Kelamin</option>
                    <option style="color: black;" value="M">Laki-Laki</option>
                    <option style="color: black;" value="F">Perempuan</option>
                </select>
            </div>
            <p><?= ($validation->hasError('jk') ? $validation->getError('jk') : ''); ?></p>
            <div class="textbox">
                <i class="far fa-calendar-alt"></i>
                <input type="date" name="birthdate">
            </div>
            <p><?= ($validation->hasError('birthdate') ? $validation->getError('birthdate') : ''); ?></p>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="alert alert-danger "><?= session()->getFlashdata('pesan'); ?></p>
            <?php endif; ?>
            <button type="submit" name="daftar_p"><span></span>Daftar</button>
            <p>Sudah punya akun? <a style="padding-bottom: 50px;" href="/login">Masuk</a></p>
        </form>
    </div>
</body>


<?= $this->endSection(); ?>