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
| ----------------------- |:---------:| :-----------------:|
| Ahmad Hadryan Mora      | G64190001 | Backend Developer  |
| Rafida Nisa Maghfiroh   | G64190038 | UI/UX Designer     |
| Faris Ilham Noormandiri | G64190051 | Frontend Developer |
| Antonius Anre Sianturi  | G64190053 | Project Manager    |
   
## Deskripsi Singkat
   Agrirental adalah aplikasi berbasis web yang menjadi tempat transaksi antara individu yang memiliki mobil sebagai aset untuk disewakan dan orang-orang yang sedang     membutuhkan mobil di suatu tempat tertentu. Terdapat beberapa fitur dalam kemudahan penyewaan mobil antara lain, fitur booking, deskripsi mobil beserta perjalanan hidupnya, pantau ketersediaan mobil, dan fitur review/rate/komentar.
    
## User Analysis

   1. Sebagai pengguna produk terdaftar, saya ingin mendapatkan peminjaman mobil yang berada di sekitar saya agar saya dapat dengan cepat menjangkau dan mendapatkan sewaan mobil.
    
   2. Sebagai pengguna produk terdaftar, saya ingin mendapatkan mobil rental yang terbaik agar saya tidak perlu repot-repot mencari dari list yang ada.
    
   3. Sebagai pengguna yang telah logout, agar dapat menggunakan aplikasi secara personal, saya dapat mengetikkan alamat email dan kata sandi saya untuk masuk ke aplikasi.
    
   4. Sebagai pengguna yang menawarkan rental mobil, saya ingin orang-orang memberi komentar terhadap rental yang saya berikan agar semakin banyak orang yang percaya dengan rental saya.
    
   5. Mobil saya jarang saya pakai dan hanya sekedar dipanaskan di garasi, untuk itu saya ingin merentalkan mobil saya namun dengan sistem pembayaran dengan jelas.
    
   6. Sebagai pengguna produk terdaftar, agar dapat mencari rental mobil terdekat/ sesuai lokasi saya, saya dapat memasukkan lokasi saya di menu ‘cari lokasi’.
    
   7. Sebagai pengguna produk terdaftar, agar dapat mengetahui cara/langkah-langkah menyewa mobil di aplikasi ini, saya dapat membacanya di menu ‘bantuan’.
    
   8. Sebagai pengguna yang belum terdaftar(?), agar dapat menggunakan aplikasi secara maksimal, saya dapat mengisi data untuk daftar ke aplikasi.
    
   9. Sebagai pengguna produk terdaftar, agar saya bisa membandingkan pilihan satu dengan yang lainnya dengan mudah tanpa perlu mencari ulang dari awal, saya dapat menyimpan pilihan saya dengan menggunakan fitur simpan.
    
   10. Sebagai pengguna produk terdaftar, agar dapat melihat pilihan yang sudah saya simpan, saya dapat melihatnya di menu ‘keranjang’.
    
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
   
   ![useCase_2](https://user-images.githubusercontent.com/55394766/121964110-394b7600-cd95-11eb-9901-9a46650f2122.jpeg)
        
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
   
   #### • ORder Produk
   ![activityDiagramOrderProduk](https://user-images.githubusercontent.com/55394766/121841767-34d97b80-cd09-11eb-8c7d-c9338cf6a634.jpeg)
   
   ### Class Diagram
   
   ### Entity Relationship Diagram
   
   ![ERD_2](https://user-images.githubusercontent.com/55394766/121966663-394d7500-cd99-11eb-9360-02a6b683caeb.jpeg)
    
   ### Arsitektur Sistem 
    
   ### Fungsi Utama yang Dikembangkan
   • Pengguna dapat membuat akun
   
   • Pengguna (penyewa) dapat menyewakan kendaraannya di agrirental serta dapat mengubah informasi sewaktu-waktu tentang kendaraanna yang disewakan
   
   • Status barang yang disewakan dipegang penuh oleh penyewa 
   
   • Pengguna (pelanggan) dapat mencari kendaraan yang diinginkan dengan kolom search bar
   
    
   ### Fungsi CRUD
  
   ![CRUD_1](https://user-images.githubusercontent.com/55394766/121839240-d78efb80-cd03-11eb-8fe3-196ea152273d.png)
   
   ![CRUD_2](https://user-images.githubusercontent.com/55394766/121839248-d958bf00-cd03-11eb-9cda-a3d73d067c0d.png)

## Hasil Implementasi 
   ### Screenshot Sistem
    
   ### Link Aplikasi (klo dah deploy)

## Testing
   ### Positive Cases
   
   ### Negative Cases (jika ada)
    
## Saran untuk Pengembangan Selanjutnya :

    
