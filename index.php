<!doctype html>
<html lang="es">
    <head>
        <title>Key-site</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php include 'config/conexion.php' ?>
        <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo ICON ?>">
        <link rel="stylesheet" href="<?php echo CSS ?>" />
        <?php echo CDN_FONTAWESOME ?>
        <?php echo CDN_BOOTSTRAP ?>
        <?php echo CDN_SWEETALERT ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'carrousel.php' ?>       
        <section class="m-2 pt-3 pl-5 pr-5 pb-3">
            <div class="lp-product-attributes__title-section">
                <h4 class="m-4">Key-site es un administrador de contraseñas online en el cual tú
                    como usuario serás capaz de almacenar aquellos registros que hagas
                    (correo electrónico, foros, etc.) durante toda la vida, se
                    almacenarán en tu sesión de manera que sólo tú serás capaz de entrar
                    para visualizar los sitios web en los cuales te registraste.
                    Key-site le permitirá olvidarse de complicados procedimientos para
                    recuperar contraseñas y dedicar ese tiempo a disfrutar de las cosas
                    que más le gustan.</h4>
            </div>
            <div class="row text-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/InicieUnaVez.PNG" class="img-fluid"
                                 alt="Inicie sesión">
                            <h3 class="card-title">Inicie sesión una vez y listos</h3>
                            <p class="card-text">En cuanto guarde una contraseña en key-site
                                la tendrá siempre a mano, para que iniciar sesión le resulte
                                rápido y sencillo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/ContrasenaSeguras.PNG" class="img-fluid"
                                 alt="Contraseñas seguras">
                            <h3 class="card-title">Genere contraseñas seguras</h3>
                            <p class="card-text">El generador de contraseñas integrado le
                                permite crear largas contraseñas aleatorias que mantendrán a raya
                                a los hackers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php' ?>
    </body>
</html>