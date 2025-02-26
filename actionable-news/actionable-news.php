<?php
/*
	Plugin Name: Actionable News
	Plugin URI: https://partners.whotrades.com/
	Description: WhoTrades Actionable News
	Version: 0.1.1
	Author: WhoTrades Inc
	Author URI: https://developers.whotrades.com/
	*/

	/* Start Adding Functions Below this Line */


	/* Stop Adding Functions Below this Line */

	add_action('wp_head', 'actionable_news_head');
	add_action('widgets_init', 'actionable_news_load_widget');

//	add_action('wp_footer', 'actioanble_news_footer');

// Creating the widget
class actionable_news_widget extends WP_Widget {

	function __construct() {
	parent::__construct(
	'actionable_news_widget',

	// Widget name will appear in UI
	__('Actionable News', 'actionable_news_widget_domain'),

	// Widget description
	array( 'description' => __( 'Actionable News', 'actionable_news_widget_domain' ), )
	);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
	$partner_id = $instance['partner_id'];

	// before and after widget arguments are defined by themes
	echo $args['before_widget'];

	if (!empty($partner_id)) {
		echo $args['before_title']
?>
	<link rel="stylesheet" href="//partners.whotrades.com/stcache/<?php echo substr($partner_id, 0, 2) . '/' . $partner_id; ?>.css">
	<style>
		.news-container {
   			position: fixed;
   			top: 0;
   			right: 0;
   			bottom: 0;
   			width: 300px;
		}
	</style>
<?php

	echo $args['after_title'];

	}
?>

	<div class="news-container"></div>

<?php


	echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
	if ( isset( $instance[ 'partner_id' ] ) ) {
		$partner_id = $instance[ 'partner_id' ];
	}
	else {
		$partner_id = null;
	}
	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'partner_id' ); ?>"><?php _e( 'Partner Id: (see <a href="https://partners.whotrades.com/" target="_blank">partners.whotrades.com</a>)' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'partner_id' ); ?>" name="<?php echo $this->get_field_name( 'partner_id' ); ?>" type="text" value="<?php echo esc_attr( $partner_id); ?>" />
	</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['partner_id'] = ( ! empty( $new_instance['partner_id'] ) ) ? strip_tags( $new_instance['partner_id'] ) : '';
	return $instance;
	}
} // Class actionable_news_widget ends here


// actionable_news_head
function actionable_news_head() {
?>

<!-- Added by Actionable News plugin -->
<script async src="//partners.whotrades.com/static/js/newsplugin.js" onload="newsfeed.init('.news-container')"></script>

<?
} // actionable_news_head

// Register and load the widget
function actionable_news_load_widget() {
	register_widget( 'actionable_news_widget' );
}

?>