<?php
/**
 * clients Widget
 *
 * @since 1.0.0
 *
 * @package aazeen_extension
 */

if ( !class_exists( 'aazeen_client_widget' ) ) {

	class aazeen_client_widget extends WP_Widget {
				/**
				 * Sets up Clients widget instance.
				 *
				 * @since 1.0
				 */
				public function __construct() {
					$widget_ops = array(
						'classname' => 'aazeen_client_widget',
						'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
						'customize_selective_refresh' => true,
					);
					parent::__construct( 'aazeen_client_widget', __( 'Aazeen - Clients widget', 'aazeen-extension' ), $widget_ops );
					$this->alt_option_name = 'aazeen_client_widget';
				}



		/**
		 * Display Widget
		 *
		 * @param $args
		 * @param $instance
		 */
		 function widget($args, $instance) {

				 extract($args);
				 $carousel = isset( $instance['carousel'] ) ? $instance['carousel'] : array();
				 $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#fff';
				 $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
				 $new_tab = isset( $instance['new_tab'] ) ? $instance['new_tab'] : false;
				 $fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;

				 echo $before_widget;

				 ?>
				 <?php $id= $this->id; ?>
				 <style>
					#<?php echo $id;?> .separator-center::after{border-bottom-color:<?php echo esc_attr($instance['title_color']); ?>;}
				 </style>

				 <!--section head end-->
				 <div id="client" class="padding-vertical-2" style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>">
				 <?php if ( !empty($instance['title']) || !empty($instance['sub_title']) ):?>
		 			<div class="grid-container">
		 				<div class="section-header text-center margin-bottom-3 " >
		 					<?php if( !empty($instance['title']) ): ?>
		 						<h2 class="section-title separator-center"  style="color:<?php echo esc_attr($instance['title_color']); ?>;" >
		 							<?php echo apply_filters('widget_title', $instance['title']); ?>
		 						</h2>
		 					<?php endif;?>
		 					<?php if( !empty($instance['sub_title']) ): ?>
		 						<div class="section-description">
		 							<h4 class="subheader" style="color:<?php echo esc_attr($instance['subtitle_color']); ?>;" ><?php echo apply_filters('widget_title', $instance['sub_title']); ?></h4>
		 						</div>
		 					<?php endif;?>
		 				</div><!--section head end-->
		 			</div><!--row end-->
		 		<?php endif; ?>

				<!--client body-->
				<div class="grid-container">
					<div class="grid-x grid-padding-x grid-margin-y align-center">
					 <?php	if(!isset($instance['carousel'])){ echo '<p class="widget_warning" style="color: #fff;">'.__('Please Click the "+ Add New" button to create new Carousel','aazeen-extension').'</p>';}
					 					if(!empty($carousel)){
					 						/*START CUSTOM Carosel*/
					 							foreach ((array)$carousel as $cars){
					 								 echo '<div class="cell large-4 small-12 medium-8">
					 									<div class="thumbnail">';
					 										if (!empty ($cars['image'])) {?>
					 											<a href="<?php echo esc_url($cars['title']);?>" <?php if (esc_attr( $new_tab )) : ?> target="_blank" <?php endif;?>>
																	<img src="<?php echo $cars['image'];?>" />
																</a>
					 										<?php }
					 									echo '</div>
					 								 </div>';
					 							}

									//CAROUSEL END
									}?>
								</div><!--row end-->
							</div>
							</div>
<!--client body-->


 <?php

				 echo $after_widget;
			 }

		 function update($new_instance, $old_instance) {

				 $instance = $old_instance;

		 /*Main title */
		 /*section title */
 				$instance['title'] = sanitize_text_field($new_instance['title']);
 				$instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);
				$instance['title_color'] = sanitize_hex_color($new_instance['title_color']);
				$instance['subtitle_color'] = sanitize_hex_color($new_instance['subtitle_color']);
				$instance['bg_color'] = sanitize_hex_color($new_instance['bg_color']);
				$instance['content_bgimage'] = sanitize_hex_color($new_instance['content_bgimage']);
				$instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;
				$instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;

				$instance['carousel'] = array();

        if ( isset( $new_instance['carousel'] ) )
        {
            foreach ( $new_instance['carousel'] as $cars )
            {
                if ( '' !== trim( $cars['title'] ) )
                    $instance['carousel'][] = $cars;
            }
        }
				 return $instance;}
	 /* ---------------------------- */
	 /* ------- Display Widget -------- */
	 /* ---------------------------- */


		 function form($instance) {
			 /* Set up some default widget settings. */
	 		$defaults = array(
				'bg_color' => '#fff',
				'title' => 'Our Clients',
				'sub_title' => '',
				'title_color' => '#0a0a0a',
				'subtitle_color' => '#747474',
	 		);
	 		$instance = wp_parse_args( (array) $instance, $defaults );
			$new_tab = isset( $instance['new_tab'] ) ? (bool) $instance['new_tab'] : false;
			$fixed_bg = isset( $instance['fixed_bg'] ) ? (bool) $instance['fixed_bg'] : false;
			?>

			 <p>
			 			 <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Main Title', 'aazeen-extension'); ?></label>
			 			 <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
			 	 </p>

			 	 <p>
			 			 <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'aazeen-extension'); ?></label>
			 			 <input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
			 	 </p>

				 <p>
				 	<label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
				 	<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
				 </p>
				 <p>
				 	<label for="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" class="icon-color"><?php _e('Sub Title Color', 'aazeen-extension') ?></label>
				 	<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle_color' ); ?>" value="<?php echo $instance['subtitle_color']; ?>" type="text" />
				 </p>
				 <!-- Clients Field -->
				 <div class="widget_repeater" data-widget-id="<?php echo $this->get_field_id( 'carousel' ); ?>" data-widget-name="<?php echo $this->get_field_name( 'carousel' ); ?>">
			 			<?php
			 			$customtesti = isset( $instance['carousel'] ) ? $instance['carousel'] : array();
			 			$customtesti_num = count($customtesti);
			 			$customtesti[$customtesti_num+1] = '';
						 $cars_html = array();
			 			$customtesti_counter = 0;

			 			foreach ((array) $customtesti as $cars )
			 			{
			 					if ( isset($cars['title']) )
			 					{
			 							$cars_html[] = sprintf(
			 									'<div class="widget_input_wrap">
			 					<span id="%4$s%2$s" class="repeat_handle" onclick="repeatOpen(this.id)">tab</span>
			 					<div class="media-picker-wrap">
			 						%7$s
			 						<input id="%3$s-%2$s-img" type="hidden" name="%1$s[%2$s][image]" value="%8$s" class="widefat media-picker">
			 						<a id="%10$s-%2$s" onclick="mediaPicker(this.id)" class="media-picker-button button">%9$s</a>
			 					</div>
								<input type="text" name="%1$s[%2$s][title]" value="%5$s" class="widefat" placeholder="%6$s">
								<span class="remove-field button button-primary">Remove</span>
			 				</div>',
			 									$this->get_field_name( 'carousel' ), //1
			 									$customtesti_counter, 				//2
			 									$this->get_field_id('carousel').'', //3
			 									$this->get_field_id('custom_add_field').'-repeat', //4

			 				//Title
			 				esc_url( $cars['title'] ),			 //5 - Title Value
			 				__('URL (Required)','aazeen-extension'), //6 - Title Placeholder
			 				//Media
			 				!empty($cars['image']) ? '<img class="media-picker-preview" src="'.esc_url($cars['image']).'" /><i class="fa fa-times media-picker-remove"></i>': '', //7
			 				esc_url( $cars['image'] ),			 //8 - Image Value
			 				__('Select Image', 'aazeen-extension'),	 //9 - Image Placeholder
			 				$this->get_field_id('carousel').'-mpick' //10
			 							);
			 					}

			 					$customtesti_counter += 1;
			 			}
						echo '<h4>'.__('Content','aazeen-extension').'</h4>' . join( $cars_html );
			 			?>

			 			<script type="text/javascript">
			 		var fieldnum = <?php echo json_encode( $customtesti_counter-1 ) ?>;
			 		var count = fieldnum;
			 		function customCarsclickFunction(buttonid){
			 			var fieldname = jQuery('#'+buttonid).data('widget-fieldname');
			 			var fieldid = jQuery('#'+buttonid).data('widget-fieldid');

			 				jQuery('#'+buttonid).prev().append("<div class='widget_input_wrap'><span id='"+buttonid+"-repeat"+(count+1)+"' class='repeat_handle' onclick='repeatOpen(this.id)'></span><input type='text' name='"+fieldname+"["+(count+1)+"][title]' value='<?php _e( 'URL', 'aazeen-extension' ); ?>' class='widefat' placeholder='<?php _e( 'Title (Required)', 'aazeen-extension' ); ?>'><div class='media-picker-wrap'><input type='hidden' name='"+fieldname+"["+(count+1)+"][image]' value='' class='widefat media-picker' id='"+fieldid+"-"+(count+1)+"-img'><a id='"+fieldid+"-mpick"+(count+1)+"' class='media-picker-button button' onclick='mediaPicker(this.id)'><?php _e('Select Image', 'aazeen-extension') ?></a></div><span class='remove-field button button-primary'>Remove</span></div>");
			 				count++;

			 		}

					jQuery( document ).on( 'ready widget-added widget-updated', function () {

						jQuery(document).on("click", ".remove-field", function(e) {
							jQuery(this).parent().remove();
						});
					});

			 			</script>

			 			<span id="<?php echo $this->get_field_id( 'custom-field_clone' );?>" class="repeat_clone_field" data-empty-content="<?php _e('No Carousel / Tabs Added!', 'aazeen-extension') ?>"></span>

			 			<?php echo '<input onclick="customCarsclickFunction(this.id)" class="button button-primary" type="button" value="' . __( '+ Add New', 'aazeen-extension' ) . '" id="'.$this->get_field_id('custom_add_field').'" data-widget-fieldname="'.$this->get_field_name('carousel').'" data-widget-fieldid="'.$this->get_field_id('carousel').'" />';?>
			 			</div>
						<div class="block_accordion">
						  <h4> <?php _e('Settings', 'aazeen-extension') ?></h4>
						  <div class="block_acc_wrap">
						<p>
						  <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>" class="icon-color"><?php _e('Background Color', 'aazeen-extension') ?></label>
						  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" type="text" />
						</p>
						<p>
						  <div class="widget_input_wrap">
						      <label for="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"><?php _e('Background Image ', 'aazeen-extension') ?></label>
						      <div class="media-picker-wrap">
						      <?php if(!empty($instance['content_bgimage'])) { ?>
						          <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['content_bgimage']); ?>" />
						          <i class="fa fa-times media-picker-remove"></i>
						      <?php } ?>

						      <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'content_bgimage' ); ?>" name="<?php echo $this->get_field_name( 'content_bgimage' ); ?>" value="<?php if( !empty($instance['content_bgimage']) ): echo $instance['content_bgimage']; endif; ?>" type="hidden" />
						      <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
						      </div>
						  </div>
						</p>
						<!-- About Content TITLE DIVIDER Field -->
						<p><input class="checkbox" type="checkbox"<?php checked( $fixed_bg ); ?> id="<?php echo $this->get_field_id( 'fixed_bg' ); ?>" name="<?php echo $this->get_field_name( 'fixed_bg' ); ?>" />
						<label for="<?php echo $this->get_field_id( 'fixed_bg' ); ?>"><?php _e( 'background image fixed', 'aazeen-extension' ); ?></label></p>

						<p><input class="checkbox" type="checkbox"<?php checked( $new_tab ); ?> id="<?php echo $this->get_field_id( 'new_tab' ); ?>" name="<?php echo $this->get_field_name( 'new_tab' ); ?>" />
						<label for="<?php echo $this->get_field_id( 'new_tab' ); ?>"><?php _e( 'open on new tab', 'aazeen-extension' ); ?></label></p>
						</div>
						</div>
			<?php

		 }
}
 }

 // register aazeen_ex dual category posts widget
 function aazeen_ex_client_widget() {
     register_widget( 'aazeen_client_widget' );
 }
 add_action( 'widgets_init', 'aazeen_ex_client_widget' );
