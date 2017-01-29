<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_carrera=$_POST['cod_carrera'];
	$nombre=$_POST['nombre'];
	
	$cons="select * from carreras where cod_carrera='$cod_carrera'";
	$consulta=mysql_query($cons,$conexion);
	$total=mysql_num_rows($consulta);
	
	if ($total>0){
		echo"<script>alert('Código de carrera ya existe en la Base de Datos');
		top.location.href='carrera_nueva.php';</script>";
	
	}
	else {
		$cons="select * from carreras where nomb_carrera='$nombre'";
		$consulta=mysql_query($cons,$conexion);
		$total=mysql_num_rows($consulta);
		
		if ($total>0){
		echo"<script>alert('Nombre de carrera ya existe en la Base de Datos');
		top.location.href='carrera_nueva.php';</script>";
	
		}
		else {
			
			$ins="insert into carreras (cod_carrera, nomb_carrera) values ('$cod_carrera','$nombre')"; 
			 
			$query=mysql_query($ins,$conexion);
				
			echo"<script>alert('Carrera Registrada');
			top.location.href='carrera_nueva.php';</script>";
		}
	}
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>