<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de Gesti&oacute;n y Administraci&oacute;n de
            contrase&ntilde;as online</title>
        <link rel="stylesheet" href="../../css/style.css" type="text/css"/>
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
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

        if (!isset($usu)) {
            header("location:../../index.php");
        }
        ?>
        <nav class="navbar fondo">
            <a class="navbar-brand" href="index.php"><img src="../../images/logo.png"class="img-fluid" alt="logo" /></a>
            <div class="S mb-3">
                <h3 class="mr-5">
                    Bienvenid@ <strong><?php echo $_SESSION['usuario'] ?></strong>
                </h3>
                <button type="button" class="btn btn-danger"
                        onClick="window.location.href='../cerrar.php'">
                    Cerrar sesi&oacute;n&nbsp;&nbsp;<i class="fas fa-power-off"></i>
                </button>
                <h5>Eres usuario</h5>
            </div>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search"
                       placeholder="Buscar" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>
        <?php
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
            $sql_limit = "SELECT * FROM sitios WHERE id_usuario='$id_usuario' LIMIT $empezar_desde, $sizeRegisters";
            $result = $pdo->prepare($sql_limit);
            $result->execute(array());
        ?>
        <div class="container">
            <h1 class="mt-3 mb-3">Tus Sitios</h1>
            <table class="table table-striped table-bordered text-center">
                <thead class="fondo">
                    <tr>
                        <th>Nombre del sitio</th>
                        <th>Usuario en el sitio</th>
                        <th>Contraseña en el sitio</th>
                        <th>Url del sitio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($registro = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo $registro['nombre_sitio'] ?></td>
                        <td><?php echo $registro['user'] ?></td>
                        <td class="hidetext"><?php echo $registro['password'] ?></td>
                        <td><?php echo $registro['url'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <button type="submit" class="btn btn-success btnSubmit" onclick="window.location.href='nuevoSitio.php'">Añadir un nuevo sitio</button>
            </table>
        </div>
    </body>
</html>
