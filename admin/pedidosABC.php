<?php
	$tituloPagina ="Burgosport";
	$pagina ="Pedidos";
	
	session_start();
	if(!isset($_SESSION['admin'])){
		header ("location:index.html");
	}

	include ('header.php');
	require "../php/conn.php";
	require "../php/funciones.php";
	require "../php/carrito.php";
	//S: consulta
	//C: cambio o modificacion
	//B: borrar
	//m: modo
	if(isset($_GET['m'])){
		$m=$_GET['m'];
	} else {
		$m = "S";
	}
	$errores = array();
	// B sea desplegar el pedido y D para borrar
	if($m=="D"){
		$id=$_GET['id'];
		$sql = "SELECT * FROM carrito WHERE num='".$id."'";
		$r = mysqli_query($conn,$sql);
		//trasladamos los datos a historico
		while($data=mysqli_fetch_assoc($r)){
			$sql ="INSERT INTO historicos ";
			$sql.= "SET num='".$data['num']."', ";
			$sql.= "estado='".$data['estado']."', ";
			$sql.= "idProducto=".$data['idProducto'].", ";
			$sql.= "precio=".$data['precio'].", ";
			$sql.= "descuento=".$data['descuento'].", ";
			$sql.= "envio=".$data['envio'].", ";
			$sql.= "cantidad=".$data['cantidad'];
			if(!mysqli_query($conn,$sql)){
				print 'Error al insertar el producto en historicos';
			}
		}
		$sql = "DELETE FROM carrito WHERE num='".$id."'";
		if(mysqli_query($conn,$sql)){
			header ("location:pedidosABC.html");
		}
		$errores=array("Error al borrar el registro");
	}
	
	//lee la tabla productos
	
//leemos la tabla de pedidos
	//tipo 0 cursos
	//tipo 1 libros
	if($m=="S"){
		$sql="SELECT num, estado, sum(precio) as importe, sum(cantidad) as cantidad, sum(descuento) as descuento, sum(envio) as envio, idUsuario, fecha FROM carrito GROUP BY num ORDER BY fecha DESC";
		$r=mysqli_query($conn, $sql);
		//creamos un arreglo vacio
		$pedidos=array();
		while($data=mysqli_fetch_assoc($r)){
			array_push($pedidos, $data);
		}
	}
	//Leer el producto antes de ser borrado
	if($m=="B"){
		$carrito=$_GET['id'];
	}
?>

<div class="container-fluid text-center">
	<div class="well" style="margin-top:20px">
		<h2>BAJAS DE PEDIDOS</h2>
			<?php 
				if(count($errores)>0){
					print '<div class="alert alert-danger">' ;
					foreach ($errores as $key => $valor){
					print "<strong>" . $valor . "</strong>";
					}
				print '</div>';
				}	
				
				if($m=="B"){
					print '<div class="alert alert-danger">';
					print '<p>¿Desea borrar este pedido?</p>';
					print '<a href="pedidosABC.php">No</a>&nbsp';
					print '<a href="pedidosABC.php?m=D&id='.$carrito.'">Si</a>';
					print '<p>Los datos del pedido se trasladarán a históricos</p>';
					despliegaCarritoConsulta($carrito,$conn);
				} 
				if($m=="S"){
					print '<div class="table-responsive">';
					print '<table class="table table-striped" width="100%">';
					print '<tr>';
					print '<th width="5%" class="text-center">ESTADO</th>';
					print '<th width="10%" class="text-center">IMPORTE</th>';
					print '<th width="5%" class="text-center">CANT</th>';
					print '<th width="10%" class="text-center">DESC</th>';
					print '<th width="10%" class="text-center">ENVIO</th>';
					print '<th width="10%" class="text-center">TOTAL</th>';
					print '<th width="10%" class="text-center">CLIENTE</th>';
					print '<th width="20%" class="text-center">FECHA</th>';
					print '<th width="10%" class="text-center">BORRAR</th>';
					print '</tr>';
					print '</table>';
					print '</div>';
					for($i=0; $i < count($pedidos); $i++){
						print '<div class="table-responsive">';
						print '<table class="table table-striped" width="100%">';
						print '<tr>';
						$total = $pedidos[$i]["importe"]-$pedidos[$i]["descuento"]+$pedidos[$i]["envio"];
						if($pedidos[$i]['estado']=="0"){
							print '<tr bgcolor="#CDD573">';
							print '<td width="5%" class="text-center">';
							print 'Abierto';
						}
						if($pedidos[$i]['estado']=="1"){
							print '<tr bgcolor="#98E59B">';
							print '<td width="5%" class="text-center">';
							print 'Aceptado';
						}
						if($pedidos[$i]['estado']=="2"){
							print '<tr bgcolor="#EC7870">';
							print '<td width="5%" class="text-center">';
							print 'Cancelado';
						}
						print '</td>';
						print '<td width="10%" class="text-center">'.number_format($pedidos[$i]["importe"],2).'<td>';
						print '<td width="5%" class="text-center">'.number_format($pedidos[$i]["cantidad"]).'<td>';
						print '<td width="10%" class="text-center">'.number_format($pedidos[$i]["descuento"],2).'<td>';
						print '<td width="10%" class="text-center">'.number_format($pedidos[$i]["envio"],2).'<td>';
						print '<td width="10%" class="text-center">'.number_format($total,2).'<td>';
						print '<td width="10%" class="text-center">'.$pedidos[$i]["idUsuario"].'<td>';
						print '<td width="20%" class="text-center">'.$pedidos[$i]["fecha"].'<td>';
						print '<td width="10%" class="text-center"><a class="btn btn-danger" href="pedidosABC.php?m=B&id='.$pedidos[$i]["num"].'">Borrar</a></td>';
						print '</tr>';
						print '</table>';
						print '</div>';
					}
				}
				?>	
	
</div>
<?php include('../inc/footer.php'); ?>