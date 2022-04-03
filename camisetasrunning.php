<?php
	$tituloPagina ="Burgosports";
	$pagina ="Running";
	include('inc/headertienda.php'); 
	require "php/conn.php";
?>

<div class="container-fluid bg-3 text-center">
	<div class="well" id="contenedor">
		<ol class="breadcrumb">
			<li><a href="running.php">Running</a></li>
			<li class="active"><a href="camisetasrunning.php">Camisetas</a></li>
			<li><a href="mallasrunning.php">Mallas</a></li>
			<li><a href="zapatillasrunning.php">Zapatillas</a></li>
			<li><a href="complementosrunning.php">Complementos</a></li>
		</ol>
	</div>
	<div class="row content">
	
			<?php
			$sql="SELECT * FROM productos WHERE tipo='4' AND subtipo='1'";
			$r=mysqli_query($conn,$sql);
			$productos=array();
			while($row=mysqli_fetch_array($r)){
				array_push($productos, $row);
			}
			?>
			<?php 		
				$ren=0;
				for($i=0; $i < count($productos); $i++){
					if($ren==0){
					print '<div class="row">';
					}
					print '<div class="col-sm-3">';
					print '<div class="well">';
					print '<p><a href="productos.php?id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
					print '<img src="img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%" alt="'.$productos[$i]["nombre"].'">';
					print '<h4>'.$productos[$i]["precio"].'&nbsp €'.'</h4>';
					
					
					print '<a href="carrito.php?id='.$productos[$i]["id"].'"" class="btn btn-success">Comprar</a>';
					
					print '<a href="productos.php?id='.$productos[$i]["id"].'" class="btn btn-info">Detalles</a>';
					print '</div>';
					
					print '<br>';
					print '</div>';
					
					$ren ++;
					if($ren==4){
						$ren=0;
						print '</div>';
					}
				}
			?>
		
	</div>
</div><br>
	
<?php include ('inc/footer.php'); ?>