<?php
require_once 'db.php';
?>
<?php

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $CIN = $_POST["CIN"];
    $Nom = $_POST["Nom"];
    $Messages = $_POST["Messages"];
    $sql = "INSERT INTO contactus (id,CIN, Nom, Messages) VALUES ('','$CIN' ,'$Nom', '$Messages')";
    $result = $conn->query($sql);

            if ($result === TRUE) {
                ?>
                <script>alert('Message reçu !! ')
                       window.location.href = "contact.html"
                </script>
            <?php                
            } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
        }


?>
