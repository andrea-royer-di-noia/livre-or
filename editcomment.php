<?php
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
    <title>Edit comment</title>
    <link rel="icon" href="img/fav.png">
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    <header>
        <nav>
            <div><a href="FreeSpeak.php" class="home-button">Go Home !</a></div>
        </nav>
    </header>
    <main>
<div>
<?php
    if (isset($_POST['submit'])) {
        (int)$id = (int)$_POST['id'];
        settype($id, "integer");
    $commentaire = $_POST['commentaire'];
    $id_utilisateur = $_POST['id_utilisateur'];
    $date = $_POST['date'];
    echo "<form action='' method='POST'>
                <input type='hidden' name='id_utilisateur' value='".$id_utilisateur."'>
                <input type='hidden' name='date' value='".$date."'>
                <input type='hidden' name='id_article' value='".$id."'>
                <textarea name='commentaire'>".$commentaire."</textarea><br>
                <button type='submit2' name='commentSubmit'>Edit</button>
            </form>";
    }
            
if (isset($_POST['commentSubmit'])){
    $id2 = (int)$_POST['id_article'];
    settype($id2, "integer");
    $commentaire = $_POST['commentaire'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $date = $_POST['date'];
        $sql = "UPDATE commentaires SET commentaire = '$commentaire' WHERE id=$id2";
        $result = $conn->query($sql);
        header("Location: FreeSpeak.php");
        
}
?>
</div>
    </main>
    <footer>

    </footer>
</body>
</html>