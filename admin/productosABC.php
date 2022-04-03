<?php
	$tituloPagina ="Burgosport";
	$pagina ="ProductosABC";
	
	session_start();
	if(!isset($_SESSION["admin"])){
		header("location:index.php");
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
			header("location:productosABC.php");
		}
		$errores=array("Error al borrar el registro");
	}
	
	//lee la tabla productos
	$errores = array();
	if (isset($_POST['nombre'])){
		//pasamos a variables de trabajo
		//recuperamos el id
		$id = (isset($_POST['id']))?$_POST['id']:"";
		$nombre = $_POST["nombre"];
		$descripcion=$_POST['descripcion'];
		$objetivo=$_POST['objetivo'];
		$precio=($_POST['precio']=="")?0:$_POST['precio'];
		$descuento=($_POST['descuento']=="")?0:$_POST['descuento'];
		$envio=$_POST['envio'];
		@$imagen=$_POST['imagen'];
		$fecha=$_POST['fecha'];
		$relacion1=$_POST['relacion1'];
		$relacion2=$_POST['relacion2'];
		$relacion3=$_POST['relacion3'];
		@$masvendidos=($_POST['masvendidos']=="")?"0":"1";
		@$nuevos=($_POST['nuevos']=="")?"0":"1";


		if($nombre==""){
			array_push($errores, "El campo es requerido");
		} else if ($descripcion=="") {
			array_push($errores, "El campo es requerido");
		} else if ($objetivo=="") {
			array_push($errores, "El campo es requerido");
		} else if (is_numeric($precio)==false) {
			array_push($errores, "El campo debe ser numérico");
		} else if (is_numeric($descuento)==false) {
			array_push($errores, "El campo debe ser numérico");
		} else if (is_numeric($envio)==false) {
			array_push($errores, "Error en el monto del envío, debe ser numérico");
		} else if ($precio<=0 || $precio>99999.99) {
			array_push($errores, "El precio está fuera de rango");
		} else if ($precio<$descuento) {
			array_push($errores, "El precio debe ser mayor que el descuento");
		} else if ($fecha=="") {
			array_push($errores, "El campo es requerido");
		} else if (validaFecha($fecha)==false) {
			array_push($errores, "La fecha es incorrecta");
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
				array_push($errores, "Error alsubir el archivo");
			}

			$descripcion_esc = escapaCadena($descripcion);
			$objetivo_esc = escapaCadena($objetivo);

			if ($id==""){
				$sql = "INSERT INTO productos VALUES(0,'0','".$nombre."', ";
				$sql .= "'".$descripcion_esc."', ";
				$sql .= "'".$objetivo_esc."', ";
				$sql .= $precio.", ";
				$sql .= $descuento.", ";
				$sql .= $envio.", ";
				$sql .= "'".$imagen."', ";
				$sql .= "'".$fecha."', ";
				$sql .= "'".$relacion1."', ";
				$sql .= "'".$relacion2."', ";
				$sql .= "'".$relacion3."', ";
				$sql .= "'".$masvendidos."', ";
				$sql .= "'".$nuevos."',";
				$sql .= "'', "; //autor
				$sql .= "'', "; //editorial
				$sql .= "0)";	//paginas
			} else {
				$sql = "UPDATE productos SET ";
				$sql .= "nombre='".$nombre."',";
				$sql .= "descripcion='".$descripcion_esc."', ";
				$sql .= "objetivo='".$objetivo_esc."', ";
				$sql .= "precio=".$precio.", ";
				$sql .= "descuento=".$descuento.", ";
				$sql .= "envio=".$envio.", ";
				$sql .= "imagen='".$imagen."', ";
				$sql .= "fecha='".$fecha."', ";
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
	//tipo 0 cursos
	//tipo 1 libros
	if($m=="S"){
		$sql="SELECT * FROM productos WHERE tipo='0'";
		$r=mysqli_query($conn, $sql);
		//creamos un arreglo vacio
		$productos=array();
		while($row=mysqli_fetch_assoc($r)){
			array_push($productos, $row);
		}
	}

	if($m=="A" || $m=="C"){
		$sql="SELECT id,nombre FROM productos WHERE tipo='0' ORDER BY nombre";
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
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$objetivo=$data['objetivo'];
		$precio=$data['precio'];
		$descuento=$data['descuento'];
		$envio=$data['envio'];
		$imagen=$data['imagen'];
		$fecha=$data['fecha'];
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
				window.open("productosABC.php?m=B&id="+id, "_self");
			}
		}
		<?php } ?>
		<?php if($m=="S"){ ?>
			document.getElementById("alta").onclick = function() {
			window.open("productosABC.php?m=A", "_self");
		}
		<?php } else { ?>
			document.getElementById("volver").onclick = function() {
			window.open("productosABC.php", "_self");
		}
		<?php } ?>
	}
</script>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
			<?php if($m=="S"){ ?>	
			<div class="well" style="margin-top:20px">
				<label for="alta"></label>
				<input type="button" name="alta" value="Alta de Producto" class="btn btn-info" role="button" id="alta"/>
			</div>
			<?php } ?>
		</div>
		<div class="col-sm-10">
			<div class="well" style="margin-top:20px">
				<h2>ALTAS, BAJAS Y CAMBIOS BALONCESTO</h2>
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
				
				<form action="productosABC.php" method="post" enctype="multipart/form-data">
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre del producto" value="<?php if($m=="C"){print $nombre;} ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Descripción">* Descripción:</label>
						<textarea type="text" name="descripcion" id="descripcion" class="form-control" required placeholder="Descripción"><?php if($m=="C"){print $descripcion;} ?></textarea>
					</div>
					<div class="form-group text-left">
						<label for="Objetivo">* Objetivo:</label>
						<textarea type="text" name="objetivo" id="objetivo" class="form-control" required placeholder="Objetivo"><?php  if($m=="C"){print $objetivo;} ?></textarea>
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
						<label for="Fecha">* Fecha:</label>
						<input type="date" name="fecha" id="fecha" class="form-control" value="<?php if($m=="C"){ print $fecha;} ?>"/>
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
						print '<p><a href="productosABC.php?m=C&id='.$productos[$i]["id"].'">'.$productos[$i]["nombre"].'</a></p>';
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