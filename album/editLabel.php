<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Label.php');
include('classes/Template.php');

$label = new Label($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$label->open();
$labelData = $label->getLabel();

$data = [];
if (isset($_POST['btn-simpan'])) {
    $data = [
        'nama_label' => $_POST['nama_label'],
    ];
	$result = $label->updateLabel($data);
    if ($result > 0) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'label.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
            document.location.href = 'label.php';
        </script>";
    }
}

$detail = new Template('templates/skinform.html');
$detail->replace('DATA_TYPE', 'Label');
$detail->replace('DATA_BUTTON', 'UBAH');
$detail->write();
?>
