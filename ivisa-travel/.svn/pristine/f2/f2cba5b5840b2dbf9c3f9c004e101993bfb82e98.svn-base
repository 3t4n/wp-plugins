<?php
/**
 * Class iVisaPluginWidget allows showing one of your slideshows in your widget area.
 *
 * @since 1.2.0
 * @author: Stefan Boonstra
 */
class iVisaPluginWidget extends WP_Widget
{
	/** @var string $widgetName */
	static $widgetName = 'iVisa';

	/**
	 * Initializes the widget
	 *
	 * @since 1.2.0
	 */
	function iVisaPluginWidget()
	{
		// Settings
		$options = array(
			'classname'   => 'ivisaWidget',
			'description' => __('Enables you to show the iVisa widget in your sidebar or footer', 'ivisa')
		);

		// Create the widget.
		parent::__construct(
			'ivisaWidget',
			__('iVisa Widget', 'ivisa'),
			$options
		);
	}

	/**
	 * The widget as shown to the user.
	 *
	 * @since 1.2.0
	 * @param mixed array $args
	 * @param mixed array $instance
	 */
	function widget($args, $instance)
	{
		// Get title
		$title = '';
		if (isset($instance['title']))
		{
			$title = $instance['title'];
		}
    
		// Prepare slideshow for output to website.
		$output = Ivisa_Public::widget_html(array('echo'=>false, 'size'=> isset($instance['size'])? $instance['size'] : 'tall'));

		$beforeWidget = $afterWidget = $beforeTitle = $afterTitle = '';
		if (isset($args['before_widget']))
		{
			$beforeWidget = $args['before_widget'];
		}

		if (isset($args['after_widget']))
		{
			$afterWidget = $args['after_widget'];
		}

		if (isset($args['before_title']))
		{
			$beforeTitle = $args['before_title'];
		}

		if (isset($args['after_title']))
		{
			$afterTitle = $args['after_title'];
		}
    
    $plugin_options = get_option('ivisa');
    $url = 'https://www.ivisa.com/' . ( (isset($plugin_options['affiliate_code']) && strlen($plugin_options['affiliate_code']))? '?utm_source='.$plugin_options['affiliate_code'].'&utm_medium=wp_plugin' : '');
    $image = '<img src="data:image/png;base64,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" />';
    if(isset($plugin_options['show_powered_by']) && $plugin_options['show_powered_by'])
      $image = '<a href="'.$url.'" target="_blank">' . $image . '</a>';
    
    $title = $image . ' &nbsp;'.$title;
    
		// Output widget
		echo $beforeWidget . (!empty($title) ? $beforeTitle . $title . $afterTitle : '') . $output . $afterWidget;
	}

	/**
	 * The form shown on the admins widget page. Here settings can be changed.
	 *
	 * @since 1.2.0
	 * @param mixed array $instance
	 * @return string
	 */
	function form($instance)
	{
		// Defaults
		$defaults = array(
			'title'       => __('Need a Travel Visa?', 'ivisa'),
      'size'        => 'tall',
		);

		// Merge database settings with defaults
		$instance = wp_parse_args((array) $instance, $defaults);

		$data              = new stdClass();
		$data->widget      = $this;
		$data->instance   = $instance;

		// Include form
		Ivisa_Public::outputView('widget_info.php', $data);
	}

	/**
	 * Updates widget's settings.
	 *
	 * @since 1.2.0
	 * @param mixed array $newInstance
	 * @param mixed array $instance
	 * @return mixed array $instance
	 */
	function update($newInstance, $instance)
	{
		// Update title
		if (isset($newInstance['title']))
		{
			$instance['title'] = $newInstance['title'];
		}
    if (isset($newInstance['size']))
		{
			$instance['size'] = $newInstance['size'];
		}

		// Save
		return $instance;
	}

	/**
	 * Registers this widget (should be called upon widget_init action hook)
	 *
	 * @since 1.2.0
	 */
	static function registerWidget()
	{
		register_widget(__CLASS__);
	}
}