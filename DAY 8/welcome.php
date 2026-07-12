<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#667eea,#764ba2);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:500px;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.3);
            text-align:center;
        }

        h1{
            color:#4B0082;
        }

        p{
            font-size:20px;
            margin:15px;
        }

        span{
            color:#0066cc;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Welcome</h1>

    <p>
        <strong>Name:</strong>
        <span><?php echo "Pratishtha Bhargava"; ?></span>
    </p>

    <p>
        <strong>Current Date:</strong>
        <span><?php echo date("Y-m-d"); ?></span>
    </p>

    <p>
        <strong>Favourite Programming Language:</strong>
        <span>C++</span>
    </p>

    <p>
        <strong>Current Time:</strong>
        <span><?php echo date("H:i:s"); ?></span>
    </p>

    <p>
        <strong>Your IP Address:</strong>
        <span><?php echo $_SERVER['REMOTE_ADDR']; ?></span>
    </p>

</div>

</body>
</html>