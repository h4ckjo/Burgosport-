<?php
	$tituloPagina ="Burgosports";
	$pagina ="Fútbol";
	include('inc/headertienda.php'); 
?>

<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="futbol.php">Fútbol</a></li>
			<li><a href="camisetasfutbol.php">Camisetas</a></li>
			<li><a href="botasfutbol.php">Botas</a></li>
			<li><a href="chandalsfutbol.php">Chandals</a></li>
			<li><a href="complementosfutbol.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetasfutbol.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetasfutbol.html">
					<img src="img/futbol/camisetas0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="botasfutbol.php">BOTAS</a></h1>
				</div>
			<a href="botasfutbol.html">
				<img src="img/futbol/bota0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="chandalsfutbol.php">CHANDALS</a></h1>
				</div>
			<a href="chandalsfutbol.html">
				<img src="img/futbol/chandal0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementosfutbol.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementosfutbol.html">
				<img src="img/futbol/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>