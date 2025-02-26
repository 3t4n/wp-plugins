jQuery(document).ready(function(e){
	jQuery("#idForm").on('submit', function(){
		var searchIDs = jQuery("#idForm input:checkbox:checked").map(function(){			
			var value = jQuery(this).val();
			var name = jQuery(this).attr('name');
			var rel = jQuery(this).attr('rel');
			var stuff = {'name':name,'value':value,'rel':rel,};
			return stuff;
		}).get();
		var tmp = searchIDs;
			var myJSONText = JSON.stringify(searchIDs);
			var obj = JSON.parse(myJSONText);
			document.getElementById("demo").innerHTML = obj.name + ", " + obj.value + ", " + obj.rel;
		jQuery.ajax({
			type: 'POST',
			url: MyAjax.ajaxurl,
			data: {
				'action':'awe_orderdetails',
				'search_val' : myJSONText
			},
			success:function(response) {
				// This outputs the result of the ajax request
				console.log(response);
				//window.location.reload(true);
				jQuery('#message123').append('<div class="alert alert-dismissible" role="alert">Successfully Download</div>');
				jQuery('#message123').show();
			
			/*var zz=document.createElement('a');
					var data_type = 'data:application/vnd.ms-excel';
					zz.href = JavaScript:Void(0);
					zz.download='order'+'.xlsx';
					zz.click();*/
			var zz=document.createElement('a');
			var data_type = 'data:application/vnd.ms-excel';
			//zz.href = order_file;
			zz.download='order'+'.xlsx';
			zz.click();
			//$('#your-GF-ID').val( response ); // This is where you update your GF field 
		  },
		  error: function(errorThrown){
			console.log(errorThrown);
		  }
		});	
    });
    // Radio Button Wise Hide and Show
    jQuery('input[name="datatype"]').on('change', function(){
		if (jQuery(this).val()=='Order') {
			//change to "show Order"
			jQuery("#order_form").css("display", "block");
			jQuery("#product_form").css("display", "none");
			jQuery("#customer_form").css("display", "none");
		} else if(jQuery(this).val()=='Product') { 
			//change to "show Product"
			jQuery("#product_form").css("display", "block");
			jQuery("#order_form").css("display", "none");
			jQuery("#customer_form").css("display", "none");
		} else  {
			jQuery("#customer_form").css("display", "block");
			jQuery("#order_form").css("display", "none");
			jQuery("#product_form").css("display", "none");
		}
	});
	
	// Export Select all and select none
	jQuery("#export-select-all").click(function(){
		jQuery('.all-fields:visible input').prop('checked', true);
	});
	jQuery("#export-select-none").click(function(){
		jQuery('.all-fields:visible input').prop('checked', false);
	});
});
