<?php

/**
 * Class WOO_F_LOOKBOOK_Frontend_Shortcode
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Frontend_Shortcode {
	protected $settings;
	protected $run_shortcode;

	public function __construct() {
		$this->settings = WOO_F_LOOKBOOK_Data::get_instance();
		/*Register scripts*/
		add_action( 'wp_enqueue_scripts', array( $this, 'shortcode_scripts' ) );
		/*Overlay*/
		add_action( 'wp_footer', array( $this, 'overlay' ) );

		/*Auto update Instagram*/

		/*Register shortcode*/
		add_shortcode( 'woocommerce_lookbook', array( $this, 'register_shortcode' ) );
		add_shortcode( 'woocommerce_lookbook_slide', array( $this, 'register_shortcode_slide' ) );
		add_shortcode( 'woocommerce_lookbook_instagram', array( $this, 'register_shortcode_instagram' ) );
		add_action( 'wlb_lookbook_get_node', array( $this, 'get_node' ),10,3 );

		/*Show quick view*/
		add_action( 'wp_ajax_nopriv_wlb_get_product', array( $this, 'get_product' ) );
		add_action( 'wp_ajax_wlb_get_product', array( $this, 'get_product' ) );

		/*Show Instagram on quickview*/
		add_action( 'wp_ajax_nopriv_wlb_get_lookbook', array( $this, 'get_lookbook' ) );
		add_action( 'wp_ajax_wlb_get_lookbook', array( $this, 'get_lookbook' ) );

		/*Quick view*/
		add_action( 'woocommerce_lookbook_single_product_summary', array( $this, 'product_single_title' ), 5 );
		add_action( 'woocommerce_lookbook_single_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'woocommerce_lookbook_single_product_summary', array( $this, 'product_price' ), 10 );
		add_action( 'woocommerce_lookbook_single_product_summary', array( $this, 'product_short_desc' ), 20 );
		add_action( 'woocommerce_lookbook_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
		add_action( 'woocommerce_lookbook_single_product_summary', array( $this, 'read_more' ), 40 );

		/*Product on quickview Gallery*/
		add_action( 'woocommerce_lookbook_single_product_gallery', array( $this, 'product_single_title' ), 5 );
		add_action( 'woocommerce_lookbook_single_product_gallery', array( $this, 'product_price' ), 10 );
		add_action( 'woocommerce_lookbook_single_product_gallery', 'woocommerce_template_single_add_to_cart', 30 );

		add_action( 'wlb_elementor_register_scripts', array( $this, 'shortcode_scripts' ) );
		add_action( 'wlb_elementor_register_scripts', array( $this, 'localize_script' ) );
		add_action( 'wlb_elementor_get_inline_style', array( $this, 'get_inline_style' ) );
	}

	public function product_short_desc() {
		global $post;

		$short_description = $post->post_excerpt;

		if ( ! $short_description ) {
			return;
		}

		?>
        <div class="wlb-product-short-description">
			<?php echo wp_kses_post( $short_description ); // WPCS: XSS ok. ?>
        </div>
	<?php }

	/**
	 * Show Product price
	 */
	public function product_price() {
		global $product;
		?>
        <div class="wlb-product-price">
			<?php echo wp_kses_post( $product->get_price_html() ); ?>
        </div>
	<?php }

	/**
	 * Show product title
	 */
	public function product_single_title() {
		$url = get_the_permalink();
		the_title( '<h3 class="wlb-product-title entry-title"><a target="_blank" href="' . esc_url( $url ) . '">', '</a></h3>' );
	}

	/**
	 * Add remove link
	 */
	public function read_more() {
		if ( $this->settings->see_more() ) {
			return false;
		}
		global $post; ?>
        <div class="wlb-read-more">
            <a class="wlb-read-more-button"
               href="<?php the_permalink( $post->ID ) ?>"><?php esc_html_e( 'See more', 'woo-lookbook' ) ?></a>
        </div>
	<?php }

	/**
	 * Quick view Instagram
	 */
	public function get_lookbook() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		global $product, $post;
		$lookbook_id = isset( $_POST['lookbook_id'] ) ? sanitize_text_field( $_POST['lookbook_id'] ) : '';
		if ( $lookbook_id ) {
			$products = $this->get_data( $lookbook_id, 'product_id', array() );
			?>
            <div class="wlb-left">
				<?php echo do_shortcode( '[woocommerce_lookbook id="' . $lookbook_id . '"]' ) ?>
            </div>
            <div class="wlb-right wlb-product-galleries">
                <div class="wlb-instagram-controls">
					<?php $likes = $this->get_data( $lookbook_id, 'likes' );
					if ( $likes ) {
						?>
                        <div class="wlb-instagram-controls-likes">
							<?php echo esc_html( $likes ) ?>
                        </div>
					<?php }
					$comments = $this->get_data( $lookbook_id, 'comments' );
					if ( $comments ) {
						?>
                        <div class="wlb-instagram-controls-comments">
							<?php echo esc_html( $comments ) ?>
                        </div>
					<?php }
					$code = $this->get_data( $lookbook_id, 'code' );
					if ( $code && $this->settings->ins_link() ) {
						?>
                        <div class="wlb-instagram-controls-link">
							<?php $ins_url = 'https://www.instagram.com/p/' . $code ?>
                            <a target="_blank"
                               href="<?php echo esc_url( $ins_url ) ?>"><?php esc_html_e( 'View on Instagram', 'woo-lookbook' ) ?></a>
                        </div>
					<?php } ?>
                </div>
                <div class="wlb-instagram-description">
					<?php echo esc_html( get_post_field( 'post_title', $lookbook_id ) ) ?>
                </div>
				<?php if ( is_array( $products ) && count( $products ) ) { ?>
					<?php foreach ( $products as $product_id ) {

						$product = wc_get_product( $product_id );
						// @codingStandardsIgnoreLine
						$post    = get_post( $product_id );
						/**
						 * woocommerce_single_product_summary hook.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 */
						?>

                        <div class="wlb-product-gallery">
							<?php
							do_action( 'woocommerce_lookbook_single_product_gallery' ); ?>
                        </div>
						<?php
					} ?>

					<?php
				} ?>

            </div>

		<?php }
		die;
	}

	/**
	 * Quick view
	 */
	public function get_product() {
		check_ajax_referer( 'viwlb-nonce', 'nonce' );

		global $product, $post;
		$prod_id = isset( $_POST['product_id'] ) ? sanitize_text_field( $_POST['product_id'] ) : '';
		$product = wc_get_product( $prod_id );
		// @codingStandardsIgnoreLine
		$post    = get_post( $prod_id );
		?>
        <div class="wlb-left">
			<?php if ( has_post_thumbnail( $post ) ) {
				$image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
				echo wp_kses_post( apply_filters( 'woocommerce_single_product_image_html', sprintf( '%s', $image ), $post->ID ) );
			}else {
                echo wp_kses_post( wc_placeholder_img() );
			}?>
        </div>
        <div class="wlb-right">
			<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_lookbook_single_product_summary' ); ?>
        </div>
		<?php
		die;
	}

	/**
	 * Init Overlay
	 */
	public function overlay() {
		if ( ! $this->run_shortcode ) {
			return;
		}
		wp_enqueue_script( 'wc-add-to-cart-variation' );
		?>
        <div class="woo-lookbook-quickview" style="display: none">
            <div class="woo-lookbook-quickview-inner single-product">
                <div class="wlb-overlay"></div>
                <div class="wlb-product-wrapper">
					<?php echo wp_kses_post( $this->loading_html() ); ?>
                    <div class="wlb-product-frame" style="display: none">
                        <div class="wlb-product-data product">

                        </div>
						<?php if ( ! $this->settings->enable_close_button() ) { ?>
                            <span class="wlb-close"></span>
						<?php } ?>
                        <div class="wlb-controls">
                            <span class="wlb-controls-next"></span>
                            <span class="wlb-controls-previous"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wlb-added">
			<?php echo esc_html__( 'Product added successful', 'woo-lookbook' ) ?>
        </div>
	<?php }

	/**
	 * Load loading html
	 * @return mixed
	 */
	private function loading_html() {
		ob_start(); ?>
        <div class="wlb-rotating-plane wlb-loading"></div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Shortcode scripts
	 */
	public function shortcode_scripts() {
		//libs
		wp_register_style( 'woocommerce-vi-flexslider', WOO_F_LOOKBOOK_CSS . 'vi_flexslider.min.css', array(), WOO_F_LOOKBOOK_VERSION );
		wp_register_script( 'jquery-slides', WOO_F_LOOKBOOK_JS . 'jquery.slides.min.js', array( 'jquery' ), '3.0.4', false );
		wp_register_script( 'jquery-vi-flexslider', WOO_F_LOOKBOOK_JS . 'jquery.vi_flexslider.min.js', array( 'jquery' ), '2.7.0', false );

		$suffix = WP_DEBUG ? '' : '.min';
		//exe
		wp_register_script( 'woo-lookbook', WOO_F_LOOKBOOK_JS . 'woo-lookbook'. $suffix .'.js', array( 'jquery' ), WOO_F_LOOKBOOK_VERSION, true );
		wp_register_style( 'woo-lookbook', WOO_F_LOOKBOOK_CSS . 'woo-lookbook'. $suffix .'.css', array(), WOO_F_LOOKBOOK_VERSION );
	}

	public function get_inline_style() {
		/*Node Custom CSS*/
		$icon_background_color  = $this->settings->get_icon_background_color();
		$icon_color             = $this->settings->get_icon_color();
		$icon_border_color      = $this->settings->get_icon_border_color();
		$title_color            = $this->settings->get_title_color();
		$title_background_color = $this->settings->get_title_background_color();
		$css                    = ".woo-lookbook .woo-lookbook-inner .wlb-item .wlb-pulse{
			background-color:{$icon_background_color};
			border-color:{$icon_border_color};
			color:{$icon_color};
		}
		.woo-lookbook .woo-lookbook-inner .wlb-item .wlb-dot{
			border-color:{$icon_border_color};
		}
		.woo-lookbook .woo-lookbook-inner .wlb-item.default{
			background-color:{$icon_background_color};
			color:{$icon_color};
		}
		.woo-lookbook .woo-lookbook-inner .wlb-item .wlb-pin:after{
			background-color:{$icon_color};
		}
		.woo-lookbook .woo-lookbook-inner .wlb-item .wlb-pin{
			background-color:{$icon_background_color};
		}
		.woo-lookbook .wlb-speech-bubble{
			background-color: {$title_background_color};
			color:{$title_color};
		}
		.woo-lookbook .wlb-speech-bubble:after{
			border-top-color: {$title_background_color};
		}
		";

		/*Quick view Custom CSS*/
		if ( ! $this->settings->get_params( 'link_redirect' ) ) {
			$text_color       = $this->settings->get_text_color();
			$background_color = $this->settings->get_background_color();
			$border_radius    = $this->settings->get_border_radius() . 'px';
			$css              .= ".woo-lookbook-quickview-inner .wlb-product-wrapper .wlb-product-frame{
				border-radius:{$border_radius};
				background-color:{$background_color};
				color:{$text_color};
			}
			
			";
		}
		$custom_css = $this->settings->get_custom_css();
		if ( $custom_css ) {
			$css .= $custom_css;
		}
		wp_add_inline_style( 'woo-lookbook', $css );
	}

	public function localize_script() {
		$data_slide = array(
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
			'nonce'      => wp_create_nonce( 'viwlb-nonce' ),
			'width'      => $this->settings->get_params( 'slide_width', 1170 ),
			'height'     => $this->settings->get_params( 'slide_height', 600 ),
			'navigation' => $this->settings->get_params( 'slide_navigation' ) ? true : false,
			'effect'     => $this->settings->get_params( 'slide_effect' )  ? 'fade' : 'slide',
			'pagination' => $this->settings->get_params( 'slide_pagination' ) ? true : false,
			'auto'       => $this->settings->get_params( 'slide_auto_play' ) ? true : false,
			'time'       => $this->settings->get_params(  'slide_time', 5000 ),
		);
		wp_localize_script( 'woo-lookbook', '_woocommerce_lookbook_params', $data_slide );
	}

	public function enqueue_scripts() {
//		wp_enqueue_script( 'flexslider' );
//		wp_enqueue_script( 'wc-single-product' );
		wp_enqueue_script( 'jquery-slides' );
		wp_enqueue_script( 'jquery-vi-flexslider' );
		wp_enqueue_style( 'woocommerce-vi-flexslider' );

		wp_enqueue_script( 'woo-lookbook' );
		wp_enqueue_style( 'woo-lookbook' );

		$this->get_inline_style();
		$this->localize_script();
//		add_action( 'wp_footer', array( $this, 'overlay' ) );
	}

	/**
	 * @param $atts
	 */
	public function register_shortcode_instagram( $atts ) {
		$this->enqueue_scripts();
		$this->run_shortcode = true;
		extract( shortcode_atts(
			array(
				'style' => $this->settings->get_params('ins_display') ? 'carousel' : 'gallery',
				'row'   => $this->settings->get_params('ins_items_per_row'),
				'limit' => $this->settings->get_params('ins_display_limit'),
			), $atts
		));
		$posts = get_posts( [
			'numberposts'      => $limit,
			'post_type'   => 'woocommerce-lookbook',
			'fields'      => 'ids',
			'post_status' => ['publish'],
			'meta_query'  => array(
				array(
					'key'     => 'wlb_params',
					'value'   => 's:9:"instagram";s:1',
					'compare' => 'LIKE'
				)
			)
		] );
		if ( ! is_array( $posts ) || empty( $posts ) ) {
			return '';
		}
		return wc_get_template_html( 'shortcode-instagram.php',
			array(
				'lb_ids' => $posts,
				'style' => $style,
				'row' => $row,
				'limit' => $limit,
			),
			'woo-lookbook' . DIRECTORY_SEPARATOR,
			WOO_F_LOOKBOOK_TEMPLATES );
	}

	/**
	 * @param $atts
	 */
	public function register_shortcode_slide( $atts ) {
		$this->enqueue_scripts();
		$this->run_shortcode = true;

		$atts = shortcode_atts(
			array(
				'id' => '',
			), $atts
		);

		$ids = $atts['id'];
		if ( ! $ids ) {
			return false;
		}

		$ids = array_filter( explode( ',', trim( $ids ) ) );
		if ( count( $ids ) < 1 ) {
			return false;
		}

		ob_start(); ?>
        <div class="wlb-lookbook-slide">
			<?php foreach ( $ids as $id ) {
				$image_id = $this->get_data( $id, 'image' );

				$products = $this->get_data( $id, 'product_id' );
				$pos_x    = $this->get_data( $id, 'x' );
				$pos_y    = $this->get_data( $id, 'y' );

				$img_url = wp_get_attachment_url( $image_id );

				if ( ! $img_url ) {
					continue;
				} ?>
                <div class="woo-lookbook wlb-lookbook-item-wrapper">
                    <div class="woo-lookbook-inner">
                        <img src="<?php echo esc_url( $img_url ) ?>" class="wlb-image"/>
						<?php if ( count( $products ) && is_array( $products ) ) {
							foreach ( $products as $k => $product ) {
								if ( ! $product ) {
									continue;
								}
								$this->get_node( $product, $pos_x[ $k ], $pos_y[ $k ] ) ;
								?>
							<?php }
						} ?>
                    </div>
                </div>
			<?php } ?>
        </div>
		<?php $html = ob_get_clean();

		return $html;
	}

	/*
	 *
	 */
	/**
	 * Shortcode HTML
	 *
	 * @param $atts
	 *
	 * @return bool|string
	 */
	public function register_shortcode( $atts ) {
		$this->enqueue_scripts();
		$this->run_shortcode = true;
		$atts                = shortcode_atts( array( 'id' => '', ), $atts );

		$ids = $atts['id'];
		if ( ! $ids ) {
			return false;
		}

		$ids = array_filter( explode( ',', trim( $ids ) ) );
		if ( count( $ids ) < 1 ) {
			return false;
		}

		ob_start();

		foreach ( $ids as $id ) {
			$image_id = $this->get_data( $id, 'image' );

			$products = $this->get_data( $id, 'product_id' );
			$pos_x    = $this->get_data( $id, 'x' );
			$pos_y    = $this->get_data( $id, 'y' );
			$img_url = wp_get_attachment_url( $image_id );

			if ( ! $img_url ) {
				continue;
			} ?>
            <div class="woo-lookbook wlb-lookbook-item-wrapper">
                <div class="woo-lookbook-inner">
                    <img src="<?php echo esc_url( $img_url ) ?>" class="wlb-image"/>
					<?php if ( is_array( $products ) && count( $products ) ) {
						foreach ( $products as $k => $product ) {
							if ( ! $product ) {
								continue;
							}
							 $this->get_node( $product, $pos_x[ $k ], $pos_y[ $k ] ) ;
							?>
						<?php }
					} ?>
                </div>
            </div>
            <div class="wlb-clearfix"></div>
		<?php }
		$html = ob_get_clean();

		return $html;
	}

	/**
	 * Make mark on image
	 *
	 * @param $product_id
	 * @param $pos_x
	 * @param $pos_y
	 *
	 * @return mixed
	 */
	public function get_node( $product_id, $pos_x, $pos_y ) {
		$product = wc_get_product( $product_id );
		if ( ! is_object( $product ) || $product->get_status() != 'publish' ) {
			return;
		}
		$link = '';
		$product_url = $product->get_permalink();
		if ( $this->settings->get_params( 'link_redirect' ) ) {
			if ( $product->is_type( 'external' ) && $this->settings->get_params(  'external_product' ) ) {
				$product_url = get_post_meta( $product->get_id(), '_product_url', '#' )?:$product_url;
			}
			$link = '<a target="_blank" class="wlb-link" href="' . esc_url( $product_url ) . '"></a>';
			$class = 'wlb-redirect';
		} else {
			$class = 'wlb-ajax';
		}

		/*Make title HTML*/
		$title_html = '';
		if ( ! $this->settings->get_params(  'hide_title' ) ) {
			$title = get_post_field( 'post_title', $product_id );
			if ( $title ) {
				$title_html = '<div class="wlb-speech"><div class="wlb-speech-bubble">' . esc_html( $title ) . '</div></div>';
			}
		}

		?>
        <div class="wlb-item default <?php echo esc_attr( $class ) ?>" data-pid="<?php echo esc_attr( $product_id ) ?>"
             style="left: <?php echo esc_attr( $pos_x ); ?>%;top:<?php echo esc_attr( $pos_y ) ?>%;"><?php echo wp_kses_post( $link ) ?>
            +<?php echo wp_kses_post( $title_html ) ?></div>
		<?php
	}

	/**
	 * Get Post Meta
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	private function get_data( $post_id, $field, $default = '' ) {
		return $this->settings::get_lookbook_data($post_id,$field,$default);
	}

}