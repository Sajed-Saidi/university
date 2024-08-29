<?php
require_once('DAL.class.php');

class Staffs extends DAL
{

    public function getAllStaffs()
    {
        $sql = "SELECT * FROM staffs INNER JOIN users ON staffs.users_id=users.users_id";
        return $this->getdata($sql);
    }

    public function insertBlock($blocks_letter, $departments_id)
    {
        $sql = "INSERT INTO blocks (blocks_letter,departments_id) values ('$blocks_letter','$departments_id')";
        return $this->execute($sql);
    }

    public function updateBlock($blocks_id, $blocks_letter, $departments_id)
    {
        $sql = "UPDATE blocks SET blocks_letter='$blocks_letter',departments_id='$departments_id' WHERE blocks_id='$blocks_id'";
        return $this->execute($sql);
    }

    public function deleteBlock($blocks_id)
    {
        $sql = "DELETE FROM blocks WHERE blocks_id='$blocks_id'";
        return $this->execute($sql);
    }

    public function blockExists($blocks_letter, $departments_id)
    {
        $sql = "SELECT * FROM blocks WHERE blocks_letter='$blocks_letter' AND departments_id='$departments_id'";
        return $this->getdata($sql);
    }

    public function blockExistsDifferentID($blocks_id, $blocks_letter, $departments_id)
    {
        $sql = "SELECT * FROM blocks WHERE blocks_letter='$blocks_letter' AND departments_id='$departments_id' AND blocks_id!='$blocks_id'";
        return $this->getdata($sql);
    }
}
