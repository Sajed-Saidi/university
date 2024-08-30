<?php

require_once("../../../classes/Majors.class.php");

$Majors = new Majors();

if ($_POST) {
    $majors_name = $_POST['majors_name'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $credit_price = $_POST['credit_price'];
    $total_credits = $_POST['total_credits'];
    $duration_in_years = $_POST['duration_in_years'];
<<<<<<< HEAD
    $type = $_POST['type'];
    $departments_id = $_POST['departments_id'];
=======
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0

    $exists = $Majors->majorExist($majors_name, $code);
    if ($exists) {
        $response = array(
            'status' => 'error',
<<<<<<< HEAD
            'message' => 'Major or Code Already Exists!'
        );
    } else {
        $result = $Majors->insertMajor($majors_name, $code, $description, $credit_price, $total_credits, $duration_in_years, $type, $departments_id);
=======
            'message' => 'Major ' . $majors_name . ' Already Exists!'
        );
    } else {
        $result = $Majors->insertMajor($majors_name, $code, $description, $credit_price, $total_credits, $duration_in_years);
>>>>>>> fa465d8cf59b97c3aa984a27c0de29ebbbba3aa0

        if ($result) {
            $response = array(
                'status' => 'success',
                'message' => 'Major Added Successfully!',
                'redirect' => 'majors.php'
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
