<?php

require_once("../../../classes/Settings.class.php");

$Settings = new Settings();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings_id = $_POST['settings_id'];
    $university_name = $_POST['university_name'];
    $short_name = $_POST['short_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $instagram = $_POST['instagram'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    // var_dump(
    //     $settings_id,
    //     $university_name,
    //     $short_name,
    //     $email,
    //     $address,
    //     $phone,
    //     $instagram,
    //     $facebook,
    //     $twitter,
    //     $meta_title,
    //     $meta_description,
    //     $meta_keywords
    // );
    $result = $Settings->validatePhoneNumber($phone);
    if ($result === false) {
        $response = array(
            'status' => 'error',
            'message' => 'Phone number not valid.'
        );
    } else {
        $image = $Settings->updateImage('../../../assets/images/', $_FILES['image'], $_POST['old_image']);

        $updateResult = $Settings->updateSettings(
            $settings_id,
            $university_name,
            $short_name,
            $email,
            $address,
            $phone,
            $image,
            $instagram,
            $facebook,
            $twitter,
            $meta_title,
            $meta_description,
            $meta_keywords
        );
        if ($updateResult == 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Settings updated successfully.',
                'redirect' => 'settings.php'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => "Something went wrong",
            );
        }
    }

    header('Content-Type: application/json'); // Set the Content-Type header
    echo json_encode($response);
}
