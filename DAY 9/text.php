<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $birthdate = $_POST['birthdate'];
    $branch = $_POST['branch'];
    $gender = $_POST['gender'];
    $address1 = trim($_POST['address1']);
    $address2 = trim($_POST['address2']);
    $country = $_POST['country'];
    $city = trim($_POST['city']);
    $region = trim($_POST['region']);
    $postalcode = trim($_POST['postalcode']);

if(isset($_FILES['profileImage'])){

    $targetDir = "uploads/";

    if(!file_exists($targetDir)){
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["profileImage"]["name"]);
    $targetFile = $targetDir . $fileName;

    if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)){
        echo "Image Uploaded Successfully.";
    }else{
        echo "Image Upload Failed.";
    }

}



}

    if (empty($fullname)) {
        echo("Name is required.");
    }

    if (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        echo("Name should contain only letters and spaces.");
    }

    if (empty($email)) {
        echo("Email is required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Invalid email address.");
    }

    if (empty($phone)) {
        echo("Phone number is required.");
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo("Phone number must contain exactly 10 digits.");
    }

    if (empty($birthdate)) {
        echo("Birth date is required.");
    }

    if (empty($gender)) {
        echo("Please select a gender.");
    }

    if (empty($country)) {
        echo("Please select a country.");
    }

    if (!empty($postalcode) && !preg_match("/^[0-9]{6}$/", $postalcode)) {
        echo("Postal code must contain 6 digits.");
    }



    echo "<h2>Registration Successful!</h2>";

    echo "<b>Full Name:</b> $fullname <br>";
    echo "<b>Email:</b> $email <br>";
    echo "<b>Phone:</b> $phone <br>";
    echo "<b>Birth Date:</b> $birthdate <br>";
    echo "<b>Branch:</b> $branch <br>";
    echo "<b>Gender:</b> $gender <br>";
    echo "<b>Address:</b> $address1 $address2 <br>";
    echo "<b>Country:</b> $country <br>";
    echo "<b>City:</b> $city <br>";
    echo "<b>Region:</b> $region <br>";
    echo "<b>Postal Code:</b> $postalcode <br>";
    echo "<h3>Uploaded Image</h3>";
echo "<img src='uploads/photo.png' width='200'>";



?>