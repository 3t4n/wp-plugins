<?php
/*
*
* Products By Category Widget
*
*/

if (!defined('ABSPATH')) {
	exit;
}

class GMWPLW_Product_List_Filter_Widget extends WP_Widget {
	function __construct() {

		parent::__construct(
			'gmwplw_products_list_widget_filter',
			__('GM Woo Product List Widget', 'gmwplw') ,
			array(
				'description' => __('Woocommerce Product list Widget with filter.', 'gmwplw')
				));
		
	}

	function form($instance) {
		$cat = (isset($instance['cat'])?$instance['cat']:'');
		$args = array(
		    'post_type' => 'product_widget',
		    'posts_per_page' => -1, 
		    'orderby' => 'date',
		    'order' => 'DESC',
		    'post_status' => 'publish', // Retrieve only published posts.
		);

		$posts = get_posts($args);
		$post_url = add_query_arg( array( 
			
			'post_type' => 'product_widget', 
		), admin_url( 'post-new.php' ) );
		echo "<p style='text-align: right;'>";
		echo "<a href='".$post_url."' style='font-size: 15px;color: red;font-weight: bold;'>Create New Product Widget</a>";
		echo "</p>";
		?>
		<p>
			<label for="<?php echo $this->get_field_id('cat'); ?>">Type</label>
			<select class='widefat' formid="<?php echo $this->number;?>" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>">
				<?php 
				foreach ($posts as $post) {
				?>
				<option value="<?php echo $post->ID;?>"  <?php echo ($cat == $post->ID) ? 'selected' : ''; ?>><?php echo $post->post_title;?></option>
				<?php 
				}
				?>
			</select>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';

		return $instance;
	}

	function widget($args, $instance) {
		echo $args['before_widget'];
		$post_id = $instance['cat'];
		GMWPLW_returndata($post_id);
		echo $args['after_widget'];
	}
}

add_action( 'widgets_init', 'GMWPLW_product_by_filter_widget' );
function GMWPLW_product_by_filter_widget () {

		register_widget('GMWPLW_Product_List_Filter_Widget');
}