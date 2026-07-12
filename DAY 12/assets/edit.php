<?php
include("db_connect.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = "SELECT * FROM students WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $student = mysqli_fetch_array($query_run);
    }
    else
    {
        echo "Student not found!";
        exit();
    }
}
else
{
    echo "Invalid Request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f4f4;
}

.container{
    width:450px;
    margin:50px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
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
    padding:10px;
    background:#007bff;
    color:#fff;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#0056b3;
}

.back-btn{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    background:green;
    color:white;
    padding:10px;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="container">

<h2>Edit Student</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?= $student['id']; ?>">

<input type="text" name="name" value="<?= $student['name']; ?>" required>

<input type="email" name="email" value="<?= $student['email']; ?>" required>

<input type="text" name="phone" value="<?= $student['phone']; ?>" required>

<input type="text" name="course" value="<?= $student['course']; ?>" required>

<button type="submit" name="update_student">Update Student</button>

</form>

<a href="students.php" class="back-btn">Back to Students</a>

</div>

</body>
</html>