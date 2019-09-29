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


				<!-- Ahora es cuando interviene el PHP para las demás filas.
					Aquí usamos el PHP embebido, que en muchos casos puede ser útil
					pero algo lioso.

					Otro método puede ser usar directamente echo '<tr>..<td>...</td>...</tr>', esto
					es, esculpir las etiquetas HTML con la sentencia de salida -->

				<?php 

					$sql = new mysqli("localhost", "root", NULL, "bdresidenciasescolares");
					$consulta = "select * from residencias"; // Buscamos todos los datos de residencias escolares
					// Ahora tenemos que hacer la consulta e ir recorriendo todos los resultados
					$result = $sql->query($consulta);
					// Recorremos los resultados con fetch_assoc()
					while( $row= $result->fetch_assoc() ) { // Los datos están como un array, con fetch_assoc() los recibimos como una fila ?>

						<tr>
							<td><?php echo $row["codResidencia"]?></td>
							<td><?php echo $row["nomResidencia"]?></td>
							<td><?php echo $row["codUniversidad"]?></td>
							<td><?php echo $row["precioMensual"]?></td>
							<td><?php echo $row["comedor"]?></td>
						</tr>

					<?php }

					$sql->close();
				?>

			</table>
		</fieldset>
	</form>

</body>
</html>