<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_mat=$_POST['cod'];
	$nomb_mat=$_POST['nombre'];
	$semestre_mat=$_POST['semestre'];
	$cod_carrera=$_POST['cod_carrera'];
	
	$cons="select * from materias where cod_mat='$cod_mat'";
	$consulta=mysql_query($cons,$conexion);
	$total=mysql_num_rows($consulta);
	
	if ($total>0){
		echo"<script>alert('Código de materia ya existe en la Base de Datos');
		top.location.href='materia_nueva.php';</script>";
	
	}
	else {
		$cons="select * from materias where nomb_mat='$nomb_mat'";
		$consulta=mysql_query($cons,$conexion);
		$total=mysql_num_rows($consulta);
		
		if ($total>0){
		echo"<script>alert('Nombre de Materia ya existe en la Base de Datos');
		top.location.href='materia_nueva.php';</script>";
	
		}
		else {
			
			$ins="insert into materias (cod_mat, nomb_mat, semestre_mat, cod_carrera) values 
			('$cod_mat', '$nomb_mat', '$semestre_mat', '$cod_carrera')"; 
			 
			$query=mysql_query($ins,$conexion);
				
			echo"<script>alert('Materia Registrada');
			top.location.href='materia_nueva.php';</script>";
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