<?php
/**
 * Plugin Name: Power Box
 * Plugin URI: http://bimal.org.np/
 * Description: Widget to put power boxes in sidebars. After activation <a href="widgets.php">Appearance &gt; Widgets</a>, add and configure Power Box blocks.
 * Author: Bimal Poudel
 * Author URI: http://bimal.org.np/
 * Version: 1.0.0
 * License: GPL3
 */

class power_box extends WP_Widget
{
	/**
	 * Each of these placeholder hinting values should be setup within Widget Interface
	 */
	private $title = 'Power Box Works';
	private $power_url = 'http://bimal.org.np/micro-services/example.php';
	private $attribution_name = 'By - Bimal Poudel';
	private $attribution_url = 'http://bimal.org.np/';

	public function __construct() {
		parent::__construct(false, 'Power Box', array('description' => 'Displays almost any contents.'));
		add_action('widgets_init', array($this, 'register'));
	}

	public function register()
	{
		register_widget(__CLASS__);
	}

	public function form($instance)
	{
		$instance['title'] = !empty($instance['title'])?esc_attr($instance['title']):'';
		$instance['power_url'] = !empty($instance['power_url'])?esc_attr($instance['power_url']):'';
		$instance['attribution_name'] = !empty($instance['attribution_name'])?esc_attr($instance['attribution_name']):'';
		$instance['attribution_url'] = !empty($instance['attribution_url'])?esc_attr($instance['attribution_url']):'';
		?>
<p>
	<label for="<?php echo $this->get_field_id('title'); ?>">Content Heading *:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" placeholder="<?php echo $this->title; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('power_url'); ?>">Micro Content URL *: <a href="https://github.com/bimalpoudel/power-box/tree/master/documentation/setting-your-own-host.md" target="github">Learn More</a></label>
	<input class="widefat" id="<?php echo $this->get_field_id('power_url'); ?>" name="<?php echo $this->get_field_name('power_url'); ?>" type="text" value="<?php echo $instance['power_url']; ?>" placeholder="<?php echo $this->power_url; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('attribution_name'); ?>">Attribution Name (optional):</label>
	<input class="widefat" id="<?php echo $this->get_field_id('attribution_name'); ?>" name="<?php echo $this->get_field_name('attribution_name'); ?>" type="text" value="<?php echo $instance['attribution_name']; ?>" placeholder="<?php echo $this->attribution_name; ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id('attribution_url'); ?>">Attribution URL (optional):</label>
	<input class="widefat" id="<?php echo $this->get_field_id('attribution_url'); ?>" name="<?php echo $this->get_field_name('attribution_url'); ?>" type="text" value="<?php echo $instance['attribution_url']; ?>" placeholder="<?php echo $this->attribution_url; ?>" />
</p>

<h4>Help</h4>
<ul>
	<li><strong>Box's Heading</strong>: Widget Box's Title</li>
	<li><strong>Content URL</strong>: The actual remote tiny content<br>
		<a href="http://bimal.org.np/micro-services/one-liners.php" target="example">copy example</a> | 
		<a href="http://github.com/bimalpoudel/micro-services/" target="documentation">Documentation</a>
	</li>
	<li><strong>Attribution Name</strong>: Link back text</li>
	<li><strong>Attribution URL</strong>: URL to go there</li>
</ul>
		<?php
	}

	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['power_url'] = filter_var(strip_tags($new_instance['power_url']), FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);
		$instance['attribution_name'] = strip_tags($new_instance['attribution_name']);
		$instance['attribution_url'] = strip_tags($new_instance['attribution_url']);
		return $instance;
	}

	public function widget($args, $instance)
	{
		if(empty($instance['power_url'])) return false;
		$instance['power_url'] = filter_var($instance['power_url'], FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED);

		#print_r(func_get_args());
		echo $args['before_widget'];
		echo '<div class="widget-text power_box">';
			#$title = apply_filters('widget_title', $instance['title']);
			echo "<h3>{$instance['title']}</h3>";
			
			/**
			 * The actual remote content; should be valid URL to process
			 * @see https://vip.wordpress.com/documentation/best-practices/fetching-remote-data/
			 */
			$remote_content = wp_remote_fopen($instance['power_url']);
			echo "<div class='power_box_content'>{$remote_content}</div>";;
			
			if($instance['attribution_name'] && $instance['attribution_url'])
			{
				echo "<div class='power_box_attribution'><a href='{$instance['attribution_url']}'>{$instance['attribution_name']}</a></div>";
			}
		echo '</div>';
		echo $args['after_widget'];
	}
}

new power_box;
