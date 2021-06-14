<?= $this->extend('layout/templaten'); ?>

<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/login.css">

<body background="/img/background.jpg">
    <header>
        <div class="atas">
            <a href="">
                <img src="/img/logo.png" class="logo">
            </a>
        </div>
    </header>
    <div class="loginForm">
        <h1>MASUK</h1>
        <form method="POST" action="/penyewa/login">
            <div class="textbox">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Username" name="username_p" value="">
            </div>
            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pw_p" value="">
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <p class="alert alert-danger "><?= session()->getFlashdata('pesan'); ?></p>
            <?php endif; ?>
            <?php if (session()->getFlashdata('pesans')) : ?>
                <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
            <?php endif; ?>
            <button type="submit" name="login"><span></span>Masuk</button>
        </form>
        <p>Belum punya akun? <a href="/daftar">Daftar</a></p>
    </div>
</body>

<?= $this->endSection(); ?>