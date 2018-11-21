<?php

class DBConnection
{
    public function query($query)
    {
        $conn = new mysqli("https://db4free.net:3306", "cruduser", "crudtest", "cruddatabase");
        if($conn->connect_errno)
            die($conn->connect_error);
        $result = $conn->query($query);
        if(!$result)
            die($conn->error);
        $conn->close();
        return $result;
    }
}