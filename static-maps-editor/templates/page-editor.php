<?php
/**
 * The Static Maps Editor - missing privacy policy settings partial
 *
 * @since   1.0.0
 * @package Static_Maps_Editor
 * @author  Printmaps
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$static_maps_editor_data = array(
	'language'    => get_bloginfo( 'language' ),
	'api_key'     => get_option( 'static_maps_editor_uid', false ),
	'origin'      => get_site_url(),
	'size_width'  => (float) get_option( 'static_maps_editor_size_width', Static_Maps_Editor::STATIC_MAPS_EDITOR_DEFAULT_SIZE_WIDTH ),
	'size_height' => (float) get_option( 'static_maps_editor_size_height', Static_Maps_Editor::STATIC_MAPS_EDITOR_DEFAULT_SIZE_HEIGHT ),
	'media_url'   => admin_url( 'upload.php?item=' ),
);

// we use here base64_encode to pack the setting for the call to the Static Maps Editor.
// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
$static_maps_editor_data = base64_encode( http_build_query( $static_maps_editor_data, '', '&', PHP_QUERY_RFC3986 ) );

?>
<iframe id="static_maps_editor_editor_iframe" class="static_maps_editor-editor-iframe" src="<?php echo esc_url( sprintf( '%s/?data=%s', Static_Maps_Editor::STATIC_MAPS_EDITOR_SERVER, $static_maps_editor_data ) ); ?>"></iframe>
<script>
	window.addEventListener('message', (event) => {
			if (!Printmaps.__static_maps_editor_is_valid_event(event)) {
				return; // This is not coming from us
			} else {
				Printmaps.__static_maps_editor_add_media(event);
			}
		},
		false,
	);

	var Printmaps = window.Printmaps || {};
	Printmaps.__static_maps_editor_is_valid_event = (event) => {
		const origin = '<?php echo esc_html( Static_Maps_Editor::STATIC_MAPS_EDITOR_SERVER ); ?>' === event.origin;
		const type_data = 'object' === typeof event.data;
		const type_data_attribution = 'boolean' === typeof event.data.attribution;
		const type_data_map = 'string' === typeof event.data.map;
		return origin && type_data && type_data_attribution && type_data_map;
	}

	Printmaps.__static_maps_editor_add_media_callback = (data, event) => {
		event.source.postMessage(data, event.origin);
	}
	Printmaps.__static_maps_editor_add_media = (event) => {
		const error_obj = JSON.stringify({
			status: 500,
			message: null,
			post_id: null,
		});
		jQuery.post({
			url: ajaxurl,
			data: {
				static_maps_editor_add_media_nonce: '<?php echo esc_html( wp_create_nonce( 'static_maps_editor_add_media' ) ); ?>',
				action: "static_maps_editor_add_media",
				map: event.data
			},
			success: (data) => { Printmaps.__static_maps_editor_add_media_callback(data, event); },
			error: (data) => { Printmaps.__static_maps_editor_add_media_callback(error_obj, event); }
		});
	}
</script>

