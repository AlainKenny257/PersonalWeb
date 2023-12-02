<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'test'; 
$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$sql = "INSERT INTO contact(name,email,phone,message) VALUES('$name', '$email', '$phone', '$message')";

if (mysqli_query($connection, $sql)) {
    $response = "Message sent successfully.";
    // Generate a JavaScript alert
    echo "<script>alert('$response'); window.location = 'contact.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
// Close the database connection
mysqli_close($connection);
?>