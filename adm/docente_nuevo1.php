<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$ced=$_POST['ced'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$profesion=$_POST['profesion'];
	$telefono=$_POST['telefono'];
	$correo=$_POST['correo'];
	
	if ($_POST['hist']){
		$hist=$_POST['hist'];
		}
	else{$hist="";}
	
	
	
	$cedula="select * from datos_prof where ced_prof='$ced'";
	$consulta_ced=mysql_query($cedula,$conexion);
	$total=mysql_num_rows($consulta_ced);
	
	
	if($total==0){
		$ins="insert into datos_prof (ced_prof, nomb_prof, apell_prof, profesion, telf, correo_prof, hist_asign) values ('$ced','$nombre','$apellido','$profesion','$telefono','$correo','$hist')"; 
		 
		$query=mysql_query($ins,$conexion);
		
		echo"<script>alert('Registro Existoso');
		top.location.href='docente_nuevo.php';</script>";
		exit;
	}
	else {
		echo"<script>alert('Este Número de Cédula ya se encuentra en la base de datos (docente ya registrado)');
		top.location.href='docente_nuevo.php';</script>";
		exit;
	}
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>
