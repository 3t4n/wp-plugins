jQuery(document).ready(function()
{
	jQuery("#kpftc_chat_enabled").click(function()
	{
		if( jQuery("#kpftc_chat_enabled").attr("value") == "yes" )
		{ jQuery("#kpftc_chat_enabled").attr("value","no"); }
		else
		{ jQuery("#kpftc_chat_enabled").attr("value","yes"); }
	});

	jQuery("#kpftc_admin_disabled").click(function()
	{
		if( jQuery("#kpftc_admin_disabled").attr("value") == "yes" )
		{ jQuery("#kpftc_admin_disabled").attr("value",'no'); }
		else
		{ jQuery("#kpftc_admin_disabled").attr("value","yes"); }
	});

	jQuery(".kpftc-activate").click(function()
	{		
		jQuery.ajax({
			type: "POST",
			url: kpftc_vars.kpftc_ajax_link,
			data: {
				action: "kpftc_delete_transients",
				kpnotice: "kpftc-activate"
			}
        });
    });
	
	jQuery(".kpftc-reminder").click(function()
	{		
		jQuery.ajax({
			type: "POST",
			url: kpftc_vars.kpftc_ajax_link,
			data: {
				action: "kpftc_delete_transients",
				kpnotice: "kpftc-reminder"
			}
        });
    });
   
});