<?php
if(isset($_POST['email'])){
		$email = $_POST['email'];
		$clave = $_POST['clave'];
		//encriptar la clave
		$clave2 = hash_hmac("sha512", $clave, "mimamamemima");
		//recuerdame
		@$recordarme = $_POST['recordarme'];
		$nombre = "datos";
		$valor = $email. "|" .$clave;
		if($recordarme=="on"){
			$fecha = time() + (60*60*24*7);
		} else {
			$fecha = time() - 1;
		}
		setcookie($nombre,$valor,$fecha);

		//creamos el query
		$sql="SELECT * FROM users WHERE email='".$email."' AND clave='".$clave2."'";
		$r = mysqli_query($conn,$sql);
		$n = mysqli_num_rows($r);
		//clave y el usuario son correctos
		if($n==1){
			//pasamos los datos a un objeto
			$usuario = mysqli_fetch_assoc($r);
			//iniciamos la sesión
			session_start();
			//creamos la variable de usuario
			$_SESSION['usuario'] = $usuario;
			header("location:".$saltaPagina);
		} else {
			$error = "Clave de acceso o correo electrónico incorrecto";
		}
	}
@$datos=$_COOKIE['datos'];
$email="";
$clave="";
$recordarme="";
if(isset($datos)){
	$aDatos= explode("|", $datos);
	$email=$aDatos[0];
	$clave=$aDatos[1];
	$recordarme="checked";
}
?>