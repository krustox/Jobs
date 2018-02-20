<header>
	<h1>Jobs Criticos</h1>
<?php
		if(isset($_SESSION['u'])){?>
			<p><?php echo $_SESSION['nombre']; ?></p><a onclick="logout()">Cerrar Sesion</a>
<?php }?>
</header>

<?php
		if(isset($_SESSION['u'])){?>
<nav>
	<ul id="navigator">
		
		<li><a href="/Jobs/Criticos/jobs_criticos.php">Jobs Criticos</a></li>
		<li><a href="/Jobs/Referencia/jobs_referencia.php">Jobs Referencia</a></li>
		
	</ul>
</nav>
<?php  }?>