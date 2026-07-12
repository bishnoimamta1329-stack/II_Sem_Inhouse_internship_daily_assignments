<?php
include("db_connect.php");

$message = "";

if(isset($_POST['register']))
{
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already exists!";
    }
    else
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(fullname,email,password)
                  VALUES('$fullname','$email','$hashedPassword')";

        if(mysqli_query($conn,$query))
        {
            header("Location: login.php");
            exit();
        }
        else
        {
            $message = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>
body{
    font-family:Arial;
    background:#f2f2f2;
}

.container{
    width:400px;
    margin:60px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px gray;
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:10px;
    background:#28a745;
    color:white;
    border:none;
    cursor:pointer;
}

a{
    text-decoration:none;
}
</style>

</head>
<body>

<div class="container">

<h2>User Registration</h2>

<p style="color:red;"><?php echo $message; ?></p>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">Register</button>

</form>

<br>

<center>
Already have an account?
<a href="login.php">Login</a>
</center>

</div>

</body>
</html>