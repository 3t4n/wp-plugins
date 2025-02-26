<?php
/*
Plugin Name: 12seconds Widget
Plugin URI: http://www.turingtarpit.com/2009/03/12seconds-widget/
Description: Adds a sidebar widget to display <a href="http://12seconds.tv">12seconds</a> video status updates. Also provides shortcodes to embed the widget or individual videos in posts and pages.
Version: 0.3.1
Author: Chandima Cumaranatunge
Author URI: http://www.turingtarpit.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//error_reporting(E_ALL);

add_action( 'widgets_init', array( TwelveSecondsWidget::ID, 'register' ));
register_activation_hook( __FILE__, array( TwelveSecondsWidget::ID, 'activate' ));
register_deactivation_hook( __FILE__, array( TwelveSecondsWidget::ID, 'deactivate'));

/* shortcodes */
add_shortcode('12s', array( TwelveSecondsWidget::ID, 'tag' )); // deprecated
add_shortcode('12suser', array( TwelveSecondsWidget::ID, 'tag_user' ));
add_shortcode('12svideo', array( TwelveSecondsWidget::ID, 'tag_video' ));

class TwelveSecondsWidget 
{
	const	ID 			= 'TwelveSecondsWidget';
	const	NAME 		= '12seconds Widget';

	function activate()
	{
		$defaults = array( 
				'title' => __('12seconds Widget'), 
				'username' => '',
				'size' => 'skinny' );
		if ( ! get_option( self::ID ))
		{
		  add_option( self::ID , $defaults);
		} else {
		  update_option( self::ID , $defaults);
		}
	}
  
	function deactivate()
	{
		delete_option( self::ID );
	}
	
	function control()
	{
		$options = get_option( self::ID );
		?>
        <p><label><?php _e('Title:'); ?><input class="widefat" name="<?php echo self::ID.'_title' ; ?>" 
        	type="text" value="<?php echo $options['title']; ?>" /></label></p>
        <p><label><?php _e('12seconds username:'); ?><input class="widefat" name="<?php echo self::ID.'_username' ; ?>" 
        	type="text" value="<?php echo $options['username']; ?>" />
        </label></p>
        <fieldset>
        <legend><?php _e('Widget size:'); ?></legend>
        <p><label>
        <input class="radio" type="radio" name="<?php echo self::ID.'_size' ; ?>"  value="skinny" 
			<?php checked( $options['size'], 'skinny' ); ?> />&nbsp;<?php _e('Skinny (175x290)'); ?></label><br/>
        <label>
        <input class="radio" type="radio" name="<?php echo self::ID.'_size' ; ?>"  value="fat" 
			<?php checked( $options['size'], 'fat' ); ?>/>&nbsp;<?php _e('Fat (380x440)'); ?></label></p>
        </fieldset>
        <?php
	   	if ( isset( $_POST[ self::ID.'_username' ]))
		{
			$options['title'] = attribute_escape($_POST[ self::ID.'_title' ]);
			$options['username'] = attribute_escape($_POST[ self::ID.'_username' ]);
			$options['size'] = attribute_escape($_POST[ self::ID.'_size' ]);
			update_option( self::ID, $options );
	  	}
	}
	
	function display( $args = array() )
	{
		extract( $args );
		$options = get_option( self::ID );
	
		$title = empty( $options['title'] ) ? '' : apply_filters('widget_title', $options['title']);
		$username = $options['username'];
		$size = $options['size'];
	
		echo $args['before_widget'];
		
		
		if ( !empty( $title ) )
		{ 
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		echo self::getWidgetCode( $username, $size, null);
		
		echo $args['after_widget'];
	}
	
	function getWidgetCode( $username, $size, $video  )
	{
		if ( empty( $video ) )
		{
			if ( empty( $username ) )
			{ 
				return __('<p><strong>ERROR:</strong> 12seconds <em>username</em> not specified.</p>');
			} else {
				switch ( strtolower( $size )) 
				{
					case 'skinny':
						return '<iframe class="twelve-s-widget" src="http://embed.12seconds.tv/i/widgetSmall?u='.$username.'" scrolling="no" allowtransparency="true" frameborder="0" width="175" height="290"></iframe>';
						break;
					case 'fat':
						return '<iframe class="twelve-s-widget" src="http://embed.12seconds.tv/i/widgetFull?u='.$username.'" scrolling="no" allowtransparency="true" frameborder="0" width="380" height="440"></iframe>';
						break;
				}
			}
		} else {
			return '<iframe class="twelve-s-widget" src="http://embed.12seconds.tv/i/embed?v='.$video.'" scrolling="no" allowtransparency="true" frameborder="0" width="430" height="360"></iframe><span class="twelve-s-caption"><br/>From <a href="http://12seconds.tv">12seconds.tv</a></span>';
		}
	}
	
	// [12s username="some_username" size="fat"] -- *** DEPRECATED ***
	function tag( $args = array(), $content = null ) 
	{
		$defaults = array( 
				'username' => '',
				'size' => 'skinny', 
				'video' => '' );
		extract(shortcode_atts( $defaults, $args ));
		return self::getWidgetCode( $username, $size, $video );
	}
	
	
	// [12s-user uname="some_username" size="fat"]
	function tag_user( $args = array(), $content = null ) 
	{
		$defaults = array( 
				'username' => '',
				'size' => 'skinny');
		extract(shortcode_atts( $defaults, $args ));
		return self::getWidgetCode( $username, $size, null );
	}
	
	// [12s-video uname="some_username" size="fat"]
	function tag_video( $args = array(), $content = null ) 
	{
		$defaults = array( 'id' => '' );
		extract(shortcode_atts( $defaults, $args ));
		return self::getWidgetCode( null, null, $id );
	}
	
	function register()
	{
		register_sidebar_widget(self::NAME, array(self::ID, 'display'));
		register_widget_control(self::NAME, array(self::ID, 'control'));
	}
}



?>