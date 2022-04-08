<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta content="text/html; charset=UTF-8" httpequiv="content-type">
		<title> Ejercicio Formularios </title>
	<head>
	<body>
		<form action="Formulario.php" method="post">
		
			Nombre:
			<br/>			
			<input type = "text" name="nombre" id="nombre" />
			<br/>
			<br/>
			
			Contraseña:
			<br/>			
			<input type="password" name="passwd" id="passwd" />
			<br/>
			<br/>
			
			Puestos de trabajo buscados:
			<br/>
			<input name="puestos[]" type="checkbox" value="direccion"/> Dirección
			<br/>
			<input name="puestos[]" type="checkbox" value="tecnico"/> Técnico
			<br/>
			<input name="puestos[]" type="checkbox" value="empleado"/> Empleado
			<br/>
			<br/>
			
			Sexo:
			<br/>
			<input type="radio" name="sexo" value="H" checked="checked" /> Hombre
			<br/>
			<input type="radio" name="sexo" value="M" /> Mujer
			<br/>
			<br/>
			
			<input type="hidden" name="oculto" value="se envía el campo oculto" />
			
			Descripción:
			<br/>
			<textarea id="descripcion" name="descripcion" cols="40" rows="5"></textarea>
			<br/>
			<br/>
			
			Sistema operativo:
			<br/>
			<select id="so" name="so">
			  <option value="" selected="selected">- Seleccione -</option>
			  <option value="windows">Windows</option>
			  <option value="mac">Mac</option>
			  <option value="linux">Linux</option>
			  <option value="otro">Otro</option>
			</select>
			<br/>
			<br/> 
			 
			Sistema operativo:
			<br/>
			<select id="so2" name="so2" size="2">
			  <option value="windows" selected="selected">Windows</option>
			  <option value="mac">Mac</option>
			  <option value="linux">Linux</option>
			  <option value="otro">Otro</option>
			</select>
			<br/>
			<br/>
			 
			Sistema operativo:
			<br/>
			<select id="so3" name="so3[]" size="4" multiple="multiple">
			  <option value="windows" selected="selected">Windows</option>
			  <option value="mac">Mac</option>
			  <option value="linux">Linux</option>
			  <option value="otro">Otro</option>
			</select>
			<br/>
			<br/>
			
			
			<input type="submit" name="enviar" value="Enviar" />
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="reset" name="borrar" value="Borrar datos del formulario" />
			
		</form>
		<?php
			
			if (isset($_REQUEST['enviar'])) {

				$nombre = $_REQUEST['nombre'];
				$passwd = $_REQUEST['passwd'];
				$sexo = $_REQUEST['sexo'];
				$descripcion = $_REQUEST['descripcion'];
				$so = $_REQUEST['so'];
				$so2 = $_REQUEST['so2'];
				$oculto = $_REQUEST['oculto'];
			

				if (!$link = mysqli_connect('localhost','root','')) {
					
					echo "Error al conectar con la base de datos <br>";

				} else if (!mysqli_select_db($link, "dbphp")) {
					
					echo "Error al acceder a la base de datos <br>";

				} else {
					
					$consulta = "INSERT INTO tablaForm (NOMBRE, PASS, SEXO, DESCRIPCION, SIST_OPERATIVO) VALUES ('$nombre','$passwd','$sexo','$descripcion','$so');";
					
					//$consulta = "DROP TABLE prueba;";
					
					if (!mysqli_query($link, $consulta)) {
						echo "Error al realizar la consulta<br>";
					}	

				}


				echo " Nombre: $nombre <br/>";
				
				echo " Contraseña: $passwd <br/>";
				
				echo " Puestos de trabajo buscados:  <br/>";
				
				foreach($_REQUEST['puestos'] as $puesto) {
					echo "$puesto <br/>";
				}
				
				echo " Sexo: $sexo <br/>";
				
				echo " Oculto: $oculto <br/>";
				
				echo " Descripción: $descripcion <br/>";
				
				echo " Sistema operativo 1: $so <br/>";
				
				echo " Sistema operativo 2: $so2 <br/>";
				
				echo " Sistema operativos 3: <br/>";
				
				foreach($_REQUEST['so3'] as $so3) {
					echo "$so3 <br/>";
				}
				
			} 
		?>
	<body>
</html>