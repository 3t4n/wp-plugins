<?php

if ( ! class_exists( 'ECOMFIT_Cart' ) ) {

	class ECOMFIT_Cart {
		function __construct() {
		}

		public static function ecomfit_get_cart() {
			$items = isset( WC()->cart ) ? WC()->cart->get_cart() : [];
			$token = self::cart_token();
			if ( ! sizeof( $items ) ) {
				return array(
					'token'      => $token,
					'item_count' => 0,
					'items'      => [],
					'session'    => WC()->session->get_session_cookie(),
					'customer'   => WC()->cart->get_customer(),
				);
			}
			$result = array_merge( array(
				'token'      => $token,
				'item_count' => 0,
				'items'      => [],
				'session'    => WC()->session->get_session_cookie(),
				'customer'   => WC()->cart->get_customer(),
			), WC()->cart->get_totals() );

			foreach ( $items as $item ) {
				$product = $item['data'];
				if ( $product && is_a( $product, 'WC_Product' ) ) {
					$productId = $product->get_parent_id();
					$variantId = $product->get_variation_id();
					if ( ! $productId ) {
						$productId = $product->get_id();
					}
					if ( $productId == $variantId ) {
						$variantId = 0;
					}
					array_push( $result['items'], array(
						"product_id"  => $productId,
						"title"       => $product->get_title(),
						"name"        => $product->get_name(),
						"price"       => floatval( $product->get_price() ),
						"total"       => floatval( $item['line_total'] ),
						"quantity"    => intval( $item['quantity'] ),
						"variant_id"  => $variantId,
						"variant_url" => $product->get_permalink(),
						"url"         => get_permalink( $productId ),
						"data"        => $item,
					) );
					$result['item_count'] ++;
				}
			}

			return $result;
		}

		public static function cart_token( $hasCart = true ) {
			global $woocommerce;
			$value = isset( $_COOKIE['ecomfit_cart_token'] ) && $_COOKIE['ecomfit_cart_token']
			         && $_COOKIE['ecomfit_cart_token'] != 'null' ? $_COOKIE['ecomfit_cart_token'] : '';
			if ( $value || ! $hasCart ) {
				return $value;
			}

			$value  = md5( json_encode( $woocommerce->session->get_session_cookie() ) . time() );
			$host   = parse_url( $_SERVER['HTTP_HOST'], PHP_URL_HOST );
			$expiry = strtotime( '+1 month' );
			setcookie( 'ecomfit_cart_token', $value, $expiry, '', $host );

			return $value;
		}

		public static function init_cart_token() {
			self::cart_token();
		}

		public static function destroy_cart_token() {
			$host   = parse_url( $_SERVER['HTTP_HOST'], PHP_URL_HOST );
			$expiry = strtotime( '+1 month' );
			setcookie( 'ecomfit_cart_token', '', $expiry, '', $host );
		}
	}

}