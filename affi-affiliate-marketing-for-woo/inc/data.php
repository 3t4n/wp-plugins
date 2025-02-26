<?php

namespace AffiAffiliate\Inc;

defined( 'ABSPATH' ) || exit;

class Data {
	protected static $instance = null, $allow_html = null;
	protected $params, $default_data, $social_prefix_url;
	protected $affi_list_icon = [
		"affi-icon arrow_up",
		"affi-icon arrow_down",
		"affi-icon arrow_left",
		"affi-icon arrow_right",
	];


	private function __construct() {
		$this->default_data      = [
			'base_link'             => get_home_url(),
			'base_prefix'           => 'affiliate',
			'affiliate_link_format' => 'user_id',
			'blocked_referers'      => '',
			'register_affiliate'    => true,
			'register_auto'         => false,
			'dashboard_account'     => true,
			'enable_qr'             => false,

			'register_info_label' => 'Payment information',
			'register_policy'     => 'Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our.',

			'enable_loop_product' => true,
			'social_share'        => [ 'facebook', 'twitter', 'tumblr', 'pinterest', 'linkedin' ],

			'commission_type'  => 'percent',
			'commission_rate'  => 5,
			'commission_owner' => false,
			'commission_tax'   => false,

			'revoke_on_refund'       => true,
			'schedule_update_rank'   => '',
			'schedule_payout_remove' => 90,
			'schedule_notify_remove' => 90,
			'auto_update_rank'       => true,
			'send_notify_email'      => true,
			'admin_notify_email'     => true,
			'share_link_button'      => true,
			'share_button_text'      => "Share link",

			'search_title_link'       => 1,
			'search_popup_image_size' => 'woocommerce_thumbnail',
			'search_view_ratting'     => 1,
			'search_view_stock'       => 1,
			'search_view_description' => 0,

			'payment_request' => true,
			'payment_fee'     => 10,
			'payment_method'  => [],

			'use_session'            => false,
			'cookie_expire'          => 360,
			'redirect_without_param' => true,
			'custom_css'             => '',
		];
		$this->social_prefix_url = [
			'facebook'  => 'https://www.facebook.com/sharer/sharer.php?u=',
			'twitter'   => 'https://twitter.com/intent/tweet?url=',
			'tumblr'    => 'https://www.tumblr.com/widgets/share/tool?posttype=link&canonicalUrl=',
			'pinterest' => 'https://pinterest.com/pin/create/button/?url=',
			'linkedin'  => 'https://www.linkedin.com/shareArticle?mini=true&url=',
			'telegram'  => 'https://t.me/share/url?url=',
			'viber'     => 'viber://forward?text=',
			'whatsapp'  => 'https://api.whatsapp.com/send?text=',
			'vk'        => 'https://vk.com/share.php?url=',
			'reddit'    => 'https://reddit.com/submit?url=',
			'xing'      => 'https://www.xing.com/app/user?op=share&url=',
			'pocket'    => 'https://getpocket.com/save?url=',
			'yahoo'     => 'https://compose.mail.yahoo.com/?body=',
			'weibo'     => 'https://service.weibo.com/share/share.php?url=',
		];
		$this->init_params();
	}

	public static function instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init_params() {
		$option = get_option( 'villatheme_affi_data', [] );
		$params = wp_parse_args( $option, $this->default_data );

		$this->params = $params;
	}

	public function get_social_prefix_url() {
		return $this->social_prefix_url;
	}

	public function get_params() {
		if ( ! $this->params ) {
			$this->init_params();
		}

		return $this->params;
	}

	public function get_param( $name = '', $name_sub = '', $language = '' ) {
		$language = apply_filters( '_affi_settings_language', $language, $name, $name_sub );
		if ( ! $name ) {
			return $this->params;
		} elseif ( isset( $this->params[ $name ] ) ) {
			if ( $name_sub ) {
				if ( isset( $this->params[ $name ][ $name_sub ] ) ) {
					if ( $language ) {
						$name_language = $name_sub . '_' . $language;
						if ( isset( $this->params[ $name ][ $name_language ] ) ) {
							return apply_filters( 'affi_params_' . $name . '__' . $name_language, $this->params[ $name ][ $name_language ] );
						} else {
							return apply_filters( 'affi_params_' . $name . '__' . $name_language, $this->params[ $name ][ $name_sub ] );
						}
					} else {
						return apply_filters( 'affi_params_' . $name . '__' . $name_sub, $this->params[ $name ] [ $name_sub ] );
					}
				} elseif ( $this->default_data[ $name ] [ $name_sub ] ) {
					return apply_filters( 'affi_params_' . $name . '__' . $name_sub, $this->default_data[ $name ] [ $name_sub ] );
				} else {
					return false;
				}
			} else {
				if ( $language ) {
					$name_language = $name . '_' . $language;
					if ( isset( $this->params[ $name_language ] ) ) {
						return apply_filters( 'affi_params_' . $name_language, $this->params[ $name_language ] );
					} else {
						return apply_filters( 'affi_params_' . $name_language, $this->params[ $name ] );
					}
				} else {
					return apply_filters( 'affi_params_' . $name, $this->params[ $name ] );
				}
			}
		} else {
			if ( $name == 'affi_icons' ) {
				return apply_filters( 'affi_params_' . $name, $this->affi_list_icon );
			}

			return false;
		}
	}

	/**
	 * Used to escape html content
	 *
	 * @param $content
	 *
	 * @return string
	 */
	public static function kses_post( $content ) {
		if ( self::$allow_html === null ) {
			self::$allow_html = wp_kses_allowed_html( 'post' );
			self::$allow_html = self::filter_allowed_html( self::$allow_html );
		}

		return wp_kses( $content, self::$allow_html );
	}

	/**
	 * @param $tags
	 *
	 * @return array
	 */
	public static function filter_allowed_html( $tags ) {
		$tags = array_merge_recursive( $tags, array(
				'input'  => array(
					'type'         => 1,
					'id'           => 1,
					'name'         => 1,
					'class'        => 1,
					'placeholder'  => 1,
					'autocomplete' => 1,
					'style'        => 1,
					'value'        => 1,
					'size'         => 1,
					'checked'      => 1,
					'disabled'     => 1,
					'readonly'     => 1,
					'data-*'       => 1,
				),
				'form'   => array(
					'method' => 1,
					'id'     => 1,
					'class'  => 1,
					'action' => 1,
					'data-*' => 1,
				),
				'select' => array(
					'id'       => 1,
					'name'     => 1,
					'class'    => 1,
					'multiple' => 1,
					'data-*'   => 1,
				),
				'option' => array(
					'value'    => 1,
					'selected' => 1,
					'data-*'   => 1,
				),
				'style'  => array(
					'id'    => 1,
					'class' => 1,
					'type'  => 1,
				),
				'source' => array(
					'type' => 1,
					'src'  => 1
				),
				'video'  => array(
					'width'  => 1,
					'height' => 1,
					'src'    => 1
				),
			)
		);
		foreach ( $tags as $key => $value ) {
			if ( $key === 'input' ) {
				$tags[ $key ]['data-*']   = 1;
				$tags[ $key ]['checked']  = 1;
				$tags[ $key ]['disabled'] = 1;
				$tags[ $key ]['readonly'] = 1;
			} elseif ( in_array( $key, array( 'div', 'span', 'a', 'form', 'select', 'option', 'tr', 'td' ) ) ) {
				$tags[ $key ]['data-*'] = 1;
			}
		}

		return $tags;
	}

	public function getcookie( $name ) {
		if ( $this->use_session() ) {
			if ( ! session_id() && ! self::is_request_to_rest_api() ) {
				@session_start();
			}
			$value = isset( $_SESSION[ $name ] ) ? sanitize_text_field( $_SESSION[ $name ] ) : false;

			return $value;
		} else {
			return isset( $_COOKIE[ $name ] ) ? sanitize_text_field( $_COOKIE[ $name ] ) : false;// phpcs:ignore WordPress.Security.ValidatedSanitizedInput
		}

	}

	public function setcookie( $name, $value, $time = 86400, $path = '/' ) {
		if ( $this->use_session() ) {
			@session_start();
			$_SESSION[ $name ] = $value;
			session_write_close();
		} else {
			$domain = apply_filters( 'affi_setcookie_domain', '' );
			@setcookie( $name, $value, $time, $path, $domain );
			$_COOKIE[ $name ] = $value;
		}
	}

	public function use_session() {
		return apply_filters( 'affi_use_session', $this->params['use_session'] );
	}

	public static function is_request_to_rest_api() {
		if ( empty( $_SERVER['REQUEST_URI'] ) ) {
			return false;
		}

		$rest_prefix = '/' . untrailingslashit( rest_get_url_prefix() ) . '/';
		$request_uri = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );

		return false !== strpos( $request_uri, $rest_prefix );
	}

}
