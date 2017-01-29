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
	
	echo $total;
	if($total==1){
		$up="update datos_prof set nomb_prof='$nombre', apell_prof='$apellido', profesion='$profesion', telf='$telefono', correo_prof='$correo', hist_asign='$hist' where ced_prof='$ced'"; 
		 
		$query=mysql_query($up,$conexion);
		
		echo"<script>alert('Actualización Existosa');
		top.location.href='docente_buscar.php';</script>";
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
