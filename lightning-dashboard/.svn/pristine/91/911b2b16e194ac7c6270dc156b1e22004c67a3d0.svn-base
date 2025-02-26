<?php

/**
 * Datatable class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Datatable' ) )  {

	/**
	 * Datatable
	 *
	 * Functions related to datatables
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Datatable {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			add_action( 'wp_ajax_datatable', array( $this, 'data' ) );
			add_action( 'wp_ajax_datatable_save', array( $this, 'save' ) );
			add_action( 'wp_ajax_datatable_delete', array( $this, 'delete' ) );

		}

		/**
		 * Gets table data via AJAX
		 *
		 * @since 1.0.0
		 * @return string JSON string of table data
		 */

		public function data() {

			$tab = ldash_current_tab();
			$option = ldash_current_option();
			$sub_option = ldash_current_sub_option();
			$user_id = $_REQUEST['user_id'];
			$custom_date_from = $_REQUEST['date_from'];
			$custom_date_to = $_REQUEST['date_to'];

			if( ldash_add_on_active( 'custom-columns' ) ) {
				$custom_columns = apply_filters( 'ldash_add_on_custom_columns_columns', false );
			}

			if( $tab == 'orders' ) {

				if( $option == 'custom' ) {

					$ids = LDASH_Orders::ids_for_custom_date( $custom_date_from, $custom_date_to );

				} else {

					if( !empty( $user_id ) ) {

						$ids = LDASH_Orders::ids_for_user( $user_id );

					} else {

						$ids = LDASH_Orders::ids( $option );

					}

				}

			} elseif( $tab == 'products' ) {

				$ids = LDASH_Products::ids( $option );

			} elseif( $tab == 'customers' ) {

				$ids = LDASH_Customers::ids();

			}

			$data = array();
			$nestedData = array();

			if( !empty( $ids ) ) {

				$i = 0;

				if( !empty( $ids ) ) {

					foreach( $ids as $id ) {

						if( $tab == 'orders' ) {

							// Order data

							$user_id_hidden = get_post_meta( $id, '_customer_user', true );
							$customer = LDASH_Orders::customer_name( $id, 'full' );
							$date = LDASH_Orders::date_time( $id );
							$status = LDASH_Orders::status( $id );
							$total = LDASH_Orders::total( $id, false );
							if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {
								$invoice = LDASH_Add_On_Invoices_Packing_Slips_Invoices::number_display( $id );
							}

							// Add nested data

							$nestedData[$i]['id'] = '<a href="' . get_edit_post_link( $id ) . '" target="_blank">' . $id . '</a>';
							$nestedData[$i]['user-id-hidden'] = $user_id_hidden;
							$nestedData[$i]['customer'] = $customer;
							$nestedData[$i]['date'] = $date;
							$nestedData[$i]['status'] = ucfirst( $status );
							$nestedData[$i]['total'] = $total;
							if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {
								$nestedData[$i]['invoice'] = $invoice;
							}
							if( ldash_add_on_active( 'custom-columns' ) ) {
								if( !empty( $custom_columns['orders'] ) ) { 
									foreach( $custom_columns['orders'] as $custom_column ) {
										$meta_key = $custom_column['meta_key'];
										$meta_value = get_post_meta( $id, $meta_key, true );
										$nestedData[$i][$custom_column['id']] = apply_filters( 'ldash_add_on_custom_columns_column_cell_value', $meta_value, $meta_key );
									}
								}
							}

							$edit_button = '<a name="' . __( 'Single Edit', 'lightning-dashboard' ) . '" href="#TB_inline?width=630&height=' . get_option( 'ldash_general_appearance_lightbox_height' ) . '&inlineId=ldash-edit" class="ldash-datatable-button button button-primary button-small thickbox" data-edit-type="single" data-user-id-hidden="' . $this->strip_illegal_characters( $user_id_hidden ) . '" data-customer="' . $this->strip_illegal_characters( $customer ) . '" data-date="' . $this->strip_illegal_characters( $date ) . '" data-status="' . $this->strip_illegal_characters( $status ) . '" data-total="' . $this->strip_illegal_characters( $total ) . '"';

							if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {
								$edit_button .= ' data-invoice="' . $this->strip_illegal_characters( $invoice ) . '"';
							}

							$edit_button .= ' >' . __( 'Edit', 'lightning-dashboard' ) . '</a>';

							$nestedData[$i]['actions'] = $edit_button;

						} elseif( $tab == 'products' ) {

							// Product data

							if( wp_get_post_parent_id( $id ) > 0 ) {

								$link = '<a href="' . get_edit_post_link( wp_get_post_parent_id( $id ) ) . '" target="_blank">' . $id . '</a>';


							} else {

								$link = '<a href="' . get_edit_post_link( $id ) . '" target="_blank">' . $id . '</a>';

							}

							$type = LDASH_Products::type( $id );
							$status = get_post_status( $id );
							$stock_managed = get_post_meta( $id, '_manage_stock', true );
							$title = get_the_title( $id );
							$sku = get_post_meta( $id, '_sku', true );

							if( $type == 'external' ) {

								$stock_level = 'N/A';
								$stock_level_no = 'N/A';

							} else {

								if( $stock_managed == 'yes' ) {

									$stock_level = get_post_meta( $id, '_stock', true );

									if( $stock_level == null ) {

										$stock_level = 'N/A';

									}

									$stock_level_no = 0;

								} else {

									$stock_level = 'N/A';
									$stock_level_no = 1;
								}

							}

							$stock_status = get_post_meta( $id, '_stock_status', true );

							if( empty( $stock_status ) || $type == 'external' ) {

								$stock_status = 'N/A';

							}

							if( in_array( $type, array( 'external', 'simple', 'variable', 'variation' ) ) ) {

								$price = get_post_meta( $id, '_price', true );
								$regular_price = get_post_meta( $id, '_regular_price', true );
								$sale_price = get_post_meta( $id, '_sale_price', true );

							} else {

								$price = 'N/A';
								$regular_price = 'N/A';
								$sale_price = 'N/A';

							}

							$on_sale = ( LDASH_Products::on_sale( $id ) ? 'yes' : 'no' );

							$product_cats = get_the_terms( $id, 'product_cat' );

							$categories = '';

							if( !empty( $product_cats ) ) {

								foreach( $product_cats as $product_cat ) {

									$categories .= $product_cat->name . ', ';

								}

							}

							$categories = rtrim( $categories, ', ' );

							$hidden_categories = '';

							if( !empty( $product_cats ) ) {

								foreach( $product_cats as $product_cat ) {

									$hidden_categories .= $product_cat->term_id . '-' . $product_cat->slug . ', ';

								}

							}

							$hidden_categories = rtrim( $hidden_categories, ', ' );

							$featured_product_ids = wc_get_featured_product_ids();

							if( in_array( $id, $featured_product_ids ) ) {

								$featured = 'yes';

							} else {

								$featured = 'no';

							}

							$backorders = get_post_meta( $id, '_backorders', true );

							// Add nested data

							$nestedData[$i]['id'] = $link;
							$nestedData[$i]['title'] = $title;
							$nestedData[$i]['sku'] = $sku;
							$nestedData[$i]['type'] = ucfirst( $type );
							$nestedData[$i]['status'] = ucfirst( $status );
							$nestedData[$i]['stock-status'] = ucfirst( $stock_status );
							$nestedData[$i]['stock-level'] = $stock_level;
							$nestedData[$i]['price'] = $price;
							$nestedData[$i]['sale-price'] = $sale_price;
							$nestedData[$i]['on-sale'] = ucfirst( $on_sale );
							$nestedData[$i]['featured'] = ucfirst( $featured );
							$nestedData[$i]['categories'] = $categories;
							$nestedData[$i]['categories-hidden'] = $hidden_categories;
							if( ldash_add_on_active( 'custom-columns' ) ) {
								if( !empty( $custom_columns['products'] ) ) { 
									foreach( $custom_columns['products'] as $custom_column ) {
										$meta_key = $custom_column['meta_key'];
										$meta_value = get_post_meta( $id, $meta_key, true );
										$nestedData[$i][$custom_column['id']] = apply_filters( 'ldash_add_on_custom_columns_column_cell_value', $meta_value, $meta_key );
									}
								}
							}
							$nestedData[$i]['actions'] = '<a name="' . __( 'Single Edit', 'lightning-dashboard' ) . '" href="#TB_inline?width=630&height=' . get_option( 'ldash_general_appearance_lightbox_height' ) . '&inlineId=ldash-edit" class="ldash-datatable-button button button-primary button-small thickbox" data-edit-type="single" data-title="' . $this->strip_illegal_characters( $title ) . '" data-sku="' . $this->strip_illegal_characters( $sku ) . '" data-type="' . $this->strip_illegal_characters( $type ) . '" data-status="' . $this->strip_illegal_characters( $status ) . '" data-stock-status="' . $this->strip_illegal_characters( $stock_status ) . '" data-stock-level="' . $this->strip_illegal_characters( $stock_level ) . '" data-stock-level-no="' . $this->strip_illegal_characters( $stock_level_no ) . '" data-price="' . $this->strip_illegal_characters( $price ) . '" data-regular-price="' . $this->strip_illegal_characters( $regular_price ) . '" data-sale-price="' . $this->strip_illegal_characters( $sale_price ) . '" data-on-sale="' . $this->strip_illegal_characters( $on_sale ) . '" data-featured="' . $this->strip_illegal_characters( $featured ) . ' data-categories="' . $this->strip_illegal_characters( $categories ) . '" data-hidden-categories="' . $this->strip_illegal_characters( $hidden_categories ) . '" data-backorders="' . $this->strip_illegal_characters( $backorders ) . '">' . __( 'Edit', 'lightning-dashboard' ) . '</a>';


						} elseif( $tab == 'customers' ) {

							// Customer data

							$user_info = get_userdata( $id );
							$states = WC()->countries->get_states();
							$countries = WC()->countries->get_countries();
							$first_name = $user_info->first_name;
							$last_name = $user_info->last_name;
							$company = $user_info->billing_company;
							$email = $user_info->user_email;
							$phone = $user_info->billing_phone;

							$billing_address_fields = array(
								$user_info->billing_first_name . ' ' . $user_info->billing_last_name,
								$user_info->billing_company,
								$user_info->billing_address_1,
								$user_info->billing_address_2,
								$user_info->billing_city,
								!empty( $states[ $user_info->billing_country ] ) ? $states[ $user_info->billing_country ][ $user_info->billing_state ] : $user_info->billing_state,
								$user_info->billing_postcode,
								$countries[$user_info->billing_country],
							);

							$billing_address = '';

							if( !empty( $billing_address_fields ) ) {

								foreach( $billing_address_fields as $billing_address_field ) {

									if( !empty( $billing_address_field ) ) {

										$billing_address .= $billing_address_field . '<br>';

									}

								}

							}

							$billing_address = rtrim( $billing_address, '<br>' );

							$shipping_address_fields = array(
								$user_info->shipping_first_name . ' ' . $user_info->shipping_last_name,
								$user_info->shipping_company,
								$user_info->shipping_address_1,
								$user_info->shipping_address_2,
								$user_info->shipping_city,
								!empty( $states[ $user_info->shipping_country ] ) ? $states[ $user_info->shipping_country ][ $user_info->shipping_state ] : $user_info->shipping_state,
								$user_info->shipping_postcode,
								$countries[$user_info->shipping_country],
							);

							$shipping_address = '';

							if( !empty( $shipping_address_fields ) ) {

								foreach( $shipping_address_fields as $shipping_address_field ) {

									if( !empty( $shipping_address_field ) ) {

										$shipping_address .= $shipping_address_field . '<br>';

									}

								}

							}

							$shipping_address = rtrim( $shipping_address, '<br>' );

							// Add nested data

							$nestedData[$i]['id'] = '<a href="' . get_edit_user_link( $id ) . '" target="_blank">' . $id . '</a>';
							$nestedData[$i]['name'] = $first_name . ' ' . $last_name;
							$nestedData[$i]['company'] = $company;
							$nestedData[$i]['email'] = '<a href="mailto:' . $email . '">' . $email . '</a>';
							$nestedData[$i]['phone'] = $phone;
							$nestedData[$i]['billing-address'] = $billing_address;
							$nestedData[$i]['shipping-address'] = $shipping_address;
							if( ldash_add_on_active( 'custom-columns' ) ) {
								if( !empty( $custom_columns['customers'] ) ) { 
									foreach( $custom_columns['customers'] as $custom_column ) {
										$meta_key = $custom_column['meta_key'];
										$meta_value = get_user_meta( $id, $meta_key, true );
										$nestedData[$i][$custom_column['id']] = apply_filters( 'ldash_add_on_custom_columns_column_cell_value', $meta_value, $meta_key );
									}
								}
							}
							$nestedData[$i]['orders'] = '<a href="admin.php?page=lightning-dashboard&tab=orders&user_id=' . $id . '">Orders</a>';
							$nestedData[$i]['actions'] = '<a name="' . __( 'Single Edit', 'lightning-dashboard' ) . '" href="#TB_inline?width=630&height=' . get_option( 'ldash_general_appearance_lightbox_height' ) . '&inlineId=ldash-edit" class="ldash-datatable-button button button-primary button-small thickbox" data-edit-type="single" data-first-name="' . $this->strip_illegal_characters( $first_name ) . '" data-last-name="' . $this->strip_illegal_characters( $last_name ) . '" data-company="' . $this->strip_illegal_characters( $company ) . '" data-email="' . $this->strip_illegal_characters( $email ) . '" data-phone="' . $this->strip_illegal_characters( $phone ) . '" data-billing-address-1="' . $this->strip_illegal_characters( $user_info->billing_address_1 ) . '" data-billing-address-2="' . $this->strip_illegal_characters( $user_info->billing_address_2 ) . '"  data-billing-city="' . $this->strip_illegal_characters( $user_info->billing_city ) . '" data-billing-postcode="' . $this->strip_illegal_characters( $user_info->billing_postcode ) . '" data-billing-state="' . $this->strip_illegal_characters( $user_info->billing_state ) . '" data-billing-country="' . $this->strip_illegal_characters( $user_info->billing_country ) . '" data-shipping-first-name="' . $this->strip_illegal_characters( $user_info->shipping_first_name ) . '" data-shipping-last-name="' . $this->strip_illegal_characters( $user_info->shipping_last_name ) . '" data-company="' . $this->strip_illegal_characters( $user_info->shipping_company ) . '"  data-shipping-address-1="' . $this->strip_illegal_characters( $user_info->shipping_address_1 ) . '" data-shipping-address-2="' . $this->strip_illegal_characters( $user_info->shipping_address_2 ) . '"  data-shipping-city="' . $this->strip_illegal_characters( $user_info->shipping_city ) . '" data-shipping-postcode="' . $this->strip_illegal_characters( $user_info->shipping_postcode ) . '" data-shipping-state="' . $this->strip_illegal_characters( $user_info->shipping_state ) . '" data-shipping-country="' . $this->strip_illegal_characters( $user_info->shipping_country ) . '">' . __( 'Edit', 'lightning-dashboard' ) . '</a>';

						}

						$i = $i + 1;

					}

				}

				// Encode json
				 
				$json_data = array(
					'recordsTotal'		=> count( $ids ),
					'data'				=> $nestedData
				);
				 
				echo json_encode( $json_data );

			} else {

				// Encode json

				$json_data = array(
					'data' => array()
				);
				 
				echo json_encode( $json_data );

			}

			exit;

		}

		/**
		 * Save via AJAX
		 *
		 * @since 1.0.0
		 */

		public function save() {

			if( isset( $_POST ) ) {

				// Get tab and ids

				$tab = ldash_current_tab();
				$ids = $_POST['ids']; // Sanitized later once an array

				if( !is_array( $ids ) ) {

					$single_id_array = array();
					$single_id_array[] = $ids;
					$ids = $single_id_array;

				}

				// Sanitize

				$ids = array_map( 'strip_tags', $_POST['ids'] );

				if( !empty( $ids ) ) {

					// Tabs

					if( $tab == 'orders' ) {

						// Save order data

						$status = sanitize_text_field( $_POST['status'] );
						$remove_personal_data = sanitize_text_field( $_POST['remove_personal_data'] );

						if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {
							$invoice = $_POST['invoice'];
						}

						foreach( $ids as $id ) {

							// Get order object

							$order = wc_get_order( $id );

							// If order object exists

							if( !empty( $order ) ) {

								// Order status update

								if( !empty( $status ) ) {

									if( $status == 'trash' ) {

										wp_trash_post( $id );

									} else {

										$order->update_status( $status );
										$order->save();

									}

								}

								// Remove personal data

								if( !empty( $remove_personal_data ) && $remove_personal_data == 1 ) {

									WC_Privacy_Erasers::remove_order_personal_data( $order );

								}

								if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {

									// Invoice

									if( ldash_add_on_active( 'invoices-packing-slips' ) && get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_enable' ) == 'on' ) {

										if( $invoice == '0' ) {

											delete_post_meta( $id, '_ldash_invoice_number' );
											delete_post_meta( $id, '_ldash_invoice_number_display' );
											delete_post_meta( $id, '_ldash_invoice_timestamp' );

										}

										if( !empty( $invoice ) ) {

											$invoice_number_display = get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_prefix' ) . $invoice . get_option( 'ldash_add_on_invoices_packing_slips_invoice_numbers_suffix' );
											$invoice_number_display = apply_filters( 'ldash_add_on_invoices_packing_slips_invoice_number_display', $invoice_number_display );

											update_post_meta( $id, '_ldash_invoice_number', $invoice );
											update_post_meta( $id, '_ldash_invoice_number_display', $invoice_number_display );
											update_post_meta( $id, '_ldash_invoice_timestamp', time() );

										}

									}

								}

							}

						}

					} elseif( $tab == 'products' ) {

						// Save product data

						$title = sanitize_text_field( $_POST['title'] );
						$sku = sanitize_text_field( $_POST['sku'] );
						$status = sanitize_text_field( $_POST['status'] );
						$regular_price = sanitize_text_field( $_POST['regular_price'] );
						$sale_price = sanitize_text_field( $_POST['sale_price'] );
						$on_sale = sanitize_text_field( $_POST['on_sale'] );
						$stock_level = sanitize_text_field( $_POST['stock_level'] );
						$stock_level_no = sanitize_text_field( $_POST['stock_level_no'] );
						$stock_status = sanitize_text_field( $_POST['stock_status'] );
						$categories = array_map( 'strip_tags', $_POST['categories'] );
						$featured = sanitize_text_field( $_POST['featured'] );

						foreach( $ids as $id ) {

							$product = wc_get_product( $id );

							if( !empty( $product ) ) {

								if( !empty( $title ) ) {

									$product->set_name( $title );

								}

								if( !empty( $sku ) ) {

									$product->set_sku( $sku );

								} else {

									$product->set_sku( '' );

								}

								if( !empty( $status ) ) {

									$product->set_status( $status );

								}

								if( !empty( $regular_price ) && $regular_price !== 'N/A' ) {

									$product->set_price( $regular_price );
									$product->set_regular_price( $regular_price );

								} else {

									if( empty( $regular_price ) ) {

										$product->set_price( '' );
										$product->set_regular_price( '' );

									}

								}

								if( !empty( $sale_price ) && $sale_price !== 'N/A' ) {

									$product->set_sale_price( $sale_price );
									$product->set_price( $sale_price );
									
								} else {

									if( empty( $sale_price ) ) {

										$product->set_sale_price( '' );

									}

								}

								if( $stock_level_no == 1 ) {

									$product->set_manage_stock( 'no' );

								} else {

									// Stock level we don't want to use the !empty condition, as this could be 0

									if( $stock_level !== '' && !empty( $stock_status ) ) {

										$product->set_stock_quantity( $stock_level );
										$product->set_manage_stock( 'yes' );
										$product->set_stock_status( $stock_status );

									}

								}

								if( !empty( $stock_status ) ) {

									if( $stock_status == 'outofstock' ) {

										$product->set_manage_stock( 'yes' );
										$product->set_backorders( 'no' );
										$product->set_stock_status( $stock_status );
										$product->set_stock_quantity( 0 );

									} elseif( $stock_status == 'onbackorder' ) {

										$product->set_manage_stock( 'yes' );
										$product->set_backorders( 'yes' );
										$product->set_stock_status( $stock_status );

									} elseif( $stock_status == 'instock' ) {

										$product->set_stock_status( $stock_status );

									}

								}

								if( !empty( $categories ) ) {

									$category_ids = array();

									if( !is_array( $categories ) ) {

										$categories = array(
											$categories
										);

									}

									if( !empty( $categories ) ) {
									
										foreach( $categories as $category ) {

											if( !empty( $category ) ) {

												$category_ids[] = strtok( $category, '-' );

											}

										}

									}

									if( !empty( $category_ids ) ) {

										$product->set_category_ids( $category_ids );

									}

								}

								if( !empty( $featured ) ) {

									$product->set_featured( $featured );

								}

								$product->save();

							}

							

						}

					} elseif( $tab == 'customers' ) {

						// Save customer data

						$billing_first_name = sanitize_text_field( $_POST['billing_first_name'] );
						$billing_last_name = sanitize_text_field( $_POST['billing_last_name'] );
						$billing_company = sanitize_text_field( $_POST['billing_company'] );
						$billing_email = sanitize_text_field( $_POST['billing_email'] );
						$billing_phone = sanitize_text_field( $_POST['billing_phone'] );
						$billing_address_line_1 = sanitize_text_field( $_POST['billing_address_line_1'] );
						$billing_address_line_2 = sanitize_text_field( $_POST['billing_address_line_2'] );
						$billing_city = sanitize_text_field( $_POST['billing_city'] );
						$billing_postcode = sanitize_text_field( $_POST['billing_postcode'] );
						$billing_state = sanitize_text_field( $_POST['billing_state'] );
						$billing_country = sanitize_text_field( $_POST['billing_country'] );

						$shipping_first_name = sanitize_text_field( $_POST['shipping_first_name'] );
						$shipping_last_name = sanitize_text_field( $_POST['shipping_last_name'] );
						$shipping_company = sanitize_text_field( $_POST['shipping_company'] );
						$shipping_address_line_1 = sanitize_text_field( $_POST['shipping_address_line_1'] );
						$shipping_address_line_2 = sanitize_text_field( $_POST['shipping_address_line_2'] );
						$shipping_city = sanitize_text_field( $_POST['shipping_city'] );
						$shipping_postcode = sanitize_text_field( $_POST['shipping_postcode'] );
						$shipping_state = sanitize_text_field( $_POST['shipping_state'] );
						$shipping_country = sanitize_text_field( $_POST['shipping_country'] );

						foreach( $ids as $id ) {

							$customer = new WC_Customer( $id );

							if( !empty( $customer ) ) {

								if( !empty( $billing_first_name ) ) {

									$customer->set_first_name( $billing_first_name );
									$customer->set_billing_first_name( $billing_first_name );

								}

								if( !empty( $billing_last_name ) ) {

									$customer->set_last_name( $billing_last_name );
									$customer->set_billing_last_name( $billing_last_name );

								}

								if( !empty( $billing_company ) ) { // optional

									$customer->set_billing_company( $billing_company );

								} else {

									$customer->set_billing_company( '' );

								}

								if( !empty( $billing_email ) ) {

									$customer->set_email( $billing_email );
									$customer->set_billing_email( $billing_email );

								}

								if( !empty( $billing_phone ) ) {

									$customer->set_billing_phone( $billing_phone );

								}

								if( !empty( $billing_address_line_1 ) ) {

									$customer->set_billing_address_1( $billing_address_line_1 );

								}

								if( !empty( $billing_address_line_2 ) ) { // optional

									$customer->set_billing_address_2( $billing_address_line_2 );

								} else {

									$customer->set_billing_address_2( '' );

								}

								if( !empty( $billing_city ) ) {

									$customer->set_billing_city( $billing_city );

								}

								if( !empty( $billing_postcode ) ) {

									$customer->set_billing_postcode( $billing_postcode );

								}

								if( !empty( $billing_state ) ) {

									$customer->set_billing_state( $billing_state );

								}

								if( !empty( $billing_country ) ) {

									$customer->set_billing_country( $billing_country );

								}

								if( !empty( $shipping_first_name ) ) {

									$customer->set_shipping_first_name( $shipping_first_name );

								}

								if( !empty( $shipping_last_name ) ) {

									$customer->set_shipping_last_name( $shipping_last_name );

								}

								if( !empty( $shipping_company ) ) {

									$customer->set_shipping_company( $shipping_company );

								} else {

									$customer->set_shipping_company( '' );

								}

								if( !empty( $shipping_address_line_1 ) ) {

									$customer->set_shipping_address_1( $shipping_address_line_1 );

								}

								if( !empty( $shipping_address_line_2 ) ) {

									$customer->set_shipping_address_2( $shipping_address_line_2 );

								} else {

									$customer->set_shipping_address_2( '' );

								}

								if( !empty( $shipping_city ) ) {

									$customer->set_shipping_city( $shipping_city );

								}

								if( !empty( $shipping_postcode ) ) {

									$customer->set_shipping_postcode( $shipping_postcode );

								}

								if( !empty( $shipping_state ) ) {

									$customer->set_shipping_state( $shipping_state );

								}

								if( !empty( $shipping_country ) ) {

									$customer->set_shipping_country( $shipping_country );

								}

								$customer->save();

							}

						}

					}

				}
		 
			}

		  	exit;

		}

		/**
		 * Deletes via AJAX
		 *
		 * @since 1.0.0
		 */

		public function delete() {

			if( isset( $_POST ) ) {

				$ids = $_POST['ids']; // Sanitized later once an array
				$type = sanitize_text_field( $_POST['type'] );

				if( !is_array( $ids ) ) {

					$single_id_array = array();
					$single_id_array[] = $ids;
					$ids = $single_id_array;

				}

				$ids = array_map( 'strip_tags', $_POST['ids'] );

				if( !empty( $ids ) ) {

					foreach( $ids as $id ) {

						if( $type == 'customers' ) {

							wp_delete_user( $id );

						} else {

							wp_delete_post( $id, true );

						}

					}

				}

			}

			exit;

		}

		/**
		 * Strips illegal characters from a string
		 *
		 * @since 1.0.0
		 * @param string $string The string to remove illegal characters from
		 * @return string String after removal of illegal characters
		 */

		public function strip_illegal_characters( $string ) {

			return str_replace( '"', '', $string );

		}

	}

	new LDASH_Datatable();

}