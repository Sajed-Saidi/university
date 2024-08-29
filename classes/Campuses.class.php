<?php
require_once('DAL.class.php');

class Campuses extends DAL
{

    public function getAllCampuses()
    {
        $sql = "select * from campuses";
        return $this->getdata($sql);
    }

    public function insertCampus($name, $location)
    {
        $sql = "INSERT INTO campuses (name,location) values ('$name', '$location')";
        return $this->execute($sql);
    }

    public function updateCampus($campuses_id, $name, $location)
    {
        $sql = "UPDATE campuses SET name='$name',location='$location' WHERE campuses_id='$campuses_id'";
        return $this->execute($sql);
    }

    public function deleteCampus($campuses_id)
    {
        $sql = "DELETE FROM campuses WHERE campuses_id='$campuses_id'";
        return $this->execute($sql);
    }

    public function getCampus($name)
    {
        $sql = "SELECT * FROM campuses WHERE name='$name'";
        return $this->getdata($sql);
    }
    public function getCampusbyid($id)
    {
        $sql = "SELECT * FROM campuses WHERE campuses_id='$id'";
        return $this->getdata($sql);
    }

    public function campusExist($name, $campuses_id)
    {
        $sql = "SELECT * FROM campuses WHERE name='$name' AND campuses_id!='$campuses_id'";
        return $this->getdata($sql);
    }
}
