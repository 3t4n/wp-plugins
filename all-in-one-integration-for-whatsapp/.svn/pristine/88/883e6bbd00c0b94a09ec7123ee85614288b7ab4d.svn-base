<?php	

require_once WAIO_WHATSAPP_PATH . 'includes/button.php';
if ( ! class_exists( 'Waiowhatsapphelp' ) ) {
	class Waiowhatsapphelp {

		public $waphone = 'test';

		public $watext = 'test';

		public static function waiowhatsapp_options_page() {
						add_settings_error(
				'myUniqueIdentifier',
				esc_attr( 'settings_updated' ),
				$message = 'Support the developer by purchasing the premium version of this plugin just for 5$ on <a href="https://www.hackforme.com/product/all-in-one-whatsapp-integration-plugin-for-wordpress/">HackForMe</a> get premium features such as woocommerce integration ,whatsapp share button ,many custom styles and lifetime custom support.'
			);
			?>
<div>
	
	<h2>Enter your Cell phone number</h2>
			<?php settings_errors(); ?>
	<form method="post" action="options.php">
  
			<?php settings_fields( 'mywhatsapp_options_group' ); ?>
  
		<h3>Please enter your mobile number for whatsapp Integration</h3>
  
		<p>please note that the mobile number should be entered along with the country code.</p>
  
		<table>
  
			<tr valign="top">
  
				<th scope="row"><label for="mywhatsapp_option_name">Phone number</label></th>
				<td>
					<input type="text" id="mywhatsapp_option_name" name="mywhatsapp_option_name" 
			 value="<?php echo esc_html( get_option( 'mywhatsapp_option_name' ) ); ?>" />
				</td>  
			</tr>
		
		</table>
	  <br />    <br />
		
		<table>
		
			<tr valign="top"><th scope="row"><label for="text">Text message</label></th>
		 
				<td> <input type="text" id="text" name="text" value="<?php echo esc_html( get_option( 'text' ) ); ?>"/> </td>
			  </tr> 
		</table>
			<?php echo esc_html( get_option( 'text' ) ); ?>
	  <br />    <br />
	  
		<strong>use this checkbox if you want whatsapp support icon for desktop and mobile users. </strong>
		
		<input name="floatingwhatsapp" type="checkbox" value="1" <?php checked( '1', get_option( 'floatingwhatsapp' ) ); ?>/>

		<br /><br />
		<strong>use this checkbox if you want whatsapp support icon to display only on Mobile Devices. </strong>

		<input name="onlyfloatmobile" type="checkbox" value="1" <?php checked( '1', get_option( 'onlyfloatmobile' ) ); ?>/>
	  <br />
			<?php
			wp_register_style( 'sharecss', plugins_url( 'assets/washare.css', dirname( __FILE__ ) ), array(), '6.66' );
			wp_register_style( 'logo', plugins_url( 'assets/fontawesome/css/font-awesome.min.css', dirname( __FILE__ ) ), array(), '6.66' );
			wp_enqueue_style( 'logo' );
			wp_enqueue_style( 'sharecss' );
			?>
	  
		<strong>
			<br />
			
			<table>
			
				<tr valign="top">
				
					<th scope="row"><label for="Waiowhatsapphelpbut">Button Text</label></th>
					
					<td>
						<h4>
						 use the shortcode [whatsapp] to display this button.
						</h4>
						<br />
						<input type="text" id="Waiowhatsapphelpbut" name="Waiowhatsapphelpbut" 
							   value="<?php echo esc_html( get_option( 'Waiowhatsapphelpbut' ) ); ?>" />
					</td>
				</tr>
			</table>
			<br />
			<br />
			<br />


			<?php submit_button(); ?>
  
	</form>

</div>
		<?php   
		
		}
		
		public function setprops() {
			$this->waphone = get_option( 'mywhatsapp_option_name' );
			$this->watext  = get_option( 'text' );
		}
	}
}
add_shortcode( 'whatsapp', array( 'whatsapphelpshortclass', 'shortbutton' ) );

if ( checked( '1', get_option( 'floatingwhatsapp' ), false ) ) {

	add_action( 'get_footer', array( 'waiowhatsappsupport', 'wabutton' ) );
}
if ( checked( '1', get_option( 'sharebutcss' ), false ) ) {
	if ( wp_is_mobile() ) {
		add_action( 'get_footer', array( 'waiowhatsappsupport', 'wabutton' ) );
	}
}
