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
				<h2>Agregar Job de Referencia</h2>
				<div class="formularios">
					<form action="newjobref.php" method="post">
						<label id="jobsl">Jobs</label>
						<textarea name="jobs" id="jobs" ></textarea>
						<label id="hora" for="hora">Hora</label>
						<input name="hora" id="hora" />
						<label id="minuto" for="minuto">Minuto</label>
						<input name="minuto" id="minuto" />
						<input type="submit" value="Guardar" />
					</form>
					<a href="jobs_referencia.php">Regresar</a>
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