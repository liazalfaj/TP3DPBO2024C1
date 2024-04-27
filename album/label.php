<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Label.php');
include('classes/Template.php');

$label = new Label($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$label->open();
$label->getLabel();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($divisi->addLabel($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'divisi.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'divisi.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Label';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Label</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'label';

while ($lab = $label->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $lab['nama_label'] . '</td>
    <td style="font-size: 22px;">
        <a href="label.php?id=' . $lab['id_label'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="label.php?hapus=' . $lab['id_label'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($label->updateLabel($id, $_POST) > 0) {
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

        $label->getLabelById($id);
        $row = $label->getResult();

        $dataUpdate = $row['nama_label'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($label->deleteLabel($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'label.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'label.php';
            </script>";
        }
    }
}

$label->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->replace('DATA_LINK', 'addLabel.php');
$view->write();
