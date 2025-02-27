jQuery( document ).ready(function() {
				jQuery('body').on('change', '.changecat', function() {
					
					var selectedOption = jQuery(this);
					console.log(selectedOption.attr("iscal"));
			    	if(selectedOption.attr("iscal")=='yes'){
			    		jQuery(".showc_taxonomy_val").show();
			    		jQuery.ajax({
							    type: "post",
							    url: gmwplw_ajax_object.ajax_url,
							    data: {action:"gmwqp_change_tax",option:jQuery(this).val()},
							    success: function(response){
							        jQuery(".changetax_val").html(response);
							    }
							});
			    	}else{
			    		jQuery(".showc_taxonomy_val").hide();
			    	}
			    });
			    
			    /*jQuery('body').on('change', '.changecat', function() {
			    	jQuery.ajax({
							    type: "post",
							    url: gmwplw_ajax_object.ajax_url,
							    data: {action:"gmwqp_change_cat",option:jQuery(this).val(),formid:jQuery(this).attr("formid")},
							    success: function(response){
							        jQuery(".showonchangec").html(response);
							    }
							});
			    });
			    jQuery('body').on('change', '.gmwqp_leftoption', function() {
			    	var currentc = jQuery(this);
			    	jQuery.ajax({
							    type: "post",
							    url: gmwplw_ajax_object.ajax_url,
							    data: {action:"gmwqp_change_val",option:jQuery(this).val(),formid:jQuery(this).attr("formid")},
							    success: function(response){
							        currentc.closest(".showonchangec").find(".gmwqp_rightoption").html(response);
							    }
							});
			    });*/
			    
			});