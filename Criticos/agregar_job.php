<?php
session_start();
include('../Config/connection.php');
include('../Config/mysql.php');
include('../Functions/Function.php');
include('../Functions/Archivo.php');
if(isset($_SESSION['u'])){
	verify($_SESSION['u'],$host);

?>
<!DOCTYPE html>
<html lang="en">
	<?php include('../head.php');?>
	<body>
		<div id="wrapper">
			<?php include('../header.php');?>
			<div id="container">
				<h2>Agregar Job Critico</h2>
				<div class="formularios">
					<form action="newjob.php" method="post">
						<label id="jobsl">Jobs</label>
						<textarea name="jobs" id="jobs" ></textarea>
						<input type="submit" value="Guardar" />
					</form>
					<a href="jobs_criticos.php">Regresar</a>
				</div>
			</div>
		</div>
		<?php include('../footer.php');?>
	</body>
</html>
<?php 
}else{
	header("Location: http://$host/Jobs/");	
}
?>