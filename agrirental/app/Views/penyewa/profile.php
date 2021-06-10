<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
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
            <div class="row text-dark">
                <div class="col-6">
                    <form action="/penyewa/update" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <input type="hidden" , name="pict_pl" value="<?= $penyewa['pict_p']; ?>">

                        <div class="row">
                            <div class="col-1">
                                <label>Username</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="username_p" value="<?= $penyewa['username_p']; ?>">
                            </div>
                            <p><?= ($validation->hasError('username_p') ? $validation->getError('username_p') : ''); ?></p>

                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Nomor Telepon</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="telepon_p" value="<?= $penyewa['telepon_p']; ?>">
                            </div>
                            <p><?= ($validation->hasError('telepon_p') ? $validation->getError('telepon_p') : ''); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Nama Lengkap</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="nama_p" value="<?= $penyewa['nama_p']; ?>">
                            </div>
                            <p><?= ($validation->hasError('nama_p') ? $validation->getError('nama_p') : ''); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Jenis Kelamin</label>
                            </div>
                            <div class="col-2">
                                <select id="" name="jk">
                                    <option <?= ($penyewa['jk'] == 'M') ? 'selected' : ''; ?> value="M">Laki-Laki</option>
                                    <option <?= ($penyewa['jk'] == 'M') ? 'selected' : ''; ?> value="F">Perempuan</option>
                                </select>
                            </div>
                            <p><?= ($validation->hasError('jk') ? $validation->getError('jk') : ''); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Email</label>
                            </div>
                            <div class="col-2">
                                <input type="email" id="" name="email_p" value="<?= $penyewa['email_p']; ?>">
                            </div>
                            <p><?= ($validation->hasError('email_p') ? $validation->getError('email_p') : ''); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Tanggal Lahir</label>
                            </div>
                            <div class="col-2">
                                <input type="date" id="" name="birthdate" value="<?= $penyewa['birthdate']; ?>">
                            </div>
                            <p><?= ($validation->hasError('birthdate') ? $validation->getError('birthdate') : ''); ?></p>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Provinsi</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="provinsi_p" value="<?= $penyewa['provinsi_p']; ?>">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Kota/Kabupaten</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="kota_p" value="<?= $penyewa['kota_p']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Kecamatan</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="kecamatan_p" value="<?= $penyewa['kecamatan_p']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Kode Pos</label>
                            </div>
                            <div class="col-2">
                                <input type="text" id="" name="kodepos_p" value="<?= $penyewa['kodepos_p']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                                <label>Alamat Rinci</label>
                            </div>
                            <div class="col-3">
                                <input type="text" id="" name="alamat_p" value="<?= $penyewa['alamat_p']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sampul" class="col-sm-2 col-form-label">Gambar Profil</label>
                            <div class="col-sm-2">
                                <img src="/img/<?= $penyewa['pict_p']; ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('pict_p') ? 'is-invalid' : ''); ?>" id="pict_p" name="pict_p" onchange="previewImg()">

                                    <label class="input-group-text" for="pict_p">Upload</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pict_p'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="update_p"><span></span>Simpan</button>
                        <?php if (session()->getFlashdata('pesans')) : ?>
                            <p class="alert alert-success "><?= session()->getFlashdata('pesans'); ?></p>
                        <?php endif; ?>
                </div>



                </form>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>