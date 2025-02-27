<?php

/*
Class Name: WOO_F_LOOKBOOK_Admin_Product
Author: Andy Ha (support@villatheme.com)
Author URI: http://villatheme.com
Copyright 2017 villatheme.com. All rights reserved.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Admin_Product {
	protected $settings;
	function __construct() {
		$this->settings = WOO_F_LOOKBOOK_Data::get_instance();
		add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'product_scripts' ), 10, 2 );

		/*Search product*/
		add_action( 'wp_ajax_wlb_search_lookbook', array( $this, 'search_lookbook' ) );

		/*Add tab in product edit page*/
		add_filter( 'woocommerce_product_data_tabs', array( $this, 'woocommerce_product_data_tabs' ) );
		add_action( 'woocommerce_product_data_panels', array( $this, 'woocommerce_product_data_panels' ) );
	}

	public function woocommerce_product_data_panels() {
		global $post;
		$position       = $this->get_data( $post->ID, 'position', 0 );
		$shortcode_type = $this->get_data( $post->ID, 'shortcode_type', 0 );
		$enable         = $this->get_data( $post->ID, 'enable', 0 );
		$lookbooks      = $this->get_data( $post->ID, 'lookbooks', array() );
		$align          = $this->get_data( $post->ID, 'align', 0 );

		?>
        <div id="lookbook_product_data" class="panel woocommerce_options_panel hidden">
            <table class="table" cellspacing="5" cellpadding="5" width="100%">
                <tbody>
                <tr>
                    <td align="left" width="20%"><?php esc_html_e( 'Enable', 'woo-lookbook' ) ?></td>
                    <td>
                        <input name="wlb_params[enable]" type="checkbox" value="1" <?php checked( $enable, 1 ) ?> />
                        <div class="wlb-description"><?php esc_html_e( 'Enable to display Lookbook on the single product page', 'woo-lookbook' ) ?></div>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="20%"><?php esc_html_e( 'Position', 'woo-lookbook' ) ?></td>
                    <td>
                        <select name="wlb_params[position]" class="select short">
                            <option value="0" <?php selected( $position, 0 ) ?>><?php esc_html_e( 'Above Description Tab', 'woo-lookbook' ) ?></option>
                            <option value="1" <?php selected( $position, 1 ) ?>><?php esc_html_e( 'Below Description Tab', 'woo-lookbook' ) ?></option>
                        </select>
                        <div class="wlb-description"><?php esc_html_e( 'Select lookbook position.', 'woo-lookbook' ) ?></div>

                    </td>
                </tr>
                <tr>
                    <td align="left" width="150px"><?php esc_html_e( 'Shortcode type', 'woo-lookbook' ) ?></td>
                    <td>
                        <select name="wlb_params[shortcode_type]" class="select short">
                            <option value="0" <?php selected( $shortcode_type, 0 ) ?>><?php esc_html_e( 'Single Image', 'woo-lookbook' ) ?></option>
                            <option value="1" <?php selected( $shortcode_type, 1 ) ?>><?php esc_html_e( 'Slides', 'woo-lookbook' ) ?></option>
                        </select>
                        <div class="wlb-description"><?php esc_html_e( 'Select how lookbooks should be played.', 'woo-lookbook' ) ?></div>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="150px"><?php esc_html_e( 'Lookbooks', 'woo-lookbook' ) ?></td>
                    <td>
                        <select name="wlb_params[lookbooks][]" multiple="multiple" class="wlb-lookbook-search"
                                style="width: 50%;">
							<?php
							if ( is_array( $lookbooks ) && count( array_filter( $lookbooks ) ) ) {
								foreach ( $lookbooks as $k => $lookbook ) {
									if ( $k > 1 ) {
										break;
									}
									if ( get_post_type( $lookbook ) == 'woocommerce-lookbook' ) { ?>
                                        <option selected
                                                value="<?php echo esc_attr( $lookbook ) ?>"><?php echo esc_attr( get_post_field( 'post_title', $lookbook ) ); ?></option>
									<?php }
								}
								?>
							<?php }
							?>
                        </select>
                        <div class="wlb-description"><?php esc_html_e( 'Select lookbooks to display. You add only 2 lookbooks. To use unlimited', 'woo-lookbook' ) ?>
                            <a target="_blank" href="https://1.envato.market/mV0bM">
								<?php esc_html_e( 'Update this feature', 'woo-lookbook' ) ?>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="150px"><?php esc_html_e( 'Align', 'woo-lookbook' ) ?></td>
                    <td>
                        <select name="wlb_params[align]" class="select short">
                            <option value="0" <?php selected( $align, 0 ) ?>><?php esc_html_e( 'Center', 'woo-lookbook' ) ?></option>
                            <option value="1" <?php selected( $align, 1 ) ?>><?php esc_html_e( 'Left', 'woo-lookbook' ) ?></option>
                            <option value="2" <?php selected( $align, 2 ) ?>><?php esc_html_e( 'Right', 'woo-lookbook' ) ?></option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
		<?php
		wp_nonce_field( 'wlb_product_metabox_save', '_wlb_nonce' );
	}

	/**
	 * Init lable tab
	 *
	 * @param $tab
	 *
	 * @return mixed
	 */
	public function woocommerce_product_data_tabs( $tab ) {
		$tab['lookbook'] = array(
			'label'    => esc_html__( 'LookBook', 'woo-lookbook' ),
			'target'   => 'lookbook_product_data',
			'class'    => array(),
			'priority' => 71,
		);

		return $tab;
	}

	/**
	 * Select 2 search product
	 */
	public function search_lookbook() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			die();
		}

		$keyword = isset( $_GET['keyword'] ) ? sanitize_text_field( $_GET['keyword'] ) : '';

		if ( empty( $keyword ) ) {
			die();
		}
		$posts = get_posts([
			'post_type'   => 'woocommerce-lookbook',
			'posts_per_page' => 50,
			's'              => $keyword
		]);
		$found_products = array();
		if ( !empty($posts) ) {
			foreach ($posts as $lb){
				$product          = array(
					'id'   => $lb->ID,
					'text' => $lb->post_title
				);
				$found_products[] = $product;
			}
		}
		wp_send_json( $found_products );
		die;
	}

	/**
	 * Load CSS and JS in product edit page
	 */
	public function product_scripts() {

		$screen = get_current_screen();
		if ( 'product' == get_post_type() && 'product' == $screen->id ) {
			wp_enqueue_media();
			$this->settings::enqueue_style(
				array( 'select2','woo-lookbook-admin-product' ),
				array( 'select2','woo-lookbook-admin-product' ),
				array( 1,0 ),
			);
			$this->settings::enqueue_script(
				array( 'select2','woo-lookbook-admin-product' ),
				array( 'select2','woo-lookbook-admin-product' ),
				array( 1,0 ),
			);
            wp_localize_script( 'woo-lookbook-admin-product', '_wlb_params', array(
				'nonce' => wp_create_nonce( 'viwlb-nonce' ),
			) );
		}
	}

	/**
	 * Handles saving the meta box.
	 *
	 * @param int $post_id Post ID.
	 * @param WP_Post $post Post object.
	 *
	 * @return null
	 */
	public function save_metabox( $post_id, $post ) {
		// Check if nonce is set.
		if ( ! isset( $_POST['_wlb_nonce']  ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wlb_nonce'] ) ), 'wlb_product_metabox_save' ) ) {
			return;
		}

		// Check if user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// Check if not an autosave.
		if ( wp_is_post_autosave( $post_id ) ) {
			return;
		}

		// Check if not a revision.
		if ( wp_is_post_revision( $post_id ) ) {
			return;
		}

		if ( ! isset( $_POST['wlb_params'] ) ) {
			return;
		}
		$data = wc_clean( wp_unslash( $_POST['wlb_params'] ) );
		if ( is_array( $data ) ) {
			array_walk_recursive( $data, 'sanitize_text_field' );
		} else {
			$data = array();
		}
		if ( isset( $data['lookbooks'] ) && ( is_array( $data['lookbooks'] ) || is_object( $data['lookbooks'] ) ) ) {
			if ( count( $data['lookbooks'] ) > 1 ) {
				$data['lookbooks'] = array_slice( $data['lookbooks'], 0, 2 );
			}
		}
		update_post_meta( $post_id, 'wlb_params', $data );
	}

	/**
	 * Get Post Meta
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	private function get_data( $post_id, $field, $default = '' ) {
		return $this->settings::get_lookbook_data($post_id, $field, $default);
	}


}