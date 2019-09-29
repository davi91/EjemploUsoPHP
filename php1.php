<?php

	// Leemos los datos del formulario
	$nombre = $_GET["r_name"];
	$uni = $_GET["r_uni"];
	$precio = $_GET["r_precio"];
	$comedor = $_GET["r_com"];

	// Es conveniente comprobar que los datos son correctos
	if( empty($nombre) || empty($uni)  ) {
		die('No se han introducido campos correctos'); // Para los strings usamos la función empty, para otros isset
	}

	/* Vamos a conectar con la base de datos.
	Las bases de datos con la nueva versión de
	PHP las tratamos como objetos  */
	$dbhost = "localhost"; // Donde
	$dbuser = "root"; // Quien
	$dbcon = new mysqli($dbhost, $dbuser, NULL, "bdresidenciasescolares"); // Ahora conectamos, como no hay contraseña no la establecemos

	// Ahora nosotros vammos a establecer la petición de insercción de datos
	// Los datos tipo String tienen que ir entre comillas simples
	$insertData = "insert into residencias values ( NULL, '$nombre', '$uni', '$precio', $comedor )";

	if(mysqli_query($dbcon, $insertData) == true) { // Podemos también utilizarlo en modo objeto: $dbcon->query(consulta)
		printf("Los datos de la tabla se han insertado correctamente");
	} else {
		printf("Error al insertar en la tabla residencias");
	}

	// Cerramos la base de datos cuando terminamos
	$dbcon->close();

?>