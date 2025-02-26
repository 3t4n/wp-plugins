<?php 
// Creating the widget 
class allsocialfeed_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'allsocialfeed_widget',  
			__('All in one Social Feeds', 'allsocialfeed_widget_domain'),  
			array( 'description' => __( 'All in one Social Feeds', 'allsocialfeed_widget_domain' ), ) 
		);
	} 
	 
	public function widget( $args, $instance ) {
		require_once AIOSF_PAGE_DIR."template.php";
	} 
	 
	// Widget Backend 
	public function form( $instance ) { 
		?><p>All in one Social Feeds</p>
	<?php 
	} 
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array(); 
		return $instance;
	}

}
// Register and load the widget
function allsocialfeed_load_widget() {
	register_widget( 'allsocialfeed_widget' );
}
?>