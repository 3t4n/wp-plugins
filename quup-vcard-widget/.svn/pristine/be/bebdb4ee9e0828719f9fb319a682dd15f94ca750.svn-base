<?php
/**
 * Plugin Name: quup VCard Widget
 * Description: quup.com Profilinizin özetini şık bir şekilde göstermenizi sağlar.
 * Version: 1.0
 * Author: quup
 * Author URI: http://quup.com/
 */

add_action( 'widgets_init', 'quup_vcard_widget' );

function quup_vcard_widget() {
	register_widget( 'Quup_vcard_widget' );
}

class Quup_vcard_widget extends WP_Widget {

	function Quup_vcard_widget() {
		$widget_ops = array( 'classname' => 'quup', 'description' => __('Buraya widgetin açılması gelecek', 'quup') );		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'quup-widget' );		
		$this->WP_Widget( 'quup-widget', __('quup VCard', 'quup VCard'), $widget_ops, $control_ops );
	}

    function IsNullOrEmptyString($string){
        return (!isset($string) || trim($string)==='');
    }
	
	function widget( $args, $instance ) {
		extract( $args );

		$userName = $instance['userName'];
		$width = $instance['width'];
        $marginTop = $instance['marginTop'];
        $marginBottom = $instance['marginBottom'];
		
		echo $before_widget;

        if($userName){
            printf('<iframe marginheight="0" marginwidth="0" frameborder="0" border="0" src="http://quup.com/widget/vcard/%s" width="%s" height="110px" style="margin-top:%s;margin-bottom:%s"></iframe>', $userName, $width, $marginTop, $marginBottom);    
        }
                
        echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

        $instance['userName'] = strip_tags( $new_instance['userName'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
        $instance['marginTop'] = strip_tags( $new_instance['marginTop'] );
        $instance['marginBottom'] = strip_tags( $new_instance['marginBottom'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'userName' => __('quup', 'quup'), 'width' => __('100%', 'quup'), 'marginTop' => __('0px', 'quup'), 'marginBottom' => __('0px', 'quup'));
		
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'userName' ); ?>"><?php _e('Kullanıcı Adı:', 'quup'); ?></label>
			<input id="<?php echo $this->get_field_id( 'userName' ); ?>" name="<?php echo $this->get_field_name( 'userName' ); ?>" value="<?php echo $instance['userName']; ?>" style="width:100%;" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Genişlik:', 'quup'); ?></label>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:100%;" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'marginTop' ); ?>"><?php _e('Üst Boşluk:', 'quup'); ?></label>
			<input id="<?php echo $this->get_field_id( 'marginTop' ); ?>" name="<?php echo $this->get_field_name( 'marginTop' ); ?>" value="<?php echo $instance['marginTop']; ?>" style="width:100%;" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'marginBottom' ); ?>"><?php _e('Alt Boşluk:', 'quup'); ?></label>
			<input id="<?php echo $this->get_field_id( 'marginBottom' ); ?>" name="<?php echo $this->get_field_name( 'marginBottom' ); ?>" value="<?php echo $instance['marginBottom']; ?>" style="width:100%;" />
		</p>


	<?php
	}
}

?>