<?php 
	$mysqli = mysqli_connect('localhost','root','','kotaksoal');
	if(mysqli_connect_errno($mysqli)){
		header("Location: "."connerror.html");
	}
?>