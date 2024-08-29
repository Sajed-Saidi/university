<?php

require_once("../../../classes/Blocks.class.php");

$Blocks = new Blocks();

if ($_POST) {
    $blocks_letter = $_POST['blocks_letter'];
    $departments_id = $_POST['departments_id'];

    // var_dump($blocks_letter, $departments_id);
    // exit;

    $blockResult = $Blocks->blockExists($blocks_letter, $departments_id);
    if ($blockResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Block ' . $blocks_letter . ' In Department ' . $departments_id . ' Already Exists!'
        );
    } else {
        $result = $Blocks->insertBlock($blocks_letter, $departments_id);

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Block Added Successfully!',
                'redirect' => 'blocks.php'
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
