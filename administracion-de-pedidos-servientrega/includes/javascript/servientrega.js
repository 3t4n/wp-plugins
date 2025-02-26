function configurarTabla()
		{
			DT1 = jQuery('#totalEnvios').DataTable({
									"language": {
										"processing": "Procesando...",
										"lengthMenu": "Resultados por página _MENU_",
										"zeroRecords": "No se encontraron resultados",
										"emptyTable": "Ningún dato disponible en esta tabla",
										"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
										"infoFiltered": "(filtrado de un total de _MAX_ registros)",
										"search": "Buscar:",
										"infoThousands": ",",
										"loadingRecords": "Cargando...",
										"paginate": {
											"first": "Primero",
											"last": "Último",
											"next": "Siguiente",
											"previous": "Anterior"
										},
										"aria": {
											"sortAscending": ": Activar para ordenar la columna de manera ascendente",
											"sortDescending": ": Activar para ordenar la columna de manera descendente"
										},
										"buttons": {
											"copy": "Copiar",
											"colvis": "Columnas",
											"collection": "Colección",
											"colvisRestore": "Restaurar columnas",
											"copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
											"copySuccess": {
												"1": "Copiada 1 fila al portapapeles",
												"_": "Copiadas %d fila al portapapeles"
											},
											"copyTitle": "Copiar al portapapeles",
											"csv": "CSV",
											"excel": "Descargar lista de envíos",
											"pageLength": {
												"-1": "Mostrar todas las filas",
												"_": "Mostrar %d filas"
											},
											"pdf": "PDF",
											"print": "Imprimir"
										},
										"autoFill": {
											"cancel": "Cancelar",
											"fill": "Rellene todas las celdas con <i>%d<\/i>",
											"fillHorizontal": "Rellenar celdas horizontalmente",
											"fillVertical": "Rellenar celdas verticalmentemente"
										},
										"decimal": ",",
										"searchBuilder": {
											"add": "Añadir condición",
											"button": {
												"0": "Constructor de búsqueda",
												"_": "Constructor de búsqueda (%d)"
											},
											"clearAll": "Borrar todo",
											"condition": "Condición",
											"conditions": {
												"date": {
													"after": "Despues",
													"before": "Antes",
													"between": "Entre",
													"empty": "Vacío",
													"equals": "Igual a",
													"notBetween": "No entre",
													"notEmpty": "No Vacio",
													"not": "Diferente de"
												},
												"number": {
													"between": "Entre",
													"empty": "Vacio",
													"equals": "Igual a",
													"gt": "Mayor a",
													"gte": "Mayor o igual a",
													"lt": "Menor que",
													"lte": "Menor o igual que",
													"notBetween": "No entre",
													"notEmpty": "No vacío",
													"not": "Diferente de"
												},
												"string": {
													"contains": "Contiene",
													"empty": "Vacío",
													"endsWith": "Termina en",
													"equals": "Igual a",
													"notEmpty": "No Vacio",
													"startsWith": "Empieza con",
													"not": "Diferente de"
												},
												"array": {
													"not": "Diferente de",
													"equals": "Igual",
													"empty": "Vacío",
													"contains": "Contiene",
													"notEmpty": "No Vacío",
													"without": "Sin"
												}
											},
											"data": "Data",
											"deleteTitle": "Eliminar regla de filtrado",
											"leftTitle": "Criterios anulados",
											"logicAnd": "Y",
											"logicOr": "O",
											"rightTitle": "Criterios de sangría",
											"title": {
												"0": "Constructor de búsqueda",
												"_": "Constructor de búsqueda (%d)"
											},
											"value": "Valor"
										},
										"searchPanes": {
											"clearMessage": "Borrar todo",
											"collapse": {
												"0": "Paneles de búsqueda",
												"_": "Paneles de búsqueda (%d)"
											},
											"count": "{total}",
											"countFiltered": "{shown} ({total})",
											"emptyPanes": "Sin paneles de búsqueda",
											"loadMessage": "Cargando paneles de búsqueda",
											"title": "Filtros Activos - %d"
										},
										"select": {
											"cells": {
												"1": "1 celda seleccionada",
												"_": "%d celdas seleccionadas"
											},
											"columns": {
												"1": "1 columna seleccionada",
												"_": "%d columnas seleccionadas"
											},
											"rows": {
												"1": "1 fila seleccionada",
												"_": "%d filas seleccionadas"
											}
										},
										"thousands": ".",
										"datetime": {
											"previous": "Anterior",
											"next": "Proximo",
											"hours": "Horas",
											"minutes": "Minutos",
											"seconds": "Segundos",
											"unknown": "-",
											"amPm": [
												"AM",
												"PM"
											],
											"months": {
												"0": "Enero",
												"1": "Febrero",
												"10": "Noviembre",
												"11": "Diciembre",
												"2": "Marzo",
												"3": "Abril",
												"4": "Mayo",
												"5": "Junio",
												"6": "Julio",
												"7": "Agosto",
												"8": "Septiembre",
												"9": "Octubre"
											},
											"weekdays": [
												"Dom",
												"Lun",
												"Mar",
												"Mie",
												"Jue",
												"Vie",
												"Sab"
											]
										},
										"editor": {
											"close": "Cerrar",
											"create": {
												"button": "Nuevo",
												"title": "Crear Nuevo Registro",
												"submit": "Crear"
											},
											"edit": {
												"button": "Editar",
												"title": "Editar Registro",
												"submit": "Actualizar"
											},
											"remove": {
												"button": "Eliminar",
												"title": "Eliminar Registro",
												"submit": "Eliminar",
												"confirm": {
													"_": "¿Está seguro que desea eliminar %d filas?",
													"1": "¿Está seguro que desea eliminar 1 fila?"
												}
											},
											"error": {
												"system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
											},
											"multi": {
												"title": "Múltiples Valores",
												"info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
												"restore": "Deshacer Cambios",
												"noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
											}
										},
										//"info": "Mostrando _START_ a _END_ de _TOTAL_ envíos"
										"info": "_TOTAL_ Envíos en total"
									},
									dom: '<"shadow mb-4"<"top d-flex flex-wrap justify-content-between"iBc>t><"bottom d-flex flex-wrap justify-content-between"lpr>',
									buttons: [
										//'copy', 'excel', 'colvis' //copy es para agregar un botón para copiar toda la tabla
										'excel'//, 'colvis'
									],
									responsive: true,
									columnDefs: [ {
										orderable: false,
										className: 'select-checkbox',
										targets:   0
									},
									{
										visible: false,
										targets: 11
									},
									{
										visible: false,
										targets: 12
									},
									{
										visible: false,
										targets: 13
									},
									{
										visible: false,
										targets: 14
									},
									{
										visible: false,
										targets: 15
									},
									{
										visible: false,
										targets: 16
									},
									{
										visible: false,
										targets: 17
									},
									{
										visible: false,
										targets: 18
									},
									{
										visible: false,
										targets: 19
									},
									{
										visible: false,
										targets: 20
									},
									{
										visible: false,
										targets: 21
									},
									{
										visible: false,
										targets: 22
									},
									{
										visible: false,
										targets: 23
									},
									{
										visible: false,
										targets: 24
									},
									{
										visible: false,
										targets: 25
									},
									{
										visible: false,
										targets: 26
									},
									{
										visible: false,
										targets: 27
									},
									{
										visible: false,
										targets: 28
									},
									{
										visible: false,
										targets: 29
									},
									{
										visible: false,
										targets: 30
									}
									],
									select: {
										style:    'multi',
										selector: 'td:first-child',
										info: false
									},
									order: [[ 1, 'desc' ]]
								});
								
								   jQuery(".selectAll").on( "click", function(e) {
									if (jQuery(this).is( ":checked" )) {
										DT1.rows(  ).select();        
									} else {
										DT1.rows(  ).deselect(); 
									}
								});
			
		}

function descargar(ajaxUrl){
    jQuery.ajax({
        url: ajaxUrl,
        method: 'GET',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = 'myfile.pdf';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        }
    });
}


function ejecutaProceso(parametros, contenedorResultado, urlAjax,recargarConsulta,showModal,hideModal){
        
        
		
		jQuery.ajax({
                data:  parametros, 
                url:   urlAjax, 
                type:  'post', 
                beforeSend: function () {
                        jQuery(contenedorResultado).html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
						
                        if(recargarConsulta=== null)
                                jQuery(contenedorResultado).html(response);
                        else ejecutarconsultarPedido(ajax_busqueda_var.url,null ,ajax_busqueda_var.action,  ajax_busqueda_var.nonce);
						if(showModal!==null) jQuery(showModal).modal('show');
						if(hideModal!==null) jQuery(hideModal).modal('hide');
						
                },
				error: function (request, status, error) {
					jQuery(contenedorResultado).html(error);
					if(hideModal!==null) jQuery(hideModal).modal('hide');
				}
        });
}




function ejecutarconsultarPedido(urlAjax,hideModal,var_action=null, var_nonce=null){
	
	
	var filtroPedidos={};
	jQuery(".filtropedido").each(function () {
		filtroPedidos[jQuery(this).attr('id')]= jQuery(this).val()  ;
		});	
	
	
	
	var parametros;
		
	if(var_action===null && var_nonce===null)
		parametros={'filtroPedido':filtroPedidos};
	else
		parametros={'action': var_action, 'nonce': var_nonce,'filtroPedido':filtroPedidos}; 
		//JSON.stringify(array)}
		
	 //console.log(authHeader);
	 jQuery.ajax({
					data:  parametros, //datos que se envian a traves de ajax
					url:   urlAjax, //archivo que recibe la peticion
					type:  'post', //método de envio
					beforeSend: function () {
							jQuery('#envios').html("Procesando, espere por favor...");
					},
					success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
							
									jQuery('#envios').html(response);
									
									configurarTabla();
									
									DT1.column(0).visible(enProceso=='1');
									DT1.column(5).visible(enProceso=='1');
									setTimeout(function(){ if(hideModal!==null) jQuery(hideModal).modal('hide'); }, 100);
								
									//*******
							
					},
					error: function (request, status, error) {
						jQuery('#envios').html(error);
						setTimeout(function(){ if(hideModal!==null) jQuery(hideModal).modal('hide'); }, 100);
					}
				});

		//ejecutaProceso(parametros,'#envios',urlAjax);

	
	
	
	
}


function ejecutarDescargarconsultaPedido(urlAjax){
	
	
	var filtroPedidos={};
	jQuery(".filtropedido").each(function () {
		filtroPedidos[jQuery(this).attr('id')]= jQuery(this).val()  ;
		});	
	
	
	
	
		
	var parametros={'filtroPedido':filtroPedidos};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	 
	 parametros["shop"]=jQuery("#shop").val();
    jQuery.ajax({
            data:  parametros, //datos que se envian a traves de ajax
            url:   urlAjax, //archivo que recibe la peticion
            type:  'post', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                         document.location.href = (response);
						
                },
            
            
    });
	 

	//	ejecutaProceso(parametros,'#envios',urlAjax);

	
	
	
}



function ejecutarconsultartoken(urlAjax){
	
	var Header="{";
	jQuery(".Header").each(function () {
		Header+='"'+jQuery(this).attr('id') + '":"' + jQuery(this).val() + '",' ;
		});
	Header=Header.substring(0,Header.length-1) +"}";
	var CotizarEnvio="{";
	jQuery(".CotizarEnvio").each(function () {
		CotizarEnvio+='"'+jQuery(this).attr('id') + '":"' + jQuery(this).val() + '",' ;
		});	
	
	var Piezas= '"Piezas": [ ';
	var numpiezas=parseInt(jQuery("#NumeroPiezas").val());
	for(i=0;i<numpiezas;i++)
	{
		var Pieza="{";
		var objPieza=".Piezas"+i;
	jQuery(objPieza).each(function () {
		Pieza+='"'+jQuery(this).attr('id') + '":"' + jQuery(this).val() + '",' ;
		//alert(Pieza);
		});	
		
		Pieza=Pieza.substring(0,Pieza.length-1)+"},";
		//console.log(i + ":" + Pieza);
		Piezas+=Pieza;
		
	}
	
	CotizarEnvio+=Piezas.substring(0,Piezas.length-1) +"]}";
	//console.log(CotizarEnvio);
	
	
		
	var parametros={'Header':Header,'CotizarEnvio':CotizarEnvio};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
	
}


function ejecutarcancelpickup(urlAjax){
	
	var Header={};
	jQuery(".Header").each(function () {
		Header[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var CancelPickUp={};
	
	jQuery(".CancelPickUp").each(function () {
		CancelPickUp[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var parametros={'Header':Header,'CancelPickUp':CancelPickUp};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
	
}

function ejecutarcreaterequestsporadic(urlAjax){
	
	var Header={};
	jQuery(".Header").each(function () {
		Header[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var CreateRequestSporadic={};
	var lstGuides=[];

		i=0;
	var arregloguias='';
	jQuery(".lstGuides").each(function () {
		
		arregloguias+='<arr:string>'+jQuery(this).val()+'</arr:string>';
		i++;
		});
	CreateRequestSporadic['lstGuides']=arregloguias;
	
	jQuery(".CreateRequestSporadic").each(function () {
		CreateRequestSporadic[jQuery(this).attr('id')] = jQuery(this).val()  ;
	});
	
	var parametros={'Header':Header,'CreateRequestSporadic':CreateRequestSporadic};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
	
}


function ejecutaConsultarGuia(urlAjax){
	
	var parametros={
		'NumeroGuia':jQuery('#txtNumeroGuia').val()
	};
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
}

function ejecutaEstadoGuia(urlAjax){
	
	var parametros={
		'ID_Cliente':jQuery('#txtID_Cliente').val(),
		'guia':jQuery('#txtguia ').val()
	};
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
}

function ejecutaEncriptar(idCampo,mensaje){
	

	var parametros={
							  'clave':jQuery('#txt'+idCampo).val(),
							  'opcion':'encriptar',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
							 
				
			
			
			
	
	
	//ejecutaProceso(parametros,'#spanEncriptado',urlAjax);
	jQuery.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   ajax_otrasacciones_var.url, 
                type:  'post', 
                beforeSend: function () {
                        jQuery('#'+mensaje).html("Procesando, espere por favor...");
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                       
                                jQuery('#'+idCampo).val(response);
								jQuery('#'+mensaje).html('Validación ejecutada');
                       
						
                },
				error: function (request, status, error) {
					jQuery('#'+mensaje).html(error);
				}
        });
}

function ejecutaDesencriptar(urlAjax){
	
	var parametros={
		'clave':jQuery('#txtCripto').val()
	};
	
	ejecutaProceso(parametros,'#spandesencriptado',urlAjax);
}

function ejecutarGeneracionSticker(urlAjax)
{
	
	var authHeader={};
	jQuery(".authHeader").each(function () {
		authHeader[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var GenerarGuiaSticker={};
	jQuery(".GenerarGuiaSticker").each(function () {
		GenerarGuiaSticker[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
	
	var parametros={'authHeader':authHeader,'GenerarGuiaSticker':GenerarGuiaSticker};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
}

function ejecutarAnularGuias(urlAjax)
{
	
	var authHeader={};
	jQuery(".authHeader").each(function () {
		authHeader[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var AnularGuias={};
	jQuery(".AnularGuias").each(function () {
		AnularGuias[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
	var ResultadoAnulacionGuias={'Num_Guia':0,'Descripcion':0};
	var interno={'ResultadoAnulacionGuias':ResultadoAnulacionGuias};
	AnularGuias['interno']=interno;
	
	
	
	var parametros={'authHeader':authHeader,'AnularGuias':AnularGuias};
	
        
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
}

function ejecutarCargueMasivo(urlAjax)
{
	var authHeader={};
	jQuery(".authHeader").each(function () {
		authHeader[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var CargueMasivoExterno={};

	var envios={};
	
	var CargueMasivoExternoDTO={};

	var objEnvios={};
		
	CargueMasivoExternoDTO['objEnvios']=objEnvios;
	envios['CargueMasivoExternoDTO']=CargueMasivoExternoDTO;
	CargueMasivoExterno['envios']=envios;
		
		
	var enviosExterno={};
	jQuery(".enviosExterno").each(function () {
		enviosExterno[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var objEnviosUnidadEmpaqueCargue={};
	
	var EnviosUnidadEmpaqueCargue={};
	
	/*jQuery(".objEnviosUnidadEmpaqueCargue").each(function () {
		EnviosUnidadEmpaqueCargue[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});*/
		objEnviosUnidadEmpaqueCargue['EnviosUnidadEmpaqueCargue']=EnviosUnidadEmpaqueCargue;
		
	enviosExterno['objEnviosUnidadEmpaqueCargue']=objEnviosUnidadEmpaqueCargue;
	
	objEnvios['EnviosExterno']=enviosExterno;
	CargueMasivoExternoDTO['objEnvios']=objEnvios;
	envios['CargueMasivoExternoDTO']=CargueMasivoExternoDTO;
	CargueMasivoExterno['envios']=envios;
	
	var IdPedidoEnvio=jQuery("#IdPedidoEnvio").val();
	//alert(jQuery("#IdPedidoEnvio").val())
	
	var parametros={'authHeader':authHeader,'IdPedidoEnvio':IdPedidoEnvio,'CargueMasivoExterno':CargueMasivoExterno,'TipoMercanciaPremier':jQuery("#tipoMercanciaPremier").val()};
		//JSON.stringify(array)}
	 //console.log(authHeader);
	 
	
	//alert(parametros["shop"]);
	
	ejecutaProceso(parametros,'#Respuesta',urlAjax);
		
}


function ejecutarCargueMasivoExtendido(enviosExterno,showModal,hideModal)
{
	var authHeader={};
	jQuery(".authHeader").each(function () {
		authHeader[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});
		
	var CargueMasivoExterno={};

	var envios={};
	
	var CargueMasivoExternoDTO={};

	var objEnvios={};
		
	CargueMasivoExternoDTO['objEnvios']=objEnvios;
	envios['CargueMasivoExternoDTO']=CargueMasivoExternoDTO;
	CargueMasivoExterno['envios']=envios;
		
		
	/*var enviosExterno={};
	jQuery(".enviosExterno").each(function () {
		enviosExterno[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});*/
		
	var objEnviosUnidadEmpaqueCargue={};
	
	var EnviosUnidadEmpaqueCargue={};
	
	/*jQuery(".objEnviosUnidadEmpaqueCargue").each(function () {
		EnviosUnidadEmpaqueCargue[jQuery(this).attr('id')] = jQuery(this).val()  ;
		});*/
		objEnviosUnidadEmpaqueCargue['EnviosUnidadEmpaqueCargue']=EnviosUnidadEmpaqueCargue;
		
	enviosExterno['objEnviosUnidadEmpaqueCargue']=objEnviosUnidadEmpaqueCargue;
	
	objEnvios['EnviosExterno']=enviosExterno;
	CargueMasivoExternoDTO['objEnvios']=objEnvios;
	envios['CargueMasivoExternoDTO']=CargueMasivoExternoDTO;
	CargueMasivoExterno['envios']=envios;
	
	var IdPedidoEnvio=jQuery("#IdPedidoEnvio").val();
	//alert(jQuery("#IdPedidoEnvio").val())
	
	var parametros={'authHeader':authHeader,
		  'IdPedidoEnvio':IdPedidoEnvio,
		  'CargueMasivoExterno':CargueMasivoExterno,
		  'TipoMercanciaPremier':jQuery("#tipoMercanciaPremier").val(),
		  'opcion':'carguedetallado',
		  'action': ajax_otrasacciones_var.action,
		  'nonce':ajax_otrasacciones_var.nonce};
		
	 
	 

			  
			  ajaxotrasacciones(parametros, '#Respuesta',null,showModal,hideModal);
	
	
	
		
}

function detalleenvio(idpedido,showModal=null,hideModal=null){ 
			 var parametros={
							  'IdPedidoEnvio':idpedido,
							  'opcion':'detalleenvio',
							  'action': ajax_otrasacciones_var.action,
							  'nonce':ajax_otrasacciones_var.nonce};
							 
				
			
			
			ajaxotrasacciones(parametros, '#contenedor',null,showModal,hideModal);
			
		}

function recargarDetalle(idpedido)
{
   	jQuery('#generarGuias').modal('hide');
 
	var parametros={
				  'IdPedidoEnvio':idpedido,
				  'opcion':'detalleenvio',
				  'action': ajax_otrasacciones_var.action,
				  'nonce':ajax_otrasacciones_var.nonce};
	
	jQuery.ajax({
                data:  parametros, 
                url:   ajax_otrasacciones_var.url, 
                type:  'post', 
                
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
						
                        
                         jQuery('#contenedor').html(response);
                       
						
						
                }
        });
	
	//detalleenvio(idpedido,null,null);
	
	
	
	
	
}