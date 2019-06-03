<?php
include 'model/UsuariosModel.php';

/////////////////////////////// CONTROLLER ///////////////////////////////
$usuario = new UsuariosModel();
$matrizUsuarios = $usuario->getUsers();

include 'view/UsuariosView.php';
?>