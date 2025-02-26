( function ( $ ) {
		
	function checkVersion(){          
		var valordelcombo = $("#botonpymseoSeguridadUpdateJqueryVersion option:selected").val();
		var $lsVersionesJquery = [ '3.0.0', '3.1.0', '3.2.0', '3.3.0', '3.4.0', '3.4.1'];
		if (jQuery.inArray( valordelcombo, $lsVersionesJquery) !== -1) {
			$("#botonpymseoSeguridadUpdateJqueryVersionSlim").removeAttr("disabled"); 
		} else{
			$("#botonpymseoSeguridadUpdateJqueryVersionSlim").attr("disabled","disabled");
			$("#botonpymseoSeguridadUpdateJqueryVersionSlim").prop("checked", false);
		}
	}
	
	$( document ).ready( function () {
		checkVersion();
		$('.capa').hide();
		$('#capa-general').show();
		$('.nav-tab').click(function () {
			$('.nav-tab-wrapper').find(".nav-tab").removeClass("nav-tab-active")
			$(this).addClass("nav-tab-active");
			var lsID = $(this).attr('id');
			$('.capa').hide();
			$('#capa-'+lsID).show();
			return true;
		});
		// update version - Si no lo activamos el update version, no se puede cambiar
		if ($("#botonpymseoSeguridadUpdateJquery").is(":checked")){
			$("#botonpymseoSeguridadUpdateJqueryVersion").removeAttr("disabled", "disabled");
			$("#botonpymseoSeguridadUpdateJqueryVersionSlim").attr("disabled","disabled");
			$("#botonpymseoSeguridadUpdateJqueryVersionSlim").prop("checked", false);
		}
		$("#botonpymseoSeguridadUpdateJquery").click(function(){	
			if ($(this).is(':checked'))
			{
				$("#botonpymseoSeguridadUpdateJqueryVersion").removeAttr("disabled"); 
			}else{
				$("#botonpymseoSeguridadUpdateJqueryVersion").attr("disabled","disabled");
				$("#botonpymseoSeguridadUpdateJqueryVersion").prop("checked", false);
				$("#botonpymseoSeguridadUpdateJqueryVersionSlim").attr("disabled","disabled");
				$("#botonpymseoSeguridadUpdateJqueryVersionSlim").prop("checked", false);
			}
		});
		// Si la version no es superior a la 3 no activar el Slim
		/*
		$("#botonpymseoSeguridadUpdateJqueryVersion").change(function(){          
			var valordelcombo = $("#botonpymseoSeguridadUpdateJqueryVersion option:selected").val();
			var $lsVersionesJquery = [ '3.0.0', '3.1.0', '3.2.0', '3.3.0', '3.4.0', '3.4.1'];
			if (jQuery.inArray( valordelcombo, $lsVersionesJquery) !== -1) {
				$("#botonpymseoSeguridadUpdateJqueryVersionSlim").removeAttr("disabled"); 
			} else{
				$("#botonpymseoSeguridadUpdateJqueryVersionSlim").attr("disabled","disabled");
				$("#botonpymseoSeguridadUpdateJqueryVersionSlim").prop("checked", false);
			}
		});
		*/
		$("#botonpymseoSeguridadUpdateJqueryVersion").change(checkVersion());
		
		// Si desactivamos el RSS, no se puede activar el retraso de la publicacion
		if (!$('#botonpymseoUXDisableRSSFeeds').is(':checked')){
			$("#botonpymseoUXDDelayPostsFromAppearing").removeAttr("disabled"); 
		}
		$("#botonpymseoUXDisableRSSFeeds").click(function(){	
			if (!$(this).is(':checked'))
			{
				$("#botonpymseoUXDDelayPostsFromAppearing").removeAttr("disabled"); 
			}else{
				$("#botonpymseoUXDDelayPostsFromAppearing").attr("disabled","disabled");	
			}
		});
		// Si desactivamos el CDN, no se puede activar el host
		if ($('#botonpymseoCDNEnable').is(':checked')){
			$("#botonpymseoCDNHosts").removeAttr("disabled"); 
		}
		$("#botonpymseoCDNEnable").click(function(){	
			if ($(this).is(':checked'))
			{
				$("#botonpymseoCDNHosts").removeAttr("disabled");
				$("#botonpymseoCDNTypeFileCss").prop("checked", true);
				$("#botonpymseoCDNTypeFileJs").prop("checked", true);
				$("#botonpymseoCDNTypeFileImages").prop("checked", true);
				$("#botonpymseoCDNTypeFileVideo").prop("checked", true);
			}else{
				$("#botonpymseoCDNHosts").attr("disabled","disabled");
				$("#botonpymseoCDNTypeFileCss").prop("checked", false);
				$("#botonpymseoCDNTypeFileJs").prop("checked", false);
				$("#botonpymseoCDNTypeFileImages").prop("checked", false);
				$("#botonpymseoCDNTypeFileVideo").prop("checked", false)
			}
		});	
		// Minify HTML - Si no lo activamos el minify javascript y eliminar comentarios no esta activo
		if ($('#botonpymseoWPOMinifyHTML').is(':checked')){
				$("#botonpymseoWPOMinifyInlineJavaScript").removeAttr("disabled"); 
				$("#botonpymseoWPORemoveCommentsHTML").removeAttr("disabled"); 
			}
		$("#botonpymseoWPOMinifyHTML").click(function(){	
			if ($(this).is(':checked')){
				$("#botonpymseoWPOMinifyInlineJavaScript").removeAttr("disabled"); 
				$("#botonpymseoWPORemoveCommentsHTML").removeAttr("disabled"); 
			}else{
				$("#botonpymseoWPOMinifyInlineJavaScript").attr("disabled","disabled");
				$("#botonpymseoWPOMinifyInlineJavaScript").prop("checked", false);
				$("#botonpymseoWPORemoveCommentsHTML").attr("disabled","disabled");
				$("#botonpymseoWPORemoveCommentsHTML").prop("checked", false);
			}
		});
		
	} );
} )( jQuery );


