<?php

namespace MuzaPay;

use MuzaPay\Managers\ApiManager;
use MuzaPay\Managers\FeaturesManager;
use MuzaPay\Managers\RepositoryManager;
use MuzaPay\PostTypes\ProductPostType;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

final class Plugin {
	public function __construct(
		RepositoryManager $repository_manager,
		ApiManager $api_manager,
		FeaturesManager $features_manager,
		ProductPostType $product_post_type
	) {
	}

	/**
	 * @param bool $network_wide
	 */
	public function activate( bool $network_wide ) {
	}

	/**
	 * @param bool $network_wide
	 */
	public function deactivate( bool $network_wide ) {
	}

	/**
	 *
	 */
	public function uninstall() {
	}
}
