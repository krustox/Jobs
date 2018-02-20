<?php
//Hace consulta Select y guarda en un [][]
function LeerDatosDB($conn_string,$esquema,$tabla,$query){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		if($query ==""){
			$query= "Select * from \"$esquema\".\"$tabla\"";
		}
		if ($conn_resource) {
				 	$resp = db2_prepare($conn_resource, $query);
					 if($resp){
					 	$result = db2_exec($conn_resource, $query);
						 if ($result) {
						 	$data = array();
							 $i=0;
						 	while ($row = db2_fetch_array($result)) {
						 		$length = sizeof($row);
								$j=0;
								$data[$i] = array();
								while ( $length > 0){
						 			$length = $length - 1;
						 			$data[$i][$j]= $row[$j];
									$j = $j+1;
								}
								$i=$i+1;
						 	}
						 }else{
						 	echo db2_stmt_errormsg();
						 }
						 return $data;
					 }
		}
	}
}

//Escribe datos en tabla o en <option>....</option>
function EscribirDatosHTML($data, $forma){
	$length = sizeof($data);
	$width = 100/($length+1);
	if ($forma == "tabla"){
		$j=0;
		while ($length > 0 ){
			$length = $length -1;
			$nombre =$data[$j][0];
			?><tr>
				<td>
				<?php echo $nombre; ?> 
				</td>
				<td>
				<?php echo "<a onclick=\"eliminar('$nombre','JOBS')\">Eliminar</a>"; ?>	
				</td>
			</tr><?php
			$j=$j+1;
		}
	}else if ($forma == "tabla2"){
		$j=0;
		while ($length > 0 ){
			$length = $length -1;
			$nombre =$data[$j][0];
			$hora =$data[$j][1];
			$minuto =$data[$j][2];
			?><tr>
				<td>
				<?php echo $nombre; ?> 
				</td>
				<td>
				<?php echo $hora; ?> 
				</td>
				<td>
				<?php echo $minuto; ?> 
				</td>
				<td>
				<?php echo "<a onclick=\"eliminar('$nombre','JOBS_DIA')\">Eliminar</a>"; ?>	
				</td>
			</tr><?php
			$j=$j+1;
		}
	}
}

//Elimina datos según query enviada
function ejecutarDelete($query, $conn_string){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if (!$result) {
				escribir("Eliminar", db2_stmt_errormsg());
				return false;
			}else{
				escribir("Eliminar", $query);
				return true;
			}
    	}
	}
	db2_close($conn_resource);
}

//Ejecuta update según query enviada
function ejecutarUpdate($query, $conn_string){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$resp = db2_prepare($conn_resource, $query);
		if($resp){
	 		$result = db2_exec($conn_resource, $query	);
			if (!$result) {
				escribir("Actualizar", db2_stmt_errormsg());
				return false;
			}else{
				escribir("Actualizar", $query);
				return true;
			}
    	}
	}
	db2_close($conn_resource);
}

//Revisa si un dato existe en una tabla
function Exists($tabla,$conn_string, $valor){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$data = "";
		$query = "SELECT * FROM \"JOBS_CRITICOS\".\"$tabla\" WHERE \"nombre_job\" = '$valor' ";
		echo $query;
		if ($conn_resource) {
		 	$resp = db2_prepare($conn_resource, $query);
			 if($resp){
			 	$result = db2_exec($conn_resource, $query);
				 if ($result) {
				 	if($row = db2_fetch_array($result)) {
				 		$data = $row[0];
					}else{
						return 0;
					}
				 }else{
				 	echo db2_stmt_errormsg();
				 }
				 return $data;
			 }
		}
	}
}

//Reliza insert de datos en la tabla valores separado por ;
function insert($tabla,$conn_string,$valores){
	$conn_resource = db2_connect($conn_string, '', '');
	if ($conn_resource) {
		$data = "";
		if($tabla == "JOBS"){
			$query = "INSERT INTO \"JOBS_CRITICOS\".\"$tabla\" VALUES ('$valores') ";
		}else{
			$valor = explode(",", $valores);
			$query = "INSERT INTO \"JOBS_CRITICOS\".\"$tabla\" VALUES ('$valor[0]',$valor[1],$valor[2]) ";
			$valores = $valor[0];
		}
		echo $query;
		if ($conn_resource) {
		 	$resp = db2_prepare($conn_resource, $query);
			 if($resp){
			 	$result = db2_exec($conn_resource, $query);
				 if ($result) {
				 	escribir("Insertar", $_SESSION['u'] ." ". $query);
				 	$data = Exists($tabla, $conn_string,$valores);
				 }else{
				 	echo db2_stmt_errormsg();
				 }
				 return $data;
			 }
		}
	}
}

function getRealIP() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $_SERVER['REMOTE_ADDR'];
}

?>
