<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://github.com/thechetanvaghela
 * @since      1.0.0
 *
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Manage_Remove_Version_Number_From_Css_Js
 * @subpackage Manage_Remove_Version_Number_From_Css_Js/admin
 * @author     Chetan Vaghela <ckvaghela92@gmail.com>
 */
class Manage_Remove_Version_Number_From_Css_Js_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Manage_Remove_Version_Number_From_Css_Js_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Manage_Remove_Version_Number_From_Css_Js_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/manage-remove-version-number-from-css-js-admin.css', array(), $this->version, 'all' );

	}


	/**
	 * Add menu page to admin
	 *
	 * @since    1.0.0
	 */
	public function cv_actions_admin_menu_callback() {
		# add menu page option to admin
		add_menu_page('Version No. of JS&CSS','Version No. of JS&CSS','manage_options','cv_manage_remove_version_settings_page',array($this,'cv_settings_page_callback'),'dashicons-editor-help');
	}

	/**
	 * manage query arg callback
	 *
	 * @since    1.0.0
	 */
	public function cvmrvnojc_add_removable_arg_callback($args)
	{
		array_push($args,'cvmrvnojc-msg');
    	return $args;
	}

	/**
	 * callback menu page to admin
	 *
	 * @since    1.0.0
	 */
	public function cv_settings_save_page_callback() {
		# declare variables
		$form_msg = "";
		$selected_value = $save_selected = array();
		# check current user have manage options permission
		if ( current_user_can('manage_options') ) 
		{
			# check form submission
	        if (isset($_POST['manage-remove-version-number-from-css-js-form-settings'])) 
	        {
	        	# current page url
		        $pluginurl = admin_url('admin.php?page=cv_manage_remove_version_settings_page');
	        	# check nonce
	        	if ( ! isset( $_POST['cvmrvnojc_nonce'] ) || ! wp_verify_nonce( $_POST['cvmrvnojc_nonce'], 'cvmrvnojc_action_nonce' ) ) 
	        	{
	        		$redirect_url = add_query_arg('cvmrvnojc-msg', 'error',$pluginurl);
		            wp_safe_redirect( $redirect_url);
		            exit();
				} 
				else 
				{
		        	if (isset($_POST['cv-version-number-option'])) 
		        	{
		                $selected_value =  sanitize_text_field($_POST['cv-version-number-option']);
		                $save_selected = !empty($selected_value) ? $selected_value : '';
		                # save values to database
		                update_option('cv-version-number-option', $save_selected);

		                $redirect_url = add_query_arg('cvmrvnojc-msg', 'success',$pluginurl);
		                wp_safe_redirect( $redirect_url);
						exit();
	            	}
	         	}
	    	}
		}
	}

	/**
	 * callback menu page to admin
	 *
	 * @since    1.0.0
	 */
	public function cv_settings_page_callback() {
		# declare variables
		$selected = "";
		# get saved data
		$selected_option = get_option('cv-version-number-option');
		$selected_option = !empty($selected_option) ? $selected_option : '';

		$options = array(
			'none' => '-- None --',
			'timestamp' => 'Time Stamp',
			'remove' => 'Remove'
		);
		?>
		<div class="wrap">
			<h2><?php esc_html_e('Manage/Remove Version Number of JS & CSS file','manage-remove-version-number-from-css-js'); ?></h2>
				<div id="cvmrvnojc-setting-container">
					<div id="cvmrvnojc-body">
						<div id="cvmrvnojc-body-content">
							<div class="">
								<form method="post">
                                	<table>
                                  		<tr valign="top">
                                  			<td class="select cvmrvnojc-select-multiple">
                                  				<label for="cv-version-number-option" class="cvmrvnojc-lable"><?php _e('Select Option: ','manage-remove-version-number-from-css-js'); ?></label>
                                  				<select id="cv-version-number-option" name="cv-version-number-option">
													<?php
													if(!empty($options))
													{
														foreach ($options as $key => $option) 
														{		
															if ( !empty( $option ) ) 
															{
																$selected = ( $key == $selected_option) ? "selected" : "";
																echo '<option value="'.esc_attr($key).'" '.$selected.'>'.esc_attr($option).'</option>';
															}
														}
													}
													?>                                       
												</select>
                                        		<span class="cvmrvnojc-note"><strong><?php _e('Note: ','manage-remove-version-number-from-css-js'); ?></strong> <?php _e('The TimeStamp option replaces the version number with the timestamp of the modified file. eg. <code>.js?ver=1637326981</code>','manage-remove-version-number-from-css-js'); ?></span>
                                    		</td>
                                  		</tr>
                                	</table>
									<?php wp_nonce_field( 'cvmrvnojc_action_nonce', 'cvmrvnojc_nonce' ); ?>
									<?php  submit_button( 'Save Settings', 'primary', 'manage-remove-version-number-from-css-js-form-settings'  ); ?>
								</form>
							</div>
						</div>
					</div>
				<br class="clear">
			</div>
		</div>
		<?php
	}
}
