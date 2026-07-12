<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Student</title>

<link rel="stylesheet" href="assets/style.css">

<style>
.search-box{
    width:50%;
    margin:20px auto;
}

.search-box input{
    width:100%;
    padding:10px;
}

.back-btn{
    display:inline-block;
    background:green;
    color:white;
    text-decoration:none;
    padding:10px 15px;
    border-radius:5px;
    margin-bottom:20px;
}
</style>

</head>
<body>

<div class="container">

<h2>Search Student</h2>

<a href="students.php" class="back-btn">← Back</a>

<form method="GET" class="search-box">

<input
type="text"
name="search"
placeholder="Search by Name, Email or Course"
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>"
>

</form>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Course</th>
</tr>

<?php

if(isset($_GET['search']))
{
    $filter = mysqli_real_escape_string($conn,$_GET['search']);

    $query = "SELECT * FROM students
              WHERE
              name LIKE '%$filter%'
              OR
              email LIKE '%$filter%'
              OR
              course LIKE '%$filter%'";

    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $student)
        {
?>

<tr>

<td><?= $student['id']; ?></td>
<td><?= $student['name']; ?></td>
<td><?= $student['email']; ?></td>
<td><?= $student['phone']; ?></td>
<td><?= $student['course']; ?></td>

</tr>

<?php
        }
    }
    else
    {
        echo "<tr><td colspan='5'>No Student Found</td></tr>";
    }
}

?>

</table>

</div>

</body>
</html>