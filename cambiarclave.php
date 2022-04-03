<?php
	$tituloPagina ="Burgosports";
	$pagina ="Cambiar Clave";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	

	//detactamos si se envía la información
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		//leemos los datos del usuario
		$sql = "SELECT * FROM users WHERE id=".$id;
		$r = mysqli_query($conn,$sql);
		$n = mysqli_num_rows($r);
		if($n!=1){
			header("location:index.html");
		}
	}
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$clave1 = $_POST['clave1'];
	$clave2 =$_POST['clave2'];
	//verificamos las claves
	if($clave1==$clave2){
		$clave =hash_hmac("sha512", $clave1, "mimamamemima");
		//actualizar la clave
		$sql = "UPDATE users SET clave='".$clave." ' WHERE id=".$id;
		if(mysqli_query($conn,$sql)){
			header("location:cambiarclavegracias.html");
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
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
				<?php 
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>" . $error . "</strong>";
						print '</div>';
					}	
				?>
				<h2>CAMBIAR LA CLAVE DE ACCESO A BURGOSPORTS</h2>
				<p>Ingrese sus datos:</p>
				<form action="cambiarclave.php" method="post">
				;	<div class="form-group text-left">
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
						<input type="hidden" name="id" id="id" value="<?php print $id; ?>"/>
				</form>
			</div>
		</div>
		<div class="col-sm-4 sidenav">
                       
					   <div class="well">
						   <img src="img/deporteLogin.jpg"  width="540px" height="470px"></a>
					   </div>
		</div>	
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>