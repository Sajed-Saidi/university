<?php
require_once("../../../classes/Rooms.class.php");

$Rooms = new Rooms();

if ($_POST) {
    $rooms_id = $_POST['rooms_id'];

    $delete_result = $Rooms->deleteRoom($rooms_id);
    if ($delete_result == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Rooms Deleted Successfully.',
            'redirect' => 'rooms.php'
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
