<?php
include 'conexion.php';

/////////////////////////////// MODEL ///////////////////////////////
class UsuariosModel{
    private $db;
    private $usuarios;
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->usuarios=array();
    }

    public function getUsers(){
        $consulta = $this->db->query("SELECT * FROM usuarios");
        while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuarios[] = $filas;
        }
        return $this->usuarios;
    }

    public function deleteUser($id){
        $consulta = $this->db->query("DELETE * FROM usuarios WHERE id_usuario = '$id'");
        $fila = $consulta->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }
}
?>