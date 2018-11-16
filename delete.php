<?php
session_start();
include "models/DBConnection.php";
$conn = new DBConnection();
$id = $_REQUEST['id'];
$r_id = $_REQUEST['r_id'];
$query = "DELETE FROM persons WHERE id=". $_GET['id'];
$result = $conn->query($query);
$_SESSION["message"] = "Record Deleted having reg id $r_id";
header("Location: index.php");