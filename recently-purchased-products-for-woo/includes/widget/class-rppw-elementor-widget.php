<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class RPPW_Elementor_Widget extends \Elementor\Widget_Base {
	
	
	public function get_name() {
		return 'recently-purchase';
	}

	public function get_title() {
		return esc_html__( 'Recently Purchase', 'recently-purchased-products-for-woo' );
	}

	public function get_icon() {
		return 'eicon-cart';
	}
	
	public function get_custom_help_url() {
		return 'https://www.worldwebtechnology.com/';
	}
	
	public function get_categories() {
		return [ 'general' ];
	}
	
	public function get_keywords() {
		return [ 'purchase', 'order'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'recently-purchased-products-for-woo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'rpp_ele_widget_title',
			[
				'label' => esc_html__( 'Title', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'placeholder' => esc_html__( 'Type your title here', 'recently-purchased-products-for-woo' ),
			]
		);

		$this->add_control(
			'rpp_ele_image',
			[
				'label' => esc_html__( 'Image', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_image_size', [
			'label' => esc_html__( 'Image Size', 'recently-purchased-products-for-woo' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => 150,			
			'frontend_available' => true,
			'min' => 10
				
		]);	

		$this->add_control(
			'rpp_ele_image_type', [
			'label' => esc_html__( 'Image Type', 'elementor' ),
			'type' => \Elementor\Controls_Manager::SELECT,			
			'options' => [
				'product_image' => esc_html__( 'Product Image', 'elementor' ),
				'user_avatar' => esc_html__( 'User Avatar', 'elementor' ),
			],
			'default' => 'product_image',		
			'selectors' => [
				'{{SELECTOR}}' => '{{VALUE}};',
			]
			
		]);	

		$this->add_control(
			'rpp_ele_no_of_products', [
			'label' => esc_html__( 'Number of products to show:', 'recently-purchased-products-for-woo' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => 5,			
			'frontend_available' => true,
			'min' => -1
			
		]);	

		$this->add_control(
			'rpp_ele_date',
			[
				'label' => esc_html__( 'Date', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_price',
			[
				'label' => esc_html__( 'Price', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_category',
			[
				'label' => esc_html__( 'Category', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_product_rating',
			[
				'label' => esc_html__( 'Product Rating', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_order', [
			'label' => esc_html__( 'Order', 'elementor' ),
			'type' => \Elementor\Controls_Manager::SELECT,			
			'options' => [
				'DESC' => esc_html__( 'DESC', 'elementor' ),
				'ASC' => esc_html__( 'ASC', 'elementor' ),
			],
			'default' => 'DESC',		
			'selectors' => [
				'{{SELECTOR}}' => '{{VALUE}};',
			]
			
		]);	

		$this->add_control(
			'rpp_ele_add_to_cart_btn',
			[
				'label' => esc_html__( 'Add to Cart Button', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'rpp_ele_customer_info',
			[
				'label' => esc_html__( 'Customer Info', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
			]
		);	


		$this->add_control(
			'rpp_ele_disp_type',
			[
				'label' => esc_html__( 'Show In', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'slider' => [
						'title' => esc_html__( 'Slider', 'recently-purchased-products-for-woo' ),
						'icon' => 'eicon-slider-3d',
					],
					'grid' => [
						'title' => esc_html__( 'Grid', 'recently-purchased-products-for-woo' ),
						'icon' => 'eicon-gallery-grid',
					],
					'list' => [
						'title' => esc_html__( 'List', 'recently-purchased-products-for-woo' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'show_label' => true,
				'default' => 'slider',
				'toggle' => true,
				
			]
		);


		$this->add_control(
			'rpp_ele_no_of_columns', [
			'label' => esc_html__( 'No. Of columns', 'recently-purchased-products-for-woo' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => 4,			
			'frontend_available' => true,
			'min' => 1,
			'max' => 8,
			'condition' => [
				'rpp_ele_disp_type' => [ 'grid' ],
			]
			
		]);	
		

		$this->add_control(
			'rpp_ele_slider_dots',
			[
				'label' => esc_html__( 'Slider Dots', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				]
			]
		);


		$this->add_control(
			'rpp_ele_slider_arrow',
			[
				'label' => esc_html__( 'Slider Arrow', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				]
			]
		);

		$this->add_control(
			'rpp_ele_slider_autoplay',
			[
				'label' => esc_html__( 'Auto Play', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				]
			]
		);

		$this->add_control(
			'rpp_ele_slider_infinite',
			[
				'label' => esc_html__( 'Slider Infinite', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				]
			]
		);

		$this->add_control(
			'rpp_ele_slider_no_of_slides_desk',
			[
				'label' => esc_html__( 'Slides to Show in Desktop', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			    'default' => 3,		
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				],
				'min' => 1,
				'max' => 10,
			]
		);

		$this->add_control(
			'rpp_ele_slider_no_of_slides_tablet',
			[
				'label' => esc_html__( 'Slides to Show in Tablet', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			    'default' => 2,		
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				],
				'min' => 1,
				'max' => 10,
			]
		);

		$this->add_control(
			'rpp_ele_slider_no_of_slides_mobile',
			[
				'label' => esc_html__( 'Slides to Show in Mobile', 'recently-purchased-products-for-woo' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			    'default' => 1,		
				'description' => esc_html__( '', 'recently-purchased-products-for-woo' ),
				'frontend_available' => true,
				'condition' => [
				'rpp_ele_disp_type' => [ 'slider' ],
				],
				'min' => 1,
				'max' => 10,
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		
			$settings = $this->get_settings_for_display();	

			global $rppw_public;
			
			$title = $settings['rpp_ele_widget_title'];

			$num_of_order = (isset($settings['rpp_ele_no_of_products']) && !empty($settings['rpp_ele_no_of_products']) ? $settings['rpp_ele_no_of_products'] : '');
			$order = (isset($settings['rpp_ele_order']) && !empty($settings['rpp_ele_order']) ? $settings['rpp_ele_order'] : '');

			$img_view = (isset($settings['rpp_ele_image']) && !empty($settings['rpp_ele_image']) ? $settings['rpp_ele_image'] : '');
			$img_size = (isset($settings['rpp_ele_image_size']) && !empty($settings['rpp_ele_image_size']) ? $settings['rpp_ele_image_size'] : '');
			$img_type = (isset($settings['rpp_ele_image_type']) && !empty($settings['rpp_ele_image_type']) ? $settings['rpp_ele_image_type'] : '');

			$date_view = (isset($settings['rpp_ele_date']) && !empty($settings['rpp_ele_date']) ? $settings['rpp_ele_date'] : '');
			$price_view = (isset($settings['rpp_ele_price']) && !empty($settings['rpp_ele_price']) ? $settings['rpp_ele_price'] : '');
			$category_view = (isset($settings['rpp_ele_category']) && !empty($settings['rpp_ele_category']) ? $settings['rpp_ele_category'] : '');
			$cart_view = (isset($settings['rpp_ele_add_to_cart_btn']) && !empty($settings['rpp_ele_add_to_cart_btn']) ? $settings['rpp_ele_add_to_cart_btn'] : '');
			$customer_view = (isset($settings['rpp_ele_customer_info']) && !empty($settings['rpp_ele_customer_info']) ? $settings['rpp_ele_customer_info'] : '');
			$rating_view = (isset($settings['rpp_ele_product_rating']) && !empty($settings['rpp_ele_product_rating']) ? $settings['rpp_ele_product_rating'] : '');

			
			$disp_type  = (isset($settings['rpp_ele_disp_type']) && !empty($settings['rpp_ele_disp_type']) ? $settings['rpp_ele_disp_type'] : '');

			$slider_dots  = (isset($settings['rpp_ele_slider_dots']) && !empty($settings['rpp_ele_slider_dots']) ? $settings['rpp_ele_slider_dots'] : '');
			$slider_arrow  = (isset($settings['rpp_ele_slider_arrow']) && !empty($settings['rpp_ele_slider_arrow']) ? $settings['rpp_ele_slider_arrow'] : '');
			$slider_autoplay  = (isset($settings['rpp_ele_slider_autoplay']) && !empty($settings['rpp_ele_slider_autoplay']) ? $settings['rpp_ele_slider_autoplay'] : '');
			$slider_infinite  = (isset($settings['rpp_ele_slider_infinite']) && !empty($settings['rpp_ele_slider_infinite']) ? $settings['rpp_ele_slider_infinite'] : '');

			$rpp_ele_slider_no_of_slides_desk  = (isset($settings['rpp_ele_slider_no_of_slides_desk']) && !empty($settings['rpp_ele_slider_no_of_slides_desk']) ? $settings['rpp_ele_slider_no_of_slides_desk'] : '');

			$rpp_ele_slider_no_of_slides_tablet  = (isset($settings['rpp_ele_slider_no_of_slides_tablet']) && !empty($settings['rpp_ele_slider_no_of_slides_tablet']) ? $settings['rpp_ele_slider_no_of_slides_tablet'] : '');

			$rpp_ele_slider_no_of_slides_mobile  = (isset($settings['rpp_ele_slider_no_of_slides_mobile']) && !empty($settings['rpp_ele_slider_no_of_slides_mobile']) ? $settings['rpp_ele_slider_no_of_slides_mobile'] : '');


			$rpp_ele_no_of_columns  = (isset($settings['rpp_ele_no_of_columns']) && !empty($settings['rpp_ele_no_of_columns']) ? $settings['rpp_ele_no_of_columns'] : '');


			$dots = ($slider_dots == 'yes' ? 'true' : 'false');
			$arrows = ($slider_arrow == 'yes' ? 'true' : 'false');
			$autoplay = ($slider_autoplay == 'yes' ? 'true' : 'false');
			$infinite = ($slider_infinite == 'yes' ? 'true' : 'false');

			$html = '';

			ob_start();



			//default image
			$default_image = RPPW_URL.'includes/assets/image/'.NO_IMAGE_PNG;			

			if (!empty($title)) {
				$html .= '<h2 class="rpp-ele-widget-title">'.$title.'</h2>';
			}

			$slider_class = '';
			$grid_class = '';
			$grid_style = '';

			if( $disp_type == "slider"){

				//Load Slick plugin CSS file
				wp_enqueue_style('rppw-slick-style');
				wp_enqueue_style('rppw-slick-theme-style');

				//Load plugin JS file				
				wp_enqueue_script( 'rppw-slick-script' );

				$slider_class = ' rppw-product-slider rpp_slider_box slick';
			}
			else if($disp_type == "grid"){

				$columns =  (int) $rpp_ele_no_of_columns;

				$grid_class = ' grid_cols_' . $columns;

				$grid_style = 'padding: 0;
							   display: grid;
							   grid-template-columns: repeat('.$columns.', 1fr);
							   grid-column-gap: 10px;
							   grid-row-gap: 10px;';


			}

			//Load plugin custom CSS file
			wp_enqueue_style( 'rppw-css' );

			//Load plugin custom JS file
			wp_enqueue_script( 'rppw-public-script' );

			$orders_list = $rppw_public->get_recently_order($num_of_order, $order);

			$out = '<div class="recently_purchased_products_for_woo item-list-products' . $slider_class . $disp_type . $grid_class .'" style="'.$grid_style.'">';

			if (!empty($orders_list) && is_array($orders_list)) {

				foreach ($orders_list as $k => $order) {

					setup_postdata($order);

					$wc_order = wc_get_order($order->ID);
					$wc_date = date(get_option('date_format'), strtotime($wc_order->get_date_created()));

					$customer_fname = $wc_order->get_billing_first_name();
					$customer_lname = $wc_order->get_billing_last_name();
					$complete_date  = $wc_order->get_date_completed();
					$customer_ID = $wc_order->get_user_id();
					$customer_image = get_avatar($customer_ID, $img_size, '', $customer_fname);

					$user_id = $wc_order->get_user_id();
					$products = $wc_order->get_items();
					// $product_ids = array();

					foreach ($products as $key => $product) {

						$item_id = $product->get_product_id();
						$variation_id = $product->get_variation_id();

						$product_ids[] = array('product_id' => $item_id, 'variation_id' => $variation_id);

						$terms = get_the_terms($item_id, 'product_cat');

						if (!empty($terms)) {

							foreach ($terms as $term) {

								$product_cat_id = $term->term_id;
								$product_cat_name = $term->name;
								break;
							}
						}

						$product = wc_get_product($item_id);
						$url = get_permalink($item_id);

						if (!empty($product)) {

							$out .=  '<div class="prod-item">';
							if (!empty($img_view) && strcmp($img_view, 'yes') >= 0) {

								if (strtolower($img_type) == 'user_avatar') {

									// User Avatar
									$out .= '<div class="rppw_product_img rppw_image_box"><a href="' . $url . '">' . $customer_image . '</a></div>';
								} else {
									// Product Image
									if (isset($product_ids[0]['variation_id']) && !empty($product_ids[0]['variation_id'])) {

										$variation = new WC_Product_Variation($product_ids[0]['variation_id']);

										$image = wp_get_attachment_image($variation->get_image_id(), array($img_size, $img_size), '', array('class' => ''));
										$out .= '<div class="rppw_product_img rppw_image_box"><a href="' . $url . '">' . $image . '</a></div>';
									} else {

										$image = get_the_post_thumbnail($item_id, array($img_size, $img_size), array('class' => ''));
										if (empty($image)) {
											$image = '<img src="' . $default_image . '" width="' . $img_size . '" height="' . $img_size . '" class="" alt="Default Image" />';
										}
										$out .= '<div class="rppw_product_img rppw_image_box"><a class="wid-img-box" href="' . $url . '">' . $image . '</a></div>';
									}
								}
							}

							$out .= '<div class="rppw_product_content">';

							if (!empty($category_view) && strcmp($category_view, 'yes') >= 0) {

								$cat_url = get_term_link($product_cat_id, 'product_cat');

								$out .= '<div class="widget-option rppw_product_category">';
								$out .= '<a href="' . $cat_url . '">' . $product_cat_name . '</a>';
								$out .= '</div>';
							}

							$out .= '<div class="rppw_product_title"><a href="' . $url . '">' . $product->get_title() . '</a></div>';

							if (!empty($customer_view) && strcmp(strtolower($customer_view), 'yes') >= 0) {
								$out .= '<div class="rppw_product_customer_info">';
								$out .= '<span class="product-customer-info">' . esc_html(' Purchased by ', 'recently-purchased-products-for-woo') . $customer_fname . " " . $customer_lname . '</span>';
								$out .= '</div>';
							}

							if (!empty($price_view) && strcmp($price_view, 'yes') >= 0) {

								$price = $product->get_price_html();

								$out .= '<div class="rppw_product_price_box">';
								$out .= '<span class="rppw_product_price price">' . $price . '</span>';
								$out .= '</div>';
							}


							$out .= '<div class="rppw_product_info">';

							if (!empty($date_view) && strcmp(strtolower($date_view), 'yes') >= 0) {

								$out .= '<span class="rppw_product_date">' . ' On ' . $wc_date . '</span>';
							}

							if (!empty($rating_view) && strcmp($rating_view, 'yes') >= 0) {
								$rating  = $product->get_average_rating();
								$count   = $product->get_rating_count();
								
								$out .= '<div class="rppw_product_ratings">';
								$out .= wc_get_rating_html($rating, $count);
								$out .= '</div>';
							}

							$out .= '</div>';


							if (!empty($cart_view) && strcmp(strtolower($cart_view), 'yes') >= 0) {
								$out .= '<div class="rppw_product_cart-box">';
								$out .= '<span class="rppw_product_cart_button widget widget-option">' . do_shortcode('[add_to_cart id="' . $product->get_id() . '" style="border:0 solid #ccc; padding: 0px;" show_price="false" quantity="1"]') . '</span>';
								$out .= '</div>';
							}

							$out .= '</div>';
							$out .= '</div>';
						}
					}
					$product_ids = array_map("unserialize", array_unique(array_map("serialize", $product_ids) ) );
				}
				wp_reset_postdata();
			} else {
				$out .= '<div><span class="rppw_no_order">' . esc_html__('There are no recent purchases.', 'recently-purchased-products-for-woo') . '</span></div>';
			}
			$out .= '</div>';

			$html .= $out;

			if( $disp_type == "slider"){
			?>
			<script type="text/javascript">
					jQuery(document).ready(function() {
						if (jQuery('.rppw-product-slider').length) {

							jQuery('.rppw-product-slider').slick({
								arrows: <?php echo $arrows; ?>,
								dots: <?php echo $dots; ?>,
								dotsClass: 'slick-dots',
								speed: 500,
								centerPadding: "0px",
								infinite: <?php echo $infinite; ?>,
								autoplay: <?php echo $autoplay; ?>,
								autoplaySpeed: 3000,
								slidesToShow: <?php echo $rpp_ele_slider_no_of_slides_desk; ?>,
								slidesToScroll: 1,
								responsive: [
									{
									    breakpoint: 1024,
									   	settings: {
									        dots: true,
									        arrows: <?php echo $arrows; ?>,
									        slidesToShow: <?php echo $rpp_ele_slider_no_of_slides_tablet; ?>,
            								slidesToScroll: 1,
									    }
									},
									{
									    breakpoint: 600,
									   	settings: {
									        dots: false,
									        arrows: false,
									        slidesToShow: <?php echo $rpp_ele_slider_no_of_slides_mobile; ?>,
									        slidesToScroll: 1,
									    }
									},
								    {
								    	breakpoint: 480,
								        settings: {
								        	dots: false,
								        	arrows: false,
									        slidesToShow: <?php echo $rpp_ele_slider_no_of_slides_mobile; ?>,
									        slidesToScroll: 1,
								      	}
								    }
								],
							});
						}
					});
				</script>
			<?php 
			}

			$html .= ob_get_clean();
			echo $html;
	
	}

	public function content_template() {

		
	}


}
