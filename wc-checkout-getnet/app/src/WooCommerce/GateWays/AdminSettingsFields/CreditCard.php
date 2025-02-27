<?php

namespace WcGetnet\WooCommerce\GateWays\AdminSettingsFields;

abstract class CreditCard {
	
	public static function getBasicFields() {
		return [
			'title' => [
				'title'       => 'Título',
				'type'  	  => 'text',
				'description' => 'Controla o título que o usuário vê durante o checkout.',
				'default'     => 'Getnet Cartão Crédito',
				'desc_tip'    => true
			],
			'description' => [
				'title'       => 'Descrição no Checkout',
				'type'        => 'text',
				'description' => 'Controla a descrição que o usuário vê durante o checkout.',
				'default'     => 'Pague com cartão de crédito via Getnet.',
				'desc_tip'    => true
			],
			'order_prefix' => [
				'title'       => 'Prefixo do pedido',
				'type'        => 'text',
				'description' => 'Insira um prefixo para os números dos seus pedidos. Se você usar sua conta Getnet para várias lojas, certifique-se de que este prefixo seja único.',
				'default'     => 'WC-GETNET-',
				'desc_tip'    => true
			],
			'soft_descriptor' => [
				'title'       => __( 'Descrição na fatura do comprador', 'wc_getnet' ),
				'type'        => 'text',
				'description' => 'Texto exibido na fatura do cartão do comprador.',
				'default'     => '',
				'desc_tip'    => true,
				'custom_attributes' => [
					'maxlength'   => 22
				]
			],
			'creditcard_image' => [
				'title'       =>  __( 'Imagem de cartão de crédito no checkout' ),
				'label'       => __( 'Habilitar imagem de pré visualização do cartão de crédito no checkout.' ),
				'type'        => 'checkbox',
				'description' => __( 'Habilita imagem de pré visualização do cartão de crédito no checkout.' ),
				'desc_tip'    => true,
				'default'     => 'no'
			],
			'logs' => [
				'title'       =>  __( 'Logs' ),
				'label'       => __( 'Habilitar os logs do cartão de crédito.' ),
				'type'        => 'checkbox',
				'description' => __( 'Logs: getnet-creditcard-order ou getnet-creditcard-order-error. Para visualizar: WooCommerce > Status > Logs' ),
				'desc_tip'    => true,
				'default'     => 'no'
			]
		];
	}

	public static function getInstallmensFields() {
		return [
			'min_value_from_installments' => [
				'title'             => __( 'Valor mínimo para parcelar a compra', 'wc_getnet' ),
				'type'              => 'text',
				'description'       => __( 'Valor mínimo para compras parceladas.', 'wc_getnet' ),
				'desc_tip'          => true,
				'placeholder'       => '0,00',
				'custom_attributes' => [
					'data-field'        => 'min-value-from-installments',
					'data-mask'         => '##0,00',
					'data-mask-reverse' => 'true',
				],
			],
			'installments' => [
				'title'             => __( 'Quantidade máxima de parcelas', 'wc_getnet' ),
				'type'              => 'select',
				'description'       => __( 'Seleciona a quantidade máxima de parcelas para o pagamento.', 'wc_getnet' ),
				'desc_tip'          => true,
				'default'           => 12,
				'options'           => array_combine( range( 1, 12 ), range( 1, 12 ) ),
				'custom_attributes' => [
					'data-field' => 'installments-maximum',
				],
			],
			'installments_interest' => [
				'title'             => __( 'Juros a partir da parcela', 'wc_getnet' ),
				'type'              => 'select',
				'description'       => __( 'Define a partir de qual parcela será aplicado o juros.', 'wc_getnet' ),
				'desc_tip'          => true,
				'default'           => 2,
				'options'           => array_combine( range( 1, 12 ), range( 1, 12 ) ),
				'custom_attributes' => [
					'data-field' => 'installments-interest',
				],
			],
			'installments_initial_interest' => [
				'title'             => __( 'Percentual inicial dos juros', 'wc_getnet' ),
				'type'              => 'text',
				'description'       => __( 'Valor percentual dos juros a serem aplicados na parcela.', 'wc_getnet' ),
				'desc_tip'          => true,
				'placeholder'       => '0,00',
				'custom_attributes' => [
					'data-field'        => 'installments-initial-interest',
					'data-mask'         => '##0,00',
					'data-mask-reverse' => 'true',
				],
			],
			'installments_increase_interest' => [
				'title'             => __( 'Percentual de incremento nos juros', 'wc_getnet' ),
				'type'              => 'text',
				'description'       => __( 'Valor percentual dos juros incrementados em cada parcela.', 'wc_getnet' ),
				'desc_tip'          => true,
				'placeholder'       => '0,00',
				'custom_attributes' => [
					'data-field'        => 'installments-increase-interest',
					'data-mask'         => '##0,00',
					'data-mask-reverse' => 'true',
				],
			],
			'advanced_installments_config' => [
				'title'       =>  __( 'Parcelamento Avançado' ),
				'label'       => __( 'Habilitar as configurações de parcelamento por valor.' ),
				'type'        => 'checkbox',
				'description' => __( 'Ativar as configurações de parcelamento por valor' ),
				'desc_tip'    => true,
				'default'     => 'no'
			]	
		];
	}

	public static function getHeaderFields() {
		return [
			'enabled' => [
				'title'       => '',
				'label'       => 'Habilitar',
				'type'        => 'checkbox',
				'description' => '',
				'default'     => 'no',
				'css'         => 'header-component',
			]
		];
	}

	public static function getInstallmentsByValueBasicFields() {
		return [
			'installments_by_value' => [
				'type'        => 'installments_by_value',
				'desc_tip'    => false,
				'fields' => [
					'from_value' => [
						'type' => 'custom_repeater_text',
						'title' => 'Compras a partir de:',
						'class'   => 'gnt-repeater-field from-value-field installment-option'
					],
					'instalments_qtd' => [
						'type'    => 'custom_repeater_select',
						'title'   => 'Máximo de parcelas',
						'options' => self::getMaxInstallmentsArray(),
						'class'   => 'gnt-repeater-field'
					],
				]
			],
		];
	}

	/**
	 * $subFieldIndex = null - New cloned fields index
	 */

	public static function getInstallmentsByValueFields( $subFieldIndex = null ) {
		$basicFields = self::getInstallmentsByValueBasicFields();

		$keySlug     = key($basicFields);
		$basicFields = $basicFields[$keySlug];

		$fields = [];
		foreach( $basicFields['fields'] as $index => $config ) {
			if( !$subFieldIndex ) {
				$fields[$keySlug.'_'.$index] = $config;
				continue;
			}

			$fields[$keySlug.'_'.$index.'_'.$subFieldIndex] = $config;
		}

		return $fields;
	}

	/**
	 * Get Max Installments in Array format [installment] => installment.x
	 * @return string[] installmentsArray
	 */
	public static function getMaxInstallmentsArray() {
		$maxInstallments = get_option('woocommerce_getnet-creditcard_settings')['installments'];

		foreach( range(2, $maxInstallments) as $installment ) {
			$installmentsArray[$installment] = $installment.'x';
		}

		return $installmentsArray;
	}
}