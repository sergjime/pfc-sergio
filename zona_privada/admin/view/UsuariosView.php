<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de Gesti&oacute;n y Administraci&oacute;n de
            contrase&ntilde;as online</title>
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                crossorigin="anonymous"></script>
        <script
                src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    </head>
    <body>
        <?php
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $usu = $_SESSION['usuario'];
        $pass = $_SESSION['password'];

        if (! isset($usu)) {
            header("location:../../index.php");
        }

        include_once 'navbar.php';
        require '../../config/conexion.php';
        $sizeRegisters = 3; // Cuantos registros se mostrarán por página

        if (! isset($_GET['pagina'])) {
            $pagina = 1;
        } else {
            $pagina = $_GET['pagina'];
        }

        $empezar_desde = ($pagina - 1) * $sizeRegisters;
        $sql_total = "SELECT * FROM usuarios";
        $resultado = $pdo->prepare($sql_total);
        $resultado->execute(array());
        $num_filas = $resultado->rowCount();
        $totalPages = ceil($num_filas / $sizeRegisters);
        $resultado->closeCursor();
        /* CONSULTA CON EL LIMIT */
        $sql_limit = "SELECT * FROM usuarios LIMIT $empezar_desde, $sizeRegisters";
        $result = $pdo->prepare($sql_limit);
        $result->execute(array());
        ?>


        <div class="container-fluid ml-5 mr-5">
            <div class="row">
                <div><h1 class="mt-3 mb-3">Usuarios</h1></div>
                <div>&nbsp;&nbsp;<span class="badge badge-secondary">En total hay <?php echo $num_filas ?> usuarios</span></div>
            </div>
            <div class="row">
                <?php foreach ($matrizUsuarios as $usuario) { ?>
                <div class="card-deck w-25">
                    <div class="card p-1 text-center">
                        <div class="card-header">
                            <h3><?php echo $usuario["nick"] ?></h3>
                        </div>
                        <img class="img-fluid" src="descarga.jpg" alt="">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $usuario["nombre"] ?></h3>
                            <p class="card-text"><?php echo $usuario["email"] ?></p>
                            <a href="view/UsuariosSitios.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn btn-success btn-lg btn-block mb-2">Ver sitios&nbsp;&nbsp;<i class="fas fa-sitemap"></i></a>
                            <div>
                                <a href="view/UsuariosEditar.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn btn-warning btn-sm">Editar&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                <a href="model/borrar.php?id=<?php echo $usuario['id_usuario'] ?>" class="btn btn-danger btn-sm">Eliminar&nbsp;&nbsp;<i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <div class="card-footer">
                            Lleva desde el <?php echo $usuario["fecha_alta"] ?> registrado.
                        </div>
                    </div>              
                </div>  
                <?php } ?> 
            </div>   
        </div>
    </body>
</html>
