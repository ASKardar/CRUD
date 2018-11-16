<?php

class DBConnection
{
    public function query($query)
    {
        $conn = new mysqli("localhost", "root", "", "crud");
        if($conn->connect_errno)
            die($conn->connect_error);
        $result = $conn->query($query);
        if(!$result)
            die($conn->error);
        $conn->close();
        return $result;
    }
}