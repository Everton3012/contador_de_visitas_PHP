<?php 

$host = "localhost";
$user = "root";
$password = "";
$db = "contador";

$mysqli = new mysqli($host,$user,$password, $db);


if ($mysqli->connect_errno) {
    die("Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}



?>