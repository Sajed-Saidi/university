<?php
require_once("../../../classes/Blocks.class.php");

$Blocks = new Blocks();

if ($_POST) {
    $blocks_id = $_POST['blocks_id'];

    $delete_result = $Blocks->deleteBlock($blocks_id);
    if ($delete_result == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Blocks Deleted Successfully.',
            'redirect' => 'blocks.php'
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
