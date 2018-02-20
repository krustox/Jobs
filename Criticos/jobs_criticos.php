<?php
session_start();
include('../Config/connection.php');
include('../Config/mysql.php');
include('../Functions/Function.php');
include('../Functions/Archivo.php');
if(isset($_SESSION['u'])){
	verify($_SESSION['u'],$host);

include('../success.php');
?>
<!DOCTYPE html>
<html lang="en">
	<?php include('../head.php');?>
	<body>
		<div id="wrapper">
			<?php include('../header.php');?>
			<div id="container">
				<h2>Jobs Criticos</h2>
<?php
$query ="SELECT * FROM \"JOBS_CRITICOS\".\"JOBS\" ";
$data=LeerDatosDB($conn_string,"","",$query);
?>
<button onclick="crear('critico')">Agregar Job Critico</button>
				<table id = "table">
					<thead>
					<tr>
						<th>Job</th>
						<th>Accion</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th>Job</th>
						<th>Accion</th>
					</tr>
					</tfoot>
					<tbody>
						<?php EscribirDatosHTML($data, "tabla"); ?>
					</tbody>
				</table>
			<!--	<button id="borrar" onclick="borrartodo('Critico')">Eliminar Todo</button>-->			
			</div>
			<?php include('../footer.php');?>
		</div>
	</body>
</html>
<?php 
}else{
	header("Location: http://$host/Jobs/");	
}
?>