<?php
require_once('DAL.class.php');

class Settings extends DAL
{

    public function getAllSettings()
    {
        $sql = "select * from settings";
        return $this->getdata($sql);
    }
    public function updateSettings(
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
    ) {
        $sql = "UPDATE settings SET university_name='$university_name',short_name='$short_name',image='$image',email='$email',address='$address',phone='$phone',instagram='$instagram',facebook='$facebook',twitter='$twitter',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords' where settings_id='$settings_id'";
        return $this->execute($sql);
    }
}
