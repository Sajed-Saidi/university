<?php

require_once("../../../classes/Campuses.class.php");

$Campuses = new Campuses();

if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $campusResult = $Campuses->getCampus($name);
    if ($campusResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Name of Campus ' . $name . ' Already Exists!'
        );
    } else {
        $result = $Campuses->insertCampus($name, $location);

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Campus Added Successfully!',
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
