<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
//Adds Contents widget.

class oaembed_content extends WP_Widget {
	
	//Register widget with WordPress.

	public function __construct() {
		parent::__construct(
			'oaembed', //Base ID
			__('Outdooractive Content Widget', 'outdooractiveEmbed'), //Name
			array( 'description' => __( 'This widget embeds contents from outdooractive.com', 'outdooractiveEmbed' ), ) //Args
		);
	}

	//Front-end display of widget.

	public function widget( $args, $instance ) {

		$url = $instance['url'];
		
		require_once(dirname(__FILE__).'./../includes/check_id.php');	
		require_once(dirname(__FILE__).'./../includes/check_language.php');
		
		$show = oaembed_get_id( $url );
		$language = oaembed_check_language();
		$frontend = oaembed_get_frontend( $url );
		
		
		
		$options = get_option ( 'oaembedoptions' );
		$userName = $options['usrName'];
		$proKey = $options['proKey'];

		$maxwidth = $instance['maxwidth'];
		
		if ( $maxwidth != '' ) {
			$maxwidth_str = 'max-width: '.esc_attr( $maxwidth ).'px';
			if (intval($maxwidth) <= 400) {
				$maxwidth = 'true';
			} else {
				$maxwidth = 'false';
			}
		} else {
			$maxwidth_str = 'max-width: 100%';
			$mw = 'false';
		}
		$parameter = 'mw='.$mw;
		if ( $usrName != '' && $proKey != '' ) { 
			$parameter .= '&usr='.$usrName.'key='.$proKey;
		}
		//create script
		if ( $frontend == 'www.outdooractive.com' || $frontend == '' ) {
			?>
			<div style="min-width: 260px; <?php echo $maxwidth_str ?>"><script type="text/javascript" src="https://www.outdooractive.com/<?php echo $language; ?>/embed/<?php echo esc_attr( $show ); ?>/js?<?php echo $parameter; ?>"></script></div>
			<?php
		} else {
			if ( $frontend == 'regio.outdooractive.com' ) {
				$regioparts = explode( '/', $url );
				$regio = $regioparts[3];
				$srcurl = $frontend.'/'.$regio.'/'.$language.'/embed/'.$show;
			} else {
				$srcurl = $frontend.'/'.$language.'/embed/'.$show;
			}
			
			?>
			<div style="min-width: 260px; <?php echo $maxwidth_str ?>"><script type="text/javascript" src="https://<?php echo esc_attr( $srcurl ) ?>/js?<?php echo $parameter; ?>"></script></div>
			<?php
		}
		

		echo $args['after_widget'];
	}

	//Back-end widget form.
	
	public function form( $instance ) {
		require_once(dirname(__FILE__).'./../includes/check_id.php');
		$shortcodeType = 'content';	
		
		//Field URL
		if ( isset( $instance[ 'url' ] ) ) {
			$url = $instance[ 'url' ];
		}
		else {
			$url = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Content ID or link', 'outdooractiveEmbed'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" required="required" <?php if ($url == '' || oaembed_check_published( $url) == false ) { echo 'style="border-color: red"'; }?>>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>">
		
		<?php 
		if (  $url == '' ) {
			_e( 'Please enter the link to the content or the content-id', 'outdooractiveEmbed' ); 
		} else if ( oaembed_check_published( $url ) == false ) {
			_e( 'ID does not match to widget  or content is not published. Please use another Outdooractive-Widget or publish your content', 'outdooractiveEmbed' ); 
		}
		?>
		
		</label>
		</p>
		<?php
		
		//Field maxwidth
		if ( isset( $instance[ 'maxwidth' ] ) ) {
			$maxwidth = $instance[ 'maxwidth' ];
		}
		else {
			$maxwidth = '';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'maxwidth' ); ?>"><?php _e( 'Maximum width, in pixels', 'outdooractiveEmbed'); ?>:
			<input class="widefat" id="<?php echo $this->get_field_id( 'maxwidth' ); ?>" name="<?php echo $this->get_field_name( 'maxwidth' ); ?>" type="text" value="<?php echo esc_attr( $maxwidth ); ?>">
		</label>
		</p>
		<?php
		
	} 

	//Save variables of backend

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['maxwidth'] = ( ! empty( $new_instance['maxwidth'] ) ) ? strip_tags( $new_instance['maxwidth'] ) : '';
		
		//check URL
		if ( current_user_can('unfiltered_html') )
			$instance['url'] = $new_instance['url'];
		else
			$instance['url'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['url']) ) );
			return $instance;
	}
	
} // class List2Go

//register List2Go widget
function oaembed_register_embedContent() {
	register_widget( 'oaembed_content' );
}
add_action( 'widgets_init', 'oaembed_register_embedContent' );

?>