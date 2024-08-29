<?php

require_once("../../../classes/Rooms.class.php");

$Rooms = new Rooms();

if ($_POST) {
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $blocks_id = $_POST['blocks_id'];
    $blocks_letter = $_POST['blocks_letter'];

    $name = "$number-$blocks_letter";

    // var_dump($name, $number, $capacity, $blocks_id);
    // exit;

    $roomResult = $Rooms->roomExists($number, $blocks_id);
    if ($roomResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Room ' . $name . ' Already Exists!'
        );
    } else {
        $result = $Rooms->insertRoom($name, $number, 0, $capacity, $blocks_id);

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Room Added Successfully!',
                'redirect' => 'rooms.php'
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
