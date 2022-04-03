<?php
	$tituloPagina ="Burgosports";
	$pagina ="Surf";
	include('inc/headertienda.php'); 
?>
<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="surf.php">Surf</a></li>
			<li><a href="camisetassurf.php">Camisetas</a></li>
			<li><a href="neoprenossurf.php">Neoprenos</a></li>
			<li><a href="tablassurf.php">Tablas</a></li>
			<li><a href="complementossurf.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetassurf.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetassurf.html">
					<img src="img/surf/camiseta0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="neoprenossurf.php">NEOPRENOS</a></h1>
				</div>
			<a href="botassurf.html">
				<img src="img/surf/neo0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="tablassurf.php">TABLAS</a></h1>
				</div>
			<a href="bicissurf.html">
				<img src="img/surf/tablas0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementossurf.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementossurf.html">
				<img src="img/surf/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>
