<?php
	//~ $host="mysql2.000webhost.com";
	//~ $user="a9988835_cvieri";
	//~ $pass="123456cv";
	//~ $base="a9988835_histori";
	//~ $conexion=mysql_connect("$host","$user","$pass");
	//~ mysql_select_db("$base",$conexion);


	$host="localhost";
	$user="root";
	$pass="";
	$base="caa";
	$conexion=mysql_connect("$host","$user","$pass");
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("$base",$conexion);

?>
