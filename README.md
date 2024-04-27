# TP3DPBO2024C1
## Janji
Saya Amelia Zalfa Julianti dengan NIM 2203999 mengerjakan TP# DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan sesuai dengan apa yang telah dispesifikasikan. Aamiin.
## Desain program
1. **Kelas DB**:
   - Kelas ini bertanggung jawab untuk membuat koneksi ke database dan menjalankan query SQL.
   - Terdapat metode-metode seperti `open()` untuk membuka koneksi, `execute()` untuk menjalankan query, `getResult()` untuk mendapatkan hasil eksekusi query, dan `close()` untuk menutup koneksi.

2. **Kelas Album**:
   - Kelas ini mewakili tabel "album" dalam database.
   - Terdapat metode-metode seperti `getAlbumJoin()` untuk mendapatkan data album beserta data terkait (artis dan label), `getAlbum()` untuk mendapatkan semua data album, `getAlbumById()` untuk mendapatkan data album berdasarkan ID, `searchAlbum()` untuk mencari album berdasarkan kata kunci, `addData()` untuk menambahkan data album baru, `updateData()` untuk memperbarui data album, dan `deleteData()` untuk menghapus data album.

3. **Kelas Artis**:
   - Kelas ini mewakili tabel "artis" dalam database.
   - Terdapat metode-metode seperti `getArtis()` untuk mendapatkan semua data artis, `getArtisById()` untuk mendapatkan data artis berdasarkan ID, `addArtis()` untuk menambahkan data artis baru, `updateArtis()` untuk memperbarui data artis, dan `deleteArtis()` untuk menghapus data artis.

4. **Kelas Label**:
   - Kelas ini mewakili tabel "label" dalam database.
   - Terdapat metode-metode seperti `getLabel()` untuk mendapatkan semua data label, `getLabelById()` untuk mendapatkan data label berdasarkan ID, `addLabel()` untuk menambahkan data label baru, `updateLabel()` untuk memperbarui data label, dan `deleteLabel()` untuk menghapus data label.

5. **Kelas Template**:
   - Kelas ini digunakan untuk membantu dalam menghasilkan tampilan dengan menggunakan template HTML.
   - Terdapat metode-metode seperti `clear()` untuk membersihkan placeholder dalam template, `write()` untuk menampilkan konten template, `getContent()` untuk mendapatkan konten template, dan `replace()` untuk mengganti placeholder dengan nilai yang diinginkan.

6. **File-file PHP**:
   - `detail.php`: File ini menampilkan detail dari sebuah album musik yang dipilih. Kode di dalamnya menggunakan kelas `Album` dan `Template` untuk mendapatkan data album dan menghasilkan tampilan detail.
   - `artis.php`: File ini menampilkan daftar artis dan formulir untuk menambah atau mengubah data artis. Kode di dalamnya menggunakan kelas `Artis` dan `Template` untuk mengelola data artis dan menghasilkan tampilan tabel dan formulir.
   - `label.php`: File ini menampilkan daftar label dan formulir untuk menambah atau mengubah data label. Kode di dalamnya menggunakan kelas `Label` dan `Template` untuk mengelola data label dan menghasilkan tampilan tabel dan formulir.

Alur program secara umum adalah sebagai berikut:

1. Program memuat file-file PHP yang dibutuhkan, termasuk file konfigurasi database dan kelas-kelas yang digunakan.
2. Objek dari kelas yang sesuai (Album, Artis, atau Label) dibuat, dan koneksi ke database dibuka.
3. Tergantung pada permintaan yang diterima (misalnya, menampilkan detail album, menampilkan daftar artis, atau menambah data label), metode yang sesuai dari kelas-kelas tersebut dipanggil untuk mengambil atau memanipulasi data dari database.
4. Data yang diperoleh dari database kemudian dimasukkan ke dalam template HTML dengan menggunakan kelas `Template`.
5. Tampilan akhir (HTML) yang dihasilkan dari template dicetak atau ditampilkan di browser.
6. Jika ada operasi tambah, ubah, atau hapus data, metode yang sesuai dari kelas-kelas tersebut dipanggil untuk memanipulasi data di database.
7. Koneksi ke database ditutup setelah semua operasi selesai.

Secara keseluruhan, desain program ini mengikuti pola Model-View-Controller (MVC) sederhana, di mana kelas-kelas seperti Album, Artis, dan Label mewakili Model (untuk berinteraksi dengan database), sedangkan file-file PHP seperti `detail.php`, `artis.php`, dan `label.php` mewakili Controller (untuk menangani permintaan dan memanggil Model). Kelas `Template` digunakan untuk menghasilkan tampilan (View) dengan menggabungkan data dari Model ke dalam template HTML.
## Dokumentasi

https://github.com/liazalfaj/TP3DPBO2024C1/assets/114666885/ffe9351f-446a-4efd-acc5-f2416539c060


