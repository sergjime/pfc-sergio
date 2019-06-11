<nav class="navbar fondo">
    <a class="navbar-brand" href="index.php">
        <img src="../../../images/logo.png" class="img-fluid" alt="logo" /></a>
        <link rel="icon" type="image/vnd.microsoft.icon" href="../../../images/logo.ico">
    <div class="S mb-3">
        <h3 class="mr-5">
            Bienvenid@ <strong><?php echo $_SESSION['usuario'];
            if (strcmp($_SESSION['rol'], 'admin') !== 0){
                header("Location:../../../index.php");
            }?></strong>
        </h3>
    </div>
    <div class="dropdown">
        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left: 100px;">
            <img src="../../../images/avatars/<?php echo $_SESSION['usuario'] . '_' . $_SESSION['avatar'] ?>" alt="Avatar" width="50" height="50">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" onclick="window.location.href='../../../cambiar.php'">Cambiar contraseña&nbsp;&nbsp;<i class="fa fa-lock"></i></button>
            <button class="dropdown-item" type="button" onclick="window.location.href='../../cerrar.php'">Cerrar sesión&nbsp;&nbsp;<i class="fas fa-power-off"></i></button>
        </div>
    </div>
</nav>