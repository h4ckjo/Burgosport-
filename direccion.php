<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Datos de Envío";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";

	if(!isset($_SESSION['usuario'])){
		header ("location:login.html");
		exit;
	}
	//Variables de trabajo
		$nombre = $_SESSION["usuario"]["nombre"];
		$apellidos=$_SESSION["usuario"]['apellidos'];
		$email=$_SESSION["usuario"]['email'];
		$direccion=$_SESSION["usuario"]['direccion'];
		$poblacion=$_SESSION["usuario"]['poblacion'];
		$codpost=$_SESSION["usuario"]['codpost'];
		$provincia=$_SESSION["usuario"]['provincia'];
		$telefono=$_SESSION["usuario"]['telefono'];
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-8">
			<div class="well" style="margin-top:20px">
				<ol class="breadcrumb">
					<li><a href="checkout.html">Iniciar Sesión</a></li>
					<li class="active">Datos de Envío</a></li>
					<li>Forma de Pago</a></li>
					<li>Revisar Datos</a></li>
				</ol>
				<h2>DATOS DE ENVÍO</h2>
				<p>Verifique sus datos:</p>
				<form action="pago.html" method="post">
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre" value="<?php print $nombre; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Apellidos">* Apellidos:</label>
						<input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos" value="<?php print $apellidos; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="e-mail">*e-mail:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="e-mail" value="<?php print $email; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Dirección">* Dirección</label>
						<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Dirección" value="<?php print $direccion; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Población">* Población</label>
						<input type="text" name="poblacion" id="poblacion" class="form-control" required placeholder="Población" value="<?php print $poblacion; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Código Postal">* Código Postal</label>
						<input type="text" name="codpost" id="codpost" class="form-control" required placeholder="Código Postal" value="<?php print $codpost; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Provincia">* Provincia</label>
						<input type="text" name="provincia" id="provincia" class="form-control" required placeholder="Provincia" value="<?php print $provincia; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Teléfono">* Teléfono</label>
						<input type="text" name="telefono" id="telefono" class="form-control" required placeholder="Teléfono" value="<?php print $telefono; ?>"/>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Continuar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4>Productos Nuevos</h4>
				<?php nuevos($conn); ?>
		</div>	
		
		<div class="col-sm-2 sidenav">
			<h4>Productos más Vendidos</h4>
				<?php masVendidos($conn); ?>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>