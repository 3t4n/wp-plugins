<?php
class RsDuplicatePageWidget extends WP_Widget {
    function __construct() {
        parent::__construct( false, 'RS Duplicate Page SEO Widget' );
    }

    function widget( $args, $instance ) {
    	
		global $wpdb;
		
        extract($args);
        echo $before_widget;
        echo $before_title.$instance['page_id'].$after_title;

        //DA QUI INIZIA IL WIDGET VERO E PROPRIO
        
        $duplicates_row = $wpdb->get_results( 'SELECT * FROM wp_duplicate_page WHERE page_id = ' . $instance['page_id'], 'ARRAY_A' );	
		 
		if( sizeof($duplicates_row) > 0 ){
		 	foreach( $duplicates_row AS $row ){
		 		$page = get_post($row['sub_page']);
				?>
					<a href="<?php echo get_permalink( $page->ID ); ?>" title="<?php echo $page->post_title; ?>"><?php echo $page->post_title; ?></a>
				<?php
			}
		}
        
        //FINE WIDGET

        echo $after_widget;
    }
    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
	
	function form( $instance ) {
        $page_id = esc_attr($instance['page_id']); 
    ?>
        <p><label for="<?php echo $this->get_field_id('page_id');?>">
        Id PAGINA: <input class="widefat" id="<?php echo $this->get_field_id('page_id');?>" name="<?php echo $this->get_field_name('page_id');?>" type="text" value="<?php echo $page_id; ?>" />
        </label></p>
        <?php
	} 
} 

function rs_duplicate_widget() {
	 register_widget( 'RsDuplicatePageWidget' ); 
}
 
add_action( 'widgets_init', 'rs_duplicate_widget' ); 

?>