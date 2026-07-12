<?php
include("db_connect.php");

if(isset($_POST['update_student']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "UPDATE students 
              SET
              name='$name',
              email='$email',
              phone='$phone',
              course='$course'
              WHERE id='$id'";

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: students.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
else
{
    echo "Invalid Request!";
}
?>