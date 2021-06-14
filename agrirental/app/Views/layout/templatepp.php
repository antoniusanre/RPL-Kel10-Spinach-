<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Checkout.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title>Checkout</title>
</head>

<body>
    <div class="landing">
        <div class="navbar">
            <a href="landingpage.html"><img src="/img/logo.png" class="logo"></a>
            <ul>
                <li><a href="/rental">MITRA</a></li>
                <li><a href="#">TENTANG</a></li>
                <li><a href="/daftar"><img src="/img/<?= $penyewa['pict_p']; ?>" alt="Profile Picture" width="60.47px"> username</a></li>
            </ul>
        </div>
    </div>

    <?= $this->renderSection('content'); ?>

    <script src="/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="/js/script.js"></script>

</body>
<footer>
    <p>Copyright Spinach Team</p>
</footer>

</html>