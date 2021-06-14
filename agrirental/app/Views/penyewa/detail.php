<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/halamanProduk.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="navbar">
        <a href="/"><img src="/img/logo.png" class="logo"></a>
        <ul>
            <li><a href="/rental">MITRA</a></li>
            <li><a href="#">TENTANG</a></li>
            <li><a href="/daftar"><i class="fas fa-user-circle fa-lg"></i> <?= $penyewa['username_p']; ?></a></li>
        </ul>
    </div>
    <div class="container">
        <div class="left" id="card">
            <div class="mainPicture">
                <img src="/img/<?= $produk['pict_prod']; ?>" alt="productPic" id="carPics">
            </div>
            <div class="subPictures">
                <img src="/img/<?= $produk['pict_prod2']; ?>" alt="productPic" id="carPics2">
                <img src="/img/<?= $produk['pict_prod3']; ?>" alt="productPic" id="carPics2">
                <img src="/img/<?= $produk['pict_prod4']; ?>" alt="productPic" id="carPics2">
                <img src="/img/<?= $produk['pict_prod5']; ?>" alt="productPic" id="carPics2">
            </div>
            <br>
            <br>
            <div class="user">
                <div class="pengguna" id="card3">
                    <img src="/img/<?= $rental['pict_rent']; ?>" alt="Profile" id="user1">
                    <p><?= $rental['nama_r']; ?></p>
                </div>
                <form action="/penyewa/checkout/<?= $produk['id_produk']; ?>" method="post">
                    <button type="submit"><span></span>Sewa</button>
                </form>
            </div>
        </div>
        <div class="right" id="card">
            <h2><?= $produk['judul']; ?></h2>
            <p><?= $produk['rating']; ?> | 21 Penilaian | 25x Tersewa</p>
            <h2>Rp <?= $produk['harga']; ?>/12 jam</h2>
            <h3>Informasi Produk</h3>
            <ul>
                <li>Merk : <?= $produk['merk']; ?></li>
                <li>Jenis : <?= $produk['jenis']; ?></li>
                <li>Tahun : <?= $produk['tahun']; ?></li>
                <li>Jenis Rental : <?php if ($produk['jenis_rental'] == "l") echo "Lepas Kunci";
                                    else if ($produk['jenis_rental'] == "d") echo "Drop Off";
                                    else echo "Lepas Kunci dan Drop Off" ?></li>
                <li>Plat Nomor : <?= $produk['plat']; ?></li>
            </ul>
            <h3>Deskripsi Produk</h3>
            <p><?= $produk['deskripsi']; ?></p>
            <div class="nilaiProduk" id="card2">
                <h4>Penilaian Produk</h4>
                <div class="star">
                    <p><?= ($produk['rating']) ? $produk['rating'] : '-'; ?> dari 5</p>
                    <p>★★☆☆☆</p>
                </div>

            </div>
        </div>
    </div>
    <br>
    <br>
</body>
<footer>
    <p>Copyright Spinach Team</p>
</footer>

</html>