<?php

namespace AffiAffiliate\Frontend;

use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;
use WP_Query;

defined( 'ABSPATH' ) || exit;

class Frontend {
	protected static $instance = null;
	protected $settings;
	protected $query;

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct() {
		$this->settings = Data::instance();
		$this->query    = QueryDB::instance();
		add_shortcode( 'affi_my_affiliate_account', [ $this, 'affi_my_affiliate_account' ] );

//		add_action( 'init', [ $this, 'init_endpoints' ] );
		add_action( 'init', [ $this, 'tracking_visits' ] );

		if ( $this->settings->get_param( 'share_link_button' ) ) {
			add_filter( 'woocommerce_loop_add_to_cart_link', array(
				$this,
				'woocommerce_loop_add_to_cart_link',
			), 99, 2 );

			add_action( 'woocommerce_after_add_to_cart_form', array( $this, 'woocommerce_after_add_to_cart_form' ) );
		}

		if ( $this->settings->get_param( 'payment_request' ) ) {
			add_action( 'wp_ajax_affi_user_request_payout', [ $this, 'affi_user_request_payout' ] );
		}
		/*Add AFFI to menu my account page*/
		add_filter( 'woocommerce_get_query_vars', array( $this, 'affi_woocommerce_get_query_vars' ), PHP_INT_MAX, 1 );
		add_action( 'woocommerce_account_affi-affiliate_endpoint', array( $this, 'affi_show_function_my_account' ), PHP_INT_MAX, 1 );
		if ( $this->settings->get_param( 'dashboard_account' ) ) {
			$c_user_id    = get_current_user_id();
			$c_active_aff = false;
			if ( $c_user_id ) {
				$c_affiliate_data = $this->query->get_affiliate_by_user_id( $c_user_id );
				if ( $c_affiliate_data && isset( $c_affiliate_data['status'] ) && 'approved' == $c_affiliate_data['status'] ) {
					$c_active_aff = true;
				}
			}
			if ( $c_active_aff ) {
//				add_action( 'init', array( $this, 'affi_register_new_endpoint_my_account' ) );

				add_filter( 'woocommerce_account_menu_items', array( $this, 'affi_add_link_to_my_account_menu' ), PHP_INT_MAX, 1 );

			}
		}
		add_action( 'wp_ajax_affi_account_user_update_payment', [ $this, 'affi_account_user_update_payment' ] );
//		add_action( 'wp_ajax_affi_account_payout_list', [ $this, 'affi_account_payout_list' ] );
		add_action( 'wp_ajax_affi_user_get_notification_detail', [ $this, 'affi_user_get_notification_detail' ] );

		add_action( 'wp_ajax_affi_filter_products', [ $this, 'affi_filter_products' ] );

//		$baseAffiliate = new BaseAffiliate();
		$referralsOrder = new ReferralsOrder();
	}

	public function affi_woocommerce_get_query_vars( $query ) {
		$query['affi-affiliate'] = 'affi-affiliate';

		return $query;
	}

	public function affi_add_link_to_my_account_menu( $items ) {
		$items['affi-affiliate'] = esc_html__( 'AFFI Affiliate', 'affi-affiliate-marketing-for-woo' );

		return $items;
	}

	/*	public function affi_register_new_endpoint_my_account() {
			$structure = get_option( 'permalink_structure' );
			if ( $structure !== '/%postname%/' ) {
				global $wp_rewrite;
				$wp_rewrite->set_permalink_structure( '/%postname%/' );
				add_rewrite_endpoint( 'affi-affiliate', EP_PAGES );

	//			$wp_rewrite->set_permalink_structure( $structure );
			} else {
				add_rewrite_endpoint( 'affi-affiliate', EP_PAGES );
			}
		}*/

	function affi_show_function_my_account() {
		echo do_shortcode( '[affi_my_affiliate_account]' );
	}

	public function affi_my_affiliate_account( $params ) {
		ob_start();
		extract( shortcode_atts( [
			'is_my_account'        => false,
			'payout_per_page'      => '',
			'transaction_per_page' => ''
		], $params ) );
		/** @var boolean $is_my_account */
		/** @var  $payout_per_page */
		/** @var  $transaction_per_page */
		villatheme_get_template(
			"my-account.php",
			[
				'is_my_account'        => $is_my_account,
				'payout_per_page'      => $payout_per_page,
				'transaction_per_page' => $transaction_per_page,
			],
			'',
			AffiEnv::get( 'templates_dir' ) . 'my-account/'
		);
		self::shortcode_enqueue_script();

		return ob_get_clean();
	}

	public function shortcode_enqueue_script() {
		$suffix = defined( 'WP_DEBUG' ) && WP_DEBUG ? '' : '.min';
		wp_register_style( 'affi-affi_my_affiliate_account-style', AffiEnv::get( 'css_url' ) . 'affi_my_affiliate_account' . $suffix . '.css', '', AffiEnv::get( 'version' ) );
		wp_register_style( 'affi-affi-account-icon', AffiEnv::get( 'libs_url' ) . 'affi-icon.min.css', '', AffiEnv::get( 'version' ) );
		wp_enqueue_style( 'affi-affi_my_affiliate_account-style', AffiEnv::get( 'css_url' ) . 'affi_my_affiliate_account' . $suffix . '.css', '', AffiEnv::get( 'version' ) );
		wp_enqueue_style( 'affi-affi-account-icon', AffiEnv::get( 'libs_url' ) . 'affi-icon.min.css', '', AffiEnv::get( 'version' ) );

		wp_enqueue_script( 'affi_my_affiliate_account', AffiEnv::get( 'js_url' ) . 'affi_my_affiliate_account' . $suffix . '.js', '', AffiEnv::get( 'version' ), true );// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.NotInFooter
		wp_enqueue_script( 'affi-chart', AffiEnv::get( 'libs_url' ) . 'chart.min.js', '', '4.4.1', true  );// phpcs:ignore WordPress.WP.EnqueuedResourceParameters.NotInFooter

		$localize = [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'nonce'      => wp_create_nonce( 'affi_security' ),
			'isRTL'      => is_rtl(),
			'currency'   => get_woocommerce_currency_symbol(),
			'total_text' => esc_html__( 'Total', 'affi-affiliate-marketing-for-woo' ),
			'time_text'  => esc_html__( 'Time', 'affi-affiliate-marketing-for-woo' ),
			'visit'      => esc_html__( 'Visit', 'affi-affiliate-marketing-for-woo' ),
			'count'      => esc_html__( 'Order count', 'affi-affiliate-marketing-for-woo' ),
			'total'      => esc_html__( 'Order total', 'affi-affiliate-marketing-for-woo' ),
			'o_balance'  => esc_html__( 'Outstanding balance', 'affi-affiliate-marketing-for-woo' ),
			'balance'    => esc_html__( 'Balance', 'affi-affiliate-marketing-for-woo' ),
		];

		wp_localize_script( 'affi_my_affiliate_account', 'affiParams', $localize );
	}

	public function get_endpoints() {
		return apply_filters( 'affi_affiliate_endpoints', [
			'my-affiliate-account' => 'my-affiliate-account'
		] );
	}

	public function tracking_visits() {
		$tracking_object = new TrackingVisits();
	}

	public function init_endpoints() {
//		$endpoints = $this->get_endpoints();
//		global $wp_rewrite;
//		$wp_rewrite->set_permalink_structure( '/%postname%/' );
//
//		if ( ! empty( $endpoints ) && is_array( $endpoints ) ) {
//			foreach ( $endpoints as $ep_k => $endpoint ) {
//				if ( ! empty( $endpoint ) ) {
//					add_rewrite_endpoint( $endpoint, EP_PERMALINK | EP_PAGES );
//				}
//			}
//		}

	}

	public function woocommerce_loop_add_to_cart_link( $html, $product ) {
		if ( ! $product ) {
			return $html;
		}

		$aff_param = self::get_affiliate_params();
		if ( ! $aff_param ) {

			return $html;
		}

		$product_link       = $product->get_permalink();
		$product_link_param = add_query_arg( $this->settings->get_param( 'base_prefix' ), $aff_param, $product_link );

		ob_start();
		?>
        <div class="affi-wrap-share">

			<?php
			villatheme_get_template( "button-product-link.php", [
				'affi_class' => isset( $class ) ? $class : '',
				'affi_link'  => $product_link_param,
				'affi_text'  => $this->settings->get_param( 'share_button_text' ),
				'affi_copy'  => esc_html__( 'Copied', 'affi-affiliate-marketing-for-woo' ),
			], '', AffiEnv::get( 'templates_dir' ) );
			if ( $this->settings->get_param( 'enable_loop_product' ) ) {

				$social_share_enable     = $this->settings->get_param( 'social_share' ) ?? [];
				$social_share_prefix_url = $this->settings->get_social_prefix_url();
				?>
                <div class="affi-wrap-share-social-buttons">
					<?php
					foreach ( $social_share_enable as $share_icon ) {
						if ( isset( $social_share_prefix_url[ $share_icon ] ) ) {
							$social_url = $social_share_prefix_url[ $share_icon ];
							villatheme_get_template( "share_social_icon.php", [
								'affi_product_share_url' => $social_url . urlencode( $product_link_param ),
								'affi_product_url'       => $product_link,
								'affi_class_icon'        => 'social_' . $share_icon,
							], '', AffiEnv::get( 'templates_dir' ) );
						}
					}
					?>
                </div>
				<?php
			}
			?>
        </div>
		<?php

		$button_link = ob_get_clean();

		return $html . $button_link;
	}

	public function woocommerce_after_add_to_cart_form() {
		if ( is_product() && is_single() ) {
			global $post;
			$product_id = $post->ID;
			$product    = wc_get_product( $product_id );

			$aff_param = self::get_affiliate_params();
			if ( ! $aff_param ) {

				return;
			}

			$product_link       = $product->get_permalink();
			$product_link_param = add_query_arg( $this->settings->get_param( 'base_prefix' ), $aff_param, $product_link );

			ob_start();
			?>
            <div class="affi-wrap-share">
                <h5><?php echo esc_html__( 'Affi share:', 'affi-affiliate-marketing-for-woo' ); ?></h5>
				<?php
				villatheme_get_template( "button-product-link.php", [
					'affi_class' => isset( $class ) ? $class : '',
					'affi_link'  => $product_link_param,
					'affi_text'  => $this->settings->get_param( 'share_button_text' ),
					'affi_copy'  => esc_html__( 'Copied', 'affi-affiliate-marketing-for-woo' ),
				], '', AffiEnv::get( 'templates_dir' ) );

				$social_share_prefix_url = $this->settings->get_social_prefix_url();
				$social_share_enable     = $this->settings->get_param( 'social_share' ) ?? [];

				?>
                <div class="affi-wrap-share-social-buttons">
					<?php
					foreach ( $social_share_enable as $share_icon ) {
						if ( isset( $social_share_prefix_url[ $share_icon ] ) ) {
							$social_url = $social_share_prefix_url[ $share_icon ];
							villatheme_get_template( "share_social_icon.php", [
								'affi_product_share_url' => $social_url . urlencode( $product_link_param ),
								'affi_product_url'       => $product_link,
								'affi_class_icon'        => 'social_' . $share_icon,
							], '', AffiEnv::get( 'templates_dir' ) );
						}
					}
					?>
                </div>
            </div>
			<?php

			$button_link = ob_get_clean();

			echo wp_kses_post( $button_link );
		}
	}

	public function get_affiliate_params( $user_id = '' ) {
		if ( empty( $user_id ) ) {
			$user_data = wp_get_current_user();
			if ( ! $user_data->exists() ) {

				return '';
			}
			$user_id = $user_data->ID;
		}
		$is_affiliate = $this->query->get_affiliate_id_by_user_id( $user_id );
		if ( ! $is_affiliate ) {

			return '';
		}
		if ( $this->settings->get_param( 'affiliate_link_format' ) == 'user_id' ) {
			$aff_param = $is_affiliate;
		} else {
			$user_data_info = $user_data->get_data_by('id', $user_id );
			$aff_param = $user_data_info && is_object( $user_data_info ) && property_exists( $user_data_info, 'user_login') ? $user_data_info->user_login : $this->query->get_username_by_affiliate_id( $user_id );
		}

		return $aff_param;
	}

	public function affi_account_user_update_payment() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$user_id      = isset( $_POST['user_id'] ) ? sanitize_text_field( wp_unslash( $_POST['user_id'] ) ) : '';
		$payment_info = isset( $_POST['payment_info'] ) ? sanitize_text_field( wp_unslash( $_POST['payment_info'] ) ) : '';

		$insert_id = $this->query->update_affiliates_payment_info_by_user_id( $user_id, $payment_info );

		wp_send_json( $insert_id );
	}

	public function affi_user_get_notification_detail() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$notify_id = isset( $_POST['id'] ) ? sanitize_text_field( wp_unslash( $_POST['id'] ) ) : '';
		$row_data  = $this->query->get_user_notification( $notify_id );

		wp_send_json( $row_data );
	}

	public function affi_filter_products() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$user_id  = isset( $_POST['user'] ) ? absint( wc_clean( wp_unslash( $_POST['user'] ) ) ) : 1;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$aff_id   = isset( $_POST['affiliate'] ) ? absint( wc_clean( wp_unslash( $_POST['affiliate'] ) ) ) : 1;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$page     = isset( $_POST['page'] ) ? absint( wc_clean( wp_unslash( $_POST['page'] ) ) ) : 1;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$category = isset( $_POST['category'] ) ? sanitize_text_field( wp_unslash( $_POST['category'] ) ) : '';
		$key_word = isset( $_POST['key'] ) ? sanitize_text_field( wp_unslash( $_POST['key'] ) ) : '';
		$o_data   = $this->affi_load_product_list( $user_id, $aff_id, $key_word, $category, $page );
		wp_send_json( $o_data );

		wp_die();
	}

	public function affi_load_product_list( $user_id, $aff_id, $key_word, $category, $page ) {
		$per_page      = intval( $this->settings->get_param( 'affi_page_items' ) );
		$is_link_title = $this->settings->get_param( 'search_title_link' );
		if ( empty( $per_page ) || $per_page < 1 ) {
			$per_page = 30;
		}
		$items_data['per_page'] = $per_page;
		$items_data['offset']   = $per_page * ( $page - 1 );
		$items_data['af_cat']   = $category;
		$items_data['key_word'] = $key_word;

		$rank_rate = $this->query->get_order_affiliate_data( $aff_id );

		$i_product_ids = $this->affi_search_product( $items_data );

		$items_data['per_page'] = - 1;
		$items_data['offset']   = '';
		$c_product_ids          = (int) $this->affi_search_product( $items_data );
		if ( $i_product_ids ) {
			$page_wrap  = intval( $page * $per_page );
			$page_end   = $page_wrap > $c_product_ids ? $c_product_ids : $page_wrap;
			$page_start = $page_wrap - $per_page;

			$prefix_link = Data::instance()->get_param( 'base_prefix' );

			ob_start();
			foreach ( $i_product_ids as $i_id ) {
				$w_product    = wc_get_product( $i_id );
				$p_link       = $w_product->get_permalink();
				$param_link   = Frontend::instance()->get_affiliate_params();
				$promote_link = add_query_arg( $prefix_link, $param_link, $p_link );
				$p_price      = $w_product->get_price();
				$p_earn       = self::product_affiliate_rate( $rank_rate, $w_product );
				$price_html   = wc_price( $p_price );
				?>
                <div class="affi-product-block"
                     data-product="<?php echo esc_attr( $i_id ) ?>">
                    <div class="affi-product-img-wrap"
                         title="<?php esc_attr_e( 'Add', 'affi-affiliate-marketing-for-woo' ); ?>">
						<?php echo wp_kses_post( $w_product->get_image( $this->settings->get_param( 'search_popup_image_size' ) ) ); ?>
                    </div>
                    <div class="affi-product-title-wrap">
						<?php if ( $is_link_title ) { ?>
                            <a class="affi-product-title"
                               data-link="<?php echo esc_url( $w_product->get_permalink() ) ?>"
                               href="<?php echo esc_url( $w_product->get_permalink() ) ?>" target="_blank">
								<?php echo wp_kses_post( $w_product->get_title() ); ?>
                            </a>
						<?php } else { ?>
                            <div class="affi-product-title"
                                 data-link="<?php echo esc_url( $w_product->get_permalink() ) ?>">
								<?php echo wp_kses_post( $w_product->get_title() ); ?>
                            </div>
						<?php } ?>
                    </div>
					<?php if ( ! empty( $w_product->get_rating_count() ) && $this->settings->get_param( 'search_view_ratting' ) ) { ?>
                        <div class="affi-product-ratting">
							<?php wp_kses_post( wc_get_rating_html( $w_product->get_average_rating() ) ); ?>

                        </div>
					<?php } ?>
                    <div class="affi-product-price">
						<?php echo wp_kses_post( $price_html ); ?>
                    </div>
					<?php if ( $this->settings->get_param( 'search_view_stock' ) ) { ?>
                        <div class="affi-product-stock">
							<?php echo wp_kses_post( wc_get_stock_html( $w_product ) ); ?>
                        </div>
					<?php }
					if ( $this->settings->get_param( 'search_view_description' ) ) { ?>
                        <div class="affi-product-description">
							<?php echo wp_kses_post( $w_product->get_short_description() ); ?>
                        </div>
					<?php } ?>
                    <div class="affi-product-earning-wrap">
                        <div class="affi-product-earning-label"><?php esc_attr_e( 'Earning: ', 'affi-affiliate-marketing-for-woo' ); ?></div>
                        <div class="affi-product-earning-value"><?php echo wp_kses_post( wc_price( $p_earn ) ); ?></div>
                    </div>
                    <div class="affi-product-promote-wrap" data-link="<?php echo esc_url( $promote_link ) ?>">
                        <div class="affi-product-promote-text" data-copy="<?php
						esc_attr_e( 'Copied link', 'affi-affiliate-marketing-for-woo' ); ?>">
							<?php esc_attr_e( 'Promote now', 'affi-affiliate-marketing-for-woo' ); ?>
                        </div>
                    </div>
                </div>
				<?php
			} ?>
			<?php $o_data['products'] = ob_get_clean();
			ob_start(); ?>
            <div class="affi-product-paging-wrap">
				<?php
				$total_page = $c_product_ids % $per_page == 0 ?
					intdiv( $c_product_ids, $per_page ) :
					intdiv( $c_product_ids, $per_page ) + 1;
				?>
                <div class="affi-product-paging">
					<?php for ( $p = 1; $p <= $total_page; $p ++ ) {
						if ( $p == 1 || $p == $total_page ) { ?>
                            <div class="affi-product-pages <?php
							if ( $p == $page )
								echo esc_attr( 'affi-product-page-active' ) ?>" data-page="<?php
							echo esc_attr( $p ) ?>"><?php echo esc_html( $p ) ?></div>
							<?php continue;
						}
						if ( $p <= $page ) {
							if ( $p < $page - 2 ) {
								continue;
							}
							if ( $p > $page - 2 ) {
								?>
                                <div class="affi-product-pages <?php
								if ( $p == $page )
									echo esc_attr( 'affi-product-page-active' ) ?>" data-page="<?php
								echo esc_attr( $p ) ?>"><?php echo esc_html( $p ) ?></div>
								<?php
								continue;
							}
							if ( $p == $page - 2 ) {
								if ( $p != 2 ) {
									?>
                                    <div class="affi-product-pages-break">...</div>
								<?php } ?>
                                <div class="affi-product-pages <?php
								if ( $p == $page )
									echo esc_attr( 'affi-product-page-active' ) ?>" data-page="<?php
								echo esc_attr( $p ) ?>"><?php echo esc_html( $p ) ?></div>
								<?php
								continue;
							}
						} else {
							if ( $p > $page + 2 ) {
								continue;
							}
							if ( $p < $page + 2 ) {
								?>
                                <div class="affi-product-pages <?php
								if ( $p == $page )
									echo esc_attr( 'affi-product-page-active' ) ?>" data-page="<?php
								echo esc_attr( $p ) ?>"><?php echo esc_html( $p ) ?></div>
								<?php
								continue;
							}
							if ( $p == $page + 2 ) {
								?>
                                <div class="affi-product-pages <?php
								if ( $p == $page )
									echo esc_attr( 'affi-product-page-active' ) ?>" data-page="<?php
								echo esc_attr( $p ) ?>"><?php echo esc_html( $p ) ?></div>
								<?php if ( $p + 1 != $total_page ) {
									?>
                                    <div class="affi-product-pages-break">...</div>
								<?php }
								continue;
							}
						}
					} ?>
                </div>
            </div>
			<?php $o_data['paging'] = ob_get_clean();

			return $o_data;
		}

		return [ 'products' => '', 'paging' => '' ];
	}

	function affi_search_product( $arg_input = [] ) {
		$cat      = isset( $arg_input['af_cat'] ) ? $arg_input['af_cat'] : '';
		$tag      = isset( $arg_input['af_tag'] ) ? $arg_input['af_tag'] : '';
		$sort     = isset( $arg_input['af_sort'] ) ? $arg_input['af_sort'] : 'date';
		$order    = isset( $arg_input['af_order'] ) ? $arg_input['af_order'] : '';
		$key      = isset( $arg_input['key_word'] ) ? $arg_input['key_word'] : '';
		$per_page = isset( $arg_input['per_page'] ) ? $arg_input['per_page'] : - 1;
		$offset   = isset( $arg_input['offset'] ) ? $arg_input['offset'] : 0;

		$arg     = array(
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'posts_per_page' => $per_page,
			'offset'         => $offset,
			's'              => $key
		);
		$tax_arr = [];
		if ( ! empty( $cat ) ) {
			$tax_arr[] = [
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $cat,
			];
		}
		if ( ! empty( $tag ) ) {
			$tax_arr[] = [
				'taxonomy' => 'product_tag',
				'field'    => 'term_id',
				'terms'    => $tag,
			];
		}
		if ( ! empty( $tax_arr ) ) {
			$arg['tax_query'] = $tax_arr;// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
		}

		switch ( $sort ) {
			case 'date':
				$arg['orderby'] = array(
					'date'       => $order,
					'menu_order' => 'ASC',
				);
				break;
			case 'ratting':
				$arg['orderby']  = 'meta_value_num';
				$arg['meta_key'] = '_wc_average_rating';// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				$arg['order']    = $order;
				break;
			case 'price':
				$arg['orderby']  = 'meta_value_num';
				$arg['meta_key'] = '_price';// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				$arg['order']    = $order;
				break;
			default:
				$arg['orderby'] = 'title';
				$arg['order']   = $order;
				break;
		}

		$the_query = new WP_Query( $arg );

		if ( $per_page == - 1 ) {
			$founded_count = $the_query->found_posts;

			return $the_query->post_count;
		}
		$found_products = array();
		if ( $the_query->have_posts() ) {
			$s_product_ids = $the_query->posts;
			foreach ( $s_product_ids as $s_index => $s_product_object ) {
				if ( ! is_object( $s_product_object ) || empty( $s_product_object ) || ! property_exists( $s_product_object, 'ID' ) ) {
					continue;
				}
				$s_product_id = $s_product_object->ID;
				if ( is_array( $s_product_id ) || is_object( $s_product_id ) || empty( $s_product_id ) ) {
					continue;
				}

				$found_products[] = $s_product_id;
			}

			return $found_products;
		}
		wp_reset_postdata();

		return null;
	}

	public function product_affiliate_rate( $aff_rate, $product ) {
		$g_r_type = $this->settings->get_param( 'commission_type' );
		$g_r_rate = floatval( $this->settings->get_param( 'commission_rate' ) );
		$p_price  = $product->get_price();
		if ( wc_prices_include_tax() ) {
			$r_price = $this->settings->get_param( 'commission_tax' ) ? (float) $product->get_price_excluding_tax() : (float) $p_price;
		} else {
			$r_price = $this->settings->get_param( 'commission_tax' ) ? (float) $p_price : (float) $product->get_price_including_tax();
		}

		if ( empty( $aff_rate ) ) {
			if ( ! empty( $g_r_rate ) ) {
				if ( $g_r_type == 'fixed' ) {
					return floatval( $g_r_rate );
				} else {
					return ( $r_price * $g_r_rate ) / 100;
				}
			}

			return 0;
		} else {
			if ( $aff_rate['rate_type'] == 'fixed' ) {
				$rank_amount = floatval( $aff_rate['rate'] );
			} else {
				$rank_amount = ( $r_price * $aff_rate['rate'] ) / 100;
			}
			if ( ! empty( $g_r_rate ) ) {
				if ( $g_r_type == 'fixed' ) {
					return floatval( $g_r_rate ) + $rank_amount;
				} else {
					return ( ( $r_price * $g_r_rate ) / 100 ) + $rank_amount;
				}
			} else {
				return $rank_amount;
			}
		}

		return 0;
	}

	public function affi_user_request_payout() {
		check_ajax_referer( 'affi_security', 'nonce' );

		$payout_price = isset( $_REQUEST['payout_price'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['payout_price'] ) ) : '';
		$user_id      = isset( $_REQUEST['user_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['user_id'] ) ) : '';
		$description  = isset( $_REQUEST['description'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['description'] ) ) : '';
		$aff_info     = $this->query->get_affiliate_by_user_id( $user_id );
		$payment_info = $aff_info['payment_info'];

		$insert_id = $this->query->insert_user_request_payout( [
			'user_id'      => $user_id,
			'amount'       => $payout_price,
			'type'         => 'user',
			'payment'      => $payment_info,
			'fee'          => (float) $this->settings->get_param( 'payment_fee' ),
			'status'       => 'pending',
			'description'  => $description,
			'date_created' => current_time( 'U' )
		] );

		wp_send_json( $insert_id );
	}
}