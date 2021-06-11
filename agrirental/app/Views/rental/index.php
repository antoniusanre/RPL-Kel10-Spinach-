<?= $this->extend('layout/templater'); ?>

<?= $this->section('content'); ?>

<h1>index rental</h1>
<?php if (session()->getFlashdata('pesans')) : ?>
    <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
<?php endif; ?>

<?= $this->endSection(); ?>