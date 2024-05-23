<?php
require_once 'db.php';
?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
