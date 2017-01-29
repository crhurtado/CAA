<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_mat=$_POST['cod_mat'];
	$seccion=$_POST['seccion'];
	$periodo=$_POST['periodo'];
	$ced=$_POST['ced'];


		$up="update asignaciones set activo=0 where ced_prof='$ced' AND cod_mat='$cod_mat' AND seccion='$seccion' AND periodo='$periodo'"; 
		 
		$query=mysql_query($up,$conexion);
				
			echo"<script>alert('Procesado');
			top.location.href='docente_materia.php';</script>";
		
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>