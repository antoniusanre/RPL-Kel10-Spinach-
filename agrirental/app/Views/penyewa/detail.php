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
            <li><a href="/#tentang">TENTANG</a></li>
            <li><a href="/penyewa/order">ORDER</a></li>
            <li><a href="/penyewa/profile"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px" id="profile1"> <?= $penyewa['username_p']; ?></a>
            </li>
            <li><a href="/logout"><i class="fas fa-sign-out-alt"></i></a></li>
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
            <p><?= (int)$produk['rating']; ?> | <?= $tkomen; ?> Penilaian | <?= $tsewa; ?> Tersewa</p>
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
                <?php if ($produk['rating']) : ?>
                    <div class="star">
                        <p><?= (int)$produk['rating']; ?> dari 5</p>
                        <?php if ((int)$produk['rating'] == 1) : ?>
                            <p>★☆☆☆☆</p>
                        <?php elseif ((int)$produk['rating'] == 2) : ?>
                            <p>★★☆☆☆</p>
                        <?php elseif ((int)$produk['rating'] == 3) : ?>
                            <p>★★★☆☆</p>
                        <?php elseif ((int)$produk['rating'] == 4) : ?>
                            <p>★★★★☆</p>
                        <?php else : ?>
                            <p>★★★★★</p>
                        <?php endif; ?>

                    </div>
                    <!-- <div class="rating">
                        <a href="#">Semua</a>
                        <a href="#">5 Bintang</a>
                        <a href="#">4 Bintang</a>
                        <a href="#">3 Bintang</a>
                        <a href="#">2 Bintang</a>
                        <a href="#">1 Bintang</a>
                    </div> -->
                    <div class="comment">
                        <?php foreach ($komen as $k) : ?>
                            <a href="#">
                                <div class="listcomment">
                                    <div class="icon">
                                        <img src="/img/Profile.png" alt="profile" id="image">
                                    </div>
                                    <div class="status">
                                        <br> <?= $k['komen']; ?>
                                        <br> <?= explode(" ", $k['created_at'])[0]; ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <p>Belum Ada Penilaian</p>
                <?php endif; ?>
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