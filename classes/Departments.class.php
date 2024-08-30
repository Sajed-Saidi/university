<?php
require_once('DAL.class.php');

class Departments extends DAL
{

    public function getAllDepartments()
    {
<<<<<<< HEAD
        $sql = "select departments.*,users.username as head_name from departments inner join staffs on departments.head_id=staffs.staffs_id INNER JOIN users on staffs.users_id=users.users_id ORDER BY departments.departments_id ASC";
        return $this->getdata($sql);
    }

    public function insertDepartment($departments_name, $description, $head_id)
    {
        $sql = "INSERT INTO departments (departments_name,description,head_id) values ('$departments_name','$description','$head_id')";
        return $this->execute($sql);
    }

    public function updateDepartment($departments_id, $departments_name, $description, $head_id)
    {
        $sql = "UPDATE departments SET departments_name='$departments_name',description='$description',head_id='$head_id' WHERE departments_id='$departments_id'";
=======
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
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0
        return $this->execute($sql);
    }

    public function deleteDepartment($departments_id)
    {
        $sql = "DELETE FROM departments WHERE departments_id='$departments_id'";
        return $this->execute($sql);
    }

<<<<<<< HEAD
    public function getDepartment($departments_name)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name'";
=======
    public function getDepartment($departments_name, $campuses_id)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name' AND campuses_id='$campuses_id'";
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0
        return $this->getdata($sql);
    }


<<<<<<< HEAD
    public function departmentExistsDifferentID($departments_id, $departments_name)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name' AND departments_id!='$departments_id'";
=======
    public function departmentExistsDifferentID($departments_id, $departments_name, $campuses_id)
    {
        $sql = "SELECT * FROM departments WHERE departments_name='$departments_name' AND campuses_id='$campuses_id' AND departments_id!='$departments_id'";
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0
        return $this->getdata($sql);
    }
}
