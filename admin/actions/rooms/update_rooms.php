<?php

require_once("../../../classes/Rooms.class.php");

$Rooms = new Rooms();

if ($_POST) {
    $rooms_id = $_POST['rooms_id'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $blocks_id = $_POST['blocks_id'];
    $blocks_letter = $_POST['blocks_letter'];

    $name = "$number-$blocks_letter";

    // var_dump($rooms_id, $name, $number, $capacity, $blocks_id);
    // exit;

    $roomResult = $Rooms->roomExistsDifferentID($rooms_id, $number, $blocks_id);
    if ($roomResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Room ' . $name . ' Already Exists!'
        );
    } else {
        $result = $Rooms->updateRoom($rooms_id, $name, $number, 0, $capacity, $blocks_id);

        if ($result == 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Room Updated Successfully!',
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
