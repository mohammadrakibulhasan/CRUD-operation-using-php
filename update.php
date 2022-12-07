<?php include('db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header t">
        <div class="nav">
            <h1>My First CRUD Application in PHP</h1>
        </div>
    </div>

    <div class="form c">
        <br>
        <?php
        if ($_GET['id']) {
            $getid = $_GET['id'];
            $query = "select * from info where `id` = '$getid'";
            $result = mysqli_query($con, $query);
            $raw = mysqli_fetch_assoc($result);
            $id = $raw['id'];
            $fname = $raw['fName'];
            $lname = $raw['lName'];
            $age = $raw['age'];
        }
        if (isset($_POST['update_btn'])) {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];


            $query = "UPDATE `info` SET `fName`='$fname',`lName`='$lname',`age`='$age' WHERE `id`= '$id'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die("query Failed" . mysqli_error($mysqli));
            } else {
                header('location:index.php');
            }
        }
        ?>
        <h2>Insert Your Data Here</h2>
        <form action="update.php" method="post">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>"><br>

            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>"><br>

            <label for="age">Age:</label><br>
            <input type="text" id="age" name="age" value="<?php echo $age; ?>"><br><br>

            <input type="text" name="id" value="<?php echo $id; ?>"hidden>
            <input type="submit" name="update_btn" value="Update">
        </form>

    </div>
    <div class="info c">
        <h2>Your Information</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Time</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "select * from info";
                $result = mysqli_query($con, $query);
                if (!$result) {
                    die("query Failed" . mysqli_error($mysql));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <?php echo $row['fName']; ?>
                    </td>
                    <td>
                        <?php echo $row['lName']; ?>
                    </td>
                    <td>
                        <?php echo $row['age']; ?>
                    </td>
                    <td>
                        <?php echo $row['time']; ?>
                    </td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="success">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="danger">Delete</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer t">
        <div class="foot">
            <p>All Right Reserved @ Rakibul Hasan</p>
        </div>
    </div>

</body>

</html>