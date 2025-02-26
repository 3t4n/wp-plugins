<?php
/*
Plugin Name: Ads Widgets Easy
Plugin URI: http://wordpress.org/plugins/Ads-Widgets-Easy/
Description: With this plugin you can create unlimited number of ads inside your WordPress widget. There are several smart options provided to customize ads for your needs.
Version: 2.0
Author: Nguyen Ngoc Linh
Author URI: http://mauwebsitedep.com/gioi-thieu
 */
 
 class image_widget extends WP_Widget {
 
	/**
	 * Register widget with WordPress.
	 */
public function __construct() {
		parent::__construct(
	 		'image_widget', // Base ID
			'Ads Widgets Easy', // Name
 
			array( 'description' => __( 'A widget to upload image. Ads Widgets Easy', 'shopwordpress' ), ) // Args
		);
	}
 
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$name = apply_filters( 'widget_name', $instance['name'] );
		$link = apply_filters( 'widget_link', $instance['link'] );
		$image_uri = apply_filters( 'widget_image_uri', $instance['image_uri'] );
		echo $before_widget; ?>
        
        	<a title="<?php echo $name;?>" href="<?php echo esc_url($instance['link']); ?>"><img alt="<?php echo $name;?>" src="<?php echo esc_url($instance['image_uri']); ?>" /></a>
        
    <?php
		echo $after_widget;
	}
 
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
		$instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
		$instance['image_uri'] = ( ! empty( $new_instance['image_uri'] ) ) ? strip_tags( $new_instance['image_uri'] ) : '';
		return $instance;
	}
 
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        if ( isset( $instance[ 'image_uri' ] ) ) {
			$image_uri = $instance[ 'image_uri' ];
		}
		else {
			$image_uri = __( '', 'shopwordpress' );
		}
		if ( isset( $instance[ 'name' ] ) ) {
			$name = $instance[ 'name' ];
		}
		else {
			$name = __( 'New title for a=>html, img=>alt', 'shopwordpress' );
		}
		if ( isset( $instance[ 'link' ] ) ) {
			$link = $instance[ 'link' ];
		}
		else {
			$link = __( 'http://', 'shopwordpress' );
		}
		
		?>
		<p>
      <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Title', 'shopwordpress'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('name'); ?>" id="<?php echo $this->get_field_id('name'); ?>" value="<?php echo $name; ?>" class="widefat" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'shopwordpress'); ?></label><br />
      <input type="text" name="<?php echo $this->get_field_name('link'); ?>" id="<?php echo $this->get_field_id('link'); ?>" value="<?php echo $link; ?>" class="widefat" />
    </p>
    
    <p>
      <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
        <img class="custom_media_image" src="<?php echo $image_uri; ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
        <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $image_uri; ?>">
       </p>
       <p>
        <input type="button" value="<?php _e( 'Upload Image', 'shopwordpress' ); ?>" class="button custom_media_upload" id="custom_image_uploader"/>
    </p>
		<?php 
	}
	
}
add_action( 'widgets_init', create_function( '', 'register_widget( "image_widget" );' ) );
function shopwordpress_wdScript(){
  wp_enqueue_media();
  wp_enqueue_script('adsScript', plugins_url( '/js/ads-widgets-easy.js' , __FILE__ ));
}
add_action('admin_enqueue_scripts', 'shopwordpress_wdScript');