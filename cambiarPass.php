<?php
include 'config/conexion.php';
$nick = $_POST['nombre'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = password_hash($pass, PASSWORD_DEFAULT);

$conexion->query("UPDATE usuarios SET password_login = '$pass' WHERE email = '$email' AND nick = '$nick'");
header("location:index.php");
?>