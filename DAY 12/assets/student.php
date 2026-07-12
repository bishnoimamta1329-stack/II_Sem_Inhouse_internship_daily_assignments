<?php
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students List</title>

<link rel="stylesheet" href="assets/style.css">

</head>
<body>

<div class="container">

<h2>Student List</h2>

<a href="index.php" class="add-btn">+ Add Student</a>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Course</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php

$query = "SELECT * FROM students";
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

<td>
<a href="edit.php?id=<?= $student['id']; ?>" class="edit-btn">Edit</a>
</td>

<td>
<a href="delete.php?id=<?= $student['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
</td>

</tr>

<?php
    }
}
else
{
    echo "<tr><td colspan='7'>No Student Found</td></tr>";
}

?>

</table>

</div>

</body>
</html>