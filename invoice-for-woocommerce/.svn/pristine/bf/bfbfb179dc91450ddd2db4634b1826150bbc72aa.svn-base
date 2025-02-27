<?php
/**
 * Plugin Name:       Invoice for WooCommerce
 * Plugin URI:        https://seosthemes.com/invoice-for-woocommerce
 * Description:       Create easy invoice for WooCommerce. Translatable Invoice - Allows you to make an invoice in any language. First go to WordPress Dashboard -> Invoice for WooCommerce and set values and save the changes. Then go to the order, add invoice number and download the invoice. The plugin is not intended for Saudi Arabia and there is no VAT validation for Saudi Arabia.
 * Version:           2.1.1
 * Tags:              WooCommerce, Invoice, Invoice for WooCommerce, pdf invoces, pdf, PDF invoice, eu invoice, invoice PDF, woocommerce, pdf, invoices
 * Author:            seosbg
 * Tested up to: 5.8
 * Stable tag: 5.6
 * Author URI:        https://seosthemes.com/
 * Text Domain:       invoice-for-woocommerce
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 *
 */
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		function seos_time_admin_notice__success() { ?>
			<div class="notice notice-success">
				<p>
					<?php
					echo "
					<span style='color: red; text-align: center; font-weight: 700; padding: 5px;'>
						You can't use Invoice for WooCommerce plugin because you need to install WooCommerce Plugin. <a target='_blank' href='https://wordpress.org/plugins/woocommerce/'>Download WooCommerce </a>
					</span>
					";
					?>
				</p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'seos_time_admin_notice__success' );
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	
		// create folder "invoices" in wp-content/uploads
		$ifv_folder = trailingslashit( wp_upload_dir()['basedir'] ) . 'invoices';
	    if ( !file_exists( $ifv_folder ) and is_admin()) {
			wp_mkdir_p( $ifv_folder );
		}

		
		function invoive_for_woocommerce_support_endpoint() {
			add_rewrite_endpoint( 'invoices', EP_ROOT | EP_ALL );
			flush_rewrite_rules();
		}
		add_action( 'init', 'invoive_for_woocommerce_support_endpoint' );
		// create filehtaccess file in folder invoices
		if ( !file_exists( $ifv_folder . '/.htaccess' )) {
			add_action('after_setup_theme', function() {
				$ifv_folder = trailingslashit( wp_upload_dir()['basedir'] ) . 'invoices';
					$file = $ifv_folder . '/.htaccess';
					touch($file);
					file_put_contents($file,"Deny from all");
				}
		    );
		}

/**
 * Include
 */	

	include_once( plugin_dir_path(__FILE__) . 'inc/meta-box-invoice.php' );
	include_once( plugin_dir_path(__FILE__) . 'inc/custom-fields.php' );
	if( get_option( 'activate_all_VAT_fields' ) ) {	
		include_once( plugin_dir_path(__FILE__) . 'inc/vat-field.php' );
	}	
	include_once( plugin_dir_path(__FILE__) . 'inc/Toxic/Validator/Vat.php' );
/**
 * All admin scripts and styles.
 */
	function invoice_for_woocommerce_admin_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'js-datepicker', plugin_dir_url(__FILE__) . '/js/datepicker.js' );
		wp_enqueue_style( 'css-datepicker', plugin_dir_url(__FILE__) . '/css/datepicker.css' );
		wp_enqueue_style( 'css-admin', plugin_dir_url(__FILE__) . '/css/admin.css' );
		wp_enqueue_script( 'js-admin', plugin_dir_url(__FILE__) . '/js/admin.js','',true );

	}
	add_action('admin_enqueue_scripts', 'invoice_for_woocommerce_admin_scripts' );
	
	
	function invoice_for_woocommerce_scripts() {
		wp_enqueue_style( 'css-admin', plugin_dir_url(__FILE__) . '/css/style.css' );
		wp_enqueue_script( 'js-eu-vat', plugin_dir_url(__FILE__) . '/js/eu-vat.js',array('jquery'), '',true );
		wp_enqueue_script( 'js-vat', plugin_dir_url(__FILE__) . '/js/vat.js',array('jquery'), '',true );
	
	}
	add_action( 'wp_enqueue_scripts', 'invoice_for_woocommerce_scripts' );

/**
 * User Section
 */
	add_action( 'admin_menu', 'invoice_for_woocommerce_menu' );
	function invoice_for_woocommerce_menu() {
		add_menu_page( 'Invoice for WooCommerce', 'Invoice', 'administrator', 'invoice-for-woocommerce-settings', 'invoice_for_woocommerce_settings_page', plugins_url( 'inc/images/icon.gif' , __FILE__  ), 56 );
	}
	add_action( 'admin_init', 'invoice_for_woocommerce_plugin_settings' );	
	
	
	function invoice_for_woocommerce_plugin_settings() {
		
		register_setting( 'invoice-for-woocommerce', 'activate_plugin' );
		register_setting( 'invoice-for-woocommerce', 'logo_invoice1' );
		register_setting( 'invoice-for-woocommerce', 'logo_invoice2' );
		for( $i=1;$i<=54;$i++ ) {
			register_setting( 'invoice-for-woocommerce', 'field_'.$i );
		}
		for( $i=1;$i<=54;$i++ ) {
			register_setting( 'invoice-for-woocommerce', 'field_'.$i.'_lang1' );
		}
		register_setting( 'invoice-for-woocommerce', 'countries_flag' );
		register_setting( 'invoice-for-woocommerce', 'countries_flag_1' );
		register_setting( 'invoice-for-woocommerce', 'ifw_add_invoice' );
		register_setting( 'invoice-for-woocommerce', 'custom_payment_method' );
		register_setting( 'invoice-for-woocommerce', 'custom_payment_method_2' );
		register_setting( 'invoice-for-woocommerce', 'check_grounds' );
		register_setting( 'invoice-for-woocommerce', 'activate_all_VAT_fields' );
		register_setting( 'invoice-for-woocommerce', 'activate_grounds_for_zero' );
		register_setting( 'invoice-for-woocommerce', 'activate_digital_goods' );
		register_setting( 'invoice-for-woocommerce', 'activate_digital_ip' );
		register_setting( 'invoice-for-woocommerce', 'vats_base_country' );
		register_setting( 'invoice-for-woocommerce', 'VAT_fields_title' );
		register_setting( 'invoice-for-woocommerce', 'activate_order_detiles_list' );
		register_setting( 'invoice-for-woocommerce', 'show_download_times' );
		register_setting( 'invoice-for-woocommerce', 'show_products_in_orders' );
		register_setting( 'invoice-for-woocommerce', '2_field_53' );
		register_setting( 'invoice-for-woocommerce', 'activate_qr_code' );
		register_setting( 'invoice-for-woocommerce', 'custom_qr_field' );
		register_setting( 'invoice-for-woocommerce', 'custom_qr_field_1' );
		register_setting( 'invoice-for-woocommerce', 'email_subject' );
		register_setting( 'invoice-for-woocommerce', 'email_text' );
		register_setting( 'invoice-for-woocommerce', 'email_from_email' );
		register_setting( 'invoice-for-woocommerce', 'from_d' );
		register_setting( 'invoice-for-woocommerce', 'to_d' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_0' );
		register_setting( 'invoice-for-woocommerce', 'sum_vat_17' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_17' );
		register_setting( 'invoice-for-woocommerce', 'sum_vat_18' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_18' );		
		register_setting( 'invoice-for-woocommerce', 'sum_vat_19' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_19' );		
		register_setting( 'invoice-for-woocommerce', 'sum_vat_20' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_20' );		
		register_setting( 'invoice-for-woocommerce', 'sum_vat_21' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_21' );	
		register_setting( 'invoice-for-woocommerce', 'sum_vat_22' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_22' );			
		register_setting( 'invoice-for-woocommerce', 'sum_vat_23' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_23' );	
		register_setting( 'invoice-for-woocommerce', 'sum_vat_24' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_24' );	
		register_setting( 'invoice-for-woocommerce', 'sum_vat_25' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_25' );	
		register_setting( 'invoice-for-woocommerce', 'sum_vat_27' );
		register_setting( 'invoice-for-woocommerce', 'sum_total_27' );	

	}
	function invoice_for_woocommerce_settings_page($active_tab = '' ) {
	?>
	<div class="invoice_for_woocommerce">
	    <h1><?php _e( 'Invoice for WooCommerce', 'invoice-for-woocommerce' ); ?></h1>
	    <br>
	    <br>
	    <br>
		<?php include_once(plugin_dir_path(__FILE__) . 'inc/form.php'); ?>
	</div>
	<?php }
		function invoice_for_woocommerce_language_load() {
			load_plugin_textdomain( 'invoice_for_woocommerce_language_load', FALSE, basename(dirname(__FILE__)) . '/languages' );
		}
		add_action( 'init', 'invoice_for_woocommerce_language_load' );

/**
 * Check if is EU country
 */			

		function invoice_for_woocommerce_isEU($countrycode) {
			$eu_countrycodes = array(
				'AT', "XI", 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'EL',
				'ES', 'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV',
				'MT', 'NL', 'PL', 'PT', 'RO', 'SE', 'SI', 'SK'
			);
			return (in_array($countrycode, $eu_countrycodes));
		}
		

/**
 * Hide the buttons for tabs - how to use and premium.
 */	
 
		add_action('admin_head','invoice_for_woocommerce_hide_save');
		function invoice_for_woocommerce_hide_save() {
			if ( isset($_GET['tab'] ) ) {
				if($_GET['tab'] == "invoice_6" or $_GET['tab'] == "invoice_7") {
				?>
				<style>
					.wp-core-ui p .button{ display: none !important; }
				</style>
				<?php
				}
				else {
					$tab = "";	
				}
			}
		}

/**
 * Add Settings link in WordPress Plugins Page
 */		
		function invoice_for_woocommerce_settings_link($links) { 
		    $settings_link = '<a href="admin.php?page=invoice-for-woocommerce-settings">Settings</a>'; 
		    array_unshift($links, $settings_link); 
		    return $links; 
		}
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'invoice_for_woocommerce_settings_link' );
}