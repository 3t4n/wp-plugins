jQuery(document).ready(function(){

	jQuery('.customeclhide').on('click',function(){
		jQuery('#aqss-l3-slide-to-show').parent().parent().hide();
		jQuery('#aqss-l3-slide-to-scroll').parent().parent().hide();
    });
    jQuery('.customeclshow').on('click',function(){
    	jQuery('#aqss-l3-slide-to-show').parent().parent().show();
		jQuery('#aqss-l3-slide-to-scroll').parent().parent().show();
    });

    //Title color
    jQuery(".colortc").on('change',function(){
    	var color1 = jQuery(".colortc").val();
       jQuery(".colortc").val(color1);
    });

     //Title background
    jQuery(".colortb").on('change',function(){
        var color1 = jQuery(".colortb").val();
       jQuery(".colortb").val(color1);
    });

     //Description color
    jQuery(".colordc").on('change',function(){
        var color1 = jQuery(".colordc").val();
       jQuery(".colordc").val(color1);
    });

     //Description background
    jQuery(".colordb").on('change',function(){
        var color1 = jQuery(".colordb").val();
       jQuery(".colordb").val(color1);
    });
});