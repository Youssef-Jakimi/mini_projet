<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $CIN = $_POST["CIN"];
    $Fname = $_POST["Fname"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // You should hash this password before storing it in the database

    // Hash the password for security
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert user data into database
    $sql = "INSERT INTO users (CIN,Fname, email, password) VALUES ('$CIN','$Fname' ,'$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

// Close connection
$conn->close();
?>
