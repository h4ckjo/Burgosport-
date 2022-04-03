<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Carrito de Compras";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	require "php/carrito.php";
	
	

	if(isset($_GET['m'])){
		//recuperamos el id
		$id = $_GET["id"];
		$sql = "DELETE FROM carrito WHERE idProducto=".$id." AND num='".$carrito."'";
		if(!mysqli_query($conn, $sql)) print "Error al borrar el registro";
	} else if(isset($_GET["id"])){ //el usuario pide un producto
		$id = $_GET["id"];
		$sql = "SELECT * FROM productos WHERE id=".$id;
		$r = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($r);
		// si existe ya el carrito lo recuperamos
		if(isset($_SESSION['carrito'])){
			$carrito=$_SESSION['carrito'];
		} else {
			//si no exite el carrito, lo creamos
			//y lo almacenamos en una variable de sesion
			$carrito = llaveCarrito(30);
			$_SESSION['carrito'] = $carrito;
		}
		//agregamos productos en el carrito
		agregaProducto($carrito,$id,$data['precio'],$data['descuento'],$data['envio'],$conn);
	}

	if(isset($_POST['num'])){
		$num = $_POST['num'];
		for ($i=0; $i < $num; $i++) { 
			$producto = $_POST["i".$i];
			$cantidad = $_POST["c".$i];
			actualizaProducto($carrito, $producto, $cantidad, $conn);	
		}
	}
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			
		</div>
		<div class="col-sm-8 text-left">
			<div class="well" id="contenedor" style="margin-top:20px">
				<ol class="breadcrumb">
					<li><a href="tienda.html">Tienda</a></li>
					<li class="active">Carrito</li>
				</ol>
				<?php 
					$carrito=$_SESSION['carrito'];
					despliegaCarritoCompleto($carrito, false, $conn);
				?>
			</div>
		</div>
		<div class="col-sm-2 sidenav">
			
		</div>	
	</div>
</div>
<?php include('inc/footer.php'); ?>
