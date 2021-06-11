<?= $this->extend('layout/templater'); ?>

<?= $this->section('content'); ?>

<form action="/rental/update" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <input type="hidden" , name="pict_rl" value="<?= $mitra['pict_rent']; ?>">

    <div class="row">
        <div class="col-1">
            <label>Nama Mitra</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="nama_r" value="<?= $mitra['nama_r']; ?>">
        </div>
        <p><?= ($validation->hasError('nama_r') ? $validation->getError('nama_r') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Nomor Contact Person</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="no_cp" value="<?= $mitra['no_cp']; ?>">
        </div>
        <p><?= ($validation->hasError('no_cp') ? $validation->getError('no_cp') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Nama Pemilik</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="nama_cp" value="<?= $mitra['nama_cp']; ?>">
        </div>
        <p><?= ($validation->hasError('nama_cp') ? $validation->getError('nama_cp') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Email Mitra</label>
        </div>
        <div class="col-2">
            <input type="email" id="" name="email_r" value="<?= $mitra['email_r']; ?>">
        </div>
        <p><?= ($validation->hasError('email_r') ? $validation->getError('email_r') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Provinsi</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="provinsi_r" value="<?= $mitra['provinsi_r']; ?>">
        </div>
        <p><?= ($validation->hasError('provinsi_r') ? $validation->getError('provinsi_r') : ''); ?></p>

    </div>
    <div class="row">
        <div class="col-1">
            <label>Kota/Kabupaten</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="kota_r" value="<?= $mitra['kota_r']; ?>">
        </div>
        <p><?= ($validation->hasError('kota_r') ? $validation->getError('kota_r') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Kecamatan</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="kecamatan_r" value="<?= $mitra['kecamatan_r']; ?>">
        </div>
        <p><?= ($validation->hasError('kecamatan_r') ? $validation->getError('kecamatan_r') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>NIK</label>
        </div>
        <div class="col-2">
            <input type="text" id="" name="nik_r" value="<?= $mitra['nik_r']; ?>">
        </div>
        <p><?= ($validation->hasError('nik_r') ? $validation->getError('nik_r') : ''); ?></p>
    </div>
    <div class="row">
        <div class="col-1">
            <label>Alamat Rinci</label>
        </div>
        <div class="col-3">
            <input type="text" id="" name="alamat_r" value="<?= $mitra['alamat_r']; ?>">
        </div>
        <p><?= ($validation->hasError('alamat_r') ? $validation->getError('alamat_r') : ''); ?></p>
    </div>
    <div class="row mb-3">
        <label for="sampul" class="col-sm-2 col-form-label">Gambar Profil</label>
        <div class="col-sm-2">
            <img src="/img/<?= $mitra['pict_rent']; ?>" class="img-thumbnail img-preview">
        </div>
        <div class="col-sm-8">
            <div class="input-group mb-3">
                <input type="file" class="form-control <?= ($validation->hasError('pict_rent') ? 'is-invalid' : ''); ?>" id="pict_rent" name="pict_rent" onchange="previewImg()">

                <label class="input-group-text" for="pict_rent">Upload</label>
                <div class="invalid-feedback">
                    <?= $validation->getError('pict_rent'); ?>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" name="update_r"><span></span>Simpan</button>
    <?php if (session()->getFlashdata('pesans')) : ?>
        <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
    <?php endif; ?>
    </div>



</form>

<?= $this->endSection(); ?>