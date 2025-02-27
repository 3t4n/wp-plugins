<?php
declare(strict_types=1);

namespace WPDesk\ShopMagic\Integration\GetResponse;

use ShopMagicVendor\WPDesk\Persistence\PersistentContainer;
use WPDesk\ShopMagic\Admin\Settings\FieldSettingsTab;
use WPDesk\ShopMagic\Components\Persistence\JsonSerializedOptionsContainer;
use WPDesk\ShopMagic\FormField\Field\InputTextField;

/**
 * ShopMagic settings tab - form with fields to be stored in database.
 */
final class Settings extends FieldSettingsTab {

	private PersistentContainer $persistence;

	public function __construct( PersistentContainer $persistence ) {
		$this->persistence = $persistence;
	}

	public static function get_tab_slug(): string {
		return 'getresponse';
	}

	public function has( string $key ): bool {
		return $this->persistence->has( $key );
	}

	public function get( string $key, $default = false ) {
		if ( $this->persistence->has( $key ) ) {
			return $this->persistence->get( $key );
		}

		return $default;
	}

	public static function get_settings_persistence(): PersistentContainer {
		return new JsonSerializedOptionsContainer( 'shopmagic_getresponse_settings' );
	}

	public function get_tab_name(): string {
		return __( 'GetResponse', 'shopmagic-for-woocommerce' );
	}

	/** @return \ShopMagicVendor\WPDesk\Forms\Field[] */
	public function get_fields(): array {
		return [
			( new InputTextField() )
				->set_label( __( 'API Key', 'shopmagic-for-woocommerce' ) )
				->set_description( __( 'Get api key', 'shopmagic-for-woocommerce' ) )
				->set_name( 'api_key' ),

		];
	}
}
