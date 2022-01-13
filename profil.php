<?php
session_start();
require 'dbh.inc.php';

if(isset($_POST['signup-btn'])){
    $id=$_SESSION['id'];
    $login=$_POST['login'];
    $password=$_POST['password'];

    $select = "SELECT * FROM utilisateurs where id= $id";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);

    $res= $row['id'];
        if ($res === $id)
    {
        $update = "UPDATE utilisateurs set login='$login',password='$password' where id='$id'";
        $sql2=mysqli_query($conn,$update);
    }

    $select = "SELECT * FROM utilisateurs where id= $id";
$sql = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($sql);
$_SESSION["login"] = $row['login'];
header ("refresh:0.1;url=FreeSpeak.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
        <div class="card">
    <form action="" method="post">

    <div><label for="login">Username</label></div>
    <div class="places"><input type="text" id="login" name="login"></div>

    <div><label for="password">Password</label></div>
    <div class="places"><input type="password" id="password" name="password"></div>
    <div class="places"><button type="submit" name="signup-btn">Envoyer</button></div>
    <?php
            echo'Username:'.' '.$_SESSION['login'].'<Br>';
            echo 'Password:'.' '.$_SESSION['password'];
        ?>
    </form>
    </div>
    </main>
    <footer>
    </footer>
    
</body>
</html>
