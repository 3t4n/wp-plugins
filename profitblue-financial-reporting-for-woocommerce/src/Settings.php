<?php

namespace Profitblue;

use Profitblue\Settings\GeneralSettings;
use Profitblue\Settings\ProductSettings;
use Profitblue\Deps\CustomFields\CustomFields;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class Settings {

	/**
	 * @var CustomFields
	 */
	public $wcf;

	const SECTION_GENERAL = 'general';
	const SECTION_DATA = 'data';
	
	public function __construct(
		GeneralSettings $general,
		Data $data,
	) {
		add_action(
			'admin_init',
			function () {
				if ( filter_input( INPUT_GET, 'tab' ) === 'priftblue' && is_null( filter_input( INPUT_GET, 'section' ) ) ) {
					wp_redirect(
						add_query_arg(
							array(
								'page'    => 'wc-settings',
								'tab'     => 'profitblue-financial-reporting-for-woocommerce',
								'section' => self::SECTION_GENERAL,
							),
							admin_url( 'admin.php' )
						)
					);
					exit();
				}
			}
		);
	}

}
