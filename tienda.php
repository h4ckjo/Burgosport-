<?php
	$tituloPagina = "Mi Sitio";
	$pagina = "Tienda";
	include ('inc/header.php');
	require "php/conn.php";
?>

<div class="jumbotron1">
	<div class="container text-center">
		<h1>Todos los deportes</h1>
		<h3>Ropa y accesorios para todo el mundo</h3>
	</div>
</div>
<br>
<div class="container-fluid bg-3 text-center">
<div class="container-fluid bg-3 text-center">
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="futbol.php">FÚTBOL</a></h1>
				</div>
				<a href="futbol.html">
					<img src="img/futbol/portada1.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h2><strong><a style="color:white" href="baloncesto.php">BALONCESTO</a></h2>
				</div>
			<a href="baloncesto.html">
				<img src="img/baloncesto/portada2.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="ciclismo.php">CICLISMO</a></h1>
				</div>
			<a href="ciclismo.html">
				<img src="img/ciclismo/portada3.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="surf.php">SURF</a></h1>
				</div>
			<a href="surf.html">
				<img src="img/surf/portada4.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>

<div class="container-fluid bg-3 text-center">
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="running.php">RUNNING</a></h1>
				</div>
			<a href="running.html">
				<img src="img/running/portada5.jpg" class="img-responsive img-rounded" style="width:100%" alt="Running">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="outdoor.php">OUTDOOR</a></h1>
				</div>
			<a href="outdoor.html">
				<img src="img/outdoor/portada6.jpg" class="img-responsive img-rounded" style="width:100%" alt="Outdoor">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="tenis.php">TENIS</a></h1>
				</div>
			<a href="tenis.html">
				<img src="img/tenis/portada7.jpg" class="img-responsive img-rounded" style="width:100%" alt="Tenis">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="outlet.php">OUTLET</a></h1>
				</div>
			<a href="outlet.html">
				<img src="img/outlet/portada8.jpg" class="img-responsive img-rounded" style="width:100%" alt="Outlet">
			</a>
			</div>
		</div>
	</div>
</div>
<br><br>

<?php include('inc/footer.php'); ?>