<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";

	$cedula="select * from hist_pendiente where activo=1";
	$consulta_ced=mysql_query($cedula,$conexion);
	$total=mysql_num_rows($consulta_ced);


	if($total==0){
		echo"<script>alert('No existen asistencias por aprobar');
		top.location.href='index.php';</script>";
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
        	<tr>
            <td>Cédula</td>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Materia</td>
            <td>Sección</td>
            <td>Aula</td>
            <td>Entrada</td>
            <td>Salida</td>
            <td></td>
            </tr>
        <?php
			$hist="select * from hist_pendiente where activo=1";
			$consulta=mysql_query($hist,$conexion);
			
			while($cons=mysql_fetch_array($consulta)) {
				
				$ced=$cons['ced_prof'];
				$nomb_prof=$cons['nomb_prof'];
				$apell_prof=$cons['apell_prof'];
				$nomb_mat=$cons['nomb_mat'];
				$seccion=$cons['seccion'];
				$aula=$cons['aula'];
				$hora_ent=$cons['hora_ent'];
				$hora_sal=$cons['hora_sal'];
				$horas_acad=$cons['horas_acad'];
				$id_hist_pend=$cons['id_hist_pend'];
				
				?>
                
                <tr>
                <form name="form" method="post" id="formulario" action="">
                
                <td><?php echo $ced?><input type="text" name="ced" hidden="true" value="<?php echo $ced ?>"/></td>
                
                <td><?php echo $nomb_prof?><input type="text" name="nomb_prof" hidden="true" value="<?php echo $nomb_prof ?>"/></td>
                
                <td><?php echo $apell_prof?><input type="text" name="apell_prof" hidden="true" value="<?php echo $apell_prof ?>"/></td>
                
                <td><?php echo $nomb_mat ?><input type="text" name="nomb_mat" hidden="true" value="<?php echo $nomb_mat ?>"/></td>
                <td><?php echo $seccion ?><input type="text" name="seccion" hidden="true" value="<?php echo $seccion ?>"/></td>
                <td><?php echo $aula ?><input type="text" name="aula" hidden="true" value="<?php echo $aula ?>"/></td>
                
                <td><?php echo $hora_ent ?><input type="text" name="hora_ent" hidden="true" value="<?php echo $hora_ent ?>"/></td>
                
                <td><?php echo $hora_sal ?><input type="text" name="hora_sal" hidden="true" value="<?php echo $hora_sal ?>"/><input type="text" hidden="true" name="horas_acad" value="<?php echo $horas_acad ?>" /><input type="text" hidden="true" name="id_hist_pend" value="<?php echo $id_hist_pend ?>" /></td>
                
                <td><input type="button" onclick="this.form.action='asist_aprobar_a.php';submit()" value="Aprobar" /></td>
                <td><input type="button" onclick="this.form.action='asist_aprobar_r.php';submit()" value="Rechazar" /></td>
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