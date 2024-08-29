<?php
require_once('DAL.class.php');

class Blocks extends DAL
{

    public function getAllBlocks()
    {
        $sql = "select blocks.*,departments.departments_name as departments_name,campuses.name as campuses_name from blocks inner join departments on blocks.departments_id=departments.departments_id inner join campuses on departments.campuses_id=campuses.campuses_id";
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
