<?php
	$correo = $_POST['email'];
	if (isset($_POST['email'])){

		$email_to ="micorreo@gmail.com, $correo";
		$email_subject="Mi Sitio";

		//Validamos los datos ingresados por el usuario
		if(!isset($_POST['nombre']) ||
		!isset($_POST['apellidos']) ||
		!isset($_POST['email']) ||
		!isset($_POST['mensaje'])) {
			echo "<b>Ocurrió un error y su mansaje no ha sido enviado.</b><br/>";
			echo "Por favor, vuelva atrás y verifique la información";
			die();
		}

		$email_message="<center><h1>Contacto con Mi Sitio</h1></center" . "\n\n";
		$email_message.="<br>Nombre:" . $_POST['nombre'] . "\n";
		$email_message.="<br>Apellidos:" . $_POST['apellidos'] . "\n";
		$email_message.="<br>e-mail:" . $_POST['email'] . "\n";
		$email_message.="<br>Mensaje:" . $_POST['nombreensaje'] . "\r\n";
		$mensaje.='<footer><div class="container"<hr><p>&copy; Mi Sitio 2020</p></div></footer>';

		//enviamos con la funcion mail()php
		$headers ='MINE-Version:1.0' . "\r\n";
		$headers.='Content-type:text/html; charset=utf-8' . "\r\n";
		$headers.='From:' . $_POST['email'] . "\r\n" . 
					'Reply-To:' . $email_to . "\r\n" .
					'X-Mailer:PHP/' . phpversion();

		@mail($email_to, $email_subject, $email_message, $headers);
		header("Location:../contactogracias.html");
	}
	?>
	<?php
		if(!isset($_POST['email'])){
			exit;
		}
	?>