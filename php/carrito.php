<?php

	
	if(isset($_SESSION['carrito'])){
		$carrito = $_SESSION['carrito'];
	}

	function actualizaProducto($carrito, $producto, $cantidad, $conn){
		$sql = "UPDATE carrito ";
		$sql.= "SET cantidad=".$cantidad." ";
		$sql.= "WHERE num='".$carrito."' AND idProducto=".$producto;
		if(!mysqli_query($conn,$sql)) print "Error al actualizar el registro";
	}

	function llaveCarrito($len){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0 , $len);
	}

	function agregaProducto($carrito, $id, $precio,$descuento, $envio, $conn){
		//verificamos que exista el producto en el carro
		//buscamos la key del carrito con el id;
		$sql = "SELECT * FROM carrito WHERE num='".$carrito."' AND idProducto=".$id;
		$r = mysqli_query($conn,$sql);// Dará 1  o  0
		//verificamos con:
		if(mysqli_num_rows($r)==0){
			//si no existe lo insertamos
			$sql = "INSERT INTO carrito ";
			$sql.= "SET num='".$carrito."', ";
			$sql.= "estado='0', ";//0=carrito abierto
			$sql.= "idProducto=".$id.", ";
			$sql.= "precio=".$precio.", ";
			$sql.= "descuento=".$descuento.", ";
			$sql.= "envio=".$envio.", ";
			$sql.= "cantidad=1";//Por omision sea 1
			if(!mysqli_query($conn,$sql)){
				print "Error al insertar el registro";
			}
		}
	}

	function despliegaCarritoCompleto($carrito, $verifica, $conn){
		//creamos las variable de trabajo que vamos a recalcular
		$subtotal=0;
		$descuento=0;
		$envio=0;
		$total=0;
		//leemos los datos del carrito
		$sql = "SELECT c.idUsuario as usuario, ";
		$sql .= "c.idProducto as producto, ";
		$sql .= "c.cantidad as cantidad, ";
		$sql .= "c.precio as precio, ";
		$sql .= "c.descuento as descuento, ";
		$sql .= "c.envio as envio, ";
		$sql .= "p.imagen as imagen, ";
		$sql .= "p.nombre as nombre ";
		//indicamos cada tabla
		$sql .= "FROM carrito as c, productos as p ";
		$sql .= "WHERE num='".$carrito."' AND ";
		$sql .= "c.idProducto=p.id";
		//ejecutamos el query
		$r=mysqli_query($conn, $sql);
		print '<form action="carrito.php" method="POST">';
		print '<table class="table-striped" width="100%">';
		print '<tr>';
		print '<th width="15%">Imagen</th>';
		print '<th width="30%">Producto</th>';
		print '<th width="15%">Cantidad</th>';
		print '<th width="15%">Precio</th>';
		print '<th width="20%">Subtotal</th>';
		print '<th width="20%">Eliminar</th>';
		print '</tr>';

		$i=0;
		while($data=mysqli_fetch_assoc($r)){
		$nom = $data['nombre'];
		$num = $data['producto'];
		$tot = $data['cantidad']*$data['precio'];
		print '<tr>';
		print '<td><img src="img/'.$data['imagen'].'" width="95" alt="'.$nom.'"></td>';
		print '<td><p>'.$nom.'</p></td>';
		print '<td>';
		print '<input class="text-right" type="number" name="c'.$i.'" value="'.$data['cantidad'].'" min="1" max="9999"/>';
		print '<input type="hidden" name="i'.$i.'" value="'.$data['producto'].'"/>';
		print '</td>';
		print '<td>'.$data['precio'].' '.'€</td>';
		print '<td>'.number_format($tot,2).' '.'€</td>';
		print '<td><a href="carrito.php?m=b&id='.$data['producto'].'" class="btn btn-danger">Borrar</a></td>';
		print '</tr>';
		$subtotal += $tot;
		$descuento += $data['descuento'];
		$envio += $data['envio'];
		$i++;
		}
		$total= $subtotal + $envio -$descuento;
		print '<input type="hidden" name="num" value="'.$i.'"/>';
		print '</table>';
		print '<hr>';
		print '<table width="100%" class="text-right">';
		print '<tr>';
		print '<td width="60%"></td>';
		print '<td width="20%">Subtotal:</td>';
		print '<td width="20%">'.number_format($subtotal,2).' '.'€</td>';
		print '</tr>';
		print '<tr>';
		print '<td></td>';
		print '<td>Descuento:</td>';
		print '<td>'.number_format($descuento,2).' '.'€</td>';
		print '</tr>';
		print '<tr>';
		print '<td></td>';
		print '<td>Envío:</td>';
		print '<td>'.number_format($envio,2).' '.'€</td>';
		print '</tr>';
		print '<td></td>';
		print '<td>Total:</td>';
		print '<td>'.number_format($total,2).' '.'€</td>';
		print '</tr>';
		print '</table>';		
		print '<table width="100%" class="text-right">';
		print '<tr>';
		print '<td width="70%"></td>';
		print '<td width="15%"><a href="tienda.html" class="btn btn-info" role="button">Seguir Comprando</a></td>';
		print '<td width="15%"><input type="submit" class="btn btn-info" role="button" value="Actualizar Carro"></td>';
		if($verifica){
			print '<td width="15%"><a href="gracias.html" class="btn btn-success" role="button">Pagar</a></td>';
		}else{
			print '<td width="15%"><a href="checkout.html" class="btn btn-success" role="button">Pagar</a></td>';
		}
		
		print '</tr>';
		print '</table>';
		print '</form>';
				
	}

	function despliegaCarrito($carrito, $conn){
		//creamos las variable de trabajo que vamos a recalcular
		$subtotal=0;
		$descuento=0;
		$envio=0;
		$total=0;
		//leemos los datos del carrito
		$sql = "SELECT c.idUsuario as usuario, ";
		$sql .= "c.idProducto as producto, ";
		$sql .= "c.cantidad as cantidad, ";
		$sql .= "c.precio as precio, ";
		$sql .= "c.descuento as descuento, ";
		$sql .= "c.envio as envio, ";
		$sql .= "p.imagen as imagen, ";
		$sql .= "p.nombre as nombre ";
		//indicamos cada tabla
		$sql .= "FROM carrito as c, productos as p ";
		$sql .= "WHERE num='".$carrito."' AND ";
		$sql .= "c.idProducto=p.id";
		//ejecutamos el query
		$r=mysqli_query($conn, $sql);
		while($data=mysqli_fetch_assoc($r)){
		$tot = $data['cantidad']*$data['precio'];
		$subtotal += $tot;
		$descuento += $data['descuento'];
		$envio += $data['envio'];
		}
		$total= $subtotal + $envio -$descuento;
		return number_format($total,2);
	}
?>