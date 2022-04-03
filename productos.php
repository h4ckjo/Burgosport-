<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Productos";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/carrito.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$sql="SELECT * FROM productos WHERE id=".$id;
		$r=mysqli_query($conn,$sql);
		$data=mysqli_fetch_array($r);
	}

	function despliegaProductoRelacionado($id, $conn){
		//limpiamos
		$sql="SELECT nombre, imagen FROM productos WHERE id=".$id;
		$r=mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($r);
		//desplegamos las etiquetas
		print '<div class="well">'.$data["nombre"];
		print '<a href="productos.php?id='.$id.'">
				<img src="img/'.$data["imagen"].'" class="media-object img-responsive" 
				width="100%"></a>';
		print '</div>';
	}
?>

<div class="container-fluid bg-3 text-center">
	<div class="row content" style="margin-top:30px">
		<div class="col-sm-2 sidenav" style="margin-top:30px">
			<img src="img/<?php print $data['imagen']; ?>" class="img-responsive img-rounded" style="width:100%">
			<br>
			<h4>Ref. Producto: <?php print $data['id']; ?></h4>
			<h4>Precio: <?php print $data['precio']; ?>&nbsp;€</h4>
			<br><br>
			<div class="well"><p>Mi Cesta</p>
				<p>Total:<?php
				 if(isset($carrito)){
					 print despliegaCarrito($carrito, $conn);
				  }else{
					  print "0,00";
				  } ?> €</p>
				<a href="carrito.html?id=<?php print $id; ?>" class="btn btn-success" role="button"> Comprar </a>
				<a href="tienda.html" class="btn btn-info" role="button">Volver</a>
			</div>
		</div>

		<div class="col-sm-7 text-left">
			<h2><?php print $data['nombre']; ?></h2>
			<br>
			<?php
		if($data['tipo']=="0"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
			
	
		} else if($data['tipo']=="1"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="2"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="3"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="4"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="5"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="6"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="7"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		
		} else if($data['tipo']=="8"){
			print '<h4>Nombre producto:</h4>';
			print '<p>'.$data['nombre'].'</p>';
			print '<h4>tallas:</h4>';
			print '<p>'.$data['tallas'].'</p>';
			print '<h4>Resumen:</h4>';		
			print '<p>'.$data['descripcion'].'</p>';
		}

		?>
		
		</div>

		<div class="col-sm-3">
			<h4>Productos Relacionados:</h4>
				<div class="well">
					<?php
						if($data['relacion1']!=0){
							despliegaProductoRelacionado($data['relacion1'], $conn);
						}

						if($data['relacion2']!=0){
							despliegaProductoRelacionado($data['relacion2'], $conn);
						}

						if($data['relacion3']!=0){
							despliegaProductoRelacionado($data['relacion3'], $conn);
						}
					?>
				</div>
		</div>
	</div>
</div>


<?php include('inc/footer.php'); ?>