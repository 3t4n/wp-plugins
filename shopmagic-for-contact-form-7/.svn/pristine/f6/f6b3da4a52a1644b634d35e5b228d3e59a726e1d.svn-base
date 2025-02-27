<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagicCF7;

use ShopMagicCF7Vendor\WPDesk\Notice\Notice;
use ShopMagicCF7Vendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use ShopMagicCF7Vendor\WPDesk\PluginBuilder\Plugin\HookableCollection;
use ShopMagicCF7Vendor\WPDesk\PluginBuilder\Plugin\HookableParent;
use ShopMagicCF7Vendor\WPDesk_Plugin_Info;
use ShopMagicVendor\DI\ContainerBuilder;
use WPDesk\ShopMagic\Frontend\Interceptor\CurrentCustomer;
use WPDesk\ShopMagic\Integration\ExternalPluginsAccess;
use WPDesk\ShopMagicCF7\Event\FormSubmit;
use function ShopMagicVendor\DI\create;
use function ShopMagicVendor\DI\get;

final class Plugin extends AbstractPlugin implements HookableCollection {
	use HookableParent;

	public function __construct( WPDesk_Plugin_Info $plugin_info ) {
		/** @noinspection PhpParamsInspection */
		parent::__construct( $plugin_info );

		$this->docs_url = 'https://docs.shopmagic.app/article/1121-shopmagic-for-contact-form-7?utm_source=user-site&utm_medium=quick-link&utm_campaign=docs';
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
								'This version of ShopMagic for Contact Form 7 plugin is not compatible with ShopMagic %s. Please upgrade ShopMagic for Contact Form 7 to the newest version.',
								'shopmagic-for-contact-form-7'
							),
							$shopmagic_version
						)
					);
				}

				$container = $core->get_container();
				$builder   = new ContainerBuilder();
				$builder->useAutowiring( false );
				$builder->wrapContainer( $container );
				$builder->addDefinitions( [
					FormSubmit::class      => create()
						->constructor( get( CurrentCustomer::class ) ),

				] );
				$phpdiContainer = $builder->build();
				$container->addContainer( $phpdiContainer );

				$container->get( CfFormInterceptor::class )->hooks();

				$core->add_extension( new ContactForm7Extension( $container ) );
			}
		);
	}
}
