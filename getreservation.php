<?php
require_once 'db.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Styles/style.css" />

        <title>Football</title>
    </head>
    <body>


        
        <img class="banner" src="img/banner.png" />

        <div class="nav">
            <div></div>
            <div>
                <a href="index.html" class="home">Home</a>
                <a href="getmatch.php" class="Upcomming">Upcomming</a>
                <a href="contact.html" class="Contact">Contact</a>
            </div>
            <div>
                <button class="button5 signin">
                <a href="getreservation.php">Achats</a>
                </button>
                
            </div>
        </div>
<div class="in-up">
    <h3> Vos Achats : </h3><br><br>
    <form action="" method="post">
          
        <input type="text" name="CIN" placeholder="CIN" class="in-up-form" required><br>
        <input type="password" name="password" placeholder="Password" class="in-up-form" required> <br>
       

        <input  type="submit" value="Check" class="button5 sub">

        
    </form>
    <p class="DNHA">Don't have an account ? <a href="signup.html">Register</a></p>
</div>
    <div style="margin-top:70vh" class="container-ticket">
     <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CIN = $_POST['CIN'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE CIN = '$CIN'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password=== $row['password']) {
                $sql = "SELECT * FROM reservation R,gameplay P WHERE R.CIN = '$CIN' AND P.game_id=R.game_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="ticket">
                            <div style="width:fit-content;height:fit-content;position : absolute; margin-top : 70px" class="Mhome" ><?php echo $row["home"]; ?></div>
                            <div style="display:flex;justify-content:center; margin-top : 20px" ><?php echo $row["stade"]; ?><br><br>VS<br><br><?php echo $row["date"]; ?></div>
                            <div style="width:fit-content;height:fit-content;position : absolute;right:5%; margin-top :-130px; " class="away"><?php echo $row["away"]; ?></div>
                            
                         </div>
                        <?php
                    }
                } else {
                    echo "No matches found.";
                }
                
            } 
        } else {
            ?>
            <script>alert('Wrong CIN/Password , Try again');
                    window.history.back();
            </script>
        <?php
        }
} 
?>

    </div>
<footer class="foot">
    <p>
        Fédération royale marocaine de football | Tous droits réservés ©
        2024
    </p>
</footer>
</body>

   </html>

