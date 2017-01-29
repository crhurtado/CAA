<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_carrera=$_POST['cod_carrera'];
	$cod_ant=$_POST['cod_ant'];
	$nombre=$_POST['nombre'];
	$nombre_ant=$_POST['nombre_ant'];
	
	$cons="select * from carreras where cod_carrera='$cod_carrera'";
	$consulta=mysql_query($cons,$conexion);
	$total=mysql_num_rows($consulta);
	
	if ($total==0 or $cod_carrera==$cod_ant){
		
		$cons="select * from carreras where nomb_carrera='$nombre'";
		$consulta=mysql_query($cons,$conexion);
		$total=mysql_num_rows($consulta);
		
		if ($total==0 or $nombre==$nombre_ant){
		
		$up="update carreras set cod_carrera='$cod_carrera', nomb_carrera='$nombre' where cod_carrera='$cod_ant'";
		
		mysql_query($up,$conexion);
		
		echo"<script>alert('Datos Actualizados');
		top.location.href='carrera_modificar.php';</script>";
		}
		
		else{
			echo"<script>alert('Nombre asignado a otra Carrera');
			top.location.href='carrera_modificar.php';</script>";
			
			}
	}
	else {
		echo"<script>alert('Código asignado a otra Carrera');
		top.location.href='carrera_modificar.php';</script>";
		}
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>