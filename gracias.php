<?php
	$tituloPagina ="Burgosports";
	$pagina ="Contacto";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	require "php/carrito.php";

	if (isset($_SESSION["carrito"])) {
		$carrito = $_SESSION["carrito"];
	} else {
		header("location:login.php");
		exit;
	}

	$sql = "UPDATE carrito ";
	$sql .= "SET estado='1', idUsuario=".$_SESSION["usuario"]["id"];
	$sql .= " WHERE num='".$carrito."'";
	//Ejecutamos el query
	if(mysqli_query($conn, $sql)){
	//Borramos las variables
	unset($carrito);
	unset($_SESSION["carrito"]);
	} else {
	//Mensaje de error
	$error = "Error al grabar su compra en la base de datos";
}

?>
<div class="container-fluid text-center">
	<div class="row content">
	<div class="col-sm-6 sidenav">
       
	   <div class="well">
		   <img src="img/botaf.jpg"  width="100%" height="550px">
	   </div>
	</div>
		<div class="col-sm-6" >
			<div class="well" style="margin-top:40px">
			<?php 
				if(isset($error)){
					print '<div class="alert alert-danger">';
					print '<strong>'.$error.'</strong>';
					print '</div>';
				} else {
					print '<h2>Gracias por su compra</h2>';
					print '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut massa eget 
					odio porttitor rutrum. Aliquam vulputate lacus sem, non congue mauris venenatis id. 
					Praesent elementum in purus ut dictum. Pellentesque habitant morbi tristique senectus
					et netus et malesuada fames ac turpis egestas. Sed nec sodales ligula. Duis lobortis 
					hendrerit enim, condimentum accumsan purus pellentesque ac. Phasellus neque nisl, 
					scelerisque vel leo ac, condimentum sodales mauris.</p>';
					print '<p>Revise el span si no encuentra nuestro mensaje en la bandeja de entrada</p>';
					print '<br><br>';
					print '<a href="index.php" class="btn btn-success" role="button">Volver</a>';
				}
			?>	


				
			</div>
		</div>
		
	</div>
</div>
</div>
<?php include('inc/footer.php'); ?>

			