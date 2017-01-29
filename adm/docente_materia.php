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
<title>Buscar Docente</title>

</head>

<body>
<div id="header"></div>

<div id="div_principal">
	<div id="menu">
    <?php include ("menu.html"); ?>
    </div>
    <div id="cuerpo">
    
    <form name="form" action="" method="post" id="formulario">
    	<fieldset>
        <legend>Buscar Docente</legend>
        <table cellspacing="5">
        	<tr>
        		<td><label for="ced">Cédula/Nro de Matrícula: </label></td>
                <td><input type="text" name="ced" maxlength="9" /></td>
            </tr>
            <tr>
            	<td colspan="2" id="ced_error" class="error"></td>
            </tr>
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
        <input type="button" accesskey="enter" onclick="this.form.action='docente_materia_ret.php';validar_doc_mat()" value="Retirar Matéria" align="center"/>
        <input type="button" accesskey="enter" onclick="this.form.action='docente_materia_asig.php';validar_doc_mat()" value="Asignar Matéria" align="center"/>
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