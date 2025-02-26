<?php
/**
 * Class AWSA_WC_City_Input_Admin
 *
 * Replace City Field in wc-settings page
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Class AWSA_WC_City_Input_Admin
 */
class AWSA_WC_City_Input_Admin {

	/**
	 * Init
	 *
	 * @return void
	 */
	public static function init(): void {

		add_action( 'admin_enqueue_scripts', __CLASS__ . '::admin_load_scripts', 99 );
		// add_action( 'admin_print_scripts-post-new.php', __CLASS__ . '::admin_load_scripts', 99 );
		// add_action( 'admin_print_scripts-post.php', __CLASS__ . '::admin_load_scripts', 99 );

		add_filter( 'woocommerce_get_settings_general', __CLASS__ . '::replace_city_settings_field' );
		add_action( 'woocommerce_admin_field_awsa-city-selector', __CLASS__ . '::field_city' );
	}

	/**
	 * Replace Store City Input by Select
	 *
	 * @param array $settings
	 *
	 * @return array
	 */
	public static function replace_city_settings_field( $settings ) {

		foreach ( $settings as $k => $setting ) {
			$id = $setting['id'];

			if ( 'woocommerce_store_city' === $id ) {
				$settings[ $k ]['type']  = 'awsa-city-selector';
				$settings[ $k ]['class'] = 'city_selectors';
			}
		}

		return $settings;
	}

	/**
	 * Render City Select Feild
	 *
	 * @param array $value
	 *
	 * @return void
	 */
	public static function field_city( $value ) {

		$city_setting    = isset( $value['value'] ) ? $value['value'] : '';
		$description     = isset( $value['description'] ) ? $value['description'] : '';
		$country_setting = get_option( 'woocommerce_default_country' );
		$country_setting = explode( ':', $country_setting );
		$country         = current( $country_setting );
		$state           = end( $country_setting );
		$cities          = awsa_get_country_cities( $state, $country );

		$field_description = WC_Admin_Settings::get_field_description( $value );
		$description       = $field_description['description'];
		$tooltip_html      = $field_description['tooltip_html'];

		?>
		<tr valign="top">
			<th scope="row" class="titledesc">
				<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html(
							$value['title']
					); ?><?php echo $tooltip_html; // WPCS: XSS ok. ?></label>
			</th>
			<td class="forminp">
				<select name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>"
						style="<?php echo esc_attr( $value['css'] ); ?>"
						placeholder="<?php esc_attr_e( 'City &hellip;', 'awsa-shipping' ); ?>"
						data-placeholder="<?php esc_attr_e( 'Select an option&hellip;', 'awsa-shipping' ); ?>"
						aria-label="<?php esc_attr_e( 'City', 'woocommerce' ); ?>" class="wc-enhanced-select">
					<?php
					$primary_key = AWSA_WC_States_Cities::get_cities_primary_key();
					foreach ( $cities as $city_id => $city ) {
						$id = ( 'id' === $primary_key ) ? $city_id : $city;
						echo '<option value="' . $id . '" ' . selected(
										$city_setting,
										$city_id,
										false
								) . '>' . $city . '</option>';
					}
					?>
				</select>
				<?php echo $description; ?>
			</td>
		</tr>
		<?php
	}

	/**
	 * Add Style and Scripts
	 *
	 * @return void
	 */
	public static function admin_load_scripts(): void {

		global $pagenow;

		if ( !( ( 'admin.php' === $pagenow && 'wc-settings' === $_GET['page'] ) || ( 'profile.php' === $pagenow || 'user-edit.php' === $pagenow ) || ( ( 'post-new.php' === $pagenow || ( isset( $_GET['post_type'] ) && 'shop_order' === $_GET['post_type'] ) ) || ( 'post.php' === $pagenow && 'shop_order' === get_post_type() ) ) ) ) {
			return;
		}

		$city_select_path = AWSA_SHIPPING_PUA_JS;
		$dep              = !is_admin() ? array( 'jquery', 'woocommerce' ) : array( 'jquery' );
		wp_enqueue_script(
				'awsa-shipping-city-select-admin',
				$city_select_path . 'city-select-admin.js',
				$dep,
				'1.0.0',
				true
		);

		$cities = json_encode(
				array(
						'IR' => awsa_get_country_cities( null, 'IR' ),
				)
		);

		$primary_key = AWSA_WC_States_Cities::get_cities_primary_key();

		wp_localize_script(
				'awsa-shipping-city-select-admin',
				'awsa_wc_city_select_params',
				array(
						'cities'                => $cities,
						'i18n_select_city_text' => esc_attr__( 'Select an option&hellip;', 'woocommerce' ),
						'id'                    => $primary_key,
				)
		);
	}

}
