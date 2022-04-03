<?php
	require "php/sesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $tituloPagina; ?></title>
	<meta charset="utf-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Los Mejores Productos de la Web"/>
	<meta name="keywords" content="tienda, online, Burgos, burgos, España"/>
	<!--links del favico-->
	<link rel="icon" type="image/x-icon" href="img/Bs.png" />
	<!--link de los estilos y de bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<!--script de bootstrap y de jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-light">
	<div class="container-fluid bg-danger" >
        <div class="container text-left">
			<br>
            <a href="index.php" >
            <img src="img/Bs.png" width="150px"alt="icono logo">
			</a>
		
			
			<a  href="index.php" id="ind" >
            <img src="img/futbol.jpg"  width="970px" alt="icono logo">
            </a>
			
        </div>
		<br>
    </div>
	<br>


<nav class="navbar navbar-light ">


		<div class="container-fluid navbar-right">
		<form action="busca.php" class="form-inline" method="get">Buscar:
			<input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar Producto" size="40">
			<button type="submit" class="btn btn-info">Ir</button>
		</form>
		<br>
	</div>
	
			
		</div>
	</nav>
	<nav class="navbar navbar-inverse" >
		<div class="container-fluid">
			<div class="navbar-header ">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
			</div>
			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav">
					<li <?php if ($pagina=="Inicio") {echo "class='active'";} ?>><a href="index.php">Inicio</a></li>
					<li <?php if ($pagina=="Tienda") {echo "class='active'";} ?>><a href="tienda.php">Tienda</a></li>
					<li <?php if ($pagina=="Contacto") {echo "class='active'";} ?>><a href="contacto.php">Contacto</a></li>
					<li <?php if ($pagina=="Nosotros") {echo "class='active'";} ?>><a href="nosotros.php">Nosotros</a></li>
				</ul>
				
				
				<ul class="nav navbar-nav navbar-right">
					<?php require "php/navbar.php"; ?>
				</ul>
			</div>
			
		</div>
		
		</div>
	</nav>
