<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link rel="stylesheet" href="/css/signup.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-item-dark active" aria-current="true">
                    Profile
                </a>
                <a href="#" class="list-group-item active list-group-item-dark list-group-item-action">Alamat</a>
                <a href="#" class="list-group-item active list-group-item-dark list-group-item-action">Ubah Password</a>
            </div>
        </div>
        <div class="col-10 bg-secondary">
            <div class="row">
                <h2>Profile Saya</h2>
            </div>
            <div class="row">
                <div class="col-2 text-end">
                    <ul class="list-unstyled">
                        <li class="mt-4">
                            <label for="">Nama</label>
                        </li>
                        <li class="mt-4">
                            <label for="">Nomor Telepon</label>
                        </li>
                        <li class="mt-4">
                            <label for="">Username</label>
                        </li>
                        <li class="mt-4">
                            <label for="">Email</label>
                        </li>
                        <li class="mt-4">
                            <label for="">Alamat</label>
                        </li>
                        <li class="mt-4">
                            <label for="">Jenis Kelamin</label>
                        </li>
                        <li class="mt-5 mb-3">
                            <label for="">Tanggal Lahir</label>
                        </li>
                    </ul>
                </div>
                <div class="col-6">
                    <form action="/penyewa/update" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="hidden" , name="pict_pl" value="<?= $penyewa['pict_p']; ?>">
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="Nama Lengkap" name="nama_p" value="<?= $penyewa['nama_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="fas fa-phone"></i>
                            <input type="number" placeholder="Nomor Telepon" name="telepon_p" value="<?= $penyewa['telepon_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="Username" id="uname" name="username_p" value="<?= $penyewa['username_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-envelope"></i>
                            <input type="email" placeholder="Email" name="email_p" value="<?= $penyewa['email_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="Alamat" id="alamat_p" name="alamat_p" value="<?= $penyewa['alamat_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="provinsi" id="provinsi_p" name="provinsi_p" value="<?= $penyewa['provinsi_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="kota" id="kota_p" name="kota_p" value="<?= $penyewa['kota_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="kecamatan" id="kecamatan_p" name="kecamatan_p" value="<?= $penyewa['kecamatan_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="far fa-user"></i>
                            <input type="text" placeholder="kodepos" id="kodepos_p" name="kodepos_p" value="<?= $penyewa['kodepos_p']; ?>">
                        </div>
                        <div class="textbox">
                            <i class="fas fa-venus-mars"></i>
                            <select name="jk" style="background: none; border: none; font-size: 18px; width: 70%; float: left; margin: 0 18px; outline: none; color: white; cursor: pointer;">
                                <option <?= ($penyewa['jk'] == 'M') ? 'selected' : ''; ?> style="color: black;" value="M">Laki-Laki</option>
                                <option <?= ($penyewa['jk'] == 'F') ? 'selected' : ''; ?> style="color: black;" value="F">Perempuan</option>
                            </select>
                        </div>
                        <div class="textbox">
                            <i class="far fa-calendar-alt"></i>
                            <input value="<?= $penyewa['birthdate']; ?>" type="date" name="birthdate">
                        </div>

                        <div class="col-sm-8">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control <?= ($validation->hasError('pict_p')) ? 'is-invalid' : ''; ?>" id="pict_p" name="pict_p" onchange="previewImg()">

                                <label class="input-group-text" for="pict_p">Upload</label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pict_p'); ?>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="update_p"><span></span>Simpan</button>
                        <?php if (session()->getFlashdata('pesans')) : ?>
                            <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
                        <?php endif; ?>
                    </form>
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>