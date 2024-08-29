<?php
require_once("../../../classes/Majors.class.php");

$Majors = new Majors();

if ($_POST) {
    $majors_id = $_POST['majors_id'];

    $delete_result = $Majors->deleteMajor($majors_id);
    if ($delete_result == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Majors Deleted Successfully.',
            'redirect' => 'majors.php'
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
