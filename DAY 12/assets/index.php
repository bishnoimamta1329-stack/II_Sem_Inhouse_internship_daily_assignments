<?php
include("db_connect.php");

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "INSERT INTO students (name, email, phone, course)
              VALUES ('$name','$email','$phone','$course')";

    if(mysqli_query($conn, $query))
    {
        header("Location: students.php");
        exit();
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- Link CSS File -->
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>

<div class="container">

    <h2>Student Registration</h2>

    <form action="" method="POST">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="text" name="phone" placeholder="Enter Phone Number" required>

        <input type="text" name="course" placeholder="Enter Course" required>

        <button type="submit" name="save_student">Save Student</button>

    </form>

    <a href="students.php" class="view-btn">View Students</a>

</div>

</body>
</html>