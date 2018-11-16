<?php include "models/DBConnection.php";

$conn = new DBConnection();
$id = $_REQUEST['id'];
$query = "SELECT * FROM persons WHERE id=$id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS Links -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body class="cover-img">
<div class="container">
    <h2 class="text-white text-center mb-4">Update persons's RECORD</h2>
    <form action="update.php?id=<?= $row['id']; ?>" method="post">
        <label class="sr-only" for="s_name">persons Name</label>
        <input name="s_name" id="s_name" value="<?php echo $row['s_name'] ?>" class="form-control py-4 mb-3">
        <?php if (isset($_SESSION["errors"]["s_name"])) {
            echo $_SESSION["errors"]["s_name"];
            unset($_SESSION["errors"]["s_name"]);
        } ?>

        <label class="sr-only" for="r_id">Registration ID</label>
        <input name="r_id" id="r_id" value="<?php echo $row['r_id'] ?>" class="form-control py-4 mb-3">
        <?php if (isset($_SESSION["errors"]["r_id"])) {
            echo $_SESSION["errors"]["r_id"];
            unset($_SESSION["errors"]["r_id"]);
        } ?>

        <label class="sr-only" for="gender">Gender</label>
        <input name="gender" id="gender" value="<?php echo $row['gender'] ?>" class="form-control py-4 mb-3">
        <?php if (isset($_SESSION["errors"]["gender"])) {
            echo $_SESSION["errors"]["gender"];
            unset($_SESSION["errors"]["gender"]);
        } ?>

        <label class="sr-only" for="email">Email</label>
        <input name="email" id="email" value="<?php echo $row['email'] ?>" class="form-control py-4 mb-3">
        <?php if (isset($_SESSION["errors"]["email"])) {
            echo $_SESSION["errors"]["email"];
            unset($_SESSION["errors"]["email"]);
        } ?>

        <input type="submit" name="update" value="UPDATE RECORD !!!" class="btn btn-success btn-lg float-right">
    </form>
</div>
</body>
</html>