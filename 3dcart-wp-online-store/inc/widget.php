<?php

function shift4shop_register_widget() {
	register_widget( 'Shift4ShopWidget' );
}
add_action( 'widgets_init', 'shift4shop_register_widget' );

class Shift4ShopWidget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// widget ID
			'shift4shop_widget',

			// widget name
			__('Shift4Shop Ecommerce Widget', 'shift4shop'),

			// widget description
			array ( 'description' => __( 'Add a product using Shift4Shop product widget.' ) )
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];

		//if title is present
		If ( ! empty ( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		?>

		<div id="shift4shop_widget">
			<input type="hidden" id="shift4shop_widget_catalogids" value="<?php echo $instance['catalog_ids'] ?>">
			<input type="hidden" id="shift4shop_siteurl" value="<?php echo get_option('shift4shop_siteurl') ?>">
			<input type="hidden" id="shift4shop_currency" value="<?php echo get_option('shift4shop_currency') ?>">

			<ul id="shift4shop_widget_products"></ul>

			<ul id="shift4shop_widget_products_templates" style="display: none;">
				<li class="shift4shop_widget_product shift4shop_widget_product_regularprice_item">
					<a href="#">
						<div class="shift4shop_widget_product_img">
							<img src="<?php echo Shift4Shop_URL ?>assets/images/default.jpeg" alt="Product">
						</div>
						<div class="shift4shop_widget_product_details">
							<div class="shift4shop_widget_product_name">Name</div>
							<div class="shift4shop_widget_product_price_outer">
								<span class="shift4shop_widget_product_price">00.00</span>
							</div>
						</div>
					</a>
				</li>
				<li class="shift4shop_widget_product shift4shop_widget_product_saleprice_item">
					<a href="#">
						<div class="shift4shop_widget_product_img">
							<img src="<?php echo Shift4Shop_URL ?>assets/images/default.jpeg" alt="Product">
						</div>
						<div class="shift4shop_widget_product_details">
							<div class="shift4shop_widget_product_name">Name</div>
							<div class="shift4shop_widget_product_price_outer">
								<del class="shift4shop_widget_product_price">00.00</del>
								<span class="shift4shop_widget_product_saleprice">00.00</span>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>


		<?php

		echo $args['after_widget'];

		wp_enqueue_script( 'shift4shop-script', Shift4Shop_URL.'assets/js/main.js', array('jquery'), '1.0.0');
		wp_enqueue_style( 'shift4shop-style', Shift4Shop_URL.'assets/css/main.css', null, '1.0.0');
	}

	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) )
			$title = $instance[ 'title' ];
		else
			$title = __( 'Product Name', 'shift4shop' );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<?php 

		if ( isset( $instance[ 'catalog_ids' ] ) )
			$catalog_ids = $instance[ 'catalog_ids' ];
		else
			$catalog_ids = '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'catalog_ids' ); ?>"><?php _e( 'Product Catalog IDs (<em>Separated by commas</em>):' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'catalog_ids' ); ?>" name="<?php echo $this->get_field_name( 'catalog_ids' ); ?>" type="text" value="<?php echo esc_attr( $catalog_ids ); ?>" />
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['catalog_ids'] = ( ! empty( $new_instance['catalog_ids'] ) ) ? strip_tags( $new_instance['catalog_ids'] ) : '';
		return $instance;

	}
}