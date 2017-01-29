<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
if ($_SESSION["usuario"])
{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilos_adm.css" >
<script type="text/javascript" src="../validaciones.js"></script>
<title>Registrar Nuevo Docente</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" action="docente_nuevo1.php" method="post" id="formulario">
    	<fieldset>
        <legend>Registro de Nuevo Docente</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="ced">Cédula/Nro de Matrícula: </label></td>
                <td><input type="text" name="ced" maxlength="9" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="ced_error" class="error"></td>
            </tr>

			<tr>
        		<td><label for="nombre">Nombre(s): </label></td>
         		<td><input type="text" name="nombre" maxlength="35" /></td>
           	</tr>
            <tr>
            	<td colspan="2" id="nombre_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="apellido">Apellido(s): </label></td>
                <td><input type="text" name="apellido" maxlength="35" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="apellido_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="profesion">Profesión (Principal): </label></td>
                <td><input type="text" name="profesion" maxlength="40" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="profesion_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="telefono">Teléfono (Principal): </label></td>
                <td><input type="text" name="telefono" maxlength="11" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="telefono_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="correo">Correo Electrónico: </label></td>
                <td><input type="text" name="correo" maxlength="40" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="correo_error" class="error"></td>
            </tr>
            
            <tr>
            	<td><label for="hist">Asignaturas impartidas: </td>
                <td><textarea name="hist" rows="3"></textarea></td>
            </tr>
            <tr>
            	<td colspan="2" id="hist_error" class="error"></td>
            </tr>
        <tr>
        <td colspan="2" align="center">
        <br />
        <input type="reset" align="middle"/>
        
        <input type="button" accesskey="enter" onclick="validar_doc_new()" value="Registrar" align="center"/>
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