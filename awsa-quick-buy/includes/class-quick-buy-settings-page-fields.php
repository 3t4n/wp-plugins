<?php
/**
 * Class AWSA_Shipping_Settings_Page_Fields
 *
 * @package           AWSA_Shipping
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @version           1.1.0
 */

/**
 * Class AWSA_Shipping_Settings_Page_Fields
 */
class AWSA_Quick_Buy_Settings_Page_Fields extends AWSA_Settings_Page_Fields {
	/**
	 * Get Settings Fields
	 *
	 * @return mixed
	 */
	public function get_settings_fields() {
		$settings = awsa_quick_buy_get_settings();

		$pages = get_posts(
			array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
			)
		);

		$options = array();
		foreach ( $pages as $page ) {
			$options[ $page->ID ] = $page->post_title;
		}

		$fields = array(
			'awsa-quick-buy-title'                       => array(
				'title'       => __( 'Title', 'awsa-quick-buy' ),
				'type'        => 'text',
				'name'        => 'awsa-quick-buy-title',
				'placeholder' => __( 'Example: Quick Buy or your blog name', 'awsa-quick-buy' ),
				'value'       => isset( $settings['title'] ) ? $settings['title'] : get_bloginfo( 'title' ),
				'description' => '',
			),

			'awsa-quick-buy-description'                 => array(
				'title'       => __( 'Short description', 'awsa-quick-buy' ),
				'type'        => 'text',
				'name'        => 'awsa-quick-buy-description',
				'value'       => isset( $settings['description'] ) ? $settings['description'] : '',
				'description' => '',
			),

			'awsa-quick-buy-address'                     => array(
				'title'       => __( 'Address', 'awsa-quick-buy' ),
				'type'        => 'text',
				'name'        => 'awsa-quick-buy-address',
				'placeholder' => __( 'Example: quick-buy', 'awsa-quick-buy' ),
				'value'       => isset( $settings['address'] ) ? $settings['address'] : 'quick-buy',
				'description' => '',
			),

			'awsa-quick-buy-logo'                        => array(
				'title'       => __( 'Logo', 'awsa-quick-buy' ),
				'type'        => 'text',
				'name'        => 'awsa-quick-buy-logo',
				'placeholder' => __( 'Enter the logo address', 'awsa-quick-buy' ),
				'value'       => isset( $settings['logo'] ) ? $settings['logo'] : '',
				'description' => '',
			),

			'awsa-quick-buy-hide-search-form-after-find' => array(
				'title'         => __( 'Enable/Disable', 'awsa-quick-buy' ),
				'label'         => __( 'Hide search form after finding product', 'awsa-quick-buy' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-quick-buy-hide-search-form-after-find',
				'current_value' => isset( $settings['hide-search-form-after-find'] ) ? $settings['hide-search-form-after-find'] : 'no',
				'value'         => 'yes',
				'description'   => '',
			),

			'awsa-quick-buy-redirect-after-add-to-cart'  => array(
				'title'       => __( 'Redirect after add to cart', 'awsa-quick-buy' ),
				'type'        => 'select',
				'options'     => $options,
				'name'        => 'awsa-quick-buy-redirect-after-add-to-cart',
				'value'       => isset( $settings['redirect-after-add-to-cart'] ) ? $settings['redirect-after-add-to-cart'] : '',
				'description' => __( 'Enable display of search form after finding product', 'awsa-quick-buy' ),
			),

			'awsa-quick-buy-redirect-btn-countinue-shopping-to-quick-buy' => array(
				'title'         => __( 'Button redirection to shop', 'awsa-quick-buy' ),
				'label'         => __( 'Enable redirection to the quick buy page, if the customer entered the site from the quick buy page', 'awsa-quick-buy' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-quick-buy-redirect-btn-countinue-shopping-to-quick-buy',
				'current_value' => isset( $settings['redirect-to-quick-buy-countinue-shopping'] ) ? $settings['redirect-to-quick-buy-countinue-shopping'] : 'no',
				'value'         => 'yes',
				'description'   => '',
			),

			'awsa-quick-buy-just-show-the-summary'       => array(
				'title'         => __( 'Product details', 'awsa-quick-buy' ),
				'label'         => __( 'Just show the summary', 'awsa-quick-buy' ),
				'type'          => 'checkbox',
				'name'          => 'awsa-quick-buy-just-show-the-summary',
				'current_value' => isset( $settings['just-show-the-summary'] ) ? $settings['just-show-the-summary'] : 'yes',
				'value'         => 'yes',
				'description'   => '',
			),

		);

		return $fields;
	}

	/**
	 * Update Settings
	 *
	 * @param mixed $settings
	 * @return void
	 */
	public function update_settings( $settings ) {
		$fields = $this->get_settings_fields();

		$settings = array(
			'title'                                    => $settings['awsa-quick-buy-title'],
			'description'                              => $settings['awsa-quick-buy-description'],
			'address'                                  => $settings['awsa-quick-buy-address'],
			'logo'                                     => $settings['awsa-quick-buy-logo'],
			'hide-search-form-after-find'              => $settings['awsa-quick-buy-hide-search-form-after-find'],
			'redirect-after-add-to-cart'               => $settings['awsa-quick-buy-redirect-after-add-to-cart'],
			'redirect-to-quick-buy-countinue-shopping' => $settings['awsa-quick-buy-redirect-btn-countinue-shopping-to-quick-buy'],
			'just-show-the-summary'                    => $settings['awsa-quick-buy-just-show-the-summary'],

		);

		$old_settings = awsa_quick_buy_get_settings(
			array(
				'address' => false,
			)
		);

		awsa_quick_buy_update_settings( $settings );

		if ( $old_settings['address'] !== $settings['address'] ) {
			AWSA_Quick_Buy_Page::add_rewrite_rules();
			flush_rewrite_rules();
		}
	}
}
