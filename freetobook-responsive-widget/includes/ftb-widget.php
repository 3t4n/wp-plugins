<?php

class FTB_Widget extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = __('Freetobook Responsive Widget', 'FTB_Widget'));
    }

	function widget($args, $instance) {
		$widgetToken = get_option('ftb_widget_token');
		$widgetId = get_option('ftb_widget_id');

		$this->render_widget_html($widgetId, $widgetToken);
    }

	function render_widget_html($widgetId, $widgetToken) {
		echo "<div class='ftb-widget' data-id='" . esc_attr($widgetId) . "' data-token='" . esc_attr($widgetToken) . "'></div>";
	}
}
