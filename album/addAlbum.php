<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Label.php');
include('classes/Artis.php');
include('classes/Album.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();
$artisData = $artis->getArtis();

$label = new Label($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$label->open();
$labelData = $label->getLabel();

$album = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$album->open();

$data = [];
// addAlbum.php
if (isset($_POST['nama_album'])) {
    $data = [
        'nama_album' => $_POST['nama_album'],
        'tahun_rilis' => $_POST['tahun_rilis'],
        'genre_musik' => $_POST['genre_musik'],
        'id_artis' => $_POST['id_artis'],
        'id_label' => $_POST['id_label'],
        'deskripsi_album' => $_POST['deskripsi_album'],
    ];

    $file = $_FILES['sampul_album'];
    $result = $album->addData($data, $file);

    if ($result > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'index.php';
        </script>";
    }
}

$labelQuery = $label->getLabel();
$labelData = '';
while ($lab = $label->getResult()) {
    $labelData .= '<option value="' . $lab['id_label'] . '">' . $lab['nama_label'] . '</option>';
}

$artisQuery = $artis->getArtis();
$artisData = '';
while ($art = $artis->getResult()) {
    $artisData .= '<option value="' . $art['id_artis'] . '">' . $art['nama_artis'] . '</option>';
}

$detail = new Template('templates/skinformalbum.html');
$detail->replace('DATA_LABEL', $labelData);
$detail->replace('DATA_ARTIS', $artisData);
$detail->replace('DATA_BUTTON', 'Tambah');
$detail->replace('FORM_ACTION', 'addAlbum.php');
$detail->write();
?>
