<?php

function admonpedidosservientrega_acciones_ajax(){
include "tieneRecoleccionEspMas.php";
include "createReqSporMultiGuia.php";
include "generarStickerMasivo.php";
include "estadoguiaMasivo.php";
include "terminarEnvio.php";
include "descargarZipSticker.php";
include "detalle-envio.php";
include "carguemasivo.php";
include "Encriptar.php";

	
	$opcion=sanitize_text_field($_POST["opcion"]); 
	
	switch ($opcion) {
		case "generarRecoleccionEsporadica":
			admonpedidosservientrega_generarRecoleccionEsporadica();
			break;
		case "asignarrecoleccion":
			admonpedidosservientrega_generarRecogidaMasivo();
			break;
		case "generarpdf":
			admonpedidosservientrega_generarGuiasStickerMasivo();
			break;
		case "actualizarestadoenvio":
			admonpedidosservientrega_generarcosultarEstadoMasivo();
			break;
		case 'terminarenvio':
			admonpedidosservientrega_terminarenvio();
			break;
		case 'descargarstickerzip':
			admonpedidosservientrega_descargarStickerZip();
			break;
		case 'detalleenvio':
			admonpedidosservientrega_detalleenvio();
			break;
		case 'carguedetallado':
			admonpedidosservientrega_carguedetallado();
			break;
		case 'encriptar':
			admonpedidosservientrega_Encriptar();
			break;
		
	}
}