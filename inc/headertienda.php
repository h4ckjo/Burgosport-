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
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
	<link rel="manifest" href="img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
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
	</div>
</nav>

<nav class="navbar navbar-light ">
	<div class="container-fluid navbar-right">
		<form action="busca.php" class="form-inline" method="get">Buscar:
			<input type="text" name="buscar" id="buscar" class="form-control" placeholder="Buscar Producto" size="40">
			<button type="submit" class="btn btn-info">Ir</button>
		</form>
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
					<li <?php if ($pagina=="Fútbol") {echo "class='active'";} ?>><a href="futbol.php">Fútbol</a></li>
					<li <?php if ($pagina=="Baloncesto") {echo "class='active'";} ?>><a href="baloncesto.php">Baloncesto</a></li>
					<li <?php if ($pagina=="Ciclismo") {echo "class='active'";} ?>><a href="ciclismo.php">Ciclismo</a></li>
					<li <?php if ($pagina=="Surf") {echo "class='active'";} ?>><a href="surf.php">Surf</a></li>
					<li <?php if ($pagina=="Running") {echo "class='active'";} ?>><a href="running.php">Running</a></li>
					<li <?php if ($pagina=="Outdoor") {echo "class='active'";} ?>><a href="outdoor.php">Outdoor</a></li>
					<li <?php if ($pagina=="Tenis") {echo "class='active'";} ?>><a href="tenis.php">Tenis</a></li>
					<li <?php if ($pagina=="Outlet") {echo "class='active'";} ?>><a href="outlet.php">Outlet</a></li>
				</ul>
				
				
				<ul class="nav navbar-nav navbar-right">
					<?php require "php/navbar.php"; ?>
				</ul>
			</div>
			
		</div>
		
		</div>
	</nav>
