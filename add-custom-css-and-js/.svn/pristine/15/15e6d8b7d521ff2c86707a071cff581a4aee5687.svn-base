<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
		 //get directory path in upload folder
		$upload_detail = wp_upload_dir();
		$upload_path = $upload_detail['basedir'];
		$upload_full_path = $upload_path.'/add-custom-css-and-js';
	 if(isset($_POST["js_adminpanel"]) && isset($_POST["js_frontend"]) && isset($_POST["js_login"]) && isset($_POST["css_admin"]) && $_POST["css_frontend"]&& $_POST["css_login"]){
		 //write JS file for admin
		 $js_for_admin = fopen($upload_full_path."\js_for_admin.js", "w") or die("Please Change Your File Permissions!");
		 $js_adminpanel = str_replace('\"', '"', $_POST["js_adminpanel"]);
		 $js_adminpanel = str_replace("\'", "'", $js_adminpanel);
		 //$js_adminpanel = sanitize_text_field($js_adminpanel);
		 $js_adminpanel = wp_check_invalid_utf8($js_adminpanel, true);
		 if ( '' == $js_adminpanel ) {
			 echo 'JS file for admin used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($js_for_admin, $js_adminpanel);
		 fclose($js_for_admin);
		 }
		 //write JS file for frontend
		 $js_for_front = fopen($upload_full_path."\js_for_front.js", "w") or die("Please Change Your File Permissions!");
		 $js_frontend = str_replace('\"', '"', $_POST["js_frontend"]);
		 $js_frontend = str_replace("\'", "'", $js_frontend);
		 //$js_frontend = sanitize_text_field($js_frontend);
		 $js_frontend = wp_check_invalid_utf8($js_frontend, true);
		 if ( '' == $js_frontend ) {
			 echo 'JS file for frontend used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($js_for_front, $js_frontend);
		 fclose($js_for_front);
		 }
		 //write JS file for login
		 $js_for_login = fopen($upload_full_path."\js_for_login.js", "w") or die("Please Change Your File Permissions!");
		 $js_login = str_replace('\"', '"', $_POST["js_login"]);
		 $js_login = str_replace("\'", "'", $js_login);
		 //$js_login = sanitize_text_field($js_login);
		 $js_login = wp_check_invalid_utf8($js_login, true);
		 if ( '' == $js_login ) {
			 echo 'JS file for login used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($js_for_login, $js_login);
		 fclose($js_for_login);
		 }
		 //write CSS file only for frontend
		 $cs_for_front = fopen($upload_full_path."\cs_for_front.css", "w") or die("Please Change Your File Permissions!");
		 $css_frontend = str_replace('\"', '"', $_POST["css_frontend"]);
		 $css_frontend = str_replace("\'", "'", $css_frontend);
		 $css_frontend = wp_strip_all_tags($css_frontend);
		 //$css_frontend = sanitize_text_field($css_frontend);
		 $css_frontend = wp_check_invalid_utf8($css_frontend, true);
		 if ( '' == $css_frontend ) {
			 echo 'CSS file for frontend used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($cs_for_front, $css_frontend);
		 fclose($cs_for_front);
		 }
		//write CSS file only for adminpanel
		 $cs_for_admin = fopen($upload_full_path."\cs_for_admin.css", "w") or die("Please Change Your File Permissions!");
		 $css_admin = str_replace('\"', '"', $_POST["css_admin"]);
		 $css_admin = str_replace("\'", "'", $css_admin);
		 $css_admin = wp_strip_all_tags($css_admin);
		 //$css_admin = sanitize_text_field($css_admin);
		 $css_admin = wp_check_invalid_utf8($css_admin, true);
		 if ( '' == $css_admin ) {
			 echo ' CSS file only for adminpanel used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($cs_for_admin, $css_admin);
		 fclose($cs_for_admin);
		 }
		//write CSS file only for loginuser
		 $cs_for_login = fopen($upload_full_path."\cs_for_login.css", "w") or die("Please Change Your File Permissions!");
		 $css_login = str_replace('\"', '"', $_POST["css_login"]);
		 $css_login = str_replace("\'", "'", $css_login);
		 $css_login = wp_strip_all_tags($css_login);
		 //$css_login = sanitize_text_field($css_login);
		 $css_login = wp_check_invalid_utf8($css_login, true);
		 if ( '' == $css_login ) {
			 echo 'CSS file for loginuser used an invalid charset, it must be UTF8';
		 } else {
		 fwrite($cs_for_login, $css_login);
		 fclose($cs_for_login);
		 }
}
?>
<div class="main-wraper-custom">
	<div class="top-row" style="margin-bottom:15px;">
		<h1>Add Custom CSS and JS</h1>
		<div class="error" id="error" style="display:none;"></div>
	</div>
<form action="?page=custom_js_css" name="update_all" method="post">
<h3>JS For Adminpanel</h3>
<textarea name="js_adminpanel" id="js_adminpanel" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\js_for_admin.js')) {
    		readfile($upload_full_path.'\js_for_admin.js');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<h3>JS For FrontEnd</h3>
<textarea name="js_frontend" id="js_frontend" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\js_for_front.js')) {
    		readfile($upload_full_path.'\js_for_front.js');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<h3>JS For Only When User Login</h3>
<textarea name="js_login" id="js_login" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\js_for_login.js')) {
    		readfile($upload_full_path.'\js_for_login.js');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<h3>CSS For Adminpanel</h3>
<textarea name="css_admin" id="css_admin" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\cs_for_admin.css')) {
    		readfile($upload_full_path.'\cs_for_admin.css');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<h3>CSS For FrontEnd</h3>
<textarea name="css_frontend" id="css_frontend" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\cs_for_front.css')) {
    		readfile($upload_full_path.'\cs_for_front.css');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<h3>CSS For Only When User Login</h3>
<textarea name="css_login" id="css_login" style="width:96%; min-height:150px;">
<?php
		if (file_exists($upload_full_path.'\cs_for_login.css')) {
    		readfile($upload_full_path.'\cs_for_login.css');
		} else {
			echo 'There is some error please check files permissions.';
		}
?>
</textarea>
<div class="update_box"><input type="submit" value="Update" name="update" id="update_app" style="    margin-top: 10px;border-radius:5px; color:#FFF; background:#06C; border:none;font-weight: bold; padding: 5px 20px; cursor:pointer;" /></div>
</form>
</div>
    
