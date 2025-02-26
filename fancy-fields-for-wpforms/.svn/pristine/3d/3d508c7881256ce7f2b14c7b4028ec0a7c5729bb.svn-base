<?php
/**
 * Fancy Fields For WPForms Core Functions
 *
 * General core functions available on both the front-end and admin.
 *
 * @package Fancy Fields For WPForms/Functions
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_enqueue_scripts', 'ffwp_enqueue_scripts', 10000 );
add_action( 'admin_notices', 'ffwp_recommended_plugin', 10000 );
add_action( 'admin_init', 'ffwp_update_dismiss_notification' );
add_action( 'wp_ajax_fancy_fields_for_wpforms_deactivation_notice', 'ffwp_deactivation_notice' );
add_action( 'wp_ajax_fancy_fields_for_wpforms_send_deactivation_email', 'ffwp_deactivation_email' );
add_filter( 'wpforms_builder_fields_buttons', 'ffwp_add_group' );
add_action( 'wp_enqueue_scripts', 'ffwp_load_scripts' );

/**
 * Load FlatPickr on frontend.
 *
 * @todo : Load conditionally only when the form has date field.
 * @since 1.0.5.1
 */
function ffwp_load_scripts() {

	wp_enqueue_style(
		'wpforms-flatpickr',
		WPFORMS_PLUGIN_URL . 'assets/css/flatpickr.min.css',
		array(),
		'2.3.4'
	);

	wp_enqueue_script(
		'wpforms-flatpickr',
		WPFORMS_PLUGIN_URL . 'assets/js/flatpickr.min.js',
		array( 'jquery' ),
		'2.3.4',
		true
	);
}
/**
 * Add Unlocked fancy fields group.
 *
 * @return array
 */
function ffwp_add_group( $fields ) {
	$unlocked_fancy = array(
		'unlocked_fancy' =>
			array(
				'group_name' => esc_html__( 'Unlocked Fancy Fields', 'fancy-fields-for-wpforms' ),
				'fields'     => array(),
			),
		);

	$fields = ffwp_insert_after_helper( $fields, $unlocked_fancy, 'fancy' );

	return $fields;
}

/**
 * Updates the dismiss notification by adding ffwp_notice_skipped.
 *
 * @return Void.
 */
function ffwp_update_dismiss_notification() {

	if( isset( $_GET['ffwp_dismissed'] ) ) {
		update_option( 'ffwp_notice_skipped', 'yes' );
	}
}

/**
 * Notice for recommending Fancy Fields For WPForms plugin.
 *
 * @return void
 */
function ffwp_recommended_plugin() {

	$skipped = get_option( 'ffwp_notice_skipped');

	if( ! defined( 'WPFE_VERSION' ) && $skipped !== 'yes' ) {
		/* translators: %s: Fancy Fields For WPForms  plugin link */
		echo '<div class="updated notice is-dismissible"><p>' . sprintf( esc_html__( 'Thank you for using Fancy Fields For WPForms! %s plugin is recommended!', 'fancy-fields-for-wpforms' ), '<a href="https://wordpress.org/plugins/entries-for-wpforms/" target="_blank">' . esc_html__( 'Entries For WPForms', 'fancy-fields-for-wpforms' ) . '</a>' ) . '</p>
			<a href="https://downloads.wordpress.org/plugin/entries-for-wpforms.zip">Download Plugin</a>
			<a class="ffwp_notice_skip" href="'.esc_url_raw( add_query_arg( array( 'ffwp_dismissed' => 1 ), admin_url( 'plugins.php' ) ) ).'">Dismiss Notice</a>
			<p></p>
			</div>';
	}
}

/**
 * Enqueue Fancy Fields For WPForms Scripts.
 *
 * @return void.
 */
function ffwp_enqueue_scripts() {
	$screen_id = get_current_screen()->id;

	wp_enqueue_style( 'ffwp-style', plugins_url( 'assets/css/ffwp.css', FANCY_FIELDS_FOR_WPFORMS ), array(), FFWP_VERSION, $media = 'all' );

	if( 'plugins' === $screen_id ) {
		wp_enqueue_script( 'fancy-fields-for-wpforms-js', plugins_url( 'assets/js/ffwp.js', FANCY_FIELDS_FOR_WPFORMS ), array(), FFWP_VERSION, false );
		wp_enqueue_script( 'sweetalert', plugins_url( 'assets/js/sweetalert.min.js', FANCY_FIELDS_FOR_WPFORMS ), array(), FFWP_VERSION, false );
		wp_localize_script( 'fancy-fields-for-wpforms-js', 'ffwp_plugins_params', array(
			'ajax_url'           => admin_url( 'admin-ajax.php' ),
			'deactivation_nonce' => wp_create_nonce( 'deactivation-notice' ),
			'deactivating'		 => __( 'Deactivating...', 'fancy-fields-for-wpforms' ),
			'error'				 => __( 'Error!', 'fancy-fields-for-wpforms' ),
			'success'			 => __( 'Success!', 'fancy-fields-for-wpforms' ),
			'deactivated'		 => __( 'Plugin Deactivated!', 'fancy-fields-for-wpforms' ),
			'sad_to_see'		 => __( 'Sad to see you leave!', 'fancy-fields-for-wpforms' ),
			'wrong'				 => __( 'Oops! Something went wrong', 'fancy-fields-for-wpforms' ),
		));
	}
}

/**
 * Unlocking fields
 *
 * @return array
 */
function ffwp_unlocking_fields() {
	return array(
			'url', 'divider', 'date-time', 'file-upload', 'phone', 	// Deprecated types @since 1.0.5.
			'country', 'f-url', 'f-divider', 'f-date-time', 'f-file-upload', 'f-phone',
		);
}

/**
 * Plugin deactivation notice.
 *
 * @since  1.0.0
 */
function ffwp_deactivation_notice( ) {

	check_ajax_referer( 'deactivation-notice', 'security' );

	ob_start();
	global $status, $page, $s;
	$deactivate_url = wp_nonce_url( 'plugins.php?action=deactivate&amp;plugin=' . FANCY_FIELDS_FOR_WPFORMS . '&amp;plugin_status=' . $status . '&amp;paged=' . $page . '&amp;s=' . $s, 'deactivate-plugin_' . FANCY_FIELDS_FOR_WPFORMS );

	?>
		<!-- The Modal -->
		<div id="fancy-fields-for-wpforms-modal" class="fancy-fields-for-wpforms-modal">

			 <!-- Modal content -->
			 <div class="fancy-fields-for-wpforms-modal-content">
			    <div class="fancy-fields-for-wpforms-modal-header">
			    </div>

			    <div class="fancy-fields-for-wpforms-modal-body">
					<div class="container">
					  	<form method="post" id="fancy-fields-for-wpforms-send-deactivation-email">

							<div class="row">
									<h3 for=""><?php echo __( 'Would you care to let me know the deactivation reason so that I can improve it for you?', 'fancy-fields-for-wpforms');?></h3>
								<div class="col-75">
									<textarea id="message" name="message" placeholder="Deactivation Reason?" style="height:150px"></textarea>
								</div>
							</div>
							<div class="row">
									<?php wp_nonce_field( 'fancy_fields_for_wpforms_send_deactivation_email', 'fancy_fields_for_wpforms_send_deactivation_email' ); ?>
									<a href="<?php echo $deactivate_url;?>"><?php echo __( 'Skip and deactivate', 'fancy-fields-for-wpforms' );?>
									<input type="submit" id="ffwp-send-deactivation-email" value="Deactivate">
							</div>
					  </form>
					</div>

			    <div class="fancy-fields-for-wpforms-modal-footer">
			    </div>
			 </div>
		</div>

	<?php

	$content = ob_get_clean();
	wp_send_json( $content ); // WPCS: XSS OK.
}

/**
 * Insert in between the indexes in multidimensional array.
 *
 * @since  1.5.7
 * @param  array $items      An array of items
 * @param  array $new_items  New items to insert inbetween
 * @param  string $after     Index to insert after
 *
 * @return array 			 Ordered array of items.
 */
function ffwp_insert_after_helper( $items, $new_items, $after ) {

	// Search for the item position and +1 since is after the selected item key.
	$position = array_search( $after, array_keys( $items ) ) + 1;

	// Insert the new item.
	$return_items = array_slice( $items, 0, $position, true );
	$return_items += $new_items;
	$return_items += array_slice( $items, $position, count( $items ) - $position, true );

    return $return_items;
}

/**
 * Deactivation Email.
 *
 * @since  1.0.0
 *
 * @return void
 */
function ffwp_deactivation_email() {

	check_ajax_referer( 'fancy_fields_for_wpforms_send_deactivation_email', 'security' );

	$message = sanitize_textarea_field( $_POST['message'] );

	if( ! empty( $message ) ) {
		wp_mail( 'sanzeeb.aryal@gmail.com', 'Fancy Fields For WPForms Deactivation', $message );
	}

	deactivate_plugins( FANCY_FIELDS_FOR_WPFORMS );
}

