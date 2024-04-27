<?php

class Artis extends DB
{
    function getArtis()
    {
        $query = "SELECT * FROM artis";
        return $this->execute($query);
    }

    function getArtisById($id)
    {
        $query = "SELECT * FROM artis WHERE id_artis = $id";
        return $this->execute($query);
    }

    function addArtis($data)
    {
        $nama_artis = $data['nama_artis'];
        $query = "INSERT INTO artis (nama_artis) VALUES ('$nama_artis')";
        return $this->executeAffected($query);
    }

    function updateArtis($id, $data)
    {
        // ...
    }

    function deleteArtis($id)
    {
        $query = "DELETE FROM artis WHERE id_artis=$id";
        return $this->execute($query);
    }
}
