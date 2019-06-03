<?php
include 'conexion.php';
$id = $_POST['id'];
$nombreSitio = $_POST['site'];
$usuario = $_POST['nick'];
$pass = $_POST['pass'];
$url = $_POST['url'];

$conexion->query("INSERT INTO sitios (id_usuario, nombre_sitio, `user`, `password`, url) VALUES ($id, '$nombreSitio', '$usuario', '$pass', '$url')");
header("location:index.php");
?>