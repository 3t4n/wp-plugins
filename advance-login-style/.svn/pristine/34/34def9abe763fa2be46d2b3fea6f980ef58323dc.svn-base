<?php
/**
 * This file is used to display setting page
 *
 * @package admin
 * @subpackage pages
 */
 
global $advance_login_style_admin_pages;

$options = get_option( 'advance_login_style_logo' );

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
        $("#text_font_color").wpColorPicker();
        });             
        </script>';
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#text_font_shadow_color").wpColorPicker();
        });             
        </script>';

echo $advance_login_style_admin_pages->admin_header( __( 'General Settings', 'advance-login-style' ), true, 'cb_advance_login_style_logo_options', 'advance_login_style_logo' );

echo '<script type="text/ecmascript">
jQuery(document).ready(function($){
	$("#buttonid").click(function() {
		tb_show("Upload a logo","media-upload.php?referer=plugin-bazaar-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0", false);
		return false;
	});
	window.send_to_editor = function(html) {
		var image_url = $("img",html).attr("src");
		//alert(html);
		$("#Login_logo_Image").val(image_url);
		tb_remove();
		$("#upload_logo_preview img").attr("src",image_url);		
		$("#Login_logo_Image").trigger("click");		
	}			
});

</script>';
echo  $advance_login_style_admin_pages->selectimage('Login_logo_Image','Select Logo', '', 'buttonid', 'upload_logo_preview'); 
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('background_size', 'Background size'  ,'', 'px');
echo "<br/>";
echo $advance_login_style_admin_pages->inputnumber('logo_height', 'Height'  ,'', 'px');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('logo_width', 'Width'  ,'', 'px');
echo "<br/>";

echo $advance_login_style_admin_pages->select('logo_logo__repeat', 'Repeat Background',array('no-repeat'=>'no-repeat','repeat'=>'repeat','x-repeat'=>'x-repeat','y-repeat'=>'y-repeat'));
echo "<hr>";

echo "<h2 style=''>Text Message</h2>";

echo $advance_login_style_admin_pages->textinput('text_message', 'Enter Yout Message');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('text_font_color','Message Color');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('text_font_size', 'Message Font Size'  ,'', 'px');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('text_shadow_size', 'Shadaw Type'  ,'', 'px');
echo "<br/>";
echo $advance_login_style_admin_pages->textinput('text_font_shadow_color','Shadaw Color');
 
 echo "<hr>";
echo "<h2 style=''>Change link of logo and tooltip when you rollover on logo</h2>";

echo $advance_login_style_admin_pages->textinput('linkoflogo','Link of Logo');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('tooltiplogo','Tooltip on Logo');

$advance_login_style_admin_pages->admin_footer();
