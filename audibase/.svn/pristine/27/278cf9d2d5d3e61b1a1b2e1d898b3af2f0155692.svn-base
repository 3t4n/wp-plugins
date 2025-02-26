<?php
/*
Plugin Name: Audibase Twitter Audio Cards
Plugin URI: https://audibase.com
Description: Audibase audio social network. Record, Upload, Email, Share, Comment and Collaborate your Audio, works on all devices ipad, iphone, android etc...
Version: 1.9.4
Author: SoBytes
Author URI: http://www.sobytes.com/
License: GPL2
*/ 
 
/*  Copyright YEAR  Samuel East  (email : samuel.east@sobytes.com)

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

if (!class_exists("audibase")) {
	class audibase {
		
	    function audibase() { //constructor
		
			$this->__construct();

		}
		
		function __construct(){
			
			// Set Plugin Path  
			$this->pluginPath = dirname(__FILE__);  
	  
			// Set Plugin URL  
			$this->pluginUrl = WP_PLUGIN_URL . '/audibase';
			add_action('admin_menu', array( $this, 'audibase_admin_menu' ));
			add_action( 'wp_head', array( $this, 'include_js' ) );
			add_shortcode( 'audibase', array( $this, 'audibase_player' ) );
			
			
		} // function
		
		
		function include_js(){
			  echo '<script src="http://audibase.com/assets/js/audibase.js?ver=1.0" type="text/javascript"></script>';
		}
		
		function audibase_admin_menu()  
    	{	
			$icon_url = "https://s3-eu-west-1.amazonaws.com/isdcloud/audibase/wp_icon.png";
			add_menu_page( 'audibase', 'Audibase', 'manage_options', 'audibase', array($this, 'audibase_admin'), $icon_url );
    	}
		
		function audibase_admin(){	?>
			<style>
			.s3bubble-pre {
				white-space: pre-wrap; /* css-3 */
				white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
				white-space: -pre-wrap; /* Opera 4-6 */
				white-space: -o-pre-wrap; /* Opera 7 */
				word-wrap: break-word; /* Internet Explorer 5.5+ */
				background: #202020;
				padding: 15px;
				color: white;
			}
		</style>
			<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Audibase Audio Social Networking</h2>
	<h3><span>Manage all your audio in one place. Listen record and upload with your mobile. <a href="https://itunes.apple.com/gb/app/audibase-share-your-voice/id646322074?mt=8" target="_blank">iPhone App</a></span></h3>
	<h3><span>Send a audio tweet in 3 simple steps. <a href="https://itunes.apple.com/us/app/audio-tweets-by-audibase/id808729013?ls=1&mt=8" target="_blank">iPhone App</a></span></h3>
	
	<div class="metabox-holder has-right-sidebar">
		
		
		<div class="inner-sidebar">
			
			
              <div class="postbox">
              	<div class="inside">
              		
              	<h3><span>Please sign up for an account at <a href="https://audibase.com" target="_blank">https://audibase.com</a>.</span></h3>
					

              	<p><a class="button button-primary button-hero" target="_blank" href="https://audibase.com">SIGN UP FREE AUDIBASE</a></p>
              	
              	<p><a class="button button-primary button-hero" target="_blank" href="https://www.youtube.com/watch?v=Ic0m93rNx7I">WATCH TUTORIAL VIDEO</a></p>

				
				</div><!-- .inside -->
					
				
				</div>
 
		</div> <!-- .inner-sidebar -->
 
		<div id="post-body">
			<div id="post-body-content" >
				
				<div class="postbox">
				
				<div class="inside">
					<h3><span>Animated Gifs - CLICK TO VIEW</span></h3>
					<iframe frameborder="no" height="660" width="660" scrolling="no" src="//audibase.com/audi/12008"></iframe>
					<p><a href="https://twitter.com/HelloAudibase/status/446673590130573312" target="_blank">View how this looks on twitter.</a></p>
					<h3><span>EXAMPLE AUDIO EMBED CARD</span></h3>
					<iframe frameborder="no" height="660" width="660" scrolling="no" src="//audibase.com/card/3052"></iframe>
				    <h3><span>Example embed code - simply grab your from your Audibase account and add to any post page widget...</span></h3>
				    <blockquote>
				    	Each player can be resize to suit your website design.
				    </blockquote>
				
				<div class="inside">
					<pre class="s3bubble-pre">&lt;iframe frameborder=&quot;no&quot; height=&quot;660&quot; width=&quot;660&quot; scrolling=&quot;no&quot; src=&quot;//audibase.com/card/3052&quot;&gt;&lt;/iframe&gt;</pre>
				</div>
				</div> 
			</div>
				
				
			</div> <!-- #post-body-content -->
		</div> <!-- #post-body -->
 
	</div> <!-- .metabox-holder -->
	
</div> <!-- .wrap -->


		  
		<?php } 
	  
	   function audibase_player($atts){ 	
		    if(isset($atts['circle'])){   
				return '<iframe scrolling=no seamless frameBorder="0" src="http://audibase.com/circle?p=' . $atts['album'] . (isset($atts['size']) ? '&size=' . (($atts['size'] > 400) ? 400 : $atts['size']) : '') . '" style="display:block; float: left; width:' . (isset($atts['size']) ? (($atts['size'] > 400) ? 400 : $atts['size']) . 'px' : '300px') . '; height:' . (isset($atts['size']) ? (($atts['size'] > 400) ? 400 : $atts['size']) . 'px' : '300px') . '; margin:' . $atts['space'] . ';"></iframe>';		
			}elseif(isset($atts['track']) && isset($atts['type']) && $atts['type'] == 'mini'){
				return '<iframe scrolling=no seamless frameBorder="0" src="http://audibase.com/minimal/v3/?p=' . $atts['album'] . '&t=' . $atts['track'] . '" style="display:block; width:100%!important; height:44px!important; margin:' . $atts['space'] . ';"></iframe>';
			}elseif(isset($atts['track']) && isset($atts['type']) && $atts['type'] == 'circle'){
				return '<iframe scrolling=no seamless frameBorder="0" src="http://audibase.com/circle?p=' . $atts['album'] . '&t=' . $atts['track'] . '&size=' . $atts['size'] . '" style="display: block; margin: ' . $atts['space'] . '; float: ' . $atts['float'] . ';" onload="audibaseCircle(this,' . $atts['size'] . ');"></iframe>';
			}elseif(isset($atts['track'])){
				return '<iframe scrolling=no seamless frameBorder="0" src="http://audibase.com/single/v3/?p=' . $atts['album'] . '&t=' . $atts['track'] . '" style="display:block; width:100%!important; height:100px!important; margin:' . $atts['space'] . ';"></iframe>';	   
			}else{ 
				return '<iframe id="audibase-player-' . $atts['album'] . '" scrolling=no seamless frameBorder="0" src="http://audibase.com/embed/v3/?p=' . $atts['album'] . '" style="width:100%!important; margin:' . $atts['space'] . ';" onload="ab(' . $atts['album'] . ');"></iframe>';	
		    } 
	   }

	}
// Initiate the class
$audibase = new audibase();
add_action( 'widgets_init', create_function( '', 'register_widget( "audibase_widget" );' ) );
} //End Class audibase

/**
 * Adds Foo_Widget widget.
 */
class audibase_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'audibase_widget', // Base ID
			'Audibase', // Name
			array( 'description' => __( 'Audibase Cloud Player', 'text_domain' ), ) // Args
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
		$autoplay = apply_filters( 'autoplay', $instance['autoplay'] );
		$s3folder = $instance['s3folder'];
		$track = $instance['track'];
		echo $before_widget;
		    if(isset($track) && $track != ''){   
				echo '<iframe scrolling=no seamless frameBorder="0" src="http://audibase.com/single/v3/?p=' . $s3folder . '&t=' . $track . '" style="display:block; width:100%!important; height:100px!important;"></iframe>';	   
			}else{ 
				echo '<iframe id="audibase-player-' . $s3folder . '" scrolling=no seamless frameBorder="0" src="http://audibase.com/embed/v3/?p=' . $s3folder . '" style="width:100%!important;" onload="ab(' . $s3folder . ');"></iframe>';	
		    } 	
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
	public function update(  $new_instance, $old_instance  ) {
		$instance = $old_instance;
		$instance = array();
		$instance['autoplay'] = strip_tags( $new_instance['autoplay'] );
		$instance['s3folder'] = strip_tags( $new_instance['s3folder'] );
		$instance['track'] = strip_tags( $new_instance['track'] );
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
		
		if ( isset( $instance[ 'autoplay' ] ) ) {
			$autoplay = $instance[ 'autoplay' ];
		}
		else {
			$autoplay = __( 'false', 'text_domain' );
		}
		if ( isset( $instance[ 's3folder' ] ) ) {
			$s3folder = $instance[ 's3folder' ];
		}
		else {
			$s3folder = __( '', 'text_domain' );
		}
		if ( isset( $instance[ 'track' ] ) ) {
			$track = $instance[ 'track' ];
		}
		else {
			$track = __( '', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'autoplay' ); ?>"><?php _e( 'Autoplay:true/false' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'autoplay' ); ?>" name="<?php echo $this->get_field_name( 'autoplay' ); ?>" type="text" value="<?php echo esc_attr( $autoplay ); ?>" />
		</p>
         <p>
		<label for="<?php echo $this->get_field_id( 's3folder' ); ?>"><?php _e( 'Album - ID' ); ?> <a href="http://audibase.com/help#lA" target="_blank">Help finding ID?</a></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 's3folder' ); ?>" name="<?php echo $this->get_field_name( 's3folder' ); ?>" type="text" value="<?php echo esc_attr( $s3folder ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'track' ); ?>"><?php _e( 'Track - ID (optional)' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'track' ); ?>" name="<?php echo $this->get_field_name( 'track' ); ?>" type="text" value="<?php echo esc_attr( $track ); ?>" />
		</p>
		<?php 
	}

} // class audibase widget