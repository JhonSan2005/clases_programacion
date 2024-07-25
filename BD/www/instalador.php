
<!--
	Autor: Camilo Figueroa ( Crivera )
	Primer formulario para la instalación de un aplicativo, aunque el aplicativo en sí no existe, solo se mostrará el proceso de instalación.
-->

<html>
	<head>
		<title>Instalador de aplicativo.</title>
	</head>

	<body>

		A continuaci&oacute;n se proceder&aacute; a instalar un aplicativo, el cual permite observar dicho proceso al detalle.<br>
		Sin embargo requiere de que la <strong>base de datos</strong> sea creada con anterioridad. <br><br>

		<form action="instalando.php" method="_get">

			Servidor: 		<input type="text" name="servidor"><br>
			Usuario: 		<input type="text" name="usuario"><br>
			Contraseña: 	<input type="text" name="contrasena"><br>
			BD: 			<input type="text" name="bd"><br>
			<input type="submit" value="Enviar">

		</form>


	</body>

</html>