<?php

/*
Class Name: WOO_F_LOOKBOOK_Admin_Settings
Author: Andy Ha (support@villatheme.com)
Author URI: http://villatheme.com
Copyright 2017 villatheme.com. All rights reserved.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Admin_Settings {
	protected $settings, $updated_sucessfully, $error;

	public function __construct() {
        $this->settings = WOO_F_LOOKBOOK_Data::get_instance();
		add_action( 'admin_init', array( $this, 'save_settings' ),99 );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}
	/**
	 * Init Script in Admin
	 */
	public function admin_enqueue_scripts() {
		$screen_id = get_current_screen()->id;
		if ( 'woocommerce-lookbook_page_woocommerce-lookbook-settings' == $screen_id ) {
			$this->settings::remove_other_script();
			$this->settings::enqueue_style(
				array(
					'semantic-ui-accordion',
					'semantic-ui-button',
					'semantic-ui-checkbox',
					'semantic-ui-dropdown',
					'semantic-ui-segment',
					'semantic-ui-form',
					'semantic-ui-label',
					'semantic-ui-input',
					'semantic-ui-icon',
					'semantic-ui-table',
					'semantic-ui-message',
					'semantic-ui-menu',
					'semantic-ui-tab',
					'transition',
				),
				array(
					'accordion',
					'button',
					'checkbox',
					'dropdown',
					'segment',
					'form',
					'label',
					'input',
					'icon',
					'table',
					'message',
					'menu',
					'tab',
					'transition'
				),
				array(  1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 )
			);
			$this->settings::enqueue_style(
				array( 'woo-lookbook-admin', ),
				array( 'woo-lookbook-admin' ),
				array()
			);
			/*Color picker*/
			wp_enqueue_script(
				'iris', admin_url( 'js/iris.min.js' ), array(
				'jquery-ui-draggable',
				'jquery-ui-slider',
				'jquery-touch-punch'
			), WOO_F_LOOKBOOK_VERSION, false );
			$this->settings::enqueue_script(
				array(
					'woocommerce-lookbook-address',
					'semantic-ui-accordion',
					'semantic-ui-checkbox',
					'semantic-ui-dropdown',
					'semantic-ui-tab',
					'transition'
				),
				array(
					'address',
					'accordion',
					'checkbox',
					'dropdown',
					'tab',
					'transition',
				),
				array( 1, 1, 1, 1, 1, 1)
			);
			$this->settings::enqueue_script(
				array( 'woo-lookbook-admin' ),
				array( 'woo-lookbook-admin' ),
				array( 0 ),
			);
		}
	}

	public function save_settings() {
		if ( ! isset( $_POST['_woo_lookbook_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['_woo_lookbook_nonce'] ) ), 'woo_lookbook_settings' ) ) {
			return;
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( !isset( $_POST['wlb_params_submit'] )) {
			return;
		}
		global $wlb_settings;
		$args = $this->settings->get_params();
		foreach ( $args as $key => $arg ) {
			if ( isset( $_POST[ $key ] ) ) {
				if ( is_array( $_POST[ $key ] ) ) {
					$args[ $key ] = array_map( 'sanitize_text_field',wp_unslash( $_POST[ $key ] ) );
				} else {
					$args[ $key ] = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
				}
			} else {
				$args[ $key ] = is_array( $arg ) ? array() : '';
			}
		}
		$args                    = apply_filters( "woo_lookbook_save_plugin_settings_params", $args );
		$wlb_settings = $args;
		update_option( 'woo_lookbook_params', $args);
		$this->settings = WOO_F_LOOKBOOK_Data::get_instance(true);
		$this->updated_sucessfully = 1;
	}

	/**
	 * Set field in meta box
	 *
	 * @param      $field
	 * @param bool $multi
	 *
	 * @return string
	 */
	protected static function set_field( $field, $multi = false ) {
		if ( $field ) {
			if ( $multi ) {
				return  $field . '[]';
			} else {
				return $field;
			}
		} else {
			return '';
		}
	}
	/**
	 * Register a custom menu page.
	 */
	public function menu_page() {
		add_submenu_page(
			'edit.php?post_type=woocommerce-lookbook',
			esc_html__( 'LookBook for WooCommerce Setting page', 'woo-lookbook' ),
			esc_html__( 'Settings', 'woo-lookbook' ),
			'manage_options',
			'woocommerce-lookbook-settings',
			array( $this, 'page_callback' )
		);
	}
	/**
	 * HTML setting page
	 */
	public function page_callback() {
		$tabs                = array(
			'general'   => esc_html__( 'Design', 'woo-lookbook' ),
			'product'   => esc_html__( 'Product', 'woo-lookbook' ),
			'instagram' => esc_html__( 'Instagram', 'woo-lookbook' ),
		);
		$tab_active          = array_key_first( $tabs );
		?>
        <div class="wrap woo-lookbook">
            <h2><?php esc_attr_e( 'LookBook for WooCommerce Settings', 'woo-lookbook' ) ?></h2>
            <?php
            if ( $this->error ) {
	            printf( '<div id="message" class="error"><p><strong>%s</strong></p></div>', esc_html( $this->error ) );
            }
            if ( $this->updated_sucessfully ) {
	            printf( '<div id="message" class="updated"><p><strong>%s</strong></p></div>', esc_html__( 'Your settings have been saved!', 'woo-lookbook') );
            }
            ?>
            <form method="post" action="" class="vi-ui small form">
				<?php wp_nonce_field( 'woo_lookbook_settings', '_woo_lookbook_nonce' ,false); ?>
                <div class="vi-ui top attached tabular menu">
		            <?php
		            foreach ( $tabs as $slug => $text ) {
			            $active = $tab_active === $slug ? 'active' : '';
			            printf( ' <div class="item %s" data-tab="%s">%s</div>', esc_attr( $active ), esc_attr( $slug ), esc_html( $text ) );
		            }
		            ?>
                </div>
	            <?php
	            foreach ( $tabs as $slug => $text ) {
		            $active = $tab_active === $slug ? ' active' : '';
		            $method = str_replace( '-', '_', $slug ) . '_options';
		            $fields = [];
		            printf( '<div class="vi-ui bottom attached%s tab segment" data-tab="%s">', esc_attr( $active ), esc_attr( $slug ) );
		            if ( method_exists( $this, $method ) ) {
			            $fields = $this->$method();
		            }
		            if (is_array($fields)) {
			            $this->settings::villatheme_render_table_field( apply_filters( "viwlb_settings_fields", $fields, $slug ) );
		            }
		            do_action( 'viwlb_settings_tab', $slug );
		            printf( '</div>' );
	            }
	            ?>
                <p class="viwlb-button-save-settings-container">
                    <button class="vi-ui button labeled icon primary wlb-submit" name="wlb_params_submit">
                        <i class="send icon"></i> <?php esc_html_e( 'Save', 'woo-lookbook' ) ?>
                    </button>
                </p>
            </form>
        </div>
		<?php
		do_action( 'villatheme_support_woo-lookbook' );
	}
	public function general_options() {
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Icon', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'icon_color' ) ) ?>"
                           value="<?php echo esc_attr( $icon_color =  $this->settings->get_params( 'icon_color', '#fff' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $icon_color) ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Background color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'icon_background_color' ) ) ?>"
                           value="<?php echo esc_attr( $icon_background_color = $this->settings->get_params( 'icon_background_color', '#E8CE40' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $icon_background_color ) ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Border color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'icon_border_color' ) ) ?>"
                           value="<?php echo esc_attr( $icon_border_color = $this->settings->get_params( 'icon_border_color', '#E8CE40' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $icon_border_color) ?>">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr($hide_title_field =  self::set_field( 'hide_title' ) ) ?>">
						<?php esc_html_e( 'Hide Title', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr($hide_title_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params(  'hide_title' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $hide_title_field) ?>">
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Title Color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'title_color' ) ) ?>"
                           value="<?php echo esc_attr( $title_color = $this->settings->get_params( 'title_color', '#212121' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $title_color) ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Title Background Color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'title_background_color' ) ) ?>"
                           value="<?php echo esc_attr( $title_background_color = $this->settings->get_params( 'title_background_color', '#eee' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $title_background_color ) ?>"/>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'active'    => 1,
				'class'     => 'viwlb-node-options-accordion',
				'title'     => esc_html__( 'Node Options', 'woo-lookbook' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th >
                    <label>
						<?php esc_html_e( 'Modal style', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Loading Icon', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Text Color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'text_color' ) ) ?>"
                           value="<?php echo esc_attr( $text_color = $this->settings->get_params( 'text_color', '#E8CE40' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $text_color ) ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Background Color', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="text" class="color-picker"
                           name="<?php echo esc_attr( self::set_field( 'background_color' ) ) ?>"
                           value="<?php echo esc_attr( $background_color = $this->settings->get_params( 'background_color', '#fff' ) ) ?>"
                           style="background-color: <?php echo esc_attr( $background_color ) ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Border radius', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui right labeled input">
                        <input type="number"
                               name="<?php echo esc_attr( self::set_field( 'border_radius' ) ) ?>"
                               value="<?php echo esc_attr( $this->settings->get_params( 'border_radius', 0 ) ) ?>"/>
                        <div class="vi-ui label"><?php esc_html_e( 'px', 'woo-lookbook' ) ?></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $close_button_field = self::set_field( 'close_button' ) ) ?>">
						<?php esc_html_e( 'Hide Close Button', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr($close_button_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params('close_button' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $close_button_field ) ?>"/>
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr($see_more_field =  self::set_field( 'see_more' ) ) ?>">
						<?php esc_html_e( 'Hide See More Button', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr($see_more_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'see_more' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr($see_more_field) ?>"/>
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Add to cart', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                    <p class="description"><?php esc_html_e( 'When add to cart on quick view, Customer will redirect to cart or checkout page', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Navigation position', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Navigation icon', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label>
				        <?php esc_html_e( 'RTL', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
				        <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                    <p class="description"><?php esc_html_e( 'Support RTL fully', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'viwlb-quick-view-accordion',
				'title'     => esc_html__( 'Quick view', 'woo-lookbook'),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label><?php esc_html_e( 'Width', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui right labeled input">
                        <input type="number"
                               name="<?php echo esc_attr( self::set_field( 'slide_width' ) ) ?>"
                               value="<?php echo esc_attr( $this->settings->get_params( 'slide_width', 1170 ) ) ?>"/>
                        <label class="vi-ui label"><?php esc_html_e( 'px', 'woo-lookbook' ) ?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Height', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui right labeled input">
                        <input type="number"
                               name="<?php echo esc_attr( self::set_field( 'slide_height' ) ) ?>"
                               value="<?php echo esc_attr( $this->settings->get_params( 'slide_height', 600 ) ) ?>"/>
                        <label class="vi-ui label"><?php esc_html_e( 'px', 'woo-lookbook' ) ?></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Number items per row', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $slide_effect_field = self::set_field( 'slide_effect' ) ) ?>">
						<?php esc_html_e( 'Effect', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <select name="<?php echo esc_attr( $slide_effect_field ) ?>"
                            class="vi-ui fluid dropdown">
                        <option <?php selected( $slide_effect = $this->settings->get_params( 'slide_effect' ), 0 ) ?>
                                value="0"><?php esc_html_e( 'Slide', 'woo-lookbook' ) ?></option>
                        <option <?php selected( $slide_effect, 1 ) ?>
                                value="1"><?php esc_html_e( 'Fade', 'woo-lookbook' ) ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $slide_pagination_field = self::set_field( 'slide_pagination' ) ) ?>">
						<?php esc_html_e( 'Slide Pagination', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr( $slide_pagination_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'slide_pagination' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $slide_pagination_field ) ?>"/>
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr($slide_navigation_field =  self::set_field( 'slide_navigation' ) ) ?>">
						<?php esc_html_e( 'Slide Navigation', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr($slide_navigation_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'slide_navigation' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $slide_navigation_field ) ?>"/>
                        <label></label>
                    </div>
                    <p class="description"></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Stop Navigation Loop', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $slide_auto_play_field =  self::set_field( 'slide_auto_play' ) ) ?>">
						<?php esc_html_e( 'Auto play', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr( $slide_auto_play_field) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'slide_auto_play' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $slide_auto_play_field ) ?>"/>
                        <label></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Duration', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <div class="vi-ui right labeled input">
                        <input type="number"
                               name="<?php echo esc_attr( self::set_field( 'slide_time' ) ) ?>"
                               value="<?php echo esc_attr( $this->settings->get_params(  'slide_time', 5000 ) ) ?>"/>
                        <label class="vi-ui label"><?php esc_html_e( 'milliseconds', 'woo-lookbook' ) ?></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Specify a time to advance to the next lookbook.', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'viwlb-slide-options-accordion',
				'title'     => esc_html__( 'Slide Options', 'woo-lookbook'),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label><?php esc_html_e( 'Number items per row', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th >
                    <label>
						<?php esc_html_e( 'Change to slide on mobile', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'viwlb-gallery-options-accordion',
				'title'     => esc_html__( 'Gallery Options', 'woo-lookbook'),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <div class="field">
            <textarea type="text" name="<?php echo esc_attr( self::set_field( 'custom_css' ) ) ?>"><?php echo esc_attr( $this->settings->get_params( 'custom_css' ) ) ?></textarea>
        </div>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'viwlb-custom-css-accordion',
				'title'     => esc_html__( 'Custom CSS', 'woo-lookbook'),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}
	public function product_options() {
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $link_redirect_field = self::set_field( 'link_redirect' ) ) ?>">
						<?php esc_html_e( 'Link Redirect', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr( $link_redirect_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'link_redirect' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $link_redirect_field ) ?>">
                        <label></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Click on Nodes will redirect the page to the single product page.', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $external_product_field = self::set_field( 'external_product' ) ) ?>">
						<?php esc_html_e( 'External Link', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr( $external_product_field ) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params(  'external_product' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $external_product_field ) ?>"/>
                        <label></label>
                    </div>
                    <p class="description"><?php esc_html_e( 'Click on Nodes will redirect the page to the external link instead of the single product page. Working only with External/Affiliate products.', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [],
			'section_end'   => [],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}
	public function instagram_options() {
		?>
        <div class="vi-ui message positive">
            <h3><?php esc_html_e( 'How to get Instagram Access Token.', 'woo-lookbook' ) ?></h3>
            <ul>
                <li>
					<?php
					$guide = esc_html__( '1. Create Facebook App at ', 'woo-lookbook' );
					$guide .= '<a target="_blank" href="https://developers.facebook.com/">https://developers.facebook.com/</a>';
					$guide .= '</li><li>';
					$guide .= esc_html__( '2. Add Facebook login & Instagram module', 'woo-lookbook' );
					$guide .= '</li><li>';
					$guide .= esc_html__( '3. Copy ', 'woo-lookbook' );
					$guide .= '<strong>' . admin_url( 'edit.php?post_type=woocommerce-lookbook&page=woocommerce-lookbook-settings#/instagram' ) . '</strong>';
					$guide .= esc_html__( ' to Facebook Login > Settings > Valid OAuth Redirect URIs', 'woo-lookbook' );
					echo wp_kses_post( $guide );
					?>
                </li>
                <li>
                    <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/109jLhPIokY?si=QbvOWykdK4Mt0jsq"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </li>
            </ul>
        </div>
		<?php
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label for="<?php echo esc_attr($ins_client_id_field =  self::set_field( 'ins_client_id' ) ) ?>">
						<?php esc_html_e( 'Client ID', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <input type="text" name="<?php echo esc_attr( $ins_client_id_field ) ?>"
                           value="<?php echo esc_attr( $this->settings->get_params( 'ins_client_id', '' ) ) ?>"/>

                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $ins_client_secret_field = self::set_field( 'ins_client_secret' ) ) ?>">
						<?php esc_html_e( 'Client Secret', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <input type="text"
                           name="<?php echo esc_attr( $ins_client_secret_field ) ?>"
                           value="<?php echo esc_attr( $this->settings->get_params( 'ins_client_secret', '' ) ) ?>"/>
                </td>
            </tr>
			<?php
			$access_token = $this->settings->get_params( 'ins_access_token' );
			$access_token = WOO_F_LOOKBOOK_Admin_Instagram::check_token_live( $access_token ) ? $access_token : '';
			$link_login   = ! $access_token ? WOO_F_LOOKBOOK_Admin_Instagram::get_link_login() : '';
			?>
            <tr>
                <th scope="row">
                    <label for="<?php echo esc_attr($ins_access_token_field =  self::set_field( 'ins_access_token' ) ) ?>">
						<?php esc_html_e( 'Access Token', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="field">
                        <input type="hidden" name="<?php echo esc_attr( self::set_field( 'ins_page_id' ) ) ?>"
                               value="<?php echo esc_attr( $this->settings->get_params( 'ins_page_id', '' ) ) ?>"/>
                        <input type="text"
                               name="<?php echo esc_attr( $ins_access_token_field) ?>"
                               value="<?php echo esc_attr( $access_token ) ?>"/>
                    </div>
					<?php
					if ( $link_login ) {
						?>
                        <div class="field">
                            <a href="<?php echo esc_url( $link_login ) ?>"
                               class="vi-ui button green"><?php esc_html_e( 'Get Access Token', 'woo-lookbook' ) ?></a>
                        </div>
						<?php
					}
					?>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $ins_display_field = self::set_field( 'ins_display' ) ) ?>">
						<?php esc_html_e( 'Display', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <select name="<?php echo esc_attr( $ins_display_field ) ?>"
                            class="vi-ui fluid dropdown">
                        <option <?php selected( $ins_display = $this->settings->get_params( 'ins_display' ), 0 ) ?>
                                value="0"><?php esc_html_e( 'Gallery', 'woo-lookbook' ) ?></option>
                        <option <?php selected( $ins_display, 1 ) ?>
                                value="1"><?php esc_html_e( 'Carousel', 'woo-lookbook' ) ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Number items per row', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <select name="<?php echo esc_attr( self::set_field( 'ins_items_per_row' ) ) ?>"
                            class="vi-ui fluid dropdown">
                        <option <?php selected( $ins_items_per_row = $this->settings->get_params( 'ins_items_per_row' ), 3 ) ?>
                                value="3"><?php esc_html_e( '3', 'woo-lookbook' ) ?></option>
                        <option <?php selected( $ins_items_per_row, 4 ) ?>
                                value="4"><?php esc_html_e( '4', 'woo-lookbook' ) ?></option>
                        <option <?php selected( $ins_items_per_row, 5 ) ?>
                                value="5"><?php esc_html_e( '5', 'woo-lookbook' ) ?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <label><?php esc_html_e( 'Display limit', 'woo-lookbook' ) ?></label>
                </th>
                <td>
                    <input type="number"
                           name="<?php echo esc_attr( self::set_field( 'ins_display_limit' ) ) ?>"
                           value="<?php echo esc_attr( $this->settings->get_params( 'ins_display_limit', 12 ) ) ?>"/>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="<?php echo esc_attr( $ins_link_field = self::set_field( 'ins_link' ) ) ?>">
						<?php esc_html_e( 'Link to Instagram', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <div class="vi-ui toggle checkbox">
                        <input id="<?php echo esc_attr( $ins_link_field) ?>"
                               type="checkbox" <?php checked( $this->settings->get_params( 'ins_link' ), 1 ) ?>
                               tabindex="0" class="hidden" value="1"
                               name="<?php echo esc_attr( $ins_link_field ) ?>"/>
                        <label></label>
                    </div>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'active'    => 1,
				'class'     => 'viwlb-instagram-general-accordion',
				'title'     => esc_html__( 'General', 'woo-lookbook' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		ob_start();
		?>
        <table class="form-table">
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Schedule', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                    <p class="description"><?php esc_html_e( 'The action will trigger when someone visits your WordPress site.', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Image Status', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                    <p class="description"><?php esc_html_e( 'Lookbooks status after images are imported.', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Data Update', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                </td>
            </tr>
            <tr>
                <th>
                    <label>
						<?php esc_html_e( 'Image Quantity', 'woo-lookbook' ) ?>
                    </label>
                </th>
                <td>
                    <a class="vi-ui button" target="_blank"
                       href="https://1.envato.market/mV0bM">
		                <?php esc_html_e( 'Upgrade This Feature', 'woo-lookbook' ) ?>
                    </a>
                    <p class="description"><?php esc_html_e( 'List images are get from API. The fewer quantity sync faster. Maximum:12', 'woo-lookbook' ) ?></p>
                </td>
            </tr>
        </table>
		<?php
		$html = ob_get_clean();
		$fields     = [
			'section_start' => [
				'accordion' => 1,
				'class'     => 'viwlb-instagram-synchronize-accordion',
				'title'     => esc_html__( 'Synchronize', 'woo-lookbook' ),
			],
			'section_end'   => [ 'accordion' => 1 ],
			'fields_html'   => $html,
		];
		$this->settings::villatheme_render_table_field( $fields );
		return '';
	}

}