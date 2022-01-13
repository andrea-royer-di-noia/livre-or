<?php require_once 'Controllers/authController.php';
if(isset($_SESSION)){
    header ("refresh:0.1;url=FreeSpeak.php");
}

 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeSpeak, register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <header>
        <div class="bandeau"><p>FreeSpeak will be a dapp, for the moment we are not yet decentralized. That's why you have to create an account and not connect with metamask.</p></div>
        <nav>
            <div><a href="connexion.html" class="connect-button">Connect</a></div>
            <div><a href="FreeSpeak.php" class="home-button">Home</a></div>
        </nav>
    </header>
    <main>
        <div class="card">
            <h1>Register</h1>
            <form action="" method="post">
            
                <div><label for="login">Username</label></div>
                <div><input type="text" id="login" name="login" required></div>
            
                <div><label for="password">Password</label></div>
                <div><input type="password" id="password" name="password" required></div>
            
                <div><label for="password">Conf Password</label></div>
                <div><input type="password" id="password" name="password_conf" required></div>
            
                <div><button type="submit" name="signup-btn">Send</button></div>
            
                </form>
            <p class="informations">After the migration to decentralization you will get a migration token allowing you to recover your old account while deleting the database system</p>
        </div>
    </main>
    <footer>
    </footer>
    
</body>
</html>