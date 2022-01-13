<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeSpeak, login</title>
    <link rel="stylesheet" href="css/co.css">
</head>
<body>
    <header>
        <div class="bandeau"><p>FreeSpeak will be a dapp, for the moment we are not yet decentralized. That's why you have to create an account and not connect with metamask.</p></div>
        <nav>
            <div><a href="register.html" class="register-button">Register</a></div>
            <div><a href="FreeSpeak.php" class="home-button">Home</a></div>
        </nav>
    </header>
    <main>
        <div>
            <form action="" method="post">
                <h1>Connectez vous:</h1>
                <div><label for="login">Nom d'utilisateur</label></div>
                <div class="place"><input type="text" id="login" name="login"></div>
                <div><label for="password">Mot de passe</label></div>
                <div class="place"><input type="password" id="password" name="password"></div>
                <div><button type="submit" name="login-btn"><p>Envoyer</p></button></div>
                </form>
                <?php
                error_reporting(0);
            require 'dbh.inc.php';
            
            if(isset($_SESSION['login'])){
                header ("refresh:0.1;url=FreeSpeak.php");
            }
            
            if(isset($_POST['login-btn'])){
                $login=$_POST['login'];
                $password=$_POST['password'];
                $sql= mysqli_query ($conn,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");
                $res= mysqli_fetch_all($sql); 
                $_SESSION['success'] = "";
            
            
            
                
                if (empty($res)) {
                    echo "Votre nom d'utilisateur et/ou votre mot de passe n'est pas reconnu";
                }
                 else {
                     if($res[0][1] == $login){
                        session_start();
                        if ( $login == 'admin'){
                            $_SESSION['login'] = $res[0][1];
                            $_SESSION['id'] = $res[0][0];
                            $_SESSION['password'] = $res[0][2];
                            header ("refresh:0.1;url=admin.php");
                
                        }
                        else {
                            $_SESSION['login'] = $res[0][1];
                            $_SESSION['id'] = $res[0][0];
                            $_SESSION['password'] = $res[0][2];
            
                            header ("refresh:0.1;url=FreeSpeak.php");
            
                        }
                     
                 }
                     else {
                         echo "Votre nom d'utilisateur et/ou votre mot de passe n'est pas reconnu";
                     }
            }
            }
            ?>
                </div>
            
                </div>
    </main>
    <footer>
    </footer>
    
</body>
</html>