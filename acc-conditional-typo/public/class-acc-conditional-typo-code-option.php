<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://grandplugin.com
 * @since      1.0.0
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ACC_Conditional_Typo
 * @subpackage ACC_Conditional_Typo/public
 * @author     GrandPlugin <help@grandplugin.com>
 */
class ACC_Conditional_Typo_Code_Option {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Typography.
	 *
	 * @param array $gpacc_typos Typography elements.
	 * @return string
	 */
	function gpacc_get_typos( $gpacc_typos ) {

		$gpacc_items = array();
		foreach ( $gpacc_typos as $acc_typo_key => $acc_typo_value ) {

			if ( ! empty( $acc_typo_value ) && 'unit' !== $acc_typo_key && 'type' !== $acc_typo_key ) {
				$gpacc_items[] = $acc_typo_key . ': ' . $acc_typo_value;
			}
		}
		$gpacc_items_imploded = implode( '; ', $gpacc_items );
		if ( ! empty( $gpacc_items_imploded ) ) {

			return implode( '; ', $gpacc_items ) . ';';
		}
	}

	/**
	 * Design Fields.
	 *
	 * @param array  $gpacc_design Design Fields elements.
	 * @param string $gpacc_design_scale Design Scale.
	 * @return string
	 */
	function gpacc_get_design( $gpacc_design, $gpacc_design_scale = '' ) {

		$gpacc_elem = array();
		if ( 'border' !== $gpacc_design_scale ) {

			$acc_design_unit = '';
			if ( array_key_exists( 'unit', $gpacc_design ) ) {

				$acc_design_unit = $gpacc_design['unit'];
			}
			if ( ! empty( $gpacc_design_scale ) ) {

				$gpacc_design_scale = $gpacc_design_scale . '-';
			}
			foreach ( $gpacc_design as $acc_design_key => $acc_design_value ) {

				if ( ! empty( $acc_design_value ) && 'unit' !== $acc_design_key ) {
					$gpacc_elem[] = $gpacc_design_scale . $acc_design_key . ': ' . $acc_design_value . $acc_design_unit;
				}
			}
		} else {

			if ( ! empty( $gpacc_design['top'] ) || ! empty( $gpacc_design['right'] ) || ! empty( $gpacc_design['bottom'] ) || ! empty( $gpacc_design['left'] ) ) {

				foreach ( $gpacc_design as $acc_design_key => $acc_design_value ) {

					if ( ! empty( $acc_design_value ) || '0' <= $acc_design_value ) {

						if ( 'style' !== $acc_design_key && 'color' !== $acc_design_key ) {

							$gpacc_elem[] = $gpacc_design_scale . '-' . $acc_design_key . ': ' . $acc_design_value . 'px';
						} else {

							$gpacc_elem[] = $gpacc_design_scale . '-' . $acc_design_key . ': ' . $acc_design_value;
						}
					}
				}
			}
		}
		$gpacc_elem_imploded = implode( '; ', $gpacc_elem );
		if ( ! empty( $gpacc_elem_imploded ) ) {

			return implode( '; ', $gpacc_elem ) . ';';
		}
	}

	/**
	 * Helper Method For Background Properties.
	 *
	 * @param array $gpacc_background Background elements.
	 * @return string
	 */
	public function gpacc_get_background( $gpacc_background ) {

		$gpacc_items = array();
		if ( array_key_exists( 'background-image', $gpacc_background ) ) {

			foreach ( $gpacc_background as $acc_bg_key => $acc_bg_value ) {

				if ( isset( $acc_bg_value ) && ! empty( $acc_bg_value ) ) {

					if ( 'background-image' !== $acc_bg_key ) {

						$gpacc_items[] = $acc_bg_key . ': ' . $acc_bg_value;
					} else {

						$gpacc_items['background-image'] = ! empty( $acc_bg_value['url'] ) ? 'background-image: url("' . $acc_bg_value['url'] . '")' : '';
					}
				}
			}
			$gpacc_items_imploded = implode( '; ', $gpacc_items );
			if ( ! empty( $gpacc_items_imploded ) ) {

				return implode( '; ', $gpacc_items ) . ';';
			}
		} else {

			$acc_gradient_final = '';
			if ( ! empty( $gpacc_background['background-gradient-direction'] ) && ! empty( $gpacc_background['background-color'] ) && ! empty( $gpacc_background['background-gradient-color'] ) ) {

				$acc_gradient_direction   = isset( $gpacc_background['background-gradient-direction'] ) ?  $gpacc_background['background-gradient-direction'] . ', ' : '';
				$acc_gradient_color_stop1 = isset( $gpacc_background['background-color'] ) ? $gpacc_background['background-color'] . ', ' : '';
				$acc_gradient_color_stop2 = isset( $gpacc_background['background-gradient-color'] ) ? $gpacc_background['background-gradient-color'] : '';
				$acc_gradient_final       = 'background-image: linear-gradient(' . $acc_gradient_direction . $acc_gradient_color_stop1 . $acc_gradient_color_stop2 . ');';
			} // Are all empty?
			return $acc_gradient_final;
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function gpacc_conditional_custom_code() {

		$acc_options = get_option( '_wpgp_option_global' )['gpacc_root_options_group'];

		$acc_woocommerce_condition_list = array(
			'is_shop',
			'is_product',
			'is_cart',
			'is_checkout',
			'is_account_page',
		);

		if ( isset( $acc_options[0]['acc_is_template'][0] ) && ! empty( $acc_options[0]['acc_is_template'][0] ) ) {

			foreach ( $acc_options as $acc_key => $acc_value ) {

				// Selected Template List.
				if ( isset( $acc_value['acc_is_template'] ) && ! empty( $acc_value['acc_is_template'] ) ) {

					$acc_create_conditional_tag = $acc_value['acc_is_template'];

					if ( ! in_array( $acc_create_conditional_tag, $acc_woocommerce_condition_list, true ) ) {

						if ( 'is_single' === $acc_create_conditional_tag && ! empty( $acc_value['acc_specific_posts_select'] ) ) {

							if ( 'post' === get_post_type() && is_single( $acc_value['acc_specific_posts_select'] ) ) {

								include ACC_CONDITIONAL_TYPO_DIR_PATH_FILE . '/public/partials/acc-conditional-typo-public-display.php';
							}
						} elseif ( 'is_page' === $acc_create_conditional_tag && ! empty( $acc_value['acc_specific_pages_select'] ) ) {

							if ( 'page' === get_post_type() && is_page( $acc_value['acc_specific_pages_select'] ) ) {

								include ACC_CONDITIONAL_TYPO_DIR_PATH_FILE . '/public/partials/acc-conditional-typo-public-display.php';
							}
						} else {

							if ( $acc_create_conditional_tag() ) {

								include ACC_CONDITIONAL_TYPO_DIR_PATH_FILE . '/public/partials/acc-conditional-typo-public-display.php';
							}
						}
					} else {

						if ( class_exists( 'woocommerce' ) ) {

							if ( 'is_product' === $acc_create_conditional_tag && ! empty( $acc_value['acc_specific_product_select'] ) ) {

								if ( 'product' === get_post_type() && is_single( $acc_value['acc_specific_product_select'] ) ) {

									include ACC_CONDITIONAL_TYPO_DIR_PATH_FILE . '/public/partials/acc-conditional-typo-public-display.php';
								}
							} else {

								if ( $acc_create_conditional_tag() ) {

									include ACC_CONDITIONAL_TYPO_DIR_PATH_FILE . '/public/partials/acc-conditional-typo-public-display.php';
								}
							}
						} // Has WooCommerce.
					} // Meet WooCommerce condition.
				} // Meet any condition.
			} // Loop end.
		}

		/**
		 * CSS rules from gutenberg individual post or page.
		 */
		$acc_code_editor_guten_css = get_post_meta( get_the_ID(), '_prefix_meta_guten', true );
		if ( isset( $acc_code_editor_guten_css['acc_code_editor_guten_css'] ) && ! empty( $acc_code_editor_guten_css['acc_code_editor_guten_css'] ) ) {

			echo '<style>' . $acc_code_editor_guten_css['acc_code_editor_guten_css'] . '</style>';
		}

	} // End the function of wp_head.

} // End the class.
