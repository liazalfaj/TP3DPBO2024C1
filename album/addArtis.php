<?php
include('config/db.php');
include('classes/DB.php');
include('classes/Artis.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_artis'])) {
    $data = [
        'nama_artis' => $_POST['nama_artis'],
    ];
    $result = $artis->addArtis($data);
    if ($result > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'artis.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'artis.php';
        </script>";
    }
}

$detail = new Template('templates/skinform.html');
$detail->replace('DATA_TYPE', 'Artis');
$detail->replace('DATA_BUTTON', 'TAMBAH');
$detail->replace('FORM_TYPE', 'nama_artis');
$detail->replace('FORM_ACT', 'addArtis.php');
$detail->write();
?>
