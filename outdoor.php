<?php
	$tituloPagina ="Burgosports";
	$pagina ="Outdoor";
	include('inc/headertienda.php'); 
?>
<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="outdoor.php">Outdoor</a></li>
			<li><a href="camisetasoutdoor.php">Camisetas</a></li>
			<li><a href="pantalonesoutdoor.php">Pantalones</a></li>
			<li><a href="zapatillasoutdoor.php">Zapatillas</a></li>
			<li><a href="complementosoutdoor.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetasoutdoor.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetasoutdoor.html">
					<img src="img/outdoor/camiseta0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="pantalonesoutdoor.php">PANTALONES</a></h1>
				</div>
			<a href="pantalonesoutdoor.html">
				<img src="img/outdoor/pant0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="zapatillasoutdoor.php">CALZADO</a></h1>
				</div>
			<a href="zapatillasoutdoor.html">
				<img src="img/outdoor/zapa0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementosoutdoor.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementosoutdoor.html">
				<img src="img/outdoor/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>