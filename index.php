<?php 

include("conexao.php");

session_start();

if(!isset($_SESSION['acesso_registrado'])){
    $ip = $_SERVER['REMOTE_ADDR'];
    $navegador = $_SERVER['HTTP_USER_AGENT'];

    $consulta_registro_acesso = "INSERT INTO acessos (
        data,
        navegador, 
        ip) 
        VALUES (
        NOW(),
        '$navegador',
        '$ip'
    )";
    $mysqli->query($consulta_registro_acesso) or die ($mysqli->$error);
    $_SESSION['acesso_registrado'] = true;

}

$consulta = "SELECT count(*) as c FROM acessos";
$query = $mysqli->query($consulta) or die ($mysqli->$error);
$acessos = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Este site teve <?=$acessos['c']?> acessos</h1>
</body>
</html>