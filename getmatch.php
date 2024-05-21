<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Styles/style.css">
        <script src="script.js"></script>

        <title>Football</title>
    </head>
    <body>
        <img class="banner" src="img/banner.png" />

        <div class="nav">
            <div></div>

            <div>
                <a href="index.html" class="home">Home</a>
                <a href="upcom.html" class="Upcomming">Upcomming</a>
                <a href="contact.html" class="Contact">Contact</a>
            </div>
            <div>
                <button class="button5 signin">
                <a href="getreservation.php">Achats</a>
                </button>
                
            </div>
        </div>
         
        <div class="container-ticket">
            
            <?php


// Retrieve matches from the database
$sql = "SELECT * FROM gameplay";
$result = $conn->query($sql);

// Display matches with predefined CSS design
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="ticket">
            <div style="width:fit-content;height:fit-content;position : absolute; margin-top : 20px" class="Mhome" ><?php echo $row["home"]; ?></div>
            <div style="display:flex;justify-content:center; margin-top : 20px" >VS<br><?php echo $row["stade"]; ?><br><?php echo $row["date"]; ?></div>
            <div style="width:fit-content;height:fit-content;position : absolute; margin-top :-110px; " class="away"><?php echo $row["away"]; ?></div>
            <div><a href="reserveticket.php"><button class=" button" ><?php echo $row["prix"] ," DH - "?>BUY NOW</button></a></div>

         </div>
        <?php
    }
} else {
    echo "No matches found.";
}

?>


            
            

              



        </div>



    </body>
<footer class="foot">
    <p>
        Fédération royale marocaine de football | Tous droits réservés ©
        2024
    </p>
</footer>
   </html>