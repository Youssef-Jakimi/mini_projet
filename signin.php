
<?php
$conn = new mysqli("localhost", "root", "", "projet_ticket");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CIN = $_POST['CIN'];
        $password = $_POST['password'];


        

        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE CIN = '$CIN'";

        // Execute SQL statement
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User exists, check password
            $row = $result->fetch_assoc();
            if ($password=== $row['password']) {
                // Password matches, login successful
               $_SESSION['CIN'] = $CIN;
                header("Location: welcome.php");
                exit;
            } else {
                // Password does not match, show error message
                echo "Invalid password. Please try again.";
            }
        } else {
            echo "<script>alert('User Do Not Exist! Register');</script>";
            header("Location: signup.html");
        }

        
    
}
?>

