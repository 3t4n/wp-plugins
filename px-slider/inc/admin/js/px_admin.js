/*-- PX Slider Admin Jquery Script
----------------------------------------*/
jQuery(document).ready(function(){

/*-- Upload image jquery start 
--------------------------------------------*/
	var targetfield= '';
	var pxs_send_to_editor = window.send_to_editor;
	jQuery('.pxs_uploadbtn').click(function(){
		targetfield = jQuery(this).prev('.pxs_uploadimg');
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			jQuery(targetfield).val(imgurl);
			tb_remove();
			window.send_to_editor = pxs_send_to_editor;
		}
		return false;
	});	
/*-------------------------------------------*/
	jQuery('.pxs_admintbl .pxs_bglyrset').click(function(){
		jQuery('.pxs_admintbl .pxs_bglyrset').removeClass('active');
		jQuery(this).addClass('active');
	});
	
	jQuery('#pxslider_wrap .handlediv,.hndle').click(function(){
		jQuery(this).parent().find('.inside').slideToggle("slow");
	});
	
	if(jQuery("#pxs_custmImgs").is(':checked')){
		jQuery('.pxs_admintbl thead').hide();
	}

	if(!jQuery("#pxs_custmImgs").is(':checked')){
		jQuery('.pxs_admintbl .pxs_custmimgs').hide();
	}
	
	
	jQuery('#pxs_custmImgs').click(function(){
		if(jQuery(this).is(':checked')){
			jQuery('.pxs_admintbl thead').fadeOut('slow');
			jQuery('.pxs_admintbl .pxs_custmimgs').fadeIn('slow');
		}
		else{
			jQuery('.pxs_admintbl thead').fadeIn('slow');
			jQuery('.pxs_admintbl .pxs_custmimgs').fadeOut('slow');
		}
	});

});
function wp_jsvalid(){
	var a = document.getElementById('mce-EMAIL').value;
	if(a==""){
		alert('Please enter your E-mail ID.');
		return false;
	}
	return true;
}