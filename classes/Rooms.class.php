<?php
require_once('DAL.class.php');

class Rooms extends DAL
{
    public function getAllRooms()
    {
        $sql = "select * from rooms,blocks where rooms.blocks_id=blocks.blocks_id";
        return $this->getdata($sql);
    }

    public function insertRoom($name, $number, $occupied, $capacity, $blocks_id)
    {
        $sql = "INSERT INTO rooms (name,number,occupied,capacity,blocks_id) values ('$name','$number','$occupied','$capacity','$blocks_id')";
        return $this->execute($sql);
    }

    public function updateRoom($rooms_id, $name, $number, $occupied, $capacity, $blocks_id)
    {
        $sql = "UPDATE rooms SET name='$name',number='$number',occupied='$occupied',capacity='$capacity',blocks_id='$blocks_id' WHERE rooms_id='$rooms_id'";
        return $this->execute($sql);
    }

    public function deleteRoom($rooms_id)
    {
        $sql = "DELETE FROM rooms WHERE rooms_id='$rooms_id'";
        return $this->execute($sql);
    }

    public function roomExists($number, $blocks_id)
    {
        $sql = "SELECT * FROM rooms WHERE number='$number' AND blocks_id='$blocks_id'";
        return $this->getdata($sql);
    }

    public function roomExistsDifferentID($rooms_id, $number, $blocks_id)
    {
        $sql = "SELECT * FROM rooms WHERE number='$number' AND blocks_id='$blocks_id' AND rooms_id!='$rooms_id'";
        return $this->getdata($sql);
    }
}
