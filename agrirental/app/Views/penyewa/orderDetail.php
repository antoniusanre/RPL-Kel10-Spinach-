<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Rincian Order.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="navbar">
        <a href="/"><img src="/img/logo.png" class="logo"></a>
        <ul>
            <li><a href="/rental">MITRA</a></li>
            <li><a href="/#tentang">TENTANG</a></li>
            <li><a href="/penyewa/order">ORDER</a></li>
            <li><a href="/penyewa/profile"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px" id="profile1"> <?= $penyewa['username_p']; ?></a>
            </li>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
    </div>
    <div class="alamat pengguna">
        <hr class="kotak">
        <a class="ap">Alamat Order</a>
        <a class="nl"><?= $penyewa['nama_p']; ?></a>
        <a class="nt"><?= $penyewa['telepon_p']; ?></a>
        <a class="al"><?= $order['titik_temu']; ?></a>
        <hr class="garis">
    </div>
    <div class="baris 2">
        <hr class="kotak2">
        <a class="jr">Jenis Rental</a>
        <a class="pjr" style="position: absolute; float: left ;margin-left: 34%; width: 30%; margin-top: 45px; background: none;"><?= ($order['jenis_rental'] == 'd') ? 'Drop Off' : 'Lepas Kunci'; ?></a>
        <div class="garis2"></div>
        <hr class="garis3">
        <a class="tb">Tanggal Booking</a>
        <a class="tgldari"><?= $order['start_date']; ?></a>
        <a class="sampai">-</a>
        <a class="tglsampai"><?= $order['end_date']; ?></a>
        <div class="garis4"></div>
    </div>
    <div class="baris 3">
        <hr class="kotak3">
        <div class="z1">
            <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 627px;"></i>
            <a class="namatoko"><?= $order['nama_r']; ?></a>
            <img src="/img/<?= $order['pict_prod']; ?>" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: 130px; position: absolute;">
            <a class="judul"><?= $order['judul']; ?></a>
            <a class="merek-jenis"><?= $order['merk']; ?> - <?= $order['jenis']; ?></a>
        </div>
        <div class="z2">
            <a class="harga12jam">Harga/12 Jam</a>
            <a class="hargaprod">Rp <?= $order['harga']; ?></a>
        </div>
        <div class="z3">
            <a class="jumlahjam">Jumlah Jam</a>
            <a class="jumlah"><?= $order['waktu_sewa']; ?></a>
        </div>
        <div class="z4">
            <a class="harga">Harga</a>
            <a class="hartot">Rp <?= $order['biaya']; ?></a>
        </div>
        <hr class="garis5">
        <label>Pesan:</label>
        <a class="total">Total Pembayaran:</a>
        <a class="jumlahtotal">Rp <?= $order['biaya']; ?></a>
        <a class="metode">Metode Pembayaran:</a>
        <a class="cod">Cash On Delivery(COD)</a>
        <a class="pesantext"><?= $order['note']; ?></a>

    </div>
    <?php if ($order['status'] == 'Konfirmasi1') : ?>
        <form action="/penyewa/orderUpdate" method="post">
            <input type="hidden" name="status" value="Batal">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <button type="submit" class="button1">Batalkan Orderan</button>
        </form>
    <?php elseif ($order['status'] == 'Menunggu') : ?>
        <form action="/penyewa/orderUpdate" method="post">
            <input type="hidden" name="status" value="Batal">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <button type="submit" class="button1">Batalkan Orderan</button>
        </form>
    <?php elseif ($order['status'] == 'Berlangsung') :  ?>

    <?php elseif ($order['status'] == "Konfirmasi2") : ?>

    <?php endif; ?>


    <hr class="kotak4">
    <a class="stat">Status</a>
    <div class="garis6"></div>

    <a class="status"><?= $order['status']; ?></a>
    <?php if ($order['status'] == 'Konfirmasi1') : ?>

    <?php elseif ($order['status'] == 'Menunggu') : ?>
        <form action="/penyewa/orderUpdate" method="post">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <input type="hidden" name="status" value="Berlangsung">
            <button type="submit" class="button2">Update Status</button>
        </form>
    <?php elseif ($order['status'] == 'Berlangsung') :  ?>
        <form action="/penyewa/orderUpdate" method="post">
            <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
            <input type="hidden" name="status" value="Konfirmasi2">
            <button type="submit" class="button2">Update Status</button>
        </form>
    <?php elseif ($order['status'] == "Konfirmasi2") : ?>

    <?php endif; ?>


    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>