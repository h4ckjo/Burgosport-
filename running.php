<?php
	$tituloPagina ="Burgosports";
	$pagina ="Running";
	include('inc/headertienda.php'); 
?>
<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="running.php">Running</a></li>
			<li><a href="camisetasrunning.php">Camisetas</a></li>
			<li><a href="mallasrunning.php">Mallas</a></li>
			<li><a href="zapatillasrunning.php">Zapatillas</a></li>
			<li><a href="complementosrunning.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetasrunning.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetasrunning.html">
					<img src="img/running/camiseta0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="mallasrunning.php">MALLAS</a></h1>
				</div>
			<a href="mallasrunning.html">
				<img src="img/running/malla0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="zapatillasrunning.php">ZAPATILLAS</a></h1>
				</div>
			<a href="zapatillasrunning.html">
				<img src="img/running/zapa0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementosrunning.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementosrunning.html">
				<img src="img/running/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>
