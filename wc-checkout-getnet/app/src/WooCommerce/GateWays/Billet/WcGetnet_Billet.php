<?php

namespace WcGetnet\WooCommerce\GateWays\Billet;

use WC_Order;
use WcGetnet\Entities\WcGetnet_Logs as Logs_Entity;
use WcGetnet\Entities\WcGetnet_Settings as Settings_Entity;
use WcGetnet\Services\WcGetnetPayment as Services_Payment;
use WcGetnet\Services\WcGetnetApi as Services_API;
use WcGetnet\WooCommerce\GateWays\Abstract_Payment;

use WcGetnet\WooCommerce\GateWays\AdminSettingsFields\Billet;

class WcGetnet_Billet extends Abstract_Payment {

	public function __construct() {
		$this->services_api = new Services_API();

		$this->id                 = 'getnet-billet';
		$this->icon               = '';
		$this->has_fields         = true;
		$this->method_title       = __( 'Getnet Boleto' );
		$this->method_description = __( 'Metódo de pagamento GETNET boleto' );
		$this->supports           = [ 'products' ];

		$this->init_form_fields();
		$this->init_settings();

		$this->title              = $this->get_option( 'title' );
		$this->description        = $this->get_option( 'description' );
		$this->enabled            = $this->get_option( 'enabled' );
		$this->order_prefix       = $this->get_option( 'order_prefix' );
		$this->expiration_date    = $this->get_option( 'expiration_date' );
		$this->instructions       = $this->get_option( 'instructions' );
		$this->logs               = 'yes' === $this->get_option( 'logs' );
		$this->discount_name      = $this->get_option( 'discount_name' );
		$this->discount_amount    = $this->get_option( 'discount_amount' );

		$this->environment_name = $this->services_api->get_selected_environment();
		$this->seller_id = $this->services_api->seller_id;
		$this->client_id = $this->services_api->client_id;
		$this->client_secret = $this->services_api->client_secret;

		if ( is_admin() ) {
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ] );
		}

		$this->init_actions();
	}

	/**
	 * Plugin init form,
	 */
	public function init_form_fields() {
		if ( ! $this->services_api->check_api_credentials() ) {
			return;
		}

		$this->form_fields = array_merge(
			Billet::getHeaderFields(),
			Billet::getBasicFields()
		);
	}

	public function admin_options() {
		$this->handleHeader();
		$this->handleContent();

		$this->services_api->build_admin_message_api_credentials_if_empty();
	}

	public function handleHeader() {
		if ( 'no' === $this->enabled ) {
			$modalContent = '<h4>Boleto (Somente para Clientes Santander) - entre em contato com seu gerente de contas Santander para:</h4>';
			$modalContent .= '<ul style="list-style-type: disc; padding-left: 20px;">';
			$modalContent .= '<li>Definir o certificado digital como o da Getnet</li>';
			$modalContent .= '<li>Vincular o convênio à caixa postal da Getnet</li>';
			$modalContent .= '<li>Obter o arquivo CISA</li>';
			$modalContent .= '</ul>';
			$modalContent .= '<p>Após isso, envie as informações para o suporte da Getnet no e-mail: <strong>suporte.edigital@getnet.com.br</strong>.</p>';

			\WcGetnet::render('partials/admin/modal', [
				'title'        => 'Aviso: Procedimentos para Ativação de Emissão de Boleto',
				'content'      => $modalContent,
				'footer'       => 'Fique atento para seguir esses passos corretamente para a ativação desse serviço.',
				'button_label' => 'Entendi, fechar',
				'button_name'  => 'billet_information_displayed',
				'id'           => $this->id,
			]);
		}

		\WcGetnet::render('partials/settings/billet-page', [
			'environment' => $this->getEnvironmentMessage()->environment,
			'environmentMessage' => $this->getEnvironmentMessage()->environmentMessage,
			'copyImage' => \WcGetnet::core()->assets()->getAssetUrl( 'images/copy.png' ),
			'homeUrl' => get_home_url( null, '/wc-api/' . $this->id ),
			'settingsFields' => $this->generate_settings_html(Billet::getHeaderFields(), false),
		]);
	}

	public function handleContent() {
		?>
			<div id="gntAdminBilletConfig" class="gnt-container"> 
				<div class="gnt-group">
					<p class="group-title">
						<b>Configurações Básicas</b>
					</p>
					<?php 
						$this->generate_settings_html(Billet::getBasicFields()); 
					?>
				</div>
				<div class="gnt-group" style="height: fit-content;">
					<p class="group-title">
						<b>Configurações de desconto</b>
					</p>
					<?php 
						$this->generate_settings_html(Billet::getDiscountFields()); 
					?>
				</div>
			</div>
		<?php
	}

	public function getEnvironmentMessage() {
		$environment = 'Producão';
		$environmentMessage = __( 'Modo de produção habilitado!' );

		if ( $this->environment_name == 'homolog' ) {
			$environment = 'Homologação';
			$environmentMessage = __( 'Modo de teste habilitado!' );
		}

		if( !$this->services_api->check_api_credentials() ) {
			$environment = 'Ambiente não configurado!';
			$environmentMessage = 'Por favor, faça a configuração de suas credenciais deste ambiente!';
		} 

		return (object) compact('environment', 'environmentMessage');
	}

	public function validate_fields() {
		return true;
	}

	public function payment_fields() {
		$environment = '';
		$description = '';
		$discount    = '';

		if ( $this->environment_name == 'homolog' ) {
			$environment = __( 'MODO DE TESTE (HOMOLOGAÇÃO) HABILITADO!' );
		}

		if ( $this->description ) {
			$description = trim( $this->description );
		}

		if ( $this->discount_amount ) {
			$amount   = (float) str_replace( ',', '.', $this->discount_amount );
			$discount = '<span style="color:#EE1C25;">' . __( 'Boleto com ' ) . $amount . __( '% de desconto.' ) . '</span><br>';
		}

		printf('<div id="wc-%s-form"
			style="background:transparent;text-align:center;">
			%s %s %s
			<div class="clear"></div><img src="%s"></div>',
			esc_attr( $this->id ),
			$discount,
			$environment,
			$description,
			esc_url( \WcGetnet::core()->assets()->getAssetUrl( 'images/barcode.png' ) )
		);
	}

	public function process_payment( $order_id ) {
		$access_token = Settings_Entity::post( $this->id . '-access_token', FILTER_SANITIZE_STRING );
		$order        = wc_get_order( $order_id );

		//bug fix for round down on cents ex: 1,15 was 114 in the last version.
		$ammountWitoutComma = str_replace([',', '.'], '', $order->get_total());

		$data = [
			'request_id'  	  => getUUID(),
			'idempotency_key' => getUUID(),
			'data' 			  => (object)
			[
				'amount'    => (int) $ammountWitoutComma,
				'order'     => $this->set_order_id( $order ),
				'customer'  => Services_Payment::set_customer( $order, 'boleto' ),
				'boleto'    => $this->getBilletData( $order_id ),
				'payment'   => $this->getPaymentData( $order_id )
			]
		];

		$order->update_meta_data( '_getnet_request', $data );
		/*The Getnet payment method "BOLETO" is in Portuguese because it is the nomenclature given by Getnet.*/
		$order->update_meta_data( '_getnet_payment_type', 'BOLETO' );

		$response      = $this->service_api->send_request_post_v2( $data, $access_token, '/boleto' );
		$code          = wp_remote_retrieve_response_code( $response );
		$response_body = wp_remote_retrieve_body( $response );
		$response      = json_decode( $response_body, true );
		$details       = isset ( $response['details'] ) ? current( $response['details'] ) : [];
		$status        = '';

		if ( in_array( $code, [200, 201] ) ) {
			if ( $this->logs ) {
				Logs_Entity::get_billet_order( 'ID DO PEDIDO:', $order_id );
				Logs_Entity::get_billet_order( 'REQUISIÇÃO:', $data );
				Logs_Entity::get_billet_order( 'RESPOSTA:', $response );
			}

			$status = isset( $response['status'] ) ? $response['status'] : '';
		} else {
			if ( $this->logs ) {
				Logs_Entity::get_billet_error( 'ID DO PEDIDO:', $order_id );
				Logs_Entity::get_billet_error( 'REQUISIÇÃO:', wp_json_encode($data) );
				Logs_Entity::get_billet_error( 'RESPOSTA:', $response );
			}

			$status = isset( $details['status'] ) ? $details['status'] : '';
		}

		if ( $response ) {
			$this->set_billet_meta( $order, $response );
		}

		$this->update_order_by_status( $order, $status, $details );

		WC()->cart->empty_cart();

		return [
			'result'   => 'success',
			'redirect' => $this->get_return_url( $order )
		];
	}

	private function set_order_id( $order ) {
		return (object) [
		   'order_id' => (string) $order->get_id()
		];
	}

	private function getPaymentData( $order_id ) {
		return (object) [
			'payment_method' => 'BOLETO'
		];
	}	

	private function getBilletData( $order_id ) {
		$get_date = '+' . $this->expiration_date . ' day';

		if ( !$get_date ) {
			$get_date = '+1 day';
		}

		return (object) [
			'our_number'      => '',
			'document_number' => (string) $order_id,
			'expiration_date' => date('d/m/Y', strtotime( $get_date ) ),
			'instructions'    => $this->instructions,
			'provider'        => 'santander'
		];
	}

	/**
	 * Set billet meta.
	 *
	 * @param \WC_Order $wc_order WC Order.
	 * @param array     $response Getnet Response.
	 * @return void
	 */
	protected function set_billet_meta( $wc_order, $response ) {
		$wc_order->update_meta_data( '_getnet_response', $response );

		if ( isset( $response['boleto']['boleto_id'] ) ) {
			$wc_order->update_meta_data( '_getnet_billet_id', wc_clean( $response['boleto']['boleto_id'] ) );
		}
	}
}
