<?php
/*
Plugin Name: 1337 Social Sharing
Plugin URI: 
Description: Made by an 1337 so the world can easily share ( Your Page )
Version: 0.3.3
Author: codelyfe@gmail.com
Author URI: https://codelyfe.github.io
Text Domain: 1337socialsharing
License: GPLv2 
 
Copyright 2022  https://codelyfe.github.io
 
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

/*EDIT LAST 11/10/2022*/  

class elitesocialsharing_widget extends WP_Widget {
 
    public function __construct() {
     
        parent::__construct(
            'elitesocialsharing_widget',
            __( '1337 Social Sharing', '1337socialsharing' ),
            array(
                'classname'   => 'elitesocialsharing_widget',
                'description' => __( 'Made by an 1337 so the world can easily share ( Your Page )', '1337socialsharing' )
                )
        );
       
        load_plugin_textdomain( '1337socialsharing', false, basename( dirname( __FILE__ ) ) . '/languages' );
       
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
                             
        //echo $message;
		//echo '<center><iframe width="100%" height="500" src="https://duckduckgo.com/?q='.$iframe.'&t=hq&ia=web"></iframe></center>';
		//echo '<center><a href="'.$adlink.'"><img border="0" alt="W3Schools" src="'.$iframe.'" width="100%" height="100%"></a></center>';
		//echo '<center><img src="'.$adspace.'" alt="..." class="img-thumbnail"></center>';
		//echo "<style>.embed-container {position: relative; padding-bottom: 120%; height: 0; overflow: hidden;} .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='".$iframe."/embed/' frameborder='0' scrolling='no' allowtransparency='true'></iframe></div>";
		//echo '<center><a rel="nofollow" href="'.$iframe.'" border="0" style="cursor:default"><img src="https://chart.googleapis.com/chart?cht=qr&amp;chl='.$iframe.'&amp;chs=180x180&amp;choe=UTF-8&amp;chld=L|2" alt=""></a></center>';
		
		

		// WidgetWP
			echo '<br/>';
			echo '<center>';
			echo ' <div class="btn-group" role="group" aria-label="hmm...">';
			echo '<h3>Share Our Page</h3> ';
			//
      echo '<a class="btn btn btn-secondary" style="text-decoration: none;font-size:40px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.linkedin.com/shareArticle?mini=true&url='. $iframe .'&title='.$iframe.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Linkedin.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;font-size:40px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://twitter.com/intent/tweet?text='.$twittertext.'&hashtags='.$socialbtntwitterhashtag.'&url='.$iframe.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Twitter.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;font-size:40px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&title='.$iframe.'&u='.$iframe.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Facebook.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';		
      //
      echo '<a class="btn btn-secondary" style="text-decoration: none;font-size:40px;box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0), 0 1px 2px rgba(0, 0, 0, 0);border: 1px solid rgba(204, 204, 204, 0);border-bottom-color: rgba(179, 179, 179, 0);background-color: rgba(245, 245, 245, 0);background-image: linear-gradient(to bottom,rgba(255, 255, 255, 0),rgba(230, 230, 230, 0));" href="https://trello.com/add-card?mode=popup&url='.$iframe.'&name='.$iframe.'&desc='.$iframe.'" target="_blank">';  echo '<img src="' . plugins_url( 'icons/Trello.png', __FILE__ ) . '" style="width:25px;height:25px;" > '; echo '</a>';
			//
      echo '</div>';
			echo '</center>';
			//echo '<br/>';
		    
        //echo '<center>';		
		    //echo '<iframe src="https://www.facebook.com/plugins/like.php?href='.$iframe.'&width=133&layout=button_count&action=like&size=large&show_faces=true&share=true&height=46&appId" width="133" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
		    //echo '</center>';
		
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
		<span>Support <a href="http://codelyfe.byethost3.com" target="_blank">Codelyfe</a></span>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label  for="<?php echo $this->get_field_id('Iframe'); ?>"><?php _e('Site URL:'); ?></label> 
            <input placeholder="http://codelyfe.byethost3.com" class="widefat" id="<?php echo $this->get_field_id('iframe'); ?>" name="<?php echo $this->get_field_name('iframe'); ?>" type="text" value="<?php echo $iframe; ?>" />
        </p>
    <?php 
    }
     
}
 
/* Register the widget */
add_action( 'widgets_init', function(){
     register_widget( 'elitesocialsharing_widget' );
});
