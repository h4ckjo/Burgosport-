<?php
	$tituloPagina ="Burgosports";
	$pagina ="Tenis";
	include('inc/headertienda.php'); 
?>

<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li><a href="tenis.php">Tenis</a></li>
			<li><a href="camisetastenis.php">Camisetas</a></li>
			<li><a href="pantalonestenis.php">Pantalones</a></li>
			<li class="active"><a href="zapatillastenis.php">Zapatillas</a></li>
			<li><a href="complementostenis.php">Complementos</a></li>
		</ol>
	</div>
	</div><div class="row">
		<div class="col-sm-3">
			<div class="well">
				<a href="zapatillastenis.html">
					<img src="img/tenis/zapa1.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<a href="zapatillastenis.html">
					<img src="img/tenis/zapa2.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<a href="zapatillastenis.html">
					<img src="img/tenis/zapa3.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<a href="zapatillastenis.html">
					<img src="img/tenis/zapa4.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>