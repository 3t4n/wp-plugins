jQuery(document).ready(function(){
	jQuery('#gdprsupSettingsTabs').wpTabs({
		uniqId: 'gdprsupSettingsTabs'
	});
	jQuery('.gdprsupSettingsSaveBtn').click(function(){
		jQuery('#gdprsupSettingsForm').submit();
		return false;
	});
	
	jQuery('#gdprsupSettingsForm').submit(function(){
		var addData = {};
		if(typeof(gdprsupRichEditNames) !== 'undefined') {
			for(var i = 0; i < gdprsupRichEditNames.length; i++) {
				var textId = 'opt_values'+ gdprsupRichEditNames[ i ]
				,	sendValKey = 'opt_values_txt_val'+ gdprsupRichEditNames[ i ];
				addData[ sendValKey ] = encodeURIComponent( gdprsupGetTxtEditorVal( textId ) );
			}
		}
		jQuery(this).sendFormGdprsup({
			btn: jQuery('.gdprsupSettingsSaveBtn')
		,	appendData: addData
		});
		return false;
	});
	gdprsupInitConnectedOpts('#gdprsupSettingsForm');
});