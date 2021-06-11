<?= $this->extend('layout/templaten'); ?>

<?= $this->section('content'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/favicon.ico" width="100" height="100" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="#">Mitra</a>
                <a class="nav-link" href="#">Tentang</a>
                <a class="nav-link" href="/login">Masuk</a>
                <a class="nav-link" href="/daftar">Daftar</a>
            </div>
        </div>
    </div>
</nav>
<h1>hjafda</h1>

<?= $this->endSection(); ?>