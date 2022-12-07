<?php include('db.php') ?>
<?php
if (isset($_POST['submit_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
}

if ($fname == "" || empty($fname)) {
    header('location:index.php ? msg=First name cant be empty');
    echo 'hello';
}
if ($lname == "" || empty($lname)) {
    header('location:index.php ? msg=Last name cant be empty');
}
if ($age == "" || empty($age)) {
    header('location:index.php ? msg=age cant be empty');
} else {
    $query = "INSERT INTO info(`fName`, `lName`, `age`) VALUES ('$fname','$lname','$age')";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("query Failed" . mysqli_error($mysqli));
    } else {
        header('location:index.php');
    }

}
?>