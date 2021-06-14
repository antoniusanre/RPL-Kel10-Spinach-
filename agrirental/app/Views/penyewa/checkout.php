<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Checkout.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="landing">
        <div class="navbar">
            <a href="/"><img src="/img/logo.png" class="logo"></a>
            <ul>
                <li><a href="/rental">MITRA</a></li>
                <li><a href="/#tentang">TENTANG</a></li>
                <li><a href="/penyewa/profile"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px"> <?= $penyewa['username_p']; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="alamat pengguna">
        <hr class="kotak">
        <a class="ap">Alamat Titik Temu</a>
        <a class="nl"><?= $penyewa['nama_p']; ?></a>
        <a class="nt"><?= $penyewa['telepon_p']; ?></a>
        <hr class="garis">
    </div>
    <hr class="kotak2">
    <a class="jr">Pilih Jenis Rental</a>
    <form action="/penyewa/pesan" method="post">
        <input type="hidden" name="o_produk" value="<?= $produk['id_produk']; ?>">
        <input type="hidden" name="o_rental" value="<?= $rental['id_rental']; ?>">
        <textarea name="titik_temu" style="position: absolute; float: left; margin-left: 34%; width: 50%; margin-top: -85px; background: none;" placeholder="Alamat Titik Temu"><?= old('titik_temu'); ?></textarea>
        <p><?= ($validation->hasError('titik_temu') ? $validation->getError('titik_temu') : ''); ?></p>
        <div class="col-2">
            <select name="jenis_rental">
                <option value="" disabled selected></option>
                <?php if ($produk['jenis_rental'] == 'l' || $produk['jenis_rental'] == 'ld') : ?>
                    <option value="l">Lepas Kunci</option>
                <?php endif; ?>
                <?php if ($produk['jenis_rental'] == 'd' || $produk['jenis_rental'] == 'ld') : ?>
                    <option value="d">Drop off</option>
                <?php endif; ?>
            </select>
            <p><?= ($validation->hasError('jenis_rental') ? $validation->getError('jenis_rental') : ''); ?></p>
        </div>
        <div class="garis2"></div>
        <hr class="garis3">
        <a class="tb">Tanggal Booking</a>
        <div class="col-3">
            <input value="<?= old('start_date'); ?>" name="start_date" type="datetime-local">
            <p><?= ($validation->hasError('start_date') ? $validation->getError('start_date') : ''); ?></p>
        </div>
        <div class="col-4">
            <input value="<?= old('end_date'); ?>" name="end_date" type="datetime-local">
            <p><?= ($validation->hasError('end_date') ? $validation->getError('end_date') : ''); ?></p>
        </div>
        <a class="sampai">-</a>
        <div class="garis4"></div>
        <hr class="kotak3">
        <div class="z1">
            <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 560px;"></i>
            <a class="namatoko"><?= $rental['nama_r']; ?></a>
            <img src="jazz.png" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: 130px; position: absolute;">
            <a class="judul"><?= $produk['judul']; ?></a>
            <a class="merek-jenis"><?= $produk['merk']; ?> - <?= $produk['jenis']; ?></a>
        </div>
        <div class="z2">
            <a class="harga12jam">Harga/12 Jam</a>
            <a class="hargaprod">Rp <?= $produk['harga']; ?></a>
        </div>
        <div class="z3">
            <a class="jumlahjam">Jumlah Jam</a>
            <a class="jumlah">1</a>
        </div>
        <div class="z4">
            <a class="harga">Harga</a>
            <a class="hartot">Rp500.000</a>
        </div>
        <hr class="garis5">
        <label>Pesan:</label>
        <div class="col-5">
            <textarea placeholder="(Opsional)" name="note" style="margin-left: 5%; margin-top: 220px;"><?= old('note'); ?></textarea>
        </div>
        <a class="total">Total Pembayaran:</a>
        <a class="jumlahtotal">Rp500.000</a>
        <a class="metode">Metode Pembayaran:</a>
        <a class="cod">Cash On Delivery(COD)</a>
        </div>

        <button type="submit">Buat Orderan</button>

    </form>

</body>

</html>