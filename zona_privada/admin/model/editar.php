<?php
include '../conexion.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$nick = $_POST['nick'];
$ape1 = $_POST['ape1'];
$ape2 = $_POST['ape2'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$conexion->query("UPDATE usuarios SET nombre = '$nombre', nick = '$nick', apellido1 = '$ape1', apellido2 = '$ape2', password_login = '$pass', email = '$email' WHERE id_usuario = $id");
header("location:../index.php");
?>