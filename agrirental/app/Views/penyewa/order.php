<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Orderan Saya.css" rel="stylesheet" />
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
    <a class="orderansaya">Orderan Saya</a>
    <?php if (!$order) : ?>
        <div class="gakade">
            <a class="takdeprod">Belum ada orderan</a>
        </div>
    <?php else : ?>
        <?php foreach ($order as $o) : ?>
            <div class="kotak">

                <div class="minusnilai">
                    <div class="order1">
                        <a class="orderansaya">Orderan Saya</a>
                        <hr class="kotak">
                        <i class="fas fa-user-circle fa-2x" style="position: absolute; left: 15.9%; background: none; top: 210px;"></i>
                        <a class="namatoko"><?= $o['nama_r']; ?></a>
                        <a class="status"><?= $o['status']; ?></a>
                        <hr class="garis">
                        <img src="/img/<?= $o['pict_prod']; ?>" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: -174px; position: absolute;">
                        <a class="judul"><?= $o['judul']; ?></a>
                        <a class="merek-jenis"><?= $o['merk']; ?> - <?= $o['jenis']; ?></a>
                        <a class="harga">Rp <?= $o['harga']; ?></a>
                        <hr class="garis2">
                        <form method="post" action="/penyewa/nilai">
                            <input name="id_order" type="hidden" value="<?= $o['id_order']; ?>">
                            <button type="submit" class="button2">Nilai</button>
                        </form>

                    </div>
                    <a class="noorder">No. Order: <?= $o['id_order']; ?></a>
                    <form method="post" action="/penyewa/orderDetail">
                        <input name="id_order" type="hidden" value="<?= $o['id_order']; ?>">
                        <button type="submit" class="button1">Rincian Order</button>
                    </form>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>