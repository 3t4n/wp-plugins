<?php
/*
Plugin Name: Admin Font Editor
Plugin URI: http://www.geniusstartup.com/
Description: Lets users set their own font size and style for the HTML text editor on Edit Posts / Pages, (including the Fullscreen / Distraction Free Editor) and the reply field of Comments in admin.
Author: Genius Startup
Version: 1.8
Tags: admin, admin font, html editor, visual editor, fonts, usability, comments
Author URI: http://www.geniusstartup.com/

Copyright (C) 2012  GeniusStartup.com

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


function my_admin_head() {
  global $current_user;
    get_currentuserinfo();

	$afe_font_size = get_user_meta($current_user->ID, 'afe-font-size', true); 
	$afe_font_family = get_user_meta($current_user->ID, 'afe-font-family', true); 
	
	if ($afe_font_family || $afe_font_size) { ?>
	  
	<style>
	 
	textarea#content.wp-editor-area { 
	
	<?php
	if ($afe_font_family) { ?>	
	font-family: <?php echo $afe_font_family; ?>;
	<?php } 
	if ($afe_font_size) { ?>	
	font-size: <?php echo $afe_font_size; ?>px;
	<?php } ?>
	}
		
	textarea#wp_mce_fullscreen { 
	
	<?php
	if ($afe_font_family) { ?>	
	font-family: <?php echo $afe_font_family; ?>;
	<?php } 
	if ($afe_font_size) { ?>	
	font-size: <?php echo $afe_font_size; ?>px;
	<?php } ?>
	}
		
	textarea#replycontent { 
	
	<?php
	if ($afe_font_family) { ?>	
	font-family: <?php echo $afe_font_family; ?>;
	<?php } 
	if ($afe_font_size) { ?>	
	font-size: <?php echo $afe_font_size; ?>px;
	<?php } ?>
	}		
		
	body#tinymce.wp-editor { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 33px;
}
		
	</style>
	
	
	

	
	
	
	<?php }
}

add_action('admin_head', 'my_admin_head');


function afe_settings_page() { 
global $user_id;
global $current_user;
get_currentuserinfo();
$current_user->ID; ?>

<div class="wrap">
  
  <div class="postbox-container" style="width:70%;">
          
	  
<div id="icon-options-general" class="icon32"><br></div>
<?php echo '<h2>' . __('Admin Font Editor', 'afe') . '</h2>'; ?>

<?php
			if( $_POST['afe-font-family'] || $_POST['afe-font-size'] )  {
			  
			      if (!$_POST['afe-font-family-user']) {
	      
			      update_user_meta( $current_user->ID, 'afe-font-family', (string)$_POST['afe-font-family'] );
			      
			      } else {
				
			      update_user_meta( $current_user->ID, 'afe-font-family', (string)trim($_POST['afe-font-family-user']) );
			      update_user_meta( $current_user->ID, 'afe-font-family-user', (string)trim($_POST['afe-font-family-user']) );	
				
			      }
			
			update_user_meta( $current_user->ID, 'afe-font-size', $_POST['afe-font-size'] ); ?>
						
			<div id="setting-error-settings_updated" class="updated settings-error"> 
			<p><strong><?php _e('Settings saved.', 'afe'); ?></strong></p></div>
			
			<?php 
			} ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">

   <table class="form-table">
        
	 <tr valign="top">
        <th scope="row"><?php _e('Font Size (px)', 'afe'); ?></th>
        <td>
	 
		<select name="afe-font-size" id="afe-font-size" style="width:290px;">
			<option value=""><?php _e('Select', 'afe'); ?></option>
			
			<?php
			
			$afe_font_size = get_user_meta($current_user->ID, 'afe-font-size', true); 
			
			for($i=10; $i<=22; $i++) { 
				if ((string)$i !== (string)$afe_font_size) {  ?>
				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } else { ?>
				<option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
				<?php }
			 } ?>
			
		</select>
		
	
	 
	</td>
        </tr>
	 
	  <tr valign="top">
        <th scope="row"><?php _e('Font Family', 'afe'); ?></th>
        <td>
	 
	
		<select name="afe-font-family" id="afe-font-family" style="width:290px;">
			<option value=""><?php _e('Select font from list or type a font name below', 'afe'); ?></option>
			
			<?php
			
			$afe_font_family = get_user_meta($current_user->ID, 'afe-font-family', true);
			$afe_font_family_user = get_user_meta($current_user->ID, 'afe-font-family-user', true); 
			
			$afe_fonts = array('Arial, Helvetica, sans-serif', 'Arial Black, Arial Black, Gadget, sans-serif', 'Courier New, Courier New, monospace', 'Tahoma, Geneva, sans-serif', 'Georgia, Times New Roman, serif', 'Trebuchet MS, Trebuchet MS, sans-serif', 'Verdana, Verdana, Geneva');
			
			for($i=0; $i<count($afe_fonts); $i++) { 
				if($afe_fonts[$i] !== $afe_font_family) { ?>
				<option value="<?php echo $afe_fonts[$i]; ?>"><?php echo $afe_fonts[$i]; ?></option>
				<?php } else {
				  $using_preset = 1;  ?>
				<option value="<?php echo $afe_fonts[$i]; ?>" selected="selected"><?php echo $afe_fonts[$i]; ?></option>
				<?php }
			
			 } ?>
			
		</select>
	 
	 	<br/>
		<input type="text" placeholder="<?php _e('You can also type a font name here', 'afe'); ?>" value="<?php if(!$using_preset) { echo $afe_font_family_user;} ?>" name="afe-font-family-user" id="afe-font-family-user" style="width:290px;">
	 
	
	</td>
        </tr>
	
	
		  <tr valign="top">
        <th scope="row"><?php _e('Preview', 'afe'); ?></th>
        <td>
	 
	<textarea name="afe-preview" style="font-size:<?php echo $afe_font_size; ?>px; font-family:<?php echo $afe_font_family; ?>; width: 484px; height: 250px;color:#000;" id="afe-preview" class="large-text code" disabled="disabled" spellcheck="false">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel justo quis elit sodales varius ut eu justo. Vestibulum dignissim, enim non sagittis consequat, mauris ipsum aliquet sapien, a tristique sapien quam quis magna. Nullam sit amet venenatis odio. Vestibulum quis lacus a nibh iaculis dictum nec ut dui. Etiam cursus arcu enim. Vivamus sed turpis sit amet dolor congue dictum. Praesent congue consequat tincidunt. Proin eu nunc quis ante pretium malesuada vitae id purus. Sed pharetra accumsan nisi vel adipiscing. 
	
Donec feugiat sapien nulla, quis viverra velit. Duis eget neque nisl, et tempor arcu. Suspendisse elementum porttitor dui non volutpat. Suspendisse fringilla tempor risus, sed rhoncus mauris auctor vitae. Suspendisse potenti. Nam eget metus sem. </textarea>
	
		</td>
        </tr>

</table>

    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'afe') ?>" />
    </p>


</form>



</div>
  
  <div class="postbox-container" style="width:20%; margin-top: 35px; margin-left: 15px;">
                <div class="metabox-holder">	
                        <div class="meta-box-sortables">

                           

                                <div id="breadcrumsnews" class="postbox">
                                        <div class="handlediv" title="Click to toggle"><br></div>
                                        <h3 class="hndle"><span><?php _e('Support ', 'afe'); ?></span></h3>
                                        <div class="inside">
                                          <?php _e('Thanks for using Admin Font Editor by ', 'afe'); ?><a href="http://www.geniusstartup.com/?ref=afe" target="_blank">Genius Startup</a>. <?php _e('The official support and feedback thread for this plugin is', 'afe'); ?> <a href="http://wordpress.org/support/plugin/admin-font-editor" target="_blank"><?php _e('here', 'afe'); ?></a>.

                                          <div style="text-align:center;margin-top: 22px;">
                                          	     	<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=16568_5_1_17" target="_blank"><img style="border:0px" src="http://www.elegantthemes.com/affiliates/banners/200x125.jpg" width="200" height="125" alt="Divi WordPress Theme"></a>
                                          </div>
					
				
				
					</div>
                                </div>

                        </div>
                </div>
        </div>

</div>



<script type="text/javascript">

	jQuery(document).ready( function($) {
	
		$("#afe-font-family").change(function() {
	   	$('#afe-preview').css("font-family", $(this).val());
		$('#afe-font-family-user').val("");
		});
	
	
		$("#afe-font-size").change(function() {
	   	$('#afe-preview').css("font-size", $(this).val() + "px");
		});
			
		$("#afe-font-family-user").blur(function() {
		  
		  if($(this).val()) {
		  
	   	$('#afe-preview').css("font-family", $(this).val());
		$('#afe-font-family option[value=""]').attr('selected','selected');
		  }
	});
	
			
			
	});

</script>

<?php
}


function afe_create_menu() {

add_options_page("Admin Font Editor", "Admin Font Editor", 1, "afe-settings", "afe_settings_page");  

}

add_action('admin_menu', 'afe_create_menu');

function plugin_mce_css( $mce_css ) {
  
    global $current_user;
    get_currentuserinfo();

	$afe_font_size = get_user_meta($current_user->ID, 'afe-font-size', true); 
	$afe_font_family = get_user_meta($current_user->ID, 'afe-font-family', true); 
  
	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$font_url .= plugins_url( 'css.php?size='.$afe_font_size.'&font='.$afe_font_family, __FILE__ );
	$mce_css .= str_replace( ',', '%2C', $font_url );
	
	return $mce_css;
}

add_filter( 'mce_css', 'plugin_mce_css' );



// for transalations
function afe_action_init() {
load_plugin_textdomain('ape', false, dirname(plugin_basename(__FILE__) ) . '/languages/' );
}

add_action('init', 'afe_action_init');