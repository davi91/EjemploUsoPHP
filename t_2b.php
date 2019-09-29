<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Formulario Recibe Datos</title>
	<meta charset="utf-8">
</head>

<body>
	
	<form>
		
		<fieldset>
			
			<legend>Datos Residencias Escolares</legend>

			<table border="1">
				
				<tr>
					<th>Código residencia</th>
					<th>Nombre residencia</th>
					<th>Código universidad</th>
					<th>Precio mensual</th>
					<th>Comedor</th>
				</tr>


				<!-- Aquí usaremos la técina del echo -->

				<?php 

					$sql = new mysqli("localhost", "root", NULL, "bdresidenciasescolares");
					$consulta = "select * from residencias"; // Buscamos todos los datos de residencias escolares
					// Ahora tenemos que hacer la consulta e ir recorriendo todos los resultados
					$result = $sql->query($consulta);
					// Recorremos los resultados con fetch_assoc()
					while( $row= $result->fetch_assoc() ) { // Los datos están como un array, con fetch_assoc() los recibimos como una fila 

						echo '<tr>';
							echo '<td>'. $row["codResidencia"] . '</td>';
							echo '<td>'. $row["nomResidencia"] . '</td>';
							echo '<td>'. $row["codUniversidad"] . '</td>';
							echo '<td>'. $row["precioMensual"] . '</td>';
							echo '<td>'. $row["comedor"] . '</td>';
						echo '</tr>';

					 }

					$sql->close();
				?>

			</table>
		</fieldset>
	</form>

</body>
</html>