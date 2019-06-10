<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sistema de Gesti&oacute;n y Administraci&oacute;n de
            contrase&ntilde;as online</title>
        <link rel="stylesheet" href="../../../css/style.css" />
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../images/logo.ico">
        <link rel="stylesheet"
              href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
              integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        include'navbar.php'; ?>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../../images/block.jpg" class="d-block w-100" alt="Key-site" style="height: 250px;opacity: 0.8;">
                </div>
            </div>
        </div>
        <?php include'../conexion.php';
        $id = $_GET['id'];
        $sql = "SELECT id_usuario, nick FROM usuarios WHERE id_usuario NOT IN (SELECT id_usuario FROM usuarios NATURAL JOIN sitios)";
        $resultado = $conexion->prepare($sql);
        $resultado->execute(array());
        $data[] = array();

        while ($noTienen = $resultado->fetch(PDO::FETCH_ASSOC)){
            array_push($data, $noTienen['id_usuario']);
        }

        if (in_array($id, $data)) { ?>
        <h1 class="m-5"><span class="badge badge-danger">Este usuario no tiene sitios que mostrar</span></h1>
        <?php }else{
            $sql = "SELECT * FROM usuarios NATURAL JOIN sitios WHERE usuarios.id_usuario = $id";
            $registro = $conexion->query($sql)->fetch();
        ?>
        <div class="container">
            <h1 class="mt-3 mb-3">Sitios de <strong><?php echo $registro['nick'] ?></strong></h1>
            <table class="table table-striped table-bordered text-center">
                <thead class="fondo">
                    <tr>
                        <th>Nombre del sitio</th>
                        <th>Usuario en el sitio</th>
                        <th>Contraseña en el sitio</th>
                        <th>Url del sitio</th>
                    </tr>
                </thead>
                <?php

                ?>
                <tbody>
                    <?php foreach ($conexion->query($sql) as $registro) { ?>
                    <tr>
                        <td><?php echo $registro['nombre_sitio'] ?></td>
                        <td><?php echo $registro['user'] ?></td>
                        <td class="hidetext"><?php echo $registro['password'] ?></td>
                        <td><?php echo $registro['url'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </body>
</html>