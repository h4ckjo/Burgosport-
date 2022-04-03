<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Nosotros";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";

?>
<div class="container-fluid text-center">
	<div class="row-content">
		
		<div class="row content">
    <div class="col-sm-4 sidenav">
       
        <div class="well">
            <img src="img/lateral1.jpg"  width="100%" height="550px">
        </div>
    
			
		</div>
		<div class="col-sm-6 text-left">
			<div class="well text-center" style="margin-top:20px">
				<h2>Nosotros</h2>
				<p>Burgosport
					Es una empresa burgalesa que nació en primer lugar como proyecto 
					final del grado superior de desarrollo web y que despues de varias 
					versiones se ha convertido en un servicio web de una tienda online 
					real.
					Nuestro proposito es dar la mejor experiencia de navegación para el 
					usuario.<p><br><br>
					<a href="index.php" class="btn btn-success" role="button">Regresar</a>
				
				
			</div>
		</div>
		
		</div>	
	</div>
</div>
<?php include('inc/footer.php'); ?>
