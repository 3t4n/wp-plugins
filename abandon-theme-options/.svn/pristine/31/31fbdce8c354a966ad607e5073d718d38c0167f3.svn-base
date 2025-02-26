jQuery(document).ready(function() {
	jQuery('#ab_favicon_button').click(function(){
		window.curfield = '#ab_favicon';
		formfield = jQuery('#ab_favicon').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	jQuery('#ab_logo_button').click(function(){
		window.curfield = '#ab_logo';
		formfield = jQuery('#ab_logo').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});
	jQuery('#ab_apple_icon_button').click(function(){
		window.curfield = '#apple_icon';
		formfield = jQuery('#apple_icon').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});		
	window.send_to_editor = function(html){
		imgurl = jQuery('img',html).attr('src');
		jQuery(window.curfield).val(imgurl);
		tb_remove();
	}
});