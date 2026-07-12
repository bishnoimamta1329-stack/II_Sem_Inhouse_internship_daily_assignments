<?php
sessioan_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body{
    font-family:Arial;
    background:#f4f4f4;
    text-align:center;
}

.container{
    width:500px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

a{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    background:red;
    color:white;
    padding:10px 20px;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="container">

<h1>Welcome</h1>

<h2><?php echo $_SESSION['fullname']; ?></h2>

<p>You have successfully logged in.</p>

<a href="logout.php">Logout</a>

</div>

</body>
</html>
