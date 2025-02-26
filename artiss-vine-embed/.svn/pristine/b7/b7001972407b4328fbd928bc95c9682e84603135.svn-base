<?php
/**
* Widgets
*
* Create and display widgets
*
* @package	Artiss-Vine-Embed
*/

class VineEmbedWidget extends WP_Widget {

	/**
	* Widget Constructor
	*
	* Call WP_Widget class to define widget
	*
	* @since	1.0
	*
	* @uses		WP_Widget				Standard WP_Widget class
	*/

	function VineEmbedWidget() {
		parent::WP_Widget(	'vine_embed_widget',
							'Vine (Artiss Vine Embed)',
							array( 'description' => __( 'Embed a Vine video.', 'artiss-vine-embed' ), 'class' => 'my-widget-class' )
							);
	}

	/**
	* Display widget
	*
	* Display the Vine widget
	*
	* @since	1.0
	*
	* @uses		ave_generate_embed_code		Generate the required Vine code
	*
	* @param	string		$args			Arguments
	* @param	string		$instance		Instance
	*/

	function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		// Output the header
		echo $before_widget;

		// Extract title for heading
		$title = $instance[ 'titles' ];

		// Output title, if one exists
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

		$paras[ 'id' ] = $instance[ 'id' ];
		$paras[ 'size' ] = $instance[ 'size' ];
		$paras[ 'type' ] = $instance[ 'type' ];

		// Generate the video and output it
		echo ave_generate_embed_code ( $paras );

		// Output the trailer
		echo $after_widget;
	}

	/**
	* Widget update/save function
	*
	* Update and save widget
	*
	* @since	1.0
	*
	* @param	string		$new_instance		New instance
	* @param	string		$old_instance		Old instance
	* @return	string							Instance
	*/

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance[ 'titles' ] = strip_tags( $new_instance[ 'titles' ] );
		$instance[ 'id' ] = $new_instance[ 'id' ];
		$instance[ 'size' ] = $new_instance[ 'size' ];
		$instance[ 'type' ] = $new_instance[ 'type' ];

		return $instance;

	}

	/**
	* Widget Admin control form
	*
	* Define admin file
	*
	* @since	1.0
	*
	* @param	string		$instance		Instance
	*/

	function form( $instance ) {
		include ( WP_PLUGIN_DIR . '/artiss-vine-embed/includes/options-widgets.php' );
	}
}

/**
* Register Widget
*
* Register widget when loading the WP core
*
* @since	1.0
*/

function ave_register_widgets() {
	register_widget( 'VineEmbedWidget' );
}
add_action( 'widgets_init', 'ave_register_widgets' );
?>