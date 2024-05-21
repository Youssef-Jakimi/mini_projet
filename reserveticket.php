<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Styles/style.css" />
        <script src="script.js"></script>

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
    <h3> Reservation : </h3><br><br>
    <form action="" method="post">
          
        <input type="text" name="CIN" placeholder="CIN" class="in-up-form" required><br>
        <input type="password" name="password" placeholder="Password" class="in-up-form" required> <br>
        <input  list="match" placeholder="Match ID : " name="game" class="in-up-form">
             <datalist id="match">
                <?php
                    $sql = "SELECT * FROM gameplay";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row["game_id"] ?>"  ><?php echo  $row["HomeAB"]," -VS- ",$row["awayAB"] , "  ", $row["prix"]," DH"; ?></option>
                            <?php
                        }
                    } 

                ?>
            </datalist>
        <input type="number" placeholder="Nbr de Ticket : " name="quantite" class="in-up-form">



        <input  type="submit" value="Buy" class="button5 sub">

        
    </form>
    <p class="DNHA">Don't have an account ? <a href="signup.html">Register</a></p>

</div>
<footer>
    <p>
        Fédération royale marocaine de football | Tous droits réservés ©
        2024
    </p>
</footer>
</body>

   </html>
<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $CIN = $_POST['CIN'];
        $password = $_POST['password'];
        $gameid=$_POST['game'];
        $qte=$_POST['quantite'];
    
        $sql = "SELECT * FROM users WHERE CIN = '$CIN'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password=== $row['password']) {
                $sql = "INSERT INTO reservation ( game_id, CIN,quantite) VALUES ( '$gameid', '$CIN','$qte')";
                if ($conn->query($sql) === TRUE) {
                    ?>
                    <script>alert('Ticket Bought succesfully')
                             window.history.back();

                    </script>
                    <?php
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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