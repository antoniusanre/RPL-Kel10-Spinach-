# Laporan Akhir Projek Mata Kuliah Rekayasa Perangkat Lunak (KOM331
  • Kelas RPL Paralel 2
  
  • Kelompok 10
  
## Asisten Pratikum

| Nama                    | NIM       |
| ----------------------- |:---------:|
| Levina Siatono          | G64180019 |
| Ali Naufal Amrullah     | G64180080 |
| Muhammad Fauzan Ramadhan| G64180117 |
   
## Anggota Kelompok

| Nama                    | NIM       | Role               |
| ----------------------- |:---------:| :----------------: |
| Ahmad Hadryan Mora      | G64190001 | Backend Developer  |
| Rafida Nisa Maghfiroh   | G64190038 | UI/UX Designer     |
| Faris Ilham Noormandiri | G64190051 | Frontend Developer |
| Antonius Anre Sianturi  | G64190053 | Project Manager    |
   
## Deskripsi Singkat
   Agrirental adalah aplikasi berbasis web yang menjadi tempat transaksi antara individu yang memiliki mobil sebagai aset untuk disewakan dan orang-orang yang sedang     membutuhkan mobil di suatu tempat tertentu. Terdapat beberapa fitur dalam kemudahan penyewaan mobil antara lain, fitur booking, deskripsi mobil beserta perjalanan hidupnya, pantau ketersediaan mobil, dan fitur review/rate/komentar.

## Tujuan

   1. Memudahkan orang untuk menyewa mobil
   2. Menyediakan pilihan mobil yang akan disewa sesuai dengan kriteria dan keinginan pelanggan
   3. Memudahkan interaksi antara pelanggan dengan penyedia mobil
  
## User Analysis

   1. Sebagai pengguna produk terdaftar, saya ingin mendapatkan peminjaman mobil yang berada di sekitar saya agar saya dapat dengan cepat menjangkau dan mendapatkan sewaan mobil.
   2. Sebagai pengguna produk terdaftar, saya ingin mendapatkan mobil rental yang terbaik agar saya tidak perlu repot-repot mencari dari list yang ada.
   3. Sebagai pengguna yang telah logout, agar dapat menggunakan aplikasi secara personal, saya dapat mengetikkan alamat email dan kata sandi saya untuk masuk ke aplikasi.
   4. Sebagai pengguna yang menawarkan rental mobil, saya ingin orang-orang memberi komentar terhadap rental yang saya berikan agar semakin banyak orang yang percaya dengan rental saya.
   5.  Mobil saya jarang saya pakai dan hanya sekedar dipanaskan di garasi, untuk itu saya ingin merentalkan mobil saya namun dengan sistem pembayaran dengan jelas.
   6.  Sebagai pengguna produk terdaftar, agar dapat mencari rental mobil terdekat/ sesuai lokasi saya, saya dapat memasukkan lokasi saya di menu ‘cari lokasi’.
   7.  Sebagai pengguna yang belum terdaftar(?), agar dapat menggunakan aplikasi secara maksimal, saya dapat mengisi data untuk daftar ke aplikasi.
    
## Spesifikasi Teknis Lingkungan Pengembangan
    
   ### Spesifikasi Perangkat Keras
   • CPU : AMD Ryzen 9 4900H (3.3 GHz)
        
   • GPU : NVIDIA RTX 2060
        
   • OS  : Windows
        
   ### Spesifikasi Perangkat Lunak
   • Text Editor : Sublime Text & Visual Studio Code
   
   • Browser     : Chrome & Edge
   
   • Hosting     : InfinityFree
   
   • Database    : MySQL
        
   ### Bahasa dan Framework
   • Frontend  : HTML, CSS, Javascript
   
   • Backend   : PHP, Code Igniter 4
        
   ### Lainnya
   • Version Control & Collaboration Platform  : Github
   
   • Project Management Tools                  : Trello

## Hasil dan Pembahasan

   ### Use Case Diagram
   
   ![useCase_1](https://user-images.githubusercontent.com/55394766/121964094-33559500-cd95-11eb-9a52-12ba2b4dd111.jpeg)
   
   ![useCase_3](https://user-images.githubusercontent.com/55394766/121967119-fcce4900-cd99-11eb-8631-aff3f63506b9.jpeg)
        
   ### Activity Diagram
   
   #### • Tambah Produk
   
   ![activityDiagramTambahProduk](https://user-images.githubusercontent.com/55394766/121841749-2e4b0400-cd09-11eb-8a73-49f5235f7997.jpeg)
    
   #### • Ubah Profile
   
   ![activityDiagramUbahProfile](https://user-images.githubusercontent.com/55394766/121841754-3014c780-cd09-11eb-88d7-b0021d8909b9.jpeg)
   
   #### • Update Status
   
   ![activityDiagramUpdateStatus](https://user-images.githubusercontent.com/55394766/121841756-30ad5e00-cd09-11eb-9bc5-ee45a523a07e.jpeg)
   
   #### • Hapus Produk
   
   ![activityDiagramHapusProduk](https://user-images.githubusercontent.com/55394766/121841761-32772180-cd09-11eb-946d-9ee15adf9a20.jpeg)
   
   #### • Lihat Detail Produk
   
   ![activityDiagramLihatDetailProduk](https://user-images.githubusercontent.com/55394766/121841764-330fb800-cd09-11eb-9a84-e4beb5db98f1.jpeg)
   
   #### • Lihat Order
   
   ![activityDiagramLihatOrder](https://user-images.githubusercontent.com/55394766/121841765-33a84e80-cd09-11eb-8278-a62c18f6c6ba.jpeg)
   
   #### • Logout
   
   ![activityDiagramLogout](https://user-images.githubusercontent.com/55394766/121841766-3440e500-cd09-11eb-9b66-f22943edd072.jpeg)
   
   #### • Order Produk
   
   ![activityDiagramOrderProduk](https://user-images.githubusercontent.com/55394766/121841767-34d97b80-cd09-11eb-8c7d-c9338cf6a634.jpeg)
   
   ### Class Diagram
   
   ![classDiagram](https://user-images.githubusercontent.com/55394766/121971363-c34e0b80-cda2-11eb-9e77-2fe4bfbbc749.jpeg)
   
   ### Entity Relationship Diagram
   
   ![ERD](https://user-images.githubusercontent.com/55394766/122194466-abb87500-cebf-11eb-9bf9-fd546b8a7d5c.jpeg)
    
   ### Arsitektur Sistem 
   
   ![arsitekturSistem](https://user-images.githubusercontent.com/55394766/121969905-83395980-cd9f-11eb-8a01-189e1f4ff086.jpeg)
   
   ### Fungsi Utama yang Dikembangkan
   Penyewa
   
   • Membuat akun
   
   • Membuat pesanan
   
   • Melihat deskripsi produk
   
   • Melihat deskripsi pesanan
   
   • Update status pemesanan
   
   • Update informasi akun
   
   • Menghapus akun
   
   Rental
   
   • Membuat akun
   
   • Menambahkan produk
   
   • Melihat informasi pesanan
   
   • Update deskripsi produk
   
   • Menghapus akun
   
   • Menghapus produk
   
    
   ### Fungsi CRUD
  
   ![CRUD_1](https://user-images.githubusercontent.com/55394766/121839240-d78efb80-cd03-11eb-8fe3-196ea152273d.png)
   
   ![CRUD_2](https://user-images.githubusercontent.com/55394766/121839248-d958bf00-cd03-11eb-9cda-a3d73d067c0d.png)

## Hasil Implementasi 
   ### Screenshot Sistem
   
  ![landing](https://user-images.githubusercontent.com/55394766/121990082-644ebd80-cdc7-11eb-9879-d70299075641.jpeg)
  
  ![orderSaya](https://user-images.githubusercontent.com/55394766/121990100-6d3f8f00-cdc7-11eb-880b-0dc9d32b6d90.jpeg)
  
  ![order](https://user-images.githubusercontent.com/55394766/121990103-6fa1e900-cdc7-11eb-9676-12b224c319f9.jpeg)
  
  ![infoProduk](https://user-images.githubusercontent.com/55394766/121990117-73ce0680-cdc7-11eb-877b-2e66a904b9a4.jpeg)

   ### Link Aplikasi
   
   http://agrirental.infinityfreeapp.com/

## Testing
   ### Positive Cases
   | No  | Scenario                                      | Steps                                                                    | Hasil yang diharapkan    | Hasil yang didapat       |
   | --- |:---------------------------------------------:| :-----------------------------------------------------------------: | :----------------------: | :----------------------: |
   | 1   | User login dengan akun yang sudah didaftarkan | User mengakses Argirental lalu ke menu masuk dengan input yg benar  | Login akun berhasil      | Login akun berhasil      |
   | 2   | User mendaftar akun sampai berhasil           | User mengakses Agrirental lalu ke menu daftar dengan input yg benar | Daftar akun berhasil     | Daftar akun berhasil     |
   | 3   | Mitra/penyewa menambah barang sampai berhasil | User mengakses menu tambah produk dengan input yg benar             | Menambah barang berhasil | Menambah barang berhasil |
   
   ### Negative Cases
   | No  | Scenario                                      | Steps                                                               | Hasil yang diharapkan    | Hasil yang didapat       |
   | --- |:---------------------------------------------:| :-----------------------------------------------------------------: | :----------------------: | :----------------------: |
   | 1   | User login dengan akun yang sudah didaftarkan | User mengakses Argirental lalu ke menu masuk dengan input yg salah  | Login akun gagal         | Login akun gagal         |
   | 2   | User mendaftar akun sampai berhasil           | User mengakses Agrirental lalu ke menu daftar dengan input yg salah | Daftar akun gagal        | Daftar akun gagal        |  
   | 3   | Mitra/penyewa menambah barang sampai berhasil | User mengakses menu tambah produk dengan input yg salah             | Menambah barang gagal    | Menambah barang gagal    |
   
## Saran
   1. Agrirental diharapkan dapat merambah ke platform lain seperti android dan iOS
   2. Memperbaiki desain Agrirental yang sudah ada agar responsive sehingga mencakup lebih banyak perangkat
   3. Karena Agrirental memakai tema gelap, diharapkan dapat juga dibuat tema terang agar dapat menyesuaikan dengan kemauan pengguna
