<?php

namespace WPDesk\FlexibleShippingFedex;

use FedExVendor\WPDesk\PluginBuilder\Plugin\Hookable;

class PluginLinks implements Hookable {

	private $plugin_file;

	public function __construct( $plugin_file ) {
		$this->plugin_file = $plugin_file;
	}

	public function hooks() {
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 4 );
	}

	public function plugin_row_meta( $plugin_meta, $plugin_file, $plugin_data, $status ) {
		if ( $plugin_file === $this->plugin_file ) {
			$is_pl        = 'pl_PL' === get_locale();
			$docs_link    = $is_pl ? 'https://octol.io/fedex-docs-pl' : 'https://octol.io/fedex-docs';
			$support_link = $is_pl ? 'https://octol.io/fedex-support-pl' : 'https://octol.io/fedex-support';

			$plugin_links = [
				'<a href="' . $docs_link . '" target="_blank">' . __( 'Docs', 'flexible-shipping-fedex' ) . '</a>',
				'<a href="' . $support_link . '" target="_blank">' . __( 'Support', 'flexible-shipping-fedex' ) . '</a>',
			];

			return array_merge( $plugin_meta, $plugin_links );
		}

		return $plugin_meta;
	}

}
