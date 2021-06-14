<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="container">
        <div class="title">
            <p>Orderan Saya</p>
        </div>
        <div class="content">
            <?php foreach ($order as $o) : ?>
                <div class="order" id="card">
                    <div class="first">
                        <div class="user">
                            <img src="/img/<?= $o['pict_rent']; ?>" alt="Profile Picture" width="60.47px" id="profile1">
                            <p><?= $o['nama_r']; ?></p>
                        </div>
                        <a href="#"><?= $o['status']; ?></a>
                    </div>
                    <br>
                    <div class="carItem">
                        <div class="user1">
                            <img src="/img/<?= $o['pict_prod']; ?>" alt="Mobil" width="100px" id="item">
                            <p><?= $o['judul']; ?> <br> <?= $o['merk']; ?> <?= $o['jenis']; ?></p>
                        </div>
                        <div class="tagihan">
                            <p>Rp <?= $o['biaya']; ?></p>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="nomor">
                            <p>No.Order : <?= $o['id_order']; ?></p>
                        </div>
                        <div class="btn">
                            <?php if ($o['status'] == "Selesai") : ?>
                                <div class="tombol">
                                    <form action="/penyewa/nilai" method="post">
                                        <input type="hidden" name="id_order" value="<?= $o['id_order']; ?>">
                                        <button type="submit"><span></span>Nilai</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <div class="tombol">
                                <form action="/penyewa/orderDetail" method="post">
                                    <input type="hidden" name="id_order" value="<?= $o['id_order']; ?>">
                                    <button type="submit"><span></span>Rincian</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <br>
    <br>
    <br>
</body>
<footer>
    <p>Copyright Spinach Team</p>
</footer>

</html>