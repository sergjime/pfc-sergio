<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar usuario</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../images/logo.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
        session_start();
        include 'navbar.php';
        ?>
        <div class="container mt-5">
            <form method="post" action="sitioNuevo.php">
                <input type="hidden" name="id" value="">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario'] ?>">
                <div class="form-group">
                    <label for="exampleInputNom">Nombre del sitio</label>
                    <input type="text" name="site" class="form-control" id="exampleInputNom" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputNick">Usuario</label>
                    <input type="text" name="nick" class="form-control" id="exampleInputNick" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Url del sitio</label>
                    <input type="text" name="url" class="form-control" id="exampleInputPassword1" value="">
                </div>
                <button type="submit" class="btn btn-primary">Crear nuevo sitio</button>
            </form>
        </div>
    </body>
</html>