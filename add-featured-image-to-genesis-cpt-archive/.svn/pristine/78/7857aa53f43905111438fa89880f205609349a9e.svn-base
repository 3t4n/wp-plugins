<?php
/*
Plugin Name: Add Featured Image to Genesis CPT Archive
Description: Adds an image uploader to the custom post type archive settings page in Genesis, which can be used in theme development.
Version:     2.0
Author:      Road Warrior Creative
Author URI:  http://roadwarriorcreative.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

//* Prevent direct access to the plugin
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

//* Require minimum version of Genesis as active parent theme or disallow plugin activation
register_activation_hook( __FILE__, 'rwc_genesis_cpt_image_required_activation' );
function rwc_genesis_cpt_image_required_activation() {
		$latest = '2.0.2';
		if ( 'genesis' != get_option( 'template' ) ) {
			//* Deactivate ourself
			deactivate_plugins( plugin_basename( __FILE__ ) );
			wp_die( sprintf( __( 'Sorry, you can\'t activate unless you have installed <a href="%s">Genesis</a>', 'add-genesis-cpt-archive-image' ), 'https://my.studiopress.com/themes/genesis/' ) );
		}
		if ( version_compare( wp_get_theme( 'genesis' )->get( 'Version' ), $latest, '<' ) ) {
			//* Deactivate ourself
			deactivate_plugins( plugin_basename( __FILE__ ) ); /** Deactivate ourself */
			wp_die( sprintf( __( 'Sorry, you cannot activate without <a href="%s">Genesis %s</a> or greater', 'add-genesis-cpt-archive-image' ), 'http://www.studiopress.com/support/showthread.php?t=19576', $latest ) );
		}
}

// * Loads the image management javascript
add_action( 'admin_enqueue_scripts', 'rwc_image_enqueue' );
function rwc_image_enqueue() {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . '/js/meta-box-image.js', array( 'jquery' ) );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload an Image', 'genesis' ),
                'button' => __( 'Use this image', 'genesis' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
}

//* Add no_html sanitization type defined in Genesis
add_action( 'genesis_settings_sanitizer_init', 'rwc_register_sanitization_filters' );
function rwc_register_sanitization_filters() {
	genesis_add_option_filter( 
		'no_html', 
		GENESIS_SETTINGS_FIELD,
		array(
			'rwc_cpt_featured_img',
		) 
	);
}

//* Add the featured image meta box
add_action( 'genesis_cpt_archives_settings_metaboxes', 'rwc_add_genesis_cpt_img_metabox' );
function rwc_add_genesis_cpt_img_metabox( $_genesis_cpt_settings_pagehook ) {
    add_meta_box( 'rwc-cpt-archives-feature-img', __( 'Featured Image', 'genesis' ),  'rwc_archive_img_box', $_genesis_cpt_settings_pagehook, 'main', 'high' );
}

function rwc_archive_img_box() {
  $settings_field = GENESIS_CPT_ARCHIVE_SETTINGS_FIELD_PREFIX . $_GET['post_type'];
  $cpt_feat_img = genesis_get_option( 'rwc_cpt_featured_img', $settings_field );
?>
<table class="form-table">
<tbody>
    <tr valign="top">
        <th scope="row"><label for="<?php echo $settings_field; ?>[rwc_cpt_featured_img]"><b><?php _e( 'Upload Featured Image', 'genesis' )?></b></label></th>
        <td>
            <p>
                <input type="text" name="<?php echo $settings_field; ?>[rwc_cpt_featured_img]" class="cpt-featured-img-url" id="<?php echo $settings_field; ?>[rwc_cpt_featured_img]" value="<?php if ( $cpt_feat_img ) echo $cpt_feat_img; ?>" />
                <input type="button" id="cpt-featured-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
            </p>

        </td>
    </tr>

</tbody>
</table>

<?php
}