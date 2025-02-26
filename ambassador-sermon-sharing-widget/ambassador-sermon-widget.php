<?php  
/* 
Plugin Name: Ambassador Sermon Widget
Plugin URI: http://www.ambassadorapp.com/
Description: A simple widget to share your Ambassador sermons with your Visitors.
Author: Kalen Kubik
Version:1.0
Author URI: http://twitter.com/kubikian
License: none
*/

/**
 * Adds Foo_Widget widget.
 */
class Ambassador_Sermons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Ambassador_Sermons', // Base ID
			__('Ambassador Sermons', 'text_domain'), // Name
			array( 'description' => __( 'Share your sermons online.', 'text_domain' ), ) // Args
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
		$title = apply_filters( 'widget_title', $instance['title'] );
		$sermons = apply_filters( 'widget_sermons', $instance['sermons'] );
		$subscribe = apply_filters( 'widget_subscribe', $instance['subscribe'] );

		echo $args['before_widget'];?>
        
        <style>
        	.sermonWidget{width:100%; background:#fff; color:#8DC63F;}
			.sermonWidget a, .sermonWidget h1{color:#8DC63F;}
			.sermonWidgetBox{width:90%; margin-left:5%; padding:15px 0;}
			.sermonWidgetTitle{width:100%; text-align:center; color:#8DC63F; border-bottom:1px solid #ccc;}
			.sermonWidgetList{width:100%;}
			.sermonWidgetLinks{width:100%; padding-top:10px; border-top:1px solid #ccc;}
			.sermonWidgetLinks .widgetLogo{float:left;}
			.sermonWidgetLinks .widgetLogo img{width:32px; height:32px;}
			.sermonWidgetLinks .widgetSubscribe{float:right; margin-top:5px;}
			.sermonWidgetLinks .clear{clear:both;}
			
        </style>
        
        <div class="sermonWidget">
        <div class="sermonWidgetBox">
  		<div class="sermonWidgetTitle">

        <?php
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title']; ?>
		</div>
         <div class="sermonWidgetList">
        
		<iframe src="
		<?php
		if ( ! empty( $sermons ) )
			echo $args['before_sermons'] . $sermons . $args['after_sermons']; ?>-narrow" width="100%" height="300" frameBorder="0"></iframe>
        </div>
        <div class="sermonWidgetLinks">
        	<div class="widgetLogo"><a href="http://www.AmbassadorApp.com"><img src="http://www.ambassadorapp.com/images/logo-coin.png" /></a></div>
            <div class="widgetSubscribe">
            	<a href="
				<?php
		if ( ! empty( $subscribe ) )
			echo $args['before_subscribe'] . $subscribe . $args['after_subscribe']; ?>"
            >subscribe</a>
            </div>
            <div class="clear"></div>
        </div>
        </div>
		</div>
		<?php
		
		//echo __( 'Hello, World!', 'text_domain' );
		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'My Sermons', 'text_domain' );
		}
		
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
       
	   
	   <?php
       if ( isset( $instance[ 'sermons' ] ) ) {
			$sermons = $instance[ 'sermons' ];
		}
		else {
			$sermons = __( 'Get iFrame Embed from Tools Panel', 'text_domain' );
		}?>
        
        	<p>
		<label for="<?php echo $this->get_field_id( 'sermons' ); ?>"><?php _e( 'Sermon Embed Link' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'sermons' ); ?>" name="<?php echo $this->get_field_name( 'sermons' ); ?>" type="text" value="<?php echo esc_attr( $sermons ); ?>">
		</p>
        
        <?php
		if ( isset( $instance[ 'subscribe' ] ) ) {
			$subscribe = $instance[ 'subscribe' ];
		}
		else {
			$subscribe = __( 'Get subscribe page link from Member page.', 'text_domain' );
		}
       
       ?>
       
       	<p>
		<label for="<?php echo $this->get_field_id( 'subscribe' ); ?>"><?php _e( 'Subscribe Link' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'subscribe' ); ?>" name="<?php echo $this->get_field_name( 'subscribe' ); ?>" type="text" value="<?php echo esc_attr( $subscribe ); ?>">
		</p>
       
		<?php 
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['sermons'] = ( ! empty( $new_instance['sermons'] ) ) ? strip_tags( $new_instance['sermons'] ) : '';
		$instance['subscribe'] = ( ! empty( $new_instance['subscribe'] ) ) ? strip_tags( $new_instance['subscribe'] ) : '';

		return $instance;
	}

} // class Ambassador_Sermons

// register widget
function register_ambassador_Sermons() {
    register_widget( 'Ambassador_Sermons' );
}
add_action( 'widgets_init', 'register_ambassador_sermons' );