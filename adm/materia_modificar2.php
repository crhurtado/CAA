<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_mat=$_POST['cod'];
	$cod_ant=$_POST['cod_ant'];
	$nombre=$_POST['nombre'];
	$nombre_ant=$_POST['nombre_ant'];
	$semestre=$_POST['semestre'];
	$cod_carrera=$_POST['cod_carrera'];
	
	
	$cons="select * from materias where cod_mat='$cod_mat'";
	$consulta=mysql_query($cons,$conexion);
	$total=mysql_num_rows($consulta);
	
	if ($total==0 or $cod_mat==$cod_ant){
		
		$cons="select * from materias where nomb_mat='$nombre'";
		$consulta=mysql_query($cons,$conexion);
		$total=mysql_num_rows($consulta);
		
		if ($total==0 or $nombre==$nombre_ant){
		
		$up="update materias set cod_mat='$cod_mat', nomb_mat='$nombre', semestre='$semestre', cod_carrera='$cod_carrera' where cod_carrera='$cod_ant'";
		
		mysql_query($up,$conexion);
		
		echo"<script>alert('Datos Actualizados');
		top.location.href='materia_modificar.php';</script>";
		}
		
		else{
			echo"<script>alert('Nombre asignado a otra Materia');
			top.location.href='materia_modificar.php';</script>";
			
			}
	}
	else {
		echo"<script>alert('Código Materia registrada');
		top.location.href='materia_modificar.php';</script>";
		}
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>