<?php

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CIN = $_POST["CIN"];
    $Fname = $_POST["Fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $sql = "SELECT * FROM users WHERE CIN = '$CIN'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <script>alert('User Already Exists!! Signin?')
                window.location.href = "signin.html";
        </script>
        <?php
        
    } else {
        if ($password !== $rpassword) {
            ?>
                <script>alert('Passwords do not Match')
                        window.history.back();
                </script>
            <?php
        }else{
            $sql = "INSERT INTO users (CIN,Fname, email, password) VALUES ('$CIN','$Fname' ,'$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                ?>
                <script>alert('User registered successfully')
                window.location.href = "index.html";
                </script>
            <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        }
}
}

?>
