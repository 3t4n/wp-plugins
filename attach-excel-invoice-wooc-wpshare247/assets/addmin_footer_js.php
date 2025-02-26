<script>
	var aeiwooc_loading_url = '<?php echo WPSHARE247_AEIWOOC_PLUGIN_INC_ASSETS_URL;?>/loading.svg';
	jQuery(document).ready(function(e) {
		js_aeiwooc_download_excel_init();
    });
	
	function js_aeiwooc_create_loading(){
		return '<img width="30" id="aeiwooc_loading_temp" src = "'+aeiwooc_loading_url+'" />';
	}
	
	function js_aeiwooc_download_excel_init(){
		jQuery(".js_aeiwooc_download_excel").click(function(e) {
			var order_id = jQuery(this).data("id");
			if(order_id){
				jQuery(this).after(js_aeiwooc_create_loading());
				var download_a = jQuery(this);
				var wp_ajax_url = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
				jQuery.ajax({
					url: wp_ajax_url,
					type: 'POST',
					data:  {
								action: "js_aeiwooc_download_excel_init",
								order_id: order_id
							},
					dataType: 'json',
					success: function(data, textStatus, jqXHR){ 
						//console.log(data); //return false;
						if(data.res==1){
							var download_url = data.file_url; 
							var order_file_name = data.order_file_name;
							
							if(download_url && order_file_name){
								var link = document.createElement("a");
								link.href=download_url;
								link.setAttribute('download', order_file_name);
								document.body.appendChild(link);
								link.click();
								link.remove();
							}
						}
						jQuery("#aeiwooc_loading_temp").remove();
					},
					error: function(jqXHR, textStatus, errorThrown){
					
					}          
				});
			}
			return false;
        });
	}
</script>