<?php 
	session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title> Sistema Automatizado de Historiales Clínicos </title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="estilos.css" >
		
	</head>
	<body>
		
<?php 
require_once"../conexion/conexion.php";

$user=trim($_POST['nick']);
$pass=md5($_POST['pass']);

$usuario="select user from usuarios where user='$user'";
$consulta_usuario=mysql_query($usuario,$conexion);
$res_u=mysql_num_rows($consulta_usuario);

if ($res_u==0){
	echo"<script>
		alert('Usuario no registrado');
		top.location.href='../index.html';
	</script>"; exit;
	}
else {
	$contraseña="select * from usuarios where user='$user' and pass='$pass'";
	$consulta_c=mysql_query($contraseña,$conexion);
	$res_c=mysql_num_rows($consulta_c);
	
	if ($res_c==0){
		echo"<script>
			alert('El usuario y la contraseña no coinciden');
			top.location.href='../index.html';
		</script>"; exit;
		}
	else{
		$vector=mysql_fetch_array($consulta_c);
		$activo=$vector['activo'];
		$nivel=$vector['nivel'];
		$ced_u=$vector['cedula'];
		
		if($activo==1){
			$_SESSION["usuario"]=$user;
			$_SESSION["nivel"]=$nivel;
			$_SESSION["cedula"]=$ced_u;
			
			if ($nivel==1){
			echo"<script>
				alert('Bienvenido');
				top.location.href='../principal/admin/index.php';
			</script>"; exit;
			}
			
			else if ($nivel==2){
			echo"<script>
				alert('Bienvenido');
				top.location.href='../principal/per_adm/index.php';
			</script>"; exit;
			}
			
			else if ($nivel==3){
			echo"<script>
				alert('Bienvenido');
				top.location.href='../principal/med/index.php';
			</script>"; exit;
			}
			
			else if ($nivel==4){
			echo"<script>
				alert('Bienvenido');
				top.location.href='../principal/pac/index.php';
			</script>"; exit;		
			}
		}
		else{
			echo"<script>
			alert('Usuario Inactivo');
			top.location.href='../index.html';
			</script>"; exit;
		}
	}
}
?>				
	</body>
</html>
