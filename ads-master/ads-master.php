<?php
/**
 * Plugin Name: Ads Master
 * Plugin URI: http://www.bluechipinfoway.com
 * Description: This plugin used to display ads in your website.
 * Version: 1.0.1
 * Author: Bluechip Infoway Team
 * Author URI: http://www.bluechipinfoway.com
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ADS_MASTER_VERSION', '1.0.1' );

/////////////////// ads master common setting

add_action( 'admin_init', 'ads_master_scripts' );
add_action( 'admin_menu', 'ads_master_menu' );

function ads_master_scripts()
{
    wp_register_style( 'ads-master-css', plugins_url( 'ads-style.css', __FILE__ ) );
	wp_enqueue_style( 'ads-master-css' );
    //wp_enqueue_script( 'ads-master-css', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}

function ads_master_menu()
{
	add_options_page('Ads Master', 'Ads Master', 'manage_options', 'ads-master', 'ads_master_func' );
}

function ads_master_func()
{
	include_once( plugin_dir_path( __FILE__ ) . "ads_master_core.php");
}


/////////////////// apply content filter for display ads

function ads_modify_content( $content )
{
	$custom_content = '<style type="text/css">
	.ads_top_disp{}
	.ads_top_corner_disp{ float:left; margin:0px 10px 10px 0px; }
	.ads_first_p_disp{}
	.ads_bottom_disp{}
	</style>';
	
	$ads_exclude_ids = explode(",", get_option('ads_exclude_ids'));
	
	if(get_option('ads_main_enable')==1 && !in_array(get_the_ID(), $ads_exclude_ids))
	{
		if ( is_single() && 'post' == get_post_type())
		{
			if(get_option('ads_post_top_enable')==1)
			{
				$top_content = '<div class="ads_top_disp">'.html_entity_decode(stripslashes(get_option('ads_post_top_desc'))).'</div>';
			}
			
			if(get_option('ads_post_top_corner_enable')==1)
			{
				$top_corner_content = '<div class="ads_top_corner_disp">'.html_entity_decode(stripslashes(get_option('ads_post_top_corner_desc'))).'</div>';
			}
			
			if(get_option('ads_post_first_p_enable')==1)
			{
				$the_content1 = substr($content, 0, strpos($content, "</p>")+4);
				$content = substr($content, strpos($content, "</p>")+4);
				
				$first_para_content = $the_content1.'<div class="ads_first_p_disp">'.html_entity_decode(stripslashes(get_option('ads_post_first_p_desc'))).'</div>';
			}
			
			if(get_option('ads_post_bottom_enable')==1)
			{
				$bottom_content = '<div class="ads_bottom_disp">'.html_entity_decode(stripslashes(get_option('ads_post_bottom_desc'))).'</div>';
			}
		}
		
		if ( 'page' == get_post_type())
		{
			if(get_option('ads_page_top_enable')==1)
			{
				$top_content = '<div class="ads_top_disp">'.html_entity_decode(stripslashes(get_option('ads_page_top_desc'))).'</div>';
			}
			
			if(get_option('ads_page_bottom_enable')==1)
			{
				$bottom_content = '<div class="ads_bottom_disp">'.html_entity_decode(stripslashes(get_option('ads_page_bottom_desc'))).'</div>';
			}
		}
	}
	
	$custom_content = $custom_content . $top_content . $top_corner_content . $first_para_content . $content . $bottom_content;
	
	return $custom_content;
}
add_filter( 'the_content', 'ads_modify_content' );


/////////////////// ads master shortcode

function ads_master_shortcode_func()
{
	$shortcode_content = '<style type="text/css">
	.ads_shortcode_disp{}
	</style>';
	
	$ads_exclude_ids = explode(",", get_option('ads_exclude_ids'));
	
	if(get_option('ads_main_enable')==1 && !in_array(get_the_ID(), $ads_exclude_ids))
	{
		if(get_option('ads_shortcode_enable')==1)
		{
			$shortcode_content = '<div class="ads_shortcode_disp">'.html_entity_decode(stripslashes(get_option('ads_shortcode_desc'))).'</div>';
		}
	}
	
	return $shortcode_content;
}
add_shortcode('ads_master', 'ads_master_shortcode_func');


/////////////////// ads master widget

class Ads_Master_Widget extends WP_Widget
{
	function __construct() 
	{
		parent::__construct(
			'ads_master_widget', // Base ID
			__( 'Ads Master', 'text_domain' ), // Name
			array( 'description' => __( 'This widget used for to display ads in sidebar.', 'text_domain' ), ) // Args
		);
	}
	
	public function widget( $args, $instance ) 
	{
		echo $args['before_widget'];
		if ( ! empty( $instance['ads_title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['ads_title'] ) . $args['after_title'];
		}
		echo __( html_entity_decode(stripslashes( $instance['ads_code'] )), 'text_domain' );
		echo $args['after_widget'];
	}

	public function form( $instance ) 
	{
		$ads_title = ! empty( $instance['ads_title'] ) ? $instance['ads_title'] : __( '', 'text_domain' );
		$ads_code = ! empty( $instance['ads_code'] ) ? $instance['ads_code'] : __( '', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ads_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ads_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads_title' ) ); ?>" type="text" value="<?php echo esc_attr( $ads_title ); ?>">
		</p>
        <p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ads_code' ) ); ?>"><?php _e( esc_attr( 'Ads Code:' ) ); ?></label> 
        </p>
        <p>
		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ads_code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads_code' ) ); ?>"><?php echo esc_attr( $ads_code ); ?></textarea>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) 
	{
		$instance = array();
		$instance['ads_title'] = ( ! empty( $new_instance['ads_title'] ) ) ? strip_tags( $new_instance['ads_title'] ) : '';
		$instance['ads_code'] = ( ! empty( $new_instance['ads_code'] ) ) ? esc_html($new_instance['ads_code']) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'Ads_Master_Widget' );
});
?>