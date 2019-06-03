<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar usuario</title>
        <link rel="stylesheet" href="../../../css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php 
        session_start();
        include'navbar.php';
        include'../conexion.php';
        $id = $_GET['id'];
        $registro = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = '$id'")->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="container">
            <form method="post" action="../model/editar.php">
               <input type="hidden" name="id" value="<?php echo $registro['id_usuario']?>">
                <div class="form-group">
                    <label for="exampleInputNom">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="exampleInputNom" value="<?php echo $registro['nombre']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputNick">Nick</label>
                    <input type="text" name="nick" class="form-control" id="exampleInputNick" value="<?php echo $registro['nick']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputNom">Primer apellido</label>
                    <input type="text" name="ape1" class="form-control" id="exampleInputNom" value="<?php echo $registro['apellido1']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputNick">Segundo apellido</label>
                    <input type="text" name="ape2" class="form-control" id="exampleInputNick" value="<?php echo $registro['apellido2']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $registro['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" value="<?php echo $registro['password_login'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </body>
</html>