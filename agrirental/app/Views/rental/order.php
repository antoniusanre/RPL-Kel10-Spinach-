<?= $this->extend('layout/templater'); ?>
<?= $this->section('content'); ?>
<link href="/css//Mitra_Orderan.css" rel="stylesheet" />

<a class="sProduk">0 Tersewa</a>
<div class="judul">
    <table>
        <tr>
            <th style="padding-left: 4.6%; width: 17.9%;">Nama Produk</th>
            <th style="padding-left: 1.4%; width: 11%;">Jumlah yang harus dibayar</th>
            <th style="padding-left: 1.4%; width: 9%;">Status</th>
            <th style="padding-left: 1.4%; width: 10.3%;"> </th>
        </tr>
    </table>
</div>
<a class="takde">Tidak ada produk</a>
<?= $this->endSection(); ?>