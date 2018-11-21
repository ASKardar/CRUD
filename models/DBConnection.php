<?php

class DBConnection
{
    public function query($query)
    {
        $conn = new mysqli("db4free.net", "cruduser", "crudtest", "cruddatabase","3306");
        if($conn->connect_errno)
            die($conn->connect_error);
        $result = $conn->query($query);
        if(!$result)
            die($conn->error);
        $conn->close();
        return $result;
    }
}