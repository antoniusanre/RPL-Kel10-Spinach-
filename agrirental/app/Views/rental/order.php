<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Mitra_Orderan(1Order).css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <header>
        <div class="container">
            <div class="atas">
                <a href="">
                    <img class="logo" src="/img/logo.png" />
                </a>
                <i class="fas fa-store-alt fa-lg" style="position: fixed; float: right; top: 34px; right: 2.3%;"></i>
                <a class="sUname">Agrirental</a>
                <a class="panah">&#10095;</a>
                <a href="" class="sAkun2">Orderan</a>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/rental/profile">
                            <span class="icon"><i class="fas fa-store-alt"></i></span>
                            <span class="profil">Profil Mitra</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/produk">
                            <span class="icon"><i class="fas fa-car"></i></span>
                            <span class="produk">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/order">
                            <span class="icon"><i class="fas fa-clipboard-list" style="color: #4ACFAC;"></i></span>
                            <span class="orderan" style="color: #4ACFAC;">Orderan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/penyewa">
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <span class="keluar">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <a class="sProduk"><?= $torder; ?> Tersewa</a>
    <div class="judul">
        <table>
            <tr>
                <th style="padding-left: 4.6%; width: 17.9%;">Nama Produk</th>
                <th style="padding-left: 1.4%; width: 11%;">Jumlah yang harus dibayar</th>
                <th style="padding-left: 1.4%; width: 9%;">Status</th>
                <th style="padding-left: 1.4%; width: 10.3%;">No Orderan</th>
            </tr>
        </table>
    </div>
    <div class="isi">
        <table>
            <?php foreach ($order as $o) : ?>
                <tr>
                    <td style="padding-left: 4.6%; width: 17.9%;"><a href="" class="judul-merk"><?= $o['judul']; ?><br><?= $o['merk']; ?> - <?= $o['jenis']; ?></a></td>
                    <td style="padding-left: 1.4%; width: 11%;">Rp <?= $o['harga']; ?></td>
                    <td style="padding-left: 1.4%; width: 9%; text-transform: uppercase;"><?= $o['status']; ?></td>
                    <td style="padding-left: 1.4%; width: 10.3%;"><?= $o['id_order']; ?><br><a href="/rental/orderDetail/<?= $o['id_order']; ?>" class="cek">Periksa Rincian</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>