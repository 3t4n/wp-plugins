<?php
/**
 * This class is loaded on the back-end since its main job is 
 * to display the Admin to box.
 */

class ALGWJM_Admin {
	
	public function __construct () {

		add_action( 'admin_init', array( $this, 'ALGWJM_register_settings' ) );
		add_action( 'admin_menu', array( $this, 'ALGWJM_admin_menu' ) );
		
		if ( is_admin() ) {
			return;
		}
		
	}

	public function ALGWJM_admin_menu () {

		add_options_page('WP Job Google Location', 'WP Job Google Location', 'manage_options', 'ALGWJM', array( $this, 'ALGWJM_page' ));
	}

	public function ALGWJM_page() {
	?>
	<div>
	   <?php screen_icon(); ?>
	   <h2><?php _e('Auto Location Google For WP Job Manager Settings', 'algwjm'); ?></h2>
	   <form method="post" action="options.php">
	      <?php 
	      settings_fields( 'algwjm_options_group' ); 
	      $algwjm_enable_setting = get_option('algwjm_enable_setting');
	      $algwjm_map_api_key = get_option('algwjm_map_api_key');
	      $algwjm_types = get_option('algwjm_types');
	      $algwjm_country_code = get_option('algwjm_country_code');
	      ?>
	      <table class="form-table">
		         
		         <tr valign="top">
		            <th scope="row">
		               <label for="algwjm_enable_setting"><?php _e('Enable', 'algwjm'); ?></label>
		            </th>
		            <td>
		               <input class="regular-text" type="checkbox" id="algwjm_enable_setting" <?php echo (($algwjm_enable_setting=='yes')?'checked':'') ; ?> name="algwjm_enable_setting" value="yes" />
		            </td>
		         </tr>
		         <tr valign="top">
		            <th scope="row">
		               <label for="algwjm_enable_setting"><?php _e('Google Map API Key', 'algwjm'); ?></label>
		            </th>
		            <td>
		               <input class="regular-text" type="text" id="algwjm_map_api_key" name="algwjm_map_api_key" value="<?php echo esc_attr($algwjm_map_api_key); ?>" />
		               <p class="description">Google requires an API key to retrieve Auto Complete Address for job listings. Acquire an API key from the <a href="https://developers.google.com/maps/documentation/javascript/places-autocomplete">Google Maps API developer site</a>.</p>
		            </td>
		         </tr>
		         <tr>
	                <th scope="row"><label><?php _e('Types', 'algwjm'); ?></label></th>
	                <td>
	                   <input type="radio" name="algwjm_types" <?php echo ($algwjm_types=='default' || $algwjm_types=='' )?'checked':''; ?> value="default"><?php _e('Default', 'gmwsvs'); ?><br/>
	                   <input type="radio" disabled name="algwjm_types" <?php echo ($algwjm_types=='cities')?'checked':''; ?> value="cities"><?php _e('Cities', 'algwjm'); ?> <a href="https://www.codesmade.com/store/auto-location-for-wp-job-manager-via-google-pro/" target="_blank">Get Pro For this option</a>
	                 
	                </td>
	            </tr>
	            <tr valign="top">
		            <th scope="row">
		               <label><?php _e('Country Code', 'algwjm'); ?></label>
		            </th>
		            <td>
		               <input class="regular-text" type="text" name="algwjm_country_code" value="<?php echo esc_attr($algwjm_country_code); ?>" disabled /><a href="https://www.codesmade.com/store/auto-location-for-wp-job-manager-via-google-pro/" target="_blank">Get Pro For this option</a>
		               <p class="description"><strong>Default is blank</strong> it will be show all Country address if you want to paritucalr address than add two digit code <strong>Example: France for add fr</strong> <a href="https://codesmade.com/demo/country-code-list/">Get Country Code list</a></p>
		            </td>
		         </tr>
	      </table>
	      <?php  submit_button(); ?>
	   </form>
	</div>
	<?php
	}

	public function ALGWJM_register_settings() {

		
		register_setting( 'algwjm_options_group', 'algwjm_enable_setting', array( $this, 'algwjm_accesstoken_callback' ) );
		register_setting( 'algwjm_options_group', 'algwjm_map_api_key', array( $this, 'algwjm_accesstoken_callback' ) );
		register_setting( 'algwjm_options_group', 'algwjm_types', array( $this, 'algwjm_accesstoken_callback' ) );
		register_setting( 'algwjm_options_group', 'algwjm_country_code', array( $this, 'algwjm_accesstoken_callback' ) );
	}
	
	
	public function algwjm_accesstoken_callback($option) {
		if ( !empty( $option ) ) {
			   $option = sanitize_text_field($input);
		}
		return $option;
	}

	
	
}



?>