<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta content="text/html; charset=ISO-8859-1" httpequiv="content-type">
		<title> Creacion DB </title>
	<head>
	<body>
		
		<?php
						
			//mysql_connect('localhost','root','password'); //para versiones inferiores a 7
			if (!$link = mysqli_connect('localhost','root','')) {
				echo "Error al conectar con la base de datos <br>";
			} else if (!mysqli_select_db($link, "dbphp")) {
				echo "Error al acceder a la base de datos <br>";
			} else {
				$consulta = "CREATE TABLE tablaForm (NOMBRE VARCHAR(20), PASS VARCHAR(30), SEXO CHAR, DESCRIPCION VARCHAR(60), SIST_OPERATIVO VARCHAR(15));";
				//$consulta = "DROP TABLE prueba;";
				if (!mysqli_query($link, $consulta)) {
					echo "Error al realizar la consulta<br>";
				}		
			}
			
			
		?>
	<body>
</html>