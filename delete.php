<?php include('db.php')?>


<?php 


if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "delete from info where `id` = '$id'";

$result = mysqli_query($con,$query);

if(!$result)
{  die("query Failed".mysqli_error($mysqli));
}
else{
    header('location:index.php ? msg=Your data deleted Successfully');
}

?>