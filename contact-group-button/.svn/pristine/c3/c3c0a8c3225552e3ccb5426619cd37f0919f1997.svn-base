<?php 
/* 
Plugin Name: 	Contact Group Button
Plugin URI: 	http://phongphan.net/du-an/plugin-wordpress
Description: 	Add group contact phone, sms, facebook messages, zalo... to website. Display in desktop, laptop, table, phone and more.
Tags: 			Account contact, quick contact button, call now button, sms icon contact, mobile, facebook messages button, buttons, phone, call, contact
Author URI: 	http://phongphan.net/
Author: 		Phong Phan
Version: 		1.0.0
License: 		GPL2
Text Domain:    phongphan
*/

define('P_GROUP_CONTACT_BUTTON_VERSION', '1.0.0');
define('P_GROUP_CONTACT_BUTTON_DIR', plugin_dir_path(__FILE__));
define('P_GROUP_CONTACT_BUTTON_URI', plugins_url('/', __FILE__));

class P_Group_Contact_Button
{
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'phongphan',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
	public $menu_id;
	
	/**
	 * Plugin initialization
	 *
	 * @since 1.0.1
	 */
	public function __construct() {
		
		// localization
		load_plugin_textdomain( 'phongphan' );

		// admin
		add_action( 'admin_menu', array( $this, 'pp_add_admin_menu' ));
		add_action( 'admin_enqueue_scripts', array( $this, 'pp_admin_scripts' ));
		
		// create needed initialization
		add_action('admin_init', array( $this, 'pp_register_options_settings') );
		
		// create custom footer
		add_action('wp_footer', array( $this, 'pp_add_buttons'), 10);
		
		// grab the options, use for entire object
		$this->pp_options = $this->pp_options();
	}

	/**
	 * Add Menu Page
	 *
	 * @since 1.0.1
	 */
	public function pp_add_admin_menu() {
    	add_options_page('Settings Page for Contact Group Button', 'Contact Group Button', 'publish_posts', 'p_group_contact_button', array($this,'pp_options_page'),''); 
	}
	
	/**
	 * Add Resources
	 *
	 * @since 1.0.1
	 */
	function pp_admin_scripts() {

		if (get_current_screen()->base == 'settings_page_p_group_contact_button') {
	        wp_register_script( 'pp_js', plugins_url('assets/js/contact-group-button-admin.js', __FILE__), array('jquery'), '1.1.0', true );
	        wp_enqueue_script( 'pp_js' );
			wp_register_style( 'pp_css', plugins_url('/assets/css/contact-group-button-admin.css', __FILE__) , false, '1.1.0' );
			wp_enqueue_style( 'pp_css');

		    wp_enqueue_style('wp-color-picker');
		    wp_enqueue_script('iris', admin_url('js/iris.min.js'),array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);
		    wp_enqueue_script('wp-color-picker', admin_url('js/color-picker.min.js'), array('iris'), false,1);
	    }
	}

	/**
	 * Whitelist Options
	 *
	 * @since 1.0.1
	 */
	function pp_register_options_settings() { 
	    register_setting( 'pp_custom_options-group', 'pp_options' );
	}  
	    
	/**
	 * Options Page
	 *
	 * @since 1.0.1
	 */
	function pp_options_page() {
		global $_wp_admin_css_colors, $wp_version;
		
		// access control
	    if ( !(isset($_GET['page']) && $_GET['page'] == 'p_group_contact_button' )) 
	    	return;
		?>
	
		<div class='wrap'>
			<h2><?php _e('Contact Group Button','phongphan') ?></h2>
			<form method="post" action="options.php" class="form-table">
				<?php
				wp_nonce_field('pp_options');
				settings_fields('pp_custom_options-group');
				?>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="pp_options" />
				<h2 class='title'><?php _e('Settings','phongphan') ?></h2>
				<p><?php _e('Chose display only desktop or only mobile and both.','phongphan') ?></p>
				<table border=0 cellpadding=2 cellspacing="2">
				<tr>
				    <th><?php _e('Disable On Screen','phongphan') ?></th>
				        <td>
					        <input type="checkbox" id="contact-group-button-text-1" name="pp_options[call_text_tablet]" value="1024" <?php checked('1024', $this->pp_options['call_text_tablet']) ?>"  />
							<label for="contact-group-button-text-1"><?php _e(' Disabled On Tablet And Mobile','phongphan') ?></label><br />
							<input type="checkbox" id="contact-group-button-text-2" name="pp_options[call_text_desktop]" value="1024" <?php checked('1024', $this->pp_options['call_text_desktop']) ?>"  />
							<label for="contact-group-button-text-2"><?php _e(' Disabled On Desktop','phongphan') ?></label><br />
				        </td>
				</tr>
				</table>
				
				<p><?php _e('Contacat Group Button Position . Default Bottom is 1% & Left is 2% .','phongphan') ?></p>
				<table border=0 cellpadding=2 cellspacing="2">
				<tr>
				    <th><?php _e('Bottom','phongphan') ?></th>
				        <td>
					        <input name="pp_options[move_top]" placeholder="1" value='<?php echo $this->pp_options['move_top']; ?>' /><label>%</label><br />
							<label for="contact-group-button-text-1"><?php _e(' Position On The Bottom','phongphan') ?></label>
				        </td>
				</tr>
				<tr>
				    <th><?php _e('Left','phongphan') ?></th>
				        <td>
					        <input name="pp_options[move_left]" placeholder="3" value='<?php echo $this->pp_options['move_left']; ?>' /><label>%</label><br />
							<label for="contact-group-button-text-1"><?php _e(' Position On The Left','phongphan') ?></label>
				        </td>
				</tr>
				</table>
				
				<p><?php _e('Adding a phone number, number of zalo account.','phongphan') ?></p>
				<table border=0 cellpadding=2 cellspacing="2">
				<tr>
					<th><?php _e('Phone Number','phongphan') ?></th>
					<td>
						<input name="pp_options[phone_number]" placeholder="+84973509707" value='<?php echo $this->pp_sanitize_phone($this->pp_options['phone_number']); ?>' /><br />
					</td>
				</tr>
				<tr>
					<th><?php _e('Zalo Number','phongphan') ?></th>
					<td>
						<input name="pp_options[zalo_number]" placeholder="+84973509707" value='<?php echo $this->pp_sanitize_phone($this->pp_options['zalo_number']); ?>' /><br />
					</td>
				</tr>
				</table>
				
				<p><?php _e('Adding Link Profile Facebook messages (Example: https://m.me/phongphan24) .','phongphan') ?></p>
				<table border=0 cellpadding=2 cellspacing="2">
				<tr>
				    <th><?php _e('Link','phongphan') ?></th>
				        <td>
					        <input type="text" id="contact-group-button-text" name="pp_options[call_text]" value="<?php echo $this->pp_options['call_text'] ?>" placeholder="https://m.me/phongphan24" /><br />
							
				        </td>
				</tr> 
  
				
				<tr>
				    <th><?php _e('Button Background','phongphan') ?></th>
					    <td>
						    <input type="text" class="colourme" name="pp_options[bg_color]" value="<?php echo $this->pp_options['bg_color']; ?>">
					    </td>
				</tr>
				<tr>
				    <th><?php _e('Color Effect','phongphan') ?></th>
					    <td>
						    <input type="text" class="colourme" name="pp_options[color_ef]" value="<?php echo $this->pp_options['color_ef']; ?>">
					    </td>
				</tr>
				
				
				</table>
				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes','phongphan') ?>" />
					<a class="button button-primary" href="http://phongphan.net/lien-he" target="_blank">Support</a>
				</p>
			</form>
			
				
		</div>
		
	  	<?php
	}
	
	// Adding Custom Quick Call Buttons.
	function pp_add_buttons() {
		
		$return =  "\n\n
			<!-- Start -->";

		// Setup valuable settings.
		if ($this->pp_mandatory_have_info()) {
			$color=$this->pp_options['color_ef'];
			$color_rgb=$this->hexToRgb($color,0.5);
			// adding the enque here will setup the style.
			wp_register_style( 'pp_css', plugins_url('/assets/css/contact-group-button.css', __FILE__) , false, '1.1.0' );
			wp_enqueue_style( 'pp_css');
			wp_register_style( 'font-awesome', plugins_url('/assets/css/font-awesome.min.css', __FILE__), false, '1.1.0' );
			wp_enqueue_style( 'font-awesome');
			wp_register_script( 'pp_js', plugins_url('/assets/js/drag-contact-group-button.js', __FILE__), array('jquery'), '1.1.0', true );
	        wp_enqueue_script( 'pp_js' );
			// code button
			$return .=  "
			<div class='contact-group-button'></div>
			<div class='call-now-button support-online'>
			<div class='support-content'>";	
			
			if ( !empty($this->pp_options['phone_number']) ) { 
				$return .= "
				<a href='tel:".$this->pp_sanitize_phone($this->pp_options['phone_number'])."'' class='call-now' rel='nofollow'>
			      <i class='fa fa-whatsapp' aria-hidden='true'></i>
			          <div class='animated infinite zoomIn kenit-alo-circle'></div>
			          <div class='animated infinite pulse kenit-alo-circle-fill'></div>
			        <span>Hotline: ".$this->pp_sanitize_phone($this->pp_options['phone_number'])."</span>
			    </a>
			    <a class='sms' href='sms:{$this->pp_options['phone_number']}'>
			      <i class='fa fa-weixin' aria-hidden='true'></i>
			      <span>SMS: {$this->pp_options['phone_number']}</span>
			    </a>"; 
			}
			$return .= "
			    ";
			    if ( !empty($this->pp_options['call_text']) ) { 
				$return .= "
			    <a class='mes' target='_blank' href='{$this->pp_options['call_text']}'>
			      <i class='fa fa-facebook-official' aria-hidden='true'></i>
			      <span>Message facebook</span>
			    </a>";
			    }
			$return .= "
			";
			    if ( !empty($this->pp_options['zalo_number']) ) { 
				$return .= "
			    <a class='zalo' href='http://zalo.me/{$this->pp_options['zalo_number']}'>
			      <i class='fa fa-heartbeat'></i>
			      <span>Zalo: {$this->pp_options['zalo_number']}</span>
			    </a>";
			    }
			$return .= "   
			  </div>
			  <a class='btn-support'>
			    <i class='fa fa-user-circle' aria-hidden='true'></i>
			    <div class='animated infinite zoomIn kenit-alo-circle'></div>
			    <div class='animated infinite pulse kenit-alo-circle-fill'></div>
			  </a>
			</div>
			<style> 
				
                @media screen and (min-width: {$this->pp_options['call_text_desktop']}px) { 
				.call-now-button { display: none !important; } 
				} 
				@media screen and (max-width: {$this->pp_options['call_text_tablet']}px) { 
				.call-now-button { display: none !important; } 
				}
				.kenit-alo-circle-fill{background-color: {$this->pp_options['color_ef']}!important;}
				.call-now-button { bottom: {$this->pp_options['move_top']}%; }
				.call-now-button { left: {$this->pp_options['move_left']}%; }
				.support-online i { background: {$this->pp_options['bg_color']}; }";
			$return .= "
			</style>";
		} 
		$return .= "
			<!-- /End -->\n\n";
			
		echo apply_filters('pp_output',$return);
	}
	
	// Checking and setting the default options.
	function pp_options() { 
	   
		$defaults = array(
			'move_left'      => '2',
			'move_top'       => '1',
			'bg_color' 		 => '#1a1919',
			'call_text_tablet' => '',
			'call_text_desktop' => '',
			'call_text'   	 => '',
			'phone_number' 	 => '',
			'color_ef'		 =>'#dd3333',
		);

		// Get user options
		$pp_options = get_option('pp_options');		
		
		// if the user hasn't made settings yet, default
		if (is_array($pp_options)) {
			// Lets make sure we have a value for each as some might be new.
			foreach ($defaults as $k => $v)
				if (!isset($pp_options[$k]) || empty($pp_options[$k]))
					$pp_options[$k] = $v;
		} 
		// Must be first, lets use defaults
		else {
			$pp_options = $defaults;
		}
		
		return $pp_options;
	}
	
	/**
	 * Mandatory information is required.
	 *
	 * @since 1.0.1
	 */
	function pp_mandatory_have_info() {
		if(isset($this->pp_options['phone_number'])||isset($this->pp_options['zalo_number'])||isset($this->pp_options['call_text'])){
			return true;
		}

		if(!empty($this->pp_options['phone_number']) && !empty($this->pp_options['zalo_number']) && !empty($this->pp_options['call_text'])){
			return false;
		}
		//return ( && !empty($this->pp_options['phone_number']))) ? true : false;
	}

	/**
	 * helper, clean phone
	 *
	 * @since 1.0.1
	 */
	function pp_sanitize_phone($number) {
		return str_replace( array(' ','(',')','.'), array('','','-','-'), $number);
	}
	// convert hex color to RGB
	function hexToRgb($hex, $alpha = false) {
	   $hex      = str_replace('#', '', $hex);
	   $length   = strlen($hex);
	   $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
	   $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
	   $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
	   if ( $alpha ) {
	      $rgb['a'] = $alpha;
	   }
	   return implode(array_keys($rgb)) . '(' . implode(', ', $rgb) . ')';
	}
	
}
new P_Group_Contact_Button();