<?php
	$tituloPagina ="Mi Sitio";
	$pagina ="Forma de Pago";
	include ('inc/header.php');
	require "php/conn.php";
	require "php/laterales.php";
	if(!isset($_SESSION['usuario'])){
		header("location:login.php");
	}
?>
<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-sm-7">
			<div class="well" style="margin-top:20px">
				<ol class="breadcrumb">
					<li><a href="checkout.html">Iniciar Sesión</a></li>
					<li><a href="direccion.php">Datos de Envío</a></li>
					<li class="active">Forma de Pago</a></li>
					<li>Revisar Datos</a></li>
				</ol>
				<h2>FORMA DE PAGO</h2>
				<p>Indique su forma de pago:</p><br><br><br>
				<form action="verificar.html" method="post">
					<div class="row content">
						<div class="col-sm-6">
							<div class="form-group text-center">
								<label>Tarjeta:
								<br><br>
								<img src="img/tarjeta.jpg">
								<br><br>
								<input type="radio" name="pago" id="tarjeta" value="Tarjeta ">
								
								</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group text-center">
								<label>PayPal:
								<br><br>
								<img src="img/paypal.jpg">
								<br><br>
								<input type="radio" name="pago" id="paypal" value= "PayPal"/>
								</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group text-center">
								<label>Recogida en Correos:
								<br><br>
								<img src="img/correos.png">
								<br><br>
								<input type="radio" name="pago" id="contrarembolso" value="contrarembolso"/>
								
								</label>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group text-center">
								<label>Contrarembolso:
								<br><br>
								<img src="img/recogida.png">
								<br><br>
								<input type="radio" name="pago" id="contrarembolso" value="contrarembolso"/>
								
								</label>
							</div>
						</div>
						<div class="form-group text-center">
							<label for="Enviar"></label>
							<input type="submit" name="enviar" value="Continuar" class="btn btn-success" role="button"/>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-5 sidenav">
		
		<div class="well">
			<a><img src="img/desierto.jpg" class="media-object img-resposvive" width="100%" height="650px"></a>
		</div>
		</div>
	</div>
</div>
<?php include('inc/footer.php'); ?>