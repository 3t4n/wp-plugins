jQuery.noConflict();
jQuery(document).ready(function(){
	
		jQuery('li.product .image_loader').each(function () {
				
			jQuery(this).closest('li.product').find('.img-wrap').append(this);
			
		});
		
		jQuery(".pcpcompare").click(function() {
			
			var pcp_product_id = jQuery(this).data("custom-value");
			
			jQuery('product_id').val(pcp_product_id);
			
		});
			
		
});


jQuery(document).on('click','.compare_shop_popup',compare_prod);
function compare_prod(){
	
	var product_idd = jQuery(this).data('value');
	
	var new_onj = jQuery(this);
	
	new_onj.addClass('loading');
	
	jQuery.ajax({
		
		type : "post",
		
		dataType : "json",
		
		url : CompareAjax.ajaxurl,
		
		data : {action: "pcp_data_retrive", prod_id:  product_idd},
		
		success: function(response) {
          
			new_onj.removeClass('loading');
			
			var count_row_data = jQuery('.compare_popup_data_row').length;
	
			for(var i=1; i<=count_row_data;i++){
				
				jQuery('.compare_popup_heading_row:nth-child('+i+')').height(0);
				
				jQuery('.compare_popup_data_row:nth-child('+i+')').height(0);
				
			}
			
			jQuery('.compare_lite_box_overlay').show();
			
			jQuery('.compare_item').html(response.first_div);
			
			new_onj.text('Added');
			
			new_onj.addClass( "added" );
			
			var count_table= jQuery('.compare_item').length ;
			
			var compare_div_width=count_table*260;
			
			var count_row_data1 = jQuery('.compare_popup_data_row').length;
			
			var count_intervel_time = 0;
			
			setInterval(function () {
					
					for(var i=1; i<=count_row_data1;i++){
					
						var data_row_height = jQuery('.compare_popup_data_row:nth-child('+i+')').height();
						//alert(data_row_height);
						
						var heading_row_height = jQuery('.compare_popup_heading_row:nth-child('+i+')').height();
						//alert(heading_row_height);
						if(data_row_height > heading_row_height){
						
							jQuery('.compare_popup_heading_row:nth-child('+i+')').height(data_row_height);
						
						}else{
							
							jQuery('.compare_popup_data_row:nth-child('+i+')').height(heading_row_height);
						
						}
						
					}
					
				
			}, 100); 
			
			
					
				
			
			

			jQuery('.tabel_data').width(compare_div_width);
         }
      });   

}
jQuery(document).on('click','.compare_product_popup',compare_prod1);
function compare_prod1(){
	
	var product_idd = jQuery(this).data('value');
	
	var new_onj = jQuery(this);
	
	new_onj.addClass('loading');
	
	jQuery.ajax({
    
		type : "post",
       
		dataType : "json",
        
		url : CompareAjax.ajaxurl,
        
		data : {action: "pcp_data_retrive", prod_id:  product_idd},
        
		success: function(response) {
			
			var count_row_data = jQuery('.compare_popup_data_row').length;
	
			for(var i=1; i<=count_row_data;i++){
				
				jQuery('.compare_popup_heading_row:nth-child('+i+')').height(0);
				
				jQuery('.compare_popup_data_row:nth-child('+i+')').height(0);
				
			}
		
			new_onj.removeClass('loading');
		
			jQuery('.compare_lite_box_overlay').show();
			
			jQuery('.compare_item').html(response.first_div);
		
			new_onj.text('Added');
	
			new_onj.addClass( "added" );
			
			var count_table= jQuery('.compare_item').length ;
			
			var compare_div_width=count_table*260;
			
			var count_row_data1 = jQuery('.compare_popup_data_row').length;
		
			setInterval(function () {
				
				for(var i=1; i<=count_row_data1;i++){
				
					var data_row_height = jQuery('.compare_popup_data_row:nth-child('+i+')').height();
					
					var heading_row_height = jQuery('.compare_popup_heading_row:nth-child('+i+')').height();
					
					if(data_row_height > heading_row_height){
						
						jQuery('.compare_popup_heading_row:nth-child('+i+')').height(data_row_height);
					
					}else{
						
						jQuery('.compare_popup_data_row:nth-child('+i+')').height(heading_row_height);
					}
				}
			}, 100);
			
			jQuery('.tabel_data').width(compare_div_width);
         }
      });
	 	  

	
}
jQuery(document).on('click','.remove_product_id',pcp_remove_product);
function pcp_remove_product(){
	
	var remove_product_id = jQuery(this).data('value');
	
	var new_onj = jQuery(this);
	
	new_onj.addClass('loading');
	
	jQuery.ajax({
    
		type : "post",
        dataType : "json",
        url : CompareAjax.ajaxurl,
        data : {action: "pcp_product_id_remove", remove_prod_id:  remove_product_id},
        success: function(response) {
		
			new_onj.removeClass('loading');
			
			var count_row_data = jQuery('.compare_popup_data_row').length;
	
			for(var i=1; i<=count_row_data;i++){
				
				jQuery('.compare_popup_heading_row:nth-child('+i+')').height(0);
				
				jQuery('.compare_popup_data_row:nth-child('+i+')').height(0);
				
			}
			
			jQuery('.compare_lite_box_overlay').show();
			
			var div_width = jQuery('.tabel_data').width();
			
			div_width = div_width-260;
			
			jQuery('.tabel_data').width(div_width);
			
			if(response != null){
			
				jQuery('.compare_item').html(response.first_div);
				
			}else{
				jQuery('.compare_lite_box_overlay').hide();
			}
			jQuery('.pcpcompare').each(function(){
				
				if(jQuery(this).attr('data-value') == remove_product_id){
					
					jQuery(this).text(compare_bt_txt);
					jQuery(this).removeClass('added');
				}
				
				
			});
		
			var count_row_data1 = jQuery('.compare_popup_data_row').length;
			
			setInterval(function () {
				
				for(var i=1; i<=count_row_data1;i++){
				
					var data_row_height = jQuery('.compare_popup_data_row:nth-child('+i+')').height();
					
					var heading_row_height = jQuery('.compare_popup_heading_row:nth-child('+i+')').height();
					
					if(data_row_height > heading_row_height){
					
						jQuery('.compare_popup_heading_row:nth-child('+i+')').height(data_row_height);
					
					}else{
						
						jQuery('.compare_popup_data_row:nth-child('+i+')').height(heading_row_height);
					}
				}
			}, 100); 
			
		}
	});   
}

jQuery(document).on('click','.compare_close_pcp',compare_popup_close);
function compare_popup_close(){
	
	jQuery('.compare_lite_box_overlay').hide();
}