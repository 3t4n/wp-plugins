jQuery(document).ready(function () {

	jQuery('#dialog_hanaflv input[name=video]').attr('id', 'hana_video_url');
	jQuery('#dialog_hanaflv input').attr('size', '25');
	jQuery('#dialog_hanaflv input[name=clicktarget]').attr('size', '10');
	jQuery('#dialog_hanaflv #hana_video_url').parent().append("<input type='button' class='button' value='Upload' onClick='uploadFlv();' />");
	jQuery('#dialog_hanaflv input[name=splashimage]').attr('id', 'hana_splash_image_url');
	jQuery('#dialog_hanaflv #hana_splash_image_url').parent().append("<input type='button' class='button' value='Upload' onClick='uploadImage();' />");

});

//---POP UP

function uploadFlv() {
	jQuery('.jqmWindow').css('z-index', '0');
	jQuery('.jqmOverlay').css('display', 'none');
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	
	window.send_to_editor = function(html) {
		html_array = html.split("<a href='");
		html_1 = html_array[1];
		html_2 = html_1.split("'>");
		html_3 = html_2[0];
		imgurl = jQuery('.urlfield').val();
		document.getElementById('hana_video_url').value = html_3;
		tb_remove();
		jQuery('.jqmWindow').css('z-index', '3000');
	} 

	return false;
};

function uploadImage() {
	jQuery('.jqmWindow').css('z-index', '0');
	jQuery('.jqmOverlay').css('display', 'none');
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		document.getElementById('hana_splash_image_url').value = imgurl;
		tb_remove();
		jQuery('.jqmWindow').css('z-index', '3000');
	} 
	
	return false;
};

//---SIDEBAR

function uploadFlv_sidebar() {
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	
	window.send_to_editor = function(html) {
		html_array = html.split("<a href='");
		html_1 = html_array[1];
		html_2 = html_1.split("'>");
		html_3 = html_2[0];
		imgurl = jQuery('.urlfield').val();
		document.getElementById('hana_video_url_sidebar').value = html_3;
		tb_remove();
	} 

	return false;
};

function uploadImage_sidebar() {
	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		document.getElementById('hana_splash_image_url_sidebar').value = imgurl;
		tb_remove();
	} 
	
	return false;
};

//---Save a post meta

function save_as_post_meta(){
	var f=document.hanaflvoptions;
	if (f== null) return;

	text='[hana-flv-player video="'+jQuery('#hana_flv_extension_meta_box input[name=video]').val()+'"\n';

	if (jQuery('#hana_flv_extension_meta_box input[name=width]').val() !='' )
		text +='    width="'+jQuery('#hana_flv_extension_meta_box input[name=width]').val()+'" \n';
	if (jQuery('#hana_flv_extension_meta_box input[name=height]').val() !='' )
		text +='    height="'+jQuery('#hana_flv_extension_meta_box input[name=height]').val()+'" \n';

	text +='    description="'+jQuery('#hana_flv_extension_meta_box input[name=description]').val()+'" \n';
	text +='    player="'+jQuery('#hana_flv_extension_meta_box select[name=player]').val()+'" \n';
	text +='    autoload="'+jQuery('#hana_flv_extension_meta_box select[name=autoload]').val()+'" autoplay="'+jQuery('#hana_flv_extension_meta_box select[name=autoplay]').val()+'" \n';
	text +='    loop="'+jQuery('#hana_flv_extension_meta_box select[name=loop]').val()+'" autorewind="'+jQuery('#hana_flv_extension_meta_box select[name=autorewind]').val()+'" \n';
	if (jQuery('#hana_flv_extension_meta_box input[name=clickurl]').val() !='' )
		text +='    clickurl="'+jQuery('#hana_flv_extension_meta_box input[name=clickurl]').val() +'" \n';
	if (jQuery('#hana_flv_extension_meta_box input[name=clicktarget]').val() !='' )
		text +='    clicktarget="'+jQuery('#hana_flv_extension_meta_box input[name=clicktarget]').val() +'" \n';

	if (jQuery('#hana_flv_extension_meta_box input[name=splashimage]').val() !='')		
		text +='    splashimage="'+jQuery('#hana_flv_extension_meta_box input[name=splashimage]').val()+'" \n';
		
	text += ' /]';
	
	if (text.length > 0){
		jQuery('#save_hana_as_post_meta').val(text);
		 
	}	
	 
	
	jQuery('#dialog_hanaflv').jqmHide();
}