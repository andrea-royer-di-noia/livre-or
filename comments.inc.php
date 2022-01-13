<?php


function setComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $commentaire = $_POST['commentaire'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $date = $_POST['date'];
        
        

        $sql = "INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES ('$commentaire',  '$id_utilisateur', '$date')";
        $result = $conn->query($sql);
    }
    
}

function getComments($conn) {
    $sql = "SELECT * FROM  commentaires";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo "<div class='comment-box'>";
        echo  $row['commentaire'] . '<p class="inf">Send at ' . $row['date'] .'</p>'. '<br>';
        echo "<form method='POST' action='editcomment.php'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='id_utilisateur' value='".$row['id_utilisateur']."'>
                <input type='hidden' name='date' value='".$row['date']."'>
                <input type='hidden' name='commentaire' value='".$row['commentaire']."'>
            <button type='submit' name='submit' class='edit-btn' value='".$row['id']."'>Edit</button>
            </form>
            </div>";
    };
}

function editComments($conn) {
    if (isset($_POST['commentSubmit'])) {
        $id = $_POST['id'];
        $commentaire = $_POST['commentaire'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $date = $_POST['date'];
        
        

        $sql = "UPDATE commentaires SET commentaire '$message' WHERE commentaires id='$id'";
        $result = $conn->query($sql);
        header("Location: FreeSpeak.php");
    }
    
}