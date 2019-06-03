<!doctype html>
<html lang="es">
<head>
<title>Key-site</title>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css">
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
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark fondo">
			<a class="navbar-brand" href="index.php"><img src="images/logo.png"
				class="img-fluid" alt="logo" /></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a class="nav-link" data-toggle="modal"
						data-target="#workModal" href="#">C&oacute;mo funciona</a></li>
					<!-- workModal -->
					<div class="modal fade" id="workModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">C&Oacute;MO
										FUNCIONA KEY-SITE</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>&Uacute;nicamente despu&eacute;s de registrarte
										tendr&aacute;s que entrar en tu sesi&oacute;n con la
										contrase&ntilde;a generada y enviada a tu correo
										electr&oacute;nico y all&iacute; almacenar los sitios en los
										cuales te hayas registrado.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary"
										data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>

					<li class="nav-item active"><a class="nav-link" data-toggle="modal"
						data-target="#registerModal" href="#">Registrarse</a></li>

					<!-- Modal register -->
					<div class="modal fade" id="registerModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Formulario de
										registro</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>     
								<form method="post" action="Conexiones.php">
									<div class="modal-body">
										<div class="form-group">
											<label for="exampleInputUser">Nombre:</label> <input
												type="text" name="nombre" id="nombre" class="form-control">
										</div>
										<div class="form-group">
											<label for="exampleInputUser">Usuario:</label> <input
												type="text" name="usu" id="usu" class="form-control">
										</div>
										<div class="form-group">
											<label for="exampleInputUser">Primer apellido:</label> <input
												type="text" name="apellido1" id="apellido1"
												class="form-control">
										</div>
										<div class="form-group">
											<label for="exampleInputUser">Segundo apellido:</label> <input
												type="text" name="apellido2" id="apellido2"
												class="form-control">
										</div>
										<input type="hidden" name="oculto" value="registro">
										<p>Su contrase&ntilde;a de 10 d&iacute;gitos se
											generar&aacute; autom&aacute;ticamente y se enviar&aacute; a
											tu correo electr&oacute;nico.</p>
										<div class="form-group">
											<label for="exampleInputUser">Correo electr&oacute;nico</label>
											<input type="email" name="mail" id="mail"
												class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Cerrar</button>
										<button type="submit" class="btn btn-primary btnSubmit"
											name="enviando">Registrarse</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<li class="nav-item active"><a class="nav-link" data-toggle="modal"
						data-target="#loginModal" href="#">Iniciar sesi&oacute;n</a></li>

					<!-- Modal login -->
					<div class="modal fade" id="loginModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Formulario de
										inicio de sesi&oacute;n</h5>
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form method="post" action="Conexiones.php">
									<div class="modal-body">

										<div class="form-group">
											<label>Usuario:</label> <input type="text" name="usuario"
												class="form-control" value="" required />
										</div>
										<div class="form-group">
											<label>Contrase&ntilde;a:</label> <input type="password"
												name="contrasenya" class="form-control" value="" required />
										</div>
										<div class="form-group">
											<a href="forgot.php" class="ForgetPwd">Olvid&oacute; la
												contrase&ntilde;a</a>
										</div>
										<input type="hidden" name="oculto" value="inicio">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Cerrar</button>
										<button type="submit" class="btn btn-primary btnSubmit">Iniciar
											sesi&oacute;n</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</ul>
			</div>
		</nav>
	</header>
</body>
</html>