<!--
Edgar Carrizalez
C.I. V-19.352.988
Correo: edg.sistemas@gmail.com
-->
<?php
include("../connect/conexion.php");

// Carga de datos para el ingreso al plan vacacional
$id_ins = $_POST['id_ins'];
$pv_planillanumero = $_POST['pv_planillanumero'];
$id_mp = $_POST['id_mp'];
$pv_destino = $_POST['pv_destino'];
$pv_fotos="";
if(array_key_exists('pv_fotos',$_POST)){
$pv_fotos = $_POST['pv_fotos'];
}
$pv_certificado="";
if(array_key_exists('pv_certificado',$_POST)){
$pv_certificado = $_POST['pv_certificado'];
}
$pv_habilidades = $_POST['pv_habilidades'];
$edad_ni = $_POST['edad_ni'];
$pv_gustos = $_POST['pv_gustos'];
$pv_vacunas = $_POST['pv_vacunas'];
$pv_alergias = $_POST['pv_alergias'];
$pv_tratamiento = $_POST['pv_tratamiento'];
$pv_alimentosp = $_POST['pv_alimentosp'];
$pv_medicamentosp = $_POST['pv_medicamentosp'];
$pv_tchaqueta = $_POST['pv_tchaqueta'];
$pv_tfranela = $_POST['pv_tfranela'];
$pv_tmono = $_POST['pv_tmono'];
$pv_tgorra = $_POST['pv_tgorra'];
$pv_contacto_cedula = $_POST['pv_contacto_cedula'];
$pv_contacto_nombre = $_POST['pv_contacto_nombre'];
$pv_contacto_apellido = $_POST['pv_contacto_apellido'];
$pv_contacto_telefono = $_POST['pv_contacto_telefono'];
$pv_contacto_parentesco = $_POST['pv_contacto_parentesco'];
$pv_observaciones = $_POST['pv_observaciones'];

if(array_key_exists('h_gsanguineo',$_POST)){
$id_ninho = $_POST['id_ninho'];
$h_gsanguineo = $_POST['h_gsanguineo'];
mysql_query("UPDATE cj_beneficiados SET h_gsanguineo='$h_gsanguineo' WHERE id_ninho='$id_ninho'");
}
// Actualizacion
mysql_query("
UPDATE pv_inscrip_institutos SET
id_mp='$id_mp'
,pv_destino='$pv_destino'
,pv_fotos='$pv_fotos'
,pv_certificado='$pv_certificado'
,pv_habilidades='$pv_habilidades'
,pv_gustos='$pv_gustos'
,pv_vacunas='$pv_vacunas'
,pv_alergias='$pv_alergias'
,pv_tratamiento='$pv_tratamiento'
,pv_alimentosp='$pv_alimentosp'
,pv_medicamentosp='$pv_medicamentosp'
,pv_tchaqueta='$pv_tchaqueta'
,pv_tfranela='$pv_tfranela'
,pv_tmono='$pv_tmono'
,pv_tgorra='$pv_tgorra'
,pv_contacto_cedula='$pv_contacto_cedula'
,pv_contacto_nombre='$pv_contacto_nombre'
,pv_contacto_apellido='$pv_contacto_apellido'
,pv_contacto_telefono='$pv_contacto_telefono'
,pv_contacto_parentesco='$pv_contacto_parentesco'
,pv_observaciones='$pv_observaciones'
,pv_edadmeses='$edad_ni'
WHERE id_ins='$id_ins'") or die (mysql_error());
header("location:./pv_planilla.php?pn=$pv_planillanumero&&msj=2");
?>
