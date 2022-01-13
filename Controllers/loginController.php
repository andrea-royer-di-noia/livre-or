<?php
require 'dbh.inc.php';

if (isset($_POST['login-btn'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

 $sql = "SELECT * FROM utilisateurs where login = '$login ";
 $result = $db-> prepare

}