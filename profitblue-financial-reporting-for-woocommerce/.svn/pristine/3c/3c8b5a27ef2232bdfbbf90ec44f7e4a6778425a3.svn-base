<?php

namespace ProfitBlue\Admin;

use ProfitBlue\ProfitBlueAdmin;

use ProfitBlue\Managers\PostTypesManager;
use ProfitBlue\Repositories\ProductItemIdRepository;
use ProfitBlue\Blocks\OverviewFilterBlock;
use ProfitBlue\Blocks\OrdersFilterBlock;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;
use ProfitBlue\Blocks\PaymentsPeriodsFilterBlock;
use ProfitBlue\Blocks\ShippingPeriodsFilterBlock;
use ProfitBlue\Blocks\ProfitAndLosssFilterBlock;
use ProfitBlue\Blocks\ShopSettingPeriodsFilterBlock;
use ProfitBlue\Enums\WizardSteps;
use ProfitBlue\Helpers\Helper;

class AdminPage {

	public $config = null;

	public function __construct() {
	}

	/**
	 * 
	 * 
	 */
	public function set_config( $config ) {

		$this->config = $config;

	}

	public function render() {

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$page = isset( $_GET['page'] ) ? wp_unslash( sanitize_text_field( $_GET['page'] ) ) : '';

		$profitblue_wizard_current_step = get_user_meta( get_current_user_id(), 'profitblue_wizard_current_step', true );

		$wizard_class = '';
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['wizard'] ) && 'profitblue-financial-reporting-for-woocommerce' == $_GET['wizard'] ) {
			$wizard_data = WizardSteps::get();
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$wizard_part = isset( $_GET['wizard-step'] ) ? wp_unslash( sanitize_text_field( $_GET['wizard-step'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$wizard_step = isset( $_GET['step'] ) ? wp_unslash( sanitize_text_field( $_GET['step'] ) ) : '';
			?>
			<div id="wizardSource" 
			data-wizard="<?php echo wp_json_encode( $wizard_data ); ?>"
			data-wizard-part="<?php echo esc_html( $wizard_part ); ?>"
			data-wizard-step="<?php echo esc_html( $wizard_step ); ?>"
			data-wizard-user="<?php echo esc_html( get_current_user_id() ); ?>"
			></div>			
			<?php
			$wizard_class = ' wizard';
		}

		if ( !empty( $this->config ) ) {
			if ( !empty( $this->config['main'] ) ) {

				echo '<div class="' . esc_html( $this->config['page']['name'] ) . ' wrap profitblue-wrap' . esc_html( $wizard_class ) . '">';
				
					$this->page_title();

					if ( !empty( $this->config['page'] ) ) {
						echo '<div class="profitblue-page profitblue-page-' . esc_html( $page ) . '">';
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended
						if ( !empty( $_GET['subpage'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';

							if ( !empty( $this->config['subpages'][$subpage]['page'] ) ) {
								
								include( PROFITBLUEFDIR . 'src/Admin/Views/' .  $this->config['page']['id'] . '/' . $this->config['subpages'][$subpage]['page'] . '.php' );
							
							} else {

							}


						} else {

							if ( 'blocks' == $this->config['page']['type'] ) {

								foreach( $this->config['page']['blocks'] as $block ) {
									echo '<div class="blocks-section">';

										echo '<h2>' . esc_html( $block['title'] ) . '</h2>';
										echo '<div class="blocks-section-inner">';

											foreach( $block['items'] as $item ) {
												if ( 'manage-notifications' === $item['id'] ) {
													echo '<a href="#" class="block-item" style="opacity:0.5;">';
												} else {
													echo '<a href="' . esc_url( admin_url() ) . 'admin.php?page=' . esc_html( $page ) . '&subpage=' . esc_html( $item['id'] ) . '" class="block-item">';
												}
												
													echo '<img src="' . esc_url( PROFITBLUEFURL ) . 'assets/images/icons/' . esc_html( $item['icon'] ) . '.svg" />';
													echo '<div class="block-item-content">';
														echo '<h3>' . esc_html( $item['title'] ) . '</h3>';
														echo '<p>' . esc_html( $item['description'] ) . '</p>';
													echo '</div>';
												echo '</a>';
											}

										echo '</div>';

									echo '</div>';
								}

							} elseif ( 'page' == $this->config['page']['type'] ) {

								include( PROFITBLUEFDIR . 'src/Admin/Views/' .  $this->config['page']['id'] . '/' .  $this->config['page']['id'] . '.php' );
														
							}

						}

						echo '</div>';
					}

					$this->page_save();

					


				echo '</div>';

			}
		}
		

	}

	public function page_save() {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['subpage'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
			if ( 'payment-fees' == $subpage || 'shop-settings' == $subpage ) {
				$data_attribute = '';

				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['period'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
					$data_attribute .= ' data-period="' . $period . '"';
				} else {
					$data_attribute .= ' data-period="whole-period"';
				}
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['date_start'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
					$data_attribute .= ' data-start="' . $date_start . '"';
				}
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['date_end'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
					$data_attribute .= ' data-end="' . $date_end . '"';
				}

				echo '<div class="page-save-button">';
					echo '<a href="#" class="btn save-form" ' . esc_html( $data_attribute ) . '>' . esc_html__( 'SAVE', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
				echo '</div>';

			} else {			
				if ( !empty( $this->config['subpages'][$subpage]['save'] ) ) {
					echo '<div class="page-save-button"><a href="#" class="btn save-form">' . esc_html__( 'SAVE', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></div>';
				}
			}
		}
	}

	public function page_title() {

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['subpage'] ) ) {

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'costs-of-goods-sold' == $_GET['subpage'] ) {
				echo '<div class="cogs-header">';
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
					echo '<h2>' . esc_html( $this->config['subpages'][$subpage]['title'] ) . '</h2>';

					if (version_compare(PHP_VERSION, '8.0', '>=')) {
						$attributes = '';		
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended			
						if ( !empty( $_GET['period'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
							$attributes .= 'data-period="' . esc_html( $period ) . '"';
						} else {
							$attributes .= 'data-period="whole-period"';
						}
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended
						if ( !empty( $_GET['date_start'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
							$attributes .= ' data-start="' . esc_html( $date_start ) . '"';						
						}
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended
						if ( !empty( $_GET['date_end'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
							$attributes .= ' data-end="' . esc_html( $date_end ) . '"';						
						}

						echo '<a href="#" class="btn csv-export-import" ' . esc_html( $attributes ) . ' style="opacity:0.5;">' . esc_html__( 'XLSX Export/Import', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>'; 
					}
				echo '</div>';

				echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
				echo '<div class="product-overwiev-periods">';
					echo wp_kses( ProductsPeriodsFilterBlock::render_old(), Helper::get_allowed_tags() );
				echo '</div>';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			} elseif ( 'shop-settings' == $_GET['subpage'] ) {

				echo '<div class="cogs-header">';
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
					echo '<h2>' . esc_html( $this->config['subpages'][$subpage]['title'] ) . '</h2>';
				echo '</div>';
				echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
				echo '<div class="product-overwiev-periods">';
					echo wp_kses( ShopSettingPeriodsFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			} elseif ( 'payment-fees' == $_GET['subpage'] ) {

				echo '<div class="cogs-header">';
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
					echo '<h2>' . esc_html( $this->config['subpages'][$subpage]['title'] ) . '</h2>';
				echo '</div>';
				echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
				echo '<div class="product-overwiev-periods">';
					echo wp_kses( PaymentsPeriodsFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			} elseif ( 'shipping-costs' == $_GET['subpage'] ) {

				echo '<div class="cogs-header">';
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
					echo '<h2>' . esc_html( $this->config['subpages'][$subpage]['title'] ) . '</h2>';
				echo '</div>';
				echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
				echo '<div class="shipping-overwiev-periods">';
					echo wp_kses( ShippingPeriodsFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';

			} else {

				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
				echo '<h2>' . esc_html( $this->config['subpages'][$subpage]['title'] ) . '</h2>';
				

				if ( !empty( $this->config['subpages'][$subpage]['filter'] ) ) {

					if ( 'ProductOverwiev' == $this->config['page']['id'] ) {
						echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
						echo '<div class="product-overwiev-periods">';
							echo wp_kses( ProductsPeriodsFilterBlock::render(), Helper::get_allowed_tags() );
						echo '</div>';


					} else {
					
						echo '<div class="page-description-has-filter">';
							echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
							echo wp_kses( $this->render_filter( $subpage ), Helper::get_allowed_tags() );
						echo '</div>';
					
					}

				} else {
					echo '<p>' . esc_html( $this->config['subpages'][$subpage]['description'] ) . '</p>';
				}

			}

		} else {
	
			if ( 'ProductOverwiev' == $this->config['page']['id'] ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['product_detail'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$product_id = isset( $_GET['product_detail'] ) ? wp_unslash( sanitize_text_field( $_GET['product_detail'] ) ) : '';
					echo '<div class="product-detail-header">';
						echo '<h3>' . esc_html__( 'Product detail:', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( get_the_title( $product_id ) ) . '</h3>';
						echo '<p>' . esc_html__( 'The product detail section displays detailed analyses and graphs of individual products. Product detail contains many tabs and graphs that will help you evaluate the importance and profitability of products. From this, you can determine seasonality, the number of products sold per specific period, or price and margin fluctuations.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
					echo '</div>';
				} else {

					echo '<h2>' . esc_html( $this->config['main']['title'] ) . '</h2>';
					if (version_compare(PHP_VERSION, '8.0', '>=')) {
						echo '<div class="cogs-header">';
							$attributes = '';		
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended			
							if ( !empty( $_GET['period'] ) ) {
								// phpcs:ignore WordPress.Security.NonceVerification.Recommended
								$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
								$attributes .= 'data-period="' . esc_html( $period ) . '"';
							} else {
								$attributes .= 'data-period="whole-period"';
								$period = 'whole-period';
							}
							$download_url = admin_url() . 'admin.php?page=products&download-csv=products&period=' . esc_html( $period );

							echo '<a href="#" class="btn not-export" ' . esc_html( $attributes ) . ' style="width:fit-content;justify-self:end;opacity:0.5;">' . esc_html__( 'Export to XLSX', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>'; 
						echo '</div>';
					}
					echo '<p>' . esc_html( $this->config['main']['description'] ) . '</p>';
				}
			} elseif ( 'OrderOverwiev' == $this->config['page']['id'] ) {
				
				echo '<h2>' . esc_html( $this->config['main']['title'] ) . '</h2>';
				echo '<p>' . esc_html( $this->config['main']['description'] ) . '</p>';
				if (version_compare(PHP_VERSION, '8.0', '>=')) {
					echo '<div class="cogs-header">';
						$attributes = '';
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended					
						if ( !empty( $_GET['period'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
							$attributes .= 'data-period="' . esc_html( $period ) . '"';
						} else {
							$attributes .= 'data-period="whole-period"';
						}
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended
						if ( !empty( $_GET['date_start'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$date_start = isset( $_GET['date_start'] ) ? wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) : '';
							$attributes .= ' data-start="' . esc_html( $date_start ) . '"';						
						}
						// phpcs:ignore WordPress.Security.NonceVerification.Recommended
						if ( !empty( $_GET['date_end'] ) ) {
							// phpcs:ignore WordPress.Security.NonceVerification.Recommended
							$date_end = isset( $_GET['date_end'] ) ? wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) : '';
							$attributes .= ' data-end="' . esc_html( $date_end ) . '"';						
						}

						echo '<a href="#" class="btn csv-export-orders not-export" ' . esc_html( $attributes ) . ' style="width:fit-content;justify-self:end;margin-bottom:20px;opacity:0.5;">' . esc_html__( 'Export to XLSX', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>'; 
					echo '</div>';
				}
			} else {
				echo '<h2>' . esc_html( $this->config['main']['title'] ) . '</h2>';
				echo '<p>' . esc_html( $this->config['main']['description'] ) . '</p>';
				
			}
			if ( 'ProductOverwiev' == $this->config['page']['id'] ) {
					echo wp_kses( ProductsPeriodsFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';
			} elseif ( 'OrderOverwiev' == $this->config['page']['id'] ) {
				echo wp_kses( OrdersFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';
			} elseif ( 'Overwiev' == $this->config['page']['id'] ) {
				echo wp_kses( OverviewFilterBlock::render(), Helper::get_allowed_tags() );
				echo '</div>';
			} elseif ( 'ProfitAndLoss' == $this->config['page']['id'] ) {
				echo wp_kses( ProfitAndLosssFilterBlock::render(), Helper::get_allowed_tags() );
			}

		}

	}

	public function render_filter( $subpage ) {

		if ( 'costs-of-goods-sold' == $this->config['subpages'][$subpage]['filter'] || 'payment-fees' == $this->config['subpages'][$subpage]['filter'] ) {

			$last_year = gmdate( 'Y', strtotime( '-1 year' ) );
			$current_year = gmdate( 'Y' );
			$next_year = gmdate( 'Y', strtotime( '+1 year' ) );

			echo '<div class="cost-year-filter">';
				echo '<select id="cost-years" name="cost-years" class="cost-years cogs">';
					echo '<option value="whole-period" selected="selected">' . esc_html__( 'Whole e-shop period', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';	
					echo '<option value="' . esc_html( $last_year ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';
					echo '<option value="' . esc_html( $current_year ) . '" disabled>' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $current_year ) . ')</option>';
					echo '<option value="custom-range" disabled>' . esc_html__( 'Custom', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				echo '</select>';
				echo '<div class="year-filter-datepicker"><input class="cogs-datepicker" name="cost-years-period" readonly=""></div>';
			echo '</div>';

		} elseif ( 'cost-years' == $this->config['subpages'][$subpage]['filter'] ) {

			$last_year = gmdate( 'Y', strtotime( '-1 year' ) );
			$current_year = gmdate( 'Y' );
			$selected_year = gmdate( 'Y' );;
			$next_year = gmdate( 'Y', strtotime( '+1 year' ) );

			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['cost-years'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$selected_year = isset( $_GET['cost-years'] ) ? wp_unslash( sanitize_text_field( $_GET['cost-years'] ) ) : '';

			}
			
			$url = admin_url() . 'admin.php?';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$page = isset( $_GET['page'] ) ? wp_unslash( sanitize_text_field( $_GET['page'] ) ) : '';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$subpage = isset( $_GET['subpage'] ) ? wp_unslash( sanitize_text_field( $_GET['subpage'] ) ) : '';
			$url .= 'page=' . $page;
			if ( !empty( $subpage ) ) {
				$url .= '&subpage=' . $subpage;
			}

			echo '<div class="cost-year-filter">';
				echo '<select id="cost-years" name="cost-years" class="cost-years 2" data-url="' . esc_url( $url ) . '">';
					echo '<option value="' . esc_html( $last_year ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';					
					echo '<option value="' . esc_html( $current_year ) . '" selected="selected">' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $current_year ) . ')</option>';
					
				echo '</select>';
			echo '</div>';

		} elseif ( 'shipping-cost-years' == $this->config['subpages'][$subpage]['filter'] ) {

			$last_year 		= gmdate( 'Y', strtotime( '-1 year' ) );
			$current_year 	= gmdate( 'Y' );
			$next_year 		= gmdate( 'Y', strtotime( '+1 year' ) );

			echo '<div class="cost-year-filter">';
				echo '<select id="cost-years" name="cost-years" class="cost-years 3">';
					echo '<option value="whole-period" selected="selected">' . esc_html__( 'Whole e-shop period', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';	
					echo '<option value="' . esc_html( $last_year ) . '" disabled>' . esc_html__( 'Last year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $last_year ) . ')</option>';
					echo '<option value="' . esc_html( $current_year ) . '" disabled>' . esc_html__( 'Actual year', 'profitblue-financial-reporting-for-woocommerce' ) . ' (' . esc_html( $current_year ) . ')</option>';
					echo '<option value="custom-range" disabled>' . esc_html__( 'Custom', 'profitblue-financial-reporting-for-woocommerce' ) . '</option>';
				echo '</select>';
				echo '<div class="year-filter-datepicker"><input class="shipping-datepicker" name="cost-years-period" readonly=""></div>';
			echo '</div>';

		}
	}
	
}
