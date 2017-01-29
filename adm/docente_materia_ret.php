<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$ced=$_POST['ced'];
	
	$cedula="select * from asignaciones where ced_prof='$ced' AND activo=1";
	$consulta_ced=mysql_query($cedula,$conexion);
	$total=mysql_num_rows($consulta_ced);


	if($total==0){
		echo"<script>alert('Este Número de Cédula no posee materias asignadas');
		top.location.href='docente_nuevo.php';</script>";
		exit;
	}
	else {
				
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilos_adm.css" >
<script type="text/javascript" src="../validaciones.js"></script>
<title>Docentes - Retirar Matéria</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <fieldset>
        <legend>Retirar Materia</legend>
        
        <table cellspacing="5">
        <?php
			$materias="select * from asignaciones where ced_prof='$ced' AND activo=1";
			$consulta=mysql_query($materias,$conexion);
			
			while($cons=mysql_fetch_array($consulta)) {
				$cod_mat=$cons['cod_mat'];
				$seccion=$cons['seccion'];
				$periodo=$cons['periodo'];
				
				?>
                
                <tr>
                <form name="form" method="post" id="formulario" action="docente_materia_ret1.php">
                
                <td><?php echo $cod_mat?>,<input type="text" name="cod_mat" hidden="true" value="<?php echo $cod_mat ?>"/></td>
                <td>Sección: <?php echo $seccion ?>,<input type="text" name="seccion" hidden="true" value="<?php echo $seccion ?>"/></td>
                <td>Periodo: <?php echo $periodo ?><input type="text" name="periodo" hidden="true" value="<?php echo $periodo ?>"/><input type="text" hidden="true" name="ced" value="<?php echo $ced ?>" /></td>
                <td><input type="submit" value="Retirar" /></td>
                </form>
                </tr>
                
                <?php
			}
		 ?>
		</table>
        </fieldset>   
    
    </div>
</div>
	

<div id="footer"></div>
</body>
</html>

<?php
}
}
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>