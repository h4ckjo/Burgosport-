<?php
$rutaRelativa = ".";
$param = "off";
$hayCookie = false;

	//Controlamos si el usuario ha pulsado sobre la opción de aceptar de la capa emergente
  if (isset($_POST["aceptar_cookie"]) && $_POST["aceptar_cookie"] != "")
		$param = $_POST["aceptar_cookie"];

  if(!isset($_COOKIE["cookieaceptada"]) && $param == "acepta")
  { 
    //La cookie Caduca en un año 
    setcookie("cookieaceptada", $param, time() + 365 * 24 * 60 * 60, "/", "burgosport.es", 0);
    $hayCookie = true;
    $retornoJson["resultado"]= array("ok"=>$param);
		echo json_encode($retornoJson);
  }
  else if(isset($_COOKIE["cookieaceptada"]))
  {
  	//Si hay cookies 
  	$hayCookie = true;
  } 
  else
  {
  	$hayCookie = false;
  }
  
  //Si este valor es false, entonces volvemos a motrar la capa con el aviso	
  if (!$hayCookie)
  {
?>
<script type="text/javascript">
<!--
function cerrarCookie()
{
	//Ocultamos la capa poco a poco
	$("#avisocookie").toggle("slow");
}

function mostrarCookie()
{
	//Mostramos la capa poco a poco
	$("#avisocookie").show("slow");
}

function aceptarCookie()
{
	cerrarCookie();
	$.ajax({
	   	url: "<?php echo $rutaRelativa;?>/avisocookies.php",
	   	data: "aceptar_cookie=acepta", 
   		contentType: "application/x-www-form-urlencoded",
         type: "POST",
          success: function(retorno)
					{
						try
						{						
							
							if (retorno == null || retorno == "")
								mostrarCookie();
						}
						catch (e)
						{
							alert(e)
							mostrarCookie();
						}
					}							
				});
}
//-->

</script>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" type="text/css" href="<?php echo $rutaRelativa;?>/css/avisocookies.css">
<div id="avisocookie">
	<div class="cpMSGcookies">			
		<div class="mCookie1">
			<div class="mCookie2">
				<div class="mCookie3">
					<div class="mCookie4">
						<div class="mCookie5">
							<span class="textocookie">El sitio web burgosport.es utiliza cookies propias 
								y de terceros para poder ofrecerte una mejor experiencia de 
								navegación, recordar tus preferencias y mejorar constantemente según los hábitos 
								de navegación.<br/> 
								Si sigues navegando sin cambiar la configuración, aceptas el uso de cookies 
								en nuestro sitio. <a href="privacidad.html"> Mas información</a>							
							<br>
								<div class="btnAceptarCookie">
									<input type="button" value="Aceptar y ocultar" id="aceptarCookie" onclick="aceptarCookie();"/></div>
								</div>
								
								<div id="cerracookies" class="cpMSGcerrarcookie">			
								<span class="glyphicon glyphicon-off" alt="Cierra el mensaje emergente" onclick="cerrarCookie();" style="cursor:pointer; padding-left:40px"></span>
								</div>
							</span> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
