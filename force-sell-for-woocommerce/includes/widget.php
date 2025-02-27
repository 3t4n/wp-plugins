<?php
/**
 * List/Grid widget
 */
class BeRocket_force_sell_Widget extends WP_Widget 
{
    public static $defaults = array(
        'title'                     => '',
        'display_force_sell'        => '1',
        'display_force_sell_linked' => '1',
        'display_as_link'           => '',
    );
	public function __construct() {
        parent::__construct("berocket_force_sell_widget", "WooCommerce Force Sell",
            array("description" => ""));
    }
    /**
     * WordPress widget
     */
    public function widget($args, $instance)
    {
        $instance = wp_parse_args( (array) $instance, self::$defaults );
        $instance['title'] = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
        $BeRocket_force_sell = BeRocket_force_sell::getInstance();
        $options = $BeRocket_force_sell->get_option();
        echo $args['before_widget'];
        if( ! empty( $instance['title'] ) ) {
            echo $args['before_title'].$instance['title'].$args['after_title'];
        }
        do_action( 'berocket_force_sell_echo_linked_products', array(
            'display_force_sell' => $instance['display_force_sell'],
            'display_force_sell_linked' => $instance['display_force_sell_linked'],
            'display_as_link' => $instance['display_as_link']) );
        echo $args['after_widget'];
	}
    /**
     * Update widget settings
     */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['display_force_sell'] = ! empty( $new_instance['display_force_sell'] );
		$instance['display_force_sell_linked'] = ! empty( $new_instance['display_force_sell_linked'] );
		$instance['display_as_link'] = ! empty( $new_instance['display_as_link'] );
		return $instance;
	}
    /**
     * Widget settings form
     */
	public function form($instance)
	{
        $instance = wp_parse_args( (array) $instance, self::$defaults );
		$title = strip_tags($instance['title']);
		?>
		<div>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </div>
        <div><label>
            <input type="checkbox" value="1" name="<?php echo $this->get_field_name('display_force_sell'); ?>"<?php echo ( empty($instance['display_force_sell']) ? '' : ' checked'); ?>>
            <?php _e('Linked Products, that can be removed', 'force-sell-for-woocommerce') ?>
        </label></div>
        <div><label>
            <input type="checkbox" value="1" name="<?php echo $this->get_field_name('display_force_sell_linked'); ?>"<?php echo ( empty($instance['display_force_sell_linked']) ? '' : ' checked'); ?>>
            <?php _e('Linked Products, that can be removed only with this product', 'force-sell-for-woocommerce') ?>
        </label></div>
        <div><label>
            <input type="checkbox" value="1" name="<?php echo $this->get_field_name('display_as_link'); ?>"<?php echo ( empty($instance['display_as_link']) ? '' : ' checked'); ?>>
            <?php _e('Link to products page', 'force-sell-for-woocommerce') ?>
        </label></div>
		<?php
	}
}
?>
