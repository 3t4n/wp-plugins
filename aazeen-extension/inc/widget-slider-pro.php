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
			 $widget_text = ! empty( $instance['content1'] ) ? $instance['content1'] : '';
			 $text = apply_filters( 'widget_text', $widget_text, $instance, $this );
			 $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
			 $content_bgimage_m = isset( $instance['content_bgimage_m'] ) ? $instance['content_bgimage_m'] : '';

			 $auto_play = ( ! empty( $instance['auto_play'] ) ) ? wp_kses_post( $instance['auto_play'] ) : '';
			 $slider_height = ( ! empty( $instance['slider_height'] ) ) ?  $instance['slider_height']  : '80';
			 $slider_width = ( ! empty( $instance['slider_width'] ) ) ?  $instance['slider_width']  : '24';
			 $slider_height_m = ( ! empty( $instance['slider_height_m'] ) ) ? absint($instance['slider_height_m']): '70';
			 $letter_weight_cont = ( ! empty( $instance['letter_weight_cont'] ) ) ? absint($instance['letter_weight_cont']): '400';
			 $letter_weight = ( ! empty( $instance['letter_weight'] ) ) ? absint($instance['letter_weight']): '600';

			 $slider_conten_p = ( ! empty( $instance['slider_conten_p'] ) ) ? wp_kses_post( $instance['slider_conten_p'] ) : '';
			 $content_bg_tras = ( ! empty( $instance['content_bg_tras'] ) ) ? wp_kses_post( $instance['content_bg_tras'] ) : '';
			 $overlay_bg_tras = ( ! empty( $instance['overlay_bg_tras'] ) ) ? wp_kses_post( $instance['overlay_bg_tras'] ) : '0.6';


			 $new_tab = isset( $instance['new_tab'] ) ? $instance['new_tab'] : false;
			 $content_color = isset( $instance['content_color'] ) ? $instance['content_color'] : '#fff';
			 $title_color = isset( $instance['title_color'] ) ? $instance['title_color'] : '#fff';

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
			#<?php echo $id;?> .slider2 .post-header h3,#<?php echo $id;?> .modern-Slider .item h3,#<?php echo $id;?> .hero-content h1{
				font-size: <?php echo ($instance['title_fontsize']);?>px;}
			#<?php echo $id;?> .slider2 .post-header p ,#<?php echo $id;?> .modern-Slider .item h5,#<?php echo $id;?> .hero-content p
 		 {
 			 font-size: <?php echo ($instance['content_fontsize']);?>px;
 		 }
		 	}
			#<?php echo $id;?> .slider2 .post-header h3,#<?php echo $id;?> .modern-Slider .item h3,#<?php echo $id;?> .hero-content h1{
				color: <?php echo ($title_color);?>;letter-spacing:<?php echo ($instance['letter_spacing']);?>px;font-weight:<?php echo ($letter_weight);?>;}

			#<?php echo $id;?> .slider2 .post-header p ,#<?php echo $id;?> .modern-Slider .item h5,#<?php echo $id;?> .hero-content p
 		 {
 			 color: <?php echo ($content_color);?>;letter-spacing:<?php echo ($instance['letter_spacing_cont']);?>px;font-weight:<?php echo ($letter_weight_cont);?>;
 		 }

		 #<?php echo $id;?> .full-height .overlay {opacity: <?php echo ($overlay_bg_tras);?> }



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

		#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn.btn-info,#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn
	{
		background-color: <?php echo $button2_color_in ;?> ;
		box-shadow:0 2px 2px 0 <?php echo Kirki_Color::get_rgba($button2_color_in, 0.14) ?>,0 3px 1px -2px <?php echo Kirki_Color::get_rgba($button2_color_in, 0.2) ?>,0 1px 5px 0 <?php echo Kirki_Color::get_rgba($button2_color_in, 0.12) ?>;
	}
	#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn.btn-info:hover,#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn:hover
	{
		box-shadow:0 14px 26px -12px <?php echo Kirki_Color::get_rgba($button2_color_in, .42) ?>, 0 4px 23px 0 rgba(0, 0, 0, .12), 0 8px 10px -5px rgba(156, 39, 176, .2);

	}
			#<?php echo $id;?> .aazeen-slider .slidertwo.btn.btn-info,#<?php echo $id;?>.aazeen_slider_widget .slidertwo.btn
	{
		color:<?php echo $button2_color_text ?>;
	}

	/*----------- slider height; -----------*/

	#<?php echo $id;?>  .aazeen-slider .item .img-fill,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .post-thumbouter-slider,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .thumbnail-image-slider,#<?php echo $id;?> .full-height,#<?php echo $id;?> .full-height .grid-x .cell{height: <?php echo esc_attr($slider_height);?>vh}

@media screen and (max-width: 39.9375em) {
	#<?php echo $id;?>  .aazeen-slider .item .img-fill,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .post-thumbouter-slider,#<?php echo $id;?>  .aazeen-slider .slider-post-wrap .thumbnail-image-slider,#<?php echo $id;?> .full-height,#<?php echo $id;?> .full-height .grid-x .cell{height: <?php echo esc_attr($slider_height_m);?>vh}
}
<?php if($slider_conten_p == 'content_center') { ?>
	#<?php echo $id;?> .aazeen-slider .info,
			#<?php echo $id;?> .slider2.slider-post-wrap .is-header-overlay,	#<?php echo $id;?> .full-height .grid-x .cell{
		justify-content: center;
		text-align: center;
	}
<?php } ?>
<?php if($slider_conten_p == 'content_left') { ?>
	#<?php echo $id;?> .aazeen-slider .info,
		#<?php echo $id;?> .slider2.slider-post-wrap .is-header-overlay,#<?php echo $id;?> .full-height .grid-x .cell{
		justify-content: flex-start;
		text-align: left;
	}
	#<?php echo $id;?>	.slider2.slider-post-wrap .is-header-overlay {
    padding-left: 30px;
}
<?php } ?>
<?php if($slider_conten_p == 'content_right') { ?>
	#<?php echo $id;?> .aazeen-slider .info,
			#<?php echo $id;?> .slider2.slider-post-wrap .is-header-overlay,#<?php echo $id;?> .full-height .grid-x .cell{
		justify-content: flex-end;
		text-align: right;
	}
	#<?php echo $id;?>	.slider2.slider-post-wrap .is-header-overlay {
		padding-right: 30px;
}
<?php } ?>
	#<?php echo $id;?> .slider2 .post-header,#<?php echo $id;?> .modern-Slider .item .info > div{
		background: rgba(0,0,0,<?php echo $content_bg_tras ;?>);
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
																	 <a href="<?php echo esc_url($testimony['url1']);?>" class="sliderone btn btn-rose <?php echo esc_attr($instance['button_one_style']); ?> ">
																		 <?php echo esc_html($testimony['url_text']);?>
                    								</a>
																	<?php }?>
																	<?php if (!empty ($testimony['url2'])) {?>
																	<a href="<?php echo esc_url($testimony['url2']);?>" class="slidertwo btn btn-info <?php echo esc_attr($instance['button_two_style']); ?> ">
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
												<a href="<?php echo esc_url($testimony['url1']);?>" class="sliderone btn btn-rose <?php echo esc_attr($instance['button_one_style']); ?> ">
													<?php echo esc_html($testimony['url_text']);?>
												 </a>
											 <?php }?>
											 <?php if (!empty ($testimony['url2'])) {?>
											 <a href="<?php echo esc_url($testimony['url2']);?>" class="slidertwo btn btn-info <?php echo esc_attr($instance['button_two_style']); ?> ">
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

			<?php if($slider_style == 'style_three') { ?>
					<div  class="paraxify full-height" data-interchange="[<?php echo esc_url( $content_bgimage_m );?>, small],[<?php echo esc_url( $content_bgimage);?>, large]"   <?php if(is_customize_preview()){?> style="background-image: url(<?php echo esc_url( $content_bgimage);?>);" <?php }?>>
						<div class="overlay <?php echo esc_attr($instance['bg_color']); ?>"></div>
						<?php	if (!empty($instance['title1']) || !empty($instance['content1'])): ?>
						<div class="grid-container">
							<div class="grid-x grid-margin-x">
								<div class="cell large-<?php echo esc_attr($slider_width); ?> small-22 ">
									<div class="hero-content">
										 <?php if (!empty($instance['title1'])): ?>
										<h1><?php echo apply_filters('widget_title', $instance['title1']); ?></h1>
										 <?php endif;?>
										 <?php if (!empty($instance['content1'])): ?>
									<?php echo  wpautop($text) ; ?>
									<?php endif;?>
									<?php	if (!empty($instance['link_text1']) || !empty($instance['url1'])): ?>
			 						 <a class="btn btn-rose <?php echo esc_attr($instance['button_one_style']); ?> sliderone" href="<?php echo esc_url($instance['url1']); ?>" <?php if (esc_attr($new_tab)) : ?> target="_blank" <?php endif;?>>
			 							 <?php echo apply_filters('widget_title', $instance['link_text1']); ?>
			 						 </a>
			 					 <?php endif;?>
			 					 <?php	if (!empty($instance['link_text2']) || !empty($instance['url2'])): ?>
			 						 <a class="btn btn-rose <?php echo esc_attr($instance['button_two_style']); ?> slidertwo" href="<?php echo esc_url($instance['url2']); ?>" <?php if (esc_attr($new_tab)) : ?> target="_blank" <?php endif;?>>
			 							 <?php echo apply_filters('widget_title', $instance['link_text2']); ?>
			 						 </a>
			 					 <?php endif;?>
									</div>
								</div>
							</div>
						</div>
						<?php endif;?>
					</div>
			<?php } ?>  <!-- style_three -->
</div>

<?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
				/*section title */
				$instance[ 'slider_style' ]	= wp_kses_post( $new_instance[ 'slider_style' ] );
				// hero slider
				/*Box 1 */
				$instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);
				$instance['content_bgimage_m'] = strip_tags($new_instance['content_bgimage_m']);


				$instance['title1'] = sanitize_text_field($new_instance['title1']);
				if ( current_user_can( 'unfiltered_html' ) ) {
					$instance['content1'] = $new_instance['content1'];
				} else {
					$instance['content1'] = wp_kses_post( $new_instance['content1'] );
				}

				/*Box 1 */
				$instance['link_text1'] = sanitize_text_field( $new_instance['link_text1'] );
				$instance['url1'] = esc_url_raw( $new_instance['url1'] );

				/*Box 1 */
				$instance['link_text2'] = sanitize_text_field( $new_instance['link_text2'] );
				$instance['url2'] = esc_url_raw( $new_instance['url2'] );


				$instance['button1_color'] = strip_tags($new_instance['button1_color']);
				$instance[ 'button_one_style' ]	= wp_kses_post( $new_instance[ 'button_one_style' ] );

				$instance['button2_color'] = sanitize_hex_color($new_instance['button2_color']);
				$instance[ 'button_two_style' ]	= wp_kses_post( $new_instance[ 'button_two_style' ] );
				$instance['new_tab'] = isset( $new_instance['new_tab'] ) ? (bool) $new_instance['new_tab'] : false;
				$instance['bg_color'] = strip_tags($new_instance['bg_color']);
				$instance['overlay_bg_tras'] = wp_kses_post( $new_instance[ 'overlay_bg_tras' ] );

				$instance['title_color'] = strip_tags($new_instance['title_color']);
				$instance['content_color'] = strip_tags($new_instance['content_color']);

				//slider setting
				$instance[ 'auto_play' ]	= wp_kses_post( $new_instance[ 'auto_play' ] );
				$instance['slider_height'] = strip_tags($new_instance['slider_height']);
				$instance['slider_speed'] = isset($new_instance['slider_speed']) ? absint($new_instance['slider_speed']) : '';
				$instance['slider_height_m'] = isset($new_instance['slider_height_m']) ? absint($new_instance['slider_height_m']) : '';
				$instance['slider_width'] = isset($new_instance['slider_width']) ? absint($new_instance['slider_width']) : '';


				$instance[ 'slider_conten_p' ]	= wp_kses_post( $new_instance[ 'slider_conten_p' ] );
				$instance['content_bg_tras'] = wp_kses_post( $new_instance[ 'content_bg_tras' ] );



				$instance['title_fontsize'] = strip_tags($new_instance['title_fontsize']);
				$instance['content_fontsize'] = isset($new_instance['content_fontsize']) ? absint($new_instance['content_fontsize']) : '';
				$instance['letter_spacing'] = isset($new_instance['letter_spacing']) ? absint($new_instance['letter_spacing']) : '';
				$instance['letter_spacing_cont'] = isset($new_instance['letter_spacing_cont']) ? absint($new_instance['letter_spacing_cont']) : '';
				$instance['letter_weight'] = isset($new_instance['letter_weight']) ? absint($new_instance['letter_weight']) : '';
				$instance['letter_weight_cont'] = isset($new_instance['letter_weight_cont']) ? absint($new_instance['letter_weight_cont']) : '';


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
			'letter_spacing_cont'=>'1',
			'slider_speed'=>'300',
			'slider_height_m'=>70,
			'slider_conten_p'=>'content_center',
			'content_bg_tras'=>0.31,
			'button_one_style'=> 'regu',
			'button_two_style'=>'btn-round',
			'title1'=>'Need To Grow Your Creative Site',
			'content1'=>'You will save a lot of time. It is easy to purchase and enjoy these wonderful feelings!',
			'link_text1'=>'LEARN MORE',
			'url1'=>'https://www.themezwp.com/aazeen/',
			'content_color' =>'#fff' ,
			'title_color'=> '#fff',
			'letter_weight_cont'=>'400',
			'letter_weight' => '600',
			'slider_width' =>24,
			'bg_color'=>'gradient_6',
			'overlay_bg_tras'=>0.6,
			);
			$instance = wp_parse_args( (array) $instance, $defaults );
			$new_tab = isset( $instance['new_tab'] ) ? (bool) $instance['new_tab'] : false;


			?>

	 <p>
	 <label for="<?php echo $this->get_field_id('slider_style'); ?>"><?php _e('Slect slider Style', 'aazeen-extension') ?></label>
	 <select id="<?php echo $this->get_field_id('slider_style'); ?>" name="<?php echo $this->get_field_name('slider_style'); ?>" class="widefat">
		 <option value="style_one" <?php if ( 'style_one' == $instance['slider_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Style one', 'aazeen-extension') ?></option>
		 <option value="style_two" <?php if ( 'style_two' == $instance['slider_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Style two', 'aazeen-extension') ?></option>
		 <option value="style_three" <?php if ( 'style_three' == $instance['slider_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Style Three', 'aazeen-extension') ?></option>
	 </select>
	 </p>


	 <script type="text/javascript">
	 jQuery(document).ready(function($){
	 		$("#<?php echo $this->get_field_id('slider_style'); ?>").change(function(){
	 				$(this).find("option:selected").each(function(){
	 						var optionValue = $(this).attr("value");
	 						if(optionValue){
	 								$(".box-slider").not("." + optionValue).hide();
	 								$("." + optionValue).show();
	 						} else{
	 								$(".box-slider").hide();
	 						}

	 				});
	 		}).change();
	 });
	 </script>
	 <!-- Clients Field -->
	 <div class="block_accordion box-slider style_one style_two" >
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

<!--BLOCK 1 START-->
<div class="block_accordion" >
	<h4>
		<?php _e('CONTENT (style 4)', 'aazeen-extension') ?></h4>
	<div class="block_acc_wrap">
		<p>
		  <div class="widget_input_wrap">
		      <label for="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"><?php _e(' Image desktop ', 'aazeen-extension') ?></label>
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

		<p>
			<div class="widget_input_wrap">
					<label for="<?php echo $this->get_field_id( 'content_bgimage_m' ); ?>"><?php _e(' Image Mobile ', 'aazeen-extension') ?></label>
					<div class="media-picker-wrap">
					<?php if(!empty($instance['content_bgimage_m'])) { ?>
							<img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['content_bgimage_m']); ?>" />
							<i class="fa fa-times media-picker-remove"></i>
					<?php } ?>

					<input class="widefat media-picker" id="<?php echo $this->get_field_id( 'content_bgimage_m' ); ?>" name="<?php echo $this->get_field_name( 'content_bgimage_m' ); ?>" value="<?php if( !empty($instance['content_bgimage_m']) ): echo $instance['content_bgimage_m']; endif; ?>" type="hidden" />
					<a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage_m' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
					</div>
			</div>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('title1'); ?>"><?php _e('Title', 'aazeen-extension'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php if( !empty($instance['title1']) ): echo $instance['title1']; endif; ?>" class="widefat">
		</p>

		<p><label for="<?php echo $this->get_field_id( 'content1' ); ?>"><?php _e( 'Content','aazeen-extension' ); ?></label>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('content1'); ?>" name="<?php echo $this->get_field_name('content1'); ?>"><?php if( !empty($instance['content1']) ):echo esc_textarea( $instance['content1'] );endif; ?></textarea></p>
		<p>
			<label for="<?php echo $this->get_field_id('link_text1'); ?>"><?php _e('button Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text1'); ?>" id="<?php echo $this->get_field_id('link_text1'); ?>" value="<?php if( !empty($instance['link_text1']) ): echo $instance['link_text1']; endif; ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url1'); ?>"><?php _e('button Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url1'); ?>" id="<?php echo $this->get_field_id('url1'); ?>" value="<?php if( !empty($instance['url1']) ): echo esc_url($instance['url1']); endif; ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('link_text2'); ?>"><?php _e('button Text', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('link_text2'); ?>" id="<?php echo $this->get_field_id('link_text2'); ?>" value="<?php if( !empty($instance['link_text2']) ): echo $instance['link_text2']; endif; ?>" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('url2'); ?>"><?php _e('button Link', 'promote'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('url2'); ?>" id="<?php echo $this->get_field_id('url2'); ?>" value="<?php if( !empty($instance['url2']) ): echo esc_url($instance['url2']); endif; ?>" class="widefat">
		</p>
		<p><input class="checkbox" type="checkbox" <?php checked( $new_tab ); ?> id="<?php echo $this->get_field_id( 'new_tab' ); ?>" name="<?php echo $this->get_field_name( 'new_tab' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'new_tab' ); ?>"><?php _e( 'open on new tab', 'aazeen-extension' ); ?></label>
		</p>

		<p>
			<script type="text/javascript">
			jQuery( function( $ ) {

				function getEnhancedSelectFormatStringsgra() {
					var formatString = {
						formatMatches: function( matches ) {
							if ( 1 === matches ) {
								return suffice_enhanced_select_params.i18n_matches_1;
							}

							return suffice_enhanced_select_params.i18n_matches_n.replace( '%qty%', matches );
						},
						formatNoMatches: function() {
							return suffice_enhanced_select_params.i18n_no_matches;
						},
						formatAjaxError: function() {
							return suffice_enhanced_select_params.i18n_ajax_error;
						},
						formatInputTooShort: function( input, min ) {
							var number = min - input.length;

							if ( 1 === number ) {
								return suffice_enhanced_select_params.i18n_input_too_short_1;
							}

							return suffice_enhanced_select_params.i18n_input_too_short_n.replace( '%qty%', number );
						},
						formatInputTooLong: function( input, max ) {
							var number = input.length - max;

							if ( 1 === number ) {
								return suffice_enhanced_select_params.i18n_input_too_long_1;
							}

							return suffice_enhanced_select_params.i18n_input_too_long_n.replace( '%qty%', number );
						},
						formatSelectionTooBig: function( limit ) {
							if ( 1 === limit ) {
								return suffice_enhanced_select_params.i18n_selection_too_long_1;
							}

							return suffice_enhanced_select_params.i18n_selection_too_long_n.replace( '%qty%', limit );
						},
						formatLoadMore: function() {
							return suffice_enhanced_select_params.i18n_load_more;
						},
						formatSearching: function() {
							return suffice_enhanced_select_params.i18n_searching;
						}
					};

					return formatString;
				}

				function getEnhancedSelectFormatResultgra( icon ) {
					if ( icon.id && $( icon.element ).data( 'icon' ) ) {
						return '<div class="gra ' + $( icon.element ).data( 'icon' ) + '"></div> ' ;
					}

					return '<div class="gra ' + $( icon.element ).data( 'icon' ) + '"></div> ' ;
				}

				$( document.body )

					.on( 'suffice-enhanced-select-init', function() {

						// Icon Picker
						$( ':input.suffice-enhanced-select-gra' ).filter( ':not(.enhanced)' ).each( function() {
							var select2_args = $.extend({
								minimumResultsForSearch: 10,
								allowClear:  true,
										 escapeMarkup: function (markup) {return markup;},
								placeholder: $( this ).data( 'placeholder' ),
								templateResult: getEnhancedSelectFormatResultgra
							}, getEnhancedSelectFormatStringsgra() );
							$( this ).select2( select2_args ).addClass( 'enhanced' );
						});
					})

					.trigger( 'suffice-enhanced-select-init' );

			});

			</script>
			<div id="tg-widget-icon-picker" class="suffice-icon enhanced">
			<label for="<?php echo $this->get_field_id('bg_color'); ?>"><?php _e('Background Color or overlay', 'aazeen-extension') ?></label>
			<select id="<?php echo $this->get_field_id('bg_color'); ?>" name="<?php echo $this->get_field_name('bg_color'); ?>" class="widefat suffice-enhanced-select-gra" data-placeholder="<?php esc_attr_e( 'Choose gradient color&hellip;', 'suffice-toolkit' ); ?>">
				<option value=""></option>
				<?php  $array = array();
								for ($x = 1; $x <= 40; $x++) {
										?>
				<option value="<?php echo 'gradient_'.$x ?>" class="<?php echo 'gradient_'.$x ?>" data-icon="<?php echo esc_attr( 'gradient_'.$x ); ?>" <?php echo selected($instance['bg_color'], 'gradient_'.$x); ?> > <?php _e('gradient-'.$x, 'aazeen-extension') ?></option>
				<?php
								} ?>
			</select>
		</div>
		<p>
		<label for="<?php echo $this->get_field_id('overlay_bg_tras'); ?>"><?php _e('overlay BG Opacity (0 to 1)', 'aazeen-extension'); ?></label>
		<input id="<?php echo $this->get_field_id('overlay_bg_tras'); ?>" type="number" name="<?php echo $this->get_field_name('overlay_bg_tras'); ?>" value="<?php echo $instance['overlay_bg_tras']; ?>" class="widefat"/>
	</p>


</div>
</div>
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
	<label for="<?php echo $this->get_field_id('slider_conten_p'); ?>"><?php _e('slider content position', 'aazeen-extension') ?></label>
 	 <select id="<?php echo $this->get_field_id('slider_conten_p'); ?>" name="<?php echo $this->get_field_name('slider_conten_p'); ?>" class="widefat">
 		 <option value="content_right" <?php if ( 'content_right' == $instance['slider_conten_p'] ) echo 'selected="selected"'; ?>><?php esc_html_e('right', 'aazeen-extension') ?></option>
 		 <option value="content_center" <?php if ( 'content_center' == $instance['slider_conten_p'] ) echo 'selected="selected"'; ?>><?php esc_html_e('center', 'aazeen-extension') ?></option>
 		 <option value="content_left" <?php if ( 'content_left' == $instance['slider_conten_p'] ) echo 'selected="selected"'; ?>><?php esc_html_e('left', 'aazeen-extension') ?></option>
 	 </select>
	 <p>
		 <label for="<?php echo $this->get_field_id( 'slider_width' ); ?>"><?php _e('Content width', 'aazeen-extension') ?></label>
		 <input class="widefat" id="<?php echo $this->get_field_id( 'slider_width' ); ?>" name="<?php echo $this->get_field_name( 'slider_width' ); ?>" value="<?php echo $instance['slider_width']; ?>"  min="6" max="24" type="range" />
	 </p>

		 <p>
		 <label for="<?php echo $this->get_field_id('content_bg_tras'); ?>"><?php _e('Content BG Opacity (0 to 1)', 'aazeen-extension'); ?></label>
		 <input id="<?php echo $this->get_field_id('content_bg_tras'); ?>" type="number" name="<?php echo $this->get_field_name('content_bg_tras'); ?>" value="<?php echo $instance['content_bg_tras']; ?>" class="widefat"/>
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
		<p>
			<label for="<?php echo $this->get_field_id('letter_spacing_cont'); ?>"><?php _e('Letter Spacing content', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('letter_spacing_cont'); ?>" type="number" name="<?php echo $this->get_field_name('letter_spacing_cont'); ?>" value="<?php echo $instance['letter_spacing_cont']; ?>" class="widefat"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('letter_weight'); ?>"><?php _e('Letter weight', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('letter_weight'); ?>" type="number" name="<?php echo $this->get_field_name('letter_weight'); ?>" value="<?php echo $instance['letter_weight']; ?>" class="widefat"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('letter_weight_cont'); ?>"><?php _e('Letter weight content', 'aazeen-extension'); ?></label>
			<input id="<?php echo $this->get_field_id('letter_weight_cont'); ?>" type="number" name="<?php echo $this->get_field_name('letter_weight_cont'); ?>" value="<?php echo $instance['letter_weight_cont']; ?>" class="widefat"/>
		</p>

</div>
</div>

<!--Color settings-->
<div class="block_accordion">
  <h4> <?php _e('Color Settings', 'aazeen-extension') ?></h4>
  <div class="block_acc_wrap">
		<p>
			<label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
			<input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
		</p>

	<p>
	  <label for="<?php echo $this->get_field_id( 'content_color' ); ?>" class="icon-color"><?php _e('Content Color', 'aazeen-extension') ?></label>
	  <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'content_color' ); ?>" name="<?php echo $this->get_field_name( 'content_color' ); ?>" value="<?php echo $instance['content_color']; ?>" type="text" />
	</p>

		<p>
 		 <label for="<?php echo $this->get_field_id( 'button1_color' ); ?>" class="icon-color"><?php _e('button one bg Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button1_color' ); ?>" name="<?php echo $this->get_field_name( 'button1_color' ); ?>" value="<?php echo $instance['button1_color']; ?>" type="text" />
 	 </p>
	 <label for="<?php echo $this->get_field_id('button_one_style'); ?>"><?php _e('button style', 'aazeen-extension') ?></label>
	 <select id="<?php echo $this->get_field_id('button_one_style'); ?>" name="<?php echo $this->get_field_name('button_one_style'); ?>" class="widefat">
		 <option value="btn-sm" <?php if ( 'btn-sm' == $instance['button_one_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Small', 'aazeen-extension') ?></option>
 		 <option value="regu" <?php if ( 'regu' == $instance['button_one_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Regular', 'aazeen-extension') ?></option>
 		 <option value="btn-round" <?php if ( 'btn-round' == $instance['button_one_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round', 'aazeen-extension') ?></option>
		 <option value="btn-lg" <?php if ( 'btn-round' == $instance['button_one_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Large', 'aazeen-extension') ?></option>
		 <option value="btn-round btn-lg" <?php if ( 'btn-round btn-lg' == $instance['button_one_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round Large', 'aazeen-extension') ?></option>

	 </select>
	 <p>

 	 <p>
 		 <label for="<?php echo $this->get_field_id( 'button2_color' ); ?>" class="icon-color"><?php _e('button two bg Color', 'aazeen-extension') ?></label>
 		 <input class="widefat color-picker"  id="<?php echo $this->get_field_id( 'button2_color' ); ?>" name="<?php echo $this->get_field_name( 'button2_color' ); ?>" value="<?php echo $instance['button2_color']; ?>" type="text" />
 	 </p>
	 <label for="<?php echo $this->get_field_id('button_two_style'); ?>"><?php _e('button style', 'aazeen-extension') ?></label>
	 <select id="<?php echo $this->get_field_id('button_two_style'); ?>" name="<?php echo $this->get_field_name('button_two_style'); ?>" class="widefat">
		 <option value="btn-sm" <?php if ( 'btn-sm' == $instance['button_two_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Small', 'aazeen-extension') ?></option>
 		 <option value="regu" <?php if ( 'regu' == $instance['button_two_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Regular', 'aazeen-extension') ?></option>
 		 <option value="btn-round" <?php if ( 'btn-round' == $instance['button_two_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round', 'aazeen-extension') ?></option>
		 <option value="btn-lg" <?php if ( 'btn-round' == $instance['button_two_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Large', 'aazeen-extension') ?></option>
		 <option value="btn-round btn-lg" <?php if ( 'btn-round btn-lg' == $instance['button_two_style'] ) echo 'selected="selected"'; ?>><?php esc_html_e('Round Large', 'aazeen-extension') ?></option>

	 </select>
	 <p>


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
