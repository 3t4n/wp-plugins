<?php

/**
 * Class used to implement a Meta widget instead of extended the core Widget Class.
 *
 * @ TODO Extends WP_Widget_Meta directly?
 * @since 4.4.0
 */
class srtx_allegro_symc_widget extends WP_Widget{
	
	/**
	 * Sets up a new widget instance
 	 *
	 * Thank you to dsmiller for fixing the deprecated constructor
	 *
	 * @See https://wordpress.org/support/topic/updated-constructor?replies=4#post-8147479
 	 */
	public function __construct() {
		// set widget options
		$widget_ops = array (
			'classname' => 'srtx_allegro_symc_widget',
			'description' => __( 'Lista aukcji allegro.', 'srtx_allegro_symc_widget' ),
			'customize_selective_refresh' => true
		);
		parent::__construct( 'srtx_allegro_symc_widget', __('Aukcje Allegro', 'srtx_allegro_symc_widget'), $widget_ops );
	}
	
	/**
	 * Outputs the content for the current Custom Meta widget instance.
	 *
	 * @param array $args     	Display arguments ('before_title', 'after_title', 'before_widget', 'after_widget')
	 * @param array $instance	Settings for the current Custom Meta widget instance.
	 */
	public function widget( $args, $instance ) {
   		// extract( $args, EXTR_SKIP ); // extract arguments

		/** If no title, use default */
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Meta', 'srtx_allegro_symc_widget' );
		$directory = ! empty( $instance['directory'] ) ? $instance['directory'] : __( 'directoy', 'srtx_allegro_symc_widget' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		/** Before widgets filter */
	 	echo '<!--' . PHP_EOL . __( 'Plugin: Custom Meta Widget', 'srtx_allegro_symc_widget' ) . PHP_EOL .
		__( 'Plugin URL', 'srtx_allegro_symc_widget' ) . ': ' . $this->homepage .
		PHP_EOL . '-->' . PHP_EOL . $args['before_widget'];

		/** Title filter */
		if ( $title ) { echo $args['before_title'] . $title . $args['after_title']; }
		
		?>
		<ul>
		
		<?php
			
			$auctions = new EStrixAllegroSymcAuctions();
						
			foreach ($auctions->get_last_items() as $key => $value) {
				echo "<li><img src='" . $value['auction_img_1_url'] . "'/>" . $value['auction_title'] . "</li>";
			}
			
			
		?>
		</ul>

	<?php echo $args['after_widget'];

}



/**
 * Declare Form Input Options
 * (not part of vanilla WP_Widget class)
 */
function get_options() {
	$keys = array( 'slug', 'type', 'default', 'label', 'before' );

	$values = array(
		'title' => array( 'title', 'text', __( 'Meta', 'srtx_allegro_symc_widget' ), __( 'Title', 'srtx_allegro_symc_widget' ), '' ),
	);

	// build into multi-array
	$options = array();
	foreach( $values as $slug => $sub_values ) {
		$temp = array();
		for( $i=0; $i<5; $i++ ){
			$temp[$keys[$i]] = $sub_values[$i];
		}
		$options[$slug] = $temp;
	}
	return $options;
}


/**
 * Declare Form Input Defaults
 * (not part of WP_Widget Class)
 */
function get_defaults() {
	// create container and loop
	$defaults = array();
	foreach( $this->get_options() as $key => $value )
		$defaults[$key] = $value['default'];
	return $defaults;
}


/**
 * Declare Form Input Keys
 * (not part of WP_Widget Class)
 */
function get_keys() {
	// create container and loop
	$keys = array();
	foreach( $this->get_options() as $key => $value )
			$keys[] = $key;
	return $keys;
}


/**
 * Draw Widget Options
 */
function form( $instance ) {
	// parse instance values over defaults
	$instance = wp_parse_args( ( array ) $instance, $this->get_defaults() );

	// loop through input option
	foreach( $this->get_options() as $slug => $value ) :
		extract( $value );
		$id = $this->get_field_id( $slug );
		$name = $this->get_field_name( $slug );
		if( $type == 'text' ) {
			$value = $instance[$slug];
			$checked = '';
			$label = $label . ': ';
		} else {
			$checked = checked( $instance[$slug], 1, false );
			$value = 1;
		}
		$label_tag = '<label style="margin:0 3px;" for="' . $id . '">' . $label . '</label>';
		?>

	<p<?php echo $before; ?>><?php echo ( $type == 'text' ? $label_tag : '' ); ?><input class="<?php echo ( $type == 'text' ? 'widefat' : 'check' ); ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" type="<?php echo $type; ?>" value="<?php echo $value; ?>"/></p>

	<?php endforeach; ?>

	<?php // check for errors
	
	if( isset( $message ) ) // set message (or don't)
		echo '<p style="color:#f00; font-weight:bold;" >' . __( $message, 'fileListWidget' ) . '</p>';
}


/**
 * SAVE WIDGET OPTIONS
 */
function update( $new_instance, $old_instance) {
	$instance = $old_instance; // move over unchanged

	foreach( $this->get_keys() as $key ) // parse new values over
		$instance[$key] = $new_instance[$key];

	return $instance;
}


} // end class


/**
 * Unregister WP_Widget_Meta
 */
function srtx_allegro_symc_widget_swap() {
	unregister_widget( 'WP_Widget_Meta' );
	register_widget( 'srtx_allegro_symc_widget' );
} add_action( 'widgets_init', 'srtx_allegro_symc_widget_swap' ); // hook

/**
 * Load TextDomain
 */
function srtx_allegro_symc_widget_i18n() {
	load_plugin_textdomain( 'srtx_allegro_symc_widget', NULL, trailingslashit( basename( dirname(__FILE__) ) ) . 'lang' );
} add_action( 'plugins_loaded', 'srtx_allegro_symc_widget_i18n' ); // hook
