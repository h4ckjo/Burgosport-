<?php
	$tituloPagina ="Burgosport";
	$pagina ="Surf";
	
	session_start();
	if(!isset($_SESSION['admin'])){
		header ("location:index.html");
	}

	include ('header.php');
	require "../php/conn.php";
	require "../php/funciones.php";
	//S: consulta
	//A: altas
	//C: cambio o modificacion
	//B: borrar
	//m: modo
	if(isset($_GET['m'])){
		$m=$_GET['m'];
	} else {
		$m = "S";
	}
	if($m=="B"){
		$id=$_GET['id'];
		//recuperamos el nombre de la imagen
		$sql="SELECT imagen FROM productos WHERE id=".$id;
		$r=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($r);
		$imagen=$row['imagen'];
		unlink("../img/".$imagen);
		//borramos el registro
		$sql="DELETE FROM productos WHERE id=".$id;
		if(mysqli_query($conn,$sql)){
			header("location:surfABC.php");
		}
		$errores=array("Error al borrar el registro");
	}
	
	//lee la tabla productos
	$errores = array();
	
	if (isset($_POST['nombre'])){
		//pasamos a variables de trabajo
		//recuperamos el id
		$id = (isset($_POST['id']))?$_POST['id']:"";
		$subtipo = $_POST["subtipo"];
		$nombre = $_POST["nombre"];
		$descripcion=$_POST['descripcion'];
		$tallas=$_POST['tallas'];
		$precio=($_POST['precio']=="")?0:$_POST['precio'];
		$descuento=($_POST['descuento']=="")?0:$_POST['descuento'];
		$envio=($_POST['envio']=="")?0:$_POST['envio'];
		@$imagen=$_POST['imagen'];
		$relacion1=$_POST['relacion1'];
		$relacion2=$_POST['relacion2'];
		$relacion3=$_POST['relacion3'];
		@$masvendidos=($_POST['masvendidos']=="")?"0":"1";
		@$nuevos=($_POST['nuevos']=="")?"0":"1";


		if($nombre==""){
			array_push($errores, "El campo es requerido");
		} else if ($descripcion=="") {
			array_push($errores, "El campo es requerido");
		} else if (is_numeric($precio)==false) {
			array_push($errores, "El campo debe ser numérico");
		} else if (is_numeric($descuento)==false) {
			array_push($errores, "El campo debe ser numérico");
		} else if (is_numeric($envio)==false) {
			array_push($errores, "El campo debe ser numérico");
		} else if ($precio<=0 || $precio>99999.99) {
			array_push($errores, "El precio está fuera de rango");
		} else if ($precio<$descuento) {
			array_push($errores, "El precio debe ser mayor que el descuento");
		} else {
			//reemplazamos los caracteres especiales
			$buscar = array(' ', '*', '!', '@', '?','á','é', 'í', 'ó','ú','Á','É','Í','Ó','Ú','Ñ','ñ','Ü','ü');;
			$reemplazar = array('', '', '', '', '', 'a','e', 'i', 'o','u','A','E','I','O','U','N','n','U','u');
			$imagen = str_replace($buscar, $reemplazar, $nombre);
			$imagen = $imagen.".jpg";
			$imagen = strtolower($imagen);
			//verificamos que el archivo haya sido enviado
			if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
			copy($_FILES['imagen']['tmp_name'], "../img/".$imagen);
			validaImagen($imagen, 240);
			} else {
				array_push($errores, "Error al subir el archivo");
			}

			if ($id==""){
				$sql = "INSERT INTO productos VALUES(0,'3','".$subtipo."', ";
				$sql .= "'".$nombre."', ";
				$sql .= "'".$descripcion."', ";
				$sql .= "'".$tallas."', ";
				$sql .= $precio.", ";
				$sql .= $descuento.", ";
				$sql .= $envio.", ";
				$sql .= "'".$imagen."', ";
				$sql .= "'".$relacion1."', ";
				$sql .= "'".$relacion2."', ";
				$sql .= "'".$relacion3."', ";
				$sql .= "'".$masvendidos."', ";
				$sql .= "'".$nuevos."' )";
				
			} else {
				$sql = "UPDATE productos SET ";
				$sql .= "subtipo='".$subtipo."',";
				$sql .= "nombre='".$nombre."',";
				$sql .= "descripcion='".$descripcion."', ";
				$sql .= "tallas='".$tallas."', ";
				$sql .= "precio=".$precio.", ";
				$sql .= "descuento=".$descuento.", ";
				$sql .= "envio=".$envio.", ";
				$sql .= "imagen='".$imagen."', ";
				$sql .= "relacion1='".$relacion1."', ";
				$sql .= "relacion2='".$relacion2."', ";
				$sql .= "relacion3='".$relacion3."', ";
				$sql .= "masvendidos='".$masvendidos."', ";
				$sql .= "nuevos='".$nuevos."' ";
				$sql .="WHERE id=".$id;
			}

			//print $sql;

			if(mysqli_query($conn,$sql)){
				//print "El registro se inserto correctamente";
			} else {
				print "Error al insertar el registro";
			}
			
		}
	}
//leemos la tabla de productos
	//tipo 0 futbol
	//tipo 1 baloncesto
	//subtipo1 
	if($m=="S"){
		$sql="SELECT * FROM productos WHERE tipo='3' ORDER BY nombre AND subtipo";
		$r=mysqli_query($conn, $sql);
		//creamos un arreglo vacio
		$productos=array();
		while($row=mysqli_fetch_assoc($r)){
			array_push($productos, $row);
		}
	}

	if($m=="A" || $m=="C"){
		$sql="SELECT id,nombre FROM productos WHERE tipo='3' ORDER BY subtipo";
		$r=mysqli_query($conn, $sql);
		//creamos un arreglo vacio
		$productos=array();
		while($row=mysqli_fetch_assoc($r)){
			array_push($productos, $row);
		}
	}

	if($m=="C"){
		$id=$_GET['id'];
		$sql="SELECT * FROM productos WHERE id=".$id;
		$r=mysqli_query($conn, $sql);
		$data=mysqli_fetch_assoc($r);
		//pasamos las variables a un vector asociado que es $data
		$tipo = $data['tipo'];
		$subtipo = $data['subtipo'];
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$tallas=$data['tallas'];
		$precio=$data['precio'];
		$descuento=$data['descuento'];
		$envio=$data['envio'];
		$imagen=$data['imagen'];
		$relacion1=$data['relacion1'];
		$relacion2=$data['relacion2'];
		$relacion3=$data['relacion3'];
		$masvendidos=$data['masvendidos'];
		$nuevos=$data['nuevos'];
	}
?>
<script>
		window.onload = function(){
		<?php if($m=="C") { ?>
		document.getElementById("borrar").onclick = function() {
			if(confirm("¿Estás seguro de eliminar el registro?\nUna vez eliminado el registro no podrá recuperarse")){
				var id = <?php print $id; ?>;
				window.open("surfABC.php?m=B&id="+id, "_self");
			}
		}
		<?php } ?>
		<?php if($m=="S"){ ?>
			document.getElementById("alta").onclick = function() {
			window.open("surfABC.php?m=A", "_self");
		}
		<?php } else { ?>
			document.getElementById("volver").onclick = function() {
			window.open("surfABC.php", "_self");
		}
		<?php } ?>
	}
</script>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-3 sidenav">
			<?php if($m=="S"){ ?>	
			<div class="well" style="margin-top:20px">
				<label for="alta"></label>
				<input type="button" name="alta" value="Alta de Producto de surf" class="btn btn-info" role="button" id="alta"/>
			</div>
			<div class="well" style="margin-top:20px">
				<p>Subtipo 1 Camisetas</p>
				<p>Subtipo 2 Neoprenos</p>
				<p>Subtipo 3 Tablas</p>
				<p>Subtipo 4 Complementos</p>
			</div>
			<?php } ?>
		</div>
		<div class="col-sm-9">
			<div class="well" style="margin-top:20px">
				<h2>ALTAS, BAJAS Y CAMBIOS DE SURF</h2>
					<?php 
					if($m=="A" || $m=="C"){

					if(count($errores)>0){
						print '<div class="alert alert-danger">' ;
						foreach ($errores as $key => $valor){
							print "<strong>" . $valor . "</strong>";
							}
						print '</div>';
					}	
					?>
			
			<div class="well" style="margin-top:20px">
				<p>Subtipo 1 Camisetas</p>
				<p>Subtipo 2 Neoprenos</p>
				<p>Subtipo 3 Tablas</p>
				<p>Subtipo 4 Complementos</p>
			</div>
				<form action="surfABC.php" method="post" enctype="multipart/form-data">
					<div class="form-group text-left">
						<label for="Subtipo">* Subtipo:</label>
						<input type="text" name="subtipo" id="subtipo" class="form-control" required placeholder="Subtipo del producto" value="<?php if($m=="C"){print $subtipo;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre del producto" value="<?php if($m=="C"){print $nombre;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Descripción">* Descripción:</label>
						<textarea type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Descripción"><?php if($m=="C"){print $descripcion;} ?></textarea>
					</div>
					<div class="form-group text-left">
						<label for="Tallas">Talla:</label>
						<input type="text" name="tallas" id="tallas" class="form-control" placeholder="Talla" value="<?php if($m=="C"){print $tallas;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Precio">* Precio:</label>
						<input type="text" name="precio" id="precio" class="form-control" required placeholder="Precio" pattern="^(\d|-)?(\d|,)*\.?\d*$" value="<?php if($m=="C"){print $precio;} ?>" />
					</div>
					<div class="form-group text-left">
						<label for="Descuento">* Descuento:</label>
						<input type="text" name="descuento" id="descuento" class="form-control" required placeholder="Descuento" pattern="^(\d|-)?(\d|,)*\.?\d*$" value="<?php if($m=="C"){print $descuento;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Envío">* Envío:</label>
						<input type="text" name="envio" id="envio" class="form-control" required placeholder="Envío" pattern="^(\d|-)?(\d|,)*\.?\d*$" value="<?php  if($m=="C"){print $envio;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Imagen">*Imagen:</label>
						<input type="file" name="imagen" id="imagen" class="form-control" accept="image/jpeg" value="<?php  if($m=="C"){print $imagen;} ?>"/>
						<?php
							if(isset($imagen)){
								print "<img src='../img/".$imagen."'width='150'/>";
								print"<p>".$imagen."</p>";
							}
						?>
					</div>
					<div class="form-group text-left">
						<label for="Relación1">* Relación1</label>
						<select name="relacion1" id="relacion1">
							<option value="0">-No hay cursos relacionados-</option>
							<?php
								for($i=0; $i < count($productos); $i++){
									print "<option value='".$productos[$i]['id']."'";
									if($productos[$i]['id']==@$relacion1){
										print " selected ";
									}
									print "/>".$productos[$i]['nombre']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group text-left">
						<label for="Relación2">* Relación2</label>
						<select name="relacion2" id="relacion2">
							<option value="0">-No hay cursos relacionados-</option>
							<?php
								for($i=0; $i < count($productos); $i++){
									print "<option value='".$productos[$i]['id']."'";
									if($productos[$i]['id']==@$relacion2){
										print " selected ";
									}
									print "/>".$productos[$i]['nombre']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group text-left">
						<label for="Relación3">* Relación3</label>
						<select name="relacion3" id="relacion3">
							<option value="0">-No hay cursos relacionados-</option>
							<?php
								for($i=0; $i < count($productos); $i++){
									print "<option value='".$productos[$i]['id']."'";
									if($productos[$i]['id']==@$relacion3){
										print " selected ";
									}
									print "/>".$productos[$i]['nombre']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group text-left">
						<label for="Más Vendidos"><input type="checkbox" name="masvendidos" id="masvendidos" 
							<?php
								if(@$masvendidos=="1"){
									print " checked ";
								}
							?>
							>Productos más Vendidos: </label>
					</div>
					<div class="form-group text-left">
						<label for="Nuevos"><input type="checkbox" name="nuevos" id="nuevos" 
							<?php 
								if(@$nuevos=="1"){
								print " checked ";
							}
							?>
							>Productos Nuevos: </label>
					</div>

					
					<input type="hidden" name="id" id="id" value="<?php if($m=="C") print $id; ?>"/>
					

					<div class="form-group text-left">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>

						<label for="Volver"></label>
						<input type="button" name="volver" value="Volver" class="btn btn-info" role="button" id="volver"/>

						<?php if($m=="C") { ?>
						<label for="Borrar"></label>
						<input type="button" name="borrar" value="Borrar" class="btn btn-danger" role="button" id="borrar"/>
						<?php } ?>
					</div>
				</form>

				<?php } 
				if($m=="S"){
					$ren=0;
					for($i=0; $i < count($productos); $i++){
						if($ren==0){
							print '<div class="row">';
						}
						print '<div class="col-sm-3">';
						print '<img src="../img/'.$productos[$i]["imagen"].'" class="img-responsive img-rounded" style="width:100%" alt="'.$productos[$i]["nombre"].'">';
						print '<p><a href="surfABC.php?m=C&id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
						print '<p>'.$productos[$i]["tallas"].'</p>';
						print '</div>';
						$ren ++;
						if($ren==4){
							$ren=0;
							print '</div>';
						}
					}
				}
				?>
				
			</div>
		</div>	
	</div>
</div>
</div>

<?php include('../inc/footer.php'); ?>