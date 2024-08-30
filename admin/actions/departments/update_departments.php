<?php

require_once("../../../classes/Departments.class.php");

$Departments = new Departments();

if ($_POST) {
    $departments_id = $_POST['departments_id'];
    $departments_name = $_POST['departments_name'];
    $description = $_POST['description'];
    $head_id = $_POST['head_id'];

    // var_dump($departments_name, $departments_id, $description, $head_id, $campuses_id);
    // exit;

    $departmentResult = $Departments->departmentExistsDifferentID($departments_id, $departments_name);
    if ($departmentResult) {
        $response = array(
            'status' => 'error',
            'message' => $departments_name . ' Already Exists In This Campus!'
        );
    } else {
        $result = $Departments->updateDepartment($departments_id, $departments_name, $description, $head_id);

        if ($result == 0) {
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
