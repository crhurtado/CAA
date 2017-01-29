<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$ced=$_POST['ced'];
	
	$cedula="select * from datos_prof where ced_prof='$ced'";
	$consulta_ced=mysql_query($cedula,$conexion);
	$total=mysql_num_rows($consulta_ced);
	
	echo $total;
	if($total==0){
		echo"<script>alert('Este Número de Cédula no se encuentra en la base de datos');
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
<title>Docentes - Asignar Materia</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" method="post" id="formulario" action="docente_materia_asig1.php">
    	<fieldset>
        <legend>Asignación de Matéria</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="ced">Cédula/Nro de Matrícula: </label></td>
                <td><?php echo $ced;?><input type="text" name="ced" maxlength="9" hidden="true" value="<?php echo $ced?>"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="ced_error" class="error"></td>
            </tr>

			<tr>
        		<td><label for="cod_mat">Matéria: </label></td>
         		<td><select name="cod_mat"> 
                <?php 
				$materias="select * from materias";
				$consulta=mysql_query($materias,$conexion);
				
				while($cons= mysql_fetch_array($consulta)) {
				   echo "<option value=".$cons['cod_mat'].">".$cons['nomb_mat']."</option>";
				}	
				?>
                </select></td>
           	</tr>
            <tr>
            	<td colspan="2" id="cod_error" class="error"></td>
            </tr>
            
            
            <tr>
        		<td><label for="seccion">Sección: </label></td>
         		<td><input type="text" name="seccion" maxlength="40"/></td>
           	</tr>
            <tr>
            	<td colspan="2" id="seccion_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="periodo">Periodo Lectivo: </label></td>
         		<td><input type="text" name="periodo" maxlength="10"/></td>
           	</tr>
            <tr>
            	<td colspan="2" id="periodo_error" class="error"></td>
            </tr>
          
        <tr>
        <td colspan="2" align="center">
        <br />
        <input type="button" onclick="asignar_mat()" value="Asignar" align="center"/>
        
        </td>
        </tr>
        </table>
        </fieldset>   
    </form>
    
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