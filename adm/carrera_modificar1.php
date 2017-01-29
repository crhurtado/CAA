<?php
session_start();

if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
	$cod_carrera=$_POST['cod_carrera'];
	$nombre=$_POST['nombre'];
	
	$cons="select * from carreras where cod_carrera='$cod_carrera'";
	$consulta=mysql_query($cons,$conexion);
	$datos=mysql_fetch_array($consulta);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilos_adm.css" >
<script type="text/javascript" src="../validaciones.js"></script>
<title>Modificar Carrera</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" method="post" id="formulario" action="carrera_modificar2.php">
    	<fieldset>
        <legend>Modificar Carrera</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="cod_carrera">Código: </label></td>
                <td><input type="text" name="cod_carrera" maxlength="20" value="<?php echo $datos['cod_carrera']?>" />
                <input type="text" name="cod_ant" maxlength="20" value="<?php echo $datos['cod_carrera']?>" hidden="true"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="cod_error" class="error"></td>
            </tr>
            <tr>
        		<td><label for="nombre">Nombre: </label></td>
         		<td><input type="text" name="nombre" maxlength="40" value="<?php echo $datos['nomb_carrera']?>"/>
                <input type="text" name="nombre_ant" maxlength="40" value="<?php echo $datos['nomb_carrera']?>" hidden="true"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="nombre_error" class="error"></td>
            </tr>
			
        <tr>
        <td colspan="2" align="center">
        <br />
        <input type="button" accesskey="enter" onclick="validar_carrera()" value="Modificar" align="center"/>
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