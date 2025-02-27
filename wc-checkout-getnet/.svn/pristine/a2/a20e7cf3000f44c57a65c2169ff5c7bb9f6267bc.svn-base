<?php

namespace WcGetnet\WooCommerce\GateWays;

use CoffeeCode\WPEmerge\ServiceProviders\ServiceProviderInterface;

/**
 * Register Gateway.
 */
class WCGetnet_CreditCardFee implements ServiceProviderInterface  {
	/**
	 * {@inheritDoc}
	 */
	public function register( $container ) {
		// Nothing to register.
	}

	/**
	 * {@inheritDoc}
	 */
	public function bootstrap( $container ) {
		add_action('wp_ajax_add_dynamic_tax_fee', [$this, 'handle_dynamic_tax_fee'] );
		add_action('wp_ajax_nopriv_add_dynamic_tax_fee', [$this, 'handle_dynamic_tax_fee'] );
		add_action('woocommerce_cart_calculate_fees', [ $this, 'handleInstallmentFee' ], 9999, 1 );
	}

	public function handleInstallmentFee( $cart ) {
		$selected_payment_method_id = WC()->session->get( 'chosen_payment_method' );
		$installment = WC()->session->get( 'choiced_installments');

		if( !$installment ) {
			return;
		}

		if ($selected_payment_method_id !== 'getnet-creditcard' ) {
			$installment = WC()->session->set( 'choiced_installments', '');
			return;
		}

		if( $installment > 1 ) {
			$cart = WC()->cart;

			$total = $this->get_total_cart_value();
			$installment_value = $this->calcInstallmentFee( $installment, $total );

			$cart->add_fee( 
				__('Juros de parcelamento', 'gnt_wc_checkout'), 
				$installment_value['fee_value'], 
				false, 
				'gnt_installments_class'
			);
		}
	}

	public function get_total_cart_value() {
		$cart = WC()->cart;
		return ( $cart->get_subtotal() + $cart->get_shipping_total() - $cart->get_discount_total() );
	}

	//Recebe a quantidade de parcelas via ajax.
	public function handle_dynamic_tax_fee() {
		if (is_admin() && !defined('DOING_AJAX')) {
			return;
		}
		$installments = isset($_POST['installments']) ? $_POST['installments'] : 1;

		WC()->session->set( 'choiced_installments' , $installments );

		wp_send_json_success('Tax fee added successfully');
	}

	/**
	 * $installmens - Value of installments 
	 * $amount - Amount Value of order
	 */
	public function calcInstallmentFee($installments, $total) {
		$settings = get_option( "woocommerce_getnet-creditcard_settings" );

		$no_interest       = $settings['installments_interest']; // Juros a partir da parcela
		$initial_interest  = $this->str_to_float($settings['installments_initial_interest']); // Juros iniciais 
		$interest_increase = $this->str_to_float($settings['installments_increase_interest']); // Incremento de juros
		
		$amount = $total;

		for ( $times = 2; $times <= $installments; $times++ ) {
			$interest = $initial_interest;

			if ( $interest ) {
				// Aplica incremento de juros na parcela que não é de juros iniciais
				if ( $interest_increase && $times >= ( $no_interest + 1 ) ) {
					$interest += ( $interest_increase * ( $times - $no_interest ) );
				}

				$amount += $this->calc_percentage( $interest, $total );
			}

			$value = $amount;

			if ( $times < $no_interest ) {
				$value = $total;
			}

			$price  = ceil( $value / $times * 100 ) / 100;
			$amount = $total;

			if ( $times == $no_interest && $interest ) {
				$interest = $this->format_currency( $interest );
			}

			//dd('Parcelado em:'. $times. ' x de '. $price  . ' - Valor total da compra: '. $value . ' - Com juros de ' . $interest . '%'); 
			
			if( $installments == $times) {
				//dd('Parcelado em:'. $times. ' x de '. $price  . ' - Valor total da compra: '. $value . ' - Com juros de ' . $interest . '%'); 
				return  [
					'installments_detail_text' => 'Parcelado em: '. $times. 'x de '. $price,
					'installments_total_value' => $value,
					'installments_qtd' => $times,
					'value_by_installments' => $price,
					'installments_fee' => $interest,
					'tax_rate' => $interest / 100,
					'fee_value' => $value - $total
				];
			}
		}
	}

	public  function  calc_percentage( $percentage, $total ) {
		if ( ! $percentage ) {
			return 0;
		}

		$percentage = $this->str_to_float( $percentage );

		return ( $percentage / 100 ) * $total;
	}

	public function str_to_float( $value ) {
		if( is_float($value) || is_int($value) ) {
			return $this->format_currency($value);
		}

		return floatval( str_replace( ',', '.', $value ) );
	}

	public function format_currency( $value ) {
		return number_format( $value, 2, '.', ',' );
	}
}
