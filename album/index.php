<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Album.php');
include('classes/Label.php');
include('classes/Artis.php');
include('classes/Template.php');

// buat instance album
$listAlbum = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listAlbum->open();
// tampilkan data album
// cari Album
if (isset($_GET['cari'])) {
    // methode mencari data Album
    $keyword = $_GET['cari'];
    $listAlbum->searchAlbum($keyword);
} else {
    // method menampilkan data Album
    $listAlbum->getAlbumJoin();
}

// cari Album
if (isset($_POST['btn-cari'])) {
    // methode mencari data Album
    $listAlbum->searchAlbum($_POST['cari']);
} else {
    // method menampilkan data Album
    $listAlbum->getAlbumJoin();
}

$data = null;

// ambil data album
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listAlbum->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 album-thumbnail">
        <a href="detail.php?id=' . $row['id_album'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['sampul_album'] . '" class="card-img-top" alt="' . $row['sampul_album'] . '">
            </div>
            <div class="card-body">
                <p class="card-text nama-album my-0">' . $row['nama_album'] . '</p>
                <p class="card-text nama-artis">' . $row['nama_artis'] . '</p>
                <p class="card-text tahun-rilis my-0">' . $row['tahun_rilis'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listAlbum->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_ALBUM', $data);
$home->write();
