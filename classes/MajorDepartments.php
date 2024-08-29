<?php
require_once('DAL.class.php');

class MajorDepartments extends DAL
{

    public function getAllMajorDepartments()
    {
        $sql = "select * from major_departments";
        return $this->getdata($sql);
    }

    public function insertMajor($majors_id, $departments_id)
    {
        $sql = "INSERT INTO major_departments (majors_id,departments_id) values ('$majors_id','$departments_id')";
        return $this->execute($sql);
    }

    public function updateMajor($major_departments_id, $majors_id, $departments_id)
    {
        $sql = "UPDATE major_departments SET  WHERE majors_id='$majors_id'";
        return $this->execute($sql);
    }

    public function deleteMajor($majors_id)
    {
        $sql = "DELETE FROM major_departments WHERE majors_id='$majors_id'";
        return $this->execute($sql);
    }

    public function getMajor($name)
    {
        $sql = "SELECT * FROM major_departments WHERE name='$name'";
        return $this->getdata($sql);
    }
    public function getMajorByid($majors_id)
    {
        $sql = "SELECT * FROM major_departments WHERE majors_id='$majors_id'";
        return $this->getdata($sql);
    }

    public function majorExist($majors_name, $code)
    {
        $sql = "SELECT * FROM major_departments WHERE majors_name='$majors_name' OR code='$code'";
        return $this->getdata($sql);
    }

    public function majorExistDifferentID($majors_id, $majors_name, $code)
    {
        $sql = "SELECT * FROM major_departments WHERE (majors_name='$majors_name' OR code='$code') AND majors_id!='$majors_id'";
        return $this->getdata($sql);
    }
}
