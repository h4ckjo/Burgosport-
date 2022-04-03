<?php
function masVendidos($conn){
		$sql="SELECT * FROM productos WHERE masvendidos='1' AND tipo='0'  LIMIT 3";
		$r=mysqli_query($conn,$sql);
		while($data=mysqli_fetch_assoc($r)){
			print '<div class="well">'.$data["nombre"];
			print '<a href="productos.php?id='.$data["id"].'"><img src="img/'.$data["imagen"].'" class="media-object img-responsive" width="100%"></a>';
			print '</div>';
		}
	}

function nuevos($conn){
	$sql="SELECT * FROM productos WHERE nuevos='1' AND tipo='0' LIMIT 3";
	$r=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($r)){
		print '<div class="well">'.$data["nombre"];
		print '<a href="productos.php?id='.$data["id"].'"><img src="img/'.$data["imagen"].'" class="media-object img-responsive" width="100%"></a>';
		print '</div>';
	}
}
function baloncestomasVendidos($conn){
	$sql="SELECT * FROM productos WHERE masvendidos='1'AND tipo='1' LIMIT 3";
	$r=mysqli_query($conn,$sql);
	while($data=mysqli_fetch_assoc($r)){
		print '<div class="well">'.$data["nombre"];
		print '<a href="productos.php?id='.$data["id"].'"><img src="img/'.$data["imagen"].'" class="media-object img-responsive" width="100%"></a>';
		print '</div>';
	}
}

function baloncestonuevos($conn){
$sql="SELECT * FROM productos WHERE nuevos='1'AND tipo='1' LIMIT 3";
$r=mysqli_query($conn,$sql);
while($data=mysqli_fetch_assoc($r)){
	print '<div class="well">'.$data["nombre"];
	print '<a href="productos.php?id='.$data["id"].'"><img src="img/'.$data["imagen"].'" class="media-object img-responsive" width="100%"></a>';
	print '</div>';
}
}
?>