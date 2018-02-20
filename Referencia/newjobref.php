<?php
session_start();
include('../Config/connection.php');
include('../Functions/Archivo.php');
include('../Functions/Function.php');

$jobs = "";
$horas = "";
$minutos = "";

if(isset($_POST['jobs'])){
	if($_POST['jobs'] != " "){
		$jobs = $_POST['jobs'];
	}
}
$jobs = str_replace(array("\r\n","\n","\r"),",",$jobs);
if(isset($_POST['hora'])){
	if($_POST['hora'] != " "){
		$horas = $_POST['hora'];
	}
}
if(isset($_POST['minuto'])){
	if($_POST['minuto'] != " "){
		$minutos = $_POST['minuto'];
	}
}


escribir('Jobref_agregado',$_SESSION['u']." ". $jobs." ".$hora." ".$minuto);
$job=explode(",", $jobs);
$job_leng= sizeof($job);
$hora=explode(",", $horas);
$hora_leng= sizeof($hora);
$minuto=explode(",", $minutos);
$minuto_leng= sizeof($minuto);
$tmp = "";
if($job_leng == $hora_leng && $job_leng == $minuto_leng){
	while($job_leng > 0){
		$job_leng = $job_leng - 1;
		$tmp=insert("JOBS_DIA", $conn_string, "$job[$job_leng],$hora[$job_leng],$minuto[$job_leng]");
	}
}
if($tmp == ""){
	$extra = "jobs_referencia.php?ok=0";
	header("Location: http://$host/Jobs/Referencia/".$extra);
}else{
	$extra = "jobs_referencia.php?ok=1";
	header("Location: http://$host/Jobs/Referencia/".$extra);
}


?>
