jQuery(function(jQuery) {  
	/*Initial load*/	
	if(jQuery('#show_pages').attr('value') == '' || jQuery('#show_pages').attr('value') === undefined)
	{	
		jQuery.get(prettylinksScriptParams.pluginUrl + '/styles/prettylinks.css', updateImageUrls);
	}
	else
	{
		//If it contains a hash it's an alt style
		if((jQuery('#show_pages').attr('value')).indexOf('#') > 0){
			jQuery.get(prettylinksScriptParams.altPluginUrl + jQuery('#show_pages').attr('value'), updateImageUrls);
		}
		else{
			jQuery.get(prettylinksScriptParams.pluginUrl + '/styles/' + jQuery('#show_pages').attr('value'), updateImageUrls);
		}
	}
	
	/*After selecting a stylesheet*/
	jQuery('#show_pages').change(function(){
			//If it contains a hash it's an alt style
		if((jQuery('#show_pages').attr('value')).indexOf('#') > 0){
			jQuery.get(prettylinksScriptParams.altPluginUrl + jQuery('#show_pages').attr('value'), updateImageUrls);
		}
		else{
			jQuery.get(prettylinksScriptParams.pluginUrl + '/styles/' + jQuery('#show_pages').attr('value'), updateImageUrls);
		}
	
		//Load styles
		//jQuery.get(prettylinksScriptParams.pluginUrl + '/styles/' + jQuery(this).attr('value'), updateImageUrls);
	});
	
	//Make image paths work in the previewer
	function updateImageUrls(data) {		
		//If it contains a hash it's an alt style
		if((jQuery('#show_pages').attr('value')).indexOf('#') > 0){
			//Make image paths work with a greedy regex
			newData = data.replace( new RegExp( '\\(images', 'g' ),'(' +  prettylinksScriptParams.altPluginUrl + 'images' );
		}
		else{
			//Make image paths work with a greedy regex
			newData = data.replace( new RegExp( '\\(../images/', 'g' ),'(' +   prettylinksScriptParams.pluginUrl + 'images/' );
		}
		
		//Empty and refill styles section
		jQuery('#Previewer').empty().append(newData);
	}
});  