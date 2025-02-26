<?php
/*
Plugin Name: Automatic Comment SPAM Disable
Plugin URI: http://flynewmedia.com/
Description: Deletes SPAM comments that contain links
Version: 1.3
Author: valiik (Valik Rudd)
Author URI: http://valiik.com/
Donate link: http://bit.ly/A3SfBN
*/

define('SD_VERSION', '1.3');
define('SD_DIR', dirname(__FILE__));

function my_scripts_method() {
	wp_enqueue_script(array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
 
function sd_addscript() {
	
	echo '<p id="sd_att" style="background:#fffce4;border:1px solid #b40000;padding:13px;margin:20px 0;font-size:14px;line-height:20px;display:none;">';
	
	if(get_option('sd_msg') != '') {
		
		echo get_option('sd_msg');
		
	} else {
		
		echo '<strong style="color:#f00;">ATTENTION:</strong> Please do not include links in your comments. Any comment that has a link in it will be <strong style="color:#f00;">destroyed on sight</strong>.';
		
	}
	
	echo '</p>'; ?>
	
	<script>var $ = jQuery.noConflict();

		$( document ).ready(function() {
			
			$('#commentform textarea#comment').keyup(function() {
									
				var sd_comment_text = $('#commentform textarea#comment').val();
				
				if (sd_comment_text.toLowerCase().indexOf(" href") >= 0) {
					
					$('#sd_att').show();
					
				} else {
					
					$('#sd_att').hide();
					
				}
															  
			});
		
		});
		
	</script><?php
	
}
add_action( 'comment_form_after_fields','sd_addscript');

// Add action to do after comment is submitted
add_action('comment_post','comment_ratings');

// After Comment is submitted
function comment_ratings($comment_id) {
	global $wpdb;

	$sd_comment = $_POST['comment'];
	
	if ((strpos($sd_comment,' href=') !== false) || (strpos($sd_comment,' href =') !== false)) {
    	
		if(get_option('sd_delete') == '0') {
			wp_delete_comment( $comment_id );
		} else if(get_option('sd_delete') == '1') {
			wp_delete_comment( $comment_id, true );
		}
		
	} 
	
}


function admin_msg( $msg = '', $class = "updated" ) {
	if ( empty( $msg ) )
		$msg = 'Settings <strong>saved</strong>.';

	echo "<div class='".$class." fade'><p>".$msg."</p></div>";
}


if ( is_admin() ){

	add_action('admin_menu', 'sd_create_menu');

	function sd_create_menu() {

		add_menu_page('Automatic Comment SPAM Disable', 'SPAM Disable', 'administrator', __FILE__, 'sd_settings_page',plugins_url('/sdicon.png', __FILE__));

		add_action( 'admin_init', 'register_spamdisable' );
	}


	function register_spamdisable() {
		register_setting( 'sd-settings-group', 'sd_msg' );
		register_setting( 'sd-settings-group', 'sd_filter' );
		register_setting( 'sd-settings-group', 'sd_delete' );
	}

	function sd_settings_page() { ?>

		<div class="wrap">
		
        	<h2>SPAM Disable Settings</h2>

			<form method="post" action="options.php">
    			<?php settings_fields( 'sd-settings-group' ); ?>
    			<?php //do_settings( 'sd-settings-group' ); 
				
				$sd_msg = '<strong style="color:#f00;">ATTENTION:</strong> Please do not include links in your comments. Any comment that has a link in it will be <strong style="color:#f00;">destroyed on sight</strong>.';
				
                
                
				if($_GET['settings-updated'] == 'true') {
					admin_msg();
				}
                
				?>
                <p style="width:700px;max-width:90%;margin-left:10px;">SPAM Disable plugin lets you automatically remove any comments that come in that include a link within it's comment text. There is no reason to include a link in a real useful comment. 90% of links in comments indicate a SPAM comment, so we remove them! The other 10% are humans that can read and we display a warning when they are typing their comment to let them know that they can not include links. This should solve a big chunk of the SPAM comments problem.</p>
    			<table class="form-table">
        			<tr valign="top">
        				<th scope="row">Custom Alert Message Text</th>
        				<td><textarea name="sd_msg" style="height:75px;width:500px;max-width:90%;"><?php 
						if(get_option('sd_msg') != '') { 
							echo htmlentities(get_option('sd_msg'), ENT_QUOTES);
						} else { 
							echo htmlentities($sd_msg, ENT_QUOTES); 
						} ?></textarea></td>
        			</tr>
         
        			<!--<tr valign="top">
        				<th scope="row">Custom Filter Term<br />(DO NOT CHANGE)</th>
        				<td><input type="text" name="sd_filter" value="<?php 
						//if(get_option('sd_filter') != '') { 
							//echo get_option('sd_filter'); 
						//} else { 
							//echo ' href';
						//} ?>" /></td>
        			</tr>-->
         
        			<tr valign="top">
        				<th scope="row">Permenanlty Delete<br />SPAM Comments?<br />(1 if delete, 0 to move to trash)</th>
        				<td><input type="text" name="sd_delete" value="<?php if(get_option('sd_delete') != '') { echo get_option('sd_delete'); } else { echo '0'; } ?>" /></td>
        			</tr>
    			</table>
    
    			<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
                
                <p>Plugin created by <a href="http://valikrudd.com" target="_blank">Valik Rudd</a> from <a href="http://FlyNewMedia.com" target="_blank">FlyNewMedia.com</a>. If you like the plugin, <a href="http://bit.ly/A3SfBN" target="_blank"><strong>buy me a coffee here</strong></a> :)</p>

			</form>
		</div><?php 
	
	} 


}
?>
