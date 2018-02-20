<?php 

function verify($user,$host){
	if($user == ""){
		$_SESSION['u'] = null;
			$_SESSION['nombre'] = null;
			$_SESSION['ip'] = null;
			session_unset();
			session_destroy();
			header("Location: http://$host/Jobs/index.php");
	}
}
?>