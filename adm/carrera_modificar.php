<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
if ($_SESSION["usuario"])
{ 
	header("Content-Type: text/html;charset=utf-8");
	require_once"../conexion/conexion.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilos_adm.css" >
<script type="text/javascript" src="../validaciones.js"></script>
<title>Ingresar Nueva Carrera</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" method="post" id="formulario" action="carrera_modificar1.php">
    	<fieldset>
        <legend>Modificar Carrera</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="cod_carrera">Carrera: </label></td>
         		<td><select name="cod_carrera"> 
                <?php 
				$carreras="select * from carreras";
				$consulta=mysql_query($carreras,$conexion);
				
				while($cons= mysql_fetch_array($consulta)) {
				   echo "<option value=".$cons['cod_carrera'].">".$cons['nomb_carrera']."</option>";
				}	
				?>
                </select></td>
           	</tr>
            <tr>
            	<td colspan="2" id="cod_error" class="error"></td>
            </tr>
            
            <tr>
            <td colspan="2" align="center">
            <br />
          <input type="button" accesskey="enter" onclick="this.form.submit()" value="Modificar Carrera" align="center"/>
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


<?php }

else {
	echo"<script>
		alert('Zona protegida, inicie sesion para acceder');
		top.location.href='index.html';
	</script>";}
	
?>