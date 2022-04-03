<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Login";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";

	if(isset($_POST['email'])){
		$email = $_POST['email'];
		//buscamos elk correo en la bbdd
		$sql = "SELECT * FROM users WHERE email='".$email."'";
		//verificamos que exite el email
		$r = mysqli_query($conn,$sql);
		$n = mysqli_num_rows($r);
		if($n==1){
			$data=mysqli_fetch_assoc($r);
			$id =$data['id'];
			//mandamos un email
			$mensaje = "Entra aquí para cambiar tu clave de MI SITIO.<br>";
			$mensaje.="<a href='localhost/sitio/cambiarclave.php?id=".$id.">Cambia la Clave de acceso</a>";

			$headers="MIME-Version:1.0\r\n";
			$headers.="Content-type:text/html; charset=UTF-8\r\n";
			$headers.="From:Mi Sitio\r\n";
			$headers.="Reply-to:$email\r\n";

			$asunto="Cambiar la clave de acceso";
			if(mail($email, $asunto, $mensaje, $headers)){
				header("location:olvidogracias.html");
			} else {
				$error ="Error en el envío del correo, inténtelo más tarde";
			}
		} else {
			$error = "El correo no existe en la base de datos";
		}
	}
?>
<div class="container-fluid text-center">
	<div class="row-content">
		<div class="col-sm-6">
			<div class="well" style="margin-top:20px">
				<?php 
					if(isset($error)){
						print '<div class="alert alert-danger">';
						print "<strong>" . $error . "</strong>";
						print '</div>';
					}	
				?>
				<h2>RECUPERAR MI CONTRASEÑA</h2>
				<form action="olvido.html" method="post">
					<div class="form-group text-left">
						<label for="e-mail">*Correo Electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Correo electrónico"/>
					</div>
					
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
			
		</div>
		<div class="col-sm-6 sidenav">
       
	   <div class="well">
		   <img src="img/botaf.jpg"  width="100%" height="550px">
	   </div>
		
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>