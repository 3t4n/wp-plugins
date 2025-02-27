<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicTwilio;

use ShopMagicTwilioVendor\WPDesk\Notice\Notice;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\HookableCollection;
use ShopMagicTwilioVendor\WPDesk\PluginBuilder\Plugin\HookableParent;
use ShopMagicTwilioVendor\WPDesk_Plugin_Info;
use WPDesk\ShopMagic\Integration\ExternalPluginsAccess;

class Plugin extends AbstractPlugin implements HookableCollection {
	use HookableParent;

	public function __construct( WPDesk_Plugin_Info $plugin_info ) {
		/** @noinspection PhpParamsInspection */
		parent::__construct( $plugin_info );

		$this->docs_url = 'https://docs.shopmagic.app/article/1139-addons-twilio?utm_source=user-site&utm_medium=quick-link&utm_campaign=docs';
		$this->support_url = 'https://shopmagic.app/support/?utm_source=user-site&utm_medium=quick-link&utm_campaign=support';
	}

	public function hooks(): void {
		parent::hooks();

		add_action(
			'shopmagic/core/initialized/v2',
			static function ( ExternalPluginsAccess $core ) {
				$shopmagic_version = $core->get_version();
				if ( version_compare( $shopmagic_version, '5', '>=' ) ) {
					new Notice(
						sprintf(
						// translators: %s ShopMagic version.
							__(
								'This version of ShopMagic for Twilio plugin is not compatible with ShopMagic %s. Please upgrade ShopMagic for Twilio to the newest version.',
								'shopmagic-for-twilio'
							),
							$shopmagic_version
						)
					);

					return;
				}

				$core->add_extension( new TwilioExtension() );
				$core->append_setting_tab( new Admin\Settings() );
			}
		);
	}
}
