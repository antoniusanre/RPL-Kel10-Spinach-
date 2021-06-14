<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Nilai Produk.css" rel="stylesheet" />
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
                <li><a href="/penyewa/profile"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px"> <?= $penyewa['pict_p']; ?></a></li>
            </ul>
        </div>
    </div>
    <a class="orderansaya">Nilai Produk</a>
    <hr class="kotak">
    <img src="/img/<?= $produk['pict_prod']; ?>" style="width: 78px; height: 78px; margin-left: 15.9%; margin-top: -395px; position: absolute;">
    <a class="judul"><?= $produk['judul']; ?></a>
    <a class="merek-jenis"><?= $produk['merk']; ?> - <?= $produk['jenis']; ?></a>
    <?php $waktu = $order['created_at'];
    $tanggal = explode(" ", $waktu)[0];
    ?>
    <a class="tanggal"><?= $tanggal; ?></a>
    <hr class="garis">
    <form action="/penyewa/rating" method="post">
        <div class="rating">
            <input value="5" type="radio" name="rating" id="star1"><label for="star1"></label>
            <input value="4" type="radio" name="rating" id="star2"><label for="star2"></label>
            <input value="3" type="radio" name="rating" id="star3"><label for="star3"></label>
            <input value="2" type="radio" name="rating" id="star4"><label for="star4"></label>
            <input value="1" type="radio" name="rating" id="star5"><label for="star5"></label>
        </div>
        <div class="col-1">
            <textarea placeholder="Berikan Komentarmu..." name="komentar"></textarea>
        </div>
        <hr class="garis2">
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
        <input type="hidden" name="id_order" value="<?= $order['id_order']; ?>">
        <button type="submit">Kirim</button>
    </form>
    <br>
    <br>
</body>
<footer>
    <p>Copyright Spinach Team</p>
</footer>

</html>