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
       
        <div class="well">
            <img src="img/botaf.jpg"  width="100%" height="550px">
        </div>
		</div>
			<div class="col-sm-6" >
				<div class="well" style="margin-top:40px">
					<h2>Gracias por registrarse en Burgosports.com</h2>
					<p>Disfruta de los mejores productos de la web</p>
					<br><br>
					<a href="index.html" class="btn btn-success">Continuar</a>
					<br><br>
					
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>

			