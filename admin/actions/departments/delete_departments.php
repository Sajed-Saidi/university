<?php
require_once("../../../classes/Departments.class.php");

$Departments = new Departments();

if ($_POST) {
    $departments_id = $_POST['departments_id'];

    $delete_result = $Departments->deleteDepartment($departments_id);
    if ($delete_result == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Departments Deleted Successfully.',
            'redirect' => 'departments.php'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Something Went Wrong...'
        );
    }

    header('Content-Type: application/json'); // Set the Content-Type header
    echo json_encode($response); // Output the JSON response
}
