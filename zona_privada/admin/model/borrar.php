<?php
include '../conexion.php';
$id = $_GET['id'];
echo "DELETE FROM usuarios WHERE id_usuario = $id";
$conexion->query("DELETE FROM usuarios WHERE id_usuario = $id");
header("location:../index.php");
?>