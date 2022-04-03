<?php
	$tituloPagina ="Burgosports";
	$pagina ="Ciclismo";
	include('inc/headertienda.php'); 
?>

<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="ciclismo.php">Ciclismo</a></li>
			<li><a href="camisetasciclismo.php">Maillots</a></li>
			<li><a href="botasciclismo.php">Botas</a></li>
			<li><a href="bicisciclismo.php">Bicicletas</a></li>
			<li><a href="complementosciclismo.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetasciclismo.php">MAILLOTS</a></h1>
				</div>
				<a href="camisetasciclismo.html">
					<img src="img/ciclismo/camiseta0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="botasciclismo.php">BOTAS</a></h1>
				</div>
			<a href="botasciclismo.html">
				<img src="img/ciclismo/botas0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="bicisciclismo.php">BICICLETAS</a></h1>
				</div>
			<a href="bicisciclismo.html">
				<img src="img/ciclismo/bici0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementosciclismo.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementosciclismo.html">
				<img src="img/ciclismo/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>