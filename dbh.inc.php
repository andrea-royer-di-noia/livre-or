<?php

$conn = new mysqli('localhost', 'root', '', 'livreor');

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
};