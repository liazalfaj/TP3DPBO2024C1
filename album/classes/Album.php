<?php

class Album extends DB
{
    function getAlbumJoin()
    {
        $query = "SELECT * FROM album JOIN artis ON album.id_artis = artis.id_artis JOIN label ON album.id_label=label.id_label ORDER BY album.id_album";

        return $this->execute($query);
    }

    function getAlbum()
    {
        $query = "SELECT * FROM album";
        return $this->execute($query);
    }

    function getAlbumById($id)
    {
        $query = "SELECT * FROM album JOIN artis ON album.id_artis = artis.id_artis JOIN label ON album.id_label=label.id_label WHERE id_album=$id";
        return $this->execute($query);
    }

    function searchAlbum($keyword)
	{
		$query = "SELECT * FROM album 
				JOIN artis ON album.id_artis = artis.id_artis
				JOIN label ON album.id_label = label.id_label
				WHERE nama_album LIKE '%$keyword%'
				ORDER BY nama_album";

		return $this->execute($query);
	}

    // Album.php
	function addData($data, $file)
	{
		$nama_album = $data['nama_album'];
		$tahun_rilis = $data['tahun_rilis'];
		$genre_musik = $data['genre_musik'];
		$id_artis = $data['id_artis'];
		$id_label = $data['id_label'];
		$deskripsi_album = $data['deskripsi_album'];

		$target_dir = "assets/images/";
		$sampul_album = basename($file["name"]);
		move_uploaded_file($file["tmp_name"], $sampul_album);

		$query = "INSERT INTO album (nama_album, tahun_rilis, genre_musik, id_artis, id_label, sampul_album, deskripsi_album) VALUES ('$nama_album', '$tahun_rilis', '$genre_musik', '$id_artis', '$id_label', '$sampul_album', '$deskripsi_album')";

		return $this->executeAffected($query);
	}

    function updateData($id, $data, $file)
	{
		$nama_album = $data['nama_album'];
		$tahun_rilis = $data['tahun_rilis'];
		$genre_musik = $data['genre_musik'];
		$id_artis = $data['id_artis'];
		$id_label = $data['id_label'];
		$deskripsi_album = $data['deskripsi_album'];

		$target_dir = "assets/images/";
		$sampul_album = $target_dir . basename($file["name"]);
		move_uploaded_file($file["tmp_name"], $sampul_album);

		$query = "UPDATE album SET nama_album='$nama_album', tahun_rilis='$tahun_rilis', genre_musik='$genre_musik', id_artis='$id_artis', id_label='$id_label', sampul_album='$sampul_album', deskripsi_album='$deskripsi_album' WHERE id_album=$id";

		return $this->executeAffected($query);
	}

    function deleteData($id)
    {
        $query = "DELETE FROM album WHERE id_album=$id";
        return $this->execute($query);
    }
}
