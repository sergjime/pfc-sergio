        <nav class="navbar fondo">
            <a class="navbar-brand" href="index.php"><img src="../../images/logo.png"
                                                          class="img-fluid" alt="logo" /></a>
            <div class="S mb-3">
                <h3 class="mr-5">
                    Bienvenid@ <strong><?php echo $_SESSION['usuario'] ?></strong>
                </h3>
                <button type="button" class="btn btn-danger"
                        onClick="window.location.href='../cerrar.php'">
                    Cerrar sesi&oacute;n&nbsp;&nbsp;<i class="fas fa-power-off"></i>
                </button>
                <h5>Eres administrador</h5>
            </div>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search"
                       placeholder="Buscar" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>