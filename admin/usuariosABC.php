<?php
	$tituloPagina ="Burgosport";
	$pagina ="Usuarios";
	
	session_start();
	if(!isset($_SESSION['admin'])){
		header ("location:index.html");
	}

	include ('header.php');
	require "../php/conn.php";
	require "../php/funciones.php";
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
	if($m=="B"){
		$id=$_GET['id'];
		//verificamos que el usuario no tnga productos en el carrito
		$sql = "SELECT count(*) as num FROM carrito WHERE idUsuario=".$id;
		$r = mysqli_query($conn,$sql);
		$data = mysqli_fetch_assoc($r);
		$n = (mysqli_num_rows($r)==1)? $data["num"] : 0;
		if($n>0){
			$errores=array("No se puede borrar el usuario. El usuario tiene ".$n." productos en el carrito.");
			$m = "S";
		} else {
			//borramos el registro
			$sql="DELETE FROM users WHERE id=".$id;
			if(mysqli_query($conn,$sql)){
				header("location:usuariosABC.php");
			}
			$errores = array("Error al borrar el registro");
		}	
	}
	
	//lee la tabla productos
	
	if (isset($_POST['nombre'])){
		//pasamos a variables de trabajo
		//recuperamos el id
		$id = $_POST['id'];
		//recuperamos la info del usuario
		$nombre = $_POST["nombre"];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
		$direccion=$_POST['direccion'];
		$poblacion=$_POST['poblacion'];
		$codpost=$_POST['codpost'];
		$provincia=$_POST['provincia'];
		$telefono=$_POST['telefono'];
		//hacemos la actualizacion de datos
		$sql = "UPDATE users SET ";
		$sql.= "nombre='".$nombre."', ";
		$sql.= "apellidos='".$apellidos."', ";
		$sql.= "email='".$email."', ";
		$sql.= "direccion='".$direccion."', ";
		$sql.= "poblacion='".$poblacion."', ";
		$sql.= "codpost='".$codpost."', ";
		$sql.= "provincia='".$provincia."', ";
		$sql.= "telefono='".$telefono."' ";
		$sql.= "WHERE id=".$id;

		if(mysqli_query($conn,$sql)){
		header ("location:usuariosABC.html");	
		exit;
		}
	}
//leemos la tabla de productos
	//tipo 0 cursos
	//tipo 1 libros
	if($m=="S"){
		$sql="SELECT * FROM users";
		$r=mysqli_query($conn, $sql);
		//creamos un arreglo vacio
		$usuarios=array();
		while($data=mysqli_fetch_assoc($r)){
			array_push($usuarios, $data);
		}
	}

	if($m=="C"){
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
		//si nes correcto lo guardamos
		$sql = "SELECT * FROM users WHERE id=".$id;
		//volvemos a leer el objeto
		$r = mysqli_query($conn,$sql);
		$data=mysqli_fetch_assoc($r);
		//pasamos las variables a un vector asociado que es $data
		$nombre = $data["nombre"];
		$apellidos = $data['apellidos'];
		$email = $data['email'];
		$direccion = $data['direccion'];
		$poblacion = $data['poblacion'];
		$codpost = $data['codpost'];
		$provincia = $data['provincia'];
		$telefono = $data['telefono'];
	}
?>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-2 sidenav">
		</div>

		<div class="col-sm-8">
			<div class="well" style="margin-top:20px">
				<h2>BAJAS Y CAMBIOS DE USUARIOS</h2>
					<?php 
						if(count($errores)>0){
							print '<div class="alert alert-danger">' ;
							foreach ($errores as $key => $valor){
								print "<strong>" . $valor . "</strong>";
								}
							print '</div>';
						}	
						if($m=="C"){
					?>
				
				<form action="usuariosABC.php" method="post">
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre" value="<?php print $nombre; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Apellidos">* Apellidos:</label>
						<input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos" value="<?php print $apellidos; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="e-mail">*e-mail:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="e-mail" value="<?php print $email; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Dirección">* Dirección</label>
						<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Dirección" value="<?php print $direccion; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Población">* Población</label>
						<input type="text" name="poblacion" id="poblacion" class="form-control" required placeholder="Población" value="<?php print $poblacion; ?>"/>
					</div>
					<div class="form-group text-left">
						<label for="Código Postal">* Código Postal</label>
						<input type="text" name="codpost" id="codpost" class="form-control" required placeholder="Código Postal" value="<?php print $codpost; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Provincia">* Provincia</label>
						<input type="text" name="provincia" id="provincia" class="form-control" required placeholder="Provincia" value="<?php print $provincia; ?>"/>
					</div>
						<div class="form-group text-left">
						<label for="Teléfono">* Teléfono</label>
						<input type="text" name="telefono" id="telefono" class="form-control" required placeholder="Teléfono" value="<?php print $telefono; ?>"/>
					</div>

					<input type="hidden" id="id" name="id" value="<?php print $id; ?>">

					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Continuar" class="btn btn-success" role="button"/>
					</div>
				</form>

				<?php } 
				if($m=="S"){
					print '<table class="table table-striped" width="100%">';
					print '<tr>';
					print '<th>ID</th>';
					print '<th>NOMBRE</th>';
					print '<th>APELLIDOS</th>';
					print '<th>MODIFICAR</th>';
					print '<th>BORRAR</th>';
					print '</tr>';
					print '</table>';
					for($i=0; $i < count($usuarios); $i++){
						print '<table class="table table-striped" width="100%">';
						print '<tr>';
						print '<td>'.$usuarios[$i]["id"].'<td>';
						print '<td>'.$usuarios[$i]["nombre"].'<td>';
						print '<td>'.$usuarios[$i]["apellidos"].'<td>';
						print '<td><a class="btn btn-info" href="usuariosABC.php?m=C&id='.$usuarios[$i]["id"].'">Modificar</a></td>';
						print '<td><a class="btn btn-danger" href="usuariosABC.php?m=B&id='.$usuarios[$i]["id"].'">Borrar</a></td>';
						print '</tr>';
						print '</table>';
					}
				}
				?>	
		</div>	
	</div>
</div>
<?php include('../inc/footer.php'); ?>