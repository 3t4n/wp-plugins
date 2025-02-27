<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class revi_Widget extends WP_Widget
{
	//Constructor
	function __construct()
	{
		$this->revi_options = get_option('revi_options');
		$this->revi_configuration = get_option('revi_configuration');

		$widget_ops = array(
			'classname' => 'revi-io-customer-and-product-reviews',
			'description' => esc_html__('Displays Revi widget', 'revi-io-customer-and-product-reviews')
		);
		parent::__construct('revi_box', esc_html__('Revi Widget', 'revi-io-customer-and-product-reviews'), $widget_ops);
	}

	function widget($args, $instance)
	{
		if (!empty($instance['select'])) {
			$function = "revi_load_widget_" . esc_attr($instance['select']);
			if (function_exists($function)) {
				call_user_func($function);
			}
		}
	}

	// Update widget settings
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['select'] = isset($new_instance['select']) ? wp_strip_all_tags($new_instance['select']) : '';
		return $instance;
	}

	public function form($instance)
	{
		// Set widget defaults
		$defaults = array(
			'select'   => 'vertical',
		);
		// Parse current settings with defaults
		$instance = wp_parse_args((array) $instance, $defaults);
		$select = $instance['select'];
?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('select')); ?>">
				<?php esc_html_e('Select', 'revi-io-customer-and-product-reviews'); ?>
			</label>
			<select name="<?php echo esc_attr($this->get_field_name('select')); ?>" id="<?php echo esc_attr($this->get_field_id('select')); ?>" class="widefat">
				<?php
				// Your options array
				$options = array(
					'vertical' => esc_html__('Vertical', 'revi-io-customer-and-product-reviews'),
					'wide' => esc_html__('Wide', 'revi-io-customer-and-product-reviews'),
					'small' => esc_html__('Small', 'revi-io-customer-and-product-reviews'),
					'floating' => esc_html__('Floating', 'revi-io-customer-and-product-reviews'),
					'general' => esc_html__('General', 'revi-io-customer-and-product-reviews'),
				);

				// Loop through options and add each one to the select dropdown
				foreach ($options as $key => $name) {
					echo '<option value="' . esc_attr($key) . '" id="' . esc_attr($key) . '" ' . selected($select, $key, false) . '>' . esc_html($name) . '</option>';
				} ?>
			</select>
		</p>

<?php
	}
}
