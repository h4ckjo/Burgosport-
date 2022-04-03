<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Contacto";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-6 sidenav">
			<div class="well" style="margin-top:20px">
				<h2 class="text-center">CONTACTO</h2>
				<p>Ingrese sus datos:</p>
				<form method="post" action="php/enviar.php">
					<div class="form-group text-left">
						<label for="Nombre">* Nombre:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
					</div>
					<div class="form-group text-left">
						<label for="Apellidos">* Apellidos:</label>
						<input type="text" name="apellidos" id="apellidos" class="form-control" required placeholder="Apellidos"/>
					</div>
					<div class="form-group text-left">
						<label for="Correo Electrónico">*Correo Electrónico:</label>
						<input type="email" name="email" id="email" class="form-control" required placeholder="Correo Electrónico"/>
					</div>
					<div class="form-group text-left">
						<label for="Mensaje">*Mensaje:</label>
						<textarea type="text" name="mensaje" id="mensaje" class="form-control" required placeholder="Mensaje"></textarea>
					</div>
					<div class="form-group text-center">
						<label for="Enviar"></label>
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success" role="button"/>
					</div>
				</form>
			</div>
		</div>
		
				
			<div class="row content">
                    <div class="col-sm-5 sidenav">
                       
                        <div class="well">
                            <img src="img/nieve.jpg"  width="400px" height="450px">
                        </div>
						</div>
        
		</div>	
		
		
	</div>
</div>
<?php include('inc/footer.php'); ?>