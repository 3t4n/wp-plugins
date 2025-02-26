<?php

require_once 'class-elex-shipping-usps.php';

class ELEX_Shipping_API_Request extends ELEX_Shipping_USPS {

	public $rate;

	public function Elex_USPS_evs_test_request() {
		
		if ( ! get_transient( 'my_setting_saved' ) ) {
			set_transient( 'my_setting_saved', 1, 1 );
			if ( isset( $_POST['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) ) ) {
				$settings = 0;
			}
			if ( ! ( isset( $_POST['woocommerce_elex_shipping_usps_user_id'] ) && isset( $_POST['woocommerce_elex_shipping_usps_password'] ) ) ) {
				return;
			}
			// Dummy request to test the validation of usernames and passwords.
		$example_xml  = '<RateV4Request USERID="' . sanitize_text_field( $_POST['woocommerce_elex_shipping_usps_user_id'] ) . '" PASSWORD="' . sanitize_text_field( $_POST['woocommerce_elex_shipping_usps_password'] ) . '">';
			$example_xml .= '<Revision>2</Revision>';
			$example_xml .= '<Package ID="1">';
			$example_xml .= '<Service>PRIORITY</Service>';
			$example_xml .= '<ZipOrigination>97201</ZipOrigination>';
			$example_xml .= '<ZipDestination>44101</ZipDestination>';
			$example_xml .= '<Pounds>1</Pounds>';
			$example_xml .= '<Ounces>0</Ounces>';
			$example_xml .= '<Container />';
			$example_xml .= '<Size>REGULAR</Size>';
			$example_xml .= '</Package>';
			$example_xml .= '</RateV4Request>';

			$response = wp_remote_post(
				$this->endpoint,
				array(
					'body' => 'API=RateV4&XML=' . $example_xml,
				)
			);

			if ( is_wp_error( $response ) ) {
				return;
			}
			$xml = $this->get_parsed_xml( $response['body'] );
			if ( ! ( $xml ) ) {
				return;
			}
			if ( ! is_object( $xml ) && ! is_a( $xml, 'SimpleXMLElement' ) ) {
				return;
			}

			// 80040B1A is an Authorization failure
			if ( '80040B1A' !== $xml->Number->__toString() ) {
				return;
			}

			echo wp_kses_post(
				'<div class="error">
                <p>' . __( 'The USPS User ID you entered is invalid. Please make sure you entered a valid ID (<a href="https://www.usps.com/business/web-tools-apis/welcome.htm">which can be obtained here</a>). Our User ID will be used instead.', 'wf-usps-woocommerce-shipping' ) . '</p>
            </div>'
			);
		}

	}

	public function Elex_USPS_Auth_test_request() {

		if ( ! get_transient( 'my_setting_saved' ) ) {
			set_transient( 'my_setting_saved', 1, 1 );

			if ( isset( $_POST['_wpnonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) ) ) {
				$setting = 0;
			}

		
			if ( ! ( isset( $_POST['woocommerce_wf_shipping_usps_client_id'] ) && ! isset( $_POST['woocommerce_wf_shipping_usps_client_secret'] ) ) ) {
				return;
			}

				$example_request = array(
					'client_id' => sanitize_text_field( wp_unslash( $_POST['woocommerce_wf_shipping_usps_client_id'] ) ),
			

					'client_secret' => sanitize_text_field( wp_unslash( $_POST['woocommerce_wf_shipping_usps_client_secret'] ) ),
					'response_type' => 'code',
					'scope' => 'prices labels tracking payments international-prices international-labels carrier-pickup',
					'grant_type' => 'client_credentials',
				);
				$example_request_encode = wp_json_encode( $example_request );
				if ( 'LIVE' == $this->intergration ) {
					$Auth_Validation_endpoint = 'https://api.usps.com/oauth2/v3/token';
				} else {
					$Auth_Validation_endpoint = 'https://api-cat.usps.com/oauth2/v3/token';
				}
				
				$response = wp_remote_post( 
					$Auth_Validation_endpoint,
					array(
						'method' => 'POST',
						'timeout' => 40,
						'blocking' => true,
						'body' => $example_request_encode,
						'headers' => array(
							'Content-Type' => 'application/json',
						),
					)
				);

			if ( is_wp_error( $response ) ) {
				return;
			}

				$response_body = json_decode( $response['body'] );
			if ( ! ( isset( $response_body->error ) ) ) {
				return;
			}

			if ( isset( $response_body->status ) && 'approved' === $response_body->status ) {
				return;
			}

				echo wp_kses_post(
					'<div class="error">
					<p>' . __( 'The USPS Client_ID or Client_secret you entered is invalid. Please make sure you entered a valid Credentials (<a href="https://www.usps.com/business/web-tools-apis/welcome.htm">which can be obtained here</a>). Our Credentials will be used instead.', 'wf-usps-woocommerce-shipping' ) . '</p>
				</div>'
				);
			
		}
	}

	public function Elex_USPS_evs_Calculate_shipping( $package ) {
		global $woocommerce;
		$valid_response = true;
		$debug_message = '';

		$this->rates               = array();
		$this->unpacked_item_costs = 0;
		$domestic                  = in_array( $package['destination']['country'], $this->domestic ) ? true : false;
		$debug_message .= sprintf( 'USPS debug mode is on - to hide these messages, turn debug mode off in the settings.' );
		$debug_message .= "\n";
		wc()->session->set( 'elex_usps_debug_message', $debug_message );

		if ( $this->enable_standard_services ) {

			$package_requests = $this->get_package_requests( $package );
			$api              = $domestic ? 'RateV4' : 'IntlRateV2';
			libxml_use_internal_errors( true );

			if ( $package_requests ) {

				$request  = '<' . $api . 'Request USERID="' . $this->user_id . '" PASSWORD="' . $this->password . '">' . "\n";
				$request .= '<Revision>2</Revision>' . "\n";

				foreach ( $package_requests as $key => $package_request ) {
					$request .= $package_request['request_data'];
				}

				$request .= '</' . $api . 'Request>' . "\n";
				$request  = 'API=' . $api . '&XML=' . str_replace( array( "\n", "\r" ), '', $request );

				$transient       = 'usps_quote_' . md5( $request );
				$cached_response = get_transient( $transient );

				if ( null !== wc()->session ) {
					$debug_message = wc()->session->get( 'elex_usps_debug_message' );
					$debug_message .= "\n";
					$debug_message .= sprintf( 'USPS REQUEST:' );
					$debug_message .= "\n";
					$debug_message .= print_r( ( $request ), true );
					wc()->session->set( 'elex_usps_debug_message', $debug_message );
				}

				if ( false !== $cached_response ) {
					$response = $cached_response;

					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'USPS CACHED RESPONSE:' );
						$debug_message .= "\n";
						$debug_message .= print_r( ( $response ), true );
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
				} else {
					$response = wp_remote_post(
						$this->endpoint,
						array(
							'timeout' => 70,
							'sslverify' => 0,
							'body' => $request,
						)
					);

					if ( is_wp_error( $response ) ) {
						$error_string = $response->get_error_message();
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'USPS REQUEST FAILED' );
							$debug_message .= "\n";
							$debug_message .= $error_string;
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						if ( $this->fallback && ! empty( $this->custom_services ) ) {
							$this->add_rate(
								array(
									'id' => $this->id . '_fallback',
									'label' => $this->title,
									'cost' => $this->fallback,
									'sort' => 0,
								)
							);
						}
						$response = false;
					} else {
						$response = $response['body'];

						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'USPS RESPONSE:' );
							$debug_message .= "\n";
							$debug_message .= print_r( ( $response ), true );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}

						set_transient( $transient, $response, DAY_IN_SECONDS * 30 );
					}
				}
			
				if ( $response ) {
					$xml = $this->get_parsed_xml( $response );
					if ( ! ( $xml ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Failed loading XML' );
							$debug_message .= "\n";
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
					}

					if ( ! is_object( $xml ) && ! is_a( $xml, 'SimpleXMLElement' ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Invalid XML response format' );
							$debug_message .= "\n";
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
					}

					// Our XML response is as we like it. Begin parsing.
					$usps_packages = $xml;

					if ( ! empty( $usps_packages ) ) {
						foreach ( $usps_packages as $usps_package ) {
							if ( ! $usps_package || ! is_object( $usps_package ) ) {
								continue;
							}
							// Get package data
							$data_parts = explode( ':', $usps_package->attributes()->ID );
							if ( count( $data_parts ) < 6 ) {
								$valid_response = false; // when the request has invalid ID or no valid address was found.
								continue;
							}

							list( $package_item_id, $cart_item_qty, $package_length, $package_width, $package_height, $package_weight ) = $data_parts;

							$quotes = $usps_package->children();
						
							if ( $this->debug ) {
								$found_quotes = array();

								foreach ( $quotes as $quote ) {
									if ( $domestic ) {
										$code = strval( $quote->attributes()->CLASSID );
										$name = strip_tags( htmlspecialchars_decode( (string) $quote->{'MailService'} ) );
									} else {
										$code = strval( $quote->attributes()->ID );
										$name = strip_tags( htmlspecialchars_decode( (string) $quote->{'SvcDescription'} ) );
									}

									if ( $name && $code ) {
										$found_quotes[ $code ] = $name;
									} elseif ( $name ) {
										$found_quotes[ $code . '-' . sanitize_title( $name ) ] = $name;
									}
								}

								if ( $found_quotes ) {
									ksort( $found_quotes );
									$found_quotes_html = '';
									foreach ( $found_quotes as $code => $name ) {
										if ( ! strstr( $name, 'Flat Rate' ) ) {
											$found_quotes_html .= '<li>' . $code . ' - ' . $name . '</li>';
										}
									}
									if ( null !== wc()->session ) {
										$debug_message = wc()->session->get( 'elex_usps_debug_message' );
										$debug_message .= "\n";
										$debug_message .= sprintf( 'The following quotes were returned by USPS:' );
										$debug_message .= "\n";
										$debug_message .= print_r( $found_quotes_html  , true );
										$debug_message .= "\n";
										$debug_message .= sprintf( 'If any of these do not display, they may not be enabled in USPS settings.' );
										wc()->session->set( 'elex_usps_debug_message', $debug_message );
									}
								}
							}

							// Loop our known services
							foreach ( $this->services as $service => $values ) {

								if ( $domestic && strpos( $service, 'D_' ) !== 0 ) {
									continue;
								}

								if ( ! $domestic && strpos( $service, 'I_' ) !== 0 ) {
									continue;
								}

								$rate_code      = (string) $service;
								$rate_id        = $this->id . ':' . $rate_code;
								$rate_name      = (string) $values['name'] . ' (' . $this->title . ')';
								$rate_cost      = null;
								$svc_commitment = null;
								
								foreach ( $quotes as $quote ) {

									if ( $domestic ) {
										$code = strval( $quote->attributes()->CLASSID );
									} else {
										$code = strval( $quote->attributes()->ID );
									}

									if ( '' !== $code && in_array( $code, array_keys( $values['services'] ) ) ) {

										if ( $domestic ) {
											if ( $this->disable_commercial_rates ) {
												if ( ( (float) $quote->{'Rate'} ) > 0.0 ) {
													$cost = (float) $quote->{'Rate'} * $cart_item_qty;
												} else {
													continue;
												}
											} else {
												if ( ! empty( $quote->{'CommercialRate'} ) ) {
													$cost = (float) $quote->{'CommercialRate'} * $cart_item_qty;
												} else {
													$cost = (float) $quote->{'Rate'} * $cart_item_qty;
												}
											}
										} else {

											if ( ! empty( $quote->{'CommercialPostage'} ) ) {
												$cost = (float) $quote->{'CommercialPostage'} * $cart_item_qty;
											} else {
												$cost = (float) $quote->{'Postage'} * $cart_item_qty;
											}
										}
										// Cost adjustment %
										if ( ! empty( $this->custom_services[ $rate_code ][ $code ]['adjustment_percent'] ) ) {
											$cost = round( $cost + ( $cost * ( floatval( $this->custom_services[ $rate_code ][ $code ]['adjustment_percent'] ) / 100 ) ), wc_get_price_decimals() );
										}

										// Cost adjustment
										if ( ! empty( $this->custom_services[ $rate_code ][ $code ]['adjustment'] ) ) {
											$cost = round( $cost + floatval( $this->custom_services[ $rate_code ][ $code ]['adjustment'] ), wc_get_price_decimals() );
										}

										// Enabled check
										if ( isset( $this->custom_services[ $rate_code ][ $code ] ) && empty( $this->custom_services[ $rate_code ][ $code ]['enabled'] ) ) {
											continue;
										}

										if ( $domestic ) {
											switch ( $code ) {
												// Handle first class - there are multiple d0 rates and we need to handle size retrictions because the USPS API doesn't do this.
												case '0':
													$service_name = strip_tags( htmlspecialchars_decode( (string) $quote->{'MailService'} ) );
														/** 
														 * Fire a filter hook for first class service
														 *
														 * @since 2002
														 * @param $package
														 */  
													if ( apply_filters( 'usps_disable_first_class_rate_' . sanitize_title( $service_name ), false ) ) {
														continue 2;
													}

													if ( strstr( $service_name, 'Package Service - Retail' ) ) {
														if ( 'ONLINE' == $this->settings['shippingrates'] ) {
															continue 2;
														}
													}
													break;
												// Media mail has restrictions - check here
												case '6':
													if ( count( $this->mediamail_restriction ) > 0 ) {
														$invalid = false;

														foreach ( $package['contents'] as $package_item ) {
															if ( ! in_array( $package_item['data']->get_shipping_class_id(), $this->mediamail_restriction ) ) {
																// Checking if product is virutal. If it is,
																// then don't skip media mail.
																if ( ! $package_item['data']->is_virtual() ) {
																	$invalid = true;
																}
															}
														}

														if ( $invalid ) {
															if ( null !== wc()->session ) {
																$debug_message = wc()->session->get( 'elex_usps_debug_message' );
																$debug_message .= "\n";
																$debug_message .= sprintf( 'Skipping media mail' );
																$debug_message .= "\n";
																wc()->session->set( 'elex_usps_debug_message', $debug_message );
															}
														}

														if ( $invalid ) {
															continue 2;
														}
													}
													break;
											}
										}

										if ( $domestic && $package_length && $package_width && $package_height ) {
											switch ( $code ) {
												// Regional rate boxes need additonal checks to deal with USPS's API
												case '47':
													if ( ( $package_length > 10 || $package_width > 7 || $package_height > 4.75 ) && ( $package_length > 12.875 || $package_width > 10.9375 || $package_height > 2.365 ) ) {
														continue 2;
													} else {
														// Valid
														break;
													}
													break;
												case '49':
													if ( ( $package_length > 12 || $package_width > 10.25 || $package_height > 5 ) && ( $package_length > 15.875 || $package_width > 14.375 || $package_height > 2.875 ) ) {
														continue 2;
													} else {
														// Valid
														break;
													}
													break;
												case '58':
													if ( $package_length > 14.75 || $package_width > 11.75 || $package_height > 11.5 ) {
														continue 2;
													} else {
														// Valid
														break;
													}
													break;
												// Handle first class - there are multiple d0 rates and we need to handle size retrictions because the API doesn't do this for us!
												case '0':
													$service_name = strip_tags( htmlspecialchars_decode( (string) $quote->{'MailService'} ) );

													if ( strstr( $service_name, 'Postcards' ) ) {

														if ( $package_length > 6 || $package_length < 5 ) {
															continue 2;
														}
														if ( $package_width > 4.25 || $package_width < 3.5 ) {
															continue 2;
														}
														if ( $package_height > 0.016 || $package_height < 0.007 ) {
															continue 2;
														}
													} elseif ( strstr( $service_name, 'Large Envelope' ) ) {

														if ( $package_length > 15 || $package_length < 11.5 ) {
															continue 2;
														}
														if ( $package_width > 12 || $package_width < 6 ) {
															continue 2;
														}
														if ( $package_height > 0.75 || $package_height < 0.25 ) {
															continue 2;
														}
													} elseif ( strstr( $service_name, 'Letter' ) ) {

														if ( $package_length > 11.5 || $package_length < 5 ) {
															continue 2;
														}
														if ( $package_width > 6.125 || $package_width < 3.5 ) {
															continue 2;
														}
														if ( $package_height > 0.25 || $package_height < 0.007 ) {
															continue 2;
														}
													} elseif ( strstr( $service_name, 'Package Service - Retail' ) ) {
														if ( 'ONLINE' != $this->settings['shippingrates'] ) {
															if ( 'oz' == $this->weight_unit ) {
																if ( $package_weight > 13 ) {
																	continue 2;
																}
															} else {
																$package_weight_in_oz = wc_get_weight( $package_weight, 'oz', $this->weight_unit );
																if ( $package_weight_in_oz > 13 ) {
																	continue 2;
																}
															}
														}                                                   
													} else {
														continue 2;
													}
													break;
											}
										}

										if ( is_null( $rate_cost ) ) {
											$rate_cost      = $cost;
											$svc_commitment = $quote->SvcCommitments;
										} elseif ( $cost < $rate_cost ) {
											$rate_cost      = $cost;
											$svc_commitment = $quote->SvcCommitments;
										}
									}
								}
		
								if ( $rate_cost ) {
									if ( ! empty( $svc_commitment ) && strstr( $svc_commitment, 'days' ) ) {
										$rate_name .= ' (' . current( explode( 'days', $svc_commitment ) ) . ' days)';
									}
									$this->prepare_rate( $rate_code, $rate_id, $rate_name, $rate_cost );
								}
							}
						}
					} else {
						// No rates
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Invalid request; no rates returned' );
							$debug_message .= "\n";
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
					}
				}
			}


			// Ensure rates were found for all packages
			if ( $this->found_rates ) {
				
				foreach ( $this->found_rates as $key => $value ) {
					if ( $value['packages'] < count( $package_requests ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Unsetting {' );
							$debug_message .= print_r( $key  , true );
							$debug_message .= sprintf( '} - too few packages.' );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						unset( $this->found_rates[ $key ] );
					}

					if ( $this->unpacked_item_costs && ! empty( $this->found_rates[ $key ] ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Adding unpacked item costs to rate %s', $key );
							$debug_message .= "\n";
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						$this->found_rates[ $key ]['cost'] += $this->unpacked_item_costs;
					}
				}
			}
		}
		// Add rates
		if ( $this->found_rates ) {

			// Only offer one priority rate
			if ( isset( $this->found_rates['usps:D_PRIORITY_MAIL'] ) && isset( $this->found_rates['usps:flat_rate_box_priority'] ) ) {
				if ( $this->found_rates['usps:flat_rate_box_priority']['cost'] < $this->found_rates['usps:D_PRIORITY_MAIL']['cost'] ) {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL api rate - flat rate box is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:D_PRIORITY_MAIL'] );
				} else {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL flat rate - api rate is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:flat_rate_box_priority'] );
				}
			}

			if ( isset( $this->found_rates['usps:D_EXPRESS_MAIL'] ) && isset( $this->found_rates['usps:flat_rate_box_express'] ) ) {
				if ( $this->found_rates['usps:flat_rate_box_express']['cost'] < $this->found_rates['usps:D_EXPRESS_MAIL']['cost'] ) {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL EXPRESS api rate - flat rate box is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:D_EXPRESS_MAIL'] );
				} else {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL EXPRESS flat rate - api rate is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:flat_rate_box_express'] );
				}
			}

			if ( isset( $this->found_rates['usps:I_PRIORITY_MAIL'] ) && isset( $this->found_rates['usps:flat_rate_box_priority'] ) ) {
				if ( $this->found_rates['usps:flat_rate_box_priority']['cost'] < $this->found_rates['usps:I_PRIORITY_MAIL']['cost'] ) {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL api rate - flat rate box is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:I_PRIORITY_MAIL'] );
				} else {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL flat rate - api rate is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:flat_rate_box_priority'] );
				}
			}

			if ( isset( $this->found_rates['usps:I_EXPRESS_MAIL'] ) && isset( $this->found_rates['usps:flat_rate_box_express'] ) ) {
				if ( $this->found_rates['usps:flat_rate_box_express']['cost'] < $this->found_rates['usps:I_EXPRESS_MAIL']['cost'] ) {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL EXPRESS api rate - flat rate box is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:I_EXPRESS_MAIL'] );
				} else {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Unsetting PRIORITY MAIL EXPRESS flat rate - api rate is cheaper.' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
					unset( $this->found_rates['usps:flat_rate_box_express'] );
				}
			}
			return $this->found_rates;
	  
		}
	}

	public function Elex_USPS_Auth_Calculate_shipping( $package ) {
		$debug_message = '';
		$this->rate = array();
		$this->unpacked_item_costs = 0;
		$domestic = in_array( $package['destination']['country'], $this->domestic ) ? true : false;
		$debug_message .= sprintf( 'USPS debug mode is on - to hide these messages, turn debug mode off in the settings.' );
		$debug_message .= "\n";
		wc()->session->set( 'elex_usps_debug_message', $debug_message );
		if ( $this->enable_standard_services ) {
			$package_requests = $this->get_auth_package_request( $package );
			$stored_access_token = get_transient( 'usps_auth_token' );

			if ( false === $stored_access_token ) {
				$this->Elex_USPS_Auth_Token_generater( $this->client_id, $this->client_secret );
			}
			$stored_access_token = get_transient( 'usps_auth_token' );

			if ( 'LIVE' == $this->intergration ) {
				$rates_endpoint_api = $domestic ? 'https://api.usps.com/prices/v3/total-rates/search' : 'https://api.usps.com/international-prices/v3/base-rates-list/search';
			} else {
				$rates_endpoint_api = $domestic ? 'https://api-cat.usps.com/prices/v3/total-rates/search' : 'https://api-cat.usps.com/international-prices/v3/base-rates-list/search';
			}

			$usps_package_total_weight = 0;
		
			if ( $package_requests ) {
				foreach ( $package_requests as $key => $package_request ) {
					$usps_package_total_weight += $package_request['request_data']['weight'];

					try {
						$send_usps_request_encode = wp_json_encode( $package_request['request_data'] );
						$debug_request = json_encode( $package_request['request_data'], JSON_PRETTY_PRINT );
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'USPS REQUEST:' );
							$debug_message .= "\n";
							$debug_message .= print_r( $debug_request , true );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						$response = wp_remote_post( 
							$rates_endpoint_api,
							array(
								'method'   => 'POST',
								'timeout'  => 70,
								'blocking' => true,
								'body'     => $send_usps_request_encode,
								'headers'  => array(
									
									'Authorization' => 'Bearer ' . $stored_access_token,
									'Content-Type'  => 'application/json',
								),
							) 
						);
						
						if ( is_wp_error( $response ) ) {
							$error_string = $response->get_error_message();
							if ( null !== wc()->session ) {
								$debug_message = wc()->session->get( 'elex_usps_debug_message' );
								$debug_message .= "\n";
								$debug_message .= sprintf( 'USPS REQUEST FAILED' . $error_string );
								$debug_message .= "\n";
								wc()->session->set( 'elex_usps_debug_message', $debug_message );
							}
							if ( $this->fallback && ! empty( $this->custom_services ) ) {
								$this->add_rate(
									array(
										'id' => $this->id . '_fallback',
										'label' => $this->title,
										'cost' => $this->fallback,
										'sort' => 0,
									)
								);
							}
							$response = false;
							throw new Exception( 'USPS response Failed' );
						}
						$response_body = json_decode( $response['body'] );
						if ( isset( $response_body->fault ) ) {
							throw new Exception( $response_body->fault->faultstring );
						}
						if ( isset( $response_body->error ) ) {
							throw new Exception( $response_body->error->message );
						}
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'USPS RESPONSE:' );
							$debug_message .= "\n";
							$debug_message .= print_r( $response_body , true );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						$responses_ele[] = array(
							'rates_response' => $response_body,
							'product_info' => $package_request['package_info'],

						);

					} catch ( Exception $e ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'USPS - Unable to Get Rates: ' );
							$debug_message .= "\n";
							$debug_message .= print_r( $e->getMessage(), true );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						return false;
					
					}               
				}
				$delivery_response = null;
				if ( $domestic && isset( $this->estimated_delivery_date ) && 'yes' === $this->estimated_delivery_date ) {
					$delivery_response = $this->Auth_estimated_deliverydate_request( $package, $usps_package_total_weight );
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'USPS - Estimated Delivery Response: ' );
						$debug_message .= "\n";
						$debug_message .= print_r( $delivery_response, true );
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
				}
				if ( ! empty( $responses_ele ) ) {
					
					$usps_packages = $responses_ele;
					foreach ( $usps_packages as $usps_package ) {
						$quotes = $usps_package['rates_response']->rateOptions;

						foreach ( $this->auth_services as $service => $values ) {
							if ( $domestic && strpos( $service, 'D_' ) !== 0 ) {
								continue;
							}

							if ( ! $domestic && strpos( $service, 'I_' ) !== 0 ) {
								continue;
							}

							$rate_code      = (string) $service;
							$rate_id        = $this->id . ':' . $rate_code;
							$rate_name      = (string) $values['name'] . ' (' . $this->title . ')';
							$rate_cost      = null;
							$svc_commitment = null;
							$rate_delivery = null;

							$cart_item_qty = $usps_package['product_info']['items']['qty'];
							foreach ( $quotes as $quote ) {
								$code_zone = $quote->rates[0]->SKU;
								$code = substr( $code_zone, 0, 9 );
								if ( '' !== $code && in_array( $code, array_keys( $values['services'] ) ) ) {
							
									$cost = (float) $quote->rates[0]->price * $cart_item_qty;
									$mailClass = $quote->rates[0]->mailClass;

									$delivery_mailclasses = array( 'BOUND_PRINTED_MATTER', 'FIRST-CLASS_PACKAGE_SERVICE', 'LIBRARY_MAIL', 'MEDIA_MAIL', 'PARCEL_SELECT', 'PARCEL_SELECT_LIGHTWEIGHT', 'PRIORITY_MAIL', 'PRIORITY_MAIL_EXPRESS', 'USPS_GROUND_ADVANTAGE' );
									if ( ! empty( $delivery_response ) ) {
										if ( in_array( $mailClass, $delivery_mailclasses ) ) {
											
											foreach ( $delivery_response as $delivery_data ) {
												if ( $mailClass === $delivery_data->mailClass ) {
													$rate_delivery = $delivery_data->delivery->scheduledDeliveryDateTime;
												}
											}
										}                                   
									}
									
									if ( isset( $this->auth_custom_services[ $rate_code ][ $code ] ) && empty( $this->auth_custom_services[ $rate_code ][ $code ]['enabled'] ) ) {
										continue;
									}
									if ( $domestic ) {
										if ( 'DMXX0XXXU' == $code || 'DMXX0XXX5' == $code || 'DMXX0XXXB' == $code ) {
											if ( count( $this->mediamail_restriction ) > 0 ) {
													$invalid = false;

												foreach ( $package['contents'] as $package_item ) {
													if ( ! in_array( $package_item['data']->get_shipping_class_id(), $this->mediamail_restriction ) ) {
														// Checking if product is virutal. If it is,
														// then don't skip media mail.
														if ( ! $package_item['data']->is_virtual() ) {
															$invalid = true;
														}
													}
												}

												if ( $invalid ) {
													if ( null !== wc()->session ) {
														$debug_message = wc()->session->get( 'elex_usps_debug_message' );
														$debug_message .= "\n";
														$debug_message .= sprintf( 'Skipping media mail' );
														$debug_message .= "\n";
														wc()->session->set( 'elex_usps_debug_message', $debug_message );
													}
												}

												if ( $invalid ) {
													continue 2;
												}
											}
										}
									}
									
									if ( is_null( $rate_cost ) ) {
										$rate_cost      = $cost;
										
									} elseif ( $cost < $rate_cost ) {
										$rate_cost      = $cost;
									}
								}
							}
							if ( $rate_cost ) {
								$this->prepare_rate_auth_api( $rate_code, $rate_id, $rate_name, $rate_cost, $rate_delivery );
							}                       
						}                   
					}               
				} else {
					if ( null !== wc()->session ) {
						$debug_message = wc()->session->get( 'elex_usps_debug_message' );
						$debug_message .= "\n";
						$debug_message .= sprintf( 'Invalid request; no rates returned' );
						$debug_message .= "\n";
						wc()->session->set( 'elex_usps_debug_message', $debug_message );
					}
				}           
			}
	
			if ( $this->found_rates ) {
				foreach ( $this->found_rates as $key => $value ) {
					if ( $value['packages'] < count( $package_requests ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Unsetting {' );
							$debug_message .= print_r( $key  , true );
							$debug_message .= sprintf( '} - too few packages.' );
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						unset( $this->found_rates[ $key ] );
					}

					if ( $this->unpacked_item_costs && ! empty( $this->found_rates[ $key ] ) ) {
						if ( null !== wc()->session ) {
							$debug_message = wc()->session->get( 'elex_usps_debug_message' );
							$debug_message .= "\n";
							$debug_message .= sprintf( 'Adding unpacked item costs to rate %s', $key );
							$debug_message .= "\n";
							wc()->session->set( 'elex_usps_debug_message', $debug_message );
						}
						$this->found_rates[ $key ]['cost'] += $this->unpacked_item_costs;
					}
				}
			}
		}
		if ( $this->found_rates ) { 
			// Only offer one priority rate
			return $this->found_rates;     
		}



	}
	protected function prepare_rate_auth_api( $rate_code, $rate_id, $rate_name, $rate_cost, $delivery_date ) {
	

		// Name adjustment
		if ( ! empty( $this->custom_services[ $rate_code ]['name'] ) ) {
			$rate_name = $this->custom_services[ $rate_code ]['name'];
		}

		// Merging
		if ( isset( $this->found_rates[ $rate_id ] ) ) {
			$rate_cost = $rate_cost + $this->found_rates[ $rate_id ]['cost'];
			$packages  = 1 + $this->found_rates[ $rate_id ]['packages'];
		} else {
			$packages = 1;
		}

		// Sort
		if ( isset( $this->custom_services[ $rate_code ]['order'] ) ) {
			$sort = $this->custom_services[ $rate_code ]['order'];
		} else {
			$sort = 999;
		}

		$this->found_rates[ $rate_id ] = array(
			'id' => $rate_id,
			'label' => $rate_name,
			'cost' => $rate_cost,
			'sort' => $sort,
			'meta_data' => array(
				'usps_est_delivery_time' => $delivery_date,
			),
			'packages' => $packages,
		);
	}
	public function Auth_estimated_deliverydate_request( $package, $weight ) {

		$stored_access_token = get_transient( 'usps_auth_token' );

		if ( false === $stored_access_token ) {
			$this->Elex_USPS_Auth_Token_generater( $this->client_id, $this->client_secret );
		}
			$stored_access_token = get_transient( 'usps_auth_token' );
			$mailing_date = $this->get_estimated_shipping_date();

			$delivery_request_body = array(
				'originZIPCode' => str_replace( ' ', '', strtoupper( $this->origin ) ),
				'destinationZIPCode' => strtoupper( substr( $package['destination']['postcode'], 0, 5 ) ),
				'acceptanceDate' => $mailing_date,
				'mailClass' => 'ALL',
				'destinationType' => 'STREET',
				'destinationEntryFacilityType' => 'NONE',
				'weight' => $weight,

			);
			$delivery_usps_request_encode = http_build_query( $delivery_request_body );
			if ( 'LIVE' == $this->intergration ) {
				$delivery_endpoint_api = 'https://api.usps.com/service-standards/v3/standards?' . $delivery_usps_request_encode ;
			} else {
				$delivery_endpoint_api = 'https://api-cat.usps.com/service-standards/v3/estimates?' . $delivery_usps_request_encode;
			}

			
						$response = wp_remote_post( 
							$delivery_endpoint_api,
							array(
								'method'   => 'GET',
								'timeout'  => 70,
								'blocking' => true,
								'headers'  => array(
									
									'Authorization' => 'Bearer ' . $stored_access_token,
									'Content-Type'  => 'application/json',
								),
							) 
						);
		if ( is_wp_error( $response ) ) {
			return null;
		}
						
						return json_decode( $response['body'] );

			
	}
	public function get_estimated_shipping_date() {
		//Estimated day and cut off time.
		$timezone   = new DateTimeZone( -5 ); // USPS is Working in central time (GMT-05:00)
		$h_m_d      = wp_date( 'H i D A', null, $timezone );
		$h_m_d      = explode( ' ', $h_m_d );
		$hour       = $h_m_d[0];
		$min        = $h_m_d[1];
		$day        = $h_m_d[2];
		$date_added = 0;
	
		if ( isset( $this->usps_working_days ) && is_array( $this->usps_working_days ) ) {
			while ( ( ! in_array( $day, $this->usps_working_days ) ) ) {
				$date_added = ++$date_added;
				$add        = strtotime( wp_date( 'D', null, $timezone ) . $date_added . 'days' );
				$day        = gmdate( 'D', $add );
			}
		}


		if ( 0 == $date_added ) {
			if ( isset( $this->settings['usps_cut_off_time'] ) && is_array( $this->settings['usps_cut_off_time'] ) ) {
				$cut_off_time = explode( ':', $this->settings['usps_cut_off_time'], 2 );
				if ( $hour > $cut_off_time[0] ) {
					$date_added = 1;
				} elseif ( $hour == $cut_off_time[0] ) {
					if ( $min > $cut_off_time[1] ) {
						$date_added = 1;
					}
				}
			}
		}
	
		if ( isset( $this->settings['usps_lead_time'] ) ) {
			
			$date_added += (int) $this->settings['usps_lead_time'];
			if ( $date_added > 30 ) {
				$date_added = 30;
			}
		}
	
		if ( 0 != $date_added ) {
			$request_shipdate = gmdate( 'Y-m-d', strtotime( wp_date( 'Y-m-d', null, $timezone ) . $date_added . 'days' ) );
		} else {
			$request_shipdate = wp_date( 'Y-m-d', null, $timezone );
		}

		return $request_shipdate;
	}

	public function Elex_USPS_Auth_Token_generater( $client_id, $client_secret ) {
		if ( ! ( isset( $client_id ) && isset( $client_secret ) ) ) {
			return;
		}
		$example_request = array(
			'client_id' => $client_id,
			'client_secret' => $client_secret,
			'response_type' => 'code',
			'scope' => 'prices labels tracking payments international-prices international-labels carrier-pickup standards service-standards',
			'grant_type' => 'client_credentials',
		);
		$example_request_encode = wp_json_encode( $example_request );
		if ( 'LIVE' == $this->intergration ) {
			$Auth_Validation_endpoint = 'https://api.usps.com/oauth2/v3/token';
		} else {
			$Auth_Validation_endpoint = 'https://api-cat.usps.com/oauth2/v3/token';
		}
		$response = wp_remote_post( 
			$Auth_Validation_endpoint,
			array(
				'method' => 'POST',
				'timeout' => 40,
				'blocking' => true,
				'body' => $example_request_encode,
				'headers' => array(
					'Content-Type' => 'application/json',
				),
			)
		);
		if ( is_wp_error( $response ) ) {
			return;
		}

		$response_body = json_decode( $response['body'] );
		if ( ( isset( $response_body->error ) ) ) {
			if ( null !== wc()->session ) {
				$debug_message = wc()->session->get( 'elex_usps_debug_message' );
				$debug_message .= "\n";
				$debug_message .= sprintf( 'USPS Auth Failed:The USPS Client_ID or Client_secret you entered is invalid.' );
				$debug_message .= "\n";
				wc()->session->set( 'elex_usps_debug_message', $debug_message );
			}
		}

		if ( isset( $response_body->status ) && 'approved' === $response_body->status && isset( $response_body->access_token ) ) {
			$token = $response_body->access_token;
			set_transient( 'usps_auth_token', $token, 21600 );

		}


	}

	public function get_auth_package_request( $package ) {
		
		$request = array();
		$domestic = in_array( $package['destination']['country'], $this->domestic ) ? true : false;

		foreach ( $package['contents'] as $item_id => $values ) {
			$packed_items = array();
			$values['data'] = $this->wf_load_product( $values['data'] );
			if ( ! $values['data']->needs_shipping() ) {
				if ( null !== wc()->session ) {
					$debug_message = wc()->session->get( 'elex_usps_debug_message' );
					$debug_message .= "\n";
					$debug_message .= sprintf( 'Product %d is virtual. Skipping.', $item_id );
					$debug_message .= "\n";
					wc()->session->set( 'elex_usps_debug_message', $debug_message );
				}
				continue;
			}
			if ( ! $values['data']->get_weight() ) {
				if ( null !== wc()->session ) {
					$debug_message = wc()->session->get( 'elex_usps_debug_message' );
					$debug_message .= "\n";
					$debug_message .= sprintf( 'Product #%d is missing weight. Using 1lb.', $item_id );
					$debug_message .= "\n";
					wc()->session->set( 'elex_usps_debug_message', $debug_message );
				}
				$weight = 1;
			} else {
				$weight = wc_get_weight( $values['data']->get_weight(), 'lbs' );
			}

			if ( $values['data']->length && $values['data']->height && $values['data']->width ) {

				$lenght = wc_get_dimension( $values['data']->length, 'in' );
				$height = wc_get_dimension( $values['data']->height, 'in' );
				$width = wc_get_dimension( $values['data']->width, 'in' );

				
		  
			} else {
				$lenght = 0;
				$height = 0;
				$width = 0;
			}
			$request_body = array();
			if ( $domestic ) {
				$request_body = array(
					'originZIPCode' => str_replace( ' ', '', strtoupper( $this->origin ) ),
					'destinationZIPCode' => strtoupper( substr( $package['destination']['postcode'], 0, 5 ) ),
					'weight' => $weight,
					'length' => floor( $lenght ),
					'width' => floor( $width ),
					'height' => floor( $height ),
					'mailClass' => 'ALL',
					'priceType' => ( 'Commercial' == $this->settings['rates_preference'] ? 'COMMERCIAL' : 'RETAIL' ),
					'mailingDate' => $this->get_estimated_shipping_date(),


				);
			} else {
				$request_body = array(
					'originZIPCode' => str_replace( ' ', '', strtoupper( $this->origin ) ),
					'foreignPostalCode' => strtoupper( substr( $package['destination']['postcode'], 0, 5 ) ),
					'destinationCountryCode' => strtoupper( $package['destination']['country'] ),
					'mailingDate' => $this->get_estimated_shipping_date(),
					'weight' => $weight,
					'length' => floor( $lenght ),
					'width' => floor( $width ),
					'height' => floor( $height ),

					
				);
			}
			$item_data = wc_get_product( $values['product_id'] );
					$packed_items = array(

						'product_name' => $item_data->get_title(),
						'product_id' => $values['product_id'],
						'qty' => $values['quantity'],
					);
				
			$package_info = array(
				'items' => $packed_items,
				'dimension' => array(
					'length' => $lenght,
					'width' => $width,
					'height' => $height,
					'weight' => $weight,
				),
				'units' => array(
					'dimension' => 'in',
					'weight' => 'lbs',
				),
			);
			$requests[]   = array(
				'request_data' => $request_body,
				'package_info' => $package_info,
			);
		}

		return $requests;
	}

	
}

new ELEX_Shipping_API_Request();


