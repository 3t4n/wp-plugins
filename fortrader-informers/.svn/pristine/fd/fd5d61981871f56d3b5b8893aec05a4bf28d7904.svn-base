<?php

class FtiWidget extends WP_Widget {

    public function __construct() {
		parent::__construct( 'ft_informer_widget', __('Ft Widget', 'ftinformers'), array( 'description' => __( 'Show financial widget', 'ftinformers' ), ) );
	}

	public function widget( $args, $instance ) {
		if( !$instance['informerId'] ) return;
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		
		echo FtInformers::getInformer($instance['informerId']);
		
		echo $args['after_widget'];
	}
		

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Widget title (if you need it)', 'ftinformers' );
		}
		$informerId = false;
		if ( isset( $instance[ 'informerId' ] ) ) {
			$informerId = $instance[ 'informerId' ];
		}
		$models = FtiModel::getAll();
		if( !$models ){
			echo '<br />' . __( 'To use this widget create some widgets here', 'ftinformers' ) . ' <a href="'.admin_url('admin.php?page=ft-informers').'">'.admin_url('admin.php?page=ft-informers').'</a>';
			return ;
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget title (if you need it)', 'ftinformers' ); ?>:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'informerId' ); ?>"><?php _e( 'Choose widget', 'ftinformers' ); ?>: <br />
				<select class="tags-input" id="<?php echo $this->get_field_id( 'informerId' ); ?>" name="<?php echo $this->get_field_name( 'informerId' ); ?>">
					<?php
						foreach( $models as $model ){
							$selected = '';
							if( $informerId && $informerId == $model->id ) $selected = 'selected="selected"';
							echo '<option value="' . $model->id . '" ' . $selected . '>' . $model->lang . ' ' . $model->title . '</option>';
						}
					?>
				</select>
			</label>
		</p>
		
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['informerId'] = ( ! empty( $new_instance['informerId'] ) ) ? intval($new_instance['informerId']) : 0;
		return $instance;
	}

}