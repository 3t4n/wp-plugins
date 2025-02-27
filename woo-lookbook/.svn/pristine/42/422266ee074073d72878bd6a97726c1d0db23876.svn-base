<?php

/*
Class Name: WOO_F_LOOKBOOK_Admin_Lookbook
Author: Andy Ha (support@villatheme.com)
Author URI: http://villatheme.com
Copyright 2017 villatheme.com. All rights reserved.
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Admin_Lookbook {
	protected $settings;

	function __construct() {
		$this->settings = WOO_F_LOOKBOOK_Data::get_instance();
		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'save_post', array( $this, 'save_metabox' ), 10, 2 );
		add_action( 'admin_enqueue_scripts', array( $this, 'product_scripts' ), 10, 2 );

		/*Search product*/
		add_action( 'wp_ajax_wlb_search_product', array( $this, 'search_product' ) );

		/*Show shortcode*/
		add_action( 'edit_form_before_permalink', array( $this, 'show_shortcode' ) );

		/*Add column*/
		add_filter( 'manage_woocommerce-lookbook_posts_columns', array( $this, 'define_columns' ) );
		add_action( 'manage_woocommerce-lookbook_posts_custom_column', array( $this, 'lookbook_columns' ), 10, 2 );

		/*Instagram*/
		add_action( 'manage_posts_extra_tablenav', array( $this, 'sync_button' ) );

		/*Sync Instagram*/
		add_action( 'wp_ajax_wlb_sync_instagram', array( $this, 'sync_instagram' ) );
		add_action( 'wp_ajax_wlb_change_status', array( $this, 'change_status' ) );
	}

	/**
	 * Change post status
	 */
	public function change_status() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			die;
		}
		$post_id     =  isset( $_POST['p_id'] ) ? sanitize_text_field( $_POST['p_id'] ) : '';
		$post_status =  isset( $_POST['p_status'] ) ? sanitize_text_field( $_POST['p_status'] ) : '';
		if ( $post_id ) {
			switch ( $post_status ) {
				case 1:
					$status = 'publish';
					break;
				case 2:
					$status = 'draft';
					break;
				default:
					$status = 'pending';
			}
			$post_arg = array(
				'ID'          => $post_id,
				'post_status' => $status,
			);
			wp_update_post( $post_arg );
		}
		die;
	}

	/**
	 * Add custom columns
	 *
	 * @param $column_name
	 * @param $post_id
	 */
	public function lookbook_columns( $column_name, $post_id ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		switch ( $column_name ) {
			case 'wlb_thumbnail':
				if ( $this->get_data( $post_id, 'image' ) ) {
					?>
                    <img src="<?php echo esc_url( wp_get_attachment_image_url( $this->get_data( $post_id, 'image' ) ) ) ?>"/>
					<?php
					//echo $this->get_data( $post_id, 'code' );
				}
				break;
			case 'wlb_shortcode':
				if ( $this->get_data( $post_id, 'instagram' ) ) {
					?>
                    <textarea type="text wlb-input" class="wlb-shortcode short-text" readonly>[woocommerce_lookbook_instagram]</textarea>
					<?php
				} else { ?>
                    <textarea type="text wlb-input" class="wlb-shortcode short-text"
                              readonly>[woocommerce_lookbook id="<?php echo esc_attr( $post_id ) ?>"]</textarea>
				<?php }
				break;
			case 'wlb_instagram':
				if ( $this->get_data( $post_id, 'instagram', 0 ) ) {
					echo '<i class="check icon wlb-green"></i>';
				}
				break;
			default:
				$post_status = get_post_field( 'post_status', $post_id );
				?>
                <div class="vi-ui mini buttons" data-id="<?php echo esc_attr( $post_id ) ?>">
                    <span data-val="1"
                          class="vi-ui button <?php echo 'publish' == $post_status ? 'green' : '' ?>"><?php echo esc_html__( 'Publish', 'woo-lookbook' ) ?></span>
                    <span data-val="0"
                          class="vi-ui button <?php echo 'pending' == $post_status ? 'orange' : '' ?>"><?php echo esc_html__( 'Pending', 'woo-lookbook' ) ?></span>
                    <span data-val="2"
                          class="vi-ui button <?php echo 'draft' == $post_status ? 'grey' : '' ?>"><?php echo esc_html__( 'Draft', 'woo-lookbook' ) ?></span>
                </div>
			<?php
		}
	}

	/**
	 * Get Post Meta
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	private function get_data( $post_id, $field, $default = '' ) {


		if ( isset( $this->data[ $post_id ] ) && $this->data[ $post_id ] ) {
			$params = $this->data[ $post_id ];
		} else {
			$this->data[ $post_id ] = get_post_meta( $post_id, 'wlb_params', true );
			$params                 = $this->data[ $post_id ];
		}
		if ( isset( $params[ $field ] ) && $field ) {
			return $params[ $field ];
		} else {
			return $default;
		}
	}

	/**
	 * Define Status button column
	 *
	 * @param $col
	 *
	 * @return mixed
	 */
	public function define_columns( $col ) {
		$date = $col['date'];
		unset( $col['date'] );
		if ( current_user_can( 'manage_options' ) ) {
			$col['wlb_instagram']    = esc_html__( 'Instagram', 'woo-lookbook' );
			$col['wlb_thumbnail']    = esc_html__( 'Image', 'woo-lookbook' );
			$col['wlb_shortcode']    = esc_html__( 'Shortcode', 'woo-lookbook' );
			$col['wlb_quick_status'] = esc_html__( 'Status', 'woo-lookbook' );
			$col['date']             = $date;
		}

		return $col;
	}

	/**
	 * Sync Ajax
	 */
	public function sync_instagram() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {
			die;
		}
		WOO_F_LOOKBOOK_Admin_Instagram::import(false);
		die;
	}

	/**
	 * Show button
	 *
	 * @param $which
	 */
	public function sync_button() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		$screen = get_current_screen();
		if ( 'edit-woocommerce-lookbook' == $screen->id ) { ?>
            <div class="alignleft actions">
                <span class="vi-ui mini button instagram wlb-instagram-sync"><i
                            class="instagram icon"></i><?php echo esc_html__( 'Sync Instagram', 'woo-lookbook' ) ?></span>
            </div>
		<?php }
	}

	/**
	 * Show shortcode
	 *
	 * @param $post
	 */
	public function show_shortcode( $post ) {
		$screen = get_current_screen();
		if ( 'woocommerce-lookbook' == get_post_type() && 'woocommerce-lookbook' == $screen->id ) {
			?>
            <div class="wlb-shortcode">
                <label>
					<?php echo esc_html__( 'Shortcode', 'woo-lookbook' ) ?>
                    <input type="text" size="30" value='[woocommerce_lookbook id="<?php echo esc_attr( $post->ID ) ?>"]'
                           readonly/>
                </label>
            </div>
		<?php }
	}

	/**
	 * Select 2 search product
	 */
	public function search_product() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		if ( ! current_user_can( 'manage_woocommerce' ) ) {
			return;
		}

		$keyword = isset( $_GET['keyword'] ) ? sanitize_text_field( $_GET['keyword'] ) : '' ;

		if ( empty( $keyword ) ) {
			die();
		}
		$products = wc_get_products([
			'status'   =>'publish',
			'type'     => array( 'simple', 'external', 'variable' ),
			'limit'    => 50,
			's'              => $keyword,
		]);
		$found_products = array();
		if (!empty($products)) {
			foreach ($products as $product){
				$product = wc_get_product($product);
				$product_id = $product->get_id();
				$product_title = $product->get_title();
				if ($product->is_type('variable')){
					$product_title .= ' (' . esc_html__( 'Variable #', 'woocommerce-lookbook' ) . esc_html( $product_id ) . ')';
				}
				$found_products[] = [
					'id'   => $product_id,
					'text' => $product_title
				];
			}
		}
		wp_send_json( $found_products );
	}

	/**
	 * Load CSS and JS in product edit page
	 */
	public function product_scripts() {
		$screen = get_current_screen();
		if ( 'woocommerce-lookbook' == $screen->id ) {
			wp_enqueue_media();
			wp_enqueue_script( 'jquery-ui-draggable' );
			$this->settings::enqueue_style(
				array(
					'woo-lookbook-button',
					'select2',
					'woo-lookbook-admin-metabox',
				),
				array(
					'button',
					'select2',
					'woo-lookbook-admin-metabox',
				),
				array(1,1,0)
			);
			$this->settings::enqueue_script(
				array( 'select2','woo-lookbook-admin-metabox' ),
				array( 'select2','woo-lookbook-admin-metabox' ),
				array( 1,0 ),
			);
            wp_localize_script( 'woo-lookbook-admin-metabox', '_wlb_params', array(
				'nonce' => wp_create_nonce( 'viwlb-nonce' ),
			) );
		}
		if ( 'edit-woocommerce-lookbook' == $screen->id ) {
			$this->settings::enqueue_style(
				array(
					'woo-lookbook-button',
					'woo-lookbook-icon',
					'woo-lookbook-edit',
				),
				array(
					'button',
					'icon',
					'woo-lookbook-admin-lookbook',
				),
				array(1,1,0)
			);

			$this->settings::enqueue_script(
				array( 'woo-lookbook-admin-lookbook' ),
				array( 'woo-lookbook-admin-lookbook' ),
				array( 0 ),
			);
			// Localize the script with new data
			$translation_array = array(
				'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
				'nonce'      => wp_create_nonce( 'viwlb-nonce' ),
				'sync_title' => esc_html__( 'Sync Instagram', 'woo-lookbook' ),
				'loading'    => esc_html__( 'Loading', 'woo-lookbook' ),
			);
			wp_localize_script( 'woo-lookbook-admin-lookbook', '_wlb_params', $translation_array );
		}
	}

	/**
	 * Adds the meta box.
	 */
	public function add_metabox() {
		add_meta_box(
			'woo-lookbook',
			esc_html__( 'Image', 'woo-lookbook' ),
			array( $this, 'render_metabox' ),
			'woocommerce-lookbook',
			'normal',
			'high'
		);
		add_meta_box(
			'woo-lookbook-sidebar',
			esc_html__( 'Node', 'woo-lookbook' ),
			array( $this, 'render_metabox_node' ),
			'woocommerce-lookbook',
			'side',
			'high'
		);

	}

	public function render_metabox_node( $post ) { ?>
        <div class="wlb-table">

			<?php
			$product_ids = $this->get_data( $post->ID, 'product_id' );
			$pos_x       = $this->get_data( $post->ID, 'x' );
			$pos_y       = $this->get_data( $post->ID, 'y' );
			if ( is_array( $product_ids ) && count( $product_ids ) ) {
				foreach ( $product_ids as $k => $product_id ) {
					if ( $k > 1 ) {
						break;
					}
					if ( ! $product_id ) {
						continue;
					}
					$product = wc_get_product( $product_id );
					?>
                    <div class="wlb-data wlb-item-<?php echo esc_attr( $k ) ?>" data-id="<?php echo esc_attr( $k ) ?>">

                        <div class="wlb-field">
                            <select class="wlb-product wlb-product-search" name="wlb_params[product_id][]"
                                    data-placeholder="<?php esc_html_e( 'Search your product', 'woo-lookbook' ) ?>">
                                <option value="<?php echo esc_attr( $product->get_id() ) ?>"
                                        selected><?php echo esc_html( $product->get_title() ) ?></option>
                            </select>
                        </div>

                        <div class="wlb-field">
							<?php esc_html_e( 'X', 'woo-lookbook' ) ?>
                            <input class="wlb-x" type="number" name="wlb_params[x][]"
                                   value="<?php echo esc_attr( $pos_x[ $k ] ) ?>" min="0" max="100" step="0.01"/>
							<?php esc_html_e( 'Y', 'woo-lookbook' ) ?>
                            <input class="wlb-y" type="number" name="wlb_params[y][]"
                                   value="<?php echo esc_attr( $pos_y[ $k ] ) ?>" min="0" max="100" step="0.01"/>
                        </div>
                        <span class="wlb-remove">x</span>

                    </div>
				<?php }
			} ?>
        </div>
        <div class="wlb-error"></div>
        <div>
			<?php esc_html_e( 'You are using free version. You add only 2 nodes.', 'woo-lookbook' ) ?>
            <p>
                <a class="vi-ui wlb-add-new button blue button-primary" href="https://1.envato.market/mV0bM">
					<?php esc_html_e( 'Upgrade Premium', 'woo-lookbook' ) ?>
                </a>
            </p>
        </div>
        <p>
			<span class="vi-ui wlb-add-new button green button-primary">
				<?php esc_html_e( 'Add node', 'woo-lookbook' ) ?>
			</span>
        </p>
	<?php }

	/**
	 * Renders the meta box.
	 */
	public function render_metabox( $post ) { ?>

		<?php

		// Get WordPress' media upload URL
		$upload_link = esc_url( get_upload_iframe_src( 'image', $post->ID ) );

		// See if there's a media id already saved as post meta
		$your_img_id = $this->get_data( $post->ID, 'image' );

		// Get the image src
		$your_img_src = wp_get_attachment_image_src( $your_img_id, 'full' );

		// For convenience, see if the array is valid
		$you_have_img = is_array( $your_img_src );
		$product_ids  = $this->get_data( $post->ID, 'product_id' );
		$pos_x        = $this->get_data( $post->ID, 'x' );
		$pos_y        = $this->get_data( $post->ID, 'y' );
		?>

        <!-- Your image container, which can be manipulated with js -->
        <div class="wlb-image-container">
			<?php

			if ( is_array( $product_ids ) && count( $product_ids ) ) {
				foreach ( $product_ids as $k => $product_id ) {
					if ( $k > 1 ) {
						break;
					}
					$x = isset( $pos_x[ $k ] ) ? $pos_x[ $k ] : 0;
					$y = isset( $pos_y[ $k ] ) ? $pos_y[ $k ] : 0;
					?>
                    <span class="wlb-node wlb-node-<?php echo esc_attr( $k ) ?>" data-id="<?php echo esc_attr( $k ) ?>"
                          style="left: <?php echo esc_attr( $x ) ?>%;top: <?php echo esc_attr( $y ) ?>%">+</span>
				<?php }
			} ?>
			<?php if ( $you_have_img ) : ?>
                <img class="wlb-image" src="<?php echo esc_url( $your_img_src[0] ) ?>" alt="" style="max-width:100%;"/>
			<?php endif; ?>
        </div>
        <!-- Your add & remove image links -->
        <div class="hide-if-no-js">
            <p>
                <a class="vi-ui button green wlb-upload-img <?php if ( $you_have_img ) {
					echo 'hidden';
				} ?>" href="<?php echo esc_url( $upload_link ) ?>">
					<?php esc_html_e( 'Add Image', 'woo-lookbook' ) ?>
                </a>
                <a class="vi-ui button red wlb-delete-img <?php if ( ! $you_have_img ) {
					echo 'hidden';
				} ?>" href="#">
					<?php esc_html_e( 'Remove this image', 'woo-lookbook' ) ?>
                </a>
            </p>
        </>
        <!-- A hidden input to set and post the chosen image id -->
        <input class="wlb-image-data" name="wlb_params[image]" type="hidden"
               value="<?php echo esc_attr( $your_img_id ); ?>"/>
        <input name="wlb_params[instagram]" type="hidden"
               value="<?php echo esc_attr( $this->get_data( $post->ID, 'instagram' ) ); ?>"/>
        <input name="wlb_params[code]" type="hidden"
               value="<?php echo esc_attr( $this->get_data( $post->ID, 'code' ) ); ?>"/>
        <input name="wlb_params[date]" type="hidden"
               value="<?php echo esc_attr( $this->get_data( $post->ID, 'date' ) ); ?>"/>
        <input name="wlb_params[comments]" type="hidden"
               value="<?php echo esc_attr( $this->get_data( $post->ID, 'comments' ) ); ?>"/>
        <input name="wlb_params[likes]" type="hidden"
               value="<?php echo esc_attr( $this->get_data( $post->ID, 'likes' ) ); ?>"/>

		<?php

		// Add nonce for security and authentication.
		wp_nonce_field( 'wlb_metabox_save', '_wlb_nonce' );
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
		if ( ! isset( $_POST['_wlb_nonce'] )|| ! wp_verify_nonce( wc_clean( wp_unslash( $_POST['_wlb_nonce'] ) ), 'wlb_metabox_save' ) ) {
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
		if ( !is_array( $data ) ) {
			$data = array();
		}
		update_post_meta( $post_id, 'wlb_params', $data );

	}


}