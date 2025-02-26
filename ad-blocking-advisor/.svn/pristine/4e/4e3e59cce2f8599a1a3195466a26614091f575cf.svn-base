<?php
   /*
   Plugin Name: Ad Blocking Advisor
   Plugin URI: https://obrienlabs.net
   Description: Create a simple and elegant banner that will display to visitors who have ad blocking software installed, asking them to support your site by allowing ads.
   Version: 2.0
   Author: Pat O'Brien
   Author URI: https://obrienlabs.net
   License: GPL2
   Text Domain: ad-blocking-advisor
   Domain Path: /languages
   */
   
DEFINE( "AD_BLOCKING_ADVISOR_VER", "2.0" );

class Ad_Blocking_Advisor {
	
	public function __construct() {
		register_activation_hook(__FILE__, array( &$this, "install" ) );

		add_action( "plugins_loaded", array( &$this, "load_textdomain" ) );
		add_action( "wp_enqueue_scripts", array( &$this, "load_scripts" ) );
		
		add_action( "wp_footer", array( &$this, "alert_banner" ) );

		if( is_admin() ) {		
			add_action( "admin_enqueue_scripts", array( &$this, "admin_scripts" ) );
			add_action( "admin_init", array( &$this, "setup_settings" ) );
			add_action( "admin_init", array( &$this, "upgrade_options" ) );
			add_action( "admin_menu", array( &$this, "aba_createOptions" ) );
			add_filter( "plugin_action_links", array( &$this, "aba_plugin_action_links" ), 10, 2 );
		}

	}
	
	public function install() {
		update_option( "aba_version", AD_BLOCKING_ADVISOR_VER, true );
		update_option( "aba_enabled", "true", true );
		update_option( "aba_notice_text", "Please support this website by adding us to your whitelist in your ad blocker. Ads are what helps us bring you premium content! Thank you!", true );
		update_option( "aba_show_banner_dismiss_icon", "true", true );
		update_option( "aba_show_banner_loggedin", "true", true );
		update_option( "aba_div_location", "body", true );
		update_option( "aba_background_color", "#C44", true );
		update_option( "aba_font_color", "#FFF", true );
		update_option( "aba_font_size", "15", true );
		update_option( "aba_cookie_allow", "true", true );
		update_option( "aba_cookie_timeout", "2", true );
	}
	
	public function load_textdomain() {
		load_plugin_textdomain( "ad-blocking-advisor", false, plugin_basename( dirname( __FILE__ ) ) . "/languages" ); 
	}	
	
	public function upgrade_options() {
		$aba_version = get_option( "aba_version" );
		
		// Set the plugin version
		if ( ( !$aba_version ) || ( $aba_version == "" ) ) {
			// New in 1.0.5, track plugin version
			update_option( "aba_version", AD_BLOCKING_ADVISOR_VER, true );
		}
			
		// Changes for versions below 1.0.5
		if ( $aba_version < "1.0.5" ) {
			// New option in 1.0.5 which allows enabling/disabling the X icon to allow visitors to dismiss the banner. Set option default to true. 
			update_option( "aba_show_banner_dismiss_icon", "true", true );
		}
		
		// Changes for versions below 1.2
		if ( $aba_version < "1.2" ) {
			// 1.2 has the ability to hide or show the banner if a user is logged in
			update_option( "aba_show_banner_loggedin", "true", true );
		}

		// Version checks complete, update the variable
		update_option( "aba_version", AD_BLOCKING_ADVISOR_VER, true );
		
	}
	
	public function load_scripts() {        
		// JavaScript
		// esc_url() Removed in 2.0 - https://wordpress.org/support/topic/not-working-2365/
        // wp_register_script( "aba_script", esc_url( plugin_dir_url( __FILE__ ) . "js/ad-blocking-advisor.js" ), array( "jquery" ) );
        wp_register_script( "aba_script", plugin_dir_url( __FILE__ ) . "js/ad-blocking-advisor.js", array( "jquery" ) );
		wp_enqueue_script( "aba_script" );
        wp_register_script( "aba_detector", plugin_dir_url( __FILE__ ) . "js/ads.js", array( "jquery" ), time(), 1 ); // Load in footer
		wp_enqueue_script( "aba_detector" );
				
		// CSS
		wp_enqueue_style( "dashicons" );
		wp_register_style( "aba_frontEndCSS" , plugins_url( "css/frontend.css", __FILE__) );
		wp_enqueue_style( "aba_frontEndCSS" );
	}
	
	public function admin_scripts() {
		wp_register_style( "aba_adminCSS", plugins_url( "css/admin.css", __FILE__ ) );
		wp_enqueue_style( "aba_adminCSS" );
	}
	
	public function alert_banner() {
		// Show the Ad Blocking Advisor bar
		
		$enabled					= get_option( "aba_enabled" );
		$show_banner_dismiss_icon	= get_option( "aba_show_banner_dismiss_icon" );
		$show_banner_logged_in		= get_option( "aba_show_banner_loggedin" );

		if ( $enabled ) {
			
			// If logged in, and show banner is false, return
			if ( ( is_user_logged_in() ) && ( !$show_banner_logged_in ) ) {
				return;
			}
		
			$text 				= get_option( "aba_notice_text" );
			$background			= get_option( "aba_background_color" );
			$font 				= get_option( "aba_font_color" );
			$fontSize 			= get_option( "aba_font_size" );
			$cookieAllow 		= get_option( "aba_cookie_allow" );
			$cookieExpiration	= get_option( "aba_cookie_timeout" );
			$divLocation 		= get_option( "aba_div_location" );
		
			$html = '
				<!-- Special Message (ABA) Begin -->
				<style>
					.special-message-wrapper {
						background:'. $background .';
						color:'. $font .';
						font-size:' . $fontSize .'px;
					}
				</style>
				
				<div class="special-message-wrapper" style="display:none;">
					<div class="special-message-content">
						<div class="special-message-left">
							' . $text . '
						</div>
						<div class="special-message-right">

			';
						if ( $show_banner_dismiss_icon ) {
							$html .= '
							<span class="dashicons dashicons-no"></span>
							';
						}
						
			$html .= '
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				
				<script type="text/javascript">

					jQuery( window ).load( function() {
						if ( ! document.getElementById( "aba_detector" ) ) {
							var aba_cookie = readCookie( "Ad_Blocking_Advisor_WP_Plugin" )
							if ( ! aba_cookie ) {
								jQuery( ".special-message-wrapper" ).show().prependTo( jQuery( "'.$divLocation.'" ) );
							}
						}
					});
					
					jQuery( ".special-message-right" ).click(function(){
						// User clicked close.
						jQuery( ".special-message-wrapper" ).hide();
			';
					
				if ( $cookieAllow ) {
					$html .= '
						createCookie( "Ad_Blocking_Advisor_WP_Plugin", "closed", '.$cookieExpiration.' );
					';
				}
							
			$html .= '
					});
				</script>
				<!-- Special Message (ABA) End -->
			';
			
			echo $html;	
		}
		
	}
	
	// Admin Settings
	
	public function aba_createOptions() {
		add_options_page(
			'Ad Blocking Advisor Settings',			// Page Title
			'Ad Blocking Advisor Settings',			// Menu Title
			'manage_options',						// Capability
			'aba-settings',							// Menu Slug
			array( &$this, 'aba_settingsPage' )		// Callback Function
		);
	}
	
	public function setup_settings() {
		// General Settings
		
		add_settings_section( 
			'aba_general_settings_section',							// Section name
			__( 'General Settings:','ad-blocking-advisor' ),			// Title
			array( &$this , 'aba_settings_section_callback' ),		// Callback
			'aba_general_settings'									// Which page should this section show on?
		);
		
		add_settings_field(
			'aba_enabled',								// ID of the field
			__( 'Enabled:','ad-blocking-advisor' ),		// Title
			array( &$this , 'enabled_settings' ),		// Callback function
			'aba_general_settings',						// Which page should this option show on
			'aba_general_settings_section'				// Section name to attach to
		);
		
		add_settings_field(
			'aba_notice_text',								// ID of the field
			__( 'Notice Text:','ad-blocking-advisor' ),		// Title
			array( &$this , 'notice_text' ),				// Callback function
			'aba_general_settings',							// Which page should this option show on
			'aba_general_settings_section'					// Section name to attach to
		);
		
		add_settings_field(
			'aba_show_banner_loggedin',												// ID of the field
			__( 'Show the banner to logged in users?','ad-blocking-advisor' ),		// Title
			array( &$this , 'show_banner_loggedin' ),								// Callback function
			'aba_general_settings',													// Which page should this option show on
			'aba_general_settings_section'											// Section name to attach to
		);			
		
		add_settings_field(
			'aba_show_banner_dismiss_icon',									// ID of the field
			__( 'Show The Dismiss (X) Icon?','ad-blocking-advisor' ),		// Title
			array( &$this , 'show_banner_dismiss_icon' ),					// Callback function
			'aba_general_settings',											// Which page should this option show on
			'aba_general_settings_section'									// Section name to attach to
		);
		
		add_settings_field(
			'aba_cookie_allow',											// ID of the field
			__( 'Allow Cookie Setting:','ad-blocking-advisor' ),		// Title
			array( &$this , 'cookie_allow' ),							// Callback function
			'aba_general_settings',										// Which page should this option show on
			'aba_general_settings_section'								// Section name to attach to
		);
		
		add_settings_field(
			'aba_cookie_timeout',											// ID of the field
			__( 'Cookie Timeout (in days):','ad-blocking-advisor' ),		// Title
			array( &$this , 'cookie_timeout' ),								// Callback function
			'aba_general_settings',											// Which page should this option show on
			'aba_general_settings_section'									// Section name to attach to
		);			
				
		add_settings_field(
			'aba_div_location',																// ID of the field
			__( 'Place the banner before this HTML element:','ad-blocking-advisor' ),		// Title
			array( &$this , 'div_location' ),												// Callback function
			'aba_general_settings',															// Which page should this option show on
			'aba_general_settings_section'													// Section name to attach to
		);
		
		add_settings_field(
			'aba_background_color',									// ID of the field
			__( 'Background Color:','ad-blocking-advisor' ),		// Title
			array( &$this , 'background_color' ),					// Callback function
			'aba_general_settings',									// Which page should this option show on
			'aba_general_settings_section'							// Section name to attach to
		);
		
		add_settings_field(
			'aba_font_color',								// ID of the field
			__( 'Font Color:','ad-blocking-advisor' ),		// Title
			array( &$this , 'font_color' ),					// Callback function
			'aba_general_settings',							// Which page should this option show on
			'aba_general_settings_section'					// Section name to attach to
		);
		
		add_settings_field(
			'aba_font_size',								// ID of the field
			__( 'Font Size:','ad-blocking-advisor' ),		// Title
			array( &$this , 'font_size' ),					// Callback function
			'aba_general_settings',							// Which page should this option show on
			'aba_general_settings_section'					// Section name to attach to
		);
		
		register_setting( 'aba_general_settings', 'aba_enabled' );
		register_setting( 'aba_general_settings', 'aba_notice_text' );
		register_setting( 'aba_general_settings', 'aba_show_banner_dismiss_icon' );
		register_setting( 'aba_general_settings', 'aba_show_banner_loggedin' );
		register_setting( 'aba_general_settings', 'aba_div_location' );
		register_setting( 'aba_general_settings', 'aba_background_color' );
		register_setting( 'aba_general_settings', 'aba_font_color' );
		register_setting( 'aba_general_settings', 'aba_font_size' );
		register_setting( 'aba_general_settings', 'aba_cookie_allow' );
		register_setting( 'aba_general_settings', 'aba_cookie_timeout' );
		
	}
	
	public function aba_settings_section_callback() { 
		?>
		<p>
			<?php _e( 'Change Ad Blocking Advisor settings.', 'ad-blocking-advisor' ); ?>
		</p>
		<?php
	}

	public function aba_settingsPage() {
	
		?>
		<div class="wrap">

			<h2><span class="dashicons dashicons-admin-users aba-icon"></span><?php echo esc_html( get_admin_page_title() ); ?> - v<?php echo AD_BLOCKING_ADVISOR_VER; ?></h2>
			
			<div class="aba-settings-wrapper">
				<div class="aba-settings-body">

					<form method="post" action="options.php">
						<?php

						settings_fields( 'aba_general_settings' );
						do_settings_sections( 'aba_general_settings' );
						
						submit_button();
						
						?>
					</form>
				</div> <!-- end aba-settings-body -->
				<div class="aba-donate-wrapper">
					<div class="aba-donate-body">
						<a href="https://obrienlabs.net"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/OBrienLabs-Logo-h75px.png' ?>" border="0"></a>
						Thank you for using Ad Blocking Advisor! 
						<h2>Need support?</h2>
						Visit the <a href="https://obrienlabs.net/ad-blocking-advisor-a-wordpress-plugin/" target="_blank">plugin homepage!</a> There is a FAQ, as well as the comments section which has some great tips. You can also leave a comment with your question and I'll try to help you out!
						<br><br>
						<hr>
						<h2>Please Donate!</h2>This plugin has taken a considerable amount of time and coffee to create. If you find this plugin valuable and would like to buy me a cup of coffee, please <a href="https://obrienlabs.net/donate" target="_blank">click here to donate</a>! Thanks!
					</div>
				</div> <!-- end aba-donate -->
			</div> <!-- end aba-wrapper -->
		
		</div>
			  
		<?php
	}
	
	public function enabled_settings() {
		
		$option = get_option( 'aba_enabled' );
				
		echo '
			<input type="checkbox" id="aba_enabled" name="aba_enabled" value="true" '. checked( $option, "true", false ) .' >
			<label for="aba_enabled"><span class="description">' . __( 'Default: checked (enabled)<br>Enable or disable displaying the notification banner. This is a quick way to turn the notification off temporarily without disabling the entire plugin.', 'ad-blocking-advisor' ) . '</span></label>
		';
	}
	
	public function notice_text() {
		
		$option = get_option( 'aba_notice_text' );
				
		echo '
			<textarea id="aba_notice_text" name="aba_notice_text">' . $option . '</textarea>
			<label for="aba_notice_text"><span class="description">' . __( 'Default: Please support this website by adding us to your whitelist in your ad blocker. Ads are what helps us bring you premium content! Thank you!<br>Change the text that\'s displayed in the notice banner. You can add &lt;a href=""&gt; links here, too.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}
	
	public function show_banner_dismiss_icon() {
		
		$option = get_option( 'aba_show_banner_dismiss_icon' );
				
		echo '
			<input type="checkbox" id="aba_show_banner_dismiss_icon" name="aba_show_banner_dismiss_icon" value="true" '. checked( $option, "true", false ) .' >
			<label for="aba_show_banner_dismiss_icon"><span class="description">' . __( 'Default: checked (enabled)<br>Enable or disable the ability for your visitors to close the Ad Blocking Advisor Banner bar. If this option is enabled, an "X" will appear allowing users to close the banner. If this option is disabled, no "X" will appear, and the banner will always show on your site.', 'ad-blocking-advisor' ) . '</span></label>
		';
	}
	
	public function show_banner_loggedin() {
		
		$option = get_option( 'aba_show_banner_loggedin' );
				
		echo '
			<input type="checkbox" id="aba_show_banner_loggedin" name="aba_show_banner_loggedin" value="true" '. checked( $option, "true", false ) .' >
			<label for="aba_show_banner_loggedin"><span class="description">' . __( 'Default: checked (enabled)<br>Enable or disable showing the banner for logged in users. If this option is enabled, the banner will show for logged in users. If this option is disabled, no banner will show for logged in users.', 'ad-blocking-advisor' ) . '</span></label>
		';
	}	
	
	public function div_location() {
		
		$option = get_option( 'aba_div_location' );
				
		echo '
			<input type="text" id="aba_div_location" name="aba_div_location" autocomplete="off" value="'. $option .'">
			<label for="aba_div_location"><span class="description">' . __( 'Default: body<br>The name of the element or DIV that you want to prepend the banner notification to. The banner will show ABOVE this element. By using the <code>body</code> location, the banner will show above all your content. This may not be the best place depending on your theme. Typical values are: <code>body</code> or <code>#content</code> or <code>.main-content</code>, but you can place it where you want.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}
	
	public function background_color() {
		
		$option = get_option( 'aba_background_color' );
				
		echo '
			<input type="text" id="aba_background_color" name="aba_background_color" autocomplete="off" value="'. $option .'">
			<label for="aba_background_color"><span class="description">' . __( 'Default: #C44<br>Change the background color for the notice banner.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}
	
	public function font_color() {
		
		$option = get_option( 'aba_font_color' );
				
		echo '
			<input type="text" id="aba_font_color" name="aba_font_color" autocomplete="off" value="'. $option .'">
			<label for="aba_font_color"><span class="description">' . __( 'Default: #FFF<br>Change the font color for the notice banner.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}
	
	public function font_size() {
		
		$option = get_option( 'aba_font_size' );
				
		echo '
			<input type="text" id="aba_font_size" name="aba_font_size" autocomplete="off" value="'. $option .'">
			<label for="aba_font_size"><span class="description">' . __( 'Default: 15<br>Change the font size. Numbers only.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}
	
	public function cookie_allow() {
		
		$option = get_option( 'aba_cookie_allow' );
				
		echo '
			<input type="checkbox" id="aba_cookie_allow" name="aba_cookie_allow" value="true" '. checked( $option, "true", false ) .' >
			<label for="aba_cookie_allow"><span class="description">' . __( 'Default: checked (enabled)<br>Enable or disable the ability to store a cookie on the visitors computer. The cookie contains the expiration value of hiding the banner.<br>Please ensure your local laws allow the storage of cookies on visitors computers.', 'ad-blocking-advisor' ) . '</span></label>
		';
	}
	
	public function cookie_timeout() {
		
		$option = get_option( 'aba_cookie_timeout' );
				
		echo '
			<input type="text" id="aba_cookie_timeout" name="aba_cookie_timeout" autocomplete="off" value="'. $option .'">
			<label for="aba_cookie_timeout"><span class="description">' . __( 'Default: 2<br>Change the expiration time (in days) for the saved cookie.<br>If a user clicks the "X" to close the banner, the banner will remain closed and hidden for the remaining value of the cookie. Numbers only specified in days.','ad-blocking-advisor' ) .'</a></span></label>
		';
	}	
		
	// Add settings link to the plugin page. 
	function aba_plugin_action_links( $links, $file ) {
		static $this_plugin;

		if ( !$this_plugin ) {
			$this_plugin = plugin_basename( __FILE__ );
		}
		
		if ( $file == $this_plugin ) {
			// The "page" query string value must be equal to the slug
			// of the Settings admin page we defined earlier, which in
			// this case equals "myplugin-settings".
			$settings_link = '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/options-general.php?page=aba-settings">Settings</a>';
			array_unshift( $links, $settings_link );
		}

		return $links;
	}

}

$aba = new Ad_Blocking_Advisor();

?>