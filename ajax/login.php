<?php
include('../Config/mysql.php');
include('../Config/connection.php');
include('../Functions/Archivo.php');
include('../Functions/Function.php');
include('../Functions/ldap.php');

session_start();
$user = $_POST['user'];
$contra = $_POST['pass'];

if(substr($user, 0,5) != "banco" )
{
	$user = "banco\\".$user;
	//echo $user;
}

if($user == "banco\montivoli" || $user == "banco\shidalgo" || $user == "banco\spereira" || $user == "banco\msquicci" || $user == "banco\omorales" || $user == "banco\atorres4"){

	if(login($user, $contra)){
		$ip = getRealIP();
		$session = session_id();
		$_SESSION['u'] = 'ldap '.$user;
		$_SESSION['nombre'] = $user;
		$_SESSION['ip'] = $ip;
		escribir("login", "Inicio Sesión: " . $user . " ldap");
		header("Location: http://$host/Jobs/Criticos/jobs_criticos.php");
	}else{
		echo "Hay un error en la informacion del usuario";
		escribir("login_err", $user . " No pudo ingresar");
		header("Location: http://$host/Jobs/index.php?ok=0");
	}
}else{
	//echo "Usuario no autorizado";
	escribir("login_err", $user . " Usuario no Autorizado");
	header("Location: http://$host/Jobs/index.php?ok=1");
}

?>