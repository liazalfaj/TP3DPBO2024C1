<?php

class Label extends DB
{
    function getLabel()
    {
        $query = "SELECT * FROM label";
        return $this->execute($query);
    }

    function getLabelById($id)
    {
        $query = "SELECT * FROM label WHERE id_label=$id";
        return $this->execute($query);
    }

    function addLabel($data)
    {
        $nama_label = $data['nama_label'];
        $query = "INSERT INTO label (nama_label) VALUES ('$nama_label')";
        return $this->executeAffected($query);
    }

    function updateLabel($id, $data)
    {
        // ...
    }

    function deleteLabel($id)
    {
        $query = "DELETE FROM label WHERE id_label=$id";
        return $this->execute($query);
    }
}
