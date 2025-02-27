<?php
/**
 *
 * @link              fastspring.com
 * @since             1.0.0
 * @package           fastspring
 *
 * @wordpress-plugin
 * Plugin Name:       FastSpring
 * Plugin URI:        FastSpring.com
 * Description:      The FastSpring WordPress Plugin is a tool that lets you integrate your FastSpring Store with your WordPress website.
 * Version:           3.0.1
 * Author:            FastSpring WordPress Team
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fastspring
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require plugin_dir_path( __FILE__ ) . 'includes/class-fastspring.php';

function run_fastspring() {
	$plugin = new fastspring();
	$plugin->run();
}
run_fastspring();

 function fastspring_settings_menu() {
$icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 560 700" style="enable-background:new 0 0 650 700;" xml:space="preserve">
<style type="text/css">
	.st0{}
</style>
		<path class="st0" d="M279.2,24.5c32.1,45.9,21,109.1-24.8,141.2L34.9,319.6L18.4,296c-32.2-45.8-21.1-109.1,24.8-141.2
			c0,0,0,0,0,0L262.6,0.9L279.2,24.5z M263.9,195.7L44.4,349.5c-45.9,32.1-57,95.4-24.8,141.2l16.6,23.6l219.4-153.8
			c45.9-32.1,57-95.4,24.8-141.2L263.9,195.7z M265.1,390.4L45.6,544.2c-45.9,32.1-57,95.4-24.8,141.2l16.6,23.6l219.4-153.8
			c45.9-32.1,57-95.4,24.8-141.2L265.1,390.4z"/>
</svg>');
	add_menu_page(
		'FastSpring Settings',
		'FastSpring Settings',
		'administrator',
		'fastspring_settings_menu',
		'fastspring_settings_display',
		$icon_url
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'General', 'fastspring' ),
		__( 'General', 'fastspring' ),
		'administrator',
		'fastspring_settings_general_settings',
		'fastspring_settings_display'
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Shopping Cart', 'fastspring' ),
		__( 'Shopping Cart', 'fastspring' ),
		'administrator',
		'fastspring_settings_shopping_cart_settings',
		function(){fastspring_settings_display( "shopping_cart_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Buy Button', 'fastspring' ),
		__( 'Buy Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_buy_button_settings',
		function(){fastspring_settings_display( "buy_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Remove from Cart Button', 'fastspring' ),
		__( 'Remove from Cart Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_remove_from_cart_button_settings',
		function(){fastspring_settings_display( "remove_from_cart_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'View Cart Button', 'fastspring' ),
		__( 'View Cart Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_view_cart_button_settings',
		function(){fastspring_settings_display( "view_cart_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Checkout Button', 'fastspring' ),
		__( 'Checkout Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_checkout_button_settings',
		function(){fastspring_settings_display( "checkout_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Cross-Sell Button', 'fastspring' ),
		__( 'Cross-Sell Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_cross_sell_button_settings',
		function(){fastspring_settings_display( "cross_sell_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Up-Sell Button', 'fastspring' ),
		__( 'Up-Sell Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_up_sell_button_settings',
		function(){fastspring_settings_display( "up_sell_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'EDS Buy Button', 'fastspring' ),
		__( 'EDS Buy Button', 'fastspring' ),
		'administrator',
		'fastspring_settings_eds_button_settings',
		function(){fastspring_settings_display( "eds_button_settings" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Nav Menu', 'fastspring' ),
		__( 'Nav Menu', 'fastspring' ),
		'administrator',
		'fastspring_settings_nav_menu',
		function(){fastspring_settings_display( "nav_menu" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Custom CSS', 'fastspring' ),
		__( 'Custom CSS', 'fastspring' ),
		'administrator',
		'fastspring_settings_custom_css',
		function(){fastspring_settings_display( "custom_css" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'Translations', 'fastspring' ),
		__( 'Translations', 'fastspring' ),
		'administrator',
		'fastspring_settings_translations',
		function(){fastspring_settings_display( "translations" );}
	);
	add_submenu_page(
		'fastspring_settings_menu',
		__( 'About', 'fastspring' ),
		__( 'About', 'fastspring' ),
		'administrator',
		'fastspring_settings_about',
		function(){fastspring_settings_display( "about" );}
	);
}
add_action( 'admin_menu', 'fastspring_settings_menu' );

function fastspring_settings_display( $active_tab = '' ) {
?>
	<div class="wrap">
		<?php
		$icon_url = 'data:image/svg+xml;base64,' . base64_encode('<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 	viewBox="0 0 560 700" style="enable-background:new 0 0 650 700;" xml:space="preserve">
			<style type="text/css">
				.st0{}
			</style>
			<path class="st0" d="M279.2,24.5c32.1,45.9,21,109.1-24.8,141.2L34.9,319.6L18.4,296c-32.2-45.8-21.1-109.1,24.8-141.2
			c0,0,0,0,0,0L262.6,0.9L279.2,24.5z M263.9,195.7L44.4,349.5c-45.9,32.1-57,95.4-24.8,141.2l16.6,23.6l219.4-153.8
			c45.9-32.1,57-95.4,24.8-141.2L263.9,195.7z M265.1,390.4L45.6,544.2c-45.9,32.1-57,95.4-24.8,141.2l16.6,23.6l219.4-153.8
			c45.9-32.1,57-95.4,24.8-141.2L265.1,390.4z"/>
		</svg>');
		wp_enqueue_style('fastspring_fontawesome', plugins_url('public/css/awesome.css', __FILE__) );
		wp_enqueue_style( 'fastspring_fontawesome' );
?>
		<h2><img src="<?php echo $icon_url;?>" style="height:30px;" /><?php _e( 'FastSpring Settings', 'fastspring' ); ?></h2>
		<?php settings_errors(); ?>
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'shopping_cart_settings' ) {
			$active_tab = 'shopping_cart_settings';
		} else if( $active_tab == 'buy_button_settings' ) {
			$active_tab = 'buy_button_settings';
		} else if( $active_tab == 'remove_from_cart_button_settings' ) {
			$active_tab = 'remove_from_cart_button_settings';
		} else if( $active_tab == 'view_cart_button_settings' ) {
			$active_tab = 'view_cart_button_settings';
		} else if( $active_tab == 'checkout_button_settings' ) {
			$active_tab = 'checkout_button_settings';
		} else if( $active_tab == 'cross_sell_button_settings' ) {
			$active_tab = 'cross_sell_button_settings';
		} else if( $active_tab == 'up_sell_button_settings' ) {
			$active_tab = 'up_sell_button_settings';
		} else if( $active_tab == 'eds_button_settings' ) {
			$active_tab = 'eds_button_settings';
		}  else if( $active_tab == 'nav_menu' ) {
			$active_tab = 'nav_menu';
		} else if( $active_tab == 'custom_css' ) {
			$active_tab = 'custom_css';
		} else if( $active_tab == 'translations' ) {
			$active_tab = 'translations';			
		} else if( $active_tab == 'about' ) {
			$active_tab = 'about';
		} else {
			$active_tab = 'general_settings';
		}
		?>
		<h2 class="nav-tab-wrapper">
			<a href="?page=fastspring_settings_general_settings" class="nav-tab <?php echo $active_tab == 'general_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_shopping_cart_settings" class="nav-tab <?php echo $active_tab == 'shopping_cart_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Shopping Cart', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_buy_button_settings" class="nav-tab <?php echo $active_tab == 'buy_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Buy Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_remove_from_cart_button_settings" class="nav-tab <?php echo $active_tab == 'remove_from_cart_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Remove from Cart Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_view_cart_button_settings" class="nav-tab <?php echo $active_tab == 'view_cart_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'View Cart Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_checkout_button_settings" class="nav-tab <?php echo $active_tab == 'checkout_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Checkout Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_cross_sell_button_settings" class="nav-tab <?php echo $active_tab == 'cross_sell_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Cross-Sell Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_up_sell_button_settings" class="nav-tab <?php echo $active_tab == 'up_sell_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Up-Sell Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_eds_button_settings" class="nav-tab <?php echo $active_tab == 'eds_button_settings' ? 'nav-tab-active' : ''; ?>"><?php _e( 'EDS Buy Button', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_nav_menu" class="nav-tab <?php echo $active_tab == 'nav_menu' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Nav Menu', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_custom_css" class="nav-tab <?php echo $active_tab == 'custom_css' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Custom CSS', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_translations" class="nav-tab <?php echo $active_tab == 'translations' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Translations', 'fastspring' ); ?></a>
			<a href="?page=fastspring_settings_about" class="nav-tab <?php echo $active_tab == 'about' ? 'nav-tab-active' : ''; ?>"><?php _e( 'About', 'fastspring' ); ?></a>
		</h2>
		<form method="post" action="options.php">
			<?php
				if( $active_tab == 'general_settings' ) {
					settings_fields( 'fastspring_settings_general_settings' );
					do_settings_sections( 'fastspring_settings_general_settings' );
				} elseif( $active_tab == 'shopping_cart_settings' ) {
					settings_fields( 'fastspring_settings_shopping_cart_settings' );
					do_settings_sections( 'fastspring_settings_shopping_cart_settings' );
				} elseif( $active_tab == 'buy_button_settings' ) {
					settings_fields( 'fastspring_settings_buy_button_settings' );
					do_settings_sections( 'fastspring_settings_buy_button_settings' );
				} elseif( $active_tab == 'remove_from_cart_button_settings' ) {
					settings_fields( 'fastspring_settings_remove_from_cart_button_settings' );
					do_settings_sections( 'fastspring_settings_remove_from_cart_button_settings' );
				} elseif( $active_tab == 'view_cart_button_settings' ) {
					settings_fields( 'fastspring_settings_view_cart_button_settings' );
					do_settings_sections( 'fastspring_settings_view_cart_button_settings' );
				} elseif( $active_tab == 'checkout_button_settings' ) {
					settings_fields( 'fastspring_settings_checkout_button_settings' );
					do_settings_sections( 'fastspring_settings_checkout_button_settings' );
				} elseif( $active_tab == 'cross_sell_button_settings' ) {
					settings_fields( 'fastspring_settings_cross_sell_button_settings' );
					do_settings_sections( 'fastspring_settings_cross_sell_button_settings' );
				} elseif( $active_tab == 'up_sell_button_settings' ) {
					settings_fields( 'fastspring_settings_up_sell_button_settings' );
					do_settings_sections( 'fastspring_settings_up_sell_button_settings' );
				} elseif( $active_tab == 'eds_button_settings' ) {
					settings_fields( 'fastspring_settings_eds_button_settings' );
					do_settings_sections( 'fastspring_settings_eds_button_settings' );
				} elseif( $active_tab == 'translations' ) {
					settings_fields( 'fastspring_settings_translations' );
					do_settings_sections( 'fastspring_settings_translations' );	
				} elseif( $active_tab == 'about' ) {
					settings_fields( 'fastspring_settings_about' );
					do_settings_sections( 'fastspring_settings_about' );
				} elseif( $active_tab == 'nav_menu' ) {
					settings_fields( 'fastspring_settings_nav_menu' );
					do_settings_sections( 'fastspring_settings_nav_menu' );
				} else {
					settings_fields( 'fastspring_settings_custom_css' );
					do_settings_sections( 'fastspring_settings_custom_css' );
				}
				if($active_tab != 'about' ) {
					submit_button();
					?>
					<script>
						(function( $ ) {
						    $(function() {
						        $( '.color-picker' ).wpColorPicker();
						    });
						})( jQuery );
					</script>
					<?php
				}
			?>
		</form>
	</div>
<?php
}

function fastspring_general_options_callback() {
	$fastspring_options = get_option('fastspring_settings_general_settings');
	$defaults = fastspring_settings_default_general_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_general_settings', $fastspring_options);
	?>
	<p>Configure which Storefront and Store Builder Library version will be used with your WordPress pages.</p>
	<div class="fastspring">
		<div class="row">
			<div class="col-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">StoreFront ID: </th>
							<td>
								<input type="text" name="fastspring_settings_general_settings[fastspring_storefront]" value="<?php echo $fastspring_options['fastspring_storefront']; ?>" class="regular-text">
								<br /><em>The <strong>data-storefront</strong> attribute for your FastSpring Popup Storefront, found in Dashboard</em>
							</td>
						</tr>
						<tr>
							<th scope="row">Builder URL: </th>
							<td>
								<input type="text" name="fastspring_settings_general_settings[fastspring_builder_url]" value="<?php echo $fastspring_options['fastspring_builder_url']; ?>" class="regular-text">
								<br /><em>The external URL of FastSpring's Store Builder Library JavaScript file, found in Dashboard</em>
							</td>
						</tr>
						<tr>
							<th scope="row">Load Font Awesome: </th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_general_settings[fastspring_loadfontawesome]' <?php checked( $fastspring_options['fastspring_loadfontawesome'], 'yes' ); ?> value='yes'>Yes</label></p>
								<p><label><input type='radio' name='fastspring_settings_general_settings[fastspring_loadfontawesome]' <?php checked( $fastspring_options['fastspring_loadfontawesome'], 'no' ); ?> value='no'>No</label></p>
								<p><em>Select "No" if your theme already includes FontAwesome.</em></p>
							</td>
						</tr>
						<tr>
							<th scope="row">Enable Google Analytics Decorate Callback: </th>
							<td>
								<p><label><input type="radio" name="fastspring_settings_general_settings[fastspring_enableGADecorate]" <?php checked( $fastspring_options['fastspring_enableGADecorate'], 'yes' ); ?> value="yes">Yes</label></p>
								<p><label><input type="radio" name="fastspring_settings_general_settings[fastspring_enableGADecorate]" <?php checked( $fastspring_options['fastspring_enableGADecorate'], 'no' ); ?> value="no">No</label></p>
								<p><em>You must have Google Analytics running on your website already for this to function.  This will not place Google Analytics on your site but will enable the FastSpring plugin to create the tracking link between your site and the FastSpring popup.</em></p>
							</td>
						</tr>
						<tr>
							<th scope="row">Enable Shopping Cart Translations: </th>
							<td>
								<p><label><input type="radio" name="fastspring_settings_general_settings[fastspring_translations]" <?php checked( $fastspring_options['fastspring_translations'], 'yes' ); ?> value="yes">Yes</label></p>
								<p><label><input type="radio" name="fastspring_settings_general_settings[fastspring_translations]" <?php checked( $fastspring_options['fastspring_translations'], 'no' ); ?> value="no">No</label></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-6">				
			</div>
		</div>
	</div>
	<?php
	fastspring_update_tracking();
}

function fastspring_settings_default_general_settings() {
	$defaults = array(
		'fastspring_storefront' => 'yourexamplestore.test.onfastspring.com/popup-yourexamplestore',
		'fastspring_builder_url' => 'https://d1f8f9xcsvx3ha.cloudfront.net/sbl/0.8.6/fastspring-builder.min.js',
		'fastspring_loadfontawesome' => 'yes',
		'fastspring_enableGADecorate' => 'no',
		'fastspring_translations' => 'no',
		'wisdom_registered_setting'=>1,
	);
	return apply_filters( 'fastspring_settings_default_general_settings', $defaults );
}

function fastspring_initialize_theme_options() {
	if( false == get_option( 'fastspring_settings_general_settings' ) ) {
		add_option( 'fastspring_settings_general_settings', apply_filters( 'fastspring_settings_default_general_settings', fastspring_settings_default_general_settings() ) );
	}
	add_settings_section(
		'general_settings_section',
		__( 'General Settings', 'fastspring' ),
		'fastspring_general_options_callback',
		'fastspring_settings_general_settings'
	);
	register_setting(
		'fastspring_settings_general_settings',
		'fastspring_settings_general_settings',
		'fastspring_settings_validate_general_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_theme_options' );

function fastspring_cartsettings_section_callback(  ) {
	?>
	<p>Customize the appearance and functionality of the shopping cart on your WordPress pages.  <em>Note: Shopping cart strings are now located on the Translations tab.</em> </p>
	<?php
		$fastspring_options = get_option( 'fastspring_settings_shopping_cart_settings');
		$defaults = fastspring_settings_default_shopping_cart_settings();
		$fastspring_options = array_merge($defaults, $fastspring_options);
		update_option('fastspring_settings_shopping_cart_settings', $fastspring_options);
	?>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">Shopping Cart Location</th>
							<td>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MOD' ); ?> value='fsb-MOD'>Modal Window
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MODSM' ); ?> value='fsb-MODSM'>Small Modal Window
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-LS' ); ?> value='fsb-LS'>Left Panel
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-RS' ); ?> value='fsb-RS'>Right Panel
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-BS' ); ?> value='fsb-BS'>Bottom Sheet
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MINI-TL' ); ?> value='fsb-MINI-TL'>Mini Top Left
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MINI-TR' ); ?> value='fsb-MINI-TR'>Mini Top Right
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MINI-BL' ); ?> value='fsb-MINI-BL'>Mini Bottom Left
								</label>
								</p>
								<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_cart_location]' <?php checked( $fastspring_options['fastspring_cart_location'], 'fsb-MINI-BR' ); ?> value='fsb-MINI-BR'>Mini Bottom Right
								</label>
								</p>
							</td>
						</tr>
						<tr>
							<th>
								Enable Mini Notification Box	
								<script>
									jQuery(document).ready(function(){
										jQuery("input[name$='fastspring_settings_shopping_cart_settings[fastspring_enablemini]']").click(function(){
										var radio_value = jQuery(this).val();
										if(radio_value=='yes') {
											jQuery(".minibox").show();
										}
										else if(radio_value=='no') {
											jQuery(".minibox").hide();
										}
										});
										jQuery('[name="fastspring_settings_shopping_cart_settings[fastspring_enablemini]"]:checked').trigger('click');
									});
								</script>
							</th>
							<td>
							<p>
								<label>
									<input  type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_enablemini]' <?php checked( $fastspring_options['fastspring_enablemini'], 'yes' ); ?> value='yes'>Yes
								</label>
							</p>
							<p>
								<label>
									<input id="minibox" type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_enablemini]' <?php checked( $fastspring_options['fastspring_enablemini'], 'no' ); ?> value='no' >No
								</label>
							</p>
						</td>
						</tr>
						<tr class="minibox">
							<th>
								Mini Notification Box Location	
							</th>
							<td>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationlocation]' <?php checked( $fastspring_options['fastspring_mininotificationlocation'], 'topleft' ); ?> value='topleft' >Top Left
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationlocation]' <?php checked( $fastspring_options['fastspring_mininotificationlocation'], 'topright' ); ?> value='topright'>Top Right
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationlocation]' <?php checked( $fastspring_options['fastspring_mininotificationlocation'], 'bottomright' ); ?> value='bottomright'>Bottom Right
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationlocation]' <?php checked( $fastspring_options['fastspring_mininotificationlocation'], 'bottomleft' ); ?> value='bottomleft'>Bottom Left
								</label>
							</p>					
						</td>
						</tr>
						<tr class="minibox">
							<th>
								Mini Notification Box Icon
							</th>
							<td>	
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'>
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'>
									<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'>
									<i class="fa fa-arrow-right" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'>
									<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'>
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationicon]' <?php checked( $fastspring_options['fastspring_mininotificationicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'>
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</label>
							</p>
						</td>
						</tr>
						<tr class="minibox">
							<th>
								Mini Notification Box Quantity Color'
							</th>
									<td>
							<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_mininotificationcolor]' value='<?php echo $fastspring_options['fastspring_mininotificationcolor'];?>' class="form-control color-picker">
						</td>
						</tr>
						<tr>
							<th>
								Shopping Cart Header Color
							</th>
									<td>
							<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_header_color]' value='<?php echo $fastspring_options['fastspring_header_color'];?>' class="form-control color-picker">
						</td>
						</tr>
						<tr>
							<th>
								Shopping Cart Header Text Color
							</th>
									<td>
							<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_header_text_color]' value='<?php echo $fastspring_options['fastspring_header_text_color'];?>' class="form-control color-picker">
						</td>
						</tr>
						<tr>
							<th>
								Free / You Save Text Color
							</th>
									<td>
							<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_free_text_color]' value='<?php echo $fastspring_options['fastspring_free_text_color'];?>' class="form-control color-picker">
						</td>
						</tr>
						<tr>
							<th>
								Show Coupon Entry Field
								<script>
									jQuery(document).ready(function(){
										jQuery("input[name$='fastspring_settings_shopping_cart_settings[fastspring_show_coupon]']").click(function(){
										var radio_value = jQuery(this).val();
										if(radio_value=='yes') {
											jQuery(".couponfields").show();
										}
										else if(radio_value=='no') {
											jQuery(".couponfields").hide();
										}
										});
										jQuery('[name="fastspring_settings_shopping_cart_settings[fastspring_show_coupon]"]:checked').trigger('click');
									});
								</script>
							</th>
							<td>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_show_coupon]' <?php checked( $fastspring_options['fastspring_show_coupon'], 'yes' ); ?> value='yes' checked>
									Yes
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_show_coupon]' <?php checked( $fastspring_options['fastspring_show_coupon'], 'no' ); ?> value='no'>
									No
								</label>
							</p>
						</td>
						</tr>
						<tr class="couponfields">
							<th>
								Apply Coupon Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_coupon_class]' value='<?php echo $fastspring_options['fastspring_coupon_class'];?>' class="regular-text">
							</td>
						</tr>
						<tr class="couponfields">
							<th>
								Apply Coupon Button Icon
							</th>																																	
							<td>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_apply_icon]' <?php checked( $fastspring_options['fastspring_apply_icon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'>
										<i class="fa fa-chevron-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_apply_icon]' <?php checked( $fastspring_options['fastspring_apply_icon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'>
										<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_apply_icon]' <?php checked( $fastspring_options['fastspring_apply_icon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'>
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_apply_icon]' <?php checked( $fastspring_options['fastspring_apply_icon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'>
										<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_apply_icon]' <?php checked( $fastspring_options['fastspring_apply_icon'], 'none' ); ?> value='none'>
										None
									</label>
								</p>
							</td>
						</tr>
						<tr>
							<th>
								Cart Item Delete Icon
							</th>
							<td>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-times' ); ?> value='fa fa-times'>
									<i class="fa fa-times" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-times-circle' ); ?> value='fa fa-times-circle'>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-trash' ); ?> value='fa fa-trash'>
									<i class="fa fa-trash" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-trash-alt' ); ?> value='fa fa-trash-alt'>
									<i class="fa fa-trash-alt" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-minus' ); ?> value='fa fa-minus'>
									<i class="fa fa-minus" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'fa fa-minus-circle' ); ?> value='fa fa-minus-circle'>
									<i class="fa fa-minus-circle" aria-hidden="true"></i>
								</label>
							</p>
							<p>
								<label>
									<input type='radio' name='fastspring_settings_shopping_cart_settings[fastspring_delete_icon]' <?php checked( $fastspring_options['fastspring_delete_icon'], 'none' ); ?> value='none'>
									 None - <em>Note: None will display the text Remove instead of an icon.</em>
								</label>
							</p>
						</td>
						</tr>
						<tr>
							<th>
								Cart Item Delete Icon Color
							</th>
							<td>
								<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_delete_iconcolor]' value='<?php echo $fastspring_options['fastspring_delete_iconcolor'];?>' class="form-control color-picker">
							</td>
						</tr>
						<tr>
							<th>
								Cart Item Delete Icon Color Hover
							</th>
							<td>
								<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_delete_iconcolorhover]' value='<?php echo $fastspring_options['fastspring_delete_iconcolorhover'];?>' class="form-control color-picker">
							</td>
						</tr>
						<tr>
							<th>
								Thank You Page URL
							</th>
							<td>
								<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_thankyou_page]' value='<?php echo $fastspring_options['fastspring_thankyou_page'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th>
								Thank You Page Redirect Parameter
							</th>
							<td>
								<input type='text' name='fastspring_settings_shopping_cart_settings[fastspring_thankyou_parameter]' value='<?php echo $fastspring_options['fastspring_thankyou_parameter'];?>' class="regular-text">
								<em>Note: This is for use with the thank you page url.  This will append the order reference with the parameter entered above.  For example if your thank you age is /mypage and the Thank You Page Redirect Parameter is orderID, after the purchase when the popup is closed, the customer will be redirected to /mypage?orderID=(Order Reference)</em>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>	
	</div>
	<?php
}

function fastspring_settings_default_shopping_cart_settings() {
	$defaults = array(
		'fastspring_cart_location' =>	'fsb-MOD',
		'fastspring_header' =>	'Shopping Cart',
		'fastspring_header_color' =>	'#28a745',
		'fastspring_header_text_color' =>	'#ffffff',
		'fastspring_show_coupon' => 'yes',
		'fastspring_coupon_label' => 'Have a promo code?',
		'fastspring_coupon_placeholder' => 'Coupon ID',
		'fastspring_coupon_class' => 'fastspring_btn fastspring_btn-success',
		'fastspring_coupon_text' => 'Apply',
		'fastspring_delete_icon' => 'fa fa-times',
		'fastspring_radio_color' => '#c0c0c0',
		'fastspring_radio_color_checked' => '#28a745',
		'fastspring_empty_cart' => 'Your cart is empty.',
		'fastspring_thankyou_page' => '/',
		'fastspring_thankyou_parameter' => 'orderID',
		'fastspring_enablemini' => 'yes',
		'fastspring_apply_icon' => 'none',
		'fastspring_mininotificationlocation' => 'bottomright',
		'fastspring_mininotificationicon' => 'fa fa-shopping-cart',
		'fastspring_mininotificationcolor' => '#ff0000',
		'fastspring_free_text_color' => '#28a745',
		'fastspring_delete_iconcolor' => '#000000',
		'fastspring_delete_iconcolorhover' => '#c0c0c0',
		'wisdom_registered_setting' => 1,
	);
	return apply_filters( 'fastspring_settings_default_shopping_cart_settings', $defaults );
}

function fastspring_initialize_shopping_cart_settings() {
	if( false == get_option( 'fastspring_settings_shopping_cart_settings' ) ) {
		add_option( 'fastspring_settings_shopping_cart_settings', apply_filters( 'fastspring_settings_default_shopping_cart_settings', fastspring_settings_default_shopping_cart_settings() ) );
	}
	add_settings_section(
		'shopping_cart_section',
		__( 'Shopping Cart Settings', 'fastspring' ),
		'fastspring_cartsettings_section_callback',
		'fastspring_settings_shopping_cart_settings'
	);
	register_setting(
		'fastspring_settings_shopping_cart_settings',
		'fastspring_settings_shopping_cart_settings',
		'fastspring_validate_shopping_cart_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_shopping_cart_settings' );

function fastspring_validate_shopping_cart_settings( $input ) {
	$output = array();
	foreach( $input as $key => $value ) {
		if( isset( $input[$key] ) ) {
			$output[$key] = strip_tags( stripslashes( $input[ $key ] ) );
		}
	}
	return apply_filters( 'fastspring_validate_shopping_cart_settings', $output, $input );
}

function fastspring_bbsettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_buy_button_settings' );
	$defaults = fastspring_settings_default_buy_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_buy_button_settings', $fastspring_options);
	?>
	<p>Customize the default appearance and behavior of "buy" buttons.  These settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly.</p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Default Buy Button Action
							</th>
							<td>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbaction]' <?php checked( $fastspring_options['fastspring_bbaction'], 'addtocart' ); ?> value='addtocart' checked>
										Add to Cart
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbaction]' <?php checked( $fastspring_options['fastspring_bbaction'], 'checkout' ); ?> value='checkout'>
										Checkout
									</label>
								</p>
							</td>
						</tr>
						<tr>
							<th>
								Default Buy Button Text
							</th>
							<td>
								<input type='text' name='fastspring_settings_buy_button_settings[fastspring_bbtext]' value='<?php echo $fastspring_options['fastspring_bbtext'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th>
								Default Buy Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_buy_button_settings[fastspring_bbclass]' value='<?php echo $fastspring_options['fastspring_bbclass'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th>
								Default Buy Button Icon
							</th>
							<td>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-plus' ); ?> value='fa fa-plus'>
										<i class="fa fa-plus" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-plus-circle' ); ?> value='fa fa-plus-circle'>
										<i class="fa fa-plus-circle" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'>
										<i class="fa fa-chevron-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'>
										<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'>
										<i class="fa fa-arrow-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'>
										<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'>
										<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'>
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbicon]' <?php checked( $fastspring_options['fastspring_bbicon'], 'none' ); ?> value='none'>
										None
									</label>
								</p>
							</td>
						</tr>
						<tr>
							<th>
								Default Buy Button Secondary Action
							</th>
							<td>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbsecondaryaction]' <?php checked( $fastspring_options['fastspring_bbsecondaryaction'], 'viewcart' ); ?> value='viewcart' checked>
										View Cart
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_buy_button_settings[fastspring_bbsecondaryaction]' <?php checked( $fastspring_options['fastspring_bbsecondaryaction'], 'removefromcart' ); ?> value='removefromcart'>
										Remove from Cart
									</label>
								</p>	
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php
}

function fastspring_settings_default_buy_button_settings() {
	$defaults = array(
		'fastspring_bbaction' => 'addtocart',
		'fastspring_bbclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_bbtext' => 'Add to Cart',
		'fastspring_bbicon' => 'fa fa-plus',
		'fastspring_bbsecondaryaction' => 'viewcart',
	);
	return apply_filters( 'fastspring_settings_default_buy_button_settings', $defaults );
}

function fastspring_initialize_buy_button_settings() {
	if( false == get_option( 'fastspring_settings_buy_button_settings' ) ) {
		add_option( 'fastspring_settings_buy_button_settings', apply_filters( 'fastspring_settings_default_buy_button_settings', fastspring_settings_default_buy_button_settings() ) );
	}
	add_settings_section(
		'buy_button_section',
		__( 'Buy Button Settings', 'fastspring' ),
		'fastspring_bbsettings_section_callback',
		'fastspring_settings_buy_button_settings'
	);
	register_setting(
		'fastspring_settings_buy_button_settings',
		'fastspring_settings_buy_button_settings',
		'fastspring_settings_validate_buy_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_buy_button_settings' );

function fastspring_rcsettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
	$defaults = fastspring_settings_default_remove_from_cart_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_remove_from_cart_button_settings', $fastspring_options);
	?>
	Customize the default appearance of "remove from cart" buttons.  For "remove from cart" buttons on your WordPress page, these default settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly. <br /><br /> For "remove from cart" buttons that appear inside the shopping cart, only the <strong>Default Remove from Cart Button Icon</strong> applies. The selected icon cannot be overridden by other means.  The text value of the shopping cart buttons has been moved to the Translations tab.</p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Default Remove from Cart Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcclass]' value='<?php echo $fastspring_options['fastspring_rcclass'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default Remove from Cart Button Text
							</th>
							<td>
								<input type='text' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rctext]' value='<?php echo $fastspring_options['fastspring_rctext'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default Remove from Cart Button Icon
							</th>
							<td>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-times' ); ?> value='fa fa-times'>
										<i class="fa fa-times" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-times-circle' ); ?> value='fa fa-times-circle'>
										<i class="fa fa-times-circle" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-trash' ); ?> value='fa fa-trash'>	
										<i class="fa fa-trash" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-trash-alt' ); ?> value='fa fa-trash-alt'>
										<i class="fa fa-trash-alt" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-minus' ); ?> value='fa fa-minus'>
										<i class="fa fa-minus" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-minus-circle' ); ?> value='fa fa-minus-circle'>
										<i class="fa fa-minus-circle" aria-hidden="true"></i>
									</label>
								</p>
								<p>
									<label>
										<input type='radio' name='fastspring_settings_remove_from_cart_button_settings[fastspring_rcicon]' <?php checked( $fastspring_options['fastspring_rcicon'], 'none' ); ?> value='none'>
										None
									</label>
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php	
}

function fastspring_settings_default_remove_from_cart_button_settings() {
	$defaults = array(
		'fastspring_rcclass' => 'fastspring_btn fastspring_btn-default',
		'fastspring_rctext' => 'Remove from cart',
		'fastspring_rcicon' => 'fa-times',
	);
	return apply_filters( 'fastspring_settings_default_remove_from_cart_button_settings', $defaults );
}

function fastspring_initialize_remove_from_cart_button_settings() {
	if( false == get_option( 'fastspring_settings_remove_from_cart_button_settings' ) ) {
		add_option( 'fastspring_settings_remove_from_cart_button_settings', apply_filters( 'fastspring_settings_default_remove_from_cart_button_settings', fastspring_settings_default_remove_from_cart_button_settings() ) );
	}
	add_settings_section(
		'remove_from_cart_section',
		__( 'Remove from Cart Button Settings', 'fastspring' ),
		'fastspring_rcsettings_section_callback',
		'fastspring_settings_remove_from_cart_button_settings'
	);
	register_setting(
		'fastspring_settings_remove_from_cart_button_settings',
		'fastspring_settings_remove_from_cart_button_settings',
		'fastspring_settings_validate_remove_from_cart_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_remove_from_cart_button_settings' );

function fastspring_vcsettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_view_cart_button_settings' );
	$defaults = fastspring_settings_default_view_cart_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_view_cart_button_settings', $fastspring_options);
	?>
	<p>Customize the default appearance and behavior of "view cart" buttons.  These default settings can be overridden when using the <strong>FastSpring Buy Buttons</strong> dialog or the <strong>FastSpring View Cart Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly.</p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Default View Cart Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_view_cart_button_settings[fastspring_vcclass]' value='<?php echo $fastspring_options['fastspring_vcclass']; ?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default View Cart Button Text
							</th>
							<td>
								<input type='text' name='fastspring_settings_view_cart_button_settings[fastspring_vctext]' value='<?php echo $fastspring_options['fastspring_vctext'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default View Cart Button Icon
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcicon]' <?php checked( $fastspring_options['fastspring_vcicon'], 'none' ); ?> value='none'>None</label></p>
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default View Cart Button Visibility
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcshowhide]' <?php checked( $fastspring_options['fastspring_vcshowhide'], 'show' ); ?> value='show'>Always show View Cart button</label></p>
								<p><label><input type='radio' name='fastspring_settings_view_cart_button_settings[fastspring_vcshowhide]' <?php checked( $fastspring_options['fastspring_vcshowhide'], 'hide' ); ?> value='hide'>Hide View Cart button when cart is empty</label></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php							
}

function fastspring_settings_default_view_cart_button_settings() {
	$defaults = array(
		'fastspring_vcclass' => 'fastspring_btn fastspring_btn-default',
		'fastspring_vctext' => 'View Cart',
		'fastspring_vcicon' => 'fa-chevron-right',
		'fastspring_vcshowhide' => 'show',
	);
	return apply_filters( 'fastspring_settings_default_view_cart_button_settings', $defaults );
}

function fastspring_initialize_view_cart_button_settings() {
	if( false == get_option( 'fastspring_settings_view_cart_button_settings' ) ) {
		add_option( 'fastspring_settings_view_cart_button_settings', apply_filters( 'fastspring_settings_default_view_cart_button_settings', fastspring_settings_default_view_cart_button_settings() ) );
	}
	add_settings_section(
		'view_cart_section',
		__( 'View Cart Button Settings', 'fastspring' ),
		'fastspring_vcsettings_section_callback',
		'fastspring_settings_view_cart_button_settings'
	);
	register_setting(
		'fastspring_settings_view_cart_button_settings',
		'fastspring_settings_view_cart_button_settings',
		'fastspring_settings_validate_view_cart_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_view_cart_button_settings' );

function fastspring_cosettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_checkout_button_settings' );
	$defaults = fastspring_settings_default_checkout_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_checkout_button_settings', $fastspring_options);
	?>
	<p>Customize the default appearance of "checkout" buttons.  These default settings can be overridden when using the <strong>FastSpring Checkout Buttons</strong> dialog, or by editing the <strong>Text</strong> tab of your WordPress page directly. The text value of the shopping cart buttons has been moved to the Translations tab.</p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Default Checkout Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_checkout_button_settings[fastspring_coclass]' value='<?php echo $fastspring_options['fastspring_coclass'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default Checkout Button Text
							</th>
							<td>
								<input type='text' name='fastspring_settings_checkout_button_settings[fastspring_cotext]' value='<?php echo $fastspring_options['fastspring_cotext'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Default Checkout Button Icon
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-lock' ); ?> value='fa fa-lock'><i class="fa fa-lock" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_checkout_button_settings[fastspring_coicon]' <?php checked( $fastspring_options['fastspring_coicon'], 'none' ); ?> value='none'>None</label></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>					
	<?php							
}

function fastspring_settings_default_checkout_button_settings() {
	$defaults = array(
		'fastspring_coclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_cotext' => 'Checkout',
		'fastspring_coicon' => 'fa-lock',
	);
	return apply_filters( 'fastspring_settings_default_checkout_button_settings', $defaults );
}

function fastspring_initialize_checkout_button_settings() {
	if( false == get_option( 'fastspring_settings_checkout_button_settings' ) ) {
		add_option( 'fastspring_settings_checkout_button_settings', apply_filters( 'fastspring_settings_default_checkout_button_settings', fastspring_settings_default_checkout_button_settings() ) );
	}
	add_settings_section(
		'checkout_section',
		__( 'Checkout Button Settings', 'fastspring' ),
		'fastspring_cosettings_section_callback',
		'fastspring_settings_checkout_button_settings'
	);
	register_setting(
		'fastspring_settings_checkout_button_settings',
		'fastspring_settings_checkout_button_settings',
		'fastspring_settings_validate_checkout_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_checkout_button_settings' );

function fastspring_xssettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_cross_sell_button_settings' );
	$defaults = fastspring_settings_default_cross_sell_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_cross_sell_button_settings', $fastspring_options);
	?>
	<p>Customize the appearance of "cross-sell" buttons that can appear inside the shopping cart.  These settings cannot be overridden by other means.   <em>Note: Shopping cart strings have moved to the Translations tab.</em></p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Cross-Sell Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_cross_sell_button_settings[fastspring_xsclass]' value='<?php if($fastspring_options['fastspring_xsclass']) {echo $fastspring_options['fastspring_xsclass'];} else {echo 'fastspring_btn fastspring_btn-success';}?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								Cross-Sell Button Icon
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-plus' ); ?> value='fa fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-plus-circle' ); ?> value='fa fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_cross_sell_button_settings[fastspring_xsicon]' <?php checked( $fastspring_options['fastspring_xsicon'], 'none' ); ?> value='none'>None</label></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>		
<?php						
}

function fastspring_settings_default_cross_sell_button_settings() {
	$defaults = array(
		'fastspring_xsclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_xstext' => 'Add to Order',
		'fastspring_xsicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_cross_sell_button_settings', $defaults );
}

function fastspring_initialize_cross_sell_button_settings() {
	if( false == get_option( 'fastspring_settings_cross_sell_button_settings' ) ) {
		add_option( 'fastspring_settings_cross_sell_button_settings', apply_filters( 'fastspring_settings_default_cross_sell_button_settings', fastspring_settings_default_cross_sell_button_settings() ) );
	}
	add_settings_section(
		'cross_sellt_section',
		__( 'Cross-Sell Button Settings', 'fastspring' ),
		'fastspring_xssettings_section_callback',
		'fastspring_settings_cross_sell_button_settings'
	);
	register_setting(
		'fastspring_settings_cross_sell_button_settings',
		'fastspring_settings_cross_sell_button_settings',
		'fastspring_settings_validate_cross_sell_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_cross_sell_button_settings' );

function fastspring_ussettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_up_sell_button_settings' );
	$defaults = fastspring_settings_default_up_sell_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_up_sell_button_settings', $fastspring_options);
	?>
	<p>Customize the appearance of "up-sell" buttons that can appear inside the shopping cart.  These settings cannot be overridden by other means.  <em>Note: Shopping cart strings have moved to the Translations tab.</em></p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								Up-Sell Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_up_sell_button_settings[fastspring_usclass]' value='<?php echo $fastspring_options['fastspring_usclass'];?>' class="regular-text">
							</td>	
						</tr>
						<tr>
							<th scope="row">
								Up-Sell Button Icon
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-plus' ); ?> value='fa fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-plus-circle' ); ?> value='fa fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_up_sell_button_settings[fastspring_usicon]' <?php checked( $fastspring_options['fastspring_usicon'], 'none' ); ?> value='none'>None</label></p>
							</td>	
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>		
<?php
}

function fastspring_settings_default_up_sell_button_settings() {
	$defaults = array(
		'fastspring_usclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_ustext' => 'Upgrade Now',
		'fastspring_usicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_up_sell_button_settings', $defaults );
}

function fastspring_initialize_up_sell_button_settings() {
	if( false == get_option( 'fastspring_settings_up_sell_button_settings' ) ) {
		add_option( 'fastspring_settings_up_sell_button_settings', apply_filters( 'fastspring_settings_default_up_sell_button_settings', fastspring_settings_default_up_sell_button_settings() ) );
	}
	add_settings_section(
		'up_sell_section',
		__( 'Up-Sell Button Settings', 'fastspring' ),
		'fastspring_ussettings_section_callback',
		'fastspring_settings_up_sell_button_settings'
	);
	register_setting(
		'fastspring_settings_up_sell_button_settings',
		'fastspring_settings_up_sell_button_settings',
		'fastspring_settings_validate_up_sell_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_up_sell_button_settings' );

function fastspring_edssettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_eds_button_settings' );
	$defaults = fastspring_settings_default_eds_button_settings();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_eds_button_settings', $fastspring_options);
	?>
	<p>Customize the appearance of the "EDS Buy" button that can appear inside the shopping cart.  These settings cannot be overriden by other means.  <em>Note: Shopping cart strings have moved to the Translations tab.</em></p>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-6">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row">
								EDS Buy Button Class
							</th>
							<td>
								<input type='text' name='fastspring_settings_eds_button_settings[fastspring_edsclass]' value='<?php echo $fastspring_options['fastspring_edsclass'];?>' class="regular-text">
							</td>
						</tr>
						<tr>
							<th scope="row">
								EDS Buy Button Icon
							</th>
							<td>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-plus' ); ?> value='fa fa-plus'><i class="fa fa-plus" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-plus-circle' ); ?> value='fa fa-plus-circle'><i class="fa fa-plus-circle" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'><i class="fa fa-chevron-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'><i class="fa fa-arrow-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'><i class="fa fa-shopping-basket" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'><i class="fa fa-shopping-cart" aria-hidden="true"></i></label></p>
								<p><label><input type='radio' name='fastspring_settings_eds_button_settings[fastspring_edsicon]' <?php checked( $fastspring_options['fastspring_edsicon'], 'none' ); ?> value='none'>None</label></p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>		
<?php
}

function fastspring_settings_default_eds_button_settings() {
	$defaults = array(
		'fastspring_edsclass' => 'fastspring_btn fastspring_btn-success',
		'fastspring_edstext' => 'Add to Order',
		'fastspring_edsicon' => 'fa-plus',
	);
	return apply_filters( 'fastspring_settings_default_eds_button_settings', $defaults );
}

function fastspring_initialize_eds_button_settings() {
	if( false == get_option( 'fastspring_settings_eds_button_settings' ) ) {
		add_option( 'fastspring_settings_eds_button_settings', apply_filters( 'fastspring_settings_default_eds_button_settings', fastspring_settings_default_eds_button_settings() ) );
	}
	add_settings_section(
		'eds_section',
		__( 'EDS Buy Button Settings', 'fastspring' ),
		'fastspring_edssettings_section_callback',
		'fastspring_settings_eds_button_settings'
	);
	register_setting(
		'fastspring_settings_eds_button_settings',
		'fastspring_settings_eds_button_settings',
		'fastspring_settings_validate_eds_button_settings'
	);
}
add_action( 'admin_init', 'fastspring_initialize_eds_button_settings' );

function fastspring_settings_default_nav_menu() {
	$defaults = array(
	);
	return apply_filters( 'fastspring_settings_default_nav_menu', $defaults );
}

function fastspring_initialize_nav_menu() {
	if( false == get_option( 'fastspring_settings_nav_menu' ) ) {
		add_option( 'fastspring_settings_nav_menu', apply_filters( 'fastspring_settings_default_nav_menu', fastspring_settings_default_nav_menu() ) );
	}
	add_settings_section(
		'nav_menu_section',
		__( 'View Cart Links', 'fastspring' ),
		'fastspring_nav_menu_callback',
		'fastspring_settings_nav_menu'
	);
	add_settings_field(
		'fastspring_storefront',
		__( 'Menu Items', 'fastspring' ),
		'fastspring_viewcartmenuitems',
		'fastspring_settings_nav_menu',
		'nav_menu_section'
	);
	add_settings_section(
		'nav_menu_checkout_section',
		__( 'Checkout Links', 'fastspring' ),
		'fastspring_nav_menu_checkout_callback',
		'fastspring_settings_nav_menu'
	);
	add_settings_field(
		'fastspring_storefront',
		__( 'Menu Items', 'fastspring' ),
		'fastspring_checkoutmenuitems',
		'fastspring_settings_nav_menu',
		'nav_menu_checkout_section'
	);
	register_setting(
		'fastspring_settings_nav_menu',
		'fastspring_settings_nav_menu',
		'fastspring_settings_validate_nav_menu'
	);
}
add_action( 'admin_init', 'fastspring_initialize_nav_menu' );

function fastspring_nav_menu_callback() {
	echo '<p>' . __( 'Select the desired functionality for nav menu items view cart link', 'fastspring' ) . '</p>';
}

function fastspring_nav_menu_checkout_callback() {
	echo '<p>' . __( 'Select the desired functionality for nav menu items checkout link.', 'fastspring' ) . '</p>';
}

 function fastspring_viewcartmenuitems() {
	$fastspring_options = get_option('fastspring_settings_nav_menu');
 	$locations = get_nav_menu_locations();
	foreach($locations as $key => $locationsitem) {
	  	?>
	  	<h2><?php echo $key ?></h2>
	  	<?php
		if(!$locationsitem) {
			echo 'There are no defined menus in use for the ' . $key . ' menu.<br />';
		} else {
			$menu = wp_get_nav_menu_object( $locationsitem );
			$menuitems = wp_get_nav_menu_items( $menu->name, array( 'order' => 'DESC' ) );
			$value = array();
			if (isset($fastspring_options['fastspring_viewcartmenuitems']) && ! empty($fastspring_options['fastspring_viewcartmenuitems'])) {
				$value = $fastspring_options['fastspring_viewcartmenuitems'];
			}
			foreach( $menuitems as $item ) {
				?>
				<input type="checkbox" value="<?php echo $item->ID;?>" id="<?php echo $item->ID;?>" name='fastspring_settings_nav_menu[fastspring_viewcartmenuitems][]' <?php if(in_array($item->ID, $value)) { echo ' checked';} ?> />
				<label for="<?php echo $item->ID;?>"><?php echo $item->title;?></label><br />
				<?php
			}
		}
	}
 }

 function fastspring_checkoutmenuitems() {
 	$fastspring_options = get_option('fastspring_settings_nav_menu');
 	$locations = get_nav_menu_locations();
	foreach($locations as $key => $locationsitem) {
	  	?>
	  	<h2><?php echo $key ?></h2>
	  	<?php
		if(!$locationsitem) {
			echo 'There are no defined menus in use for the ' . $key . ' menu.<br />';
		} else {
			$menu = wp_get_nav_menu_object( $locationsitem );
			$menuitems = wp_get_nav_menu_items( $menu->name, array( 'order' => 'DESC' ) );
			$value = array();
			if (isset($fastspring_options['fastspring_checkoutmenuitems']) && ! empty($fastspring_options['fastspring_checkoutmenuitems'])) {
				$value = $fastspring_options['fastspring_checkoutmenuitems'];
			}
			foreach( $menuitems as $item ) {
				?>
				<input type="checkbox" value="<?php echo $item->ID;?>" id="<?php echo $item->ID;?>" name='fastspring_settings_nav_menu[fastspring_checkoutmenuitems][]' <?php if(in_array($item->ID, $value)) { echo ' checked';} ?> />
				<label for="<?php echo $item->ID;?>"><?php echo $item->title;?></label><br />
				<?php
			}
		}
	}
 }
  
 function fastspring_about_section_callback(  ) {
	?>
	<p>The FastSpring WordPress Plugin is a tool that lets you integrate your FastSpring Store with your WordPress website. Using the plugin, you can dynamically display product information and a full shopping cart, and collect customer payments right on your site via your FastSpring Popup Storefront. The plugin lets you do all of this and more without having to manually create any code.<br /><br />The plugin accomplishes this by providing you with an easy-to-use interface for FastSpring's Store Builder Library (SBL). No technical expertise is required, but familiarity with WordPress and CSS are helpful when using the plugin. Users with basic knowledge of HTML and CSS will be able to further customize their solutions on the Text tab of their WordPress pages. <br /><br />For more information or suggestions please contact <a href="mailto:support@fastspring.com">support</a>.</p>
	<?php
	$allow_tracking = get_option( 'wisdom_allow_tracking' );
	if( empty( $plugin ) ) {
		$plugin = 'fastspring';
	}
	if( isset( $allow_tracking[$plugin] ) ) {  } else {
		
	?>
	<p>
		<p>Thank you for installing our plugin. We'd like your permission to track its usage on your site and subscribe you to our newsletter. We won't record any sensitive data, only information regarding the WordPress environment and plugin settings, which we will use to help us make improvements to the plugin. Tracking is completely optional.</p>
		<p>
			<a href="/wp-admin/plugins.php?plugin_status=all&amp;paged=1&amp;s&amp;plugin=fastspring&amp;plugin_action=yes&amp;marketing_optin=yes" class="button-secondary">Allow</a>
		</p>
	</p>
<?php
	}
}

function fastspring_settings_default_about() {
	$defaults = array(
	);
	return apply_filters( 'fastspring_settings_default_about', $defaults );
}

function fastspring_initialize_about() {
	if( false == get_option( 'fastspring_settings_about' ) ) {
		add_option( 'fastspring_settings_about', apply_filters( 'fastspring_settings_default_about', fastspring_settings_default_about() ) );
	}
	add_settings_section(
		'about_section',
		__( 'About', 'fastspring' ),
		'fastspring_about_section_callback',
		'fastspring_settings_about'
	);
}
add_action( 'admin_init', 'fastspring_initialize_about' );

function fastspring_csssettings_section_callback(  ) {
	echo '<p>' . __( 'If you have knowledge of CSS, you can optionally use custom CSS to modify the appearance of all of your WordPress pages.', 'fastspring' ) . '</p>';
	
}

function fastspring_settings_default_custom_css() {
	$defaults = array(
		'fastspring_cssclass' => '/*Add CSS here*/',
	);
	return apply_filters( 'fastspring_settings_default_custom_css', $defaults );
}

function fastspring_initialize_custom_css() {
	if( false == get_option( 'fastspring_settings_custom_css' ) ) {
		add_option( 'fastspring_settings_custom_css', apply_filters( 'fastspring_settings_default_custom_css', fastspring_settings_default_custom_css() ) );
	}
	add_settings_section(
		'custom_css_section',
		__( 'Custom CSS', 'fastspring' ),
		'fastspring_csssettings_section_callback',
		'fastspring_settings_custom_css'
	);
	add_settings_field(
		'fastspring_cssclass',
		__( 'Custom CSS', 'fastspring' ),
		'fastspring_cssclass_render',
		'fastspring_settings_custom_css',
		'custom_css_section'
	);
	register_setting(
		'fastspring_settings_custom_css',
		'fastspring_settings_custom_css',
		'fastspring_settings_validate_custom_css'
	);
}
add_action( 'admin_init', 'fastspring_initialize_custom_css' );

function fastspring_cssclass_render(  ) {
	$fastspring_options = get_option( 'fastspring_settings_custom_css' );
	?>
	<div class="col-md-6">
		<textarea  rows="20" style="width:90%;" name='fastspring_settings_custom_css[fastspring_cssclass]' class="regular-text"><?php echo $fastspring_options['fastspring_cssclass'];?></textarea>
	</div>
	<?php
}

function fastspring_translationssettings_section_callback(  ) {
	$fastspring_options = get_option( 'fastspring_settings_translations' );
	/*
	$defaults = fastspring_settings_default_translations();
	$fastspring_options = array_merge($defaults, $fastspring_options);
	update_option('fastspring_settings_translations', $fastspring_options);*/
	echo '<p>' . __( 'The FastSpring plugin shopping cart is localized into 16 languages.  You can optionally change the values of these translations below.  <em>Note: These translations only apply to the FastSpring plugin shopping cart.', 'fastspring' ) . '</p>';
	?>
	<script>
		jQuery(document).ready(function(){
			jQuery("select").change(function(){
				jQuery(this).find("option:selected").each(function(){
					var optionValue = jQuery(this).attr("value");
					if(optionValue){
						jQuery(".trans").not("." + optionValue).hide();
						jQuery("." + optionValue).show();
					} else{
						jQuery(".trans").hide();
					}
				});
			}).change();
		});
	</script>
	<div class="fastspring">
		<div class="row">
			<div class="col-md-12 col-xl-8 col-12">
				<label>Select Language: </label>
				<select name="language">
					<option value="en">English</option>
					<option value="da">Danish</option>
					<option value="de">German</option>
					<option value="es">Spanish</option>
					<option value="fi">Finnish</option>
					<option value="fr">French</option>
					<option value="hr">Croatian</option>
					<option value="it">Italian</option>
					<option value="ja">Japanese</option>
					<option value="ko">Korean</option>
					<option value="nl">Dutch</option>
					<option value="no">Norwegian</option>
					<option value="pt">Portuguese</option>
					<option value="ru">Russian</option>
					<option value="sv">Swedish</option>
					<option value="zh">Chinese</option>
				</select>
				<table class="form-table" role="presentation" border=1>
					<tbody>
						<tr>
							<td>
								<strong>Field</strong>
							</td>
							<td>
								<strong class="en trans">Default English Value</strong>
								<strong class="da trans">Default Danish Value</strong>	
								<strong class="de trans">Default German Value</strong>
								<strong class="es trans">Default Spanish Value</strong>
								<strong class="fi trans">	Default Finnish Value</strong>
								<strong class="fr trans">Default French Value</strong>
								<strong class="hr trans">Default Croatian Value</strong>
								<strong class="it trans">Default Italian Value</strong>
								<strong class="ja trans">Default Japanese Value</strong>
								<strong class="ko trans">Default Korean Value</strong>
								<strong class="nl trans">Default Dutch Value</strong>
								<strong class="no trans">Default Norwegian Value</strong>
								<strong class="pt trans">Default Portuguese Value</strong>
								<strong class="ru trans">Default Russian Value</strong>
								<strong class="sv trans">Default Swedish Value</strong>
								<strong class="zh trans">Default Chinese Value</strong>
								
							</td>
							<td>
								<strong class="en trans">English</strong>
								<strong class="da trans">Danish</strong>	
								<strong class="de trans">German</strong>
								<strong class="es trans">Spanish</strong>
								<strong class="fi trans">	Finnish</strong>
								<strong class="fr trans">French</strong>
								<strong class="hr trans">Croatian</strong>
								<strong class="it trans">Italian</strong>
								<strong class="ja trans">Japanese</strong>
								<strong class="ko trans">Korean</strong>
								<strong class="nl trans">Dutch</strong>
								<strong class="no trans">Norwegian</strong>
								<strong class="pt trans">Portuguese</strong>
								<strong class="ru trans">Russian</strong>
								<strong class="sv trans">Swedish</strong>
								<strong class="zh trans">Chinese</strong>
							</td>
						</tr>
						<tr>
							<td>
								Apply Coupon Button Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_applyCouponText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_en]" value="<?php echo $fastspring_options['fastspring_applyCouponText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_da]" value="<?php echo $fastspring_options['fastspring_applyCouponText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_de]" value="<?php echo $fastspring_options['fastspring_applyCouponText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_es]" value="<?php echo $fastspring_options['fastspring_applyCouponText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_fi]" value="<?php echo $fastspring_options['fastspring_applyCouponText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_fr]" value="<?php echo $fastspring_options['fastspring_applyCouponText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_hr]" value="<?php echo $fastspring_options['fastspring_applyCouponText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_it]" value="<?php echo $fastspring_options['fastspring_applyCouponText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_ja]" value="<?php echo $fastspring_options['fastspring_applyCouponText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_ko]" value="<?php echo $fastspring_options['fastspring_applyCouponText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_nl]" value="<?php echo $fastspring_options['fastspring_applyCouponText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_no]" value="<?php echo $fastspring_options['fastspring_applyCouponText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_pt]" value="<?php echo $fastspring_options['fastspring_applyCouponText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_ru]" value="<?php echo $fastspring_options['fastspring_applyCouponText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_sv]" value="<?php echo $fastspring_options['fastspring_applyCouponText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_applyCouponText_zh]" value="<?php echo $fastspring_options['fastspring_applyCouponText_zh'];?>" />
							</td>
						</tr>
						
						
						<tr>
							<td>
								Shopping Cart Header Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_cartTitleText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_en]" value="<?php echo $fastspring_options['fastspring_cartTitleText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_da]" value="<?php echo $fastspring_options['fastspring_cartTitleText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_de]" value="<?php echo $fastspring_options['fastspring_cartTitleText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_es]" value="<?php echo $fastspring_options['fastspring_cartTitleText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_fi]" value="<?php echo $fastspring_options['fastspring_cartTitleText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_fr]" value="<?php echo $fastspring_options['fastspring_cartTitleText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_hr]" value="<?php echo $fastspring_options['fastspring_cartTitleText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_it]" value="<?php echo $fastspring_options['fastspring_cartTitleText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_ja]" value="<?php echo $fastspring_options['fastspring_cartTitleText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_ko]" value="<?php echo $fastspring_options['fastspring_cartTitleText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_nl]" value="<?php echo $fastspring_options['fastspring_cartTitleText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_no]" value="<?php echo $fastspring_options['fastspring_cartTitleText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_pt]" value="<?php echo $fastspring_options['fastspring_cartTitleText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_ru]" value="<?php echo $fastspring_options['fastspring_cartTitleText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_sv]" value="<?php echo $fastspring_options['fastspring_cartTitleText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_cartTitleText_zh]" value="<?php echo $fastspring_options['fastspring_cartTitleText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Checkout Button Text	
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_checkoutText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_en]" value="<?php echo $fastspring_options['fastspring_checkoutText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_da]" value="<?php echo $fastspring_options['fastspring_checkoutText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_de]" value="<?php echo $fastspring_options['fastspring_checkoutText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_es]" value="<?php echo $fastspring_options['fastspring_checkoutText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_fi]" value="<?php echo $fastspring_options['fastspring_checkoutText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_fr]" value="<?php echo $fastspring_options['fastspring_checkoutText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_hr]" value="<?php echo $fastspring_options['fastspring_checkoutText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_it]" value="<?php echo $fastspring_options['fastspring_checkoutText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_ja]" value="<?php echo $fastspring_options['fastspring_checkoutText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_ko]" value="<?php echo $fastspring_options['fastspring_checkoutText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_nl]" value="<?php echo $fastspring_options['fastspring_checkoutText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_no]" value="<?php echo $fastspring_options['fastspring_checkoutText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_pt]" value="<?php echo $fastspring_options['fastspring_checkoutText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_ru]" value="<?php echo $fastspring_options['fastspring_checkoutText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_sv]" value="<?php echo $fastspring_options['fastspring_checkoutText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_checkoutText_zh]" value="<?php echo $fastspring_options['fastspring_checkoutText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Continue Shopping Button Text	
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_continueShoppingText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_en]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_da]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_de]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_es]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_fi]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_fr]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_hr]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_it]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_ja]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_ko]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_nl]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_no]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_pt]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_ru]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_sv]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_continueShoppingText_zh]" value="<?php echo $fastspring_options['fastspring_continueShoppingText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Coupon Field Label
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponLabelText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_en]" value="<?php echo $fastspring_options['fastspring_couponLabelText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_da]" value="<?php echo $fastspring_options['fastspring_couponLabelText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_de]" value="<?php echo $fastspring_options['fastspring_couponLabelText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_es]" value="<?php echo $fastspring_options['fastspring_couponLabelText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_fi]" value="<?php echo $fastspring_options['fastspring_couponLabelText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_fr]" value="<?php echo $fastspring_options['fastspring_couponLabelText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_hr]" value="<?php echo $fastspring_options['fastspring_couponLabelText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_it]" value="<?php echo $fastspring_options['fastspring_couponLabelText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_ja]" value="<?php echo $fastspring_options['fastspring_couponLabelText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_ko]" value="<?php echo $fastspring_options['fastspring_couponLabelText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_nl]" value="<?php echo $fastspring_options['fastspring_couponLabelText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_no]" value="<?php echo $fastspring_options['fastspring_couponLabelText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_pt]" value="<?php echo $fastspring_options['fastspring_couponLabelText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_ru]" value="<?php echo $fastspring_options['fastspring_couponLabelText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_sv]" value="<?php echo $fastspring_options['fastspring_couponLabelText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_couponLabelText_zh]" value="<?php echo $fastspring_options['fastspring_couponLabelText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Coupon Field Placeholder Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_couponPlaceholderText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_en]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_da]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_de]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_es]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_fi]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_fr]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_hr]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_it]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_ja]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_ko]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_nl]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_no]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_pt]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_ru]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_sv]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_couponPlaceholderText_zh]" value="<?php echo $fastspring_options['fastspring_couponPlaceholderText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Cross-Sell Button Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_en]" value="<?php echo $fastspring_options['fastspring_crossSellText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_da]" value="<?php echo $fastspring_options['fastspring_crossSellText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_de]" value="<?php echo $fastspring_options['fastspring_crossSellText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_es]" value="<?php echo $fastspring_options['fastspring_crossSellText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_fi]" value="<?php echo $fastspring_options['fastspring_crossSellText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_fr]" value="<?php echo $fastspring_options['fastspring_crossSellText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_hr]" value="<?php echo $fastspring_options['fastspring_crossSellText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_it]" value="<?php echo $fastspring_options['fastspring_crossSellText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_ja]" value="<?php echo $fastspring_options['fastspring_crossSellText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_ko]" value="<?php echo $fastspring_options['fastspring_crossSellText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_nl]" value="<?php echo $fastspring_options['fastspring_crossSellText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_no]" value="<?php echo $fastspring_options['fastspring_crossSellText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_pt]" value="<?php echo $fastspring_options['fastspring_crossSellText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_ru]" value="<?php echo $fastspring_options['fastspring_crossSellText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_sv]" value="<?php echo $fastspring_options['fastspring_crossSellText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellText_zh]" value="<?php echo $fastspring_options['fastspring_crossSellText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Cross-Sell Section Title
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_crossSellTitleText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_en]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_da]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_de]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_es]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_fi]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_fr]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_hr]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_it]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_ja]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_ko]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_nl]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_no]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_pt]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_ru]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_sv]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_crossSellTitleText_zh]" value="<?php echo $fastspring_options['fastspring_crossSellTitleText_zh'];?>" />
							</td>
						</tr>
						
						<tr>
							<td>
								Day
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_dayText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_en]" value="<?php echo $fastspring_options['fastspring_dayText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_da]" value="<?php echo $fastspring_options['fastspring_dayText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_de]" value="<?php echo $fastspring_options['fastspring_dayText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_es]" value="<?php echo $fastspring_options['fastspring_dayText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_fi]" value="<?php echo $fastspring_options['fastspring_dayText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_fr]" value="<?php echo $fastspring_options['fastspring_dayText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_hr]" value="<?php echo $fastspring_options['fastspring_dayText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_it]" value="<?php echo $fastspring_options['fastspring_dayText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_ja]" value="<?php echo $fastspring_options['fastspring_dayText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_ko]" value="<?php echo $fastspring_options['fastspring_dayText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_nl]" value="<?php echo $fastspring_options['fastspring_dayText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_no]" value="<?php echo $fastspring_options['fastspring_dayText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_pt]" value="<?php echo $fastspring_options['fastspring_dayText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_ru]" value="<?php echo $fastspring_options['fastspring_dayText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_sv]" value="<?php echo $fastspring_options['fastspring_dayText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_dayText_zh]" value="<?php echo $fastspring_options['fastspring_dayText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Days
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_daysText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_en]" value="<?php echo $fastspring_options['fastspring_daysText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_da]" value="<?php echo $fastspring_options['fastspring_daysText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_de]" value="<?php echo $fastspring_options['fastspring_daysText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_es]" value="<?php echo $fastspring_options['fastspring_daysText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_fi]" value="<?php echo $fastspring_options['fastspring_daysText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_fr]" value="<?php echo $fastspring_options['fastspring_daysText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_hr]" value="<?php echo $fastspring_options['fastspring_daysText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_it]" value="<?php echo $fastspring_options['fastspring_daysText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_ja]" value="<?php echo $fastspring_options['fastspring_daysText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_ko]" value="<?php echo $fastspring_options['fastspring_daysText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_nl]" value="<?php echo $fastspring_options['fastspring_daysText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_no]" value="<?php echo $fastspring_options['fastspring_daysText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_pt]" value="<?php echo $fastspring_options['fastspring_daysText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_ru]" value="<?php echo $fastspring_options['fastspring_daysText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_sv]" value="<?php echo $fastspring_options['fastspring_daysText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_daysText_zh]" value="<?php echo $fastspring_options['fastspring_daysText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								EDS Buy Button Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_edsText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_en]" value="<?php echo $fastspring_options['fastspring_edsText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_da]" value="<?php echo $fastspring_options['fastspring_edsText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_de]" value="<?php echo $fastspring_options['fastspring_edsText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_es]" value="<?php echo $fastspring_options['fastspring_edsText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_fi]" value="<?php echo $fastspring_options['fastspring_edsText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_fr]" value="<?php echo $fastspring_options['fastspring_edsText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_hr]" value="<?php echo $fastspring_options['fastspring_edsText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_it]" value="<?php echo $fastspring_options['fastspring_edsText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_ja]" value="<?php echo $fastspring_options['fastspring_edsText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_ko]" value="<?php echo $fastspring_options['fastspring_edsText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_nl]" value="<?php echo $fastspring_options['fastspring_edsText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_no]" value="<?php echo $fastspring_options['fastspring_edsText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_pt]" value="<?php echo $fastspring_options['fastspring_edsText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_ru]" value="<?php echo $fastspring_options['fastspring_edsText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_sv]" value="<?php echo $fastspring_options['fastspring_edsText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_edsText_zh]" value="<?php echo $fastspring_options['fastspring_edsText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Free
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_freeText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_en]" value="<?php echo $fastspring_options['fastspring_freeText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_da]" value="<?php echo $fastspring_options['fastspring_freeText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_de]" value="<?php echo $fastspring_options['fastspring_freeText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_es]" value="<?php echo $fastspring_options['fastspring_freeText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_fi]" value="<?php echo $fastspring_options['fastspring_freeText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_fr]" value="<?php echo $fastspring_options['fastspring_freeText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_hr]" value="<?php echo $fastspring_options['fastspring_freeText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_it]" value="<?php echo $fastspring_options['fastspring_freeText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_ja]" value="<?php echo $fastspring_options['fastspring_freeText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_ko]" value="<?php echo $fastspring_options['fastspring_freeText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_nl]" value="<?php echo $fastspring_options['fastspring_freeText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_no]" value="<?php echo $fastspring_options['fastspring_freeText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_pt]" value="<?php echo $fastspring_options['fastspring_freeText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_ru]" value="<?php echo $fastspring_options['fastspring_freeText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_sv]" value="<?php echo $fastspring_options['fastspring_freeText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_freeText_zh]" value="<?php echo $fastspring_options['fastspring_freeText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Month
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_en]" value="<?php echo $fastspring_options['fastspring_monthText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_da]" value="<?php echo $fastspring_options['fastspring_monthText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_de]" value="<?php echo $fastspring_options['fastspring_monthText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_es]" value="<?php echo $fastspring_options['fastspring_monthText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_fi]" value="<?php echo $fastspring_options['fastspring_monthText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_fr]" value="<?php echo $fastspring_options['fastspring_monthText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_hr]" value="<?php echo $fastspring_options['fastspring_monthText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_it]" value="<?php echo $fastspring_options['fastspring_monthText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_ja]" value="<?php echo $fastspring_options['fastspring_monthText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_ko]" value="<?php echo $fastspring_options['fastspring_monthText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_nl]" value="<?php echo $fastspring_options['fastspring_monthText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_no]" value="<?php echo $fastspring_options['fastspring_monthText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_pt]" value="<?php echo $fastspring_options['fastspring_monthText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_ru]" value="<?php echo $fastspring_options['fastspring_monthText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_sv]" value="<?php echo $fastspring_options['fastspring_monthText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_monthText_zh]" value="<?php echo $fastspring_options['fastspring_monthText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Months
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_monthsText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_en]" value="<?php echo $fastspring_options['fastspring_monthsText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_da]" value="<?php echo $fastspring_options['fastspring_monthsText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_de]" value="<?php echo $fastspring_options['fastspring_monthsText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_es]" value="<?php echo $fastspring_options['fastspring_monthsText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_fi]" value="<?php echo $fastspring_options['fastspring_monthsText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_fr]" value="<?php echo $fastspring_options['fastspring_monthsText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_hr]" value="<?php echo $fastspring_options['fastspring_monthsText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_it]" value="<?php echo $fastspring_options['fastspring_monthsText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_ja]" value="<?php echo $fastspring_options['fastspring_monthsText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_ko]" value="<?php echo $fastspring_options['fastspring_monthsText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_nl]" value="<?php echo $fastspring_options['fastspring_monthsText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_no]" value="<?php echo $fastspring_options['fastspring_monthsText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_pt]" value="<?php echo $fastspring_options['fastspring_monthsText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_ru]" value="<?php echo $fastspring_options['fastspring_monthsText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_sv]" value="<?php echo $fastspring_options['fastspring_monthsText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_monthsText_zh]" value="<?php echo $fastspring_options['fastspring_monthsText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Next Charge
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_nextChargeText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_en]" value="<?php echo $fastspring_options['fastspring_nextChargeText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_da]" value="<?php echo $fastspring_options['fastspring_nextChargeText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_de]" value="<?php echo $fastspring_options['fastspring_nextChargeText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_es]" value="<?php echo $fastspring_options['fastspring_nextChargeText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_fi]" value="<?php echo $fastspring_options['fastspring_nextChargeText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_fr]" value="<?php echo $fastspring_options['fastspring_nextChargeText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_hr]" value="<?php echo $fastspring_options['fastspring_nextChargeText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_it]" value="<?php echo $fastspring_options['fastspring_nextChargeText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_ja]" value="<?php echo $fastspring_options['fastspring_nextChargeText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_ko]" value="<?php echo $fastspring_options['fastspring_nextChargeText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_nl]" value="<?php echo $fastspring_options['fastspring_nextChargeText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_no]" value="<?php echo $fastspring_options['fastspring_nextChargeText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_pt]" value="<?php echo $fastspring_options['fastspring_nextChargeText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_ru]" value="<?php echo $fastspring_options['fastspring_nextChargeText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_sv]" value="<?php echo $fastspring_options['fastspring_nextChargeText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_nextChargeText_zh]" value="<?php echo $fastspring_options['fastspring_nextChargeText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								On
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_onText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_onText_en]" value="<?php echo $fastspring_options['fastspring_onText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_onText_da]" value="<?php echo $fastspring_options['fastspring_onText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_onText_de]" value="<?php echo $fastspring_options['fastspring_onText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_onText_es]" value="<?php echo $fastspring_options['fastspring_onText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_onText_fi]" value="<?php echo $fastspring_options['fastspring_onText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_onText_fr]" value="<?php echo $fastspring_options['fastspring_onText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_onText_hr]" value="<?php echo $fastspring_options['fastspring_onText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_onText_it]" value="<?php echo $fastspring_options['fastspring_onText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_onText_ja]" value="<?php echo $fastspring_options['fastspring_onText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_onText_ko]" value="<?php echo $fastspring_options['fastspring_onText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_onText_nl]" value="<?php echo $fastspring_options['fastspring_onText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_onText_no]" value="<?php echo $fastspring_options['fastspring_onText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_onText_pt]" value="<?php echo $fastspring_options['fastspring_onText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_onText_ru]" value="<?php echo $fastspring_options['fastspring_onText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_onText_sv]" value="<?php echo $fastspring_options['fastspring_onText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_onText_zh]" value="<?php echo $fastspring_options['fastspring_onText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Order Empty Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderEmptyText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_en]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_da]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_de]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_es]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_fi]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_fr]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_hr]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_it]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_ja]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_ko]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_nl]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_no]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_pt]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_ru]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_sv]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_orderEmptyText_zh]" value="<?php echo $fastspring_options['fastspring_orderEmptyText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Order Total
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_orderTotalText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_en]" value="<?php echo $fastspring_options['fastspring_orderTotalText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_da]" value="<?php echo $fastspring_options['fastspring_orderTotalText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_de]" value="<?php echo $fastspring_options['fastspring_orderTotalText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_es]" value="<?php echo $fastspring_options['fastspring_orderTotalText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_fi]" value="<?php echo $fastspring_options['fastspring_orderTotalText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_fr]" value="<?php echo $fastspring_options['fastspring_orderTotalText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_hr]" value="<?php echo $fastspring_options['fastspring_orderTotalText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_it]" value="<?php echo $fastspring_options['fastspring_orderTotalText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_ja]" value="<?php echo $fastspring_options['fastspring_orderTotalText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_ko]" value="<?php echo $fastspring_options['fastspring_orderTotalText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_nl]" value="<?php echo $fastspring_options['fastspring_orderTotalText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_no]" value="<?php echo $fastspring_options['fastspring_orderTotalText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_pt]" value="<?php echo $fastspring_options['fastspring_orderTotalText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_ru]" value="<?php echo $fastspring_options['fastspring_orderTotalText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_sv]" value="<?php echo $fastspring_options['fastspring_orderTotalText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_orderTotalText_zh]" value="<?php echo $fastspring_options['fastspring_orderTotalText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Remove
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_removeText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_en]" value="<?php echo $fastspring_options['fastspring_removeText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_da]" value="<?php echo $fastspring_options['fastspring_removeText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_de]" value="<?php echo $fastspring_options['fastspring_removeText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_es]" value="<?php echo $fastspring_options['fastspring_removeText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_fi]" value="<?php echo $fastspring_options['fastspring_removeText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_fr]" value="<?php echo $fastspring_options['fastspring_removeText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_hr]" value="<?php echo $fastspring_options['fastspring_removeText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_it]" value="<?php echo $fastspring_options['fastspring_removeText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_ja]" value="<?php echo $fastspring_options['fastspring_removeText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_ko]" value="<?php echo $fastspring_options['fastspring_removeText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_nl]" value="<?php echo $fastspring_options['fastspring_removeText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_no]" value="<?php echo $fastspring_options['fastspring_removeText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_pt]" value="<?php echo $fastspring_options['fastspring_removeText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_ru]" value="<?php echo $fastspring_options['fastspring_removeText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_sv]" value="<?php echo $fastspring_options['fastspring_removeText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_removeText_zh]" value="<?php echo $fastspring_options['fastspring_removeText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Renews Every
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsEveryText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_en]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_da]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_de]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_es]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_fi]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_fr]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_hr]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_it]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_ja]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_ko]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_nl]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_no]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_pt]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_ru]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_sv]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_renewsEveryText_zh]" value="<?php echo $fastspring_options['fastspring_renewsEveryText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Renews Automatically
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAutomaticallyText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_en]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_da]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_de]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_es]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_fi]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_fr]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_hr]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_it]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_ja]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_ko]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_nl]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_no]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_pt]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_ru]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_sv]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAutomaticallyText_zh]" value="<?php echo $fastspring_options['fastspring_renewsAutomaticallyText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Renews Along With Subscription
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_renewsAlongWithSubscriptionText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_en]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_da]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_de]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_es]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_fi]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_fr]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_hr]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_it]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_ja]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_ko]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_nl]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_no]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_pt]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_ru]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_sv]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_renewsAlongWithSubscriptionText_zh]" value="<?php echo $fastspring_options['fastspring_renewsAlongWithSubscriptionText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Shipping
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_shippingText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_en]" value="<?php echo $fastspring_options['fastspring_shippingText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_da]" value="<?php echo $fastspring_options['fastspring_shippingText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_de]" value="<?php echo $fastspring_options['fastspring_shippingText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_es]" value="<?php echo $fastspring_options['fastspring_shippingText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_fi]" value="<?php echo $fastspring_options['fastspring_shippingText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_fr]" value="<?php echo $fastspring_options['fastspring_shippingText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_hr]" value="<?php echo $fastspring_options['fastspring_shippingText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_it]" value="<?php echo $fastspring_options['fastspring_shippingText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_ja]" value="<?php echo $fastspring_options['fastspring_shippingText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_ko]" value="<?php echo $fastspring_options['fastspring_shippingText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_nl]" value="<?php echo $fastspring_options['fastspring_shippingText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_no]" value="<?php echo $fastspring_options['fastspring_shippingText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_pt]" value="<?php echo $fastspring_options['fastspring_shippingText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_ru]" value="<?php echo $fastspring_options['fastspring_shippingText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_sv]" value="<?php echo $fastspring_options['fastspring_shippingText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_shippingText_zh]" value="<?php echo $fastspring_options['fastspring_shippingText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Up-Sell Button Text
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_upSellText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_en]" value="<?php echo $fastspring_options['fastspring_upSellText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_da]" value="<?php echo $fastspring_options['fastspring_upSellText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_de]" value="<?php echo $fastspring_options['fastspring_upSellText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_es]" value="<?php echo $fastspring_options['fastspring_upSellText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_fi]" value="<?php echo $fastspring_options['fastspring_upSellText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_fr]" value="<?php echo $fastspring_options['fastspring_upSellText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_hr]" value="<?php echo $fastspring_options['fastspring_upSellText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_it]" value="<?php echo $fastspring_options['fastspring_upSellText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_ja]" value="<?php echo $fastspring_options['fastspring_upSellText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_ko]" value="<?php echo $fastspring_options['fastspring_upSellText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_nl]" value="<?php echo $fastspring_options['fastspring_upSellText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_no]" value="<?php echo $fastspring_options['fastspring_upSellText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_pt]" value="<?php echo $fastspring_options['fastspring_upSellText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_ru]" value="<?php echo $fastspring_options['fastspring_upSellText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_sv]" value="<?php echo $fastspring_options['fastspring_upSellText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_upSellText_zh]" value="<?php echo $fastspring_options['fastspring_upSellText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								View Details
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_viewDetailsText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_en]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_da]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_de]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_es]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_fi]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_fr]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_hr]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_it]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_ja]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_ko]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_nl]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_no]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_pt]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_ru]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_sv]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_viewDetailsText_zh]" value="<?php echo $fastspring_options['fastspring_viewDetailsText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Volume Discounts Available
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_volumeDiscountsAvailableText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_en]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_da]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_de]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_es]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_fi]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_fr]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_hr]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_it]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_ja]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_ko]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_nl]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_no]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_pt]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_ru]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_sv]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_volumeDiscountsAvailableText_zh]" value="<?php echo $fastspring_options['fastspring_volumeDiscountsAvailableText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Week
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weekText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_en]" value="<?php echo $fastspring_options['fastspring_weekText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_da]" value="<?php echo $fastspring_options['fastspring_weekText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_de]" value="<?php echo $fastspring_options['fastspring_weekText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_es]" value="<?php echo $fastspring_options['fastspring_weekText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_fi]" value="<?php echo $fastspring_options['fastspring_weekText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_fr]" value="<?php echo $fastspring_options['fastspring_weekText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_hr]" value="<?php echo $fastspring_options['fastspring_weekText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_it]" value="<?php echo $fastspring_options['fastspring_weekText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_ja]" value="<?php echo $fastspring_options['fastspring_weekText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_ko]" value="<?php echo $fastspring_options['fastspring_weekText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_nl]" value="<?php echo $fastspring_options['fastspring_weekText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_no]" value="<?php echo $fastspring_options['fastspring_weekText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_pt]" value="<?php echo $fastspring_options['fastspring_weekText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_ru]" value="<?php echo $fastspring_options['fastspring_weekText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_sv]" value="<?php echo $fastspring_options['fastspring_weekText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_weekText_zh]" value="<?php echo $fastspring_options['fastspring_weekText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Weeks
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_weeksText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_en]" value="<?php echo $fastspring_options['fastspring_weeksText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_da]" value="<?php echo $fastspring_options['fastspring_weeksText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_de]" value="<?php echo $fastspring_options['fastspring_weeksText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_es]" value="<?php echo $fastspring_options['fastspring_weeksText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_fi]" value="<?php echo $fastspring_options['fastspring_weeksText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_fr]" value="<?php echo $fastspring_options['fastspring_weeksText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_hr]" value="<?php echo $fastspring_options['fastspring_weeksText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_it]" value="<?php echo $fastspring_options['fastspring_weeksText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_ja]" value="<?php echo $fastspring_options['fastspring_weeksText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_ko]" value="<?php echo $fastspring_options['fastspring_weeksText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_nl]" value="<?php echo $fastspring_options['fastspring_weeksText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_no]" value="<?php echo $fastspring_options['fastspring_weeksText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_pt]" value="<?php echo $fastspring_options['fastspring_weeksText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_ru]" value="<?php echo $fastspring_options['fastspring_weeksText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_sv]" value="<?php echo $fastspring_options['fastspring_weeksText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_weeksText_zh]" value="<?php echo $fastspring_options['fastspring_weeksText_zh'];?>" />
							</td>
						</tr>
						<tr>
							<td>
								Year
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_en]" value="<?php echo $fastspring_options['fastspring_yearText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_da]" value="<?php echo $fastspring_options['fastspring_yearText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_de]" value="<?php echo $fastspring_options['fastspring_yearText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_es]" value="<?php echo $fastspring_options['fastspring_yearText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_fi]" value="<?php echo $fastspring_options['fastspring_yearText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_fr]" value="<?php echo $fastspring_options['fastspring_yearText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_hr]" value="<?php echo $fastspring_options['fastspring_yearText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_it]" value="<?php echo $fastspring_options['fastspring_yearText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_ja]" value="<?php echo $fastspring_options['fastspring_yearText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_ko]" value="<?php echo $fastspring_options['fastspring_yearText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_nl]" value="<?php echo $fastspring_options['fastspring_yearText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_no]" value="<?php echo $fastspring_options['fastspring_yearText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_pt]" value="<?php echo $fastspring_options['fastspring_yearText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_ru]" value="<?php echo $fastspring_options['fastspring_yearText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_sv]" value="<?php echo $fastspring_options['fastspring_yearText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_yearText_zh]" value="<?php echo $fastspring_options['fastspring_yearText_zh'];?>" />
							</td>
						</tr>		
						<tr>
							<td>
								Years
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_yearsText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_en]" value="<?php echo $fastspring_options['fastspring_yearsText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_da]" value="<?php echo $fastspring_options['fastspring_yearsText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_de]" value="<?php echo $fastspring_options['fastspring_yearsText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_es]" value="<?php echo $fastspring_options['fastspring_yearsText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_fi]" value="<?php echo $fastspring_options['fastspring_yearsText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_fr]" value="<?php echo $fastspring_options['fastspring_yearsText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_hr]" value="<?php echo $fastspring_options['fastspring_yearsText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_it]" value="<?php echo $fastspring_options['fastspring_yearsText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_ja]" value="<?php echo $fastspring_options['fastspring_yearsText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_ko]" value="<?php echo $fastspring_options['fastspring_yearsText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_nl]" value="<?php echo $fastspring_options['fastspring_yearsText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_no]" value="<?php echo $fastspring_options['fastspring_yearsText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_pt]" value="<?php echo $fastspring_options['fastspring_yearsText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_ru]" value="<?php echo $fastspring_options['fastspring_yearsText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_sv]" value="<?php echo $fastspring_options['fastspring_yearsText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_yearsText_zh]" value="<?php echo $fastspring_options['fastspring_yearsText_zh'];?>" />
							</td>
						</tr>	
						<tr>
							<td>
								You Save
							</td>
							<td>
								<span class="en trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_en']; ?></span>
								<span class="da trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_da']; ?></span>
								<span class="de trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_de']; ?></span>
								<span class="es trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_es']; ?></span>
								<span class="fi trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_fi']; ?></span>
								<span class="fr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_fr']; ?></span>
								<span class="hr trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_hr']; ?></span>
								<span class="it trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_it']; ?></span>
								<span class="ja trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_ja']; ?></span>
								<span class="ko trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_ko']; ?></span>
								<span class="nl trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_nl']; ?></span>
								<span class="no trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_no']; ?></span>
								<span class="pt trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_pt']; ?></span>
								<span class="ru trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_ru']; ?></span>
								<span class="sv trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_sv']; ?></span>
								<span class="zh trans"><?php echo $GLOBALS['translationDefaults']['fastspring_youSaveText_zh']; ?></span>
							</td>
							<td>
								<input type="text" class="en trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_en]" value="<?php echo $fastspring_options['fastspring_youSaveText_en'];?>" />
								<input type="text" class="da trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_da]" value="<?php echo $fastspring_options['fastspring_youSaveText_da'];?>" />
								<input type="text" class="de trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_de]" value="<?php echo $fastspring_options['fastspring_youSaveText_de'];?>" />
								<input type="text" class="es trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_es]" value="<?php echo $fastspring_options['fastspring_youSaveText_es'];?>" />
								<input type="text" class="fi trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_fi]" value="<?php echo $fastspring_options['fastspring_youSaveText_fi'];?>" />
								<input type="text" class="fr trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_fr]" value="<?php echo $fastspring_options['fastspring_youSaveText_fr'];?>" />
								<input type="text" class="hr trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_hr]" value="<?php echo $fastspring_options['fastspring_youSaveText_hr'];?>" />
								<input type="text" class="it trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_it]" value="<?php echo $fastspring_options['fastspring_youSaveText_it'];?>" />
								<input type="text" class="ja trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_ja]" value="<?php echo $fastspring_options['fastspring_youSaveText_ja'];?>" />
								<input type="text" class="ko trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_ko]" value="<?php echo $fastspring_options['fastspring_youSaveText_ko'];?>" />
								<input type="text" class="nl trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_nl]" value="<?php echo $fastspring_options['fastspring_youSaveText_nl'];?>" />
								<input type="text" class="no trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_no]" value="<?php echo $fastspring_options['fastspring_youSaveText_no'];?>" />
								<input type="text" class="pt trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_pt]" value="<?php echo $fastspring_options['fastspring_youSaveText_pt'];?>" />
								<input type="text" class="ru trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_ru]" value="<?php echo $fastspring_options['fastspring_youSaveText_ru'];?>" />
								<input type="text" class="sv trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_sv]" value="<?php echo $fastspring_options['fastspring_youSaveText_sv'];?>" />
								<input type="text" class="zh trans regular-text"  name="fastspring_settings_translations[fastspring_youSaveText_zh]" value="<?php echo $fastspring_options['fastspring_youSaveText_zh'];?>" />
							</td>
						</tr>		
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
}

$GLOBALS['translationDefaults'] = array(
		"fastspring_applyCouponText_en" => "Apply",
		"fastspring_cartTitleText_en" => "Shopping Cart",
		"fastspring_checkoutText_en" => "Checkout",
		"fastspring_continueShoppingText_en" => "Continue Shopping",
		"fastspring_couponLabelText_en" => "Enter Promotional Code",
		"fastspring_couponPlaceholderText_en" => "Coupon Code",
		"fastspring_crossSellText_en" => "Add to cart",
		"fastspring_crossSellTitleText_en" => "You may also be interested in...",
		"fastspring_dayText_en" => "day",
		"fastspring_daysText_en" => "days",
		"fastspring_edsText_en" => "Add to cart",
		"fastspring_freeText_en" => "Free",
		"fastspring_monthText_en" => "month",
		"fastspring_monthsText_en" => "months",
		"fastspring_nextChargeText_en" => "Next charge:",
		"fastspring_onText_en" => "on",
		"fastspring_orderEmptyText_en" => "Your Order Is Empty",
		"fastspring_orderTotalText_en" => "Total",
		"fastspring_removeText_en" => "Remove",
		"fastspring_renewsEveryText_en" => "Renews every  ",
		"fastspring_renewsAutomaticallyText_en" => "Renews automatically by the seller",
		"fastspring_renewsAlongWithSubscriptionText_en" => "Renews along with subscription",
		"fastspring_shippingText_en" => "Shipping:",
		"fastspring_upSellText_en" => "Upgrade",
		"fastspring_viewDetailsText_en" => "View Details",
		"fastspring_volumeDiscountsAvailableText_en" => "Volume Discounts Available",
		"fastspring_weekText_en" => "week",
		"fastspring_weeksText_en" => "weeks",
		"fastspring_yearText_en" => "year",
		"fastspring_yearsText_en" => "years",
		"fastspring_youSaveText_en" => "You Save",	
		"fastspring_applyCouponText_da" => "Anvend",
		"fastspring_cartTitleText_da" => "Indkøbskurv",
		"fastspring_checkoutText_da" => "Bestilling",
		"fastspring_continueShoppingText_da" => "Fortsætte med at handle",
		"fastspring_couponLabelText_da" => "Indtast kuponkode",
		"fastspring_couponPlaceholderText_da" => "Kuponkode",
		"fastspring_crossSellText_da" => "Tilføj til kurv",
		"fastspring_crossSellTitleText_da" => "Du kan også være interesseret i ...",
		"fastspring_dayText_da" => "dag",
		"fastspring_daysText_da" => "dage",
		"fastspring_edsText_da" => "Tilføj til kurv",
		"fastspring_freeText_da" => "Gratis",
		"fastspring_monthText_da" => "måned",
		"fastspring_monthsText_da" => "måned",
		"fastspring_nextChargeText_da" => "Næste opkrævning:",
		"fastspring_onText_da" => "d",
		"fastspring_orderEmptyText_da" => "Din ordre er tom",
		"fastspring_orderTotalText_da" => "Total",
		"fastspring_removeText_da" => "Fjern",
		"fastspring_renewsEveryText_da" => "Fornyer hver  ",
		"fastspring_renewsAutomaticallyText_da" => "Fornyes automatisk af forhandleren",
		"fastspring_renewsAlongWithSubscriptionText_da" => "Fornyer sammen med abonnement",
		"fastspring_shippingText_da" => "Forsendelse",
		"fastspring_upSellText_da" => "Opgrader",
		"fastspring_viewDetailsText_da" => "Vis detaljer",
		"fastspring_volumeDiscountsAvailableText_da" => "M\u00e6ngderabat tilg\u00e6ngelig",
		"fastspring_weekText_da" => "uge",
		"fastspring_weeksText_da" => "uger",
		"fastspring_yearText_da" => "år",
		"fastspring_yearsText_da" => "år",
		"fastspring_youSaveText_da" => "Du sparer",
		"fastspring_applyCouponText_de" => "Einlösen",
		"fastspring_cartTitleText_de" => "Einkaufswagen",
		"fastspring_checkoutText_de" => "Auschecken",
		"fastspring_continueShoppingText_de" => "Mit dem Einkaufen fortfahren",
		"fastspring_couponLabelText_de" => "Geben Sie einen Rabattcode ein",
		"fastspring_couponPlaceholderText_de" => "Rabattcode",
		"fastspring_crossSellText_de" => "In den Warenkorb legen",
		"fastspring_crossSellTitleText_de" => "Sie könnten auch interessiert sein an ...",
		"fastspring_dayText_de" => "Tag",
		"fastspring_daysText_de" => "Tage",
		"fastspring_edsText_de" => "In den Warenkorb legen",
		"fastspring_freeText_de" => "Kostenlos",
		"fastspring_monthText_de" => "Monat",
		"fastspring_monthsText_de" => "Monate",
		"fastspring_nextChargeText_de" => "Nächste Abbuchung:",
		"fastspring_onText_de" => "am",
		"fastspring_orderEmptyText_de" => "Ihre Bestellung ist leer",
		"fastspring_orderTotalText_de" => "Summe",
		"fastspring_removeText_de" => "Entfernen",
		"fastspring_renewsEveryText_de" => "Wird verlängert",
		"fastspring_renewsAutomaticallyText_de" => "Wird vom Verkäufer automatisch verlängert",
		"fastspring_renewsAlongWithSubscriptionText_de" => "Wird zusammen mit Abonnement erneuert",
		"fastspring_shippingText_de" => "Versand",
		"fastspring_upSellText_de" => "Aktualisierung",
		"fastspring_viewDetailsText_de" => "Details anzeigen",
		"fastspring_volumeDiscountsAvailableText_de" => "Mengenrabatte verf\u00fcgbar",
		"fastspring_weekText_de" => "Woche",
		"fastspring_weeksText_de" => "Wochen",
		"fastspring_yearText_de" => "Jahr",
		"fastspring_yearsText_de" => "Jahre",
		"fastspring_youSaveText_de" => "Sie sparen",
		"fastspring_applyCouponText_es" => "Aplicar",
		"fastspring_cartTitleText_es" => "Carrito de compras",
		"fastspring_checkoutText_es" => "Revisa",
		"fastspring_continueShoppingText_es" => "Seguir comprando",
		"fastspring_couponLabelText_es" => "Introducir Código promocional",
		"fastspring_couponPlaceholderText_es" => "Código promocional",
		"fastspring_crossSellText_es" => "Añadir al carrito",
		"fastspring_crossSellTitleText_es" => "Usted también podría estar interesado en...",
		"fastspring_dayText_es" => "día",
		"fastspring_daysText_es" => "días",
		"fastspring_edsText_es" => "Añadir al carrito",
		"fastspring_freeText_es" => "Gratis",
		"fastspring_monthText_es" => "mes",
		"fastspring_monthsText_es" => "meses",
		"fastspring_nextChargeText_es" => "Siguiente cargo:",
		"fastspring_onText_es" => "el",
		"fastspring_orderEmptyText_es" => "Su pedido está vacío",
		"fastspring_orderTotalText_es" => "Total",
		"fastspring_removeText_es" => "Eliminar",
		"fastspring_renewsEveryText_es" => "renueva cada  ",
		"fastspring_renewsAutomaticallyText_es" => "Renueva automáticamente por el vendedor",
		"fastspring_renewsAlongWithSubscriptionText_es" => "Renovaciones con la suscripción",
		"fastspring_shippingText_es" => "Envío",
		"fastspring_upSellText_es" => "Potenciar",
		"fastspring_viewDetailsText_es" => "Ver los detalles",
		"fastspring_volumeDiscountsAvailableText_es" => "Descuentos por volumen disponibles",
		"fastspring_weekText_es" => "semana",
		"fastspring_weeksText_es" => "semanas",
		"fastspring_yearText_es" => "año",
		"fastspring_yearsText_es" => "años",
		"fastspring_youSaveText_es" => "Usted Ahorra",
		"fastspring_applyCouponText_fi" => "Ota käyttöön",
		"fastspring_cartTitleText_fi" => "Ostoskärry",
		"fastspring_checkoutText_fi" => "Tarkista",
		"fastspring_continueShoppingText_fi" => "Jatka ostoksia",
		"fastspring_couponLabelText_fi" => "Anna kuponkikoodi",
		"fastspring_couponPlaceholderText_fi" => "Kuponkikoodi",
		"fastspring_crossSellText_fi" => "Lisää ostoskoriin",
		"fastspring_crossSellTitleText_fi" => "Saatat myös olla kiinnostunut ...",
		"fastspring_dayText_fi" => "päivä",
		"fastspring_daysText_fi" => "päivää",
		"fastspring_edsText_fi" => "Lisää ostoskoriin",
		"fastspring_freeText_fi" => "Ilmainen",
		"fastspring_monthText_fi" => "kuukausi",
		"fastspring_monthsText_fi" => "kuukautta",
		"fastspring_nextChargeText_fi" => "Seuraava maksu:",
		"fastspring_onText_fi" => "päivämääränä",
		"fastspring_orderEmptyText_fi" => "Tilauksesi on tyhjä",
		"fastspring_orderTotalText_fi" => "Loppusumma",
		"fastspring_removeText_fi" => "Poista",
		"fastspring_renewsEveryText_fi" => "Uusiutuu joka  ",
		"fastspring_renewsAutomaticallyText_fi" => "Myyjä uusii tilauksen automaattisesti",
		"fastspring_renewsAlongWithSubscriptionText_fi" => "Uusiutuu tilauksen ohella",
		"fastspring_shippingText_fi" => "Laivaus",
		"fastspring_upSellText_fi" => "Päivitys",
		"fastspring_viewDetailsText_fi" => "Näytä tiedot",
		"fastspring_volumeDiscountsAvailableText_fi" => "K\u00e4ytett\u00e4viss\u00e4 olevat paljousalennukset",
		"fastspring_weekText_fi" => "viikko",
		"fastspring_weeksText_fi" => "viikkoa",
		"fastspring_yearText_fi" => "vuosi",
		"fastspring_yearsText_fi" => "vuotta",
		"fastspring_youSaveText_fi" => "Säästät",
		"fastspring_applyCouponText_fr" => "Appliquer",
		"fastspring_cartTitleText_fr" => "Panier",
		"fastspring_checkoutText_fr" => "Check-out",
		"fastspring_continueShoppingText_fr" => "Continuer vos achats",
		"fastspring_couponLabelText_fr" => "Entrez le code promotionnel",
		"fastspring_couponPlaceholderText_fr" => "Code promotionnel",
		"fastspring_crossSellText_fr" => "Ajouter au chariot",
		"fastspring_crossSellTitleText_fr" => "Vous pourriez également être intéressé par ...",
		"fastspring_dayText_fr" => "jour",
		"fastspring_daysText_fr" => "jours",
		"fastspring_edsText_fr" => "Ajouter au chariot",
		"fastspring_freeText_fr" => "Gratuit",
		"fastspring_monthText_fr" => "mois",
		"fastspring_monthsText_fr" => "mois",
		"fastspring_nextChargeText_fr" => "Prochains frais:",
		"fastspring_onText_fr" => "le",
		"fastspring_orderEmptyText_fr" => "Il n'y a aucune commande",
		"fastspring_orderTotalText_fr" => "Total",
		"fastspring_removeText_fr" => "Supprimer",
		"fastspring_renewsEveryText_fr" => "Se renouvelle toutes les  ",
		"fastspring_renewsAutomaticallyText_fr" => "Se renouvelle automatiquement par le vendeur",
		"fastspring_renewsAlongWithSubscriptionText_fr" => "Renouveler avec une souscription",
		"fastspring_shippingText_fr" => "Livraison",
		"fastspring_upSellText_fr" => "Améliorer",
		"fastspring_viewDetailsText_fr" => "Voir les détails",
		"fastspring_volumeDiscountsAvailableText_fr" => "Remises sur gros volume disponibles",
		"fastspring_weekText_fr" => "semaine",
		"fastspring_weeksText_fr" => "semaines",
		"fastspring_yearText_fr" => "années",
		"fastspring_yearsText_fr" => "années",
		"fastspring_youSaveText_fr" => "Vous économisez",
		"fastspring_applyCouponText_hr" => "Primjeni postavke",
		"fastspring_cartTitleText_hr" => "Košarica",
		"fastspring_checkoutText_hr" => "Provjeri",
		"fastspring_continueShoppingText_hr" => "Nastaviti s kupovinom",
		"fastspring_couponLabelText_hr" => "Unesi Promotivni Kod",
		"fastspring_couponPlaceholderText_hr" => "Kod za Popust",
		"fastspring_crossSellText_hr" => "Dodaj u košaricu",
		"fastspring_crossSellTitleText_hr" => "Možda će vas zanimati i ...",
		"fastspring_dayText_hr" => "dan",
		"fastspring_daysText_hr" => "dana",
		"fastspring_edsText_hr" => "Dodaj u košaricu",
		"fastspring_freeText_hr" => "Besplatno",
		"fastspring_monthText_hr" => "mjesec",
		"fastspring_monthsText_hr" => "mjesečno",
		"fastspring_nextChargeText_hr" => "Slijedeća naplata:",
		"fastspring_onText_hr" => "Uključeno",
		"fastspring_orderEmptyText_hr" => "Vaša Narudžba je Prazna",
		"fastspring_orderTotalText_hr" => "Sveukupno",
		"fastspring_removeText_hr" => "Ukloni",
		"fastspring_renewsEveryText_hr" => "Obnavlja se svakih  ",
		"fastspring_renewsAutomaticallyText_hr" => "Renouvelle automatiquement par le vendeur",
		"fastspring_renewsAlongWithSubscriptionText_hr" => "Obnavlja se zajedno sa pretplatom",
		"fastspring_shippingText_hr" => "Dostava",
		"fastspring_upSellText_hr" => "Nadogradnja",
		"fastspring_viewDetailsText_hr" => "Pogledaj Detalje",
		"fastspring_volumeDiscountsAvailableText_hr" => "Koli\u010dinski Popusti su Dostupni",
		"fastspring_weekText_hr" => "tjedan",
		"fastspring_weeksText_hr" => "tjedno",
		"fastspring_yearText_hr" => "godina",
		"fastspring_yearsText_hr" => "godina",
		"fastspring_youSaveText_hr" => "Ušteda",
		"fastspring_applyCouponText_it" => "Applica",
		"fastspring_cartTitleText_it" => "Carrello della spesa",
		"fastspring_checkoutText_it" => "Check-out",
		"fastspring_continueShoppingText_it" => "Continua a fare acquisti",
		"fastspring_couponLabelText_it" => "Inserisci il codice coupon",
		"fastspring_couponPlaceholderText_it" => "Codice coupon",
		"fastspring_crossSellText_it" => "Aggiungi al carrello",
		"fastspring_crossSellTitleText_it" => "Potrebbe interessarti anche ...",
		"fastspring_dayText_it" => "giorno",
		"fastspring_daysText_it" => "giorni",
		"fastspring_edsText_it" => "Aggiungi al carrello",
		"fastspring_freeText_it" => "Gratuito",
		"fastspring_monthText_it" => "mese",
		"fastspring_monthsText_it" => "mesi",
		"fastspring_nextChargeText_it" => "Prossimo addebito:",
		"fastspring_onText_it" => "il",
		"fastspring_orderEmptyText_it" => "Il tuo ordine è vuoto",
		"fastspring_orderTotalText_it" => "Totale",
		"fastspring_removeText_it" => "Rimuovi",
		"fastspring_renewsEveryText_it" => "Si rinnova ogni  ",
		"fastspring_renewsAutomaticallyText_it" => "Si rinnova automaticamente dal venditore",
		"fastspring_renewsAlongWithSubscriptionText_it" => "Si rinnova insieme all'abbonamento",
		"fastspring_shippingText_it" => "Spedizione",
		"fastspring_upSellText_it" => "Aggiornamento",
		"fastspring_viewDetailsText_it" => "Visualizza dettagli",
		"fastspring_volumeDiscountsAvailableText_it" => "Disponibili sconti quantit\u00e0",
		"fastspring_weekText_it" => "settimana",
		"fastspring_weeksText_it" => "settimane",
		"fastspring_yearText_it" => "anno",
		"fastspring_yearsText_it" => "anni",
		"fastspring_youSaveText_it" => "Risparmi",
		"fastspring_applyCouponText_ja" => "適用",
		"fastspring_cartTitleText_ja" => "ショッピングカート",
		"fastspring_checkoutText_ja" => "チェックアウト",
		"fastspring_continueShoppingText_ja" => "ショッピングを続ける",
		"fastspring_couponLabelText_ja" => "プロモーション コードを入力",
		"fastspring_couponPlaceholderText_ja" => "プロモーション コード",
		"fastspring_crossSellText_ja" => "カートに追加",
		"fastspring_crossSellTitleText_ja" => "また興味があるかもしれません...",
		"fastspring_dayText_ja" => "日",
		"fastspring_daysText_ja" => "日",
		"fastspring_edsText_ja" => "カートに追加",
		"fastspring_freeText_ja" => "無料",
		"fastspring_monthText_ja" => "月",
		"fastspring_monthsText_ja" => "月",
		"fastspring_nextChargeText_ja" => "次回の課金:",
		"fastspring_onText_ja" => "で",
		"fastspring_orderEmptyText_ja" => "注文が空です",
		"fastspring_orderTotalText_ja" => "合計",
		"fastspring_removeText_ja" => "削除",
		"fastspring_renewsEveryText_ja" => "すべて更新  ",
		"fastspring_renewsAutomaticallyText_ja" => "販売者によって自動的に更新します。",
		"fastspring_renewsAlongWithSubscriptionText_ja" => "サブスクリプションに従い更新します",
		"fastspring_shippingText_ja" => "運送",
		"fastspring_upSellText_ja" => "アップグレード",
		"fastspring_viewDetailsText_ja" => "詳細を閲覧",
		"fastspring_volumeDiscountsAvailableText_ja" => "数量割引",
		"fastspring_weekText_ja" => "週",
		"fastspring_weeksText_ja" => "週",
		"fastspring_yearText_ja" => "年",
		"fastspring_yearsText_ja" => "年",
		"fastspring_youSaveText_ja" => "割引",
		"fastspring_applyCouponText_ko" => "적용하기",
		"fastspring_cartTitleText_ko" => "쇼핑 카트",
		"fastspring_checkoutText_ko" => "점검",
		"fastspring_continueShoppingText_ko" => "쇼핑을 계속",
		"fastspring_couponLabelText_ko" => "프로모션 코드 입력하기",
		"fastspring_couponPlaceholderText_ko" => "쿠폰 코드",
		"fastspring_crossSellText_ko" => "장바구니에 담기",
		"fastspring_crossSellTitleText_ko" => "당신은 또한 관심이있을 수 있습니다 ...",
		"fastspring_dayText_ko" => "일",
		"fastspring_daysText_ko" => "일",
		"fastspring_edsText_ko" => "장바구니에 담기",
		"fastspring_freeText_ko" => "무료",
		"fastspring_monthText_ko" => "개월",
		"fastspring_monthsText_ko" => "개월",
		"fastspring_nextChargeText_ko" => "다음 청구:",
		"fastspring_onText_ko" => "~에",
		"fastspring_orderEmptyText_ko" => "주문이 비어 있습니다",
		"fastspring_orderTotalText_ko" => "합계",
		"fastspring_removeText_ko" => "제거하기",
		"fastspring_renewsEveryText_ko" => "  마다 갱신",
		"fastspring_renewsAutomaticallyText_ko" => "판매자가 자동으로 갱신",
		"fastspring_renewsAlongWithSubscriptionText_ko" => "구독과 함께 갱신",
		"fastspring_shippingText_ko" => "배송",
		"fastspring_upSellText_ko" => "업그레이드",
		"fastspring_viewDetailsText_ko" => "세부 정보 보기",
		"fastspring_volumeDiscountsAvailableText_ko" => "대량 구매 할인 가능",
		"fastspring_weekText_ko" => "주",
		"fastspring_weeksText_ko" => "주",
		"fastspring_yearText_ko" => "년",
		"fastspring_yearsText_ko" => "년",
		"fastspring_youSaveText_ko" => "~을 절약합니다",
		"fastspring_applyCouponText_nl" => "Pas toe",
		"fastspring_cartTitleText_nl" => "Winkelwagen",
		"fastspring_checkoutText_nl" => "uitchecken",
		"fastspring_continueShoppingText_nl" => "Doorgaan met winkelen",
		"fastspring_couponLabelText_nl" => "Voer couponcode in",
		"fastspring_couponPlaceholderText_nl" => "Couponcode",
		"fastspring_crossSellText_nl" => "Voeg toe aan winkelwagen",
		"fastspring_crossSellTitleText_nl" => "Misschien ben je ook geïnteresseerd in ...",
		"fastspring_dayText_nl" => "dagen",
		"fastspring_daysText_nl" => "dagen",
		"fastspring_edsText_nl" => "Voeg toe aan winkelwagen",
		"fastspring_freeText_nl" => "Gratis",
		"fastspring_monthText_nl" => "maanden",
		"fastspring_monthsText_nl" => "maanden",
		"fastspring_nextChargeText_nl" => ":Volgende aanrekening_nl",
		"fastspring_onText_nl" => ":op",
		"fastspring_orderEmptyText_nl" => ":Uw bestelling is leeg",
		"fastspring_orderTotalText_nl" => ":Totaal",
		"fastspring_removeText_nl" => ":Verwijder",
		"fastspring_renewsEveryText_nl" => ":Hernieuwt elke",
		"fastspring_renewsAutomaticallyText_nl" => ":Hernieuwt automatisch door de verkoper",
		"fastspring_renewsAlongWithSubscriptionText_nl" => ":Vernieuwt samen met abonnement",
		"fastspring_shippingText_nl" => "scheepvaart",
		"fastspring_upSellText_nl" => "Upgrade",
		"fastspring_viewDetailsText_nl" => "Bekijk Details",
		"fastspring_volumeDiscountsAvailableText_nl" => "Volumekortingen beschikbaar",
		"fastspring_weekText_nl" => ":weken",
		"fastspring_weeksText_nl" => ":weken",
		"fastspring_yearText_nl" => ":jaren",
		"fastspring_yearsText_nl" => ":jaren",
		"fastspring_youSaveText_nl" => ":U bespaart",
		"fastspring_applyCouponText_no" => "Bruk",
		"fastspring_cartTitleText_no" => "Handlevogn",
		"fastspring_checkoutText_no" => "Sjekk ut",
		"fastspring_continueShoppingText_no" => "Fortsette å handle",
		"fastspring_couponLabelText_no" => "Oppgi kupongkode",
		"fastspring_couponPlaceholderText_no" => "Kupongkode",
		"fastspring_crossSellText_no" => "Legg i handlekurv",
		"fastspring_crossSellTitleText_no" => "Du kan også være interessert i ...",
		"fastspring_dayText_no" => "dag",
		"fastspring_daysText_no" => "dager",
		"fastspring_edsText_no" => "Legg i handlekurv",
		"fastspring_freeText_no" => "Gratis",
		"fastspring_monthText_no" => "måned",
		"fastspring_monthsText_no" => "måneder",
		"fastspring_nextChargeText_no" => ":Neste belastning_no",
		"fastspring_onText_no" => ":på",
		"fastspring_orderEmptyText_no" => ":Bestillingen din er tom",
		"fastspring_orderTotalText_no" => ":Sum",
		"fastspring_removeText_no" => ":Fjern",
		"fastspring_renewsEveryText_no" => ":Fornyes hver",
		"fastspring_renewsAutomaticallyText_no" => ":Fornyes automatisk av selger",
		"fastspring_renewsAlongWithSubscriptionText_no" => ":Fornyes samtidig som abonnement",
		"fastspring_shippingText_no" => "Shipping",
		"fastspring_upSellText_no" => "Oppgradering",
		"fastspring_viewDetailsText_no" => "Se detaljer",
		"fastspring_volumeDiscountsAvailableText_no" => "Mengderabatter tilgjengelig",
		"fastspring_weekText_no" => ":uke",
		"fastspring_weeksText_no" => ":uker",
		"fastspring_yearText_no" => ":år",
		"fastspring_yearsText_no" => ":år",
		"fastspring_youSaveText_no" => ":Du sparer",
		"fastspring_applyCouponText_pt" => "Usar",
		"fastspring_cartTitleText_pt" => "Carrinho de compras",
		"fastspring_checkoutText_pt" => "Verificação de saída",
		"fastspring_continueShoppingText_pt" => "Continue comprando",
		"fastspring_couponLabelText_pt" => "Inserir código do cupão",
		"fastspring_couponPlaceholderText_pt" => "Código do cupão",
		"fastspring_crossSellText_pt" => "Adicionar ao carrinho",
		"fastspring_crossSellTitleText_pt" => "Talvez você também esteja interessado em ...",
		"fastspring_dayText_pt" => "dia",
		"fastspring_daysText_pt" => "dias",
		"fastspring_edsText_pt" => "Adicionar ao carrinho",
		"fastspring_freeText_pt" => "Gratuito",
		"fastspring_monthText_pt" => "mês",
		"fastspring_monthsText_pt" => "meses",
		"fastspring_nextChargeText_pt" => "Próxima cobrança_pt",
		"fastspring_onText_pt" => "em",
		"fastspring_orderEmptyText_pt" => "O Seu Pedido Está Vazio",
		"fastspring_orderTotalText_pt" => "Total",
		"fastspring_removeText_pt" => "Remover",
		"fastspring_renewsEveryText_pt" => "Renova todas  ",
		"fastspring_renewsAutomaticallyText_pt" => "Renovação automática pelo vendedor",
		"fastspring_renewsAlongWithSubscriptionText_pt" => "Renova em conjunto com a subscrição",
		"fastspring_shippingText_pt" => "Remessa",
		"fastspring_upSellText_pt" => "Melhoria",
		"fastspring_viewDetailsText_pt" => "Ver Detalhes",
		"fastspring_volumeDiscountsAvailableText_pt" => "Descontos Dispon\u00edveis para Quantidades",
		"fastspring_weekText_pt" => "semana",
		"fastspring_weeksText_pt" => "semanas",
		"fastspring_yearText_pt" => "ano",
		"fastspring_yearsText_pt" => "anos",
		"fastspring_youSaveText_pt" => "Vai poupar",
		"fastspring_applyCouponText_ru" => "Применить",
		"fastspring_cartTitleText_ru" => "Корзина",
		"fastspring_checkoutText_ru" => "контроль",
		"fastspring_continueShoppingText_ru" => "Продолжить покупки",
		"fastspring_couponLabelText_ru" => "Введите код купона",
		"fastspring_couponPlaceholderText_ru" => "Код купона",
		"fastspring_crossSellText_ru" => "Добавить в корзину",
		"fastspring_crossSellTitleText_ru" => "Вы также можете быть заинтересованы в ...",
		"fastspring_dayText_ru" => "день",
		"fastspring_daysText_ru" => "дней",
		"fastspring_edsText_ru" => "Добавить в корзину",
		"fastspring_freeText_ru" => "Бесплатно",
		"fastspring_monthText_ru" => "месяц",
		"fastspring_monthsText_ru" => "месяцев",
		"fastspring_nextChargeText_ru" => "Следующая оплата:",
		"fastspring_onText_ru" => "на",
		"fastspring_orderEmptyText_ru" => "Ваш заказ пуст",
		"fastspring_orderTotalText_ru" => "Всего",
		"fastspring_removeText_ru" => "Удалить",
		"fastspring_renewsEveryText_ru" => "Возобновляется каждый  ",
		"fastspring_renewsAutomaticallyText_ru" => "Автоматически возобновляется продавцом",
		"fastspring_renewsAlongWithSubscriptionText_ru" => "Обновляется вместе с подпиской",
		"fastspring_shippingText_ru" => "Перевозка",
		"fastspring_upSellText_ru" => "Обновить",
		"fastspring_viewDetailsText_ru" => "Посмотреть детали",
		"fastspring_volumeDiscountsAvailableText_ru" => "Объем доступных скидок",
		"fastspring_weekText_ru" => "неделю",
		"fastspring_weeksText_ru" => "недель",
		"fastspring_yearText_ru" => "год",
		"fastspring_yearsText_ru" => "лет",
		"fastspring_youSaveText_ru" => "Вы экономите",
		"fastspring_applyCouponText_sv" => "Använd",
		"fastspring_cartTitleText_sv" => "Kundvagn",
		"fastspring_checkoutText_sv" => "Kassa",
		"fastspring_continueShoppingText_sv" => "Fortsätt handla",
		"fastspring_couponLabelText_sv" => "Ange rabattkod",
		"fastspring_couponPlaceholderText_sv" => "Rabattkod",
		"fastspring_crossSellText_sv" => "Lägg till i kundvagn",
		"fastspring_crossSellTitleText_sv" => "Du kanske också är intresserad av ...",
		"fastspring_dayText_sv" => "dag",
		"fastspring_daysText_sv" => "dagar",
		"fastspring_edsText_sv" => "Lägg till i kundvagn",
		"fastspring_freeText_sv" => "Gratis",
		"fastspring_monthText_sv" => "månad",
		"fastspring_monthsText_sv" => "månader",
		"fastspring_nextChargeText_sv" => "Nästa debitering:",
		"fastspring_onText_sv" => "på",
		"fastspring_orderEmptyText_sv" => "Din beställning innehåller inget",
		"fastspring_orderTotalText_sv" => "Totalsumma",
		"fastspring_removeText_sv" => "Ta bort",
		"fastspring_renewsEveryText_sv" => "Förnyas varje  ",
		"fastspring_renewsAutomaticallyText_sv" => "Förnyas automatiskt av säljaren",
		"fastspring_renewsAlongWithSubscriptionText_sv" => "Förnyas tillsammans med prenumeration",
		"fastspring_shippingText_sv" => "Frakt",
		"fastspring_upSellText_sv" => "Uppgradering",
		"fastspring_viewDetailsText_sv" => "Visa information",
		"fastspring_volumeDiscountsAvailableText_sv" => "M\u00e4ngdrabatt tillg\u00e4nglig",
		"fastspring_weekText_sv" => "vecka",
		"fastspring_weeksText_sv" => "veckor",
		"fastspring_yearText_sv" => "år",
		"fastspring_yearsText_sv" => "år",
		"fastspring_youSaveText_sv" => "Du sparar",
		"fastspring_applyCouponText_zh" => "应用",
		"fastspring_cartTitleText_zh" => "购物车",
		"fastspring_checkoutText_zh" => "查看",
		"fastspring_continueShoppingText_zh" => "继续购物",
		"fastspring_couponLabelText_zh" => "输入优惠码",
		"fastspring_couponPlaceholderText_zh" => "优惠码",
		"fastspring_crossSellText_zh" => "添加到购物车",
		"fastspring_crossSellTitleText_zh" => "您也可能对。。。有兴趣...",
		"fastspring_dayText_zh" => "天",
		"fastspring_daysText_zh" => "天",
		"fastspring_edsText_zh" => "添加到购物车",
		"fastspring_freeText_zh" => "免费",
		"fastspring_monthText_zh" => "月",
		"fastspring_monthsText_zh" => "月",
		"fastspring_nextChargeText_zh" => "下一个收费：",
		"fastspring_onText_zh" => "开",
		"fastspring_orderEmptyText_zh" => "您的订单是空的",
		"fastspring_orderTotalText_zh" => "总计",
		"fastspring_removeText_zh" => "移除",
		"fastspring_renewsEveryText_zh" => "每   更新",
		"fastspring_renewsAutomaticallyText_zh" => "卖家进行自动更新",
		"fastspring_renewsAlongWithSubscriptionText_zh" => "随订阅进行更新",
		"fastspring_shippingText_zh" => "运输",
		"fastspring_upSellText_zh" => "升级",
		"fastspring_viewDetailsText_zh" => "查看详情",
		"fastspring_volumeDiscountsAvailableText_zh" => "批量折扣可用",
		"fastspring_weekText_zh" => "周",
		"fastspring_weeksText_zh" => "周",
		"fastspring_yearText_zh" => "年",
		"fastspring_yearsText_zh" => "年",
		"fastspring_youSaveText_zh" => "您节省",
	);

function fastspring_settings_default_translations() {
	$defaults = $GLOBALS['translationDefaults'];
	return apply_filters( 'fastspring_settings_default_translations', $defaults );
}

function fastspring_initialize_translations() {
	if( false == get_option( 'fastspring_settings_translations' ) ) {
		add_option( 'fastspring_settings_translations', apply_filters( 'fastspring_settings_default_translations', fastspring_settings_default_translations() ) );
	}
	add_settings_section(
		'translations_section',
		__( 'Translations', 'fastspring' ),
		'fastspring_translationssettings_section_callback',
		'fastspring_settings_translations'
	);
	register_setting(
		'fastspring_settings_translations',
		'fastspring_settings_translations',
		'fastspring_settings_validate_translations'
	);
}

add_action( 'admin_init', 'fastspring_initialize_translations' );
add_action( 'media_buttons', 'fastspring_buttons' );

function fastspring_buttons() {
	add_thickbox();
	?>
	<style>
		#TB_ajaxContent {
			/*min-width: 100% !important;*/
			width: auto !important;
			height: calc(95% - 29px) !important;
			overflow-y: scroll;
		}
		#TB_ajaxContent input[type=radio]{
			position: relative !important;
		}
	</style>
	<a href="#TB_inline?width=600&height=550&inlineId=buybutton" class="thickbox button" title="FastSpring Buy Buttons">FastSpring Buy Buttons</a>
	<a href="#TB_inline?width=600&height=550&inlineId=prodattrib" class="thickbox button" title="FastSpring Product Attributes">FastSpring Product Attributes</a>
	<a href="#TB_inline?width=600&height=550&inlineId=viewcart" class="thickbox button" title="FastSpring View Cart Buttons">FastSpring View Cart Buttons</a>
	<a href="#TB_inline?width=600&height=550&inlineId=checkout" class="thickbox button" title="FastSpring Checkout Buttons">FastSpring Checkout Buttons</a>
	<?php
	$fastspring_settings_general_settings = get_option( 'fastspring_settings_general_settings' );
	$fastspring_settings_shopping_cart_settings = get_option('fastspring_settings_shopping_cart_settings');
	$fastspring_settings_buy_button_settings = get_option('fastspring_settings_buy_button_settings');
	$fastspring_settings_remove_from_cart_button_settings = get_option('fastspring_settings_remove_from_cart_button_settings');
	$fastspring_settings_view_cart_button_settings = get_option('fastspring_settings_view_cart_button_settings');
	$fastspring_settings_checkout_button_settings = get_option('fastspring_settings_checkout_button_settings');
	$fastspring_settings_cross_sell_button_settings = get_option('fastspring_settings_cross_sell_button_settings');
	$fastspring_settings_up_sell_button_settings = get_option('fastspring_settings_up_sell_button_settings');
	$fastspring_settings_eds_button_settings = get_option('fastspring_settings_eds_button_settings');
	$fastspring_settings_custom_css = get_option('fastspring_settings_custom_css');
	$fastspring_options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css);
	add_filter( 'script_loader_tag', 'fastspring_add_id_to_script', 10, 3 );
	wp_register_style( 'fastspringawesome.min', plugins_url('public/css/awesome.css', __FILE__) );
	wp_enqueue_style('fastspringawesome.min');
	wp_register_script( 'fastspringapi', $fastspring_options['fastspring_builder_url']);
	wp_enqueue_script('fastspringapi');
	?>
	<div id="checkout" class="fastspring" style="display:none;">
		<p>
			<div id="fastspringco" class="fastspring" style="margin: 20px;">
				<form>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<label>Checkout Button Text</label>
							<input id="co_text" name="co_text" type="text" value="<?php echo $fastspring_options['fastspring_cotext']; ?>" class="form-control" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<label>Checkout Button Class</label>
							<input id="co_class" name="co_class" type="text" value="<?php echo $fastspring_options['fastspring_coclass']; ?>" class="form-control" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">
									<label for="checkout">Checkout Button Icon</label><br />
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-lock' ); ?> value='fa fa-lock'> <i class="fa fa-lock" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'> <i class="fa fa-chevron-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'> <i class="fa fa-arrow-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='coicon' <?php checked( $fastspring_options['fastspring_coicon'], 'none' ); ?> value='none'> None
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-12">
							<button id="" class="fastspring_btn fastspring_btn-primary" onclick="insertcheckout(event);" >Add Checkout Button</button>
						</div>
					</div>
				</form>
			</div>
		</p>
	</div>
	<div id="viewcart" style="display:none;">
		<p>
			<div id="fastspringvc" class="fastspring" style="margin: 20px;">
				<form>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<label>View Cart Button Text</label>
							<input id="vc_text" name="vc_text" type="text" value="<?php echo $fastspring_options['fastspring_vctext']; ?>" class="form-control" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
						<label>View Cart Button Class</label>
						<input id="vc_class" name="vc_class" type="text" value="<?php echo $fastspring_options['fastspring_vcclass']; ?>" class="form-control" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">
									<label for="checkout">View Cart Button Icon</label><br />
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-lock' ); ?> value='fa fa-lock'> <i class="fa fa-lock" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-right' ); ?> value='fa fa-chevron-right'> <i class="fa fa-chevron-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-circle-right' ); ?> value='fa fa-chevron-circle-right'> <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-right' ); ?> value='fa fa-arrow-right'> <i class="fa fa-arrow-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-circle-right' ); ?> value='fa fa-arrow-circle-right'> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-basket' ); ?> value='fa fa-shopping-basket'> <i class="fa fa-shopping-basket" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-cart' ); ?> value='fa fa-shopping-cart'> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type='radio' name='vcicon' <?php checked( $fastspring_options['fastspring_vcicon'], 'none' ); ?> value='none'> None
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-sm-12">
							<button id="" class="fastspring_btn fastspring_btn-primary" onclick="insertviewcart(event);" >Add View Cart Button</button>
						</div>
					</div>
				</form>
			</div>
		</p>
	</div>
	<div id="buybutton" style="display:none;">
		<p>
			<div id="fastspringbb" class="fastspring" style="margin: 20px;">
				<form>
					<div class="row form-group mt-3">
						<div class="col-6">
							<div class="row">
								<div class="col-12">
									<label for="checkout">Button Action</label><br />
								</div>
								<div class="col-sm-6">
									<div class="radio">
										<label>
											<input type="radio" name="checkout" id="checkout" value="false" <?php if($fastspring_options['fastspring_bbaction'] == 'addtocart') { echo 'checked'; } ;?> onclick="noncheckout();">
											Add to Cart
										</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="radio">
										<label>
											<input type="radio" name="checkout" id="checkout" value="true" <?php if($fastspring_options['fastspring_bbaction'] == 'checkout') { echo 'checked'; };?> onclick="noncheckout();">
											Checkout
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">
									<label for="bb_path">Select Product</label>
									<select id="bbpathidselect" name="bbpathidselect" onchange="bbenableadd()" class="form-control">
										<option value=""></option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">
									<label for="bb_text">Buy Button Text</label>
									<input id="bb_text" name="bb_text" type="text" value="<?php echo $fastspring_options['fastspring_bbtext']; ?>" class="form-control" />
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">
									<label for="bb_class">Buy Button Class</label>
									<input id="bb_class" name="bb_class" type="text" value="<?php echo $fastspring_options['fastspring_bbclass']; ?>" class="form-control" />
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="form-group col-sm-6">
							<div class="row">
								<div class="col-12">	
									<label for="checkout">Buy Button Icon</label>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label class="active">
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-shopping-basket" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-shopping-basket' ); ?> />
											&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-shopping-cart" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-shopping-cart' ); ?> />
											&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-chevron-right" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-chevron-right' ); ?> />
											&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
							
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-chevron-circle-right" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-chevron-circle-right' ); ?> />
											&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-plus" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-plus' ); ?> />
											&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-plus-circle" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-plus-circle' ); ?> />
											&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-arrow-right" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-arrow-right' ); ?> />
											&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="fa fa-arrow-circle-right" <?php checked( $fastspring_options['fastspring_bbicon'], 'fa fa-arrow-circle-right' ); ?> />
											&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
										</label>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="radio">
										<label>
											<input type="radio" class="bbiconradio" name="bbicon" id="Icon" value="" <?php checked( $fastspring_options['fastspring_bbicon'], 'none' ); ?> />
											&nbsp;None&nbsp;&nbsp;
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
						<div class="row ncheckout mt-3">
							<div class="form-group col-sm-6">
								<div class="row">
									<div class="col-12">
										<label for="checkout">Secondary Button Function</label><br />
									</div>
									<div class="col-sm-6">
										<div class="radio">
											<label>
												<input type="radio" name="vc_rfc" value="vc" <?php if($fastspring_options['fastspring_bbsecondaryaction'] == 'viewcart') { echo 'checked'; };?> onclick="vcrfcfunction(event);">
												View Cart
											</label>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="radio">
											<label>
												<input type="radio" name="vc_rfc" value="rfc" <?php if($fastspring_options['fastspring_bbsecondaryaction'] == 'removefromcart') { echo 'checked'; };?> onclick="vcrfcfunction(event);">
												Remove from Cart
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row vcsection ncheckout  mt-3"> 
							<div class="form-group col-sm-6">
								<label for="bbvc_text">View Cart Button Text</label>
								<input id="bbvc_text" name="bbvc_text" type="text" value="<?php echo $fastspring_options['fastspring_vctext']; ?>" class="form-control" />
							</div>
						</div>
						<div class="row vcsection ncheckout mt-3">
							<div class="form-group col-sm-6">
								<label for="bbvc_class">View Cart Button Class</label>
								<input id="bbvc_class" name="bbvc_class" type="text" value="<?php echo $fastspring_options['fastspring_vcclass']; ?>" class="form-control" />
							</div>
						</div>
						<div class="row vcsection ncheckout mt-3 mb-3">
							<div class="form-group col-sm-6">
								<div class="row">
									<div class="col-12">
										<label for="checkout">View Cart Button Icon</label><br />
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label class="active">
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-shopping-basket" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-basket' ); ?> />
												&nbsp;<i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-shopping-cart" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-shopping-cart' ); ?> />
												&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-chevron-right" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-right' ); ?> />
												&nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-chevron-circle-right" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-chevron-circle-right' ); ?> />
												&nbsp;<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-plus" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-plus' ); ?> />
												&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-plus-circle" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-plus-circle' ); ?> />
												&nbsp;<i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-arrow-right" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-right' ); ?> />
												&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="fa fa-arrow-circle-right" <?php checked( $fastspring_options['fastspring_vcicon'], 'fa fa-arrow-circle-right' ); ?> />
												&nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" class="bbvciconradio" name="bbvcicon" id="vcIcon" value="" <?php checked( $fastspring_options['fastspring_vcicon'], 'none' ); ?> />
												&nbsp;None&nbsp;&nbsp;
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row rfcsection ncheckout mt-3" style="display:none;">
							<div class="form-group col-sm-6">
								<label for="rc_text">Remove from Cart Button Text</label>
								<input id="rc_text" name="rc_text" type="text" value="<?php echo $fastspring_options['fastspring_rctext']; ?>" class="form-control" />
							</div>
						</div>
						<div class="row rfcsection ncheckout mt-3" style="display:none;">
							<div class="form-group col-sm-6">
								<label for="rc_class">Remove from Cart Button Class</label>
								<input id="rc_class" name="rc_class" type="text" value="<?php echo $fastspring_options['fastspring_rcclass']; ?>" class="form-control" />
							</div>
						</div>
						<div class="row rfcsection ncheckout mt-3 mb-3" style="display:none;">
							<div class="form-group col-sm-6">
								<div class="row">
									<div class="col-12">
										<label>Remove from Cart Button Icon</label>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-times" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-times' ); ?> />
												&nbsp;<i class="fa fa-times" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-times-circle" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-times-circle' ); ?> />
												&nbsp;<i class="fa fa-times-circle" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-trash" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-trash' ); ?> />
												&nbsp;<i class="fa fa-trash" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-trash-alt" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-trash-alt' ); ?> />
												&nbsp;<i class="fa fa-trash-alt" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-minus" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-minus' ); ?> />
												&nbsp;<i class="fa fa-minus" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="fa fa-minus-circle" <?php checked( $fastspring_options['fastspring_rcicon'], 'fa fa-minus-circle' ); ?> />
												&nbsp;<i class="fa fa-minus-circle" aria-hidden="true"></i>&nbsp;&nbsp;
											</label>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="radio">
											<label>
												<input type="radio" name="rcIcon" id="rcIcon" value="" <?php checked( $fastspring_options['fastspring_rcicon'], 'none' ); ?> />
												&nbsp;None&nbsp;&nbsp;
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="bbaddfastspringbutton"></label>
							<button id="bbaddfastspringbutton" name="bbaddfastspringbutton" class="fastspring_btn fastspring_btn-primary" onclick="bbinsertfastspring(event);" disabled >Add Fastspring Buy Button</button>
						</div>
					</div>
				</form>
			</div>
		</p>
	</div>
	<div id="prodattrib" class="fastspring" style="display:none;">
		<p>
			<div id="fastspringpa" style="margin: 20px;">
				<form>
					<div class="row">
						<div class="form-group col-sm-6">
							<label>Select Product</label>
							<select id="attribpathidselect" name="attribpathidselect" class="form-control" onchange="paenableadd();">
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
							<label for="checkout">Select the Product Attribute to be Inserted</label><br />
							<div class="col-sm-12">
								<div class="radio">
								<label>
								<input type="radio" name="pacheckout" id="attrib" value="path" />
								Product Path
								</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="name" />
										Product Name
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="summary" />
										Product Summary
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="full" />
										Product Full Description
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="price" />
										Product Price - <em>'Pretty' price with currency symbol – string</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="priceValue" />
										Product Price Value - <em>Price value – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="priceTotal" />
										Product Price Total - <em>(quantity x priceValue) 'Pretty' price with currency symbol – no discounts included – string</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="priceTotalValue" />
										Product Price Total Value - <em>(quantity x priceValue) no discounts included – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="unitPrice" />
										Unit Price - <em>(quantity x priceValue – unitDiscountValue) 'Pretty' price – string</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="unitPriceValue" />
										Unit Price Value - <em>(quantity x priceValue – unitDiscountValue) – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="unitDiscountValue" />
										Unit Discount Value - <em>Discount value for each unit – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="discountPercentValue" />
										Unit Discount Percent Value - <em>Discount percentage for each unit – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="discountTotal" />
										Discount Total - <em>Discount 'Pretty' price total for product – string</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="discountTotalValue" />
										Discount Total Value - <em>Discount price total for product – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="total" />
										Product Total - <em>'Pretty' price total after any discounts – string</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="totalValue" />
										Product Total Value - <em>Price total after any discounts – numeric</em>
									</label>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="radio">
									<label>
										<input type="radio" name="pacheckout" id="attrib" value="image" />
										Product Image
									</label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-sm-6" id="insertimage" >
									<label for="img_class">Product Image Class</label>
									<input id="img_class" name="img_class" type="text" class="form-control" />
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="paaddfastspringbutton"></label>
							<button id="paaddfastspringbutton" name="paaddfastspringbutton" class="fastspring_btn fastspring_btn-primary" onclick="painsertfastspring(event);" disabled >Add FastSpring Product Attribute</button>
						</div>
					</div>
				</form>
			</div>
		</p>
	</div>
<?php
}

if ( ! is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {
	add_action( 'wp_footer', 'fastspring_cart' );
}

function fastspring_add_color_picker( $hook ) {
	if( is_admin() ) {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'custom-script-handle', plugins_url( 'public/js/fastspring.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_style('fastspring_fontawesome', plugins_url('public/css/awesome.css', __FILE__) );
		wp_enqueue_style( 'fastspring_fontawesome' );
	}
}
add_action( 'admin_enqueue_scripts', 'fastspring_add_color_picker' );

$GLOBALS['fsb_options'] = array();
$fastspring_options = array();
$fastspring_settings_general_settings = array();
$fastspring_settings_shopping_cart_settings = array();
$fastspring_settings_buy_button_settings = array();
$fastspring_settings_remove_from_cart_button_settings = array();
$fastspring_settings_view_cart_button_settings = array();
$fastspring_settings_checkout_button_settings = array();
$fastspring_settings_cross_sell_button_settings = array();
$fastspring_settings_up_sell_button_settings = array();
$fastspring_settings_eds_button_settings = array();
 $fastspring_settings_custom_css = array();
  
if(get_option( 'fastspring_settings_general_settings' )) {
	$fastspring_settings_general_settings = get_option( 'fastspring_settings_general_settings' );
}
if(get_option('fastspring_settings_shopping_cart_settings')) {
	$fastspring_settings_shopping_cart_settings = get_option('fastspring_settings_shopping_cart_settings');	
}
if(get_option('fastspring_settings_buy_button_settings')) {
	$fastspring_settings_buy_button_settings = get_option('fastspring_settings_buy_button_settings');
}
if(get_option('fastspring_settings_remove_from_cart_button_settings')) {
	$fastspring_settings_remove_from_cart_button_settings = get_option('fastspring_settings_remove_from_cart_button_settings');
}
if(get_option('fastspring_settings_view_cart_button_settings')) {
	$fastspring_settings_view_cart_button_settings = get_option('fastspring_settings_view_cart_button_settings');
}
if(get_option('fastspring_settings_checkout_button_settings')) {
	$fastspring_settings_checkout_button_settings = get_option('fastspring_settings_checkout_button_settings');
}
if(get_option('fastspring_settings_cross_sell_button_settings')) {
	$fastspring_settings_cross_sell_button_settings = get_option('fastspring_settings_cross_sell_button_settings');
}
if(get_option('fastspring_settings_up_sell_button_settings')) {
	$fastspring_settings_up_sell_button_settings = get_option('fastspring_settings_up_sell_button_settings');
}
if(get_option('fastspring_settings_eds_button_settings')) {
	$fastspring_settings_eds_button_settings = get_option('fastspring_settings_eds_button_settings');
}
if(get_option('fastspring_settings_custom_css')) {
	$fastspring_settings_custom_css = get_option('fastspring_settings_custom_css');
}
if(get_option('fastspring_settings_translations')) {
	$fastspring_settings_translations = get_option('fastspring_settings_translations');
}
if(is_array($fastspring_settings_translations)) {
	$GLOBALS['fsb_options'] = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css, $fastspring_settings_translations);
	$fastspring_options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css, $fastspring_settings_translations);
} 

function fastspring_cart(){
    $fastspring_settings_general_settings = get_option( 'fastspring_settings_general_settings' );
    $fastspring_settings_shopping_cart_settings = get_option('fastspring_settings_shopping_cart_settings');
    $fastspring_settings_buy_button_settings = get_option('fastspring_settings_buy_button_settings');
    $fastspring_settings_remove_from_cart_button_settings = get_option('fastspring_settings_remove_from_cart_button_settings');
    $fastspring_settings_view_cart_button_settings = get_option('fastspring_settings_view_cart_button_settings');
    $fastspring_settings_checkout_button_settings = get_option('fastspring_settings_checkout_button_settings');
    $fastspring_settings_cross_sell_button_settings = get_option('fastspring_settings_cross_sell_button_settings');
    $fastspring_settings_up_sell_button_settings = get_option('fastspring_settings_up_sell_button_settings');
    $fastspring_settings_eds_button_settings = get_option('fastspring_settings_eds_button_settings');
    $fastspring_settings_custom_css = get_option('fastspring_settings_custom_css');
    $fastspring_settings_translations = get_option('fastspring_settings_translations');
    $fastspring_options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css, $fastspring_settings_translations);
    $fastspring_options = array_merge($fastspring_settings_general_settings, $fastspring_settings_shopping_cart_settings, $fastspring_settings_buy_button_settings,$fastspring_settings_remove_from_cart_button_settings,$fastspring_settings_view_cart_button_settings,$fastspring_settings_checkout_button_settings,$fastspring_settings_cross_sell_button_settings,$fastspring_settings_up_sell_button_settings,$fastspring_settings_eds_button_settings, $fastspring_settings_custom_css, $fastspring_settings_translations);
    require_once plugin_dir_path( __FILE__ ) . 'includes/fastspringmodal.php';
}

add_filter( 'nav_menu_link_attributes', 'fastspring_nav_menu_opencart', 10, 3 );

function fastspring_nav_menu_opencart( $atts, $item, $args ) {
	$fastspring_options = get_option('fastspring_settings_nav_menu');
	$fastspring_options2 = get_option('fastspring_settings_view_cart_button_settings');
	$value = array();
	if (isset($fastspring_options['fastspring_viewcartmenuitems']) && ! empty($fastspring_options['fastspring_viewcartmenuitems'])) {
		$value = $fastspring_options['fastspring_viewcartmenuitems'];
	}
	if(in_array($item->ID, $value)) {
		$atts['data-fsc-opencart'] = ' ';
		if($fastspring_options2['fastspring_vcshowhide'] == 'hide') {
			$atts['data-fsc-selections-smartdisplay'] = ' ';
			$atts['style'] = 'display:none;';
		}
		$atts['onclick'] = 'openCart();';
	}
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'fastspring_nav_menu_checkout', 10, 3 );

function fastspring_nav_menu_checkout( $atts, $item, $args ) {
	$fastspring_options = get_option('fastspring_settings_nav_menu');
	$value = array();
	if (isset($fastspring_options['fastspring_checkoutmenuitems']) && ! empty($fastspring_options['fastspring_checkoutmenuitems'])) {
		$value = $fastspring_options['fastspring_checkoutmenuitems'];
	}
	if(in_array($item->ID, $value)) {
		$atts['data-fsc-action'] = 'Checkout';
		$atts['data-fsc-selections-smartdisplay'] = ' ';
		$atts['style'] = 'display:none;';
 	}
	return $atts;
}

$fastspring_options = get_option( 'fastspring_settings_shopping_cart_settings' );
if(isset($fastspring_options['fastspring_cart_location'])) {	
	if($fastspring_options['fastspring_cart_location'] == 'bs') { $fastspring_options['fastspring_cart_location'] = 'fsb-BS'; }
	if($fastspring_options['fastspring_cart_location'] == 'mod') { $fastspring_options['fastspring_cart_location'] = 'fsb-MOD'; }
	if($fastspring_options['fastspring_cart_location'] == 'rs') { $fastspring_options['fastspring_cart_location'] = 'fsb-RS'; }
	if($fastspring_options['fastspring_cart_location'] == 'ls') { $fastspring_options['fastspring_cart_location'] = 'fsb-LS'; }
	update_option('fastspring_settings_shopping_cart_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_buy_button_settings' );
if(isset($fastspring_options['fastspring_bbicon'])) {
	if($fastspring_options['fastspring_bbicon'] == 'fa-plus') { $fastspring_options['fastspring_bbicon'] = 'fa fa-plus';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-plus-circle') { $fastspring_options['fastspring_bbicon'] = 'fa fa-plus-circle';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-chevron-right') { $fastspring_options['fastspring_bbicon'] = 'fa fa-chevron-right';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-chevron-circle-right') { $fastspring_options['fastspring_bbicon'] = 'fa fa-chevron-circle-right';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-arrow-right') { $fastspring_options['fastspring_bbicon'] = 'fa fa-arrow-right';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-arrow-circle-right') { $fastspring_options['fastspring_bbicon'] = 'fa fa-arrow-circle-right';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-shopping-basket') { $fastspring_options['fastspring_bbicon'] = 'fa fa-shopping-basket';}
	if($fastspring_options['fastspring_bbicon'] == 'fa-shopping-cart') { $fastspring_options['fastspring_bbicon'] = 'fa fa-shopping-cart';}
	if($fastspring_options['fastspring_bbicon'] == 'scp') { $fastspring_options['fastspring_bbicon'] = 'none';}
	update_option('fastspring_settings_buy_button_settings', $fastspring_options);
	
}	

$fastspring_options = get_option( 'fastspring_settings_shopping_cart_settings' );
if(isset($fastspring_options['fastspring_delete_icon'])) {
	if($fastspring_options['fastspring_delete_icon'] == 'fa-times') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-times';}
	if($fastspring_options['fastspring_delete_icon'] == 'fa-times-circle') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-times-circle'; }
	if($fastspring_options['fastspring_delete_icon'] == 'fa-trash') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-trash'; }
	if($fastspring_options['fastspring_delete_icon'] == 'fa-trash-alt') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-trash-alt'; }
	if($fastspring_options['fastspring_delete_icon'] == 'fa-minus') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-minus'; }
	if($fastspring_options['fastspring_delete_icon'] == 'fa-minus-circle') { $fastspring_options['fastspring_delete_icon'] = 'fa fa-minus-circle'; }
	if($fastspring_options['fastspring_delete_icon'] == 'scp') { $fastspring_options['fastspring_delete_icon'] = 'none'; }
	update_option('fastspring_settings_shopping_cart_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
if(isset($fastspring_options['fastspring_rcicon'])) {
	if($fastspring_options['fastspring_rcicon'] == 'fa-times' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-times';}
	if($fastspring_options['fastspring_rcicon'] == 'fa-times-circle' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-times-circle';}
	if($fastspring_options['fastspring_rcicon'] == 'fa-trash' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-trash';	}
	if($fastspring_options['fastspring_rcicon'] == 'fa-trash-alt' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-trash-alt';}
	if($fastspring_options['fastspring_rcicon'] == 'fa-minus' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-minus';}
	if($fastspring_options['fastspring_rcicon'] == 'fa-minus-circle' ) { $fastspring_options['fastspring_rcicon'] = 'fa fa-minus-circle'; }
	if($fastspring_options['fastspring_rcicon'] == 'scp' ) { $fastspring_options['fastspring_rcicon'] = 'none'; }
	update_option('fastspring_settings_remove_from_cart_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_view_cart_button_settings' );
if(isset($fastspring_options['fastspring_vcicon'])) {
	if($fastspring_options['fastspring_vcicon'] == 'fa-chevron-right') { $fastspring_options['fastspring_vcicon'] = 'fa fa-chevron-right'; }
	if($fastspring_options['fastspring_vcicon'] == 'fa-chevron-circle-right') { $fastspring_options['fastspring_vcicon'] = 'fa fa-chevron-circle-right'; }
	if($fastspring_options['fastspring_vcicon'] == 'fa-arrow-right') { $fastspring_options['fastspring_vcicon'] = 'fa fa-arrow-right'; }
	if($fastspring_options['fastspring_vcicon'] == 'fa-arrow-circle-right') { $fastspring_options['fastspring_vcicon'] = 'fa fa-arrow-circle-right'; }
	if($fastspring_options['fastspring_vcicon'] == 'fa-shopping-basket') { $fastspring_options['fastspring_vcicon'] = 'fa fa-shopping-basket'; }
	if($fastspring_options['fastspring_vcicon'] == 'fa-shopping-cart') { $fastspring_options['fastspring_vcicon'] = 'fa fa-shopping-cart'; }
	if($fastspring_options['fastspring_vcicon'] == 'scp') { $fastspring_options['fastspring_vcicon'] = 'none'; }
	update_option('fastspring_settings_view_cart_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_checkout_button_settings');
if(isset($fastspring_options['fastspring_coicon'])) {
	if( $fastspring_options['fastspring_coicon'] == 'fa-lock') { $fastspring_options['fastspring_coicon'] = 'fa fa-lock'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-chevron-right') { $fastspring_options['fastspring_coicon'] = 'fa fa-chevron-right'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-chevron-circle-right') { $fastspring_options['fastspring_coicon'] = 'fa fa-chevron-circle-right'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-arrow-right') { $fastspring_options['fastspring_coicon'] = 'fa fa-arrow-right'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-arrow-circle-right') { $fastspring_options['fastspring_coicon'] = 'fa fa-arrow-circle-right'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-shopping-basket') { $fastspring_options['fastspring_coicon'] = 'fa fa-shopping-basket'; }
	if( $fastspring_options['fastspring_coicon'] == 'fa-shopping-cart') { $fastspring_options['fastspring_coicon'] = 'fa fa-shopping-cart'; }
	if( $fastspring_options['fastspring_coicon'] == 'scp') { $fastspring_options['fastspring_coicon'] = 'none'; }
	update_option('fastspring_settings_checkout_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_cross_sell_button_settings');
if(isset($fastspring_options['fastspring_xsicon'])) {
	if($fastspring_options['fastspring_xsicon'] == 'fa-plus') {$fastspring_options['fastspring_xsicon'] = 'fa fa-plus';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-plus-circle') {$fastspring_options['fastspring_xsicon'] = 'fa fa-plus-circle';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-chevron-right') {$fastspring_options['fastspring_xsicon'] = 'fa fa-chevron-right';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-chevron-circle-right') {$fastspring_options['fastspring_xsicon'] = 'fa fa-chevron-circle-right';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-arrow-right') {$fastspring_options['fastspring_xsicon'] = 'fa fa-arrow-right';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-arrow-circle-right') {$fastspring_options['fastspring_xsicon'] = 'fa fa-arrow-circle-right';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-shopping-basket') {$fastspring_options['fastspring_xsicon'] = 'fa fa-shopping-basket';}
	if($fastspring_options['fastspring_xsicon'] == 'fa-shopping-cart') {$fastspring_options['fastspring_xsicon'] = 'fa fa-shopping-cart';}
	if($fastspring_options['fastspring_xsicon'] == 'scp') {$fastspring_options['fastspring_xsicon'] = 'none';}
	update_option('fastspring_settings_cross_sell_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_up_sell_button_settings' );
if(isset($fastspring_options['fastspring_usicon'])) {
	if($fastspring_options['fastspring_usicon'] == 'fa-plus') {$fastspring_options['fastspring_usicon'] = 'fa fa-plus';}
	if($fastspring_options['fastspring_usicon'] == 'fa-plus-circle') {$fastspring_options['fastspring_usicon'] = 'fa fa-plus-circle';}
	if($fastspring_options['fastspring_usicon'] == 'fa-chevron-right') {$fastspring_options['fastspring_usicon'] = 'fa fa-chevron-right';}
	if($fastspring_options['fastspring_usicon'] == 'fa-chevron-circle-right') {$fastspring_options['fastspring_usicon'] = 'fa fa-chevron-circle-right';}
	if($fastspring_options['fastspring_usicon'] == 'fa-arrow-right') {$fastspring_options['fastspring_usicon'] = 'fa fa-arrow-right';}
	if($fastspring_options['fastspring_usicon'] == 'fa-arrow-circle-right') {$fastspring_options['fastspring_usicon'] = 'fa fa-arrow-circle-right';}
	if($fastspring_options['fastspring_usicon'] == 'fa-shopping-basket') {$fastspring_options['fastspring_usicon'] = 'fa fa-shopping-basket';}
	if($fastspring_options['fastspring_usicon'] == 'fa-shopping-cart') {$fastspring_options['fastspring_usicon'] = 'fa fa-shopping-cart';}
	if($fastspring_options['fastspring_usicon'] == 'scp') {$fastspring_options['fastspring_usicon'] = 'none';}
	update_option('fastspring_settings_up_sell_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_eds_button_settings' );
if(isset($fastspring_options['fastspring_edsicon'])) {
	if($fastspring_options['fastspring_edsicon'] == 'fa-plus') {$fastspring_options['fastspring_edsicon'] = 'fa fa-plus';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-plus-circle') {$fastspring_options['fastspring_edsicon'] = 'fa fa-plus-circle';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-chevron-right') {$fastspring_options['fastspring_edsicon'] = 'fa fa-chevron-right';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-chevron-circle-right') {$fastspring_options['fastspring_edsicon'] = 'fa fa-chevron-circle-right';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-arrow-right') {$fastspring_options['fastspring_edsicon'] = 'fa fa-arrow-right';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-arrow-circle-right') {$fastspring_options['fastspring_edsicon'] = 'fa fa-arrow-circle-right';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-shopping-basket') {$fastspring_options['fastspring_edsicon'] = 'fa fa-shopping-basket';}
	if($fastspring_options['fastspring_edsicon'] == 'fa-shopping-cart') {$fastspring_options['fastspring_edsicon'] = 'fa fa-shopping-cart';}
	if($fastspring_options['fastspring_edsicon'] == 'scp') {$fastspring_options['fastspring_edsicon'] = 'none';}
	update_option('fastspring_settings_eds_button_settings', $fastspring_options);
}

$fastspring_options = get_option( 'fastspring_settings_general_settings' );
if(!isset($fastspring_options['fs_version']) || $fastspring_options['fs_version'] != "3.0.0") {
	$fastspring_options['fs_version'] = "3.0.0";
	$defaults = fastspring_settings_default_general_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_general_settings', $fastspring_options);

	$fastspring_options = get_option( 'fastspring_settings_shopping_cart_settings');
	$defaults = fastspring_settings_default_shopping_cart_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_shopping_cart_settings', $fastspring_options);

	$fastspring_options = get_option( 'fastspring_settings_buy_button_settings' );
	$defaults = fastspring_settings_default_buy_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_buy_button_settings', $fastspring_options);

	$fastspring_options = get_option( 'fastspring_settings_remove_from_cart_button_settings' );
	$defaults = fastspring_settings_default_remove_from_cart_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_remove_from_cart_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_view_cart_button_settings' );
	$defaults = fastspring_settings_default_view_cart_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_view_cart_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_checkout_button_settings' );
	$defaults = fastspring_settings_default_checkout_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_checkout_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_cross_sell_button_settings' );
	$defaults = fastspring_settings_default_cross_sell_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_cross_sell_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_up_sell_button_settings' );
	$defaults = fastspring_settings_default_up_sell_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_up_sell_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_eds_button_settings' );
	$defaults = fastspring_settings_default_eds_button_settings();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_eds_button_settings', $fastspring_options);
	
	$fastspring_options = get_option( 'fastspring_settings_translations');
	$defaults = fastspring_settings_default_translations();
	if($fastspring_options) {
		$fastspring_options = array_merge($defaults, $fastspring_options);
	} else {
		$fastspring_options = $defaults;
	}
	update_option('fastspring_settings_translations', $fastspring_options);

	$cartoptions = get_option('fastspring_settings_shopping_cart_settings');
	$xselloptions = get_option('fastspring_settings_cross_sell_button_settings');
	$upselloptions = get_option('fastspring_settings_up_sell_button_settings');
	$edsoptions = get_option('fastspring_settings_eds_button_settings');
	$checkoutoptions = get_option('fastspring_settings_checkout_button_settings');
	$translationoptions =  get_option('fastspring_settings_translations');
	if(isset($cartoptions['fastspring_header'])){ $translationoptions['fastspring_cartTitleText_en'] = $cartoptions['fastspring_header'];}
	if(isset($cartoptions['fastspring_coupon_label'])){ $translationoptions['fastspring_couponLabelText_en'] = $cartoptions['fastspring_coupon_label'];}
	if(isset($cartoptions['fastspring_coupon_placeholder'])){ $translationoptions['fastspring_couponPlaceholderText_en'] = $cartoptions['fastspring_coupon_placeholder'];}
	if(isset($cartoptions['fastspring_coupon_text'])){ $translationoptions['fastspring_applyCouponText_en'] = $cartoptions['fastspring_coupon_text'];}
	if(isset($cartoptions['fastspring_empty_cart'])){ $translationoptions['fastspring_orderEmptyText_en'] = $cartoptions['fastspring_empty_cart'];}
	if(isset($xselloptions['fastspring_xstext'])){ $translationoptions['fastspring_crossSellText_en'] = $xselloptions['fastspring_xstext'];}
	if(isset($upselloptions['fastspring_ustext'])){ $translationoptions['fastspring_upSellText_en'] = $upselloptions['fastspring_ustext'];}
	if(isset($checkoutoptions['fastspring_cotext'])){ $translationoptions['fastspring_checkoutText_en'] = $checkoutoptions['fastspring_cotext'];}
	if(isset($edsoptions['fastspring_edstext'])){ $translationoptions['fastspring_edsText_en'] = $edsoptions['fastspring_edstext'];}
	update_option('fastspring_settings_translations', $translationoptions);
}

function wpdocs_theme_add_editor_styles() {
    add_editor_style( plugins_url( 'fastspring/dist/blocks.style.build.css', dirname( __FILE__ ) ) );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
	
if( ! class_exists( 'Plugin_Usage_Tracker') ) {
	require_once dirname( __FILE__ ) . '/tracking/class-plugin-usage-tracker.php';
}

if( ! function_exists( 'fastspring_start_plugin_tracking' ) ) {
	function fastspring_start_plugin_tracking() {
		$wisdom = new Plugin_Usage_Tracker(
			__FILE__,
			'https://fastspringexamples.com/',
			array('fastspring_settings_general_settings','fastspring_settings_shopping_cart_settings','fastspring_settings_nav_menu'),
			true,
			false,
			1
		);		
	}
	fastspring_start_plugin_tracking();
}	

function fastspring_update_tracking() {
	$wisdom = new Plugin_Usage_Tracker(
		__FILE__,
		'https://fastspringexamples.com/',
		array('fastspring_settings_general_settings','fastspring_settings_shopping_cart_settings','fastspring_settings_nav_menu'),
		true,
		false,
		1
	);
	$wisdom->force_tracking();
}

require_once plugin_dir_path( __FILE__ ) . 'includes/fastspring_init.php';