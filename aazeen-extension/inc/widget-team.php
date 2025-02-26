<?php
/**
 * team Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */


if ( !class_exists( 'aazeen_team_widget' ) ) {

	class aazeen_team_widget extends WP_Widget {

		/**
		 * Sets up team widget instance.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$widget_ops = array(
				'classname' => 'aazeen_team_widget aazeen_widgtes',
				'description' => __( 'You can add use this widgte in any section or page', 'aazeen-extension' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'aazeen_team_widget', __( 'Aazeen - Team widget', 'aazeen-extension' ), $widget_ops );
			$this->alt_option_name = 'aazeen_team_widget';
			include "default.php";
			$this->defaults = $defaults_team_widget;

		}

		function widget($args, $instance) {

 			 $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#fff';
			 $text_color = isset( $instance['text_color'] ) ? $instance['text_color'] : '#000';
			 $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
			 $new_tab = isset( $instance['new_tab'] ) ? $instance['new_tab'] : false;
			 $fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;
			 extract($args);
			 $instance = wp_parse_args((array) $instance, $this->defaults);

 			 echo $before_widget;

 			 ?>

			 <?php
					 $id= $this->id;
				echo "<style> #".$id." .main-section h4,#".$id." p
				{
					color: $text_color !important;
				}
				#".$id." h6.subheader
				{
					color: " . Kirki_Color::get_rgba($text_color, .8) . " !important;
				}
					</style>"
			 ;
			 ?>
			 <?php echo '<span class="so_widget_id" data-panel-id="'.$this->id.'"></span>';?>
			 <div id="team" class="padding-vertical-2" style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>">
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

			<div class="grid-container">
				<div class="grid-x grid-padding-x grid-margin-y align-center">
	          <!-- team one start -->
					 		<?php	if (!empty($instance['icon1']) || !empty($instance['title1']) || !empty($instance['box_uri1']) || !empty($instance['image_uri1'])): ?>
								<div class="cell small-24 medium-12 large-12">
									<div class="media-object stack-for-small">
									  <div class="media-object-section ">
											<div class="thumbnail">
												<?php if( !empty($instance['box_uri1']) ):?>
													<a  href="<?php echo esc_url($instance['box_uri1']);?>" <?php if ( $new_tab ) : ?> target="_blank" <?php endif;?>  >
												<?php endif;?>
									  	<?php if (!empty($instance['image_uri1'])): ?>
	                 			<img src="<?php echo esc_url($instance['image_uri1']); ?>"  >
												<div class="colored-shadow" style="background: url(<?php echo esc_url($instance['image_uri1']); ?>); opacity: 1;"></div>
											<?php endif;?>
											<?php if( !empty($instance['box_uri1']) ):?>
												</a>
											<?php endif;?>
											</div>
											</div>
											<div class="media-object-section main-section align-self-middle">
											<?php if (!empty($instance['title1'])): ?>
	                   		<h4><?php echo apply_filters('widget_title', $instance['title1']); ?> </h4>
											<?php endif;?>
											<?php if (!empty($instance['icon1'])): ?>
	                    	<h6 class="subheader text-uppercase"><?php echo esc_attr($instance['icon1']); ?></h6>
											<?php endif;?>
											<?php if (!empty($instance['content1'])): ?>
												<p><?php echo esc_attr($instance['content1']); ?></p>
											<?php endif;?>
											<!-- will add
											<a class="style1-btn instagram"><i class="fa fa-instagram"></i></a>
											<a class="style1-btn facebook-square"><i class="fa fa-facebook-square"></i></a>
											<a class="style1-btn twitter-square"><i class="fa fa-twitter-square"></i></a>
											<a class="style1-btn youtube-square"><i class="fa fa-youtube-square"></i></a>
											-->
											</div>
		              	</div>
	              	</div>
							<?php endif; ?>
	          <!-- team one end -->

						<!-- team two start -->
					 		<?php	if (!empty($instance['icon2']) || !empty($instance['title2']) || !empty($instance['box_uri2']) || !empty($instance['image_uri2'])): ?>
								<div class="cell small-24 medium-12 large-12">
									<div class="media-object stack-for-small">
									  <div class="media-object-section">
											<div class="thumbnail">
												<?php if( !empty($instance['box_uri2']) ):?>
													<a  href="<?php echo esc_url($instance['box_uri2']);?>" <?php if ( $new_tab ) : ?> target="_blank" <?php endif;?>  >
												<?php endif;?>
												<?php if( !empty($instance['box_uri2']) ):?>
													</a>
												<?php endif;?>
									  	<?php if (!empty($instance['image_uri2'])): ?>
	                 			<img src="<?php echo esc_url($instance['image_uri2']); ?>" alt="" >
												<div class="colored-shadow" style="background-image: url(<?php echo esc_url($instance['image_uri2']); ?>); opacity: 1;"></div>
											<?php endif;?>
											</div>
											</div>
											<div class="media-object-section main-section align-self-middle">
											<?php if (!empty($instance['title2'])): ?>
	                   		<h4><?php echo apply_filters('widget_title', $instance['title2']); ?> </h4>
											<?php endif;?>
											<?php if (!empty($instance['icon2'])): ?>
	                    	<h6 class="subheader text-uppercase"><?php echo esc_attr($instance['icon2']); ?></h6>
											<?php endif;?>
											<?php if (!empty($instance['content2'])): ?>
												<p><?php echo esc_attr($instance['content2']); ?></p>
											<?php endif;?>
											</div>
		              	</div>
	              	</div>
							<?php endif; ?>
	          <!-- team two end -->

						<!-- team three start -->
					 		<?php	if (!empty($instance['icon3']) || !empty($instance['title3']) || !empty($instance['box_uri3']) || !empty($instance['image_uri3'])): ?>
								<div class="cell small-24 medium-12 large-12">
									<div class="media-object stack-for-small">
									  <div class="media-object-section">
											<div class="thumbnail">
												<?php if( !empty($instance['box_uri3']) ):?>
													<a  href="<?php echo esc_url($instance['box_uri3']);?>" <?php if ( $new_tab ) : ?> target="_blank" <?php endif;?>  >
												<?php endif;?>
									  	<?php if (!empty($instance['image_uri3'])): ?>
	                 			<img src="<?php echo esc_url($instance['image_uri3']); ?>" alt="" >
												<div class="colored-shadow" style="background-image: url(<?php echo esc_url($instance['image_uri3']); ?>); opacity: 1;"></div>
											<?php endif;?>
											<?php if( !empty($instance['box_uri3']) ):?>
												</a>
											<?php endif;?>
											</div>
											</div>
											<div class="media-object-section main-section align-self-middle">
											<?php if (!empty($instance['title3'])): ?>
	                   		<h4><?php echo apply_filters('widget_title', $instance['title3']); ?> </h4>
											<?php endif;?>
											<?php if (!empty($instance['icon3'])): ?>
	                    	<h6 class="subheader text-uppercase"><?php echo esc_attr($instance['icon3']); ?></h6>
											<?php endif;?>
											<?php if (!empty($instance['content3'])): ?>
												<p><?php echo esc_attr($instance['content3']); ?></p>
											<?php endif;?>
											</div>
		              	</div>
	              	</div>
							<?php endif; ?>
	          <!-- team three end -->

						<!-- team 4 start -->
					 		<?php	if (!empty($instance['icon4']) || !empty($instance['title4']) || !empty($instance['box_uri4']) || !empty($instance['image_uri4'])): ?>
								<div class="cell small-24 medium-12 large-12">
									<div class="media-object stack-for-small">
									  <div class="media-object-section">
											<div class="thumbnail">
												<?php if( !empty($instance['box_uri4']) ):?>
													<a  href="<?php echo esc_url($instance['box_uri4']);?>" <?php if ( $new_tab ) : ?> target="_blank" <?php endif;?> >
												<?php endif;?>
									  	<?php if (!empty($instance['image_uri4'])): ?>
	                 			<img src="<?php echo esc_url($instance['image_uri4']); ?>" alt="" >
												<div class="colored-shadow" style="background-image: url(<?php echo esc_url($instance['image_uri4']); ?>); opacity: 1;"></div>
											<?php endif;?>
											<?php if( !empty($instance['box_uri4']) ):?>
												</a>
											<?php endif;?>
											</div>
											</div>
											<div class="media-object-section main-section align-self-middle">
											<?php if (!empty($instance['title4'])): ?>
	                   		<h4><?php echo apply_filters('widget_title', $instance['title4']); ?> </h4>
											<?php endif;?>
											<?php if (!empty($instance['icon4'])): ?>
	                    	<h6 class="subheader text-uppercase"><?php echo esc_attr($instance['icon4']); ?></h6>
											<?php endif;?>
											<?php if (!empty($instance['content4'])): ?>
												<p><?php echo esc_attr($instance['content4']); ?></p>
											<?php endif;?>
											</div>
		              	</div>
	              	</div>
							<?php endif; ?>
	          <!-- team 4 end -->
	     </div>
	    </div><!--row end-->
		</div>
<?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
				/*section title */
						$instance['title'] = sanitize_text_field($new_instance['title']);
						$instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);

		/*Box 1 */
        $instance['icon1'] = sanitize_text_field( $new_instance['icon1'] );
				$instance['image_uri1'] = strip_tags( $new_instance['image_uri1'] );
        $instance['title1'] = sanitize_text_field($new_instance['title1']);
				$instance['box_uri1'] = strip_tags( $new_instance['box_uri1'] );
				$instance['content1'] = sanitize_text_field( $new_instance['content1'] );

		/*Box 2 */
        $instance['icon2'] = sanitize_text_field( $new_instance['icon2'] );
				$instance['image_uri2'] = strip_tags( $new_instance['image_uri2'] );
        $instance['title2'] = sanitize_text_field($new_instance['title2']);
				$instance['box_uri2'] = strip_tags( $new_instance['box_uri2'] );
				$instance['content2'] = sanitize_text_field( $new_instance['content2'] );

		/*Box 3 */
        $instance['icon3'] = sanitize_text_field( $new_instance['icon3'] );
				$instance['image_uri3'] = strip_tags( $new_instance['image_uri3'] );
        $instance['title3'] = sanitize_text_field($new_instance['title3']);
				$instance['box_uri3'] = strip_tags( $new_instance['box_uri3'] );
				$instance['content3'] = sanitize_text_field( $new_instance['content3'] );

		/*Box 4 */
		    $instance['icon4'] = strip_tags( $new_instance['icon4'] );
				$instance['image_uri4'] = strip_tags( $new_instance['image_uri4'] );
		    $instance['title4'] = sanitize_text_field($new_instance['title4']);
				$instance['box_uri4'] = strip_tags( $new_instance['box_uri4'] );
				$instance['content4'] = sanitize_text_field( $new_instance['content4'] );

				$instance['title_color'] = sanitize_hex_color($new_instance['title_color']);
				$instance['subtitle_color'] = sanitize_hex_color($new_instance['subtitle_color']);
				$instance['bg_color'] = sanitize_hex_color($new_instance['bg_color']);
				$instance['text_color'] = sanitize_hex_color($new_instance['text_color']);
				$instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);

				$instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;
				$instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;

        return $instance;

    }

    function form($instance) {
			/* Set up some default widget settings. */
			$instance = wp_parse_args((array) $instance, $this->defaults);
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
	<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text"/>
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" class="icon-color"><?php _e('Sub Title Color', 'aazeen-extension') ?></label>
	<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle_color' ); ?>" value="<?php echo $instance['subtitle_color']; ?>" type="text"/>
</p>
<!--BLOCK 1 START-->
<h4><?php _e('Note: Team Image size (300 x 300) ', 'aazeen-extension') ?></h4>
<div class="block_accordion">
	<h4>
		<?php _e('Team 1', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon1'); ?>"><?php _e('Designation', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('icon1'); ?>" id="<?php echo $this->get_field_id('icon1'); ?>" value="<?php if( !empty($instance['icon1']) ): echo $instance['icon1']; endif; ?>" class="widefat">
		</p>

		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri1'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri1']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri1' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri1' ); ?>"
				value="<?php if( !empty($instance['image_uri1']) ): echo $instance['image_uri1']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri1' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('content1'); ?>"><?php _e('description', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('content1'); ?>" id="<?php echo $this->get_field_id('content1'); ?>"><?php if( !empty($instance['content1']) ): echo htmlspecialchars_decode($instance['content1']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('box_uri1'); ?>"><?php _e('Link 1','aazeen-extension'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('box_uri1'); ?>" id="<?php echo $this->get_field_id('box_uri1'); ?>" value="<?php if( !empty($instance['box_uri1']) ): echo esc_url($instance['box_uri1']); endif; ?>" class="widefat">
		</p>
	</div>
</div>

<!--BLOCK 2 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Team 2', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('title2'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php if( !empty($instance['title2']) ): echo $instance['title2']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon2'); ?>"><?php _e('Designation', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('icon2'); ?>" id="<?php echo $this->get_field_id('icon2'); ?>" value="<?php if( !empty($instance['icon2']) ): echo $instance['icon2']; endif; ?>" class="widefat">
		</p>

		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri2'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri2']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri2' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri2' ); ?>"
				value="<?php if( !empty($instance['image_uri2']) ): echo $instance['image_uri2']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri2' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('content2'); ?>"><?php _e('description', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('content2'); ?>" id="<?php echo $this->get_field_id('content2'); ?>"><?php if( !empty($instance['content2']) ): echo htmlspecialchars_decode($instance['content2']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('box_uri2'); ?>"><?php _e('Link ','aazeen-extension'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('box_uri2'); ?>" id="<?php echo $this->get_field_id('box_uri2'); ?>" value="<?php if( !empty($instance['box_uri2']) ): echo esc_url($instance['box_uri2']); endif; ?>" class="widefat">
		</p>
	</div>
</div>
<!--BLOCK 3 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Team 3', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('title3'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php if( !empty($instance['title3']) ): echo $instance['title3']; endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('icon3'); ?>"><?php _e('Designation', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('icon3'); ?>" id="<?php echo $this->get_field_id('icon3'); ?>" value="<?php if( !empty($instance['icon3']) ): echo $instance['icon3']; endif; ?>" class="widefat">
		</p>
		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri3'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri3']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri3' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri3' ); ?>"
				value="<?php if( !empty($instance['image_uri3']) ): echo $instance['image_uri3']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri3' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('content3'); ?>"><?php _e('description', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('content3'); ?>" id="<?php echo $this->get_field_id('content3'); ?>"><?php if( !empty($instance['content3']) ): echo htmlspecialchars_decode($instance['content3']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('box_uri3'); ?>"><?php _e('Link ','aazeen-extension'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('box_uri3'); ?>" id="<?php echo $this->get_field_id('box_uri3'); ?>" value="<?php if( !empty($instance['box_uri3']) ): echo esc_url($instance['box_uri3']); endif; ?>" class="widefat">
		</p>
	</div>
</div>
<!--BLOCK 4 START-->
<div class="block_accordion">
	<h4>
		<?php _e('Team 4', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id('title4'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title4'); ?>" id="<?php echo $this->get_field_id('title4'); ?>" value="<?php if( !empty($instance['title4']) ): echo $instance['title4']; endif; ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('icon4'); ?>"><?php _e('Designation', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('icon4'); ?>" id="<?php echo $this->get_field_id('icon4'); ?>" value="<?php if( !empty($instance['icon4']) ): echo $instance['icon4']; endif; ?>" class="widefat">
		</p>
		<div class="media-picker-wrap">
			<?php if(!empty($instance['image_uri4'])) { ?>
			<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['image_uri4']); ?>"/>
			<i class="fa fa-times media-picker-remove"></i>
			<?php } ?>
			<input
				class="widefat media-picker"
				id="<?php echo $this->get_field_id( 'image_uri4' ); ?>"
				name="<?php echo $this->get_field_name( 'image_uri4' ); ?>"
				value="<?php if( !empty($instance['image_uri4']) ): echo $instance['image_uri4']; endif; ?>"
				type="hidden"/>
			<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'image_uri4' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
		</div>
		<p>
			<label for="<?php echo $this->get_field_id('content4'); ?>"><?php _e('description', 'aazeen-extension'); ?></label>
			<textarea class="widefat" rows="4" cols="10" name="<?php echo $this->get_field_name('content4'); ?>" id="<?php echo $this->get_field_id('content4'); ?>"><?php if( !empty($instance['content4']) ): echo htmlspecialchars_decode($instance['content4']); endif; ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('box_uri4'); ?>"><?php _e('Link ','aazeen-extension'); ?></label><br/>
			<input type="text" name="<?php echo $this->get_field_name('box_uri4'); ?>" id="<?php echo $this->get_field_id('box_uri4'); ?>" value="<?php if( !empty($instance['box_uri4']) ): echo esc_url($instance['box_uri4']); endif; ?>" class="widefat">
		</p>
	</div>
</div>
<!---end accordino---->
<div class="block_accordion">
	<h4>
		<?php _e('Settings', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>" class="icon-color"><?php _e('Background Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" type="text"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text_color' ); ?>" class="icon-color"><?php _e('Text Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'text_color' ); ?>" name="<?php echo $this->get_field_name( 'text_color' ); ?>" value="<?php echo $instance['text_color']; ?>" type="text"/>
		</p>

		<p>
			<div class="widget_input_wrap">
				<label for="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"><?php _e('Background Image ', 'aazeen-extension') ?></label>
				<div class="media-picker-wrap">
					<?php if(!empty($instance['content_bgimage'])) { ?>
					<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['content_bgimage']); ?>"/>
					<i class="fa fa-times media-picker-remove"></i>
					<?php } ?>
					<input
						class="widefat media-picker"
						id="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"
						name="<?php echo $this->get_field_name( 'content_bgimage' ); ?>"
						value="<?php if( !empty($instance['content_bgimage']) ): echo $instance['content_bgimage']; endif; ?>"
						type="hidden"/>
					<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
				</div>
			</div>
		</p>
		<!-- About Content TITLE DIVIDER Field -->
		<p><input class="checkbox" type="checkbox" <?php checked( $fixed_bg ); ?> id="<?php echo $this->get_field_id( 'fixed_bg' ); ?>" name="<?php echo $this->get_field_name( 'fixed_bg' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'fixed_bg' ); ?>"><?php _e( 'background image fixed', 'aazeen-extension' ); ?></label>
		</p>

		<p><input class="checkbox" type="checkbox" <?php checked( $new_tab ); ?> id="<?php echo $this->get_field_id( 'new_tab' ); ?>" name="<?php echo $this->get_field_name( 'new_tab' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'new_tab' ); ?>"><?php _e( 'open on new tab', 'aazeen-extension' ); ?></label>
		</p>
	</div>
</div>
 <?php
	}

 }
}
// register aazeen_ex dual category posts widget
function aazeen_ex_team_widget() {
		register_widget( 'aazeen_team_widget' );
}
add_action( 'widgets_init', 'aazeen_ex_team_widget' );
