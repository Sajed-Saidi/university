<?php

class DAL
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "ecommerce lvl 3";

    public function getdata($sql)
    {
        // Establish a connection to the database
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            // Throw an exception if there is a connection error
            throw new Exception($conn->connect_error);
        } else {
            // Execute the SQL query
            $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result) {
                // Throw an exception if there is an error with the query
                throw new Exception($conn->error);
            } else {
                // Fetch all results as an associative array
                $results = $result->fetch_all(MYSQLI_ASSOC);
                // Return the results
                return $results;
            }
        }
    }

    public function execute($sql)
    {
        // Establish a connection to the database
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            // Throw an exception if there is a connection error
            throw new Exception($conn->connect_error);
        } else {
            // Execute the SQL query
            $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result) {
                // Throw an exception if there is an error with the query
                throw new Exception($conn->error);
                exit; // This exit is redundant because the exception will halt execution
            } else {
                // Return the ID of the last inserted row
                return $conn->insert_id;
            }
        }
    }

    public function movemultiplefiles($image, $i, $path)
    {
        $target_dir = $path;
        $target_file = $target_dir . basename($image["name"][$i]); //p1.png
        // var_dump($target_file);exit;
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //png
        // var_dump($extension);exit;
        $img_name = str_replace("." . $extension, "", basename($image["name"][$i])); //p1
        // var_dump($img_name);exit;
        $count = 0;
        $image_name = $image["name"][$i];
        while (file_exists($target_file)) {
            $new_image = $img_name . "-" . $count . "." . $extension; //p1-0.png
            $image_name = $new_image;
            $target_file = $target_dir . $new_image; //uploads/p1-0.png

            $count++;
        }
        $res = move_uploaded_file($image["tmp_name"][$i], $target_file);
        return $image_name;
    }

    public function moveImage($path, $fileImage)
    {
        // Move the file and insert into the database
        $image = $fileImage['name'];

        // var_dump($extension);exit;
        $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION)); //png
        $img_name = str_replace("." . $image_ext, "", basename($image)); //p1
        $file_name = $img_name . time() . '.' . $image_ext;

        move_uploaded_file($fileImage['tmp_name'], $path . $file_name);

        return $file_name;
    }

    public function updateImage($path, $fileImage, $old_image)
    {
        $image = $fileImage['name'];
        $file_name = $old_image;
        if ($image  != null) {
            $file_name = $this->moveImage($path, $fileImage);
            if (file_exists($path . $old_image)) {
                unlink($path . $old_image);
            }
        }
        return $file_name;
    }

    public function ConnectionDatabase()
    {
        return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function data($sql, $params = array())
    {
        $conn = $this->ConnectionDatabase();
        // Check if there are parameters
        if (!empty($params)) {
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                throw new Exception($conn->error);
            }

            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);

            $result = $stmt->execute();

            if ($result === false) {
                throw new Exception($stmt->error);
            }

            $resultSet = $stmt->get_result();
            $results = $resultSet->fetch_all(MYSQLI_ASSOC);

            $stmt->close();
        } else {
            // If there are no parameters, execute the query directly
            $result = $conn->query($sql);

            if ($result === false) {
                throw new Exception($conn->error);
            }

            $results = $result->fetch_all(MYSQLI_ASSOC);
        }

        $conn->close();

        return $results;
    }
    public function validatePhoneNumber($phone)
    {
        $phone = preg_replace('/[\/ ]/', '', $phone);
        $pattern = '/^(?:\+?\d{1,3})?[ -]?\(?\d{3}\)?[ -]?[0-9]{3}[ -]?[0-9]{4}$/';
        $pattern2 = '/^\+?[1-9][0-9]{7,14}$/';

        if (preg_match($pattern, $phone) || preg_match($pattern2, $phone)) {
            return $phone;
        } else {
            return false;
        }
    }
}
