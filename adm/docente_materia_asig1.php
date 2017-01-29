<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$ced=$_POST['ced'];
	$cod_mat=$_POST['cod_mat'];
	$seccion=$_POST['seccion'];
	$periodo=$_POST['periodo'];
	
	$asign="select * from asignaciones where ced_prof='$ced' AND cod_mat='$cod_mat' AND seccion='$seccion' AND periodo='$periodo' AND activo=1";
	$consulta=mysql_query($asign,$conexion);
	$total=mysql_num_rows($consulta);
	
	if ($total==1){
		echo"<script>alert('Esta materia ya se habia asignado al docente');
		top.location.href='docente_materia.php';</script>";
	
	}
	else {
		$asign="select * from asignaciones where cod_mat='$cod_mat' AND seccion='$seccion' AND periodo='$periodo' AND activo=1";
		$consulta=mysql_query($asign,$conexion);
		$total=mysql_num_rows($consulta);
		
		if ($total==1){
		echo"<script>alert('Esta materia ya se asignó a otro docente');
		top.location.href='docente_materia.php';</script>";
	
		}
		else {
			
			$ins="insert into asignaciones (ced_prof, cod_mat, seccion, periodo) values ('$ced','$cod_mat','$seccion','$periodo')"; 
			 
			$query=mysql_query($ins,$conexion);
				
			echo"<script>alert('Materia Asignada');
			top.location.href='docente_horario.php';</script>";
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
