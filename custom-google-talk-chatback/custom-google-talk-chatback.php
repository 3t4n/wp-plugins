<?php
/*
Plugin Name: Custom Google Talk Chatback
Plugin URI: http://intervaro.se/custom-google-talk-chatback-wordpress-plugin
Description: This plugin makes it easy to add a link to chat with you via Google Talk Chatback. Supports Widgets and Shortcodes atm.
Author: Intervaro Web Agency in Lund, Sweden
Version: 1.2.1
Requires at least: 2.8
Author URI: http://intervaro.se
License: GPL
*/

require_once plugin_dir_path(__FILE__).'class-google-talk-status.php';

// load translation files, if exists
function cgtc_load_translation_file() {
    $plugin_path = plugin_basename( dirname( __FILE__ ) .'/translations' );
    load_plugin_textdomain( 'cgtc', '', $plugin_path );
}
add_action( 'init', 'cgtc_load_translation_file' );


/****************************************************
 * Widget Support
 ****************************************************/

class GoogleTalkWidget extends WP_Widget {

	function GoogleTalkWidget() {
		$widget_ops = array( 'classname' => 'widget_gtalk', 'description' => __('Google Talk Chatback', 'cgtc' ) );
		$control_ops = array( 'width' => 400, 'height' => 350 );
		$this->WP_Widget( 'gtalk', __( 'Google Talk', 'cgtc' ), $widget_ops, $control_ops );
	}

	// Form
	function form( $instance ) {
		$title       = esc_attr( $instance['title'] );
		$hash        = esc_attr( $instance['hash'] );
		$online      = esc_attr( $instance['online'] );
		$online_link = esc_attr( $instance['online_link'] );
		$offline     = esc_attr( $instance['offline'] );
		?>

		<h3><?php _e('Settings', 'cgtc' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'cgtc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('hash'); ?>"><?php _e('Hash:', 'cgtc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'hash' ); ?>" name="<?php echo $this->get_field_name('hash'); ?>" type="text" value="<?php echo $hash; ?>" />
			<?php _e('<small>Grab the hash code between <strong>tk=</strong> and <strong>&</strong> at:<br />', 'cgtc' ); ?>
			http://www.google.com/talk/service/badge/New<br />
			http://www.google.com/talk/service/a/<strong>yourdomain</strong>/badge/New (Domain users)</small>
		</p>

		<h3><?php _e('Online Output', 'cgtc' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id('online_'); ?>"><?php _e('Content (before link):', 'cgtc' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'online' ); ?>" name="<?php echo $this->get_field_name('online'); ?>" type="text"><?php echo $online; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('online_link'); ?>"><?php _e('Link text or image:', 'cgtc' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('online_link'); ?>" name="<?php echo $this->get_field_name('online_link'); ?>" type="text" value="<?php echo $online_link; ?>" />
		</p>


		<h3><?php _e('Offline Output', 'cgtc' ); ?></h3>
		<p>
			<label for="<?php echo $this->get_field_id('offline'); ?>"><?php _e('Content:', 'cgtc' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('offline'); ?>" name="<?php echo $this->get_field_name('offline'); ?>" type="text"><?php echo $offline; ?></textarea>
		</p>
		
		<?php
	}

	// Update
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['hash'] = strip_tags( $new_instance['hash'] );
		$instance['online_link'] = $new_instance['online_link'];
		$instance['online'] = $new_instance['online'];
		$instance['offline'] = $new_instance['offline'];
		return $instance;
	}


	// Widget
	function widget( $args, $instance ) {
		extract( $args );
		$title       = apply_filters( 'widget_title', $instance['title'] );
		$hash        = empty($instance['hash']) ? __('No hash supplied', 'cgtc' ) : $instance['hash'];
		$online_link = empty($instance['online_link']) ? __('Start chat', 'cgtc' ) : $instance['online_link'];
		$online      = empty($instance['online']) ? __("I'm online.", 'cgtc' ) : $instance['online'];
		$offline     = empty($instance['offline']) ? __("I'm offline.", 'cgtc' ) : $instance['offline'];

		echo $before_widget;

		if ($title) {
			echo $before_title . $title . $after_title;
		}

		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');

		if ( $status == 'online' ) {
			?>
			<div class="gtalk-message gtalk-online"><?php echo $online; ?></div>
			<div class="gtalk-link-wrapper"><a class="gtalk-link" href="http://www.google.com/talk/service/badge/Start?tk=<?php echo $hash; ?>" onclick="window.open(\'http://www.google.com/talk/service/badge/Start?tk=<?php echo $hash; ?>\',\'popup\',\'width=250,height=450,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=50\'); return false"><?php echo $online_link; ?></a></div>
			<?php
		}
		else {
			?>
			<div class="gtalk-message gtalk-offline"><?php echo $offline; ?></div>
			<?php
		}

		echo $after_widget;
	}
}

add_action( 'widgets_init', 'GoogleTalkWidgetInit' );

function GoogleTalkWidgetInit() {
	register_widget( 'GoogleTalkWidget' );
}


/****************************************************
 * Shortcode Support
 *
 * [googletalk hash="" link="" offline=""]
 * [gtalk_online] [/gtalk_online]
 * [gtalk_offline] [/gtalk_offline]
 *
 ****************************************************/

add_shortcode( 'gtalk', 'googletalk_handler' );
add_shortcode( 'gtalk_online', 'googletalk_online_handler' );
add_shortcode( 'gtalk_offline', 'googletalk_offline_handler' );

// Google Talk Handler
function googletalk_handler( $atts ) {
	extract( shortcode_atts( array(
		'hash' => '',
		'link' => __('Start chat', 'cgtc' ),
		'offline' => '',
	), $atts ) );

	$googletalk_output = '';
	
	if ( $hash ) {
		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');
		
		if ( $status == 'online' ) {
			$googletalk_output = '<a class="gtalk-link" href="http://www.google.com/talk/service/badge/Start?tk='.$hash.'" onclick="window.open(\'http://www.google.com/talk/service/badge/Start?tk='.$hash.'\',\'popup\',\'width=250,height=450,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=50\'); return false">'.$link.'</a>';
		}
		if ( $status == 'offline' ) {
			$googletalk_output = '<span class="gtalk-message gtalk-offline">'.$offline.'</span>';
		}
	}
	
	return $googletalk_output;
}

// Google Talk Online Handler
function googletalk_online_handler( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'hash' => ''
	), $atts ) );

	$googletalk_output = '';

	if ( $hash ) {
		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');
		
		if ( $status == 'online' ) {
			$googletalk_output = do_shortcode($content);
		}
	}
	
	return $googletalk_output;
}

// Google Talk Offline Handler
function googletalk_offline_handler( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'hash' => ''
	), $atts ) );

	$googletalk_output = '';

	if ( $hash ) {
		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');
		
		if ( $status == 'offline' ) {
			$googletalk_output = do_shortcode($content);
		}
	}
	
	return $googletalk_output;
}


/****************************************************
 * Template Tag Support
 *
 * http://andrewnacin.com/2010/05/18/rethinking-template-tags-in-plugins/
 *
 ****************************************************/


// Return Google Talk Status
function gtalk_status( $hash ) {
	if ( $hash ) {
		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');
		if ( $status == 'online' ) { return true; }
		if ( $status == 'offline' ) { return false; }
	}
	return false;
}

// Get Google Talk Link
function gtalk_link( $hash, $link ) {
	if ( $hash && $link) {
		$gtalkStatus = new gtalkStatus($hash);
		$status = ($gtalkStatus->isOnline()?'online':'offline');
		
		if ( $status == 'online' ) {
			echo '<a class="gtalk-link" href="http://www.google.com/talk/service/badge/Start?tk='.$hash.'" onclick="window.open(\'http://www.google.com/talk/service/badge/Start?tk='.$hash.'\',\'popup\',\'width=250,height=450,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=50\'); return false">'.$link.'</a>';
		}
	}
}
?>