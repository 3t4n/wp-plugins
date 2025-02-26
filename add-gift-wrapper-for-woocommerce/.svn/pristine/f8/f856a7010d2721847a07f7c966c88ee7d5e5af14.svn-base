//jquery tab
jQuery(document).ready(function(){

    jQuery('ul.tabs li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('ul.tabs li').removeClass('current');
        jQuery('.tab-content').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#"+tab_id).addClass('current');
    })

	jQuery('#wg_select_product').select2({
  	    ajax: {
			url: ajaxurl,
			dataType: 'json',
			allowClear: true,
			data: function (params) {
				return {
    				q: params.term,
    				action: 'gw_product_ajax'
  				};
  			},
			processResults: function( data ) {
					var options = [];
					if ( data ) {
	 					jQuery.each( data, function( index, text ) { 
							options.push( { id: text[0], text: text[1], 'price': text[2]} );
						});
	 				}
					return {
						results: options
					};
			},
			cache: true
		},
		minimumInputLength: 3
	});


	jQuery('#gw_select_gift_wrapper').select2({
  	    ajax: {
			url: ajaxurl,
			dataType: 'json',
			allowClear: true,
			data: function (params) {
				
  				return {
    				q: params.term,
    				action: 'gw_cat_ajax'
  				};

			},
			processResults: function( data ) {
				var options = [];
				if ( data ) {
 					jQuery.each( data, function( index, text ) { 
						options.push( { id: text[0], text: text[1], 'price': text[2]} );
					});
 				}
				return {
					results: options
				};
			},
			cache: true
		},
		minimumInputLength: 0
	});



    jQuery('.gw_gift_rule').change(function() {
        var option = jQuery(this).find('option:selected');
        var val = option.val();
        if(val == "") {
            jQuery('.gw_custom_rule').fadeOut(300);
            jQuery('.gw_price_rule').fadeOut(300);
            jQuery('.gw_category_rule').fadeOut(300);
        }
        if(val == "productbase") {
            jQuery('.gw_custom_rule').fadeIn(300);
           
            jQuery('.gw_category_rule').fadeOut(300);
        }
       
        if(val == "category") {
            jQuery('.gw_category_rule').fadeIn(300);
            jQuery('.gw_price_rule').fadeOut(300); 
            jQuery('.gw_custom_rule').fadeOut(300);
        }  
    });


    var gift_con = jQuery('.gw_gift_rule').find(":selected").val();

    if(gift_con == "") {
       
        jQuery('.gw_custom_rule').hide();
     
        jQuery('.gw_category_rule').hide();
    
    }
    if(gift_con == "productbase") {
        
        jQuery('.gw_custom_rule').show();
     
        jQuery('.gw_category_rule').hide();
    
    }
    if(gift_con == "category") {

        jQuery('.gw_category_rule').show();
        
        jQuery('.gw_custom_rule').hide();

    }

});


function gw_select_id(id) {
	var copyText = id;
	jQuery("#"+copyText).select();
	document.execCommand("copy");
}