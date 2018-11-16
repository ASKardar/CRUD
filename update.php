<?php
session_start();
include "models/DBConnection.php";
$conn = new DBConnection();
$id = $_REQUEST['id'];
$s_name = $_REQUEST['s_name'];
$r_id = $_REQUEST['r_id'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];

if (empty($s_name)) {
    $_SESSION["errors"]["s_name"] = "You must enter Name";
    header("Location: edit.php?id=$id");
} elseif (empty($r_id)) {
    $_SESSION["errors"]["r_id"] = "You must enter Registration ID";
    header("Location: edit.php?id=$id");
} elseif (empty($gender)) {
    $_SESSION["errors"]["gender"] = "You must enter Gender";
    header("Location: edit.php?id=$id");
} elseif (empty($email)) {
    $_SESSION["errors"]["email"] = "You must enter Email";
    header("Location: edit.php?id=$id");
} else {
    $query = "UPDATE persons SET 
      s_name='$s_name' , 
      r_id='$r_id', 
      gender='$gender' , 
      email='$email' 
      WHERE id=$id";

    $result = $conn->query($query);
    $_SESSION["message"] = "Record Updated";
    header("Location: index.php");
}