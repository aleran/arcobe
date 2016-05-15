
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Actualizar</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
</head>

<body>
	Trabajadores
	<form name="importa" method="post" action="actualizar.php" enctype="multipart/form-data" >
		<input type="file" name="excel"/><br>
		<input type='submit' name='enviar'  value="Importar" />
	</form>
	<br>
	Datos
	<form name="importador" method="post" action="actualizar_datos.php" enctype="multipart/form-data" >
		<input type="file" name="excel"/><br>
		<input type='submit' name='enviar'  value="Importar" />
	</form>
</body>

</html>
<?php
if(array_key_exists('accion',$_GET) and $_GET['accion']=="1"){
	echo "cargado con éxito";
}
?>
