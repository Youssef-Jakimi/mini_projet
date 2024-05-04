<?php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "projet_ticket";

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
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $sql = "SELECT * FROM users WHERE CIN = '$CIN'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: signin.html");
    } else {
        if ($password !== $rpassword) {
            echo "Passwords do not match";
            exit;
        }else{
            // Prepare SQL statement to insert user data into database
            $sql = "INSERT INTO users (CIN,Fname, email, password) VALUES ('$CIN','$Fname' ,'$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                    echo "User registered successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        }
}
}

?>
