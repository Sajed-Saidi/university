<?php
require_once("../../../classes/Books.class.php");

$Books = new Books();

if ($_POST) {
    $books_id = $_POST['books_id'];
    $image = $_POST['image'];

    $delete_result = $Books->deleteBook($books_id);
    if ($delete_result == 0) {
        $path = "../../../assets/images/books/";
        if (file_exists($path . $image)) {
            unlink($path . $image);
        }

        $response = array(
            'status' => 'success',
            'message' => 'Books Deleted Successfully.',
            'redirect' => 'books.php'
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
