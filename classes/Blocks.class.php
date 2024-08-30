<?php
require_once('DAL.class.php');

class Blocks extends DAL
{

    public function getAllBlocks()
    {
        $sql = "select blocks.*,departments.departments_name,campuses.name as campuses_name,campuses.campuses_id  from blocks inner join departments on blocks.departments_id=departments.departments_id inner join campuses on blocks.campuses_id=campuses.campuses_id";
        return $this->getdata($sql);
    }

    public function insertBlock($blocks_letter, $departments_id, $campuses_id)
    {
        $sql = "INSERT INTO blocks (blocks_letter,departments_id,campuses_id) values ('$blocks_letter','$departments_id','$campuses_id')";
        return $this->execute($sql);
    }

    public function updateBlock($blocks_id, $blocks_letter, $departments_id, $campuses_id)
    {
        $sql = "UPDATE blocks SET blocks_letter='$blocks_letter',departments_id='$departments_id',campuses_id='$campuses_id' WHERE blocks_id='$blocks_id'";
        return $this->execute($sql);
    }

    public function deleteBlock($blocks_id)
    {
        $sql = "DELETE FROM blocks WHERE blocks_id='$blocks_id'";
        return $this->execute($sql);
    }

    public function blockExists($blocks_letter, $campuses_id)
    {
        $sql = "SELECT * FROM blocks WHERE blocks_letter='$blocks_letter' AND campuses_id='$campuses_id'";
        return $this->getdata($sql);
    }

    public function departmentExists($departments_id, $campuses_id)
    {
        $sql = "SELECT * FROM blocks WHERE departments_id='$departments_id' AND campuses_id='$campuses_id'";
        return $this->getdata($sql);
    }

    public function blockExistsDifferentID($blocks_id, $blocks_letter, $campuses_id)
    {
        $sql = "SELECT * FROM blocks WHERE blocks_letter='$blocks_letter' AND campuses_id='$campuses_id' AND blocks_id!='$blocks_id'";
        return $this->getdata($sql);
    }

    public function departmentExistsDifferentID($blocks_id, $departments_id, $campuses_id)
    {
        $sql = "SELECT * FROM blocks WHERE departments_id='$departments_id' AND campuses_id='$campuses_id' AND blocks_id!='$blocks_id'";
        return $this->getdata($sql);
    }
}
