<?php 
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../estilos.css" >
<title>Control de Asistencias</title>
	<body>
		
<?php 
header("Content-Type: text/html;charset=utf-8");
require_once"../conexion/conexion.php";

$nick=trim($_POST['nick']);
$pass=md5($_POST['pass']);

$usuario="select * from usuarios where nick='$nick'";
$consulta_usuario=mysql_query($usuario,$conexion);
$res_u=mysql_num_rows($consulta_usuario);

if ($res_u==0){
	echo"<script>
		alert('Usuario no registrado');
		top.location.href='index.html';
	</script>"; exit;
	}
else {
	$contraseña="select * from usuarios where nick='$nick' and pass='$pass'";
	$consulta_c=mysql_query($contraseña,$conexion);
	$res_c=mysql_num_rows($consulta_c);
	
	if ($res_c==0){
		echo"<script>
			alert('El usuario y la contraseña no coinciden');
			top.location.href='index.html';
		</script>"; exit;
		}
	else{
		$vector=mysql_fetch_array($consulta_c);
		$activo=$vector['activo'];
		
		if($activo==true){
			$_SESSION["usuario"]=$nick;
			
			echo"<script>
				alert('Bienvenido');
				top.location.href='index.php';
			</script>"; exit;
			
		}
		else{
			echo"<script>
			alert('Usuario Inactivo, para mayor información comuniquese con el administrador del sistema.');
			top.location.href='index.html';
			</script>"; exit;
		}
	}
}
?>				
	</body>
</html>
