<?php
/*
Options Page
Plugin: Debloat for WooCommerce
Since: 0.3
Author: KGM Servizi
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class kgmwcbloat {
	private $kgmwcbloat_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'kgmwcbloat_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'kgmwcbloat_page_init' ) );
	}

	public function kgmwcbloat_add_plugin_page() {
		add_submenu_page(
			'woocommerce',
			'Debloat',
			'Debloat',
			'manage_options',
			'kgmwcbloat',
			array( $this, 'kgmwcbloat_create_admin_page' )
		);
	}

	public function kgmwcbloat_create_admin_page() {
		$this->kgmwcbloat_options = get_option( 'kgmwcbloat_option_name' ); 
		$features_missing         = ( array_diff( kgmwcbloat_for_test_new_wc_features( false ), kgmwcbloat_for_test_new_wc_features() ) );
		?>

		<div class="wrap">
			<h1>Debloat for WooCommerce</h1>
			<?php settings_errors(); ?>

			<?php
				if ( count( $features_missing ) >= 1 ) {
					echo '<p>WooCommerce add new features, report this comma separated list to plugin support, thanks! => ' . implode( ', ', $features_missing ) . '</p>';
				}
			?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'kgmwcbloat_option_group' );
					do_settings_sections( 'kgmwcbloat-admin' );
					wp_nonce_field( 'kgmwcbloat_save_settings', 'kgmwcbloat_nonce' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function kgmwcbloat_page_init() {
		register_setting(
			'kgmwcbloat_option_group',
			'kgmwcbloat_option_name',
			array( $this, 'kgmwcbloat_sanitize' )
		);

		add_settings_section(
			'kgmwcbloat_setting_section',
			'Settings', 
			array( $this, 'kgmwcbloat_section_info' ),
			'kgmwcbloat-admin' 
		);

		add_settings_field(
			'kgm_analytics_wc',
			'All Admin Features <br> <small>(ex. Home, Analytics, Not. Bar)</small> <br> <small>Disable belove single settings</small>',
			array( $this, 'analytics_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		$features       = kgmwcbloat_wc_features_array();
		$features_count = count($features);
		$i              = 1;
		foreach ( $features as $feature ) {
			if ( $i == 1 ) {
				$title = '<div class="first-features-div"><span class="title-absolute"><i>or choice single features</i></span></div>' . $feature;
				$position = 'first';
			} else if ( $i == $features_count ) {
				$title = $feature;
				$position = 'last';
			} else {
				$title = $feature;
				$position = false;
			}
	        add_settings_field(
				$feature, 
				$title, 
				array( $this, 'ext_callback' ),
				'kgmwcbloat-admin',
				'kgmwcbloat_setting_section',
				$args = array( 'name' => $feature, 'position' => $position )
			);
			$i++;
		}

		add_settings_field(
			'kgm_connect_to_woocommerce_dot_com_wc',
			'<div class="first-others-div"><span class="title-absolute"><i>others bloat</i></span></div> Connection to WordPress.com <br> <small>(for extensions updates and support)</small>',
			array( $this, 'connect_to_woocommerce_dot_com_wc_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_suggestion_wc',
			'Marketplace Suggestions',
			array( $this, 'suggestion_wc_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_extensions_wc',
			'Extensions submenù <br> <small>(addons)</small>',
			array( $this, 'extensions_wc_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_styles_wc',
			'Remove styles <br> <small>(on frontend no WC pages)</small>',
			array( $this, 'styles_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_scripts_wc',
			'Remove scriptes <br> <small>(on frontend no WC pages)</small>',
			array( $this, 'scripts_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_styles_wc_gutenberg_blocks',
			'Remove styles of Gutenberg blocks <br> <small>(only on frontend)</small>',
			array( $this, 'scripts_wc_gutenberg_blocks_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_wc_widgets_remove',
			'Remove all Widgets',
			array( $this, 'scripts_wc_widgets_remove_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_cart_frag_wc',
			'Disable Cart Fragments',
			array( $this, 'cart_frag_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

		add_settings_field(
			'kgm_order_main_menu',
			'<div class="first-others-div"><span class="title-absolute"><i>usefull functions</i></span></div> Add a quick link to main menù <br> <small>(belove dashboard)</small>',
			array( $this, 'order_main_menu_callback' ),
			'kgmwcbloat-admin',
			'kgmwcbloat_setting_section'
		);

	}

	public function kgmwcbloat_sanitize($input) {
		$sanitary_values = array();
		$valid           = true;

		if ( isset( $_POST['kgmwcbloat_nonce'] ) && wp_verify_nonce( $_POST['kgmwcbloat_nonce'], 'kgmwcbloat_save_settings' ) ) {
			if ( isset( $input['kgm_analytics_wc'] ) ) {
				$sanitary_values['kgm_analytics_wc'] = sanitize_text_field( $input['kgm_analytics_wc'] );
			}
			if ( isset( $input['kgm_connect_to_woocommerce_dot_com_wc'] ) ) {
				$sanitary_values['kgm_connect_to_woocommerce_dot_com_wc'] = sanitize_text_field( $input['kgm_connect_to_woocommerce_dot_com_wc'] );
			}
			if ( isset( $input['kgm_suggestion_wc'] ) ) {
				$sanitary_values['kgm_suggestion_wc'] = sanitize_text_field( $input['kgm_suggestion_wc'] );
			}
			if ( isset( $input['kgm_extensions_wc'] ) ) {
				$sanitary_values['kgm_extensions_wc'] = sanitize_text_field( $input['kgm_extensions_wc'] );
			}
			if ( isset( $input['kgm_styles_wc'] ) ) {
				$sanitary_values['kgm_styles_wc'] = sanitize_text_field( $input['kgm_styles_wc'] );
			}		
			if ( isset( $input['kgm_scripts_wc'] ) ) {
				$sanitary_values['kgm_scripts_wc'] = sanitize_text_field( $input['kgm_scripts_wc'] );
			}		
			if ( isset( $input['kgm_styles_wc_gutenberg_blocks'] ) ) {
				$sanitary_values['kgm_styles_wc_gutenberg_blocks'] = sanitize_text_field( $input['kgm_styles_wc_gutenberg_blocks'] );
			}		
			if ( isset( $input['kgm_wc_widgets_remove'] ) ) {
				$sanitary_values['kgm_wc_widgets_remove'] = sanitize_text_field( $input['kgm_wc_widgets_remove'] );
			}		
			if ( isset( $input['kgm_cart_frag_wc'] ) ) {
				$sanitary_values['kgm_cart_frag_wc'] = sanitize_text_field( $input['kgm_cart_frag_wc'] );
			}
			if ( isset( $input['kgm_order_main_menu'] ) ) {
				$sanitary_values['kgm_order_main_menu'] = sanitize_text_field( $input['kgm_order_main_menu'] );
			}

			$features = kgmwcbloat_wc_features_array();
			foreach ( $features as $feature ) {
				if ( isset( $input[$feature] ) ) {
					$sanitary_values[$feature] = $input[$feature];
				}
			}
		} else {
			$valid = false;
			add_settings_error( 'kgmwcbloat_option_notice', 'nonce_error', 'Nonce validation error.' );
		}

		if ( ! $valid ) {
			$sanitary_values = get_option( 'kgmwcbloat_option_name' );
		}

		return $sanitary_values;
	}

	public function kgmwcbloat_section_info() {
		
	}

	public function analytics_callback() {
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_analytics_wc]" id="kgm_analytics_wc" value="kgm_analytics_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_analytics_wc'] ) && $this->kgmwcbloat_options['kgm_analytics_wc'] === 'kgm_analytics_wc' ) ? 'checked' : ''
		);		
	}

	public function ext_callback( $args ) {
		$name     = $args['name'];
		$position = $args['position'];
		if ( $position == 'first' ) {
			printf(
				'<label class="switch first features ' . esc_attr($name) . '"><input type="checkbox" class="feature" name="kgmwcbloat_option_name['.$name.']" id="'.$name.'" value="'.$name.'" %s><span class="slider"></span></label>',
				( isset( $this->kgmwcbloat_options[$name] ) && $this->kgmwcbloat_options[$name] === $name ) ? 'checked' : ''
			);
		} else if ( $position == 'last' ) {
			printf(
				'<label class="switch last features ' . esc_attr($name) . '"><input type="checkbox" class="feature" name="kgmwcbloat_option_name['.$name.']" id="'.$name.'" value="'.$name.'" %s><span class="slider"></span></label>',
				( isset( $this->kgmwcbloat_options[$name] ) && $this->kgmwcbloat_options[$name] === $name ) ? 'checked' : ''
			);
		} else {
			printf(
				'<label class="switch features ' . esc_attr($name) . '"><input type="checkbox" class="feature" name="kgmwcbloat_option_name['.$name.']" id="'.$name.'" value="'.$name.'" %s><span class="slider"></span></label>',
				( isset( $this->kgmwcbloat_options[$name] ) && $this->kgmwcbloat_options[$name] === $name ) ? 'checked' : ''
			);
		}
	}


	public function connect_to_woocommerce_dot_com_wc_callback() {
		printf(
			'<label class="switch first-others"><input type="checkbox" name="kgmwcbloat_option_name[kgm_connect_to_woocommerce_dot_com_wc]" id="kgm_connect_to_woocommerce_dot_com_wc" value="kgm_connect_to_woocommerce_dot_com_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_connect_to_woocommerce_dot_com_wc'] ) && $this->kgmwcbloat_options['kgm_connect_to_woocommerce_dot_com_wc'] === 'kgm_connect_to_woocommerce_dot_com_wc' ) ? 'checked' : ''
		);		
	}
	public function suggestion_wc_callback() {
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_suggestion_wc]" id="kgm_suggestion_wc" value="kgm_suggestion_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_suggestion_wc'] ) && $this->kgmwcbloat_options['kgm_suggestion_wc'] === 'kgm_suggestion_wc' ) ? 'checked' : ''
		);		
	}
	public function extensions_wc_callback() {
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_extensions_wc]" id="kgm_extensions_wc" value="kgm_extensions_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_extensions_wc'] ) && $this->kgmwcbloat_options['kgm_extensions_wc'] === 'kgm_extensions_wc' ) ? 'checked' : ''
		);		
	}
	public function styles_callback() {		
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_styles_wc]" id="kgm_styles_wc" value="kgm_styles_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_styles_wc'] ) && $this->kgmwcbloat_options['kgm_styles_wc'] === 'kgm_styles_wc' ) ? 'checked' : ''
		);
	}	
	public function scripts_callback() {		
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_scripts_wc]" id="kgm_scripts_wc" value="kgm_scripts_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_scripts_wc'] ) && $this->kgmwcbloat_options['kgm_scripts_wc'] === 'kgm_scripts_wc' ) ? 'checked' : ''
		);
	}	
	public function scripts_wc_gutenberg_blocks_callback() {		
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_styles_wc_gutenberg_blocks]" id="kgm_styles_wc_gutenberg_blocks" value="kgm_styles_wc_gutenberg_blocks" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_styles_wc_gutenberg_blocks'] ) && $this->kgmwcbloat_options['kgm_styles_wc_gutenberg_blocks'] === 'kgm_styles_wc_gutenberg_blocks' ) ? 'checked' : ''
		);
	}	
	public function scripts_wc_widgets_remove_callback() {		
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_wc_widgets_remove]" id="kgm_wc_widgets_remove" value="kgm_wc_widgets_remove" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_wc_widgets_remove'] ) && $this->kgmwcbloat_options['kgm_wc_widgets_remove'] === 'kgm_wc_widgets_remove' ) ? 'checked' : ''
		);
	}	
	public function cart_frag_callback() {		
		printf(
			'<label class="switch"><input type="checkbox" name="kgmwcbloat_option_name[kgm_cart_frag_wc]" id="kgm_cart_frag_wc" value="kgm_cart_frag_wc" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_cart_frag_wc'] ) && $this->kgmwcbloat_options['kgm_cart_frag_wc'] === 'kgm_cart_frag_wc' ) ? 'checked' : ''
		);
	}

	public function order_main_menu_callback() {		
		printf(
			'<label class="switch first-others"><input type="checkbox" name="kgmwcbloat_option_name[kgm_order_main_menu]" id="kgm_order_main_menu" value="kgm_order_main_menu" %s><span class="slider"></span></label>',
			( isset( $this->kgmwcbloat_options['kgm_order_main_menu'] ) && $this->kgmwcbloat_options['kgm_order_main_menu'] === 'kgm_order_main_menu' ) ? 'checked' : ''
		);
	}

}
if ( is_admin() )
	$kgmwcbloat = new kgmwcbloat();