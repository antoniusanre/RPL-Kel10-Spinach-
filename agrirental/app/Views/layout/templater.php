<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="" rel="stylesheet" />
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
                <a href="/rental/profile" class="sAkun2">
                    <?php if (url_is('rental/profile')) {
                        echo 'Profile';
                    } else if (url_is('rental/produk') || url_is('rental/ubah*') || url_is('rental/tambah')) {
                        echo 'Produk';
                    } else echo 'Order' ?> Mitra</a>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/rental/profile">
                            <span class="icon"><i class="fas fa-store-alt" <?= (url_is('/rental/profile*')) ? 'style="color: #4ACFAC;"' : ''; ?>></i></span>
                            <span class="profil" <?= (url_is('/rental/profile*')) ? 'style="color: #4ACFAC;"' : ''; ?>>Profil Mitra</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/produk">
                            <span class="icon"><i class="fas fa-car" <?= (url_is('/rental/produk*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/tambah*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/ubah*')) ? 'style="color: #4ACFAC;"' : ''; ?>></i></span>
                            <span class="produk" <?= (url_is('/rental/produk*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/tambah*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/ubah*')) ? 'style="color: #4ACFAC;"' : ''; ?>>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/rental/order">
                            <span class="icon" <?= (url_is('/rental/order*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/orderDetail*')) ? 'style="color: #4ACFAC;"' : ''; ?>><i class="fas fa-clipboard-list"></i></span>
                            <span class="orderan" <?= (url_is('/rental/order*')) ? 'style="color: #4ACFAC;"' : ''; ?> <?= (url_is('/rental/orderDetail*')) ? 'style="color: #4ACFAC;"' : ''; ?>>Orderan</span>
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
    <?= $this->renderSection('content'); ?>


    <script>
        function previewImg() {
            const sampul = document.querySelector('#pict_rent');
            const sampulLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img-preview');

            sampulLabel.textContent = sampul.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>