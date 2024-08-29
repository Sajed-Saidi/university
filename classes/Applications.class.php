<?php
require_once('DAL.class.php');

class Applications extends DAL
{
    public function insertApplications($status, $fname, $lname, $phone, $email, $dob, $gender, $address,
     $education_level, $education_details, $applicationTypesId)
    {
    $sql="INSERT INTO `applications`(`status`, `first_name`, `last_name`, `phone`, 
    `email`, `date_of_birth`, `gender`, `address`, `education_level`, `education_details`, `application_types_id`,
     `majors_id`) VALUES ('$status','$fname','$lname','$phone','$email','$dob','$gender','$address','$education_level',
     '$education_details','$applicationTypesId','2')";
    //  var_dump($sql);exit;
     return $this->execute($sql);
    }

    public function getAllApplications_students()
    {
        $sql="SELECT * FROM applications INNER JOIN majors ON applications.majors_id = majors.majors_id where application_types_id=1";
        return $this->getdata($sql);
    }}