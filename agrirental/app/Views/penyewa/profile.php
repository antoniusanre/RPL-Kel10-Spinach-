<?= $this->extend('layout/templatep'); ?>
<?= $this->section('content'); ?>
<link href="/css/Profil Saya.css" rel="stylesheet" />
<hr class="kotak">
<a class="tambah">Profil Saya</a>
<?php if (session()->getFlashdata('pesans')) : ?>
    <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
<?php endif; ?>
<div class="formform">
    <form action="/penyewa/update" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <input type="hidden" name="pict_pl" value="<?= $penyewa['pict_p']; ?>">

        <div class="row">
            <div class="col-1">
                <label>Username</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="username_p" value="<?= $penyewa['username_p']; ?>">
                <p><?= ($validation->hasError('username_p') ? $validation->getError('username_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Nomor Telepon</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="telepon_p" value="<?= $penyewa['telepon_p']; ?>">
                <p><?= ($validation->hasError('telepon_p') ? $validation->getError('telepon_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Nama Lengkap</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="nama_p" value="<?= $penyewa['nama_p']; ?>">
                <p><?= ($validation->hasError('nama_p') ? $validation->getError('nama_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Jenis Kelamin</label>
            </div>
            <div class="col-2">
                <select id="" name="jk">
                    <option <?= ($penyewa['jk'] == 'M') ? 'selected' : ''; ?> value="M">Laki-Laki</option>
                    <option <?= ($penyewa['jk'] == 'F') ? 'selected' : ''; ?> value="F">Perempuan</option>
                </select>
                <p><?= ($validation->hasError('jk') ? $validation->getError('jk') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Email</label>
            </div>
            <div class="col-2">
                <input type="email" id="" name="email_p" value="<?= $penyewa['email_p']; ?>">
                <p><?= ($validation->hasError('email_p') ? $validation->getError('email_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Tanggal Lahir</label>
            </div>
            <div class="col-2">
                <input type="date" id="" name="birthdate" value="<?= $penyewa['birthdate']; ?>">
                <p><?= ($validation->hasError('birthdate') ? $validation->getError('birthdate') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Provinsi</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="provinsi_p" value="<?= $penyewa['provinsi_p']; ?>">
                <p><?= ($validation->hasError('provinsi_p') ? $validation->getError('provinsi_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Kota/Kabupaten</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="kota_p" value="<?= $penyewa['kota_p']; ?>">
                <p><?= ($validation->hasError('kota_p') ? $validation->getError('kota_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Kecamatan</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="kecamatan_p" value="<?= $penyewa['kecamatan_p']; ?>">
                <p><?= ($validation->hasError('kecamatan_p') ? $validation->getError('kecamatan_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Kode Pos</label>
            </div>
            <div class="col-2">
                <input type="text" id="" name="kodepos_p" value="<?= $penyewa['kodepos_p']; ?>">
                <p><?= ($validation->hasError('kodepos_p') ? $validation->getError('kodepos_p') : ''); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label>Alamat Rinci</label>
            </div>
            <div class="col-3">
                <input type="text" id="" name="alamat_p" value="<?= $penyewa['alamat_p']; ?>">
                <p><?= ($validation->hasError('alamat_p') ? $validation->getError('alamat_p') : ''); ?></p>
            </div>
        </div>
        <div class="tombol">
            <button type="submit" name="ubah_p">Simpan</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>