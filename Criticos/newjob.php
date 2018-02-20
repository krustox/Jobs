<?php
session_start();
include('../Config/connection.php');
include('../Functions/Archivo.php');
include('../Functions/Function.php');

$jobs = "";
if(isset($_POST['jobs'])){
	if($_POST['jobs'] != " "){
		$jobs = $_POST['jobs'];
	}
}
$jobs = str_replace(array("\r\n","\n","\r"),",",$jobs);
escribir('Job_agregado',$_SESSION['u']." ". $jobs);
$job=explode(",", $jobs);
$job_leng= sizeof($job);
$tmp = "";
while($job_leng > 0){
	$job_leng = $job_leng - 1;
	$tmp=insert("JOBS", $conn_string, $job[$job_leng]);
}
if($tmp == ""){
	$extra = "jobs_criticos.php?ok=0";
	header("Location: http://$host/Jobs/Criticos/".$extra);
}else{
	$extra = "jobs_criticos.php?ok=1";
	header("Location: http://$host/Jobs/Criticos/".$extra);
}


?>
