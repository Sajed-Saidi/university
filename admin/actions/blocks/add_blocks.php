<?php

require_once("../../../classes/Blocks.class.php");

$Blocks = new Blocks();

if ($_POST) {
    $blocks_letter = $_POST['blocks_letter'];
    $departments_id = $_POST['departments_id'];
<<<<<<< HEAD
    $campuses_id = $_POST['campuses_id'];
=======
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0

    // var_dump($blocks_letter, $departments_id);
    // exit;

<<<<<<< HEAD
    $blockResult = $Blocks->blockExists($blocks_letter, $campuses_id);
    if ($blockResult) {
        $response = array(
            'status' => 'error',
            'message' => 'The Block ' . $blocks_letter . ' Already Exists There!'
        );
    } else {
        $departmentExists = $Blocks->departmentExists($departments_id, $campuses_id);

        if ($departmentExists) {
            $response = array(
                'status' => 'error',
                'message' => 'The Department Already Exists There!'
            );
        } else {
            $result = $Blocks->insertBlock($blocks_letter, $departments_id, $campuses_id);

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
=======
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
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0
        }
    }

    header('Content-Type: application/json'); // Set the Content-Type header
    echo json_encode($response); // Output the JSON response
}
