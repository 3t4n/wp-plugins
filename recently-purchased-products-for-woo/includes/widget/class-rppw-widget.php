<?php if (!defined('ABSPATH')) {
	die;
} // If this file is called directly, abort.

/**
 * The Widget specific class functionality of the plugin.
 *
 * @link       https://www.worldwebtechnology.com/
 * @since      1.0.0
 *
 * @package    Recently Purchased Products For Woo
 * @subpackage Recently Purchased Products For Woo/includes/widget
 * @author     World Web Technology <biz@worldwebtechnology.com>
 */
if (!class_exists('RPPW_Create_Widget')) {
	class RPPW_Create_Widget extends WP_Widget
	{
		/**
		 * Initialize the class and set its properties.
		 *
		 * @since      1.0.0
		 * @package    Recently Purchased Products For Woo
		 * @subpackage Recently Purchased Products For Woo/includes/widget
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 */
		public function __construct()
		{
			$widget_ops = array(
				'classname' => 'widget_text',
				'description' => esc_html__('Displays Recently Purchased Products For Woocommerce', 'recently-purchased-products-for-woo')
			);
			parent::__construct('rppw-widget', esc_html__('Recently Purchased Products For Woocommerce ', 'recently-purchased-products-for-woo'), $widget_ops);
		}
		/**
		 * Widget Form HTML
		 *
		 * @since      1.0.0
		 * @package    Recently Purchased Products For Woo
		 * @subpackage Recently Purchased Products For Woo/includes/widget
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 */
		public function form($instance)
		{
			$title = (isset($instance['title']) && !empty($instance['title']) ? ($instance['title']) : '');
			$num_of_order = (isset($instance['num_of_order']) && !empty($instance['num_of_order']) ? ($instance['num_of_order']) : '');
			$order = (isset($instance['order']) && !empty($instance['order']) ? ($instance['order']) : '');
			$img = (isset($instance['img']) && !empty($instance['img']) ? ($instance['img']) : '');
			$img_size = (isset($instance['img_size']) && !empty($instance['img_size']) ? ($instance['img_size']) : '');
			$img_type = (isset($instance['img_type']) && !empty($instance['img_type']) ? ($instance['img_type']) : '');
			$date = (isset($instance['date']) && !empty($instance['date']) ? ($instance['date']) : '');
			$price = (isset($instance['price']) && !empty($instance['price']) ? ($instance['price']) : '');
			$category = (isset($instance['category']) && !empty($instance['category']) ? ($instance['category']) : '');
			$cart = (isset($instance['cart']) && !empty($instance['cart']) ? ($instance['cart']) : '');
			$customer_info = (isset($instance['customer_info']) && !empty($instance['customer_info']) ? ($instance['customer_info']) : '');
			$rating = (isset($instance['rating']) && !empty($instance['rating']) ? ($instance['rating']) : '');
			$slider = (isset($instance['slider']) && !empty($instance['slider']) ? ($instance['slider']) : '');
			$slider_dots = (isset($instance['slider_dots']) && !empty($instance['slider_dots']) ? ($instance['slider_dots']) : '');
			$slider_arrow = (isset($instance['slider_arrow']) && !empty($instance['slider_arrow']) ? ($instance['slider_arrow']) : '');
			$slider_autoplay = (isset($instance['slider_autoplay']) && !empty($instance['slider_autoplay']) ? ($instance['slider_autoplay']) : '');
			$slider_infinite = (isset($instance['slider_infinite']) && !empty($instance['slider_infinite']) ? ($instance['slider_infinite']) : '');
?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'recently-purchased-products-for-woo'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('img'); ?>"><?php esc_html_e('Image:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($img, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($img, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('img_size'); ?>"><?php esc_html_e('Image Size:', 'recently-purchased-products-for-woo'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('img_size'); ?>" name="<?php echo $this->get_field_name('img_size'); ?>" type="number" value="<?php echo esc_attr($img_size); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('img_type'); ?>"><?php esc_html_e('Image Type:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('img_type'); ?>" name="<?php echo $this->get_field_name('img_type'); ?>" class="widefat" style="width:100%;">
					<option value="product" <?php selected($img_type, 'product'); ?>><?php esc_html_e('Product Image', 'recently-purchased-products-for-woo'); ?></option>
					<option value="avatar" <?php selected($img_type, 'avatar'); ?>><?php esc_html_e('User Avatar', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('num_of_order'); ?>"><?php esc_html_e('Number of products to show:', 'recently-purchased-products-for-woo'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('num_of_order'); ?>" name="<?php echo $this->get_field_name('num_of_order'); ?>" type="number" value="<?php echo esc_attr($num_of_order); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('date'); ?>"><?php esc_html_e('Date:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($date, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($date, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('price'); ?>"><?php esc_html_e('Price:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('price'); ?>" name="<?php echo $this->get_field_name('price'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($price, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($price, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>"><?php esc_html_e('Category:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($category, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($category, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('rating'); ?>"><?php esc_html_e('Product Rating:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('rating'); ?>" name="<?php echo $this->get_field_name('rating'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($rating, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($rating, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('order'); ?>"><?php esc_html_e('Order:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" class="widefat" style="width:100%;">
					<option value="desc" <?php selected($order, 'desc'); ?>><?php esc_html_e('DESC', 'recently-purchased-products-for-woo'); ?></option>
					<option value="asc" <?php selected($order, 'asc'); ?>><?php esc_html_e('ASC', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('cart'); ?>"><?php esc_html_e('Add to Cart Button:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('cart'); ?>" name="<?php echo $this->get_field_name('cart'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($cart, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($cart, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p>

				<label for="<?php echo $this->get_field_id('customer_info'); ?>"><?php esc_html_e('Show Name:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('customer_info'); ?>" name="<?php echo $this->get_field_name('customer_info'); ?>" class="widefat" style="width:100%;">
					<option value="full_name" <?php selected($customer_info, 'full_name'); ?>><?php esc_html_e('Full Name', 'recently-purchased-products-for-woo'); ?></option>
					<option value="first_name" <?php selected($customer_info, 'first_name'); ?>><?php esc_html_e('First Name', 'recently-purchased-products-for-woo'); ?></option>
					<option value="last_name" <?php selected($customer_info, 'last_name'); ?>><?php esc_html_e('Last Name', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($customer_info, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			
			<p id="show_in_slider_section">
				<label for="<?php echo $this->get_field_id('slider'); ?>"><?php esc_html_e('Show in Slider:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('slider'); ?>" name="<?php echo $this->get_field_name('slider'); ?>" class="widefat show_in_slider" style="width:100%;">
					<option value="yes" <?php echo selected($slider, 'yes'); ?>><?php esc_html_e('Yes', 'recently-purchased-products-for-woo'); ?></option>
					<option value="no" <?php echo selected($slider, 'no'); ?>><?php esc_html_e('No', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p class="show_item">
				<label for="<?php echo $this->get_field_id('slider_dots'); ?>"><?php esc_html_e('Slider Dots:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('slider_dots'); ?>" name="<?php echo $this->get_field_name('slider_dots'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($slider_dots, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($slider_dots, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p class="show_item">
				<label for="<?php echo $this->get_field_id('slider_arrow'); ?>"><?php esc_html_e('Slider Arrow:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('slider_arrow'); ?>" name="<?php echo $this->get_field_name('slider_arrow'); ?>" class="widefat" style="width:100%;">
					<option value="show" <?php selected($slider_arrow, 'show'); ?>><?php esc_html_e('Show', 'recently-purchased-products-for-woo'); ?></option>
					<option value="hide" <?php selected($slider_arrow, 'hide'); ?>><?php esc_html_e('Hide', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p class="show_item">
				<label for="<?php echo $this->get_field_id('slider_autoplay'); ?>"><?php esc_html_e('Auto Play:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('slider_autoplay'); ?>" name="<?php echo $this->get_field_name('slider_autoplay'); ?>" class="widefat" style="width:100%;">
					<option value="yes" <?php selected($slider_autoplay, 'yes'); ?>><?php esc_html_e('Yes', 'recently-purchased-products-for-woo'); ?></option>
					<option value="no" <?php selected($slider_autoplay, 'no'); ?>><?php esc_html_e('No', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<p class="show_item">
				<label for="<?php echo $this->get_field_id('slider_infinite'); ?>"><?php esc_html_e('Slider Infinite:', 'recently-purchased-products-for-woo'); ?></label>
				<select id="<?php echo $this->get_field_id('slider_infinite'); ?>" name="<?php echo $this->get_field_name('slider_infinite'); ?>" class="widefat" style="width:100%;">
					<option value="yes" <?php selected($slider_infinite, 'yes'); ?>><?php esc_html_e('Yes', 'recently-purchased-products-for-woo'); ?></option>
					<option value="no" <?php selected($slider_infinite, 'no'); ?>><?php esc_html_e('No', 'recently-purchased-products-for-woo'); ?></option>
				</select>
			</p>
			<?php
		}
		/**
		 * Update Widget Form Data in DB
		 *
		 * @since      1.0.0
		 * @package    Recently Purchased Products For Woo
		 * @subpackage Recently Purchased Products For Woo/includes/widget
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 */
		public function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = (isset($new_instance['title']) && !empty($new_instance['title']) ? ($new_instance['title']) : '');
			$instance['num_of_order'] = (isset($new_instance['num_of_order']) && !empty($new_instance['num_of_order']) ? ($new_instance['num_of_order']) : '');
			$instance['order'] = (isset($new_instance['order']) && !empty($new_instance['order']) ? ($new_instance['order']) : '');
			$instance['img'] = (isset($new_instance['img']) && !empty($new_instance['img']) ? ($new_instance['img']) : '');
			$instance['img_size'] = (isset($new_instance['img_size']) && !empty($new_instance['img_size']) ? ($new_instance['img_size']) : '');
			$instance['img_type'] = (isset($new_instance['img_type']) && !empty($new_instance['img_type']) ? ($new_instance['img_type']) : '');
			$instance['date'] = (isset($new_instance['date']) && !empty($new_instance['date']) ? ($new_instance['date']) : '');
			$instance['price'] = (isset($new_instance['price']) && !empty($new_instance['price']) ? ($new_instance['price']) : '');
			$instance['category'] = (isset($new_instance['category']) && !empty($new_instance['category']) ? ($new_instance['category']) : '');
			$instance['cart'] = (isset($new_instance['cart']) && !empty($new_instance['cart']) ? ($new_instance['cart']) : '');
			$instance['autoplay'] = (isset($new_instance['autoplay']) && !empty($new_instance['autoplay']) ? ($new_instance['autoplay']) : '');
			$instance['customer_info'] = (isset($new_instance['customer_info']) && !empty($new_instance['customer_info']) ? ($new_instance['customer_info']) : '');
			$instance['rating'] = (isset($new_instance['rating']) && !empty($new_instance['rating']) ? ($new_instance['rating']) : '');
			$instance['slider'] = (isset($new_instance['slider']) && !empty($new_instance['slider']) ? ($new_instance['slider']) : '');
			$instance['slider_dots'] = (isset($new_instance['slider_dots']) && !empty($new_instance['slider_dots']) ? ($new_instance['slider_dots']) : '');
			$instance['slider_arrow'] = (isset($new_instance['slider_arrow']) && !empty($new_instance['slider_arrow']) ? ($new_instance['slider_arrow']) : '');
			$instance['slider_autoplay'] = (isset($new_instance['slider_autoplay']) && !empty($new_instance['slider_autoplay']) ? ($new_instance['slider_autoplay']) : '');
			$instance['slider_infinite'] = (isset($new_instance['slider_infinite']) && !empty($new_instance['slider_infinite']) ? ($new_instance['slider_infinite']) : '');
			return $instance;
		}
		/**
		 * Display Data in front site sidebar
		 *
		 * @since      1.0.0
		 * @package    Recently Purchased Products For Woo
		 * @subpackage Recently Purchased Products For Woo/includes/widget
		 * @author     World Web Technology <biz@worldwebtechnology.com>
		 */
		public function widget($args, $instance)
		{
			global $rppw_public;
			extract($args);
			$title = apply_filters('widget_title', (empty($instance['title']) ? '' : $instance['title']));
			$num_of_order = (isset($instance['num_of_order']) && !empty($instance['num_of_order']) ? $instance['num_of_order'] : '');
			$order = (isset($instance['order']) && !empty($instance['order']) ? $instance['order'] : '');
			$img_view = (isset($instance['img']) && !empty($instance['img']) ? $instance['img'] : '');
			$img_size = (isset($instance['img_size']) && !empty($instance['img_size']) ? $instance['img_size'] : '');
			$img_type = (isset($instance['img_type']) && !empty($instance['img_type']) ? $instance['img_type'] : '');
			$date_view = (isset($instance['date']) && !empty($instance['date']) ? $instance['date'] : '');
			$price_view = (isset($instance['price']) && !empty($instance['price']) ? $instance['price'] : '');
			$category_view = (isset($instance['category']) && !empty($instance['category']) ? $instance['category'] : '');
			$cart_view = (isset($instance['cart']) && !empty($instance['cart']) ? $instance['cart'] : '');
			$customer_view = (isset($instance['customer_info']) && !empty($instance['customer_info']) ? $instance['customer_info'] : '');
			$rating_view = (isset($instance['rating']) && !empty($instance['rating']) ? $instance['rating'] : '');
			$is_slider  = (isset($instance['slider']) && !empty($instance['slider']) ? $instance['slider'] : '');
			$slider_dots  = (isset($instance['slider_dots']) && !empty($instance['slider_dots']) ? $instance['slider_dots'] : '');
			$slider_arrow  = (isset($instance['slider_arrow']) && !empty($instance['slider_arrow']) ? $instance['slider_arrow'] : '');
			$slider_autoplay  = (isset($instance['slider_autoplay']) && !empty($instance['slider_autoplay']) ? $instance['slider_autoplay'] : '');
			$slider_infinite  = (isset($instance['slider_infinite']) && !empty($instance['slider_infinite']) ? $instance['slider_infinite'] : '');
			$dots = ($slider_dots == 'show' ? 'true' : 'false');
			$arrows = ($slider_arrow == 'show' ? 'true' : 'false');
			$autoplay = ($slider_autoplay == 'yes' ? 'true' : 'false');
			$infinite = ($slider_infinite == 'yes' ? 'true' : 'false');
			$html = '';
			ob_start();
			//default image
			$default_image = RPPW_URL . 'includes/assets/image/' . NO_IMAGE_PNG;
			$html .= $before_widget;
			if (!empty($title)) {
				$html .= $before_title . $title . $after_title;
			}
			$slider_class = '';
			if (!empty($is_slider) && $is_slider == "yes") {
				//Load Slick plugin CSS file
				wp_enqueue_style('rppw-slick-style');
				wp_enqueue_style('rppw-slick-theme-style');
				//Load plugin JS file
				wp_enqueue_script('rppw-slick-script');
				$slider_class = ' rppw-product-slider rpp_slider_box slick';
			}
			//Load plugin custom CSS file
			wp_enqueue_style('rppw-css');
			//Load plugin custom JS file
			wp_enqueue_script('rppw-public-script');
			$orders_list = $rppw_public->get_recently_order($num_of_order, $order);
			$out = '<div class="recently_purchased_products_for_woo item-list-products' . $slider_class . '">';
			if (!empty($orders_list) && is_array($orders_list)) {
				foreach ($orders_list as $k => $order) {
					setup_postdata($order);
					$wc_order = wc_get_order($order->get_id());
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
							if (!empty($img_view) && strcmp($img_view, 'show') >= 0) {
								if (strtolower($img_type) == 'avatar') {
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
							if (!empty($category_view) && strcmp($category_view, 'show') >= 0) {
								$cat_url = get_term_link($product_cat_id, 'product_cat');
								$out .= '<div class="widget-option rppw_product_category">';
								$out .= '<a href="' . $cat_url . '">' . $product_cat_name . '</a>';
								$out .= '</div>';
							}
							$out .= '<div class="rppw_product_title"><a href="' . $url . '">' . $product->get_title() . '</a></div>';

							if (!empty($customer_view)) {
								if (strtolower($customer_view) === 'full_name') {
									$out .= '<div class="rppw_product_customer_info">';
									$out .= '<span class="product-customer-info">' . esc_html(' Purchased by ', 'recently-purchased-products-for-woo') . $customer_fname . " " . $customer_lname . '</span>';
									$out .= '</div>';
								} else if (strtolower($customer_view) === 'first_name') {
									$out .= '<div class="rppw_product_customer_info">';
									$out .= '<span class="product-customer-info">' . esc_html(' Purchased by ', 'recently-purchased-products-for-woo') . " " . $customer_fname . '</span>';
									$out .= '</div>';
								} else if (strtolower($customer_view) === 'last_name') {
									$out .= '<div class="rppw_product_customer_info">';
									$out .= '<span class="product-customer-info">' . esc_html(' Purchased by ', 'recently-purchased-products-for-woo') . " " . $customer_lname . '</span>';
									$out .= '</div>';
								} else {
									if (strtolower($customer_view) === 'hide') { ?>
										<style>
											.product-customer-info {
												display: none !important;
											}
										</style>
				<?php }
								}
							}


							if (!empty($price_view) && strcmp($price_view, 'show') >= 0) {
								$price = $product->get_price_html();
								$out .= '<div class="rppw_product_price_box">';
								$out .= '<span class="rppw_product_price price">' . $price . '</span>';
								$out .= '</div>';
							}
							$out .= '<div class="rppw_product_info">';
							if (!empty($date_view) && strcmp(strtolower($date_view), 'show') >= 0) {
								$out .= '<span class="rppw_product_date">' . ' On ' . $wc_date . '</span>';
							}
							if (!empty($rating_view) && strcmp($rating_view, 'show') >= 0) {
								$rating  = $product->get_average_rating();
								$count   = $product->get_rating_count();
								$out .= '<div class="rppw_product_ratings">';
								$out .= wc_get_rating_html($rating, $count);
								$out .= '</div>';
							}
							$out .= '</div>';
							if (!empty($cart_view) && strcmp(strtolower($cart_view), 'show') >= 0) {
								$out .= '<div class="rppw_product_cart-box">';
								$out .= '<span class="rppw_product_cart_button widget widget-option">' . do_shortcode('[add_to_cart id="' . $product->get_id() . '" style="border:0 solid #ccc; padding: 0px;" show_price="false" quantity="1"]') . '</span>';
								$out .= '</div>';
							}
							$out .= '</div>';
							$out .= '</div>';
						}
					}
					$product_ids = array_map("unserialize", array_unique(array_map("serialize", $product_ids)));
				}
				wp_reset_postdata();
			} else {
				$out .= '<div><span class="rppw_no_order">' . esc_html__('There are no recent purchases.', 'recently-purchased-products-for-woo') . '</span></div>';
			}
			$out .= '</div>';
			$html .= $out;
			$html .= $after_widget;
			if (!empty($is_slider) && $is_slider == "yes") {
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
								slidesToShow: 1,
								slidesToScroll: 1,
								responsive: [{
										breakpoint: 1024,
										settings: {
											dots: true,
											arrows: <?php echo $arrows; ?>,
											slidesToShow: 1,
											slidesToScroll: 1,
										}
									},
									{
										breakpoint: 600,
										settings: {
											dots: false,
											arrows: false,
											slidesToShow: 1,
											slidesToScroll: 1,
										}
									},
									{
										breakpoint: 480,
										settings: {
											dots: false,
											arrows: false,
											slidesToShow: 1,
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
	}
}
/**
 * Register Widget for Sidebar
 *
 * @since      1.0.0
 * @package    Recently Purchased Products For Woo
 * @subpackage Recently Purchased Products For Woo/includes/widget
 * @author     World Web Technology <biz@worldwebtechnology.com>
 */
if (!function_exists('rppw_register_widget')) {
	function rppw_register_widget()
	{
		register_widget('RPPW_Create_Widget');
	}
	add_action('widgets_init', 'rppw_register_widget');
}
?>