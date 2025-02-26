<?php
/**
 * This file is used to display setting page
 *
 * @package admin
 * @subpackage pages
 */ 
 
global $advance_login_style_admin_pages;

$options = get_option( 'advance_login_style' );

echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#LoginF_orm_Background_Clore").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#Login_Background_Clore").wpColorPicker();
        });             
        </script>';
		
		
       echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#link_text_color").wpColorPicker();
        });             
        </script>';

echo $advance_login_style_admin_pages->admin_header( __( 'General Settings', 'advance-login-style' ), true, 'cb_advance_login_style_options', 'advance_login_style' );

echo $advance_login_style_admin_pages->textinput('After_Login_Redirect_Link', 'Login Redirect Link');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('After_Logout_Redirect_Link', 'Log Out Redirect Link');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('After_Register_Redirect_Link', 'Register Redirect Link');
echo "<br/>";


echo "</br>";

echo '<script type="text/ecmascript">
jQuery(document).ready(function($){
	$("#buttonid").click(function() {
		tb_show("Upload a logo","media-upload.php?referer=plugin-bazaar-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0", false);
		return false;
	});
	window.send_to_editor = function(html) {
		var image_url = $("img",html).attr("src");
		//alert(html);
		$("#Login_Background_Image").val(image_url);
		tb_remove();
		$("#upload_logo_preview img").attr("src",image_url);		
		$("#Login_Background_Image").trigger("click");		
	}			
});

</script>';

echo  $advance_login_style_admin_pages->selectimage('Login_Background_Image','Select Background ', '', 'buttonid', 'upload_logo_preview'); 
echo "<br/>";
echo $advance_login_style_admin_pages->inputnumber('bgheight', 'Background  Height' ,'', 'px');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('bgwidth', 'Background  Width', '', 'px');
echo "<br/>";



echo $advance_login_style_admin_pages->textinput('Login_Background_Clore','Background Color');
echo "<br/>";


echo $advance_login_style_admin_pages->select('background_repeat', 'Repeat Background',array('no-repeat'=>'no-repeat','repeat'=>'repeat','x-repeat'=>'x-repeat','y-repeat'=>'y-repeat'));
echo "<br/>";

echo $advance_login_style_admin_pages->select('position', 'Background Position',array('left top'=>'left top', 'left center'=>'left center','right center'=>'right center','right top'=>'right top','center botton'=>'center botton','center center'=>'center center'));
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('link_text_color','Link Text Color');
$advance_login_style_admin_pages->admin_footer();
