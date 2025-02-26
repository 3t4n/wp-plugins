<?php
/**
 * This file is used to display setting page
 *
 * @package admin
 * @subpackage pages
 */
 
global $advance_login_style_admin_pages;

$options = get_option( 'advance_login_style_form' );

echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#Login_form1_Background_Clore").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#Login_form1_Background_border_Clore").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#Login_form1_Background_lebel_Clore").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#Login_form1_Box_shadow_Clore").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#button_color").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#button_text_color").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#button_border_color").wpColorPicker();
        });             
        </script>';
		
		echo '<script type="text/javascript">
        jQuery(document).ready(function($) {   
        $("#onhover_button_color").wpColorPicker();
        });             
        </script>';
	
echo $advance_login_style_admin_pages->admin_header( __( 'General Settings', 'advance-login-style' ), true, 'cb_advance_login_style_form_options', 'advance_login_style_form' );
echo "</br>";

echo '<script type="text/ecmascript">
jQuery(document).ready(function($){
	$("#buttonid1").click(function() {
		tb_show("Upload a logo","media-upload.php?referer=plugin-bazaar-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0", false);
		return false;
	});
	window.send_to_editor = function(html) {
		var image_url = $("img",html).attr("src");
		//alert(html);
		$("#Login_form_Background_Image").val(image_url);
		tb_remove();
		$("#upload_logo_preview img").attr("src",image_url);		
		$("#Login_form_Background_Image").trigger("click");		
	}			
});
</script>';

echo  $advance_login_style_admin_pages->selectimage('Login_form_Background_Image','Slect Background Image', '', 'buttonid1', 'upload_logo_preview'); 
echo "<br/>";

echo $advance_login_style_admin_pages->select('form_background_repeat', 'Repeat Background',array('repeat'=>'repeat','no-repeat'=>'no-repeat','x-repeat'=>'x-repeat','y-repeat'=>'y-repeat'));
echo "<br/>";

echo $advance_login_style_admin_pages->select('form_position', 'Background Position',array('left'=>'left','right'=>'right','top'=>'top','center'=>'center'));
echo "<br/>";


echo $advance_login_style_admin_pages->textinput('Login_form1_Background_Clore','Background Color');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('Login_form1_Background_border_Clore','Border Color');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('form_border_size','Border Size');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('form_border_radius','Border Radius');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('Login_form1_Background_lebel_Clore','Leble Color');
echo "<br/>";

echo $advance_login_style_admin_pages->inputnumber('form_lebal_font_size','Leble Font Size'  ,'', 'px');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('form_shadow','Box Shadow');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('Login_form1_Box_shadow_Clore','Box Shadow Color');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('button_color','Button Color');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('button_text_color','Button Text Color');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('button_border_color',' Button Border Color');
echo "<br/>";

echo $advance_login_style_admin_pages->textinput('onhover_button_color',' Onhover Button Color');

$advance_login_style_admin_pages->admin_footer();
