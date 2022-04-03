<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Checkout";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	$saltaPagina = "direccion.html";

	if(isset($_SESSION['usuario'])){
		header ("location:".$saltaPagina);
		exit;
	} 
	require "php/login.php";
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
				<ol class="breadcrumb">
					<li class="active">Iniciar Sesión</li>
					<li>Datos de Envío</a></li>
					<li>Forma de Pago</a></li>
					<li>Revisar Datos</a></li>
				</ol>
				<h2>CHECKOUT</h2>
				<form>
					<div class="form-group text-left">
						<label for="e-mail">*Correo Electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Correo electrónico"/>
					</div>
					<div class="form-group text-left">
						<label for="Contraseña">* Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Clave de acceso" />
					</div>
					<div class="form-group text-center">
						<label><input type="checkbox" name="recordarme" id="recordarme"/>Recordarme</label>
					</div>
					<a href="direccion.html" class="btn btn-success">Enviar</a>
				</form>
			</div>
			<div class="well">
				<a href="olvido.html" class="btn btn-info">Olvidó su Contraseña</a>
				<br><br>
				<a href="registro.html" class="btn btn-info">Registrarse en Mi Sitio</a>
			</div>
		</div>
		<div class="col-sm-4 sidenav">
                       
					   <div class="well">
						   <img src="img/deporteLogin.jpg"  width="540px" height="470px"></a>
					   </div>
		</div>	
	</div>
</div>
<?php include('inc/footer.php'); ?>