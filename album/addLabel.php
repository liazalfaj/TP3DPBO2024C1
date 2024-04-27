<?php
include('config/db.php');
include('classes/DB.php');
include('classes/Label.php');
include('classes/Template.php');

$label = new Label($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$label->open();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_label'])) {
    $data = [
        'nama_label' => $_POST['nama_label'],
    ];
    $result = $label->addLabel($data);
    if ($result > 0) {
        echo "<script>
            alert('Data berhasil ditambah!');
            document.location.href = 'label.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambah!');
            document.location.href = 'label.php';
        </script>";
    }
}

$detail = new Template('templates/skinform.html');
$detail->replace('DATA_TYPE', 'Label');
$detail->replace('DATA_BUTTON', 'TAMBAH');
$detail->replace('FORM_TYPE', 'nama_label');
$detail->replace('FORM_ACT', 'addLabel.php');
$detail->write();
?>
