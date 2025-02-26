<?php
// display admin update message

if ( ! function_exists( 'ggfp_options_page' ) ):
function ggfp_options_page() {
	$ggfplayer_options = get_option( 'ggfplayer_settings' );
	$ggfplayer_options = $ggfplayer_options !== false ? $ggfplayer_options : array();

	
	// initialize values.
	$ggfplayer_options['app_key'] = ! empty( $ggfplayer_options['app_key'] ) ? $ggfplayer_options['app_key'] : 'uf6x8w5f81ac';
	

	$image =  GGFP_PLUGIN_URL.'images/logo.png';

	?>
	<div id="wpbody">
		<div id="wpbody-content">
	        <div class="wrap">
	            <h2><?php _e("Chatbot Settings", "guestfriend-chatbot") ?> - [ggf-chatbot]</h2>
					<div style="text-align:right;"> 
						<a target="_blank" href="https://getguestfriend.com/">
							<img style="width: 15%;margin-right: 10px;" src="<?php echo $image ?>"> 
						</a>
					</div>
	          		<form method="post" action="options.php">
	                	<?php settings_fields( 'ggfp-settings-group' ); ?>
						<table class="form-table"> 
	                		<tr valign="top">	
                    <th scope="row">
                        <strong>
                            <?php _e("App Key", "guestfriend-chatbot") ?>
                        </strong>
                    </th>
                    <td>
                        <textarea name="ggfplayer_settings[app_key]" value="<?php echo esc_attr( $ggfplayer_options['app_key']) ?>" style="width:50%" rows="4"  ><?php echo esc_attr( $ggfplayer_options['app_key']) ?></textarea>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;">
                            <?php _e("Please find your App Key on set up section of getguestfriend dashboard -> set up.", "guestfriend-chatbot") ?>
                        </span>
                    </td>
                </tr>
	           			</table>
					 <p class="submit">
					   <input  type="submit" class="button-primary" value="<?php _e('Save Changes', "guestfriend-chatbot") ?>" />
					 </p>
	 				</form> 	
	        </div>
			
	        <div class="clear"></div>
	        
		</div><!-- wpbody-content -->
	    
	    <div class="clear"></div>
	</div>
<?php
}
endif;


add_action( 'admin_menu', 'ggfp_plugin_menu' );
if ( ! function_exists( 'ggfp_plugin_menu' ) ):
function ggfp_plugin_menu() {
    add_menu_page( 'getguestfriend chat', 'Guestfriend', 'manage_options', 'ggfp-options', 'ggfp_options_page',GGFP_PLUGIN_URL."guestfriend_icon.png" );
}
endif;

add_action( 'admin_init', 'ggfplayer_mysettings' );
if ( ! function_exists( 'ggfplayer_mysettings' ) ):
function ggfplayer_mysettings() {
	register_setting( 'ggfp-settings-group', 'ggfplayer_settings');
}
endif;


add_shortcode('ggf-chatbot','ggfp_player_func');
if ( ! function_exists( 'ggfp_player_func' ) ):
function ggfp_player_func($atts){ 	
	$ggfplayer_options = get_option( 'ggfplayer_settings' );
	$app_key = ! empty( $ggfplayer_options['app_key'] ) ? $ggfplayer_options['app_key'] : 'uf6x8w5f81ac';
	
	$file = GGFP_PLUGIN_PATH. "player".$player.".php";
	$myggf = '<script src="https://assets.getguestfriend.com/widget-loader/ggf-chat-loader.js" ggf-key="'.$app_key.'" ></script>';
    ob_start();
    include $file;
    ob_end_clean();
    return $myggf;
	
}
endif;
add_filter('widget_text','do_shortcode');


