<?php

require 'dbh.inc.php';

$errors = array();
$login = '';



if (isset($_POST['signup-btn'])) {
$login = $_POST['login'];
$password = $_POST['password'];
$password_conf = $_POST['password_conf'];
$loginQuery = "SELECT * FROM utilisateurs WHERE login='$login'";

$res_u = mysqli_query($conn, $loginQuery);
if (mysqli_num_rows($res_u) > 0 || ($password_conf !== $password))  {
    if (mysqli_num_rows($res_u) > 0 ){
        echo "Nom d'utilisateur déjà utilisé";
    }
    if ($password_conf !== $password) {
        echo "<br>Mot de passe/confimation non identique";

    }
    
}
else{
    
    $sql = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')";
    $conn -> query($sql);
    if(empty($login)) {
    $errors['login'] = "L'identifiant est manquant";
    }

    if(empty($password)) {
        $errors['password'] = "Le mot de passe est manquant";
    }
    if ($password !== $password) {
        $errors['password'] = "Le mot de passe est different";
    
    }
    else{
        header ("refresh:0.1;url=Freespeak.php");
    }
    }
    }