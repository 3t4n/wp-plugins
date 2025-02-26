<?php
/**
 * Class awesome_gallery_widget
 */
class awesome_gallery_widget extends WP_Widget {

	/**
	 * Initializing the widget
	 */
	function __construct() {
		$widget_ops = array(
			'class'		  => 'agw_widget',
			'description' => __( 'A widget to display image gallery with lightbox.', 'agw' )
		);

		parent::__construct(
			'awesome_gallery_widget', //base id
			__( 'Awesome Gallery Widget', 'agw' ), //title
			$widget_ops
		);
	}
	
	/**
	 * Displaying the widget on the back-end
	 * @param  array $instance An instance of the widget
	 */
	public function form( $instance ) {
		$widget_defaults = array(
			'title'	       => 'Gallery',
			'galleryArr'   => '',
			'galleryCol'   => '2',
			'gallerypopup' => 'true',
		);

		$instance = wp_parse_args( (array) $instance, $widget_defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'agw' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" class="widefat" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		
		<p>
			<label><?php _e( 'Gallery Images', 'agw' ); ?></label>
		</p>
		
		<ul class="agw-container ui-sortable agw-clearfix">
			<input type="hidden" name="clw-name" value="<?php echo $this->get_field_name( 'galleryArr' ); ?>" />
			<?php 	
			$galleryArr = isset ( $instance['galleryArr'] ) ? $instance['galleryArr'] : array();
			$indx   = 0;
			
			if( !empty($galleryArr) )
			{
				foreach($galleryArr as $listItem) 
				{ 
					if($listItem !="") {
						?>
						<li class="ui-sortable-handle" style="background-image:url(<?php echo $listItem; ?>);">
							<input type="hidden" name="<?php echo $this->get_field_name( 'galleryArr' ); ?>[<?php echo $indx; ?>]" value="<?php echo $listItem; ?>" />
							<a class="agw-upload_button"></a>
							<a class="agw_delimg dashicons dashicons-minus" title="delete" onClick="agw_del_field(this);"></a>
							<a class="agw_addimg dashicons dashicons-plus" title="add" onClick="agw_add_field(this);"></a>
						</li>
						<?php 
					}
					$indx++;
				}
			} 
			else{ ?>
				<li>
					<input class="listArr_uploadimg" type="hidden" name="<?php echo $this->get_field_name( 'galleryArr' ); ?>[0]" value="" /> 
					<a class="agw-upload_button"></a>
					<a class="agw_delimg dashicons dashicons-minus" title="delete" onClick="agw_del_field(this);"></a>
					<a class="agw_addimg dashicons dashicons-plus" title="add" onClick="agw_add_field(this);"></a>
				</li>
			<?php 
			}
			?>
		</ul>

		<p>
			<label for="<?php echo $this->get_field_id( 'galleryCol' ); ?>"><?php _e( 'Gallery Column', 'agw' ); ?></label>
			<select <input type="text" id="<?php echo $this->get_field_id( 'galleryCol' ); ?>" name="<?php echo $this->get_field_name( 'galleryCol' ); ?>" class="widefat">
				<option value="1" <?php if(esc_attr( $instance['galleryCol'] ) === "1"){ echo "selected"; }  ?>><?php _e('1','agw'); ?></option>
				<option value="2" <?php if(esc_attr( $instance['galleryCol'] ) === "2"){ echo "selected"; }  ?>><?php _e('2','agw'); ?></option>
				<option value="3" <?php if(esc_attr( $instance['galleryCol'] ) === "3"){ echo "selected"; }  ?>><?php _e('3','agw'); ?></option>
				<option value="4" <?php if(esc_attr( $instance['galleryCol'] ) === "4"){ echo "selected"; }  ?>><?php _e('4','agw'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'gallerypopup' ); ?>"><?php _e( 'Lightbox Popup (On image click)', 'agw' ); ?></label>
			<select <input type="text" id="<?php echo $this->get_field_id( 'gallerypopup' ); ?>" name="<?php echo $this->get_field_name( 'gallerypopup' ); ?>" class="widefat">
				<option value="true" <?php if(esc_attr( $instance['gallerypopup'] ) === "true"){ echo "selected"; }  ?>><?php _e('Enable','agw'); ?></option>
				<option value="false" <?php if(esc_attr( $instance['gallerypopup'] ) === "false"){ echo "selected"; }  ?>><?php _e('Disable','agw'); ?></option>
			</select>
		</p>
		
		<script>	
		jQuery(document).ready(function(){
			if(jQuery('.widget-content .agw-container').length > 0){
				jQuery(".widget-content .agw-container").sortable({placeholder: "ui-state-highlight"});
				jQuery(".widget-content .agw-container li").live('click',function(e) {
					e.stopPropagation();
				});
				jQuery(".widget-content .agw-container li").live('mousedown',function () {jQuery(this).addClass('focus');});
				jQuery(".widget-content .agw-container li").live('mouseup',function () {jQuery(this).removeClass('focus');});
			}
		});
		</script>

		<?php
	}

	/**
	 * Making the widget updateable
	 * @param  array $new_instance New instance of the widget
	 * @param  array $old_instance Old instance of the widget
	 * @return array An updated instance of the widget
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']      = $new_instance['title']; 
        $instance['galleryArr'] = array();

        if ( isset ( $new_instance['galleryArr'] ) ) {
            foreach ( $new_instance['galleryArr'] as $value ){
                if ( '' !== trim( $value ) )
                    $instance['galleryArr'][] = $value;
            }
        }
		
		$instance['galleryCol'] = $new_instance['galleryCol']; 
		$instance['gallerypopup'] = $new_instance['gallerypopup']; 
		
		return $instance;
	}
	
	/**
	 * Displaying the widget on the front-end
	 * @param  array $args     Widget options
	 * @param  array $instance An instance of the widget
	 */
	public function widget( $args, $instance ) 
	{
		extract( $args );
		$title = !empty($instance['title']) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$popup = !empty($instance['gallerypopup']) ? $instance['gallerypopup'] : 'false';
		$galleryArr = !empty($instance['galleryArr']) ? $instance['galleryArr'] : array();

		//Preparing to show the gallery
		echo $before_widget;
		
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<ul class="agw-gallery-columns-<?php echo $instance['galleryCol']; ?> agw-gallery">
			<?php
			if( !empty($galleryArr) )
			{
				foreach($galleryArr as $gimg) 
				{ 
					if($gimg !="") 
					{
						if($popup=='true'){
						?>
							<li class="agw-gallery-item"><a href="<?php echo esc_url($gimg); ?>" rel="agw-rel[]"><img src="<?php echo $gimg; ?>" /></a></li>
						<?php 
						}else{
						?>
							<li class="agw-gallery-item"><img src="<?php echo $gimg; ?>" /></li>
						<?php
						}
					}
				}
			} 
			?>
		</ul>
		<?php 
		echo $after_widget;
	}
}

function agw_register_widget() {
	register_widget( 'awesome_gallery_widget' );
}
add_action( 'widgets_init', 'agw_register_widget' );