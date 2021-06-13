<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="/css/UbahPasswordY.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <div class="landing">
        <div class="navbar">
            <a href="/penyewa"><img src="/img/logo.png" class="logo"></a>
            <ul>
                <li><a href="/rental">MITRA</a></li>
                <li><a href="#">TENTANG</a></li>
                <li><a href="signup.html"><img src="/img/Profile.png" alt="Profile Picture" width="60.47px"> <?= $penyewa['username_p']; ?></a></li>
            </ul>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li style="list-style-type: none;">
                <a href="/penyewa/profile">
                    <span class="icon1"><i class="fas fa-user"></i></i></span>
                    <span class="profil">Profil</span>
                </a>
            </li>
            <li style="list-style-type: none;">
                <a href="/penyewa/pw">
                    <span class="icon3"><i class="fas fa-key"></i></i></span>
                    <span class="password">Ubah Password</span>
                </a>
            </li>
        </ul>
    </div>

    <?= $this->renderSection('content'); ?>

</body>
<footer>
    <p>Copyright Spinach Team</p>
</footer>

</html>