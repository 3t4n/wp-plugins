function wpsAdminGlobalSearchSubmitFrm(url)
{
	jQuery(".wpsAdminGlobalSearchResultLoad").show();
	jQuery('.wpsAdminGlobalSearch .wpsAdminGlobalSearchResults').html();
	var keyword = jQuery('.wpsAdminGlobalSearch #wpsAdminGlobalSearchKeyword').val();
	if(keyword)
	{
		var data = { "keyword" : keyword , "action" : "wps_admin_global_search_ajax" };
		jQuery.post(url, data, function(response) {
		
			jQuery(".wpsAdminGlobalSearchResultLoad").hide();
			jQuery('.wpsAdminGlobalSearch .wpsAdminGlobalSearchResults').html(response);
	
		});
	}
	else
	{
		jQuery(".wpsAdminGlobalSearchResultLoad").hide();
		jQuery('.wpsAdminGlobalSearch .wpsAdminGlobalSearchResults').html('');
	}	
	return false;
}

function wpsAdminGlobalSearchIcon()
{
	jQuery(".wpsAdminGlobalSearch").toggleClass('wpsAdminGlobalSearchOpen',1000);
	jQuery(".wpsAdminGlobalSearchIcon").toggleClass('wpsAdminGlobalSearchIconOpen',1000);
}