<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce
 */
class WooCommerce {
	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Constructor method.
	 */
	public function __construct() {
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'soft_accordion_product_tab' ) );
		add_action( 'woocommerce_product_data_panels', array( $this, 'soft_accordion_product_tab_content' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'soft_accordion_save_product_data' ) );
		add_filter( 'woocommerce_product_tabs', array( $this, 'soft_accordion_display_product_tab' ) );
	}


	/**
	 * Adds a custom tab for Soft Accordion to the WooCommerce product data tabs.
	 *
	 * @param array $tabs The existing array of product data tabs.
	 * @return array The modified array of product data tabs with the Soft Accordion tab added.
	 */
	public function soft_accordion_product_tab( $tabs ) {
		$tabs['soft_accordion'] = array(
			'label'    => __( 'Soft Accordion', 'soft-accordion' ),
			'target'   => 'soft_accordion_options',
			'class'    => array(),
			'priority' => 30,
		);

		return $tabs;
	}

	/**
	 * Display content inside the custom tab
	 */
	public function soft_accordion_product_tab_content() {
		$all_accordions  = soft_accordion_get_accordion_data();
		$product_id      = get_the_ID();
		$saved_accordion = get_post_meta( $product_id, '_soft_accordion_id', true );

		echo '<div id="soft_accordion_options" class="panel woocommerce_options_panel">';
		echo '<p class="form-field">';
		echo '<label for="soft_accordion_select">' . __( 'Select Accordion', 'soft-accordion' ) . '</label>';
		echo '<select name="soft_accordion_select[]" id="soft_accordion_select" multiple="multiple">';
		echo '<option value="">' . __( '-- Select Accordion --', 'soft-accordion' ) . '</option>';

		foreach ( $all_accordions as $accordion ) {
			$selected = ( is_array( $saved_accordion ) && in_array( $accordion['id'], $saved_accordion ) ) ? 'selected' : '';
			echo '<option value="' . esc_attr( $accordion['id'] ) . '" ' . $selected . '>' . esc_html( $accordion['title'] ) . '</option>';
		}

		echo '</select>';
		echo '</p>';
		echo '</div>';
	}

	/**
	 * Save selected accordion to product meta
	 */
	public function soft_accordion_save_product_data( $post_id ) {
		if ( isset( $_POST['soft_accordion_select'] ) && is_array( $_POST['soft_accordion_select'] ) ) {
			$accordion_ids = array_map( 'intval', $_POST['soft_accordion_select'] );
			update_post_meta( $post_id, '_soft_accordion_id', $accordion_ids );
		} else {
			delete_post_meta( $post_id, '_soft_accordion_id' );
		}
	}

	/**
	 * Adds a FAQ tab to the WooCommerce product page if conditions are met.
	 *
	 * @param array $tabs The existing array of product data tabs.
	 * @return array The modified array of product data tabs with the FAQ tab
	 *               added if applicable.
	 */
	public function soft_accordion_display_product_tab( $tabs ) {

		$woo_faq_tab        = empty( soft_accordion_get_setting( 'wooFaqTab' ) ) ? 0 : 1;
		$faq_tab_label      = soft_accordion_get_setting( 'faqTabLabel' );
		$tab_priority       = soft_accordion_get_setting( 'tabPriority' );
		$faq_tabs           = soft_accordion_get_setting( 'faqTabs' );
		$current_product_id = get_the_ID();
		$saved_accordion    = get_post_meta( $current_product_id, '_soft_accordion_id', true );

		if ( 0 === $woo_faq_tab ) {
			return $tabs;
		}

		$should_display_tab = false;

		if ( is_array( $saved_accordion ) && ! empty( $saved_accordion ) ) {
			$should_display_tab = true;
		}

		foreach ( $faq_tabs as $tab ) {
			$display_faq = $tab['displayFaq'] ?? '';

			switch ( $display_faq ) {

				case 'all':
					if ( ! empty( $tab['selectFaq'] ) ) {
						$should_display_tab = true;
					}
					break;

				case 'taxonomy':
					if ( ! empty( $tab['taxonomies'] ) && ! empty( $tab['selectFaq'] ) ) {
						$selected_taxonomies = array_column( $tab['taxonomies'], 'value' );
						$product_categories  = wp_get_post_terms( $current_product_id, 'product_cat', array( 'fields' => 'slugs' ) );

						if ( array_intersect( $selected_taxonomies, $product_categories ) ) {
							$should_display_tab = true;
						}
					}
					break;

				case 'specificProducts':
					if ( ! empty( $tab['specificProducts'] ) && ! empty( $tab['selectFaq'] ) ) {
						$selected_product_ids = array_column( $tab['specificProducts'], 'value' );
						if ( in_array( $current_product_id, $selected_product_ids, true ) ) {
							$should_display_tab = true;
						}
					}
					break;
			}

			if ( $should_display_tab ) {
				break;
			}
		}

		if ( $should_display_tab ) {
			$tabs['WooFaq'] = array(
				'title'    => $faq_tab_label,
				'priority' => $tab_priority,
				'callback' => array( $this, 'soft_accordion_display_product_tab_content' ),
			);
		}

		return $tabs;
	}

	/**
	 * Display content inside the FAQ tab
	 *
	 * @since 1.0.0
	 */
	public function soft_accordion_display_product_tab_content() {

		$faq_tabs           = soft_accordion_get_setting( 'faqTabs' );
		$current_product_id = get_the_ID();
		$saved_accordion    = get_post_meta( $current_product_id, '_soft_accordion_id', true );

		if ( is_array( $saved_accordion ) && ! empty( $saved_accordion ) ) {
			foreach ( $saved_accordion as $id ) {
				echo do_shortcode( '[soft_accordion id="' . intval( $id ) . '"]' );
			}
		}

		foreach ( $faq_tabs as $tab ) {
			$display_faq = $tab['displayFaq'] ?? '';

			switch ( $display_faq ) {

				case 'all':
					if ( ! empty( $tab['selectFaq'] ) ) {
						$faqIds = array_column( $tab['selectFaq'], 'value' );
						foreach ( $faqIds as $faqId ) {
							echo do_shortcode( '[soft_accordion id="' . intval( $faqId ) . '"]' );
						}
					}
					break;

				case 'taxonomy':
					if ( ! empty( $tab['taxonomies'] ) && ! empty( $tab['selectFaq'] ) ) {
						$faqIds                   = array_column( $tab['selectFaq'], 'value' );
						$userSelectedTaxonomies   = array_column( $tab['taxonomies'], 'value' );
						$wooCommerceCategories    = get_terms(
							array(
								'taxonomy'   => 'product_cat',
								'hide_empty' => false,
							)
						);
						$wooCommerceCategorySlugs = array_column( $wooCommerceCategories, 'slug' );
						$matchedCategories        = array_intersect( $userSelectedTaxonomies, $wooCommerceCategorySlugs );

						if ( ! empty( $matchedCategories ) ) {
							$args = array(
								'post_type'      => 'product',
								'posts_per_page' => - 1,
								'fields'         => 'ids',
								'tax_query'      => array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'slug',
										'terms'    => $matchedCategories,
										'operator' => 'IN',
									),
								),
							);

							$query = new WP_Query( $args );

							if ( $query->have_posts() ) {
								foreach ( $query->posts as $productId ) {
									foreach ( $faqIds as $faqId ) {
										echo do_shortcode( '[soft_accordion id="' . intval( $faqId ) . '" product_id="' . intval( $productId ) . '"]' );
									}
								}
							}
						}
					}
					break;

				case 'specificProducts':
					if ( ! empty( $tab['specificProducts'] ) && ! empty( $tab['selectFaq'] ) ) {
						$faqIds              = array_column( $tab['selectFaq'], 'value' );
						$userSelectedProduct = array_column( $tab['specificProducts'], 'value' );

						if ( ! empty( $userSelectedProduct ) ) {
							$args = array(
								'post_type' => 'product',
								'post__in'  => $userSelectedProduct,
								'fields'    => 'ids',
							);

							$query = new WP_Query( $args );

							if ( $query->have_posts() ) {
								foreach ( $query->posts as $productId ) {
									foreach ( $faqIds as $faqId ) {
										echo do_shortcode( '[soft_accordion id="' . intval( $faqId ) . '" product_id="' . intval( $productId ) . '"]' );
									}
								}
							}
						}
					}
					break;

				default:
					echo '<p>' . esc_html__( 'No valid display option selected.', 'soft-accordion' ) . '</p>';
					break;
			}
		}
	}

	/**
	 * Get the instance of WooCommerce class.
	 *
	 * @since 1.0.0
	 * @return WooCommerce
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

WooCommerce::instance();
