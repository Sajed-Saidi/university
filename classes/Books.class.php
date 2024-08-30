<?php
require_once('DAL.class.php');

class Books extends DAL
{
    public function getAllBooks()
    {
        $sql = "select * from books";
        return $this->getdata($sql);
    }

    public function insertBook($isbn,  $title, $author, $category, $is_university_owned, $copies, $image, $price)
    {
        $sql = "INSERT INTO books (isbn,  title ,author, category, is_university_owned, copies, image, price) values ('$isbn',  '$title' ,'$author', '$category', '$is_university_owned', '$copies', '$image', '$price')";
        return $this->execute($sql);
    }

    public function updateBook($books_id, $isbn,  $title, $author, $category, $is_university_owned, $copies, $image, $price)
    {
        $sql = "UPDATE books SET isbn='$isbn',  title='$title' ,author='$author', category='$category', is_university_owned='$is_university_owned', copies='$copies', image='$image', price='$price' WHERE books_id='$books_id'";
        return $this->execute($sql);
    }

    public function deleteBook($books_id)
    {
        $sql = "DELETE FROM books WHERE books_id='$books_id'";
        return $this->execute($sql);
    }

    public function bookExist($isbn, $title)
    {
        $sql = "SELECT * FROM books WHERE title='$title' OR isbn='$isbn'";
        return $this->getdata($sql);
    }
    public function getBookbyid($id)
    {
        $sql = "SELECT * FROM books WHERE books_id='$id'";
        return $this->getdata($sql);
    }

    public function bookExistDifferentID($books_id, $isbn, $title)
    {
        $sql = "SELECT * FROM books WHERE (isbn='$isbn' OR title='$title') AND books_id!='$books_id'";
        return $this->getdata($sql);
    }
}
