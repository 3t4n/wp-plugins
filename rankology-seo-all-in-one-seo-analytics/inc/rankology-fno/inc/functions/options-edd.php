<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//EDD
//=================================================================================================
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'easy-digital-downloads/easy-digital-downloads.php' )) {
	if(is_singular('download')) {
		function rankology_edd_product_og_price_hook() {
			if (rankology_fno_get_service('OptionPro')->getEddOgPrice() ==='1') {
				if (function_exists('edd_get_download_price') && function_exists('edd_format_amount')) {
					$price = edd_format_amount(edd_get_download_price( get_the_id()));

					$rankology_social_og_price = '<meta property="product:price:amount" content="'.$price.'">';

					echo $rankology_social_og_price."\n";
				}
			}
		}
		add_action( 'wp_head', 'rankology_edd_product_og_price_hook', 1 );

		//OG Currency
		function rankology_edd_product_og_currency_hook() {
			if (rankology_fno_get_service('OptionPro')->getEddOgCurrency() ==='1') {
				if (function_exists('edd_get_currency') && edd_get_currency() !='') {
					$rankology_social_og_currency = '<meta property="product:price:currency" content="'.edd_get_currency().'">';

					echo $rankology_social_og_currency."\n";
				}

			}
		}
		add_action( 'wp_head', 'rankology_edd_product_og_currency_hook', 1 );
	}
	//EDD Meta tag generator
	if (rankology_fno_get_service('OptionPro')->getEddMetaGenerator() ==='1') {
		remove_action('wp_head','edd_version_in_header');
	}
}
