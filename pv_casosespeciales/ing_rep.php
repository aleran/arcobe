<!--Autor 
Edgar Carrizalez
C.I. V-19.3522.988
Correo: edg.sistemas@gmail.com
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
	<title>ARCOBE</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="../estilo/estilo.css" type="text/css"/>
	<script language="javascript" src="../js/delimitar.js"></script>
	<style>
		.suggest-element{
		margin-left:5px;
		margin-top:5px;
		width:400px;
		cursor:pointer;
		}
		#suggestions {
		position:fixed;
		margin: 0 35px;
		width:400px;
		height:150px;
		border:ridge 2px;
		border-radius: 3px;
		overflow: auto;
		background: white;
		}
	</style>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
	function validar(formulario){
		if(formulario.re.value.length==0){
			document.getElementById("mp").style.border = "2px inset red";
			formulario.re.focus();
			alert("¡Introduzca la cédula!");
			return false;
		}
	return true;
	}
	function busc_ms(){
		$('#suggestions').fadeIn(500);
	}
	function bus_h(){
		var mp = document.getElementById('mp').value;		
			var dataString = 'mp='+mp;
			$.ajax({
				type: "POST",
				url: "empleados.php",
				data: dataString,
				success: function(data) {
					$('#suggestions').fadeIn(1000).html(data);
					$('.suggest-element a').live('click', function(){
						var id = $(this).attr('id');
						$('#mp').val($('#'+id).attr('data'));
						$('#suggestions').fadeOut(1000);
						$('#ing_mp').submit();
						return false;
					});              
				}
			});
	}
	function g(){
		$('#suggestions').fadeOut(300);
	}
	</script>
</head>
<?php
include("../connect/conexion.php");
include("../sesion/sesion.php");
?>
<body onclick='g();'>
	<div id="cabecera_ini"></div>
	<div id="contenedor">
		<h3 class="n">Ingreso del Beneficiario (Casos Especiales)<br>Cédula del Representante</h3><br>
		<form action="re_mp.php" method="get" id="ing_mp" onsubmit="return validar(this)" onkeypress="return permite(event, 'num_car')">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cédula <input type="text" name="re" id="mp" autocomplete=off onkeyup="busc_ms();bus_h()"><input type="submit" value="Enviar">
		<div id="suggestions"></div>
		</form><br>
		<script>
		$('#suggestions').fadeOut(0);
		</script>
		<center><span><a href="./" >Cancelar</a></span></center><br>
	</div>
	<?php
	if(array_key_exists('error',$_GET) and $_GET['error']==1){
		echo "
		<script>
		alert('Trabajador no registrado o introdujo erróneamente la cédula');
		</script>
		";
	}
	?>
</body>
</html>
