<?php
/**
 * Admin Settings Page
 * 
 * @since 2.0.0
 * 
 * License: GPL-3.0
*  License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */ 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}	
	

/**
 * Load Admin Options Page
 * 
 * @since 2.0.0
 */ 	
	add_action( 'admin_menu', 'prism_add_options_page' );
	add_action( 'admin_init', 'prism_register_settings' );
	

/**
 * Add Admin Options Page to Settings
 * 
 * @since 2.0.0
 */
	function prism_add_options_page() {
		add_options_page('AH Code Highlighter', 'AH Code Highlighter', 'manage_options', 'prism', 'prism_options_page' );
	}
	

/**
 * Register Settings
 * 
 * @since 2.0.0
 */
	function prism_register_settings() {
        register_setting( 'prism-settings-group', 'custom_prism_css' );
		register_setting( 'prism-settings-group', 'notice_warn_theme_css' );
	}



/**
 * Admin Options Page
 * 
 * @since 2.0.0
 */	
	function prism_options_page() {
?>
		<div id="wrap">
			<h2>AH Code Highlighter</h2>
						
			<form method="post" action="options.php">
				<?php settings_fields( 'prism-settings-group' ); ?>
				<?php do_settings_sections( 'prism-settings-group' ); ?>
				
				<table class="form-table">
					<tbody>
	
						<tr>
							<th scope="row">
								<label for="default_line_numbers">Choose Your Favorite Code Highlighting Theme:</label>
							</th>
							                 
							<td>
								<select name="custom_prism_css" id="custom_prism_css">
		                            <option value='standard_theme' <?php selected( get_option( 'custom_prism_css' ), 'standard_theme' ); ?>>Default Theme</option>
		                            <option value='okaidia_theme' <?php selected( get_option( 'custom_prism_css' ), 'okaidia_theme' ); ?>>Okaidia Theme</option>
		                            <option value='twilight_theme' <?php selected( get_option( 'custom_prism_css' ), 'twilight_theme' ); ?>>Twilight Theme</option>
		                            <option value='coy_theme' <?php selected( get_option( 'custom_prism_css' ), 'coy_theme' ); ?>>Coy Theme</option>
		                            <option value='solarized_theme' <?php selected( get_option( 'custom_prism_css' ), 'solarized_theme' ); ?>>Solarized Light Theme</option>
                                    <option value='dark_theme' <?php selected( get_option( 'custom_prism_css' ), 'dark_theme' ); ?>>Dark Theme</option>
                                    <option value='funky_theme' <?php selected( get_option( 'custom_prism_css' ), 'funky_theme' ); ?>>Funky Theme</option>
                                    <option value='tomorrow_theme' <?php selected( get_option( 'custom_prism_css' ), 'tomorrow_theme' ); ?>>Tomorrow Night Theme</option>
	                               </select>
							</td>
						</tr>

					</tbody>
				</table>
				
				<?php submit_button(); ?>
			</form>
<?php			
?>

<?php
/**
 * Highlight Theme Preview with Images
 * 
 * @since 2.0.0
 */	
?>                                   
			<div class="img">
                <h2>Theme Preview</h2>
                <hr />
                <h3>Default Theme</h3>
                <img src="<?php echo plugins_url( '/img/default.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Okaidia Theme</h3>
                <img src="<?php echo plugins_url( '/img/okaidia.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Twilight Theme</h3>
                <img src="<?php echo plugins_url( '/img/twilight.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Coy Theme</h3>
                <img src="<?php echo plugins_url( '/img/coy.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Solarized Light Theme</h3>
                <img src="<?php echo plugins_url( '/img/solarized.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Dark Theme</h3>
                <img src="<?php echo plugins_url( '/img/dark.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Funky Theme</h3>
                <img src="<?php echo plugins_url( '/img/funky.jpg',__FILE__ );?>" alt="theme-screenshot" />
                <h3>Tomorrow Night Theme</h3>
                <img src="<?php echo plugins_url( '/img/tomorrow.jpg',__FILE__ );?>" alt="theme-screenshot" />
            </div>
		</div>
<?php
	}
