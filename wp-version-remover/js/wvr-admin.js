/* Custom Share Buttons With Floting Sidebar admin js*/
jQuery(document).ready(function(){
	    jQuery(".wvr-tab").hide();
		jQuery("#div-wvr-general").show();
	    jQuery(".wvr-tab-links").click(function(){
		var divid=jQuery(this).attr("id");
		jQuery(".wvr-tab-links").removeClass("active");
		jQuery(".wvr-tab").hide();
		jQuery("#"+divid).addClass("active");
		jQuery("#div-"+divid).fadeIn();
		});
})( jQuery );
