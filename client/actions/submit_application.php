<?php
require_once('../../classes/Applications.class.php'); // Ensure you include the Applications class

$applicationTypesId = 1; // Assuming this is the ID for the application type

// Set the content type to JSON
header('Content-Type: application/json');

// Initialize an array to hold response data
$response = array();

// Check if the form data is received via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $status = 'pending';
    $highschool = isset($_POST['highschool']) ? $_POST['highschool'] : '';
    $avg = isset($_POST['avg']) ? $_POST['avg'] : '';
    $major = isset($_POST['major']) ? $_POST['major'] : '';
    $university = isset($_POST['university']) ? $_POST['university'] : '';
    $current_major = isset($_POST['current-major']) ? $_POST['current-major'] : '';
    $current_gpa = isset($_POST['current-gpa']) ? $_POST['current-gpa'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Determine education level and details based on the status
    if ($highschool==null) {
        $education_level = "University: " . $university;
        $education_details = "Major: " . $current_major . ", GPA: " . $current_gpa;
    } elseif ($university==null) {
        $education_level = "High School: " . $highschool;
        $education_details = "Official Average: " . $avg;
    }
    // Create an instance of the Applications class
    $applications = new Applications();

    // Insert the data into the database
    $insertSuccess = $applications->insertApplications(
        $status,
        $fname,
        $lname,
        $phone,
        $email,
        $dob,
        $gender,
        $address,
        $education_level,
        $education_details,
        $applicationTypesId
    );

    // Check if the insertion was successful
    if ($insertSuccess) {
        $response['status'] = 'success';
        $response['message'] = 'Form submitted successfully.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Failed to submit the form.';
    }
} else {
    // Handle the case where the request method is not POST
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Send the JSON response back to the client
echo json_encode($response);
?>
