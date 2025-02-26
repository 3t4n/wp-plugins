//Setup the color pickers to work with our text input field
jQuery(document).ready(function(){
  "use strict";
  
  //This if statement checks if the color picker widget exists within jQuery UI
  //If it does exist then we initialize the WordPress color picker on our text input field
  if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ){
    jQuery( '#status_colour' ).wpColorPicker({
      change: function(b, c) {
      	jQuery('.sip-icon-color-style-0').css({
      		'background-color': c.color.toString(),
      		'border-color'    : c.color.toString()
      	});
      	jQuery('.sip-icon-color-style-1').css({
      		'color'         : c.color.toString(),
      		'border-color'  : c.color.toString()
      	});
      }
    });
  } else {
    //We use farbtastic if the WordPress color picker widget doesn't exist
    jQuery( '#status-colour-colorpicker' ).farbtastic( '#status_colour' );
  }
});