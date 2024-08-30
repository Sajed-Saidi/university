<?php

require_once("../../../classes/Books.class.php");

$Books = new Books();

if ($_POST) {
    $books_id = $_POST['books_id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $is_university_owned = isset($_POST['is_university_owned']) ? 1 : 0;
    $copies = $_POST['copies'];
    $price = $_POST['price'];

    $image = $Books->updateImage('../../../assets/images/books/', $_FILES['image'], $_POST['old_image']);

    // var_dump(
    //     $isbn,
    //     $title,
    //     $author,
    //     $category,
    //     $is_university_owned,
    //     $copies,
    //     $price
    // );
    // exit;
    $bookExists = $Books->bookExistDifferentID($books_id, $isbn, $title);
    if ($bookExists) {
        $response = array(
            'status' => 'error',
            'message' => 'The Book Already Exists!'
        );
    } else {
        $result = $Books->updateBook($books_id, $isbn,  $title, $author, $category, $is_university_owned, $copies, $image, $price);

        if ($result == 0) {
            $response = array(
                'status' => 'success',
                'message' => 'Book Added Successfully!',
                'redirect' => 'books.php'
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
