

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connectez vous !</title>
    <link rel="stylesheet" href="css/login.css">    
</head>
<body>
<header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="inscription.php">Inscription</a>
        </nav>
    </header>
    <div class="body">
<div class="peepo">
    <img src="video/peepo.gif" alt="" width="auto">
    </div>
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
require 'db.php';

if(isset($_SESSION['login'])){
    header ("refresh:0.1;url=index.php");
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
                $_SESSION['nom'] = $res[0][3]; 
                $_SESSION['id'] = $res[0][0];
                $_SESSION['prenom'] = $res[0][2];
                $_SESSION['password'] = $res[0][4];
                header ("refresh:0.1;url=admin.php");
    
            }
            else {
                $_SESSION['login'] = $res[0][1];
                $_SESSION['nom'] = $res[0][3]; 
                $_SESSION['id'] = $res[0][0];
                $_SESSION['prenom'] = $res[0][2];
                $_SESSION['password'] = $res[0][4];

                header ("refresh:0.1;url=index.php");

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
    
</body>
</html>