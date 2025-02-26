	jQuery(document).ready(function(e){		
			jQuery("#upload_excel").on('submit', function(e)
			{
				e.preventDefault();
				
				
				var fileInputElement = document.getElementById("file");
				
				if(fileInputElement.files.length==0){
					jQuery('#rtaUpload').html('Selecciona un archivo');
					return false;
				}
				var fileName = fileInputElement.files[0].name;
				
				
				if(fileName.trim()=="")
				{
					
					jQuery('#rtaUpload').html('Selecciona un archivo');
					return false;
				}
				else
				{
					var formData=new FormData(this);
					formData.append('action',ajax_carguearchivomasivoservientrega_var.action);
					//var parametros={ 'form_data':formData,'action': ajax_carguearchivomasivoservientrega_var.action,'nonce':ajax_carguearchivomasivoservientrega_var.nonce,'opcion':'cargararchivo'};
					var ajax_url = ajax_carguearchivomasivoservientrega_var.url;
					var contenedorResultado='#rtaUpload';
					jQuery.ajax({
							url:ajax_url,
							type:"POST",
							processData: false,
							contentType: false,
							data:  formData,
							success : function( response ){
								
								//jQuery(contenedorResultado).html(response);
								var returnedData = JSON.parse(response);
								
								if(returnedData.code == 200){
									
									jQuery(contenedorResultado).html('El archivo se cargo de manera exitosa.');
								}else{
									jQuery(contenedorResultado).html(returnedData.msg);
								}
							},
							error: function (request, status, error) {
								jQuery(contenedorResultado).html(error);
								
							}
					});
					
					
					
					return false;
				}
				return false;
			});
			
	});		
		