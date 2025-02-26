<?php
function admonpedidosservientrega_Encriptar(){
include "ServiciosWeb.inc";

$params = array(
	  'strcontrasena'=> sanitize_text_field($_POST["clave"])
	);


$servicio= new admonpedidosservientrega_ServicioWeb_Cliente('http://web.servientrega.com:8081/GeneracionGuias.asmx?wsdl');
$servicio->parametrosEntrada=$params;
$servicio->llamarServicio('EncriptarContrasena');
echo(($servicio->respuesta->EncriptarContrasenaResult));

}
?>