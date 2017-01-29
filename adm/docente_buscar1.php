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
	if($total==1){
		
		$datos=mysql_fetch_array($consulta_ced);
		
		print_r($datos);
	}
	else {
		echo"<script>alert('Este Número de Cédula no se encuentra en la base de datos');
		top.location.href='docente_nuevo.php';</script>";
		exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilos_adm.css" >
<script type="text/javascript" src="../validaciones.js"></script>
<title>Docentes - Datos Personales</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" method="post" id="formulario" action="">
    	<fieldset>
        <legend>Registro de Nuevo Docente</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="ced">Cédula/Nro de Matrícula: </label></td>
                <td><?php echo $datos['ced_prof'];?>
                <input type="text" name="ced" maxlength="9" hidden="true" value="<?php echo $datos['ced_prof'];?>"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="ced_error" class="error"></td>
            </tr>

			<tr>
        		<td><label for="nombre">Nombre(s): </label></td>
         		<td><?php echo $datos['nomb_prof'];?></td>
           	</tr>
            <tr>
            	<td colspan="2" id="nombre_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="apellido">Apellido(s): </label></td>
                <td><?php echo $datos['apell_prof'];?></td>
            </tr>
            <tr>
            	<td colspan="2" id="apellido_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="profesion">Profesión (Principal): </label></td>
                <td><?php echo $datos['profesion'];?></td>
            </tr>
            <tr>
            	<td colspan="2" id="profesion_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="telefono">Teléfono (Principal): </label></td>
                <td><?php echo $datos['telf'];?></td>
            </tr>
            <tr>
            	<td colspan="2" id="telefono_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="correo">Correo Electrónico: </label></td>
                <td><?php echo $datos['correo_prof'];?></td>
            </tr>
            <tr>
            	<td colspan="2" id="correo_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="hist">Asignaturas impartidas: </td>
                <td><?php echo $datos['hist_asign'];?></td>
            </tr>
            <tr>
            	<td colspan="2" id="hist_error" class="error"></td>
            </tr>
        <tr>
        <td colspan="2" align="center">
        <br />     
        <input type="button" accesskey="enter" onclick="this.form.action='docente_modificar.php';this.form.submit()" value="Modificar" align="center"/>
        
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
else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";
}
?>