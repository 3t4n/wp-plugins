<?php

namespace WooCommerceVariationSwatches\Admin;

defined( 'ABSPATH' ) || exit();

/**
 * Admin class.
 *
 * @since 1.1.0
 * @package WooCommerceVariationSwatches\Admin
 */
class Admin {

	/**
	 * Admin constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_init', array( $this, 'setup_attribute_hooks' ) );
		add_action( 'woocommerce_product_option_terms', array( $this, 'product_option_terms' ), 10, 2 );
		add_filter( 'admin_footer_text', array( $this, 'admin_footer_text' ), PHP_INT_MAX );
		add_filter( 'update_footer', array( $this, 'update_footer' ), PHP_INT_MAX );
	}

	/**
	 * Enqueue scripts
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function enqueue_scripts() {
		WCVS()->scripts->register_style( 'wcvs-admin', 'css/admin.css' );
		WCVS()->scripts->register_script( 'wcvs-admin', 'js/admin.js' );

		// Localize Scripts.
		wp_localize_script(
			'wcvs-admin',
			'wcvs_object',
			array(
				'ajaxurl'         => admin_url( 'admin-ajax.php' ),
				'placeholder_img' => WC()->plugin_url() . '/assets/images/placeholder.png',
				'nonce'           => 'wcvs_nonce',
			)
		);

		// Enqueue media uploader.
		wp_enqueue_media();

		// Enqueue Styles.
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'wcvs-admin' );

		// Enqueue Scripts.
		wp_enqueue_script( 'wcvs-admin' );
	}

	/**
	 * Set all the hooks for adding fields to attribute screen.
	 * Save new term meta on term save.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function setup_attribute_hooks() {
		$attribute_taxonomies = wc_get_attribute_taxonomies();

		if ( empty( $attribute_taxonomies ) ) {
			return;
		}

		// loop through all attribute taxonomies and add hooks.
		foreach ( $attribute_taxonomies as $attribute_taxonomy ) {
			$attribute_name = wc_attribute_taxonomy_name( $attribute_taxonomy->attribute_name );

			if ( empty( $attribute_name ) ) {
				continue;
			}

			// Add hooks for attribute add new form fields.
			add_action( $attribute_name . '_add_form_fields', array( $this, 'add_attribute_fields' ) );
			// Add hooks for attribute edit form fields.
			add_action( $attribute_name . '_edit_form_fields', array( $this, 'edit_attribute_fields' ), 10, 2 );

			add_filter( 'manage_edit-' . $attribute_name . '_columns', array( $this, 'add_attribute_columns' ) );
			add_filter( 'manage_' . $attribute_name . '_custom_column', array( $this, 'add_attribute_column_content' ), 10, 3 );
		}

		add_action( 'created_term', array( $this, 'save_term_meta' ) );
		add_action( 'edit_term', array( $this, 'save_term_meta' ) );
	}

	/**
	 * add attribute fields to attribute term screen
	 *
	 * @param string $taxonomy Taxonomy name.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_attribute_fields( $taxonomy ) {
		$attribute_tax = wcvs_get_attr_tax_by_name( $taxonomy );
		?>
		<div class="form-field term-slug-wrap">
			<label for="tag-slug" style="margin: 10px 0;"><?php echo esc_html( wcvs_get_attribute_field_label( $attribute_tax->attribute_type ) ); ?></label>

			<?php
			wcvs_get_attribute_fields( $attribute_tax->attribute_type, null );
			do_action( 'wc_variation_swatches_add_edit_hover_image', $attribute_tax->attribute_type, false );
			?>
		</div>

		<script>
			jQuery(document).ajaxComplete(function (event, request, options) {

				if (request && 4 === request.readyState && 200 === request.status
					&& options.data && 0 <= options.data.indexOf('action=add-tag')) {

					var res = wpAjax.parseAjaxResponse(request.responseXML, 'ajax-response');
					if (!res || res.errors) {
						return;
					}

					// Clear Thumbnail fields on submit.
					jQuery('.wc-variation-swatches-preview').find('img').attr('src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>');
					jQuery('.wc-variation-swatches-term-image').val('');
					jQuery('.wc-variation-swatches-remove-image').hide();
				}
			});
		</script>
		<?php
	}

	/**
	 * Create hook to fields to edit attribute term screen
	 *
	 * @param object $term Term Object.
	 * @param string $taxonomy Taxonomy name.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function edit_attribute_fields( $term, $taxonomy ) {
		$attribute_tax = wcvs_get_attr_tax_by_name( $taxonomy );

		// Return if this is a default attribute type.
		if ( in_array( $attribute_tax->attribute_type, array( 'select', 'text' ), true ) ) {
			return;
		}

		$value = get_term_meta( $term->term_id, $attribute_tax->attribute_type, true );
		?>
		<tr class="form-field term-slug-wrap">
			<th scope="row">
				<label for="term-slug"><?php echo esc_html( wcvs_get_attribute_field_label( $attribute_tax->attribute_type ) ); ?></label>
			</th>
			<td>
				<?php wcvs_get_attribute_fields( $attribute_tax->attribute_type, $value ); ?>
			</td>
		</tr>
		<?php
		do_action( 'wc_variation_swatches_add_edit_hover_image', $attribute_tax->attribute_type, $term );
	}

	/**
	 * Save attribute term meta
	 *
	 * @param int $term_id Term ID.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function save_term_meta( $term_id ) {
		wp_verify_nonce( '_nonce' );

		foreach ( wcvs_get_attribute_types() as $swatches_type => $label ) {
			if ( ! empty( $_REQUEST[ $swatches_type ] ) ) {
				update_term_meta( $term_id, $swatches_type, sanitize_text_field( wp_unslash( $_REQUEST[ $swatches_type ] ) ) );
			}
		}

		// Save image type attribute terms images.
		if ( ! empty( $_REQUEST['image'] ) ) {
			update_term_meta( $term_id, 'image', intval( $_REQUEST['image'] ) );
		}
		// Save hover-image type attribute terms images.
		if ( ! empty( $_REQUEST['hover_image'] ) ) {
			update_term_meta( $term_id, 'hover_image', intval( $_REQUEST['hover_image'] ) );
		}
	}

	/**
	 * Add extra custom column on attribute term screen list
	 *
	 * @param array $columns Columns Array.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function add_attribute_columns( $columns ) {
		$new_columns          = array();
		$new_columns['cb']    = ! empty( $columns['cb'] ) ? $columns['cb'] : '';
		$new_columns['thumb'] = __( 'Image', 'wc-variation-swatches' );
		$new_columns['hover'] = __( 'Hover Image', 'wc-variation-swatches' );
		unset( $columns['cb'] );

		return array_merge( $new_columns, $columns );
	}

	/**
	 * Render thumbnail HTML for attributes terms depend on attribute type
	 *
	 * @param array  $columns Columns array.
	 * @param string $column Column array.
	 * @param int    $term_id Term ID.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_attribute_column_content( $columns, $column, $term_id ) {
		wp_verify_nonce( '_nonce' );
		$taxonomy = isset( $_REQUEST['taxonomy'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['taxonomy'] ) ) : '';

		if ( empty( $taxonomy ) ) {
			return;
		}

		$attribute_tax = wcvs_get_attr_tax_by_name( $taxonomy );

		$value = get_term_meta( $term_id, $attribute_tax->attribute_type, true );
		$hover = get_term_meta( $term_id, 'hover_image', true );

		if ( 'hover' === $column ) {
			$image = ! empty( $hover ) ? wp_get_attachment_image_src( $hover ) : '';
			$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';

			printf( '<img class="wc-variation-swatches-preview swatches-type-image" src="%s" width="44px" height="44px">', esc_url( $image ) ); // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
		} else {

			switch ( $attribute_tax->attribute_type ) {
				case 'color':
					printf( '<div class="wc-variation-swatches-preview swatches-type-color" style="background-color:%s;"></div>', esc_attr( $value ) );
					break;
				case 'image':
					$image = ! empty( $value ) ? wp_get_attachment_image_src( $value ) : '';
					$image = $image ? $image[0] : WC()->plugin_url() . '/assets/images/placeholder.png';
					printf( '<img class="wc-variation-swatches-preview swatches-type-image" src="%s" width="44px" height="44px">', esc_url( $image ) ); // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage
					break;
				case 'label':
					printf( '<div class="wc-variation-swatches-preview swatches-type-label">%s</div>', esc_html( $value ) );
					break;
				default:
					echo '&mdash;';
			}
		}
	}

	/**
	 * Render product attributes option terms
	 *
	 * @param object $taxonomy Taxonomy Object.
	 * @param int    $index Term ID.
	 *
	 * @since 2.0.0
	 * @return void
	 */
	public function product_option_terms( $taxonomy, $index ) {
		wp_verify_nonce( '_nonce' );

		if ( ! array_key_exists( $taxonomy->attribute_type, wcvs_get_attribute_types() ) ) {
			return;
		}

		global $id;

		$id               = isset( $_POST['post_id'] ) ? absint( $_POST['post_id'] ) : $id;
		$taxonomy_name    = wc_attribute_taxonomy_name( $taxonomy->attribute_name );
		$taxonomy_orderby = isset( $taxonomy->attribute_orderby ) ? $taxonomy->attribute_orderby : 'name';

		// Return if taxonomy name is empty.
		if ( empty( $taxonomy_name ) ) {
			return;
		}

		// Get all terms for this taxonomy.
		$all_terms = get_terms(
			array(
				'taxonomy'   => $taxonomy_name,
				'orderby'    => $taxonomy_orderby,
				'hide_empty' => false,
			)
		);
		?>

		<select multiple="multiple" data-limit="50" data-return_id="id" data-orderby="<?php echo esc_attr( $taxonomy_orderby ); ?>" data-placeholder="<?php esc_attr_e( 'Select values', 'wc-variation-swatches' ); ?>" class="multiselect attribute_values wc-taxonomy-term-search wc-enhanced-select" name="attribute_values[<?php echo esc_attr( $index ); ?>][]" data-taxonomy="<?php echo esc_attr( $taxonomy_name ); ?>" aria-hidden="true">
			<?php
			if ( $all_terms ) {
				foreach ( $all_terms as $term ) {
					printf(
						'<option value="%1$s" %2$s>%3$s</option>',
						esc_attr( $term->term_id ),
						selected( has_term( absint( $term->term_id ), $taxonomy_name, $id ), true, false ),
						esc_attr( apply_filters( 'woocommerce_product_attribute_term_name', $term->name, $term ) )
					);
				}
			}
			?>
		</select>
		<button class="button plus select_all_attributes"><?php esc_html_e( 'Select all', 'wc-variation-swatches' ); ?></button>
		<button class="button minus select_no_attributes"><?php esc_html_e( 'Select none', 'wc-variation-swatches' ); ?></button>
		<button class="button fr plus add_new_attribute"><?php esc_html_e( 'Create value', 'wc-variation-swatches' ); ?></button>
		<?php
	}

	/**
	 * Admin footer text.
	 *
	 * @param string $footer_text Footer text.
	 *
	 * @since 1.1.1
	 * @return string
	 */
	public function admin_footer_text( $footer_text ) {
		if ( WCVS()->get_review_url() && in_array( get_current_screen()->id, array( 'product_page_wc-variation-swatches' ), true ) ) {
			$footer_text = sprintf(
			/* translators: 1: Plugin name 2: WordPress rating link */
				__( 'Thank you for using %1$s. If you like it, please leave us a %2$s rating. A huge thank you from PluginEver in advance!', 'wc-variation-swatches' ),
				'<strong>' . esc_html( WCVS()->get_name() ) . '</strong>',
				'<a href="' . esc_url( WCVS()->get_review_url() ) . '" target="_blank" class="wc-category-slider-rating-link" data-rated="' . esc_attr__( 'Thanks :)', 'wc-variation-swatches' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
			);
		}

		return $footer_text;
	}

	/**
	 * Update footer.
	 *
	 * @param string $footer_text Footer text.
	 *
	 * @since 1.1.1
	 * @return string
	 */
	public function update_footer( $footer_text ) {
		if ( in_array( get_current_screen()->id, array( 'product_page_wc-variation-swatches' ), true ) ) {
			/* translators: 1: Plugin version */
			$footer_text = sprintf( esc_html__( 'Version %s', 'wc-variation-swatches' ), WCVS()->get_version() );
		}

		return $footer_text;
	}
}
