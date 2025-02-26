<?php
/**
 * team Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */


if ( !class_exists( 'aazeen_slider_widget' ) ) {

	class aazeen_slider_widget extends WP_Widget {

		/**
		 * Sets up team widget instance.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			$widget_ops = array(
				'classname' => 'aazeen_slider_widget aazeen_widgtes',
				'description' => __( 'You can add use this widgte in any section or page. you can add for custom slider', 'aazeen-extension' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'aazeen_slider_widget', __( 'Aazeen - Slider widget', 'aazeen-extension' ), $widget_ops );
			$this->alt_option_name = 'aazeen_slider_widget';

	}


		function widget($args, $instance) {

 			 extract($args);
			 $custom_testi = isset( $instance['custom_testi'] ) ? $instance['custom_testi'] : array();
			 $auto_play = ( ! empty( $instance['auto_play'] ) ) ? wp_kses_post( $instance['auto_play'] ) : '';
			 $slider_height = ( ! empty( $instance['slider_height'] ) ) ?  $instance['slider_height']  : '80';
			 $slider_height_m = ( ! empty( $instance['slider_height_m'] ) ) ? absint($instance['slider_height_m']): '70';

			 $slider_style = ( ! empty( $instance['slider_style'] ) ) ? wp_kses_post( $instance['slider_style'] ) : '';
			 $slider_speed = ( ! empty( $instance['slider_speed'] ) ) ? absint( $instance['slider_speed'] ) : '300';
			 $button1_color_in = isset( $instance['button1_color'] ) ? $instance['button1_color'] : '#e91e63';
			 $button2_color_in = isset( $instance['button2_color'] ) ? $instance['button2_color'] : '#00bcd4';


 			 echo $before_widget;
 			 ?>
			 <?php $id= $this->id;
			 /*----------- button one -----------*/


	 		if ( 225 > ariColor::newColor( $button1_color_in )->luminance ) {
	 			// Our background color is dark, so we need to create a light text color.
	 			$button1_color_text = '#fff';
	 		} else {

	 			// Our background color is light, so we need to create a dark text color
	 			$button1_color_text =  '#000' ;

	 		}
			if ( 225 > ariColor::newColor( $button2_color_in )->luminance ) {
	 			// Our background color is dark, so we need to create a light text color.
	 			$button2_color_text = '#fff';
	 		} else {

	 			// Our background color is light, so we need to create a dark text color
	 			$button2_color_text =  '#000' ;

	 		}

			 ?>
			<style>
			@media screen and (min-width: 40em){
			#<?php echo $id;?> .slider2 .post-header h3,#<?php echo $id;?> .modern-Slider .item h3{
				font-size: <?php echo ($instance['title_fontsize']);?>px;letter-spacing:<?php echo ($instance['letter_spacing']);?>px;}
			#<?php echo $id;?> .slider2 .post-header p ,#<?php echo $id;?> .modern-Slider .item h5
 		 {
 			 font-size: <?php echo ($instance['content_fontsize']);?>px;letter-spacing:<?php echo ($instance['letter_spacing']);?>px;
 		 }
		 	}

		/*----------- button 1 -----------*/

		 	#<?php echo $id;?>.aazeen_slider_widget .sliderone.btn.btn-rose
		{
			background-color: <?php echo $button1_color_in ;?> ;
			box-shadow:0 2px 2px 0 <?php echo Kirki_Color::get_rgba($button1_color_in, 0.14) ?>,0 3px 1px -2px <?php echo Kirki_Color::get_rgba($button1_color_in, 0.2) ?>,0 1px 5px 0 <?php echo Kirki_Color::get_rgba($button1_color_in, 0.12) ?>;
		}
		#<?php echo $id;?>.aazeen_slider_widget .sliderone.btn.btn-rose:hover
		{
			box-shadow:0 14px 26px -12px <?php echo Kirki_Color::get_rgba($button1_color_in, .42) ?>, 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(156, 39, 176, .2);

		}
				#<?php echo $id;?> .aazeen-slider .sliderone.btn.btn-rose
		{
			color:<?php echo $button1_color_text ?>;
		}

		/*----------- button 2 -----------*/

		#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn.btn-info
	{
		background-color: <?php echo $button2_color_in ;?> ;
		box-shadow:0 2px 2px 0 <?php echo Kirki_Color::get_rgba($button2_color_in, 0.14) ?>,0 3px 1px -2px <?php echo Kirki_Color::get_rgba($button2_color_in, 0.2) ?>,0 1px 5px 0 <?php echo Kirki_Color::get_rgba($button2_color_in, 0.12) ?>;
	}
	#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn.btn-info:hover
	{
		box-shadow:0 14px 26px -12px <?php echo Kirki_Color::get_rgba($button2_color_in, .42) ?>, 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(156, 39, 176, .2);

	}
			#<?php echo $id;?> .aazeen-slider .slidertwo.btn.btn-info
	{
		color:<?php echo $button2_color_text ?>;
	}
	#<?php echo $id;?>  .aazeen-slider .item .img-fill,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .post-thumbouter-slider,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .thumbnail-image-slider{height: <?php echo esc_attr($slider_height);?>vh}

@media screen and (max-width: 39.9375em) {
	#<?php echo $id;?>  .aazeen-slider .item .img-fill,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .post-thumbouter-slider,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .thumbnail-image-slider{height: <?php echo esc_attr($slider_height_m);?>vh}
}
			</style>

			 <?php echo '<span class="so_widget_id" data-panel-id="'.$this->id.'"></span>';?>
			 <div class="aazeen-slider" >
			<?php if($slider_style == 'style_one') { ?>
			<div class="modern-Slider "  data-slick='{"autoplay":<?php echo $auto_play;?>,"speed":<?php echo $slider_speed;?>}'>
				<?php if(!empty($custom_testi)){
					/*START CUSTOM Carosel*/
						foreach ((array)$custom_testi as $testimony){?>
							<?php if (!empty ($testimony['image'])) {?>
											<div class="item " >
												 <div class="img-fill " >
															 <img src="<?php echo $testimony['image'];?>" />
															 <?php if (!empty ($testimony['content']) || !empty ($testimony['title']) || !empty ($testimony['url1']) || !empty ($testimony['url2'])) {?>
															 <div class="grid-container">
															 <div class="info" >
																 <div class="slider-dsc">
																	 <?php if (!empty ($testimony['title'])) {?>
																	 <h3  ><?php echo esc_html($testimony['title']);?></h3>
																	 <?php }?>
																	 <?php if (!empty ($testimony['content'])) {?>
																	 <h5 ><?php echo esc_html($testimony['content']);?></h5>
																	 <?php }?>
																	 <?php if (!empty ($testimony['url1'])) {?>
																	 <a href="<?php echo esc_url($testimony['url1']);?>" class="sliderone btn btn-rose btn-round ">
																		 <?php echo esc_html($testimony['url_text']);?>
                    								</a>
																	<?php }?>
																	<?php if (!empty ($testimony['url2'])) {?>
																	<a href="<?php echo esc_url($testimony['url2']);?>" class="slidertwo btn btn-info btn-round ">
																		<?php echo esc_html($testimony['url_text2']);?>
																	 </a>
																 <?php }?>
																 </div>
															 </div>
														 </div>
														 <?php }?>
														  </div>
													 </div>
												 <?php }
												 }
													}?>
												 </div>
					<?php } ?>  <!-- style_one -->


		<?php if($slider_style == 'style_two') { ?>
			<div class="slick-slider slider2 slider-post-wrap" data-slick='"autoplay":<?php echo $auto_play;?>,"centerMode": true,"speed":<?php echo $slider_speed;?>,"centerPadding":"120px"}' >
				<?php if(!empty($custom_testi)){
					/*START CUSTOM Carosel*/
						foreach ((array)$custom_testi as $testimony){?>

		            <article class="post-wrap-slider">
									<?php if (!empty ($testimony['image'])) {?>
		              <div class="post-thumbouter-slider">
		                <div class="post-thumb-overlay"></div>
		                <div class="post-thumb-slider ">
		                  <span class="thumbnail-resize-slider">
		                    <span class="thumbnail-image-slider">
													<img src="<?php echo $testimony['image'];?>" />
		                    </span>
		                  </span>
		                </div>
		              </div>
									<?php if (!empty ($testimony['content']) || !empty ($testimony['title']) || !empty ($testimony['url1']) || !empty ($testimony['url2'])) {?>
		              <div class="post-header-outer is-header-overlay">
		                  <div class="post-header">
												<?php if (!empty ($testimony['title'])) {?>
												<h3 ><?php echo esc_html($testimony['title']);?></h3>
												<?php }?>
												<?php if (!empty ($testimony['content'])) {?>
												<p ><?php echo esc_html($testimony['content']);?></p>
												<?php }?>
												<?php if (!empty ($testimony['url1'])) {?>
												<a href="<?php echo esc_url($testimony['url1']);?>" class="sliderone btn btn-rose btn-round ">
													<?php echo esc_html($testimony['url_text']);?>
												 </a>
											 <?php }?>
											 <?php if (!empty ($testimony['url2'])) {?>
											 <a href="<?php echo esc_url($testimony['url2']);?>" class="slidertwo btn btn-info btn-round ">
												 <?php echo esc_html($testimony['url_text2']);?>
												</a>
											<?php }?>
		                </div>
									</div>
									<?php }?>
		              </article >
									<?php }
									}
									 }?>
		    </div>
			<?php } ?>  <!-- style_two -->

</div>

<?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
				/*section title */
				$instance[ 'slider_style' ]	= wp_kses_post( $new_instance[ 'slider_style' ] );

				$instance['button1_color'] = strip_tags($new_instance['button1_color']);
				$instance['button2_color'] = sanitize_hex_color($new_instance['button2_color']);
				//slider setting
				$instance[ 'auto_play' ]	= wp_kses_post( $new_instance[ 'auto_play' ] );
				$instance['slider_height'] = strip_tags($new_instance['slider_height']);
				$instance['slider_speed'] = isset($new_instance['slider_speed']) ? absint($new_instance['slider_speed']) : '';
				$instance['slider_height_m'] = isset($new_instance['slider_height_m']) ? absint($new_instance['slider_height_m']) : '';

				$instance['title_fontsize'] = strip_tags($new_instance['title_fontsize']);
				$instance['content_fontsize'] = isset($new_instance['content_fontsize']) ? absint($new_instance['content_fontsize']) : '';
				$instance['letter_spacing'] = isset($new_instance['letter_spacing']) ? absint($new_instance['letter_spacing']) : '';


				$instance['custom_testi'] = array();
        if ( isset( $new_instance['custom_testi'] ) )
        {
            foreach ( $new_instance['custom_testi'] as $testi )
            {
                if ( '' !== trim( $testi['image'] ) )
                    $instance['custom_testi'][] = $testi;
            }
        }
    return $instance;

    }

    function form($instance) {
			/* Set up some default widget settings. */
			$defaults = array(
			'title' => '',
			'button1_color' => '#e91e63',
			'button2_color' => '#00bcd4',
			'auto_play'=>'true',
			'slider_height'=>80,
			'slider_style'=>'style_one',
			'title_fontsize'=>32,
			'content_fontsize'=>18,
			'letter_spacing'=>'1',
			'slider_speed'=>'300',
			'slider_height_m'=>70,

			);
			$instance = wp_parse_args( (array) $instance, $defaults );

			?>

	 <p>
	 <label for="<?php echo $this->get_field_id('slider_style'); ?>"><?php _e('Slect slider Style', 'aazeen-extension') ?></label>
	 <select id="<?php echo $this->get_field_id('slider_style'); ?>" name="<?php echo $this->get_field_name('slider_style'); ?>" class="widefat">
		 <option value="style_one" <?php if ( 'style_one' == $instance['slider_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Style one', 'aazeen-extension') ?></option>
		 <option value="style_two" <?php if ( 'style_two' == $instance['slider_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Style two', 'aazeen-extension') ?></option>
	 </select>
	 </p>

	 <!-- Clients Field -->
	 <div class="block_accordion">
	   <h4> <?php _e('Slider', 'aazeen-extension') ?></h4>
	   <div class="block_acc_wrap">
			 <!-- ----------------Carousel Field------------------------ -->
		<div class="widget_repeater" data-widget-id="<?php echo $this->get_field_id( 'custom_testi' ); ?>" data-widget-name="<?php echo $this->get_field_name( 'custom_testi' ); ?>">
        <?php
        $customtesti = isset( $instance['custom_testi'] ) ? $instance['custom_testi'] : array();
        $customtesti_num = count($customtesti);
        $customtesti[$customtesti_num+1] = '';
        $customtesti_html = array();
        $customtesti_counter = 0;

        foreach ( $customtesti as $testi )
        {
            if ( isset($testi['image']) )
            {
                $customtesti_html[] = sprintf(
                    '<div class="widget_input_wrap">
						<span id="%4$s%2$s" class="repeat_handle" onclick="repeatOpen(this.id)">%5$s</span>
						<input type="text" name="%1$s[%2$s][title]" value="%5$s" class="widefat" placeholder="%6$s">
						<textarea name="%1$s[%2$s][content]" class="widefat">%7$s</textarea>
						<div class="media-picker-wrap">
							%9$s
							<input id="%3$s-%2$s" type="hidden" name="%1$s[%2$s][image]" value="%10$s" class="widefat media-picker">
							<a id="%12$s-%2$s" onclick="mediaPicker(this.id)" class="media-picker-button button">%11$s</a>
						</div>
						<input type="text" name="%1$s[%2$s][url1]" value="%13$s" class="widefat" placeholder="%14$s">
						<input type="text" name="%1$s[%2$s][url_text]" value="%15$s" class="widefat" placeholder="%16$s">

						<input type="text" name="%1$s[%2$s][url2]" value="%17$s" class="widefat" placeholder="%18$s">
						<input type="text" name="%1$s[%2$s][url_text2]" value="%19$s" class="widefat" placeholder="%20$s">

						<span class="remove-field button button-primary">Remove</span>
					</div>',
                    $this->get_field_name( 'custom_testi' ), //1
                    $customtesti_counter, 				//2
					$this->get_field_id('custom_testi').'', //3
					$this->get_field_id('custom_add_field').'-repeat', //4

					//Title
					esc_attr( $testi['title'] ),			 //5 - Title Value
					__('Title','aazeen-extension'), //6 - Title Placeholder

					//content
					wp_kses_post( $testi['content']),//7 - Content Value
					__('Content','aazeen-extension'), //8 - Content Placeholder


					//Media
					!empty($testi['image']) ? '<img class="media-picker-preview" src="'.esc_url($testi['image']).'" /><i class="fa fa-times media-picker-remove"></i>': '', //9
					esc_url( $testi['image'] ),			 //10 - Image Value
					__('Select Image', 'aazeen-extension'),	 //11 - Image Placeholder
					$this->get_field_id('custom_testi').'-mpick', //12

					//url one
					esc_url( $testi['url1'] ), //13 - url1 Value
					__('URL One','aazeen-extension'), //14 - url1 Placeholder

					//Title
					esc_attr( $testi['url_text'] ),			 //15 - url_text Value
					__('Button text one','aazeen-extension'), //16 - url_text Placeholder


					//url two
					esc_url( $testi['url2'] ), //17 - url two Value
					__('URL Two','aazeen-extension'), //18 - url  two Placeholder

					//Title
					esc_attr( $testi['url_text2'] ),			//19 - url_text two Value
					__('Button text two','aazeen-extension') //20 - url_text two Placeholder


                );
            }

            $customtesti_counter += 1;
        }

        echo '<h5>'.__('Sliders','aazeen-extension').'</h5>' . join( $customtesti_html );

        ?>

        <script type="text/javascript">
			var fieldnum = <?php echo json_encode( $customtesti_counter-1 ) ?>;
			var count = fieldnum;
			function customCarsclickFunction(buttonid){
				var fieldname = jQuery('#'+buttonid).data('widget-fieldname');
				var fieldid = jQuery('#'+buttonid).data('widget-fieldid');

					jQuery('#'+buttonid).prev().append("<div class='widget_input_wrap'><span id='"+buttonid+"-repeat"+(count+1)+"' class='repeat_handle' onclick='repeatOpen(this.id)'></span><input type='text' name='"+fieldname+"["+(count+1)+"][title]' value='<?php _e( 'Title (Required)', 'aazeen-extension' ); ?>' class='widefat' placeholder='<?php _e( 'Title (Required)', 'aazeen-extension' ); ?>'><textarea name='"+fieldname+"["+(count+1)+"][content] class='widefat sourc"+(count+1)+"' placeholder='<?php _e( 'Slider Content', 'aazeen-extension' ); ?>'></textarea><div class='media-picker-wrap'><input type='hidden' name='"+fieldname+"["+(count+1)+"][image]' value='' class='widefat media-picker' id='"+fieldid+"-"+(count+1)+"-img'><a id='"+fieldid+"-mpick"+(count+1)+"' class='media-picker-button button' onclick='mediaPicker(this.id)'><?php _e('Select Image', 'aazeen-extension') ?></a></div><input type='text' name='"+fieldname+"["+(count+1)+"][url1]' value='http://google.com' class='widefat' placeholder='<?php _e( 'Link', 'aazeen-extension' ); ?>'><input type='text' name='"+fieldname+"["+(count+1)+"][url_text]' value='Read More' class='widefat' placeholder='<?php _e( 'Read More', 'aazeen-extension' ); ?>'><input type='text' name='"+fieldname+"["+(count+1)+"][url2]' value='http://google.com' class='widefat' placeholder='<?php _e( 'Link two', 'aazeen-extension' ); ?>'><input type='text' name='"+fieldname+"["+(count+1)+"][url_text2]' value='Read More' class='widefat' placeholder='<?php _e( 'Learn More', 'aazeen-extension' ); ?>'><span class='remove-field button button-primary'>Remove</span></div>");
					count++;

			}

        </script>

        <span id="<?php echo $this->get_field_id( 'custom-field_clone' );?>" class="repeat_clone_field" data-empty-content="<?php _e('No Carousel / Tabs Added!', 'aazeen-extension') ?>"></span>

        <?php echo '<input onclick="customCarsclickFunction(this.id)" class="button button-primary" type="button" value="' . __( '+ Add New', 'aazeen-extension' ) . '" id="'.$this->get_field_id('custom_add_field').'" data-widget-fieldname="'.$this->get_field_name('custom_testi').'" data-widget-fieldid="'.$this->get_field_id('custom_testi').'" />';?>
        </div>

</div></div>
<!--Slider settings-->
<div class="block_accordion">
  <h4> <?php _e('Slider Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
		<p>
	  <label for="<?php echo $this->get_field_id('auto_play'); ?>"><?php _e('Auto play', 'aazeen-extension') ?></label>
	  <select id="<?php echo $this->get_field_id('auto_play'); ?>" name="<?php echo $this->get_field_name('auto_play'); ?>" class="widefat">
	    <option value="true" <?php if ( 'true' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('ON', 'aazeen-extension') ?></option>
	    <option value="false" <?php if ( 'false' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('OFF', 'aazeen-extension') ?></option>
	  </select>
	  </p>

		<p>
			<label for="<?php echo $this->get_field_id('slider_speed'); ?>"><?php _e('slider speed', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('slider_speed'); ?>" type="number" name="<?php echo $this->get_field_name('slider_speed'); ?>" value="<?php echo $instance['slider_speed']; ?>" class="widefat"/>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id( 'slider_height' ); ?>"><?php _e('Slider height', 'aazeen-extension') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'slider_height' ); ?>" name="<?php echo $this->get_field_name( 'slider_height' ); ?>" value="<?php echo $instance['slider_height']; ?>"  min="10" max="100" type="range" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'slider_height_m' ); ?>"><?php _e('Slider height mobile', 'aazeen-extension') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'slider_height_m' ); ?>" name="<?php echo $this->get_field_name( 'slider_height_m' ); ?>" value="<?php echo $instance['slider_height_m']; ?>"  min="10" max="100" type="range" />
		</p>

</div>
</div>

<!--Typography settings-->
<div class="block_accordion">
  <h4> <?php _e('Typography Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
		<p>
	    <label for="<?php echo $this->get_field_id('title_fontsize'); ?>"><?php _e('Title font size', 'aazeen-extension'); ?></label>
	    <input id="<?php echo $this->get_field_id('title_fontsize'); ?>" type="number" name="<?php echo $this->get_field_name('title_fontsize'); ?>" value="<?php echo $instance['title_fontsize']; ?>" class="widefat"/>
	  </p>
		<p>
			<label for="<?php echo $this->get_field_id('content_fontsize'); ?>"><?php _e('Content font size', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('content_fontsize'); ?>" type="number" name="<?php echo $this->get_field_name('content_fontsize'); ?>" value="<?php echo $instance['content_fontsize']; ?>" class="widefat"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('letter_spacing'); ?>"><?php _e('Letter Spacing', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('letter_spacing'); ?>" type="number" name="<?php echo $this->get_field_name('letter_spacing'); ?>" value="<?php echo $instance['letter_spacing']; ?>" class="widefat"/>
		</p>

</div>
</div>

<!--Color settings-->
<div class="block_accordion">
  <h4> <?php _e('Color Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
		<p>
 		 <label for="<?php echo $this->get_field_id( 'button1_color' ); ?>" class="icon-color"><?php _e('button one bg Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button1_color' ); ?>" name="<?php echo $this->get_field_name( 'button1_color' ); ?>" value="<?php echo $instance['button1_color']; ?>" type="text" />
 	 </p>
 	 <p>
 		 <label for="<?php echo $this->get_field_id( 'button2_color' ); ?>" class="icon-color"><?php _e('button two bg Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button2_color' ); ?>" name="<?php echo $this->get_field_name( 'button2_color' ); ?>" value="<?php echo $instance['button2_color']; ?>" type="text" />
 	 </p>

</div>
</div>

<?php
 }
	 //ENQUEUE CSS
		 }

	}


// register aazeen_ex dual category posts widget
function aazeen_ex_slider_widget() {
    register_widget( 'aazeen_slider_widget' );
}
add_action( 'widgets_init', 'aazeen_ex_slider_widget' );
