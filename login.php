<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Login";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	$saltaPagina = "index.php";
	require "php/login.php";
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
				<?php 
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>" . $error . "</strong>";
						print '</div>';
					}	
				?>
				<h2>INICIAR SESIÓN</h2>
				<form action="login.php" method="post">
					<div class="form-group text-left">
						<label for="e-mail">*Correo Electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Correo electrónico" value="<?php print $email; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Contraseña">* Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Clave de acceso" value="<?php print $clave; ?>"/>
					</div>
					<div class="form-group text-center">
						<label><input type="checkbox" name="recordarme" id="recordarme" <?php print $recordarme; ?>/>Recordarme</label>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
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