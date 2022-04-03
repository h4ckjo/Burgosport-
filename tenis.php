<?php
	$tituloPagina ="Burgosports";
	$pagina ="Tenis";
	include('inc/headertienda.php'); 
?>
<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li class="active"><a href="tenis.php">Tenis</a></li>
			<li><a href="camisetastenis.php">Camisetas</a></li>
			<li><a href="pantalonestenis.php">Pantalones</a></li>
			<li><a href="zapatillastenis.php">Zapatillas</a></li>
			<li><a href="complementostenis.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="camisetastenis.php">CAMISETAS</a></h1>
				</div>
				<a href="camisetastenis.html">
					<img src="img/tenis/camiseta0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Futbol">
				</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="pantalonestenis.php">PANTALONES</a></h1>
				</div>
			<a href="pantalonestenis.html">
				<img src="img/tenis/pant0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Baloncesto">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h1><strong><a style="color:white" href="zapatillastenis.php">CALZADO</a></h1>
				</div>
			<a href="zapatillastenis.html">
				<img src="img/tenis/zapa0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Ciclismo">
			</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="well">
				<div class="well" style="background-color:#2A2B2B">
					<h3><strong><a style="color:white" href="complementostenis.php">COMPLEMENTOS</a></h3>
				</div>
			<a href="complementostenis.html">
				<img src="img/tenis/comp0.jpg" class="img-responsive img-rounded" style="width:100%" alt="Surf">
			</a>
		</div>
	</div>
</div><br>
<?php include ('inc/footer.php'); ?>
