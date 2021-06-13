<?= $this->extend('layout/templater'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/Mitra_Orderan.css">
<h1>index rental</h1>
<?php if (session()->getFlashdata('pesans')) : ?>
    <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
<?php endif; ?>

<?= $this->endSection(); ?>