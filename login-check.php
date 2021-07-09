
<?php

require_once "include/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = sha1(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: error");
}
else {

	$query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE usuario='$username' AND password='$password' ")or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);


	$querys = mysqli_query($mysqli_dos, "SELECT * FROM p_personal WHERE usuario='$username' AND password='$password' ")or die('error'.mysqli_error($mysqli));
	$row  = mysqli_num_rows($querys);


	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id']   = $data['id'];
		$_SESSION['usuario']  = $data['usuario'];
		$_SESSION['password']  = $data['password'];
		$_SESSION['nombre'] = $data['nombre'];
		$_SESSION['id_tipo_usuario'] = $data['id_tipo_usuario'];
	

if ($data['id_tipo_usuario'] == 2) {

	header("Location: modulos/planificacion/jp/home.php");
			} 

if ($data['id_tipo_usuario'] == 1) {

	header("Location: modulos/planificacion/jp/validar.php");
			} 

if ($data['id_tipo_usuario'] == 4) {

	header("Location: modulos/informes/validar.php");
			} 

if ($data['id_tipo_usuario'] == 3) {

	header("Location: main/inicio");
			} 			
			
/*			else {
	header("Location: main/inicio");			
			}
*/
		
	} elseif ($row > 0) {

$dat  = mysqli_fetch_assoc($querys);

		session_start();
		$_SESSION['id']   = $dat['id_personal'];
		$_SESSION['usuario']  = $dat['usuario'];
		$_SESSION['password']  = $dat['password'];
		$_SESSION['nombre'] = $dat['nombre'].' '.$dat['nombres'].' '.$dat['ap_paterno'].' '.$dat['ap_materno'];
		$_SESSION['id_tipo_usuario'] = $dat['id_tipo_usuario'];


	header("Location: main/inicio");


	}

	else {
		header("Location: error");
	}
}
?>