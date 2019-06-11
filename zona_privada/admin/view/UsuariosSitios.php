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
        <div class="container-fluid">
            <h1 class="mt-3 mb-3">Sitios de <strong><?php echo $registro['nick'] ?></strong></h1>
            <table class="table table-striped table-bordered text-center w-60">
                <thead class="fondo">
                    <tr>
                        <th>Nombre del sitio</th>
                        <th>Usuario en el sitio</th>
                        <th>Contraseña en el sitio</th>
                        <th>Url del sitio</th>
                        <th>Eliminar sitio</th>
                    </tr>
                </thead>
                <?php

                ?>
                <tbody>
                    <?php foreach ($conexion->query($sql) as $registro) { ?>
                    <tr>
                        <td>
                            <?php echo $registro['nombre_sitio'] ?>
                            <button type="button" class="btn btn-default btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="<?php echo $registro['nombre_sitio'] ?>" title="Copiar">
                                <!-- icon from google's material design library -->
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg>
                            </button>
                        </td>
                        <td>
                            <?php echo $registro['user'] ?>
                            <button type="button" class="btn btn-default btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="<?php echo $registro['user'] ?>" title="Copiar">
                                <!-- icon from google's material design library -->
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg>
                            </button>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-default btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="<?php echo $registro['password'] ?>" title="Copiar">
                                        <!-- icon from google's material design library -->
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg>
                                    </button>
                                </div>
                                <input type="password" class="form-control" value="<?php echo $registro['password'] ?>" size="4" disabled>
                            </div>
                        </td>
                        <td>
                            <?php echo $registro['url'] ?>
                            <button type="button" class="btn btn-default btn-copy js-tooltip js-copy" data-toggle="tooltip" data-placement="bottom" data-copy="<?php echo $registro['url'] ?>" title="Copiar">
                                <!-- icon from google's material design library -->
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24"><path d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z" /></svg>
                            </button>
                        </td>
                        <td> 
                            <div>
                                <a href="../../user/borrar.php?id=<?php echo $id_usuario ?>" class="btn btn-danger btn-sm">Eliminar&nbsp;&nbsp;<i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <script>
            function copyToClipboard(text, el) {
                var copyTest = document.queryCommandSupported('copy');
                var elOriginalText = el.attr('data-original-title');

                if (copyTest === true) {
                    var copyTextArea = document.createElement("textarea");
                    copyTextArea.value = text;
                    document.body.appendChild(copyTextArea);
                    copyTextArea.select();
                    try {
                        var successful = document.execCommand('copy');
                        var msg = successful ? 'Texto copiado!' : 'Ups, no lo copió!';
                        el.attr('data-original-title', msg).tooltip('show');
                    } catch (err) {
                        console.log('Oops, unable to copy');
                    }
                    document.body.removeChild(copyTextArea);
                    el.attr('data-original-title', elOriginalText);
                } else {
                    // Fallback if browser doesn't support .execCommand('copy')
                    window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
                }
            }

            $(document).ready(function() {
                // Initialize
                // ---------------------------------------------------------------------

                // Tooltips
                // Requires Bootstrap 3 for functionality
                $('.js-tooltip').tooltip();

                // Copy to clipboard
                // Grab any text in the attribute 'data-copy' and pass it to the 
                // copy function
                $('.js-copy').click(function() {
                    var text = $(this).attr('data-copy');
                    var el = $(this);
                    copyToClipboard(text, el);
                });
            });
        </script>
    </body>
</html>