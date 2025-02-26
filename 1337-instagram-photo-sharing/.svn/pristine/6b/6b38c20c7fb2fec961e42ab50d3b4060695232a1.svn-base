<?php
/*
Plugin Name: 1337 Instagram Photo Sharing
Plugin URI: 
Description: Made by an 1337 so the world can easily share ( Instagram Photo )
Version: 0.1.1
Author: codelyfe@gmail.com
Author URI: http://codelyfe.byethost3.com
Text Domain: 1337instagram
License: GPLv2 
 
Copyright 2017  http://codelyfe.byethost3.com
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

 
class eliteinstagram_widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'eliteinstagram_widget',
            __( '1337 instagram', '1337instagram' ),
            array(
                'classname'   => 'eliteinstagram_widget',
                'description' => __( 'Made by an 1337 so the world can easily share ( Search Results )', '1337instagram' )
                )
        );
       
        load_plugin_textdomain( '1337instagram', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
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
         
        $title      = apply_filters( 'widget_title', $instance['title'] );
		    $adspace    = $instance['adspace'];
		    $iframe    = $instance['iframe'];
		    $iframew    = $instance['iframew'];
		    $iframeh    = $instance['iframeh'];
		    $adlink    = $instance['adlink'];
		
        echo $before_widget;
         
        if ( $title ) {
            echo $before_title . $title . $after_title;
        }
                             

		echo "<style>.embed-container {position: relative; padding-bottom: 120%; height: 0; overflow: hidden;} .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='".$iframe."/embed/' frameborder='0' scrolling='no' allowtransparency='true'></iframe></div>";

		// WidgetWP
			echo '<br/>';
			echo '<center>';
			echo ' <div class="btn-group" role="group" aria-label="hmm...">';
			echo '<span>Share Instagram</span> ';
			echo '<a class="btn btn btn-secondary" style="box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.linkedin.com/shareArticle?mini=true&url='. $iframe .'&title='.$iframe.'" target="_blank"><i class="fa fa-linkedin" style="color:#0077B5;"></i></a>';
			echo '<a class="btn btn-secondary" style="box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='.$iframe.'" target="_blank"><i class="fa fa-twitter" style="color:#4099ff;"></i></a>';
			echo '<a class="btn btn-secondary" style="box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$iframe.'&u='.$iframe.'" target="_blank"><i class="fa fa-facebook" style="color:#3b5998;"></i></a>';
			echo '<a class="btn btn-secondary" style="box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://trello.com/add-card?mode=popup&url='.$iframe.'&name='.$iframe.'&desc='.$iframe.'" target="_blank"><i class="fa fa-trello" style="color:#4899ff;"></i></a>';
			echo '</div>';
			echo '</center>';
		
		// WidgetWP
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
         
        $instance = $old_instance;
         
        $instance['title'] = strip_tags( $new_instance['title'] );
		$instance['adspace'] = strip_tags( $new_instance['adspace'] );
		$instance['iframe'] = strip_tags( $new_instance['iframe'] );
		$instance['iframew'] = strip_tags( $new_instance['iframew'] );
		$instance['iframeh'] = strip_tags( $new_instance['iframeh'] );
		$instance['adlink'] = strip_tags( $new_instance['adlink'] );
        return $instance;
         
    }
  
    /**
      * Back-end widget form.
      *
      * @see WP_Widget::form()
      *
      * @param array $instance Previously saved values from database.
      */
	function wp_enqueue_style( $handle, $src = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', $deps = array(), $ver = false, $media = 'all' ) {
    _wp_scripts_maybe_doing_it_wrong( __FUNCTION__ );
 
    $wp_styles = wp_styles();
 
    if ( $src ) {
        $_handle = explode('?', $handle);
        $wp_styles->add( $_handle[0], $src, $deps, $ver, $media );
    }
    $wp_styles->enqueue( $handle );
    }  
	  
    public function form( $instance ) {    
     
        $title      = esc_attr( $instance['title'] );
		    $adspace    = esc_attr( $instance['adspace'] );
		    $iframe    = esc_attr( $instance['iframe'] );
		    $iframew    = esc_attr( $instance['iframew'] );
		    $iframeh    = esc_attr( $instance['iframeh'] );
		    $adlink    = esc_attr( $instance['adlink'] );
        ?>

		<br/>
        <i style="font-size:80px;" class="fa fa-grav" aria-hidden="true"></i>
		<span>Support <a href="http://codelyfe.byethost3.com">Codelyfe</a></span>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label  for="<?php echo $this->get_field_id('Iframe'); ?>"><?php _e('Instagram URL:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('iframe'); ?>" name="<?php echo $this->get_field_name('iframe'); ?>" type="text" value="<?php echo $iframe; ?>" />
        </p>
    <?php 
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'eliteinstagram_widget' );
});
