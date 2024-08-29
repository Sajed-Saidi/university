<?php

require_once("../../../classes/Campuses.class.php");

$Campuses = new Campuses();

if ($_POST) {
    $campuses_id = $_POST['campuses_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    // var_dump($campuses_id, $name, $location);
    // exit;
    $campusResult = $Campuses->campusExist($name, $campuses_id);
    if ($campusResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Name of Campus ' . $name . ' Already Exists!'
        );
    } else {
        $result = $Campuses->updateCampus($campuses_id, $name, $location);

        if ($result == 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Campus Updated Successfully!',
                'redirect' => 'campuses.php'
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
