<?php
/**
 * @package Make Builder
 */

/**
 * Custom plugin row actions definitions.
 *
 * @since 1.0.0
 */
$plugin_actions = array(
	'upgrade' => array(
		'uri' => 'https://thethemefoundry.com/wordpress-plugins/make-builder/',
		'label' => 'Upgrade to Make Plus',
		'color' => '#46b450',
	),

	'help' => array(
		'uri' => 'https://thethemefoundry.com/docs/make-docs/',
		'label' => 'Help guide',
		'color' => '#0073aa',
	),
);

function make_builder_is_plus_active() {
	return defined( 'MAKEPLUS_VERSION' );
}

/**
 * Add the Help link to the plugin row.
 *
 * @since 1.0.0
 *
 * @hooked filter plugin_row_meta
 *
 * @return array           Modified plugin row meta.
 */
function make_builder_plugin_row_meta( $plugin_meta, $plugin_file, $plugin_data, $status ) {
	if ( make_get_plugin_basename() === $plugin_file ) {
		global $plugin_actions;
		extract( $plugin_actions['help'] );

		$plugin_meta[ count( $plugin_meta ) ] = '<a href="' . $uri . '" title="' . esc_attr__( $label, 'make-builder' ) . '" style="color:' . $color . ';" target="_blank">' . __( $label, 'make-builder' ) . '</a>';
	}

	return $plugin_meta;
}

add_filter( 'plugin_row_meta', 'make_builder_plugin_row_meta', 10, 4 );

/**
 * Add upgrade action to the plugin row.
 *
 * @since 1.0.0
 *
 * @hooked filter plugin_action_links
 *
 * @return array           Modified plugin row meta.
 */
function make_builder_plugin_action_links( $actions, $plugin_file ) {
	if ( make_get_plugin_basename() === $plugin_file && ! make_builder_is_plus_active() ) {
		global $plugin_actions;
		extract( $plugin_actions['upgrade'] );

		$actions[] = '<a href="' . $uri . '" title="' . esc_attr__( $label, 'make-builder' ) . '" style="color:' . $color . ';" target="_blank">' . __( $label, 'make-builder' ) . '</a>';
	}

	return $actions;
}

add_filter( 'plugin_action_links', 'make_builder_plugin_action_links', 10, 2 );


/**
 * Ajax callback for the subscribe form submission.
 *
 * @since 1.0.0
 *
 * @hooked action wp_ajax_make-builder-subscribe
 *
 * @return void
 */
function make_builder_ajax_subscribe() {
	$url = ( isset( $_POST['url'] ) ) ? $_POST['url'] : '';
	$url = esc_url( $url );
	$email = ( isset( $_POST['email'] ) ) ? $_POST['email'] : '';
	$email = sanitize_email( $email );

	if ( $email ) {
		// @link http://stackoverflow.com/a/6609181
		$data = array(
			'cm-utkykyi-utkykyi' => $email,
		);

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query( $data ),
			),
		);

		$context  = stream_context_create( $options );
		$result = file_get_contents( $url, false, $context );

		wp_send_json_success( $result );
	}

	wp_send_json_error();
}

add_action( 'wp_ajax_make-builder-subscribe', 'make_builder_ajax_subscribe' );

/**
 * Output subscribe form styles.
 *
 * @since 1.0.0
 *
 * @hooked admin_head-plugins.php
 *
 * @return void
 */
function make_builder_subscribe_styles() {
	?>
	<style>
	#make-builder-subscribe-form {
		margin-top: 30px;
	}

	#make-builder-subscribe-email {
		margin: 0;
		width: 280px;
		font-size: 13px;
		line-height: 1.5;
		padding: 13px 9px;
		height: 40px;
	}
	</style>
	<?php
}

add_action('admin_head-plugins.php','make_builder_subscribe_styles');

/**
 * Output subscribe form scripts.
 *
 * @since 1.0.0
 *
 * @hooked admin_footer-plugins.php
 *
 * @return void
 */
function make_builder_subscribe_scripts() {
	?>
	<script type="application/javascript">
	/* Make campaign form handler */
	/* <![CDATA[ */
	( function( $ ) {
		$( document ).ready( function() {
			$( '#make-builder-subscribe-email' ).focus();
		} );

		$( 'body' ).on( 'submit', '#make-builder-subscribe-form', function( e ) {
			e.preventDefault();

			var $target = $( e.target );

			// Campaign handler
			var url = $target.attr( 'action' );
			var email = $( '#make-builder-subscribe-email' ).val();

			var data = {
				action: 'make-builder-subscribe',
				url: url,
				email: email,
			};

			// Form action
			jQuery.post( ajaxurl, data );

			// Notice dismiss handler
			var $parent = $target.parents( '.notice' ).first();
			var id = $parent.attr( 'id' ).replace( 'make-notice-', '' );
			var nonce = $parent.data( 'nonce' );

			// Dismiss action
			$.post( ajaxurl, {
				action: 'make_hide_notice',
				nid: id,
				nonce: nonce
			}, function() {
				$parent.fadeOut();
			} );
		} );
	} )( jQuery );
	/* ]]> */
    </script>
	<?php
}

add_action( 'admin_footer-plugins.php', 'make_builder_subscribe_scripts' );
