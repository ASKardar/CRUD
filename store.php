<?php session_start(); ?>
<?php
include "models/DBConnection.php";
$conn = new DBConnection();

$s_name = $_REQUEST['s_name'];
$r_id = $_REQUEST['r_id'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];

if(empty($s_name))
{
    $_SESSION["errors"]["s_name"] = "You must enter Name";
    header("Location: add.php");
}
elseif (empty($r_id))
{
    $_SESSION["errors"]["r_id"] = "You must enter Registration ID";
    header("Location: add.php");
}
elseif (empty($gender))
{
    $_SESSION["errors"]["gender"] = "You must enter Gender";
    header("Location: add.php");
}
elseif (empty($email))
{
    $_SESSION["errors"]["email"] = "You must enter Email";
    header("Location: add.php");
}
else {
    $query = "INSERT INTO persons(s_name, r_id, gender, email) 
              VALUES ('$s_name','$r_id','$gender','$email')";

    $result = $conn->query($query);
    $_SESSION["message"] = "Record Added";
    header("Location: index.php");
}
?>
