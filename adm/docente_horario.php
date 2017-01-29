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
<title>Ingresar Horario</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" action="docente_horario1.php" method="post" id="formulario">
    	<fieldset>
        <legend>Asignar Horario</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="ced">Cédula/Nro de Matrícula: </label></td>
                <td><input type="text" name="ced" maxlength="9" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="ced_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="cod">Código de Materia: </label></td>
                <td><input type="text" name="cod" maxlength="15" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="cod_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="seccion">Seccion: </label></td>
                <td><input type="text" name="seccion" maxlength="5" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="seccion_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="periodo">Periodo Lectivo: </label></td>
                <td><input type="text" name="periodo" maxlength="10" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="periodo_error" class="error"></td>
            </tr>
           
           	<tr>
        		<td><label for="dia">Dia: </label></td>
                <td><select name="dia">
                	<option value=1>Lunes</option>
                    <option value=2>Martes</option>
                    <option value=3>Miercoles</option>
                    <option value=4>Jueves</option>
                    <option value=5>Viernes</option>
                    <option value=6>Sabado</option>
                    <option value=7>Domingo</option>
                    </select>
                </td>
            </tr>
                        
            <tr>
        		<td><label for="hora_ent">Hora de entrada (24hrs): </label></td>
                <td><input type="hora_ent" name="hora_ent"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="hora_ent_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="hora_sal">Hora de salida (24hrs): </label></td>
                <td><input type="text" name="hora_sal"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="hora_sal_error" class="error"></td>
            </tr>
            <tr class="error"><td>NOTA: las horas deben ingresarse en formato de 24 horas</td></tr>
            
            <tr>
        		<td><label for="aula">Aula: </label></td>
                <td><input type="text" name="aula" maxlength="2"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="aula_error" class="error"></td>
            </tr>
            
            <tr>
        		<td><label for="horas">Horas académicas: </label></td>
                <td><input type="text" name="horas" maxlength="1"/></td>
            </tr>
            <tr>
            	<td colspan="2" id="horas_error" class="error"></td>
            </tr>
			
            
			
        <tr>
        <td colspan="2" align="center">
        <br />
        <input type="button" accesskey="enter" onclick="validar_horario()" value="Asignar Horario" align="center"/>
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