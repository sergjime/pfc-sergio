<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Olvid&oacute; contrase&ntilde;a</title>
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
    </head>
    <body>
        <?php 
        include_once 'navbar.php';
        include_once 'carrousel.php';
        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 p-3 mx-auto border rounded-sm">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h2 class="text-center">¿Quiere cambiar la contrase&ntilde;a?</h2>
                                <p>Le volveremos a iniciar sesión en cuanto la cambie</p>
                                <div class="panel-body">
                                    <form id="register-form" role="form" autocomplete="off"
                                          class="form" method="post" action="cambiarPass.php">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="nombre" name="nombre" placeholder="Nombre de usuario"
                                                       class="form-control" type="nombre">
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="email" name="email" placeholder="Email del usuario"
                                                           class="form-control" type="email">
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input id="pass" name="pass" placeholder="Nueva contraseña"
                                                               class="form-control" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input name="recover-submit"
                                                           class="btn btn-lg btn-primary btn-block"
                                                           value="Actualizar contraseña" type="submit">
                                                </div>
                                                </form>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </body>
            </html>