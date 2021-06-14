<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/landingpage.css">
    <title><?= $title; ?></title>
</head>

<body>
    <div class="landing">
        <div class="navbar">
            <a href="/"><img src="/img/logo.png" class="logo"></a>
            <ul>
                <li><a href="/rental">MITRA</a></li>
                <li><a href="#tentang">TENTANG</a></li>
                <li><a href="/login">MASUK</a></li>
                <li><a href="/daftar">DAFTAR</a></li>
            </ul>
        </div>

        <div class="container">
            <h1>SELAMAT DATANG DI AGRIRENTAL</h1>
            <p>MENYEDIAKAN PENYEWAAN MOBIL PRIBADI DI INDONESIA</p>
            <div>
                <button class="button1" type="button"><span></span> <a style="text-decoration: none;" href="#landingSearch">CARI LOKASI ANDA</a></button>
            </div>
        </div>
    </div>

    <div id="landingSearch">
        <div class="form">
            <h1>MASUKKAN LOKASI ANDA</h1>
            <br>
            <form action="/penyewa/cari" method="post">
                <div class="d-flex">
                    <input type="text" name="keyword">
                </div>
                <button class="button1" type="submit"><span></span>CARI</button>
            </form>
        </div>
    </div>

    <div id="tentang">
        <div class="about">
            <h1>TENTANG KAMI</h1>
            <br>
            <div class="d-flex">
                <div class="col-a">
                    <p>
                        AGRIRENTAL ADALAH APLIKASI BERBASIS WEB YANG DIBUAT UNTUK MEMENUHI TUGAS AKHIR MATA KULIAH REKAYASA PERANGKAT LUNAK.
                        AGRIRENTAL BERTUJUAN UNTUK MEMUDAHKAN MASYARAKAT DALAM HAL SEWA MOBIL. KAMI MENJAMIN KEAMANAN PENGGUNA SERTA KUALITAS KENDARAAN
                        YANG ADA DI AGRIRENTAL.
                    </p>
                </div>
                <div class="col-b">
                    <p>
                        AGRIRENTAL DIBUAT OLEH KEL10. KEL10 ADALAH TIM BERANGGOTAKAN 4 ORANG YANG MEMILIKI SIFAT DAN KEPRIBADIAN YANG BERBEDA TETAPI
                        MEMILIKI MISI YANG SAMA YAITU MENYELESAIKAN TUGAS AKHIR RPL SEBAIK MUNGKIN SESUAI DENGAN KEMAMPUAN KAMI MESKIPUN BANYAK MASALAH
                        DAN KENDALA YANG DIHADAPI KELOMPOK KAMI.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>