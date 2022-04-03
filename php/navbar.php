<?php 
	if(isset($_SESSION['carrito'])){
		print '<li><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart">
		</span>&nbsp Cesta</a></li>';
	}
//validamos si hay sesion
	if(isset($_SESSION['usuario'])){
		print '<li><a href="#">'.$nombre."&nbsp;".$apellidos.'</a></li>';
		print '<li><a href="logout.html"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>';	
	} else {
		print '<li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>';
	}
?>