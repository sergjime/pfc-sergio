<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio se sesión</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <link rel="icon" type="image/vnd.microsoft.icon" href="images/logo.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
    </head>
    <body>
        <?php 
        if (isset($_GET['rol'])) {
            $rol = $_GET['rol'];
        } else{
            $_GET['registro'] = '';
        } 
        ?>
        <script>
            Swal.fire({
                position: 'top',
                type: 'success',
                title: 'Bienvenido, acabas de iniciar sesión',
                showConfirmButton: true
            }).then((result) => {
                if (result.value) {
                    window.location="zona_privada/<?php echo $rol ?>";
                }
            })
        </script>
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
    </body>
</html>