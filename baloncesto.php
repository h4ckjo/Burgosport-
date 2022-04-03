<?php
	$tituloPagina = "Burgosports";
	$pagina = "Baloncesto";
	include ('inc/header.php');
	require "php/conn.php";
?>

<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="baloncesto.php">Baloncesto</a></li>
			<li><a href="camisetasbaloncesto.php">Camisetas</a></li>
			<li><a href="botasbaloncesto.php">Zapatillas</a></li>
			<li><a href="chandalsbaloncesto.php">Chandals</a></li>
			<li><a href="complementosbaloncesto.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetasbaloncesto.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetasbaloncesto.html">
					<img src="img/baloncesto/camisetas0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="botasfutbol.php">BOTAS</a></h1>
				</div>
			<a href="botasbaloncesto.html">
				<img src="img/baloncesto/bota0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="chandalsbaloncesto.php">CHANDALS</a></h1>
				</div>
			<a href="chandalsbaloncesto.html">
				<img src="img/baloncesto/chandal0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementosbaloncesto.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementosbaloncesto.html">
				<img src="img/baloncesto/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>

<?php include('inc/footer.php'); ?>