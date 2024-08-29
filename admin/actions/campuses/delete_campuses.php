<?php
require_once("../../../classes/Campuses.class.php");

$Campuses = new Campuses();

if ($_POST) {
    $campuses_id = $_POST['campuses_id'];

    $delete_result = $Campuses->deleteCampus($campuses_id);
    if ($delete_result == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Campuses Deleted Successfully.',
            'redirect' => 'campuses.php'
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
