<?php
function escapaCadena($cadena){
	$cadena = escapeshellcmd($cadena);
	//print $cadena;
	$buscar = array('^', 'delete', 'drop','truncate', 'exec','system');
	$reemplazar =array('-', 'de*le*te', 'dr*op','trun*cate', 'ex*ec', 'syst*em');
	$cadena = str_replace($buscar, $reemplazar, $cadena);
	//print $cadena;
	return $cadena;
}

function validaFecha($fecha){
	$fecha_array = explode("-", $fecha);
	return checkdate($fecha_array[1], $fecha_array[2], $fecha_array[0]);
}	

function validaImagen($producto, $anchoNuevo){
	$archivo ="../img/".$producto;
	//recuperamos los datos de la imagen
	$info=getimagesize($archivo);
	$ancho=$info[0];
	$alto=$info[1];
	$tipo=$info['mime'];
	//calculamos la proporcionalidad
	$nuevoAncho = $anchoNuevo;
	$factor = $anchoNuevo / $ancho;
	$nuevoAlto = $alto * $factor;
	//creamos un nuevo objeto
	switch ($tipo) {
		case 'image/jpg';
		case 'image/jpeg';
			$imagen=imagecreatefromjpeg($archivo);
			break;
		case 'image/png';
		$imagen=imagecreatefrompng($archivo);
		break;
		case 'image/gif';
			$imagen=imagecreatefromgif($archivo);
			break;
	}
	//creamos un recipiente para la imagen
	$lienzo=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	//vaciamos la imagen modificada del lienzo
	imagecopyresampled($lienzo, $imagen,0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	//creamos el nuevo archivo
	imagejpeg($lienzo, "../img/".$producto,80);
}
?>