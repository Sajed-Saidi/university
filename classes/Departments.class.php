<?php
require_once('DAL.class.php');

class Departments extends DAL
{

    public function getAllDepartments()
    {
        $sql = "select departments.*,campuses.name AS campuses_name,users.username as head_name from departments INNER JOIN campuses on departments.campuses_id = campuses.campuses_id inner join staffs on departments.head_id=staffs.staffs_id INNER JOIN users on staffs.users_id=users.users_id ORDER BY departments.departments_id ASC";
        return $this->getdata($sql);
    }

    public function insertDepartment($departments_name, $description, $head_id, $campuses_id)
    {
        $sql = "INSERT INTO departments (departments_name,description,head_id,campuses_id) values ('$departments_name','$description','$head_id','$campuses_id')";
        return $this->execute($sql);
    }

    public function updateDepartment($departments_id, $departments_name, $description, $head_id, $campuses_id)
    {
        $sql = "UPDATE departments SET departments_name='$departments_name',description='$description',head_id='$head_id',campuses_id='$campuses_id' WHERE departments_id='$departments_id'";
        return $this->execute($sql);
    }

    public function deleteDepartment($departments_id)
    {
        $sql = "DELETE FROM departments WHERE departments_id='$departments_id'";
        return $this->execute($sql);
    }

    public function getDepartment($departments_name, $campuses_id)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name' AND campuses_id='$campuses_id'";
        return $this->getdata($sql);
    }


    public function departmentExistsDifferentID($departments_id, $departments_name, $campuses_id)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name' AND campuses_id='$campuses_id' AND departments_id!='$departments_id'";
        return $this->getdata($sql);
    }
}
