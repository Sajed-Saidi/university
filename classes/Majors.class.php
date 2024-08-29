<?php
require_once('DAL.class.php');

class Majors extends DAL
{

    public function getAllMajors()
    {
        $sql = "select * from majors";
        return $this->getdata($sql);
    }

    public function insertMajor($majors_name, $code, $description, $credit_price, $total_credits, $duration_in_years)
    {
        $sql = "INSERT INTO majors (majors_name,code,description,credit_price,total_credits,duration_in_years) values ('$majors_name', '$code', '$description' ,'$credit_price' ,'$total_credits', '$duration_in_years')";
        return $this->execute($sql);
    }

    public function updateMajor($majors_id, $majors_name, $code, $description, $credit_price, $total_credits, $duration_in_years)
    {
        $sql = "UPDATE majors SET majors_name='$majors_name', code='$code', description='$description' ,credit_price='$credit_price' ,total_credits='$total_credits', duration_in_years='$duration_in_years' WHERE majors_id='$majors_id'";
        return $this->execute($sql);
    }

    public function deleteMajor($majors_id)
    {
        $sql = "DELETE FROM majors WHERE majors_id='$majors_id'";
        return $this->execute($sql);
    }

    public function getMajor($name)
    {
        $sql = "SELECT * FROM majors WHERE name='$name'";
        return $this->getdata($sql);
    }
    public function getMajorByid($majors_id)
    {
        $sql = "SELECT * FROM majors WHERE majors_id='$majors_id'";
        return $this->getdata($sql);
    }

    public function majorExist($majors_name, $code)
    {
        $sql = "SELECT * FROM majors WHERE majors_name='$majors_name' OR code='$code'";
        return $this->getdata($sql);
    }

    public function majorExistDifferentID($majors_id, $majors_name, $code)
    {
        $sql = "SELECT * FROM majors WHERE (majors_name='$majors_name' OR code='$code') AND majors_id!='$majors_id'";
        return $this->getdata($sql);
    }
}
