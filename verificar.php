<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Verifique sus datos";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	require "php/carrito.php";

	if(!isset($_SESSION["usuario"])){
		header("location:login.php");
		exit;
	}

	if(isset($_POST['pago'])){
		$pago = $_POST['pago'];
	}
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<h4>Productos más Vendidos</h4>
				<?php masVendidos($conn); ?>
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor" style="margin-top:20px">
				<ol class="breadcrumb">
					<li><a href="checkout.html">Iniciar Sesión</a></li>
					<li><a href="direccion.html">Datos de Envío</a></li>
					<li><a href="pago.html">Forma de Pago</a></li>
					<li class="active">Revisar Datos</a></li>
				</ol>
				<h2> Revise sus Datos </h2>
				<p>Metodo de Pago:<strong>  <?php print $pago; ?></strong></p>
				<p>Nombre:<strong>  <?php print $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apellidos"]; ?></strong></p>
				<p>Dirección:<strong> <?php print $_SESSION["usuario"]["direccion"];?></strong></p>
				<p>Población:<strong> <?php print $_SESSION["usuario"]["poblacion"];?></strong></p></p>
				<p>Código Postal:<strong><?php print $_SESSION["usuario"]["codpost"];?></strong></p></p>
				<p>Provincia: <strong><?php print $_SESSION["usuario"]["provincia"];?></strong></p></p>
				<p>e-mail:<strong> <?php print $_SESSION["usuario"]["email"];?></strong></p></p>
				<br><br>
				
				<?php  despliegaCarritoCompleto($carrito, 1, $conn); ?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			<h4>Productos Nuevos</h4>
				<?php nuevos($conn); ?>
		</div>	
	</div>
</div>
<?php include('inc/footer.php'); ?>
