<?php
class Axcoto_Slideshow_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'Axcoto-Slideshow', 'description' => 'A cool Flashslideshow' );
		parent::__construct('axcoto-slideshow', "Axcoto Slideshow", $widget_opts);
	}

	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
		!empty($instance['galleryFile']) && Axcoto_Slideshow::getSingleton()->renderWidgetContent($instance, $this);
		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['galleryFile'] = $new_instance['galleryFile'];
		if (!empty($new_instance['galleryFile'])) {
			Axcoto_Slideshow::getSingleton()->saveWidgetSetting($new_instance, $this);
		}
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {
		$instance = wp_parse_args($instance, array('title' => 'Axcoto Slideshow', 'galleryFile' => ''));
		Axcoto_Slideshow::getSingleton()->renderWidgetSetting($instance, $this);
	}

}
?>