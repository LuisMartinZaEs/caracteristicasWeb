<?php
$servername = "162.241.62.217";
$username = "superacs_sistemas";
$password = "Sistemas2021";
$database = "superacs_sistemas";

// Establecer conexión
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
	die("No hay conexión a la base de datos");
}else{
	echo("Sí hay");
	}
	
	$condicion1 = "SUCURSAL = '12'";
	$condicion2 = "ESTACION = '1'";

	$sql = "SELECT * FROM ARTICULOS WHERE $condicion1 AND $condicion2";
	$resultado = mysqli_query($conn,$sql);


	if (mysqli_num_rows($resultado) > 0) {
		echo "<div class='columns'>";
		$camposResaltados = array('SUCURSAL',
		'ESTACION', 'SERIE_INTERNA'); // Campos que deseas resaltar

		while ($fila = mysqli_fetch_assoc($resultado)) {
			echo "<div class='column'>";
			foreach ($fila as $campo => $valor) {
				echo "<label class='label'>$campo:</label>";
				if (in_array($campo, $camposResaltados)) {
					echo "<input class='textbox highlight' type='text' value='$valor' readonly><br>"; // Agregar una clase de resaltado
				} else {
					echo "<input class='textbox' type='text' value='$valor' readonly><br>";
				}
			}
			echo "</div>";
		}
		echo "</div>";
	} else{
		echo "No se encontraron resultados"; 
		}
		mysqli_close($conn);
?>