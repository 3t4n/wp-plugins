<?php
/**
 * Functions
 *
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.0.0
 */

/**
 * Update Quick Buy Settings
 *
 * @param array $settings
 * @return int
 */
function awsa_quick_buy_update_settings( $settings ) {
	return update_option( 'awsa_quick_buy_settings', $settings );
}

/**
 * Get Quick Buy Settings
 *
 * @param array $default
 * @return array
 */
function awsa_quick_buy_get_settings( $default = array() ) {
	if ( empty( $default ) ) {
		$default = array(
			'title'                                    => get_bloginfo( 'title' ),
			'description'                              => '',
			'address'                                  => 'quick-start',
			'logo'                                     => '#',
			'hide-search-form-after-find'              => 'no',
			'redirect-after-add-to-cart'               => '',
			'redirect-to-quick-buy-countinue-shopping' => 'no',
			'just-show-the-summary'                    => 'yes',
		);
	}

	return get_option( 'awsa_quick_buy_settings', $default );
}
