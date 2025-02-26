<?php

namespace AffiAffiliate\Admin;

use AffiAffiliate\AffiEnv;
use AffiAffiliate\Inc\Data;
use AffiAffiliate\Inc\QueryDB;

defined( 'ABSPATH' ) || exit;

class AFSettings {
	protected static $instance = null;

	protected $dropdown_class = 'vi-ui dropdown fluid affi-dropdown';
	protected $dropdown_search_class = 'vi-ui dropdown search fluid affi-dropdown';
	protected $settings;
	protected $query;

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function __construct() {
		$this->settings = Data::instance();
		$this->query    = QueryDB::instance();

		add_action( 'affi_pre_update_settings', [ $this, 'affi_pre_merge_update_settings' ], 10, 2 );

		AFSettings_Helper::config( [ 'slug' => 'affi', 'data' => Data::instance() ] );
		$this->save_settings();
	}

	public function settings_page() {
		$tabs      = $this->define_tabs();
		$first_tab = array_key_first( $tabs );
		?>
        <h1>
			<?php printf( "%s %s", esc_html( AffiEnv::get( 'plugin_name' ) ), esc_html__( 'Settings', 'affi-affiliate-marketing-for-woo' ) ); ?>
        </h1>
        <form method="post" id="affi-settings-form" class="vi-ui small form">
			<?php wp_nonce_field( 'affi-nonce-settings' ); ?>

            <div class="vi-ui top attached tabular menu">
				<?php
				foreach ( $tabs as $slug => $text ) {
					$active = $first_tab == $slug ? 'active' : '';
					printf( ' <a class="item %s" data-tab="%s">%s</a>', esc_attr( $active ), esc_attr( $slug ), esc_html( $text ) );
				}
				?>
            </div>
			<?php
			foreach ( $tabs as $slug => $text ) {
				$active = $first_tab == $slug ? 'active' : '';
				$method = $slug . '_options';

				printf( '<div class="vi-ui bottom attached %s tab segment" data-tab="%s">', esc_attr( $active ), esc_attr( $slug ) );

				if ( method_exists( $this, $method ) ) {
					$options = $this->$method();
					AFSettings_Helper::output_fields( $options );
				} else {
					do_action( 'affi_settings_tab', $slug );
				}

				echo '</div>';
			}
			?>
            <p class="affi-save-settings-container">
                <button type="submit" class="vi-ui button labeled icon primary affi-save-settings"
                        name="affi_save_settings" value="save_setting">
                    <i class="save icon"> </i>
					<?php esc_html_e( 'Save Settings', 'affi-affiliate-marketing-for-woo' ); ?>
                </button>
            </p>
        </form>
		<?php
		do_action( 'villatheme_support_affi-affiliate-marketing-for-woo' );
	}

	public function define_tabs() {
		return [
			'general'    => esc_html__( 'General', 'affi-affiliate-marketing-for-woo' ),
			'share'      => esc_html__( 'Share', 'affi-affiliate-marketing-for-woo' ),
			'commission' => esc_html__( 'Commission', 'affi-affiliate-marketing-for-woo' ),
			'payment'    => esc_html__( 'Payment', 'affi-affiliate-marketing-for-woo' ),
//			'multilevel'          => esc_html__( 'Multilevel', 'affi-affiliate-marketing-for-woo' ),
		];
	}

	public function general_options() {
		$total_payout   = $this->query->get_total_payout_all();
		$total_notify   = $this->query->get_total_notify_all();
		$rank_available = $this->query->get_total_rank_available();

		$options = [
			[
				'type' => 'section_start',
			],
			[
				'id'          => 'base_link',
				'title'       => esc_html__( 'Base affiliate link', 'affi-affiliate-marketing-for-woo' ),
//				'desc'        => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'        => 'text',
				'placeholder' => esc_html__( 'https://yourdomain.com/', 'affi-affiliate-marketing-for-woo' ),
				'rowClass'    => 'row_base_link',
			],
			[
				'id'          => 'base_prefix',
				'title'       => esc_html__( 'Prefix affiliate link', 'affi-affiliate-marketing-for-woo' ),
//				'desc'        => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'        => 'text',
				'placeholder' => esc_html__( 'Customer affiliate param prefix', 'affi-affiliate-marketing-for-woo' ),
				'rowClass'    => 'row_base_prefix',
			],
			[
				'id'      => 'affiliate_link_format',
				'title'   => esc_html__( 'Affiliate Link Format', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => [ 'user_id' => 'User ID', 'username' => 'User Name' ],
				'class'   => $this->dropdown_class,
			],
			[
				'id'    => 'register_affiliate',
				'title' => esc_html__( 'Enable register affiliate', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'    => 'register_auto',
				'title' => esc_html__( 'Auto accept affiliate request', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'    => 'send_notify_email',
				'title' => esc_html__( 'Send email notification', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'    => 'dashboard_account',
				'title' => esc_html__( 'Affiliates Dashboard inside My Account page', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
		];

		if ( $rank_available > 1 ) {
			$options[] = [
				'id'           => 'schedule_update_rank',
				'title'        => esc_html__( 'Calculate and update affiliates rank', 'affi-affiliate-marketing-for-woo' ),
				'type'         => 'update_button',
				'class'        => 'affi-rank-update-now vi-ui tiny green button',
				'half_type'    => 'text',
				'half_class'   => 'affi-rank-update-time',
				'button_label' => esc_html__( 'Update now', 'affi-affiliate-marketing-for-woo' ),
			];
		}
		if ( $total_payout > 500 ) {
			$options[] = [
				'id'           => 'schedule_payout_remove',
				'title'        => esc_html__( 'Remove old payout data', 'affi-affiliate-marketing-for-woo' ),
				'type'         => 'clear_button',
				'btn_class'    => 'affi-payout-update-now vi-ui tiny green button',
				'class'        => 'affi-payout-update-now',
				'half_type'    => 'text',
				'db_data'      => $total_payout,
				'button_label' => esc_html__( 'Clear data after', 'affi-affiliate-marketing-for-woo' ),
			];
		}
		if ( $total_notify > 500 ) {
			$options[] = [
				'id'           => 'schedule_notify_remove',
				'title'        => esc_html__( 'Remove old notification data', 'affi-affiliate-marketing-for-woo' ),
				'type'         => 'clear_button',
				'btn_class'    => 'affi-notify-update-now vi-ui tiny green button',
				'class'        => 'affi-notify-update-now',
				'half_type'    => 'text',
				'db_data'      => $total_notify,
				'button_label' => esc_html__( 'Clear data after', 'affi-affiliate-marketing-for-woo' ),
			];
		}

		$p_option = [
			[ 'type' => 'section_end' ],
			[
				'type'  => 'section_start',
				'title' => esc_html__( 'Affiliate register popup', 'affi-affiliate-marketing-for-woo' )
			],
			[
				'id'          => 'register_info_label',
				'title'       => esc_html__( 'Register information label', 'affi-affiliate-marketing-for-woo' ),
//				'desc'        => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'        => 'text',
				'placeholder' => esc_html__( 'Customer additional information', 'affi-affiliate-marketing-for-woo' ),
				'rowClass'    => 'row_base_prefix',
			],
			[
				'id'    => 'register_policy',
				'type'  => 'textarea',
				'title' => esc_html__( 'Register policy', 'affi-affiliate-marketing-for-woo' ),
			],
			[ 'type' => 'section_end' ],
		];

		$e_options = array_merge( $options, $p_option );

		return $e_options;
	}

	public function share_options() {
		$social_share = [
			'facebook'  => esc_html__( 'Facebook', 'affi-affiliate-marketing-for-woo' ),
			'twitter'   => esc_html__( 'Twitter/X', 'affi-affiliate-marketing-for-woo' ),
			'tumblr'    => esc_html__( 'Tumblr', 'affi-affiliate-marketing-for-woo' ),
			'pinterest' => esc_html__( 'Pinterest', 'affi-affiliate-marketing-for-woo' ),
			'linkedin'  => esc_html__( 'Linkedin', 'affi-affiliate-marketing-for-woo' ),
//	        'telegram'=> esc_html__( 'Telegram', 'affi-affiliate-marketing-for-woo' ),
//	        'viber'=> esc_html__( 'Viber', 'affi-affiliate-marketing-for-woo' ),
//	        'whatsapp'=> esc_html__( 'Whatsapp', 'affi-affiliate-marketing-for-woo' ),
//	        'vk'=> esc_html__( 'Vk', 'affi-affiliate-marketing-for-woo' ),
//	        'reddit'=> esc_html__( 'Reddit', 'affi-affiliate-marketing-for-woo' ),
//	        'xing'=> esc_html__( 'Xing', 'affi-affiliate-marketing-for-woo' ),
//	        'pocket'=> esc_html__( 'Pocket', 'affi-affiliate-marketing-for-woo' ),
//	        'yahoo'=> esc_html__( 'Yahoo', 'affi-affiliate-marketing-for-woo' ),
//	        'weibo'=> esc_html__( 'Weibo', 'affi-affiliate-marketing-for-woo' ),
		];
		$options      = [
			[
				'type' => 'section_start',
			],
			[
				'id'    => 'share_link_button',
				'title' => esc_html__( 'Share button on shop/product page ', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'       => 'share_button_text',
				'title'    => esc_html__( 'Share button text ', 'affi-affiliate-marketing-for-woo' ),
				'type'     => 'text',
				'rowClass' => $this->settings->get_param( 'share_link_button' ) ? 'affi-share-button-text-wrap ' : 'affi-share-button-text-wrap affi-setting-hidden',
			],
			[
				'id'    => 'enable_loop_product',
				'title' => esc_html__( 'Social share in loop product', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'      => 'social_share',
				'title'   => esc_html__( 'Available social share', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'multiselect',
				'options' => $social_share,
				'class'   => $this->dropdown_class,
			],
			[ 'type' => 'section_end' ],

		];

		return $options;
	}

	public function commission_options() {
		$fixed_block   = esc_html__( 'Fixed', 'affi-affiliate-marketing-for-woo' ) . ' (' . get_woocommerce_currency_symbol() . ')';
		$percent_block = esc_html__( 'Percentage', 'affi-affiliate-marketing-for-woo' );
		$options       = [
			[
				'type' => 'section_start',
			],
			[
				'id'      => 'commission_type',
				'title'   => esc_html__( 'Default commission type', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'select',
				'options' => [ 'fixed' => $fixed_block, 'percent' => $percent_block ],
				'class'   => $this->dropdown_class,
			],
			[
				'id'    => 'commission_rate',
				'title' => esc_html__( 'Default commission value', 'affi-affiliate-marketing-for-woo' ),
//				'desc'  => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'number',
			],
			[
				'id'    => 'commission_owner',
				'title' => esc_html__( 'Exclude calculate from getting commissions from their own purchases.', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'    => 'commission_tax',
				'title' => esc_html__( 'Exclude taxes from commissions', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[ 'type' => 'section_end' ],
		];

		return $options;
	}

	public function payment_options() {
		$woo_payments   = WC()->payment_gateways->payment_gateways();
		$payment_method = [];
		if ( is_array( $woo_payments ) ) {
			foreach ( $woo_payments as $k => $v ) {
				if ( ! $k || $k == 'cod' ) {
					continue;
				}
				$payment_method[ $k ] = $v->method_title ? $v->method_title : $v->title;
			}
		}

		$options = [
			[
				'type' => 'section_start',
			],
			[
				'id'    => 'payment_request',
				'title' => esc_html__( 'Allow affiliate request payout', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'checkbox',
			],
			[
				'id'      => 'payment_method',
				'title'   => esc_html__( 'Available payment method', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'    => 'multiselect',
				'options' => $payment_method,
				'class'   => $this->dropdown_class,
			],
			[
				'id'    => 'payment_fee',
				'title' => esc_html__( 'Payment fee for user request', 'affi-affiliate-marketing-for-woo' ),
//				'desc'    => esc_html__( '', 'affi-affiliate-marketing-for-woo' ),
				'type'  => 'number',
			],
			[ 'type' => 'section_end' ],
		];

		return $options;
	}

	public function affi_pre_merge_update_settings( $update_option ) {
		if ( isset( $_POST['affi_my_account_page'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Missing
			$update_option = wp_parse_args( $update_option, [ 'affi_my_account_page' => villatheme_sanitize_kses( $_POST['affi_my_account_page'] ) ] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.NonceVerification.Missing
		}
		if ( isset( $_POST['affi_field_mapping'] ) ) {// phpcs:ignore WordPress.Security.NonceVerification.Missing
			$update_option = wp_parse_args( $update_option, [ 'field_mapping' => villatheme_sanitize_kses( $_POST['affi_field_mapping'] ) ] );// phpcs:ignore WordPress.Security.ValidatedSanitizedInput, WordPress.Security.NonceVerification.Missing
		}

		return $update_option;
	}

	public function save_settings() {
		$s_nonce = isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '';
		if (
			isset( $_POST['affi_save_settings'] ) && $s_nonce &&
			! empty( $_POST['affi_save_settings'] ) &&
			wp_verify_nonce( $s_nonce, 'affi-nonce-settings' ) &&
			current_user_can( 'manage_options' )
		) {
			try {
				$tabs    = $this->define_tabs();
				$options = [];
				foreach ( $tabs as $slug => $text ) {
					$method = $slug . '_options';
					if ( method_exists( $this, $method ) ) {
						$options = array_merge( $options, $this->$method() );
					} else {
						$options = array_merge( $options, apply_filters( 'affi_save_setting_option', [], $slug ) );
					}
				}

				$options = apply_filters( 'affi_settings_before_save', $options );

				add_filter( 'villatheme_affi_admin_settings_sanitize_option_names', [
					$this,
					'sanitize_textarea_to_array'
				], 10, 3 );
				add_filter( 'villatheme_affi_admin_settings_sanitize_option_cmt_frontend', [
					$this,
					'sanitize_textarea_to_array'
				], 10, 3 );

				/*flush end point*/
				flush_rewrite_rules();

				AFSettings_Helper::save_fields( $options );
				Data::instance()->init_params();

			} catch ( \Exception $e ) {
				echo esc_html( $e->getMessage() );
			}
		}
	}

	public function sanitize_textarea_to_array( $value, $option, $raw_value ) {
		if ( empty( $raw_value ) || ! is_array( $raw_value ) ) {
			return [];
		}

		foreach ( $raw_value as $key => $names ) {
			$names         = explode( "\n", wp_kses_post( $names ) );
			$value[ $key ] = array_map( 'trim', $names );
		}

		return $value;
	}

	public function sanitize_working_hours_holiday( $value ) {
		if ( ! empty( $value ) && is_array( $value ) ) {
			$value = array_filter( $value, function ( $event ) {
				return count( array_filter( $event ) );
			} );
		}

		return $value;
	}
}
