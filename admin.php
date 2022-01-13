<?php
session_start();
require 'dbh.inc.php';
if($_SESSION['login'] === 'admin'){
    $select = "SELECT * FROM utilisateurs";

$sql = mysqli_query($conn,$select);
$row = mysqli_fetch_all($sql, MYSQLI_ASSOC);

}

    
    else{
        header ("refresh:0.1;url=FreeSpeak.php");
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome ADMIN</title>
    <link rel="stylesheet" href="css/co.css">
</head>
<body>
    <header>
    <div class="bandeau"><p>FreeSpeak will be a dapp, for the moment we are not yet decentralized. That's why you have to create an account and not connect with metamask.</p></div>
        <nav>
            <div><a href="destroy.php" class="register-button">Disconnect</a></div>
            <div><a href="FreeSpeak.php" class="home-button">Home</a></div>
        </nav>
    </header>
    <main>
    <?php
                echo "Liste des utilisateurs (ID,UTILISATEUR,MDP)"."<br>";
        foreach ($row as $v1) {
            foreach ($v1 as $v2) {
                echo "$v2"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            }
            echo "<br>";}
            ?>
    </main>
    <footer>
    </footer>
    
</body>
</html>