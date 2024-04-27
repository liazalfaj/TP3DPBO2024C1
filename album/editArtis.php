<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Artis.php');
include('classes/Template.php');

$artis = new Artis($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$artis->open();
$artisData = $artis->getArtis();

$data = [];
if (isset($_POST['btn-simpan'])) {
    $data = [
        'nama' => $_POST['nama'],
    ];
	$result = $artis->updateArtis($data);
    if ($result > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'artis.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'artis.php';
        </script>";
    }
}

$detail = new Template('templates/skinform.html');
$detail->replace('DATA_TYPE', 'Artis');
$detail->replace('DATA_BUTTON', 'UBAH');
$detail->write();
?>
