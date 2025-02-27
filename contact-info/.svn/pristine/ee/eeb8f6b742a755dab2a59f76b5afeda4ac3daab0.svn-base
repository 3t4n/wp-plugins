<?php

class Contact_Info_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
	 		'contact_info_wid',
			'Contact Info Widget',
			array( 'description' => __( 'This widget is for showing contact details', 'contact-info' ), )
		);
	 }

	public function widget( $args, $instance ) {
		extract( $args );
		$wid_title = apply_filters( 'widget_title', $instance['wid_title'] );
		echo $args['before_widget'];
		if ( ! empty( $wid_title ) )
			echo $args['before_title'] . $wid_title . $args['after_title'];
			$this->contact_display( $instance );
		echo $args['after_widget'];
	}

	public function update( $new_instance, $old_instance ) {
		global $contact_info_data;
		$instance = array();
		$instance['wid_title'] = esc_html( $new_instance['wid_title'] );
		if(is_array( $contact_info_data )){
			foreach( $contact_info_data as $key => $value ){
				$instance[$key] = esc_html( $new_instance[$key] );
			}
		}
		return $instance;
	}

	public function form( $instance ) {
		global $contact_info_data;
		
		echo '<p><label for="'.$this->get_field_id('wid_title').'">'.__('Widget Title','contact-info').'</label>
			<input type="text" name="'.$this->get_field_name('wid_title').'" id="'.$this->get_field_id('wid_title').'" value="'.sanitize_text_field($instance['wid_title']).'" class="widefat">
		</p>';
				
		if(is_array( $contact_info_data )){
			foreach( $contact_info_data as $key => $value ){
				echo '<p><label for="'.$this->get_field_id($key).'">'.__($value['title'],'contact-info').'</label>
					<input type="text" name="'.$this->get_field_name($key).'" id="'.$this->get_field_id($key).'" value="'.sanitize_text_field($instance[$key]).'" class="widefat">
				</p>';
			}
		}
	}
	
	public static function contact_icon( $key ){
		global $contact_info_icons;
		if( get_option( $key.'_icon') ){
			$icon = $contact_info_icons[ get_option( $key.'_icon') ]['html'];
		} else {
			$icon = '';
		}
		return $icon;
	}

	public function contact_display( $instance ){
		global $contact_info_data;
		include( CI_DIR_PATH . '/view/frontend/widget.php' );
	}
} 