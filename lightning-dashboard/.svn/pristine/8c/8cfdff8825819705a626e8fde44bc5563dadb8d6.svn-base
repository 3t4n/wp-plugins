<?php

/**
 * Markup class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Markup' ) ) {

	/**
	 * Markup
	 *
	 * Functions to generate markup
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Markup {

		/**
		 * Prints the markup for an input field
		 *
		 * @since 1.0.0
		 * @param string $type Field type
		 * @param string $id ID to set on the field and also becomes the field name replacing hyphens for underscores
		 * @param string $classes Classes to set on the field
		 * @param string $placeholder Placeholder to set on the field
		 * @param string $current_value The current value of the field
		 * @param bool $required Whether the field should be a required field
		 */

		public static function field_input( $type, $id, $classes, $placeholder, $current_value, $required ) {

			if( !empty( $id ) && !empty( $type ) ) {

				$valid_types = array( 'text', 'textarea', 'number', 'checkbox', 'hidden' );

				if( in_array( $type, $valid_types ) ) {

					if( $required == true ) {

						$required = ' required';

					} else {

						$required = '';

					}

					if( $type == 'checkbox' ) {

						if( $current_value == 'on' ) {

							$checked = ' checked';

						} else {

							$checked = '';

						}

						echo '<input type="hidden" value="off" name="' . str_replace( '-', '_', $id ) . '">'; // Ensures empty checkbox is still passed in $_POST (mostly for settings)
						echo '<input type="' . $type . '" id="' . $id . '" class="' . $classes . '" name="' . str_replace( '-', '_', $id ) . '"' . $checked . $required . '>';

					} elseif( $type =='textarea' ) {

						echo '<' . $type . ' id="' . $id . '" class="' . $classes . '" name="' . str_replace( '-', '_', $id ) . '" placeholder="' . $placeholder . '"' . $required . '>' . $current_value . '</' . $type . '>';

					} else {

						echo '<input type="' . $type . '" id="' . $id . '" class="' . $classes . '" name="' . str_replace( '-', '_', $id ) . '" placeholder="' . $placeholder . '" value="' . $current_value . '"' . $required . '>';

					}

				}

			} else {

				return false;

			}

		}

		/**
		 * Prints the markup for an image field
		 *
		 * @since 1.0.0
		 * @param string $id ID to set on the field and also becomes the field name replacing hyphens for underscores
		 * @param string $option_name Name of the option where the image id will be saved
		 */

		public static function field_image( $id, $option_name ) {

			if( !empty( $id ) ) {

				$id_underscores = str_replace( '-', '_', $id );

				if( empty( get_option( $option_name ) ) ) {
					$select_custom_logo_style = 'style="display: inline-block;"';
					$remove_custom_logo_style = 'style="display: none;"';
					$logo_preview_style = 'style="display: none;"';
				} else {
					$select_custom_logo_style = 'style="display: none;"';
					$remove_custom_logo_style = 'style="display: inline-block;"';
					$logo_preview_style = 'style="display: block;"';
				} ?>
				<div id="<?php echo $id; ?>-preview" class="ldash-field-image-preview"<?php echo $logo_preview_style; ?>>
					<img src="<?php echo wp_get_attachment_url( get_option( $option_name ) ); ?>">
				</div>
				<a id="<?php echo $id; ?>-select" class="button button-small"<?php echo $select_custom_logo_style; ?>><?php _e( 'Select', 'lightning-dashboard' ); ?></a>
				<a id="<?php echo $id; ?>-remove" class="button button-small ldash-field-image-remove"<?php echo $remove_custom_logo_style; ?>><?php _e( 'Remove', 'lightning-dashboard' ); ?></a>
				<?php LDASH_Markup::field_input( 'hidden', $id, '', '', get_option( $option_name ), false ); ?>
				<script type="text/javascript">
					jQuery( document ).ready( function( $ ) {
						$('#<?php echo $id; ?>-select').on( 'click', function( event ) {
							event.preventDefault();
							var mediaWindow;
							mediaWindow = wp.media.frames.mediaWindow = wp.media({
								title: 'Select',
								multiple: false
							});
							mediaWindow.on( 'select', function() {
								attachment = mediaWindow.state().get('selection').first().toJSON();
								$( '#<?php echo $id; ?>-preview img' ).attr( 'src', attachment.url );
								$( '#<?php echo $id; ?>' ).val( attachment.id );
								$( '#<?php echo $id; ?>-select').hide();
								$( '#<?php echo $id; ?>-remove').show();
								$( '#<?php echo $id; ?>-preview').show();

							});
							mediaWindow.open();
						});
						$( '#<?php echo $id; ?>-remove' ).on( 'click', function() {
							$( '#<?php echo $id; ?>').val('');
							$( '#<?php echo $id; ?>-select').show();
							$( '#<?php echo $id; ?>-remove').hide();
							$( '#<?php echo $id; ?>-preview').hide();
						});
					});
				</script>

			<?php } else {

				return false;

			}

		}

		/**
		 * Prints the markup for a select field
		 *
		 * @since 1.0.0
		 * @param string $id ID to set on the field and also becomes the field name replacing hyphens for underscores
		 * @param string $type Type of select field, results in getting different options for markup
		 * @param string $no_value Label for the no value option
		 * @param bool $multiple Enables multiple selection
		 * @param bool $disable_empty_option Disables the empty option
		 * @param bool $meta_key Pass a meta key for use in add on select field type results
		 * @param array $selected_options Option(s) to mark as selected
		 * @return string|false Select field HTML string or false
		 */

		public static function field_select( $id, $type, $no_value, $multiple, $disable_empty_option, $meta_key, $selected_options ) {

			if( !empty( $id ) && !empty( $type ) ) {

				global $wpdb;

				if( !is_array( $selected_options ) ) {
					$selected_options = array();
				}

				if( $type == 'products_stock_status' ) {

					$options = LDASH_Products::stock_statuses();

				} elseif( $type == 'orders_status' ) {

					$options = LDASH_Orders::statuses( true );

				} elseif( $type == 'products_status' ) {

					$options = LDASH_Products::statuses();

				} elseif( $type == 'products_type' ) {

					$options = LDASH_Products::types();

				} elseif( $type == 'no_yes' ) {

					$options = array(
						'yes' => __( 'Yes', 'lightning-dashboard' ),
						'no' => __( 'No', 'lightning-dashboard' )
					);

				} elseif( $type == 'products_categories' ) {

					$options = LDASH_Products::categories();

				} elseif( $type == 'settings_orders_default_option' ) {

					$options = array(
						'last-7-days' => __( 'Last 7 Days', 'lightning-dashboard' ),
						'last-30-days' => __( 'Last 30 Days', 'lightning-dashboard' ),
						'this-month' => __( 'This Month', 'lightning-dashboard' ),
						'last-month' => __( 'Last Month', 'lightning-dashboard' ),
						'this-year' => __( 'This Year', 'lightning-dashboard' ),
						'last-year' => __( 'Last Year', 'lightning-dashboard' ),
						'custom' => __( 'Custom', 'lightning-dashboard' ),
					);

				} elseif( $type == 'settings_products_default_option' ) {

					$options = array(
						'all-products' => __( 'All Products', 'lightning-dashboard' ),
						'all-inc-variations' => __( 'All Products (inc Variations)', 'lightning-dashboard' ),
					);

				} elseif( $type == 'settings_customers_default_option' ) {

					$options = array(
						'all-customers' => __( 'All Customers', 'lightning-dashboard' ),
					);

				} else {

					$add_on_select_field_types = apply_filters( 'ldash_add_on_select_field_types', $add_on_select_field_types );

					if( !empty( $add_on_select_field_types ) ) {

						foreach( $add_on_select_field_types as $add_on_select_field_type ) {

							if( $type == $add_on_select_field_type ) {

								$temp_options = apply_filters( 'ldash_add_on_select_field_type_results_' . $add_on_select_field_type, $meta_key );

								$options = array();

								if( $temp_options['type'] == 'wpdb' ) {

									if( !empty( $temp_options['result'] ) ) {

										foreach( $temp_options['result'] as $temp_option ) {

											$options[$temp_option->return] = $temp_option->return;

										}

									}

								} elseif( $temp_options['type'] == 'array' ) {

									if( !empty( $temp_options['result'] ) ) {

										foreach( $temp_options['result'] as $temp_option ) {

											$options[$temp_option] = $temp_option;

										}

									}

								}

								break;

							}

						}

					} else {

						return false;	
					
					}

				}

				// Remove any existing blank options (we add a blank option for any later if empty option is required)

				unset( $options[''] );

				// Sort options

				asort( $options );

				$markup = '';

				if( $multiple == true ) {
					$multiple = ' multiple';
				} else {
					$multiple = '';
				}

				$markup .= '<select id="' . $id . '" name="' . str_replace( '-', '_', $id ) . '"' . $multiple . '>';

				if( !empty( $no_value ) && $disable_empty_option == false ) {
					$markup .= '<option value="">' . $no_value . '</option>';
				}

				if( $type == 'products_categories' ) {

					if( !empty( $options ) ) {

						foreach( $options as $option ) {
							
							if( in_array( $option->term_id, $selected_options ) ) {
								$selected = ' selected';
							} else {
								$selected = '';
							}

							$markup .= '<option value="' . $option->term_id . '-' . $option->slug . '"' . $selected . '>' . $option->name . '</option>';
							$markup .= LDASH_Markup::sub_term_options( $option->term_id, $selected_options, '', 1 );

						}

					}

				} else {

					if( !empty( $options ) ) {

						foreach( $options as $option_id => $option_label ) {

							if( in_array( $option_id, $selected_options ) ) {
								$selected = ' selected';
							} else {
								$selected = '';
							}
							
							$markup .= '<option value="' . $option_id . '"' . $selected . '>' . $option_label . '</option>';

						}

					}

				}

				$markup .= '</select>';

				echo $markup;

			} else {

				return false;

			}

		}

		/**
		 * Gets any sub term options from a parent term and adds an <option> to markup string
		 *
		 * @since 1.0.0
		 * @param int $parent_term_id The term id of the parent
		 * @param array $selected_options Option(s) to mark as selected
		 * @param string $sub_term_options_markup The markup string which will get returned
		 * @param int $depth The depth of the sub term
		 * @return string Sub term options to be used in a select field
		 */

		public function sub_term_options( $parent_term_id, $selected_options, $sub_term_options_markup, $depth ) {
			
			$sub_terms = get_terms( 'product_cat', array(
				'parent'   => $parent_term_id,
				'hide_empty' => false
			));

			if( !empty( $sub_terms ) ) {

				$depth_indicator = '';

				for( $x = 1; $x <= $depth; $x++ ) {
				    $depth_indicator .= '-';
				}

				if( !empty( $sub_terms ) ) {

					foreach( $sub_terms as $sub_term ) {

						if( in_array( $sub_term->term_id, $selected_options ) ) {
							$sub_term_selected = ' selected';
						} else {
							$sub_term_selected = '';
						}

						$sub_term_options_markup .= '<option value="' . $sub_term->term_id . '-' . $sub_term->slug . '"' . $sub_term_selected . '>' . $depth_indicator . ' ' . $sub_term->name .'</option>';

						$depth = $depth + 1;

						// Below keeps re-running this function until no sub terms for category and then returns the markup

						return LDASH_Markup::sub_term_options( $sub_term->term_id, $selected_options, $sub_term_options_markup, $depth );

					}

				}

			} else {

				return $sub_term_options_markup;

			}

		}

	}

	new LDASH_Markup();

}