<?php
include 'conexion.php';
$id = $_GET['id'];
$conexion->query("DELETE FROM sitios WHERE id_usuario = '$id'");
header("location:index.php");
?>