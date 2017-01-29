<?php 
session_start();
header("Content-Type: text/html;charset=utf-8");
if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	
	
	$ced=$_POST['ced'];
	$hora_act= date("G:i");
	$dia_act=date(N);
	
	echo $ced."      ".$hora_act."     ".$dia_act;
	
	$consulta="select * from horario where ced_prof='$ced' AND dia='$dia_act' AND hora_ent>='$hora_act' 
	AND hora_sal<='$hora_act' AND activo=1";
	$cons=mysql_query($consulta,$conexion);
	$total=mysql_num_rows($cons);
	
	echo $total;
	
	if ($total==0){
		
		echo"<script>
				alert('El docente no tiene horas asignadas activas en este momento');
				top.location.href='index.html';
			</script>";
	}
		else {
			$datos=mysql_fetch_array($cons);
			$id_asign=$datos['id_asign'];
			
			
			}
		
		
?>



<?php }

else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";}
	
?>