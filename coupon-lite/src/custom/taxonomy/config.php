<?php
/**
 * Taxonomy Generator
 *
 * Package  CouponPlugin\Custom\Taxonomy
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\Taxonomy;

add_action( 'save_post_coupon', __NAMESPACE__.'\save_coupon_store_meta_box' );
/**
 * Custom Taxonomy Generator
 *
 * @since 1.0.0
 *
 * @param  string $post_type post type name
 * @param  string $taxonomy_name taxonomy type name
 * @param  string $singular_name display singular name of taxonomy
 * @param  string $plural_name display plural name of taxonomy
 *
 * @return void
 */
function register_custom_taxonomy( $post_type, $taxonomy_name, $singular_name, $plural_name ) {

	$args = array(
		'labels'            => get_label_name( $singular_name, $plural_name ),
		'public'            => false,
		'show_ui'           => true,
		'rewrite'           => false,
		'hierarchical'      => true,
		'show_admin_column' => true,
	);
	if ( $taxonomy_name == 'coupon-store' ) {
		$args['meta_box_cb'] = __NAMESPACE__.'\cp_term_radio_listing';
	}
	register_taxonomy( $taxonomy_name, $post_type, $args );

}

/**
 * Custom Taxonomy Label Generator
 *
 * @since 1.0.0
 *
 * @param  string $singular_name display singular name of taxonomy
 * @param  string $plural_name display plural name of taxonomy
 *
 * @return array $labels
 */
function get_label_name( $singular_name, $plural_name ) {
	$labels = array(
		'name'                       => _x( $plural_name, 'taxonomy general name', COUPON_PLUGIN_TEXT_DOMAIN ),
		'singular_name'              => _x( $singular_name, 'taxonomy singular name', COUPON_PLUGIN_TEXT_DOMAIN ),
		'search_items'               => __( "Search {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'popular_items'              => __( "Popular {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'all_items'                  => __( "All {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( "Edit {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'view_item'                  => __( "View {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'update_item'                => __( "Update {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'add_new_item'               => __( "Add New {$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'new_item_name'              => __( "New {$singular_name} Name", COUPON_PLUGIN_TEXT_DOMAIN ),
		'separate_items_with_commas' => __( "Separate {$plural_name} with commas", COUPON_PLUGIN_TEXT_DOMAIN ),
		'add_or_remove_items'        => __( "Add or remove {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'choose_from_most_used'      => __( "Choose from the most used {$plural_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
		'not_found'                  => __( "No {$plural_name} found.", COUPON_PLUGIN_TEXT_DOMAIN ),
		'menu_name'                  => __( "{$singular_name}", COUPON_PLUGIN_TEXT_DOMAIN ),
	);

	return $labels;
}

/**
 * Custom Taxonomy Store Listing Change into Radio
 *
 * @since 1.0.0
 *
 * @param  object $post post object for the current edit screen
 * @param  array $box addition data as array
 *
 * @return void
 */
function cp_term_radio_listing( $post, $box ) {
	$terms  = get_terms( 'coupon-store', array( 'hide_empty' => false ) );
	$stores = wp_get_object_terms( $post->ID, 'coupon-store', array( 'orderby' => 'term_id', 'order' => 'ASC' ) );
	$name   = '';
	if ( ! is_wp_error( $stores ) ) {
		if ( isset( $stores[0] ) && isset( $stores[0]->name ) ) {
			$name = $stores[0]->name;
		}
	} ?>
    <div class="store-list-box" style="max-height: 200px; overflow: auto;">
		<?php foreach ( $terms as $term ) {
			?>
            <label title='<?php esc_attr_e( $term->name ); ?>'>
                <input type="radio" name="coupon-store"
                       value="<?php esc_attr_e( $term->name ); ?>" <?php checked( $term->name, $name ); ?>>
                <span><?php esc_html_e( $term->name ); ?></span>
            </label><br>
			<?php
		} ?>
    </div>
	<?php
}

/**
 * Radio Button Taxonomy Save with Coupon
 *
 * @since 1.0.0
 *
 * @param  string $post_id id of the current post/coupon
 *
 * @return void
 */
function save_coupon_store_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['coupon-store'] ) ) {
		return;
	}
	$store = sanitize_text_field( $_POST['coupon-store'] );

	// A valid rating is required, so don't let this get published without one
	if ( empty( $store ) ) {
		// unhook this function so it doesn't loop infinitely
		remove_action( 'save_post_coupon', 'save_coupon_store_meta_box' );
		$postdata = array(
			'ID'          => $post_id,
			'post_status' => 'draft',
		);
		wp_update_post( $postdata );
	} else {
		$term = get_term_by( 'name', $store, 'coupon-store' );
		if ( ! empty( $term ) && ! is_wp_error( $term ) ) {
			wp_set_object_terms( $post_id, $term->term_id, 'coupon-store', false );
		}
	}
}

