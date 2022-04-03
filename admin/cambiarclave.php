<?php
	$tituloPagina ="Burgosport";
	$pagina ="Cambiar Clave";
	session_start();
	if(!isset($_SESSION['admin'])){
		header ("location:index.html");
	}
	include ('header.php');
	require "../php/conn.php";

if(isset($_POST['clave1'])){
	$clave1 = $_POST['clave1'];
	$clave2 =$_POST['clave2'];
	//verificamos las claves
	if($clave1==$clave2){
		$clavex =hash_hmac("sha512", $clave1, "mimamamemima");
		//actualizar la clave
		$sql = "UPDATE admin SET clave='".$clavex."' WHERE id=1";
		if(mysqli_query($conn,$sql)){
			header("location:index.html");
		} else {
			$error = "Error al actualizar su clave";
		}
	} else {
		$error = "Las claves no coinciden";
	}
}
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
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
				<h2>CAMBIAR LA CLAVE DE ACCESO A MI SITIO</h2>
				<p>Ingrese su nueva clave:</p>
				<form action="cambiarclave.php" method="post">
					<div class="form-group text-left">
						<label for="Contraseña">* Contraseña:</label>
						<input type="password" name="clave1" id="clave1" class="form-control" required placeholder="Contraseña"/>
					</div>
					<div class="form-group text-left">
						<label for="Contraseña">* Repita su contraseña:</label>
						<input type="password" name="clave2" id="clave2" class="form-control" required placeholder="Repita su contraseña"/>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
		</div>
	</div>
</div>
<?php include('../inc/footer.php'); ?>