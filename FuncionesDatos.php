<?php
class FuncionesDatos {
    public function obtenerDatos($login, $password){
        include 'config/conexion.php';

        $registro = $pdo->query("SELECT * FROM usuarios WHERE nick = '$login' AND password_login = '$password'")->fetchAll(PDO::FETCH_NUM);
        session_start();

        foreach ($registro as $dato):
            $_SESSION['id_usuario'] = $dato['0'];
            $_SESSION['nombre_usuario'] = $dato['1'];
            $_SESSION['usuario'] = $dato['2'];
            $_SESSION['password'] = $dato['3'];
            $_SESSION['apellido1'] = $dato['4'];
            $_SESSION['apellido2'] = $dato['5'];
            $_SESSION['rol'] = $dato['6'];
            $_SESSION['fechaAlta'] = date("d/m/Y", strtotime($dato['7']));
            $_SESSION['email'] = $dato['8'];
        endforeach;
    }

    public function ocultarDatos(){
        $cadena_a_buscar = str_split('12345');
        $punto = '·';
        $resultado = str_replace($cadena_a_buscar, $punto, '12345');
        return $resultado;
    }
}
?>