<?php

require_once("../../../classes/Departments.class.php");

$Departments = new Departments();

if ($_POST) {
    $departments_name = $_POST['departments_name'];
    $description = $_POST['description'];
    $head_id = $_POST['head_id'];
<<<<<<< HEAD
=======
    $campuses_id = $_POST['campuses_id'];
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0

    // var_dump($departments_name, $description, $head_id, $campuses_id);
    // exit;

<<<<<<< HEAD
    $departmentResult = $Departments->getDepartment($departments_name);
=======
    $departmentResult = $Departments->getDepartment($departments_name, $campuses_id);
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0
    if ($departmentResult) {
        $response = array(
            'status' => 'error',
            'message' => $departments_name . ' Already Exists In This Campus!'
        );
    } else {
<<<<<<< HEAD
        $result = $Departments->insertDepartment($departments_name, $description, $head_id);
=======
        $result = $Departments->insertDepartment($departments_name, $description, $head_id, $campuses_id);
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Department Added Successfully!',
                'redirect' => 'departments.php'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Something Happenned!',
            );
        }
    }

    header('Content-Type: application/json'); // Set the Content-Type header
    echo json_encode($response); // Output the JSON response
}
