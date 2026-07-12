<?php
include("db_connect.php");

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "INSERT INTO students (name, email, phone, course)
              VALUES ('$name', '$email', '$phone', '$course')";

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
    <title>Add Student</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        .container{
            width:450px;
            margin:50px auto;
            background:#fff;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
            color:#333;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
        }

        button{
            width:100%;
            padding:12px;
            background:#007bff;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#0056b3;
        }

        .view-btn{
            display:block;
            text-align:center;
            margin-top:15px;
            text-decoration:none;
            background:green;
            color:white;
            padding:10px;
            border-radius:5px;
        }

        .view-btn:hover{
            background:darkgreen;
        }
    </style>

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
