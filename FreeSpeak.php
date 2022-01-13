<?php
    session_start();
    date_default_timezone_set('Europe/Paris');
    include 'dbh.inc.php';
    include 'comments.inc.php';
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeSpeak DAO</title>
    <link rel="icon" href="img/fav.png">
    <link rel="stylesheet" href="css/fsp.css">
</head>
<body>
    <header>
        <div class="bandeau"><p>FreeSpeak will be a dapp, for the moment we are not yet decentralized. That's why you have to create an account and not connect with metamask.</p></div>
        <nav>
            <?php
            error_reporting(0);
            if ($_SESSION['login']== 'admin'){
                echo "<div><a href='destroy.php' class='register-button'>Disconnect</a></div>";
                echo "<div><a href='admin.php' class='connect-button'>THE OP GATE</a></div>";
            }
            elseif (isset($_SESSION['login'])){
                echo "<div><a href='destroy.php' class='register-button'>Disconnect</a></div>";
                echo "<div><a href='profil.php' class='connect-button'>Profil</a></div>";
            }
            else{
                echo
            "<div><a href='register.php' class='register-button'>Register</a></div>
            <div><a href='connexion.php' class='connect-button'>Connect</a></div>";
            }
            ?>
        </nav>
    </header>
    <main>
        <div class="card">
            <h1>Informations</h1>
            <p>You can leave a comment below and you can see all the comments left since the beginning and in order</p>
            <p class="informations">All comments left will be stored on Ethereum via Arweave</p>
        </div>
        <div class="card1 card">
            <h1>Add Comment</h1>
            <?php
            if (isset($_SESSION['login'])){
            echo "<form action='".setComments($conn)."' method='post'>
                <input type='hidden' name='id_utilisateur' value='42'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='commentaire'></textarea><br>
                <button type='submit' name='commentSubmit'>Send</button>
            </form>";
            }
            else{
                echo "You need to be logged to comment";
            }
            ?>
            <p class='informations'>You just need to sign with your wallet, no blockchain fees </p>
        </div>
        <div class="card3 card">
                <?php
                if (isset($_SESSION['login'])){
                getComments($conn);
                }
                else{
                    echo "Connect to see and edit comment";
                }
                ?>
                <h1>Comments</h1>
        </div>

    </main>
    <footer>
    </footer>
</body>
</html>