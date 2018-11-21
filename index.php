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
    <div>
        <div class="container mt-4">
            <h1 class="text-white text-center">School Management</h1>
            <hr class="bg-white">

            <div class="row">
                <a href="add.php" class="btn btn-primary ml-3 mb-3">Add New Record</a>
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-info ml-2">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif ?>
            </div>
            <table class="table table-striped text-white">
                <tr class="bg-dark">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Reg. Id</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                include "models/DBConnection.php";

                $conn = new DBConnection();
                $i = 0;
                $query = "SELECT * FROM persons";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <?php echo ++$i; ?>
                        </td>
                        <td>
                            <?php echo $row['s_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['r_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['gender']; ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']?>" class="btn btn-sm btn-outline-success">Edit</a>
                            <a href="delete.php?id=<?= $row['id']?>" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>