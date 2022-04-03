<?php
	session_start();
	//preguntamos si existe la variable usuario
	if(isset($_SESSION['usuario'])){
		$nombre = $_SESSION['usuario'] ['nombre'];
		$apellidos = $_SESSION['usuario'] ['apellidos'];
	} 
?>