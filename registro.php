<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Registro";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";

	$errores = array();
	if (isset($_POST['nombre'])){
		$nombre = $_POST["nombre"];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
		$clave1=$_POST['clave1'];
		$clave2=$_POST['clave2'];
		$direccion=$_POST['direccion'];
		$poblacion=$_POST['poblacion'];
		$codpost=$_POST['codpost'];
		$provincia=$_POST['provincia'];
		$telefono=$_POST['telefono'];

		if($nombre==""){
			$errores[0] = "El campo es requerido";
		} else if ($apellidos=="") {
			$errores[1] = "El campo es requerido";
		} else if ($email=="") {
			$errores[2] = "El campo es requerido";
		} else if ($clave1=="") {
			$errores[3] = "El campo es requerido";
		} else if ($clave2=="") {
			$errores[4] = "El campo es requerido";
		} else if ($direccion=="") {
			$errores[5] = "El campo es requerido";
		} else if ($poblacion=="") {
			$errores[6] = "El campo es requerido";
		} else if ($codpost=="") {
			$errores[7] = "El campo es requerido";
		} else if ($provincia=="") {
			$errores[8] = "El campo es requerido";
		} else if ($telefono=="") {
			$errores[9] = "El campo es requerido";
		} else if ($clave1!==$clave2) {
			$errores[10] = "Las claves deben coincidir";
		} else {
			if(validaCorreo($email,$conn)){
			$clave =hash_hmac("sha512", $clave1, "mimamamemima");
			$sql="INSERT INTO users VALUES(0,";
			$sql.="'".$nombre."','".$apellidos."',";
			$sql.="'".$email."','".$clave1."',";
			$sql.="'".$clave2."','".$direccion."',";
			$sql.="'".$poblacion."','".$codpost."',";
			$sql.="'".$provincia."','".$telefono."','".$clave."')";
			
			if(mysqli_query($conn,$sql)){
				header ("location:registrogracias.html");
			} else {
				$errores[11] = "Error en la inserción de datos";
			}
			} else {
			$errores[12]= "El correo ya existe en la base de datos";
			}
		}
	}

	function validaCorreo($email,$conn){
		$sql="SELECT * FROM users WHERE email='".$email."'";
		$r = mysqli_query($conn,$sql);
		$n= mysqli_num_rows($r); //el numero de filas encontradas
		$bandera = ($n==0)? true : false;
		return $bandera;
	}
?>
<div class="container-fluid text-center">
	<div class="row-content">
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
					<?php 
					if(count($errores)>0){
						print '<div class="alert alert-danger">';
						foreach ($errores as $key => $valor){
							print "<strong>" . $valor . "</strong>";
							}
						print '</div>';
					}	
					?>
				<h2>REGISTRARSE EN BURGOSPORTS</h2>
				<p>Ingrese sus datos:</p>
				<form action="registro.php" method="post">
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
					</div>
					<div class="form-group text-left">
						<label for="Apellidos">* Apellidos:</label>
						<input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos"/>
					</div>
					<div class="form-group text-left">
						<label for="e-mail">*e-mail:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="e-mail"/>
					</div>
					<div class="form-group text-left">
						<label for="Contraseña">* Contraseña:</label>
						<input type="password" name="clave1" id="clave1" class="form-control" required placeholder="Contraseña"/>
					</div>
					<div class="form-group text-left">
						<label for="Contraseña">* Repita su contraseña:</label>
						<input type="password" name="clave2" id="clave2" class="form-control" required placeholder="Repita su contraseña"/>
					</div>
					<div class="form-group text-left">
						<label for="Dirección">* Dirección</label>
						<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Dirección"/>
					</div>
						<div class="form-group text-left">
						<label for="Población">* Población</label>
						<input type="text" name="poblacion" id="poblacion" class="form-control" required placeholder="Población"/>
					</div>
					<div class="form-group text-left">
						<label for="Código Postal">* Código Postal</label>
						<input type="text" name="codpost" id="codpost" class="form-control" required placeholder="Código Postal"/>
					</div>
						<div class="form-group text-left">
						<label for="Provincia">* Provincia</label>
						<input type="text" name="provincia" id="provincia" class="form-control" required placeholder="Provincia"/>
					</div>
						<div class="form-group text-left">
						<label for="Teléfono">* Teléfono</label>
						<input type="text" name="telefono" id="telefono" class="form-control" required placeholder="Teléfono"/>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		<br>
		<div class="col-sm-5 sidenav">
		
		<div class="well">
			<a><img src="img/desierto.jpg" class="media-object img-resposvive" width="100%" height="900px"></a>
		</div>
		</div>
		
	</div>
</div>
<?php include('inc/footer.php'); ?>