<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Buscar";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";

	if(isset($_GET['buscar'])){
		$buscar = $_GET['buscar'];
		$sql = "SELECT * FROM productos WHERE nombre LIKE '%".$buscar."%' OR descripcion LIKE '&".$buscar."%'";
		$r = mysqli_query($conn,$sql);
		$productos = array();
		while ($data=mysqli_fetch_assoc($r)){
			array_push($productos, $data);
		}
	}
?>
<div class="container-fluid text-left">
	<div class="row content">
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
				<h2 class="text-center">Resultado de la búsqueda: <?php print $buscar; ?></h2>
				<br><br>
				<?php
					for ($i=0; $i < count($productos); $i++) { 
						print '<div class="media">';
						print '<div class="media-left">';
						print '<img src="img/'.$productos[$i]["imagen"].'" class="media-object"/>';
						print '</div>';
						print '<div class="media-body">';
						print '<h4 class="media-heading"><a href="productos.php?id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></h4>';
						print '<p>'.$productos[$i]["descripcion"].'</p>';
						print '</div>';
						print '</div>';
					}
				?>	
			</div>
		</div>
		<div class="col-sm-4 sidenav">
                       
					   <div class="well">
						   <img src="img/deporteLogin.jpg"  width="540px" height="470px"></a>
					   </div>
		</div>	
</div>
<?php include('inc/footer.php'); ?>