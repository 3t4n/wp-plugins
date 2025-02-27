<?php

namespace WcGetnet\WooCommerce\GateWays\CreditCard;

use WcGetnet\WooCommerce\GateWays\AdminSettingsFields\CreditCard;
use WcGetnet\WooCommerce\GateWays\CustomFields\CustomFields;

class InstallmentsByValue {

    use CustomFields;

	public $creditCardSettings;

	const REFERENCE_FIELD = 'from_value';

	const REFERENCE_BLOCK = 'installments_by_value';

	const WC_FIELDS_KEY_PREFIX = 'woocommerce_getnet-creditcard_';

	public function __construct($creditCardSettings) {
		$this->creditCardSettings = $creditCardSettings;
	}

	/**
	 * Get the full reference field
	 * @return string
	 */
	protected function getReferenceField() {
		return Self::REFERENCE_BLOCK . '_' . Self::REFERENCE_FIELD;
	}

	/**
	 * Check if the advanced installments is enabled
	 * @return bool
	 */
	public function isEnabled() {
		$settings = $this->creditCardSettings->getSettingsOptions();

		if ( isset( $settings['advanced_installments_config'] ) && 'yes' === $settings['advanced_installments_config'] ) {
			return true;
		}

		return false;
	}

	/**
	 * Prepare the fields from the request
	 * @param mixed $request
	 * @return array
	 */
    public function prepareFieldsFromRequest( $request ) {
		$installments_by_value = [];
		$counter = 0;

        foreach( $request as $key => $value ) {
			if ( str_contains($key, $this->getReferenceField()) ) {
				$counter++;

				$installments_by_value = array_merge(
					$installments_by_value,
					CreditCard::getInstallmentsByValueFields($counter)
				);
			}
		}

        return $installments_by_value;
    }

	/**
	 * Render the repeater fields
	 * @return void
	 */
	public function renderRepeaterFields() {
		$counter = 0;
		$request = get_option('woocommerce_getnet-creditcard_settings');

		if( empty( $request ) || !isset( $request[$this->getReferenceField().'_1'] ) ) {
			$this->renderSingleField(1);
			return;
		}

		foreach( $request as $key => $value ) {
			if ( str_contains($key, $this->getReferenceField()) ) {
				$counter++;
				preg_match('/\d+$/', $key, $matches);
				$this->renderSingleField($counter);
			}
		}
	}

	/**
	 * Render the single field
	 * @param int $index
	 */
	public function renderSingleField( $index ) {
		?>
			<div id="installments-by-value_<?php echo $index ?>" class="credit-advanced-installments-containter-item"> 
				<?php $this->creditCardSettings->generate_settings_html(CreditCard::getInstallmentsByValueFields($index)); ?>
				<div class="delete-repeater">
					<img src="<?php echo esc_url( \WcGetnet::core()->assets()->getAssetUrl( 'images/delete.png' ) )?>" class="img-delete-repeater" data-installment-index="<?php echo $index ?>" >
				</div>
			</div>
		<?php
	}

	/**
	 * Update the request data with the installments by value fields
	 * @param mixed $value
	 * @return mixed
	 */
    public function updateRequestData($value) {
		$request    = $this->removeArrayKeyPrefix( $_REQUEST, SELF::WC_FIELDS_KEY_PREFIX );
		$requestKey = $this->getOnlyInstallmentsByValueFields($request);

		foreach( $value as $key => $v ) {
			if( $this->isInstallmentByValueField($key) ) {
				unset($value[$key]);
			}
		}

		foreach ($requestKey as $key => $requestValue) {
			$requestValue = str_replace(['.', ','], ['', '.'], $requestValue);
			$requestKey[$key] = $requestValue;
		}

		return array_merge($value, $requestKey);
	}

	/**
	 * Check if the field is an installment by value field
	 * @param mixed $field
	 * @return bool
	 */
    public function isInstallmentByValueField( $field ) {
		return str_contains($field, 'installments_by_value');
	}

	/**
	 * Remove the prefix from the array keys
	 *
	 * @param array $array
	 * @param string $prefix
	 *
	 * @return array
	 */
	public function removeArrayKeyPrefix($array, $prefix) {
		return array_combine( 
			array_map(function($key) use ($prefix) {
				if ( str_contains($key, $prefix) ) {
					return str_replace($prefix, '', $key);
				}
			},array_keys($array)),
			array_values($array)
		);
	}

	public function checkInstallmentByValueRange($orderAmmount) {
		$installmentsByValueSettings = get_option('woocommerce_getnet-creditcard_settings');
		$installmentsByValueFields   = $this->getOnlyInstallmentsByValueFields($installmentsByValueSettings);

		if ( empty($installmentsByValueSettings['advanced_installments_config']) || 'no' == $installmentsByValueSettings['advanced_installments_config'] ) {
			return $installmentsByValueSettings['installments'];
		}

		$lastInstallment = 0;
		foreach( $installmentsByValueFields as $key => $value ) {
			if ( !$this->isInstallmentByValueField($key) ) {
				continue;
			}

			$keyReference = explode('_', $key);
			$keyReference = end($keyReference);

			$orderAmmount = str_replace(',', '.', $orderAmmount);
			$value = str_replace(',', '.', $value);

			if( str_contains($key, $this->getReferenceField()) && $orderAmmount >= $value ) {
				$lastInstallment = $installmentsByValueSettings['installments_by_value_instalments_qtd_'.$keyReference];
			}
		}

		return $lastInstallment;
	}

	public function getOnlyInstallmentsByValueFields($metaData) {
		return array_filter($metaData, [$this, "isInstallmentByValueField"], ARRAY_FILTER_USE_KEY);
	}
}