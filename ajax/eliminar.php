<?php
include('../Config/connection.php');
include('../Functions/Archivo.php');
include('../Functions/Function.php');

session_start();

$nombre = "";
if(isset($_GET['nombre'])){
	$nombre = $_GET['nombre'];
}
$tabla = "";
if(isset($_GET['tabla'])){
	$tabla = $_GET['tabla'];
}

if($nombre != ""){
		if($tabla != ""){
			$query = "DELETE FROM \"JOBS_CRITICOS\".\"$tabla\" WHERE \"nombre_job\" = '$nombre'";
		}else {
			if($nombre == "Critico"){
				$query = "DELETE FROM \"JOBS_CRITICOS\".\"JOBS\"";
			}else{
				$query = "DELETE FROM \"JOBS_CRITICOS\".\"JOBS_DIA\"";
			}
		}
}

if(ejecutarDelete($query, $conn_string)){
	echo "Se eliminó el registro seleccionado";
}else{
	echo "No se pudo eliminar el registro seleccionado";
}
?>