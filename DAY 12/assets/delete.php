<?php
include 'db_connect.php';
$id=(int)$_GET['id'];
mysqli_query($conn,"DELETE FROM students WHERE id=$id");
header("Location: students.php");
?>