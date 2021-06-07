<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <?= $validation->listErrors(); ?>
        <div class="mt-5 d-flex justify-content-center">
            <form action="/penyewa/create" method="POST">
                <?= csrf_field(); ?>
                <div class="mb-3">
                    <label for="user" class="form-label">Username</label>
                    <input name="username_p" type="text" class="form-control" id="user">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email_p" type="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="pw_p" type="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama_p" type="text" class="form-control" id="nama">
                </div>
                <div class="mb-1">
                    <label for="" class="form-label">Jenis Kelamin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="M">
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="F">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                </div>
                <div class="mt-3 mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input name="telepon_p" type="text" class="form-control" id="telepon">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input name="alamat_p" type="text" class="form-control" id="alamat">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div> -->
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSectioN(); ?>