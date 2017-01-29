<?php 
session_start();
header("Content-Type: text/html;charset=utf-8");
if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	
	$ced=$_POST['ced'];
	$hora_act= strtotime(date("G:i"));
	$dia_act=date("N");

	$consulta="select * from horario where ced_prof='$ced' AND dia='$dia_act' AND activo=1";
	$cons=mysql_query($consulta,$conexion);
	$total=mysql_num_rows($cons);
	

	if ($total==0){
		
		echo"<script>
				alert('El docente no tiene horas asignadas activas en este momento');
				top.location.href='../index.html';
			</script>";
	}
		else {
			$x=0;
			while($datos=mysql_fetch_array($cons)){			
				$hora_ent=strtotime($datos['hora_ent']);
				$hora_sal=strtotime($datos['hora_sal']);
				$hora_ent1=$datos['hora_ent'];
				$hora_sal1=$datos['hora_sal'];
				$aula=$datos['aula'];
				$horas_acad=$datos['horas_acad'];
				
				/*echo "hora entrada: ".$hora_ent." / hora salida: ".$hora_sal."<br />";
				echo "hora actual: ".$hora_act."<br />";*/
				if(($hora_ent<= $hora_act) and ($hora_sal>= $hora_act)){
					$id_asign=$datos['id_asign'];
					$x=1;
					break;					
					}			
				}
			
			
			if($x==0){
				echo"<script>
				alert('El docente no tiene horas asignadas activas en este momento');
				top.location.href='../index.html';
			</script>";
				}
			else{
			
			$consulta="select * from datos_prof where ced_prof='$ced'";
			$cons=mysql_query($consulta,$conexion);
			$datos=mysql_fetch_array($cons);
			
			$nomb_prof=$datos['nomb_prof'];
			$apell_prof=$datos['apell_prof'];
			
						
			$consulta="select * from asignaciones where id_asign='$id_asign'";
			$cons=mysql_query($consulta,$conexion);
			$asignaciones=mysql_fetch_array($cons);
			
			$cod_mat=$asignaciones['cod_mat'];
			$seccion=$asignaciones['seccion'];
			
			
			$consulta="select * from materias where cod_mat='$cod_mat'";
			$cons=mysql_query($consulta,$conexion);
			$materias=mysql_fetch_array($cons);
			
			$nomb_mat=$materias['nomb_mat'];
			
			
			$ins="insert into hist_pendiente (ced_prof, nomb_prof, apell_prof, nomb_mat, seccion, aula, hora_ent, hora_sal, horas_acad) values ('$ced', '$nomb_prof', '$apell_prof', '$nomb_mat', '$seccion', '$aula', '$hora_ent1', '$hora_sal1', '$horas_acad')";
			
			mysql_query($ins,$conexion);
				
				
			echo"<script>
				alert('Asistencia registrada y a la espera de aprovación');
				top.location.href='../index.html';
			</script>";
						
			}
		}
		
		
?>



<?php }

else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='../index.html';
	</script>";}
	
?>