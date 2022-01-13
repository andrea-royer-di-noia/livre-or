<?php
require 'dbh.inc.php';
session_start();
unset($_SESSION['login']);
header ("refresh:0.1;url=FreeSpeak.php");
?>