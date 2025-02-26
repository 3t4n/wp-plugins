(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	
	jQuery('#ct_afsp_position').change(function(){
		
		var value = jQuery(this).attr("value");
			
		if(value=='top' || value=='bottom')
		{
			jQuery('#ct_afsp_height_unit').val("px");
			jQuery('#ct_afsp_height_unit').attr("disabled", true);
			jQuery('#ct_afsp_width_unit').attr("disabled", false);			
		}
		else
		{
			jQuery('#ct_afsp_width_unit').val("px");
			jQuery('#ct_afsp_width_unit').attr("disabled", true); 
			jQuery('#ct_afsp_height_unit').attr("disabled", false);		
			
		}	  
	});
	
	
	jQuery("body").on("click",".hide-tab",function(){
          $(this).parents(".panel-bg-border").remove();
      });
	
	jQuery( ".iconpicker" ).each(function() {
		var iconid = jQuery(this).attr( "id" );
		
		jQuery("#"+iconid).iconpicker("#"+iconid);
	});

	
	
	jQuery(".chosen").select2();
	
	
	 if( jQuery().wpColorPicker ) {
		$(function() {
			$(".color-picker-afsp").wpColorPicker({
                
                // you can declare a default color here,
            // or in the data-default-color attribute on the input
            //defaultColor: false,

            // a callback to fire whenever the color changes to a valid color
            change: function(event, ui){},
            // a callback to fire when the input is emptied or an invalid color
            clear: function() {},
            // hide the color picker controls on load
            hide: true,
            // set  total width
            width : 300,
            // show a group of common colors beneath the square
            // or, supply an array of colors to customize further
            palettes: ['','#000000','#ffffff','#dd3333','#dd9933','#dd9933','#81d742','#1e73be','#8224e3']
            });
		});
	}

	
	$( window ).load(function() {
		/*
		
		var value = jQuery('#ct_afsp_position').attr("value");
			
		if(value=='top' || value=='bottom')
		{			
			jQuery('#ct_afsp_height_unit').attr("disabled", true);
		}
		else
		{
			jQuery('#ct_afsp_width_unit').attr("disabled", true);
		}	  
		
		*/
	});
	
	jQuery('#ct_afsp_border_radius').change(function(){
		var value = jQuery(this).attr("value");
		if(value==1)
		{
			jQuery("#border_radious_area").fadeIn();
		}
        else
		{			
            jQuery("#border_radious_area").fadeOut();
		}
	});
	jQuery('#ct_afsp_tab_border_radius').change(function(){
		var value = jQuery(this).attr("value");
		if(value==1)
		{
			jQuery("#tab_border_radious_area").fadeIn();
		}
        else
		{			
            jQuery("#tab_border_radious_area").fadeOut();
		}
	});
	
	
	jQuery('.numbersonly').keyup(function () {     
	  this.value = this.value.replace(/[^0-9\.]/g,'');
	});

	
})( jQuery );