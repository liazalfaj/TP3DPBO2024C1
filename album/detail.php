<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Label.php');
include('classes/Artis.php');
include('classes/Album.php');
include('classes/Template.php');

$album = new Album($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$album->open();

$data = nulL;
$alb = $album->getAlbum();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $album->getAlbumById($id);
        $row = $album->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_album'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['sampul_album'] . '" class="img-thumbnail" alt="' . $row['sampul_album'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_album'] . '</td>
                                </tr>
                                <tr>
                                    <td>Artis</td>
                                    <td>:</td>
                                    <td>' . $row['nama_artis'] . '</td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>:</td>
                                    <td>' . $row['genre_musik'] . '</td>
                                </tr>
                                <tr>
                                    <td>Label</td>
                                    <td>:</td>
                                    <td>' . $row['nama_label'] . '</td>
                                </tr>
                                <tr>
                                    <td>Tahun Rilis</td>
                                    <td>:</td>
                                    <td>' . $row['tahun_rilis'] . '</td>
                                </tr>
								<tr>
                                    <td>Deskripsi Album</td>
                                    <td>:</td>
                                    <td>' . $row['deskripsi_album'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="#"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="detail.php?hapus=' . $row['id_album'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($album->deleteData($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}

$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_ALBUM', $data);
$detail->write();
