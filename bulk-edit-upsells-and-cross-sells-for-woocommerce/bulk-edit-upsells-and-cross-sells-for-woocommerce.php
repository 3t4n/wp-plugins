<?php
/**
 * Plugin Name: Bulk Edit Upsells and Cross-Sells for WooCommerce
 * Description: Bulk Edit Upsells and Cross-sells for WooCommerce is a fast and easy way to set or update upsells and cross-sells for products in your WooCommerce catalog.
 * Author URI:  https://www.saffiretech.com
 * Author:      SaffireTech
 * Text Domain: bulk-edit-upsells-and-cross-sells-for-woocommerce
 * Domain Path: /languages
 * Stable Tag : 3.0.3
 * Requires at least: 5.0
 * Tested up to: 6.7.1
 * Requires PHP: 7.2
 * WC requires at least: 4.0.0
 * WC tested up to: 9.4.3
 * License:     GPLv3
 * License URI: URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Version:     3.0.3
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

define( 'BUCW_BULK_EDIT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Check the installation of pro version.
 *
 * @return bool
 */
function beucw_check_pro_version() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( is_plugin_active( 'woocommerce-related-products-pro/woocommerce-related-products-pro.php' ) ) {
		return true;
	} else {
		return false;
	}
}

add_action( 'plugins_loaded', 'beucw_free_plugin_install' );

/**
 * Display notice if pro plugin found.
 */
function beucw_free_plugin_install() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	// Nonce verification.
	$secure_nonce      = wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
	$id_nonce_verified = wp_verify_nonce( $secure_nonce, 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );

	if ( ! $id_nonce_verified ) {
		wp_die( esc_html__( 'Nonce Not verified', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
	}

	// if pro plugin found deactivate free plugin.
	if ( beucw_check_pro_version() ) {

		// deactivate free plugin if pro found.
		deactivate_plugins( plugin_basename( __FILE__ ), true );

		// If pro plugin is activated.
		if ( defined( 'RPROW_PRO_PLUGIN' ) ) {
			if ( isset( $_GET['activate'] ) ) {
				unset( $_GET['activate'] );
			}
			add_action( 'admin_notices', 'beucw_install_free_admin_notice' );
		}
	}
}

/**
 * Add message if pro version is installed.
 */
function beucw_install_free_admin_notice() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'Related Products Pro for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></p>
	</div>
	<?php
}

add_action( 'init', 'beucw_upsells_crosssells_include_file' );

/**
 * This function includes all required file for bulk edit page.
 */
function beucw_upsells_crosssells_include_file() {

	if ( ! function_exists( 'is_plugin_active' ) ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	// nonce verification.
	$secure_nonce      = wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
	$is_nonce_verified = wp_verify_nonce( $secure_nonce, 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );

	if ( ! $is_nonce_verified ) {
		wp_die( esc_html__( 'Nonce Not verified', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
	}

	// If pro version is not installed.
	if ( ! beucw_check_pro_version() ) {

		if ( ( file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) && is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

			// Only load on bulk edit page.
			// if ( 'bulk-edit-upsells-crosssells' === ( isset( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '' ) ) {
				// }
		}
	}

	// require settings files.
	require_once plugin_dir_path( __FILE__ ) . 'includes/beucw-settings.php';
	require_once plugin_dir_path( __FILE__ ) . 'includes/beucw-functions.php';

	// schedule action.
	require_once plugin_dir_path( __FILE__ ) . '/library/action-scheduler/action-scheduler.php';

	// Schedule ai request.
	if ( false === as_has_scheduled_action( 'beucw_api_request_prompt' ) && get_option( 'beucw_api_request_created_status' ) === 'created' ) {

		// Schedule the action to run immediately send api prompt.
		as_schedule_single_action( time() + 1 * 60, 'beucw_api_request_prompt', array() );
		update_option( 'beucw_api_request_created_status', 'pending' );
	}

	// Check deafult ai and update predifined ai value.
	$ai_default_check = (string) get_option( 'beucw_ai_default_check' );

	if ( '' === $ai_default_check ) {
		$selected_product_detail = array( 'products_name', 'products_desc' );
		$selected_products       = beucw_get_all_products_with_variations();
		$selected_categories     = array();
		update_option( 'beucw_default_ai_prompt', 'Here is selected products data: {selected_products} and here is all products data {all_products} and suggest Upsells and Cross-Sells products from this set.' );
		update_option( 'beucw_all_products', 'products' );
		update_option( 'beucw_products_name', 'on' );
		update_option( 'beucw_products_desc', 'on' );
		update_option( 'beucw_ai_default_check', '1' );
		update_option( 'beucw_ai_prompt_type', 'default' );
		update_option( 'beucw_display_ai_request_notice', 'no' );
		beucw_update_tokens( 'Here is selected products data: {selected_products} and here is all products data {all_products} and suggest Upsells and Cross-Sells products from this set.', '', $selected_product_detail, 'all_products', $selected_products );
	}

	wp_enqueue_style( 'beucw_upsells_css', plugins_url( 'assets/css/beucw-bulk-upsells-crosssells.css', __FILE__ ), array(), '2.0.2' );

	// Only load CSS on bulk edit page.
	if ( 'bulk-edit-upsells-crosssells' === ( isset( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '' ) ) {

		// Load font awesome library.
		// wp_enqueue_style( 'bucw_font_icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0.0' );
		wp_enqueue_style( 'bucw_font_icons', plugins_url( '/assets/css/font-awesome.min.css', __FILE__ ), array(), '1.0.0' );

		// Load multi select chedkbox select.
		wp_enqueue_script( 'bucw_multi_ajax_js', plugins_url( 'assets/js/jQuery-multi-select-js/src/jquery.multi-select.js', __FILE__ ), array(), '10.10.1', false );

		// Sweetalert library.
		wp_enqueue_script( 'bucw_sweetalert2_js', plugins_url( 'assets/js/sweetalert2.all.min.js', __FILE__ ), array(), '10.10.1', false );
		wp_enqueue_style( 'bucw_sweetalert2_css', plugins_url( 'assets/css/sweetalert2.min.css', __FILE__ ), array(), '10.10.1' );

		// Select2 library.
		wp_enqueue_style( 'bucw_select2_css', plugins_url( 'assets/css/select2.min.css', __FILE__ ), array(), '10.10.1' );
		wp_enqueue_script( 'bucw_select2_js', plugins_url( 'assets/js/select2.min.js', __FILE__ ), array(), '10.10.0', false );

		wp_register_script( 'bucw_upsells_js', plugins_url( 'assets/js/beucw-bulk-upsells-crosssells.js', __FILE__ ), array( 'jquery', 'jquery-ui-autocomplete' ), '2.0.2', true );
		wp_enqueue_script( 'bucw_upsells_js' );

		wp_localize_script(
			'bucw_upsells_js',
			'upsellajaxapi',
			array(
				'url'                 => admin_url( 'admin-ajax.php' ),
				'nonce'               => wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_search_msg'    => __( 'Please select a filter ( product category, tags, product name or SKU) to search your products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_one'       => __( 'No products found on current on selected search criteria. Please change filter or search for other products.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_two'       => __( 'Please input keywords/ terms for the chosen filter for the products you wish to update', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_save'      => __( 'Saving Changes...', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_save_html' => __( 'This will take a few seconds.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_update'    => __( 'Products Updated Successfully!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_dismiss_noti'  => __( 'Dismiss this notice.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_msg_error'     => __( 'Some Error Occurred', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
				'beucw_pro_notice'    => __( 'Inactive. You\'ve got pro version !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ),
			)
		);
	}

	wp_set_script_translations( 'bucw_upsells_js', 'bulk-edit-upsells-and-cross-sells-for-woocommerce', plugin_dir_path( __FILE__ ) . 'languages/' );
}

add_action( 'admin_enqueue_scripts', 'beucw_upsells_assets' );

/**
 * Function enqueue different library.
 *
 * @param string $hook .
 */
function beucw_upsells_assets( $hook ) {

	// nonce verification.
	$secure_nonce      = wp_create_nonce( 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );
	$is_nonce_verified = wp_verify_nonce( $secure_nonce, 'bulk-edit-upsells-and-cross-sells-for-woocommerce' );

	wp_enqueue_script( 'beucw_ajax_js', plugins_url( 'assets/js/beucw-ajax.js', __FILE__ ), array(), '10.10.1', false );

	wp_localize_script(
		'beucw_ajax_js',
		'beucw_ajax_object',
		array(
			'ajax_url'            => admin_url( 'admin-ajax.php' ),
			'api_valid_key'       => get_option( 'beucw_api_valid_key_status' ),
			'api_request_status'  => get_option( 'beucw_api_request_created_status' ),
			'api_response_status' => get_option( 'beucw_api_request_created_status' ),
		)
	);

	if ( ! $is_nonce_verified ) {
		wp_die( esc_html__( 'Nonce Not verified', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) );
	}

	if ( 'product_page_bulk-edit-upsells-crosssells' === $hook ) {

		if ( ! beucw_check_pro_version() ) {

			wp_enqueue_script( 'jquery' );

			// Only load on bulk edit page.
			if ( 'bulk-edit-upsells-crosssells' === ( isset( $_GET['page'] ) ? sanitize_key( $_GET['page'] ) : '' ) ) {

			}
		}
	}
}

add_action( 'admin_init', 'beucw_load_plugin_textdomain_file' );

/**
 * To load text domain files.
 */
function beucw_load_plugin_textdomain_file() {
	load_plugin_textdomain( 'bulk-edit-upsells-and-cross-sells-for-woocommerce', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'beucw_action_links_callback', 10, 1 );

/**
 * Settings link in plugin page.
 *
 * @param array $links links Plugin links on plugins.php.
 * @return array
 */
function beucw_action_links_callback( $links ) {

	// Add the plugin settings link.
	$settinglinks = array(
		'<a href="' . admin_url( 'admin.php?page=bulk-edit-upsells-crosssells' ) . '">' . __( 'Setting', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) . '</a>',
		'<a class="beucw-setting-upgrade" href="https://www.saffiretech.com/woocommerce-related-products-pro?utm_source=wp_plugin&utm_medium=plugins_archive&utm_campaign=free2pro&utm_id=c1&utm_term=upgrade_now&utm_content=beucw" target="_blank">' . __( 'UpGrade to Pro !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ) . '</a>',
	);

	return array_merge( $settinglinks, $links );
}

// Define the action hook to handle the scheduled event.
add_action( 'beucw_api_request_prompt', 'beucw_openai_setup_api_call' );

/**
 * Server API Call with product data.
 *
 * This function handles the communication with the OpenAI API to request product recommendations
 * based on product data. It checks for button click, handles errors, processes the response, and
 * updates options accordingly.
 */
function beucw_openai_setup_api_call() {

	global $wpdb;

	// Get the current date and time in GMT format.
	$date = gmdate( 'Y-m-d' );
	$time = gmdate( 'H:i:s' );

	$products             = array();  // Array to store selected products.
	$prompt_product_data  = array();  // Array to store product details for the prompt.
	$prompt_text          = '';       // Variable to store the prompt text.
	$final_response       = array();  // Array to store the final API response.
	$all_products         = beucw_get_all_products_with_variations(); // Get all products with variations.
	$all_products_prompt  = array();  // Array to store all products for the prompt.
	$ai_build_prompt_data = '';       // Variable to store the final AI prompt data.

	// Check if the "AI prompt request" button has been hit (triggered).
	if ( get_option( 'beucw_prompt_request_button_hit' ) ) {
		// Check if the API request has already been fulfilled to avoid duplicate requests.
		if ( get_option( 'beucw_api_request_created_status' ) === 'fulfilled' ) {
			return;  // Exit the function if already fulfilled.
		}

		// If the request is not fulfilled, proceed with resetting and processing.
		if ( 'fulfilled' !== get_option( 'beucw_api_request_created_status' ) ) {
			// Reset error status and hit button.
			update_option( 'beucw_api_error_data', '' );
			update_option( 'beucw_prompt_request_button_hit', 0 );

			// Get the default AI prompt from options.
			$prompt_text = get_option( 'beucw_default_ai_prompt' );

			// Get the selected product details and store description.
			$selected_product_detail = get_option( 'beucw_product_selected_options' );
			$about_store_text        = get_option( 'beucw_about_store' );

			// Build the AI prompt with selected products and store details.
			$build_prompt = beucw_update_tokens( $prompt_text, $about_store_text, $selected_product_detail, get_option( 'beucw_all_products' ), get_option( 'beucw_product_list' ) );

			// For testing/debugging purposes, save the built prompt.
			update_option( 'test', $build_prompt );

			// Get the API key entered by the user from options.
			$api_key = ( get_option( 'beucw_openai_api_key' ) ) ? get_option( 'beucw_openai_api_key' ) : 0;

			// Get the model name from options.
			$model_name = ( get_option( 'beucw_api_model_name' ) ) ? get_option( 'beucw_api_model_name' ) : 0;

			// The API endpoint URL for the OpenAI API.
			$request_url = 'https://api.openai.com/v1/chat/completions';

			// Prepare the request body with model, messages, and other parameters.
			$request_body = array(
				'model'             => $model_name,
				'messages'          => array(
					array(
						'role'    => 'user',
						'content' => $build_prompt['prompt_to_send'],
					),
				),
				'max_tokens'        => 4096,
				'temperature'       => 0.7,
				'top_p'             => 1,
				'frequency_penalty' => 0,
				'presence_penalty'  => 0,
			);

			// Set up the arguments for the API request, including headers and body.
			$args = array(
				'method'  => 'POST',
				'headers' => array(
					'Content-Type'  => 'application/json',
					'Authorization' => 'Bearer ' . $api_key,
				),
				'body'    => wp_json_encode( $request_body ),
				'timeout' => 100,  // Set a long timeout to handle large requests.
			);

			// Clear current AI request log.
			update_option( 'beucw_current_ai_request', '' );

			// Make the POST request to the OpenAI API.
			$response = wp_remote_post( $request_url, $args );

			// Handle server error (500) response.
			if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 500 ) {
				$final_response = array(
					'status'          => 1,
					'openai_response' => 'Request to OpenAI API failed.',
				);

				// Update the status as failed and save the error log.
				update_option( 'beucw_api_request_created_status', 'failed' );
				beucw_save_data_with_date_and_time( $date, $time, 0, 'Your Request has failed due to server error. Try again!' );
			}

			// Handle quota exceeded (429) response.
			if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 429 ) {
				$final_response = array(
					'status'          => 0,
					'openai_response' => 'insufficient_quota',
				);

				// Update the status as insufficient quota and save the log.
				update_option( 'beucw_api_request_created_status', 'insufficient_quota' );
				beucw_save_data_with_date_and_time( $date, $time, 0, 'You have insufficient quota left for making requests.' );
			}

			// Handle incorrect API Key (401) response.
			if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 401 ) {
				$final_response = array(
					'status'          => 0,
					'openai_response' => 'incorrect_api',
				);

				// Update the status as incorrect API key.
				update_option( 'beucw_api_request_created_status', 'incorrect_api' );
			}

			// Handle system overload (503) response.
			if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) === 503 ) {
				$final_response = array(
					'status'          => 0,
					'openai_response' => 'system_overloaded',
				);

				// Update the status as system overload and save the log.
				update_option( 'beucw_api_request_created_status', 'system_overloaded' );
				beucw_save_data_with_date_and_time( $date, $time, 0, 'API system is overloaded. Try again.' );
			}

			// Handle successful (200) response.
			if ( wp_remote_retrieve_response_code( $response ) === 200 ) {
				// Decode the response body into an array.
				$response_data = json_decode( wp_remote_retrieve_body( $response ), true );

				$final_response = array(
					'status'          => 1,
					'openai_response' => $response_data,
				);

				// Update the status to indicate a response was received and save the log.
				update_option( 'beucw_api_request_created_status', 'response_received' );
				beucw_save_data_with_date_and_time( $date, $time, $response_data, 'Your request has been successfully received!' );
			}

			// Retrieve the response headers and body for further processing.
			$headers = wp_remote_retrieve_headers( $response );
			$body    = wp_remote_retrieve_body( $response );
			$content = json_decode( $body, true );

			// Calculate tokens used based on the API response (if available).
			$tokens_used = isset( $content['usage']['total_tokens'] ) ? $content['usage']['total_tokens'] : 0;

			// Update the options with the AI request logs and the final response.
			update_option( 'beucw_ai_request_logs', $final_response );
			update_option( 'response_ai', $final_response );

			// Save the product data based on the AI recommendations.
			beucw_save_product_data();
		}
	}

}

/**
 * Update API request tokens used in the latest prompt.
 *
 * This function generates a prompt for Bulk Edit Upsells and Cross-Sells for WooCommerce recommendations based on product descriptions, calculates the token usage, and stores it.
 *
 * @param string $prompt_text The text for the AI prompt.
 * @param string $about_store_text The text about the store.
 * @param array  $selected_product_detail The details of the selected products (e.g., name, description).
 * @param array  $selected_product_type The selected product type (e.g., products, categories).
 * @param array  $selected_products The list of selected product IDs.
 */
function beucw_update_tokens( $prompt_text, $about_store_text, $selected_product_detail, $selected_product_type, $selected_products ) {

	// Initialize arrays and variables.
	$products             = array(); // Array to store selected products.
	$prompt_product_data  = array(); // Array to store product details for the prompt.
	$final_response       = array(); // Array to store final API response.
	$all_products         = beucw_get_all_products_with_variations(); // Get all products including variations.
	$all_products_prompt  = array(); // Array to store all products for prompt.
	$ai_build_prompt_data = '';      // Variable to store the final AI prompt data.

	// If selected product type is 'products', use the provided selected products.
	if ( $selected_product_type === 'products' ) {
		$products = $selected_products;
	}

	// Gather product details for the selected products.
	foreach ( $products as $product_id ) {

		$product            = wc_get_product( $product_id ); // Get WooCommerce product by ID.
		$temp               = array(); // Temporary array to store product details.
		$temp['product_id'] = $product_id; // Store product ID.

		// Handle the case where the product is not found.
		if ( ! $product ) {
			continue;
		}

		// Add product name if it is part of the selected product details.
		if ( in_array( 'products_name', $selected_product_detail ) ) {
			$temp['products_name'] = get_the_title( $product_id );
		}

		// Add product description if it is part of the selected product details.
		if ( in_array( 'products_desc', $selected_product_detail ) ) {
			$temp['beucw_products_desc'] = strip_tags( $product->get_short_description() );
		}

		// Add the product details to the prompt data array.
		$prompt_product_data[] = $temp;
	}

	// Gather product details for all products in the store.
	foreach ( $all_products as $product_id => $value ) {

		$product            = wc_get_product( $value['product_id'] ); // Get WooCommerce product by ID.
		$temp               = array(); // Temporary array to store product details.
		$temp['product_id'] = $value['product_id']; // Store product ID.

		// Handle the case where the product is not found.
		if ( ! $product ) {
			continue;
		}

		// Add product name if it is part of the selected product details.
		if ( in_array( 'products_name', $selected_product_detail ) ) {
			$temp['products_name'] = get_the_title( $value['product_id'] );
		}

		// Add product description if it is part of the selected product details.
		if ( in_array( 'products_desc', $selected_product_detail ) ) {
			$temp['beucw_products_desc'] = strip_tags( $product->get_short_description() );
		}

		// Add the product details to the all products prompt data array.
		$all_products_prompt_data[] = $temp;
	}

	// Encode the gathered product data into JSON format.
	$replacement_words   = wp_json_encode( $prompt_product_data );
	$all_products_prompt = wp_json_encode( $all_products_prompt_data );

	// Replace the placeholder {all_products} in the prompt text with the JSON data.
	$modified_string_all = str_replace( '{all_products}', $all_products_prompt, $prompt_text );

	// Customize the prompt based on the selected product type option.
	if ( get_option( 'beucw_all_products' ) == 'products' ) {
		$ai_build_prompt_data = str_replace( '{selected_products}', $replacement_words, $modified_string_all );
	}

	// Build the final prompt string to send to the AI.
	$prompt_to_send = $about_store_text . '. Generate a JSON object listing Bulk Edit Upsells and Cross-Sells for WooCommerce recommendations for a WooCommerce store based on product descriptions. Exclude any products where the type is "child". Focus on finding similarities in product descriptions to determine related items. Suggest at least 5 recommendations for each product.' . $ai_build_prompt_data . ' The JSON output should only include product IDs and should be formatted compactly without unnecessary spaces. For example, for a product with ID 123, the output should be: {"123":{"upsells":["1,2,3,4"], "cross-sells":["123,33,34"]}}. Ensure the product IDs are listed without spaces and that the relationships are based on significant description similarities. Do not include any additional content or commentary, just provide the JSON data.';

	// Build the prompt string to save (for logging or future use).
	$prompt_to_save = $about_store_text . '. Generate a JSON object listing Bulk Edit Upsells and Cross-Sells for WooCommerce recommendations for a WooCommerce store based on product descriptions. Exclude any products where the type is "child". Focus on finding similarities in product descriptions to determine related items. Suggest at least 5 recommendations for each product.' . $prompt_text . '. The JSON output should only include product IDs and should be formatted compactly without unnecessary spaces. For example, for a product with ID 123, the output should be: {"123":{"upsells":["1,2,3,4"], "cross-sells":["123,33,34"]}}. Ensure the product IDs are listed without spaces and that the relationships are based on significant description similarities. Do not include any additional content or commentary, just provide the JSON data.';

	// Calculate the token length for the prompt (assuming 1 token = 4 characters).
	$token_length = ceil( strlen( $prompt_to_send ) / 4 );

	// Update the token usage option (store the number of tokens used).
	update_option( 'beucw_tokens_used', $token_length );

	// Prepare the response array to return.
	$built_prompt['prompt_to_send'] = $prompt_to_send;
	$built_prompt['prompt_to_save'] = $prompt_to_save;
	$built_prompt['prompt_token']   = $token_length;

	// Return the built prompt data and token count.
	return $built_prompt;
}

add_action( 'admin_notices', 'beucw_ai_admin_notice__success' );

/**
 * Request Status Notice Rendering.
 *
 * This function renders admin notices based on the current AI request status for Bulk Edit Upsells and Cross-Sells for WooCommerces.
 * It handles different cases like pending requests, fulfilled requests, and errors (e.g., insufficient quota, incorrect API key).
 */
function beucw_ai_admin_notice__success() {

	// Get the current URL for reloading the page.
	$reload_page = esc_url( $_SERVER['REQUEST_URI'] );

	// Check if the notice should be displayed by checking the 'beucw_display_ai_request_notice' option.
	if ( get_option( 'beucw_display_ai_request_notice' ) == 'yes' ) {

		// Check if the request is not yet fulfilled.
		if ( 'fulfilled' !== get_option( 'beucw_api_request_created_status' ) ) {

			// Show a notice for pending requests (either 'created' or 'pending' status).
			if ( 'created' === get_option( 'beucw_api_request_created_status' ) || 'pending' === get_option( 'beucw_api_request_created_status' ) ) {

				?>
				<div class="notice notice-warning is-dismissible">
					<p><b><?php _e( 'Bulk Edit Upsells and Cross-Sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b></p>
					<p>
						<b><?php _e( 'Your request is currently being processed. We appreciate your patience and will notify you as soon as it\'s ready!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b>
					</p>
					<p>
						<b><?php _e( 'Actions you can perform: ', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?><a href="<?php echo $reload_page; ?>"><?php _e( 'Reload Page', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></a></b>
					</p>
				</div>
				<?php
			}
		} else {

			// Get the API response data from the option 'beucw_ai_request_logs'.
			$api_response_data = get_option( 'beucw_ai_request_logs' );

			// Handle different API response cases.
			switch ( $api_response_data['openai_response'] ) {

				// Case 1: Insufficient quota.
				case 'insufficient_quota':
					?>
					<div class="notice notice-error is-dismissible">
						<p><b><?php _e( 'Bulk Edit Upsells and Cross-Sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b></p>
						<p>
							<b>
								<?php _e( 'We\'re sorry, but your current request could not be processed due to insufficient quota remaining on your API key. It appears that you have used up most of your allocated quota. Please check your API usage or consider upgrading your plan.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
							</b>
						</p>
					</div>
					<?php
					break;

				// Case 2: Incorrect API key.
				case 'incorrect_api':
					?>
					<div class="notice notice-error is-dismissible">
						<p><b><?php _e( 'Bulk Edit Upsells and Cross-Sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b></p>
						<p>
							<b>
								<?php _e( 'Your API Key is incorrect! Please double-check your entry and try again.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
							</b>
						</p>
					</div>
					<?php
					break;

				// Case 3: API system overloaded.
				case 'system_overloaded':
					?>
					<div class="notice notice-error is-dismissible">
						<p><b><?php _e( 'Bulk Edit Upsells and Cross-Sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b></p>
						<p>
							<b>
								<?php _e( 'Unfortunately, we were unable to fulfill your request at this time because the API system is currently experiencing heavy load. Our servers are working at full capacity. Please try again in a few moments when the system has stabilized.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
							</b>
						</p>
					</div>
					<?php
					break;

				// Default case: Successful response with recommendations.
				default:
					if ( isset( $api_response_data['openai_response']['choices'] ) ) {

						?>
						<div class="notice notice-success is-dismissible">
							<p><b><?php _e( 'Bulk Edit Upsells and Cross-Sells for WooCommerce', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?></b></p>
							<p>
								<b>
									<?php _e( 'Your request has been successfully fulfilled!', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
								</b>
							</p>
						</div>
						<?php
						// Reset the hit button option to ensure the notice is not displayed again after rendering.
						update_option( 'beucw_prompt_request_button_hit', 0 );
						update_option( 'beucw_display_ai_request_notice', 'no' );
					}
					break;
			}
		}
	}
}

/**
 * Save Bulk Edit Upsells and Cross-Sells for WooCommerces recommendations from AI.
 *
 * This function processes AI recommendations from the OpenAI response, extracts the Bulk Edit Upsells and Cross-Sells for WooCommerces,
 * and saves them as Bulk Edit Upsells and Cross-Sells for WooCommerces for the specified product. The function also updates various options
 * and metadata based on the AI response.
 */
function beucw_save_product_data() {

	// Retrieve the AI request logs stored in the 'beucw_ai_request_logs' option.
	$product_data = get_option( 'beucw_ai_request_logs' );

	// Check if 'choices' exist in the OpenAI response.
	if ( isset( $product_data['openai_response']['choices'] ) ) {

		// Extract the final response data (content) from the first choice.
		$final_data = $product_data['openai_response']['choices'][0]['message']['content'];

		// Clean up the final data by removing unwanted 'json' and '```' characters.
		$ai_recommendations = str_replace( 'json', '', $final_data );
		$ai_recommendations = str_replace( '```', '', $ai_recommendations );

		// Decode the cleaned AI recommendations as a JSON object.
		$recommendations_data = json_decode( $ai_recommendations, true );

		// If the decoded recommendations data is not empty, process the data.
		if ( ! empty( $recommendations_data ) ) {

			// Loop through each key-value pair in the recommendations data.
			foreach ( $recommendations_data as $key => $item ) {

				$upsells_data     = array();
				$cross_sells_data = array();

				$product = wc_get_product( $key );

				// Iterate all upsells product.
				foreach ( $item['upsells'] as $upsell ) {
					array_push( $upsells_data, $upsell );
				}

				// Iterate all cross-sells products.
				foreach ( $item['cross-sells'] as $cross_sell ) {
					array_push( $cross_sells_data, $cross_sell );
				}

				// To save all selected products for upsell.
				$upsells_product_ids    = array_map( 'intval', $upsells_data );
				$cross_sell_product_ids = array_map( 'intval', $cross_sells_data );

				$product->set_upsell_ids( $upsells_product_ids );
				$product->set_cross_sell_ids( $cross_sell_product_ids );

				$product->save();

			}
		}
	}

	// Update the status options to indicate that the API request and response have been fulfilled.
	update_option( 'beucw_api_request_created_status', 'fulfilled' );
}

// Added HPOS Compatibility.
add_action(
	'before_woocommerce_init',
	function() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);

// ---------------------------------------------------------------- New Feature Notice ------------------------------------------------------.

// add_action( 'admin_notices', 'beucw_updated_features_admin_notice' );

/**
 * Related pro new update notice.
 */
function beucw_updated_features_admin_notice() {

	// Check if the notice has been dismissed.
	$current_version = '3.0.0';

	// Check the user meta.
	if ( metadata_exists( 'user', get_current_user_id(), 'beucw_latest_version_read_message' ) ) {

		$beucw_notice_user_meta = get_user_meta( get_current_user_id(), 'beucw_latest_version_read_message', true );
		$notice_read_version    = $beucw_notice_user_meta['version'];

		if ( $notice_read_version != $current_version ) {
			$beucw_show_notice = true;
		} else {
			$beucw_show_notice = false;
		}
	} else {
		$beucw_show_notice = true;
	}

	if ( ! $beucw_show_notice ) {
		return;
	}
	?>

	<!-- Notice div -->
	<div class="notice notice-warning is-dismissible beucw-custom-notice" data-notice="beucw_new_features_notice">
		<h3>
			<?php echo esc_html__( '🎉 Exciting New AI Features in Bulk Edit Upsells and Cross-Sells for WooCommerce (v3.0.0) !', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
		</h3>

		<?php echo esc_html__( 'We’ve just rolled out some amazing AI-driven enhancements using Chat GPT in version 3.0.0! These updates will help you offer relevant product recommendations to your customers, driving more conversions and enhancing the shopping experience.', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>

		<h4>What’s New:</h4>
		<ul>
			<li>&#x2022; AI-powered related product suggestions tailored to your store.</li>
			<li>&#x2022; Get best UpSells & Cross-sells suggestions by leveraging ChatGPT.</li>
			<li>&#x2022; Improved recommendation accuracy, driving more relevant product discovery.</li>
		</ul>

		<a style="text-decoration:none;">
			<button style="cursor:pointer;" class="beucw-notice-button" onclick="window.open('https://www.saffiretech.com/blog/how-to-get-ai-product-suggestions-for-related-products-in-woocommerce?utm_source=wp_plugin&utm_medium=notice&utm_campaign=blog&utm_id=c1&utm_term=ai_update&utm_content=beucw', '_blank')">
				<svg fill="#FFD700" height="24px" width="24px" version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M12,17c0.8-4.2,1.9-5.3,6.1-6.1c0.5-0.1,0.8-0.5,0.8-1s-0.3-0.9-0.8-1C13.9,8.1,12.8,7,12,2.8C11.9,2.3,11.5,2,11,2 c-0.5,0-0.9,0.3-1,0.8C9.2,7,8.1,8.1,3.9,8.9C3.5,9,3.1,9.4,3.1,9.9s0.3,0.9,0.8,1c4.2,0.8,5.3,1.9,6.1,6.1c0.1,0.5,0.5,0.8,1,0.8 S11.9,17.4,12,17z"></path> <path d="M22,24c-2.8-0.6-3.4-1.2-4-4c-0.1-0.5-0.5-0.8-1-0.8s-0.9,0.3-1,0.8c-0.6,2.8-1.2,3.4-4,4c-0.5,0.1-0.8,0.5-0.8,1 s0.3,0.9,0.8,1c2.8,0.6,3.4,1.2,4,4c0.1,0.5,0.5,0.8,1,0.8s0.9-0.3,1-0.8c0.6-2.8,1.2-3.4,4-4c0.5-0.1,0.8-0.5,0.8-1 S22.4,24.1,22,24z"></path> <path d="M29.2,14c-2.2-0.4-2.7-0.9-3.1-3.1c-0.1-0.5-0.5-0.8-1-0.8c-0.5,0-0.9,0.3-1,0.8c-0.4,2.2-0.9,2.7-3.1,3.1 c-0.5,0.1-0.8,0.5-0.8,1s0.3,0.9,0.8,1c2.2,0.4,2.7,0.9,3.1,3.1c0.1,0.5,0.5,0.8,1,0.8c0.5,0,0.9-0.3,1-0.8 c0.4-2.2,0.9-2.7,3.1-3.1c0.5-0.1,0.8-0.5,0.8-1S29.7,14.1,29.2,14z"></path> <path d="M5.7,22.3C5.4,22,5,21.9,4.6,22.1c-0.1,0-0.2,0.1-0.3,0.2c-0.1,0.1-0.2,0.2-0.2,0.3C4,22.7,4,22.9,4,23s0,0.3,0.1,0.4 c0.1,0.1,0.1,0.2,0.2,0.3c0.1,0.1,0.2,0.2,0.3,0.2C4.7,24,4.9,24,5,24c0.1,0,0.3,0,0.4-0.1s0.2-0.1,0.3-0.2 c0.1-0.1,0.2-0.2,0.2-0.3C6,23.3,6,23.1,6,23s0-0.3-0.1-0.4C5.9,22.5,5.8,22.4,5.7,22.3z"></path> <path d="M28,7c0.3,0,0.5-0.1,0.7-0.3C28.9,6.5,29,6.3,29,6s-0.1-0.5-0.3-0.7c-0.1-0.1-0.2-0.2-0.3-0.2c-0.2-0.1-0.5-0.1-0.8,0 c-0.1,0-0.2,0.1-0.3,0.2C27.1,5.5,27,5.7,27,6c0,0.3,0.1,0.5,0.3,0.7C27.5,6.9,27.7,7,28,7z"></path> </g> </g></svg>
				<?php echo esc_html__( ' Learn More About AI Suggestions', 'bulk-edit-upsells-and-cross-sells-for-woocommerce' ); ?>
			</button>
		</a>
	</div>
	<?php
}

// add_action( 'wp_ajax_beucw_update_new_feature_notice_read', 'beucw_update_new_feature_notice_read_callback' );
// add_action( 'wp_ajax_nopriv_beucw_update_new_feature_notice_read', 'beucw_update_new_feature_notice_read_callback' );

/**
 * Update meta on dismiss.
 */
function beucw_update_new_feature_notice_read_callback() {

	// Current version.
	$current_version = '3.0.0';

	// Get current user id.
	$current_user_id = get_current_user_id();

	$beucw_notice_status = array(
		'beucw_update_notice_read' => 'read',
		'version'                  => $current_version,
	);

	update_user_meta( $current_user_id, 'beucw_latest_version_read_message', $beucw_notice_status );

	echo 'status_updated';
	wp_die();
}

// --------------------------------------------------- END --------------------------------------------------------.
