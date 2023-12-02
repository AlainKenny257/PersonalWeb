<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the username and password from the form
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Prepare a SQL statement to check if the username and password match
  $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();

  // Check if there is a row in the result
  if ($stmt->fetch()) {
    echo "Login successful!";
    header("location:view.php");
  } else {
    echo "Invalid username or password.";
    header("location: login.html");
  }
}

// Close the connection
$conn->close();
?>
