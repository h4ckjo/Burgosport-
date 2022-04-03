<?php
	$tituloPagina ="Burgosport";
	$pagina ="Inicio";
	include ('headerindex.php');
	require "../php/conn.php";

	if(isset($_POST['usuario'])){
		//variables temporales
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		
		//creamos el query
		$sql = "SELECT * FROM admin WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$r = mysqli_query($conn, $sql);
		$n = mysqli_num_rows($r);
		if($n==1){
			//iniciamos la sesion
			session_start();
			//creamos la variable de sesión
			$_SESSION['admin']=$usuario;
			//saltamos a la pagina de productos
			header("location:futbolABC.html");
		} else {
			$error="El usuario o la clave de acceso son incorrectos";
		}
	}
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8">
			<div class="well" style="margin-top:20px">
				<?php 
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>" . $error . "</strong>";
						print '</div>';
					}	
				?>
				<h2>INICIAR SESIÓN DE ADMINISTRADOR</h2>
				<form action="index.php" method="post">
					<div class="form-group text-left">
						<label for="usuario">*Usuario:</label>
						<input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Usuario"/>
					</div>
					<div class="form-group text-left">
						<label for="Clave">* Clave de acceso:</label>
						<input type="password" name="clave" id="clave" class="form-control" required placeholder="Clave de acceso"/>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-2">
		</div>
	</div>
</div>
<?php include('../inc/footer.php'); ?>