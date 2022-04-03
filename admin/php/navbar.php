<?php 
	if(isset($_SESSION['admin'])){
		print '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>';	
	} else {
		header ("location:index.php");
	}
?>