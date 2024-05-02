<?php
    $CIN = $_POST["CIN"];
    $password = $_POST["password"];


// Create connection
$conn = new mysqli("localhost", "root", "", "test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt= $conn->prepare("select * from users where CIN= '$CIN' ")
    $stmt->bind_param("s",$CIN);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data= $stmt_result->fetch_assoc();
        if($data['password']===$password){
            echo"<h2> Connecté avec success </h2>";
        }else{
            echo"<h2> Invalid Email ou Mot de passe</h2>";
        }
    }else{
        echo"<h2> Invalid Email ou Mot de passe</h2>";
    }
}

?>
