<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/Mitra_Profil Mitra.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/eaa6d1f26f.js" crossorigin="anonymous"></script>
    <title><?= $title; ?></title>
</head>

<body>
    <header>
        <div class="container">
            <div class="atas">
                <a href="/penyewa">
                    <img class="logo" src="/img/logo.png" />
                </a>
                <i class="fas fa-store-alt fa-lg" style="position: fixed; float: right; top: 34px; right: 2.3%;"></i>
                <a class="sUname">Agrirental</a>
                <a class="panah">&#10095;</a>
                <a href="/rental/profile" class="sAkun2">Profil Mitra</a>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/rental/profile">
                            <span class="icon"><i class="fas fa-store-alt" style="color: #4ACFAC;"></i></span>
                            <span class="profil" style="color: #4ACFAC;">Profil Mitra</span>
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
                            <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                            <span class="orderan">Orderan</span>
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
    <a class="sprofil">Profil Mitra</a>
    <hr class="kotak">
    <div class="mitra">
        <hr class="kotak2">
        <i class="fas fa-store-alt fa-3x" style="position: absolute; top: 210px; left: 25%; background: none;"></i>
        <a class="namatoko"><?= $mitra['nama_r']; ?></a>
        <a class="gabung">Waktu bergabung: <?= explode(" ", $mitra['created_at'])[0]; ?></a>
        <hr class="kotak3">
        <i class="fas fa-car fa-lg" style="left: 23.65%; top: 298px; position: absolute; background: none;"></i>
        <a href="">
            <div class="pproduk">
                <a class="prod">Produk</a>
                <a style="position: absolute; top: 294px;
          right: 51%; color: #4ACFAC;">&#10095;</a>
                <a class="jumlahprod"><?= $tproduk; ?></a>
            </div>
        </a>
        <hr class="kotak4">
        <i class="far fa-star fa-lg" style="left: 23.5%; top: 332px; position: absolute; background: none;"></i>
        <a href="/rental/produk">
            <div class="penilaian">
                <a class="nilai">Penilaian Mitra</a>
                <a style="position: absolute; top: 330px;
          right: 51%; color: #4ACFAC" ;>&#10095;</a>
                <a class="nilaimitra"><?= $rmit ?>.0(<?= $tkomen; ?>)</a>
            </div>
        </a>
    </div>
    <div class="formform">
        <form action="/rental/update" method="post">
            <label>Nama Mitra</label>
            <input type="text" id="" name="nama_r" value="<?= $mitra['nama_r']; ?>">
            <label>Email</label>
            <input type="email" id="" name="email_r" value="<?= $mitra['email_r']; ?>">
            <label>Nama CP</label>
            <input type="text" id="" name="nama_cp" value="<?= $mitra['nama_cp']; ?>">
            <label>Nomor CP</label>
            <input type="tel" id="" name="no_cp" value="<?= $mitra['no_cp']; ?>">
            <label>Alamat Rinci</label>
            <input type="text" id="" name="alamat_r" value="<?= $mitra['alamat_r']; ?>" style="width: 79.5%">
            <label>Kecamatan</label>
            <input type="text" id="" name="kecamatan_r" value="<?= $mitra['kecamatan_r']; ?>">
            <label>Kota/Kab</label>
            <input type="text" id="" name="kota_r" value="<?= $mitra['kota_r']; ?>">
            <label>Provinsi</label>
            <input type="text" id="" name="provinsi_r" value="<?= $mitra['provinsi_r']; ?>">
            <a href="">
                <button type="submit">Simpan</button>
            </a>
        </form>
    </div>
    <footer>
        <p>Copyright Spinach Team</p>
    </footer>
</body>

</html>