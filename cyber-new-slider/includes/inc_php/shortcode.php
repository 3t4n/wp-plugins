<?php
/**
 * Shortcode For The Slider
 * callback @cyber_slider_shortcode_cb
 *
 */
function change_cyber_slider_settings ( $cyber_slideroption ){
	/** General Tab Settings **/
	if( $cyber_slideroption['autoplay'] == 'on' )
		$cyber_slideroption['autoplay'] = 'true';
	else
		$cyber_slideroption['autoplay'] = 'false';
	
	if( $cyber_slideroption['show_nav_arrows'] == 'on' )
		$cyber_slideroption['show_nav_arrows'] = 'true';
	else
		$cyber_slideroption['show_nav_arrows'] = 'false';
	
	if( $cyber_slideroption['show_dots'] == 'on' )
		$cyber_slideroption['show_dots'] = 'true';
	else
		$cyber_slideroption['show_dots'] = 'false';
	
	if( $cyber_slideroption['infinite_loop'] == 'on' )
		$cyber_slideroption['infinite_loop'] = 'true';
	else
		$cyber_slideroption['infinite_loop'] = 'false';
	
	if( $cyber_slideroption['pause_on_hover'] == 'on' )
		$cyber_slideroption['pause_on_hover'] = 'true';
	else
		$cyber_slideroption['pause_on_hover'] = 'false';
	
	if( $cyber_slideroption['pause_on_dot_hover'] == 'on' )
		$cyber_slideroption['pause_on_dot_hover'] = 'true';
	else
		$cyber_slideroption['pause_on_dot_hover'] = 'false';
	
	/** Layout Tab Settings **/
	if( $cyber_slideroption['slider_responsive_mode'] == 'on' )
		$cyber_slideroption['slider_responsive_mode'] = 'true';
	else
		$cyber_slideroption['slider_responsive_mode'] = 'false';
	
	if( $cyber_slideroption['slider_hideonmobile'] == 'on' )
		$cyber_slideroption['slider_hideonmobile'] = 'true';
	else
		$cyber_slideroption['slider_hideonmobile'] = 'false';
	
	/** Thumbnail Tab Settings **/
	if( $cyber_slideroption['showthumbs'] == 'on' )
		$cyber_slideroption['showthumbs'] = 'true';
	else
		$cyber_slideroption['showthumbs'] = 'false';
	
	if( $cyber_slideroption['showthumbsNavArrows'] == 'on' )
		$cyber_slideroption['showthumbsNavArrows'] = 'true';
	else
		$cyber_slideroption['showthumbsNavArrows'] = 'false';

	if( empty( $cyber_slideroption['slides_to_show'] ) )
		$cyber_slideroption['slides_to_show'] = 1;
	
	if( empty( $cyber_slideroption['slides_to_scroll'] ) )
		$cyber_slideroption['slides_to_scroll'] = 1;

	/** Responsive Tab Settings**/
 
	 /* start for the screen width 1024 settings*/
	 
	  if(empty($cyber_slideroption['screen_width_1024'] ) )
	   $cyber_slideroption['screen_width_1024']= 1024;

	   if(empty($cyber_slideroption['screen_height_1024'] ) )
   	   $cyber_slideroption['screen_height_1024']= 500;

	  if( empty( $cyber_slideroption['slides_to_show_1024'] ) )
	  $cyber_slideroption['slides_to_show_1024'] = 1;

	  if( empty($cyber_slideroption['slides_to_scroll_1024'] ) )
	  $cyber_slideroption['slides_to_scroll_1024'] = 1;

	  if( empty( $cyber_slideroption['respondto_1024'] ) )
	  $cyber_slideroption['respondto_1024'] = 'window';

	  if( $cyber_slideroption['hideslider_1024'] == 'on' )
	  $cyber_slideroption['hideslider_1024'] = 'true';
	  else
	  $cyber_slideroption['hideslider_1024'] = 'false';

	  if( $cyber_slideroption['dots_1024'] == 'on' )
	  $cyber_slideroption['dots_1024'] = 'true';
	  else
	  $cyber_slideroption['dots_1024'] = 'false';

	  if( $cyber_slideroption['infinite_1024'] == 'on' )
	  $cyber_slideroption['infinite_1024'] = 'true';
	  else
	  $cyber_slideroption['infinite_1024'] = 'false';

	  if( $cyber_slideroption['showmobilefirst_1024'] == 'on' )
	  $cyber_slideroption['showmobilefirst_1024'] = 'true';
	  else
	  $cyber_slideroption['showmobilefirst_1024'] = 'false';

	 /* end screen width 1024 settings*/
	 

	 /* start for the screen width 768 settings*/
	 
	  if(empty($cyber_slideroption['screen_width_768'] ) )
	   $cyber_slideroption['screen_width_768']= 768;

	  if(empty($cyber_slideroption['screen_height_768'] ) )
      $cyber_slideroption['screen_height_768']= 400;

	  if( empty( $cyber_slideroption['slides_to_show_768'] ) )
	  $cyber_slideroption['slides_to_show_768'] = 1;

	  if( empty( $cyber_slideroption['slides_to_scroll_768'] ) )
	  $cyber_slideroption['slides_to_scroll_768'] = 1;

	  if( empty( $cyber_slideroption['respondto_768'] ) )
	  $cyber_slideroption['respondto_768'] = 'window';

	  if( $cyber_slideroption['hideslider_768'] == 'on' )
	  $cyber_slideroption['hideslider_768'] = 'true';
	  else
	  $cyber_slideroption['hideslider_768'] = 'false';

	  if( $cyber_slideroption['dots_768'] == 'on' )
	  $cyber_slideroption['dots_768'] = 'true';
	  else
	  $cyber_slideroption['dots_768'] = 'false';

	  if( $cyber_slideroption['infinite_768'] == 'on' )
	  $cyber_slideroption['infinite_768'] = 'true';
	  else
	  $cyber_slideroption['infinite_768'] = 'false';

	  if( $cyber_slideroption['showmobilefirst_768'] == 'on' )
	  $cyber_slideroption['showmobilefirst_768'] = 'true';
	  else
	  $cyber_slideroption['showmobilefirst_768'] = 'false';

	 /* end screen width 768 settings*/
	 

	 /* start for the screen width 480 settings*/
	 
	  if(empty($cyber_slideroption['screen_width_480'] ) )
	   $cyber_slideroption['screen_width_480']= 480;

	   if(empty($cyber_slideroption['screen_height_480'] ) )
       $cyber_slideroption['screen_height_480']= 350;

	  if( empty($cyber_slideroption['slides_to_show_480'] ) )
	  $cyber_slideroption['slides_to_show_480'] = 1;

	  if( empty($cyber_slideroption['slides_to_scroll_480'] ) )
	  $cyber_slideroption['slides_to_scroll_480'] = 1;

	  if( empty( $cyber_slideroption['respondto_480'] ) )
	   $cyber_slideroption['respondto_480'] = 'window';

	  if( $cyber_slideroption['hideslider_480'] == 'on' )
	  $cyber_slideroption['hideslider_480'] = 'true';
	  else
	  $cyber_slideroption['hideslider_480'] = 'false';

	  if( $cyber_slideroption['dots_480'] == 'on' )
	  $cyber_slideroption['dots_480'] = 'true';
	  else
	  $cyber_slideroption['dots_480'] = 'false';

	  if( $cyber_slideroption['infinite_480'] == 'on' )
	  $cyber_slideroption['infinite_480'] = 'true';
	  else
	  $cyber_slideroption['infinite_480'] = 'false';

	  if( $cyber_slideroption['showmobilefirst_480'] == 'on' )
	  $cyber_slideroption['showmobilefirst_480'] = 'true';
	  else
	  $cyber_slideroption['showmobilefirst_480'] = 'false';

	 /* end screen width 480 settings*/
	
	return $cyber_slideroption;
}

function cyber_slider_js( $slider_id ) {
	global $wpdb;
	
	$table_name = $wpdb->prefix.'cyberslider';
	$slider_name_query = $wpdb->get_row( "SELECT name,settings FROM $table_name WHERE id = $slider_id" );
	$slider_options = $slider_name_query->settings;
	$cyber_slideroption = unserialize($slider_options); 
	$current_slider_settings = change_cyber_slider_settings ( $cyber_slideroption );

	//echo "<pre>"; print_r($current_slider_settings); echo "</pre>";
	?>
	<script>
		jQuery(document).ready(function() {
			var sliderID = '#cyber_slider_'+'<?php echo $slider_id; ?>';

			jQuery(sliderID + ' .slider-for').slick({
				autoplay: <?php echo $current_slider_settings['autoplay']; ?>, // for autoplay 1st param
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: <?php echo $current_slider_settings['show_nav_arrows']; ?>,
				fade: false,
				asNavFor : sliderID + ' .slider-nav',
				pauseOnHover : <?php echo $current_slider_settings['pause_on_hover']; ?>,
				pauseOnDotsHover : <?php echo $current_slider_settings['pause_on_dot_hover']; ?>,
				infinite : <?php echo $current_slider_settings['infinite_loop']; ?>,
				easing : "<?php if($current_slider_settings['slider_animation']){ echo $current_slider_settings['slider_animation']; }else{ echo 'easeInQuad' ; } ?>",
				speed : <?php if($current_slider_settings['slide_speed']) echo $current_slider_settings['slide_speed']; else echo 2000; ?>,
				dots: <?php echo $current_slider_settings['show_dots']; ?>,
			});
			
			jQuery(sliderID + ' .slider-nav').slick({
				autoplay: false,
				dots: <?php echo $current_slider_settings['show_dots']; ?>,
				slidesToShow: <?php if( $current_slider_settings['no_of_thumbs'] ) echo $current_slider_settings['no_of_thumbs']; else echo 3; ?>,
				slidesToScroll: 1,
				asNavFor: sliderID + ' .slider-for',
				arrows: <?php echo $current_slider_settings['showthumbsNavArrows']; ?>,
				easing : "swing",
				speed : <?php if($current_slider_settings['slide_speed']) echo $current_slider_settings['slide_speed']; else echo 2000; ?>,
				centerMode: true,
				focusOnSelect: true,
				infinite : <?php echo $current_slider_settings['infinite_loop']; ?>,
				centerPadding: <?php if($current_slider_settings['center_padding'] != ''){ echo "'".$current_slider_settings['center_padding']."'"; }else{ echo "'50px'"; }; ?>,
				responsive: [
		           {
		            /*Responsive settings for screen 1024*/
		             breakpoint: <?php echo $current_slider_settings['screen_width_1024']; ?>,

		             settings: {
		               slidesToShow: <?php echo $current_slider_settings['slides_to_show_1024']; ?>,

		               slidesToScroll: <?php echo $current_slider_settings['slides_to_scroll_1024']; ?>,

		               resondTo:  <?php echo $current_slider_settings['respondto_1024']; ?>,

		               unslick:<?php echo $current_slider_settings['hideslider_1024']; ?>,

		               dots:<?php echo $current_slider_settings['dots_1024']; ?>,

		               infinite: <?php echo $current_slider_settings['infinite_1024']; ?>,

		               mobileFirst:<?php echo $current_slider_settings['showmobilefirst_1024']; ?>
		               
		             }
		           } 
		           /* End Responsive settings for screen 1024*/
		           ,
		           {
		             /* Start Responsive settings for screen 768*/

		             breakpoint: <?php echo $current_slider_settings['screen_width_768']; ?>,

		             settings: {
		               slidesToShow: <?php echo $current_slider_settings['slides_to_show_768']; ?>,

		               slidesToScroll: <?php echo $current_slider_settings['slides_to_scroll_768']; ?>,

		               resondTo:  <?php echo $current_slider_settings['respondto_768']; ?>,

		               unslick:<?php echo $current_slider_settings['hideslider_768']; ?>,

		               dots:<?php echo $current_slider_settings['dots_768']; ?>,

		               <?php if($current_slider_settings['infinite_768'] == 'on'){ ?>

		               		infinite: TRUE, 
		               
		               <?php } ?>
		               
		               mobileFirst:<?php echo $current_slider_settings['showmobilefirst_768']; ?>
		               
		             }
		           }
		            /* End Responsive settings for screen 768*/
		            ,
		           {
		             /* Start Responsive settings for screen 480*/

		             breakpoint: <?php echo $current_slider_settings['screen_width_480']; ?>,

		             settings: {
		               slidesToShow: <?php echo $current_slider_settings['slides_to_show_480']; ?>,

		               slidesToScroll: <?php echo $current_slider_settings['slides_to_scroll_480']; ?>,

		               resondTo:  <?php echo $current_slider_settings['respondto_480']; ?>,

		               unslick:<?php echo $current_slider_settings['hideslider_480']; ?>,

		               dots:<?php echo $current_slider_settings['dots_480']; ?>,

		               infinite: <?php echo $current_slider_settings['infinite_480']; ?>,
		               
		               mobileFirst:<?php echo $current_slider_settings['showmobilefirst_480']; ?>
		               
		             }
		           }  
		           /* End Responsive settings for screen 480*/
		          ,
		       ]
		       /* end Responsive Settings For different screen resolution */
			});

			// main navigation
			jQuery(sliderID + " .slider-for button.slick-next.slick-arrow").append("<img src = '<?php if($current_slider_settings['slider_next_arrow']){ echo $current_slider_settings['slider_next_arrow']; }else{ echo CS_ROOT_URL.'/images/arrows_next.png'; } ?>' />");
			jQuery(sliderID + " .slider-for button.slick-prev.slick-arrow").append("<img src = '<?php if($current_slider_settings['slider_prev_arrow']){ echo $current_slider_settings['slider_prev_arrow']; }else{ echo CS_ROOT_URL.'/images/arrows_prev.png'; } ?>' />");

			//thumbnail arrows
			jQuery(sliderID + " .slider-nav button.slick-next.slick-arrow").append("<img src = '<?php if($current_slider_settings['next_arrow_thunmbnail']){ echo $current_slider_settings['next_arrow_thunmbnail']; }else{ echo CS_ROOT_URL.'/images/next.png';} ?>' />");
			jQuery(sliderID + " .slider-nav button.slick-prev.slick-arrow").append("<img src = '<?php if($current_slider_settings['prev_arrow_thumbnail']) { echo $current_slider_settings['prev_arrow_thumbnail']; }else{ echo CS_ROOT_URL.'/images/prev.png'; } ?>' />");
			 
			
			jQuery(sliderID + ' .slider-nav .slick-slide').closest('.prev-item').removeClass('prev-item');
			jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').addClass('prev-item');

			jQuery(sliderID + ' .slider-nav .slick-slide').closest('.prev-item-second').removeClass('prev-item-second');
			jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').prev('.slick-slide').addClass('prev-item-second');

			jQuery(document).on('click', sliderID + '.slider-nav .slick-slide , '+ sliderID +' .slick-next.slick-arrow , '+ sliderID +' .slick-prev.slick-arrow',function(){
				jQuery(sliderID + ' .slider-nav .slick-slide').closest('.prev-item').removeClass('prev-item');
				
				jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').addClass('prev-item');

				jQuery(sliderID + ' .slider-nav .slick-slide').closest('.prev-item-second').removeClass('prev-item-second');
				jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').prev('.slick-slide').addClass('prev-item-second');

				jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').find('img').css('width','80%');
				jQuery(sliderID + ' .slider-nav .slick-current').prev('.slick-slide').prev('.slick-slide').find('img').css('width','70%');

			});


			// Get the current slide
			// Fixing the first slide caption issue
			var currentSlide = jQuery(sliderID + ' .slider-for').slick('slickCurrentSlide');

			if(currentSlide == 0){
				var currSlideCaption =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + currentSlide + "']").attr('text-style');
				var captionCurrentText =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + currentSlide + "'] "+currSlideCaption);
				
				jQuery(captionCurrentText).css('opacity',0);
				jQuery(captionCurrentText).addClass('animated '+ captionCurrentText);
				jQuery(captionCurrentText).css('opacity',1);
			}


			// On before slide change
			//slickGetOption
			jQuery(sliderID + ' .slider-for').on('beforeChange', function(event, slick, currentSlide, nextSlide){
				var currentSlide = jQuery(sliderID + ' .slider-for').slick('slickCurrentSlide');
				var currCaption =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + nextSlide + "']").attr('text-style');
				var captionText =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + nextSlide + "'] "+currCaption);

				if(captionText !=''){
					jQuery(captionText).css('opacity',0);
					jQuery(captionText).removeAttr('class');
				}

				// getting previous slide to hide the caption bydefault , if clicked on previous

			});

			jQuery(sliderID + ' .slider-for').on('afterChange', function(event, slick, currentSlide, nextSlide){
				var currentSlide = jQuery(sliderID + ' .slider-for').slick('slickCurrentSlide');
				var currCaption =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + currentSlide + "']").attr('text-style');
				var captionAttr =  jQuery(sliderID + ' .slider-for .slick-track').find("[data-slick-index='" + currentSlide + "'] "+currCaption).attr('caption-attr');
				if(currCaption !=''){
					jQuery('div.cyber_slider'+' '+ currCaption).addClass('animated '+ captionAttr);
					jQuery('div.cyber_slider'+' '+ currCaption).css('opacity',1);
				}

			});


		});
	</script>
	<?php
} 
add_action( 'wp_footer', 'cyber_slider_js' );

function get_slides_by_slider_id( $slider_id ){
	global $wpdb;
	
	$sql_query = "SELECT * FROM {$wpdb->prefix}cyberslider_slides WHERE slider_id = {$slider_id}";
	$slides = $wpdb->get_results( $sql_query );
	return $slides;
}

function cyber_slider_shortcode_callback( $atts ){
	global $wpdb;
	
	extract( 
		shortcode_atts( 
			array(
				'id' => ''
			),$atts 
		) 
	);
	$slider_id = $id; // $id is slider_id passed on to shortcode
	$slides = get_slides_by_slider_id( $slider_id );

	cyber_slider_js( $slider_id );
	cyberslider_head_css( $slider_id );
	?>
		<div class = "cyber_slider" id = "cyber_slider_<?php echo $slider_id; ?>">
			<div class="slider-for">
				<?php foreach ( $slides as $slide ):
					$slide_img = unserialize($slide->settings);
					if ( $slide_img['slide-state'] == 'unpublish')
					{
						continue;
					}
					//echo "<pre>";print_r( $slide_img );echo "</pre>";
				?>
					<div <?php if ($slide_img['text_radio'] !='' ) { echo ' text-style='.$slide_img['text_radio']; }else{ echo 'text-style=p';} ?> class="<?php if(isset($slide_img['customclass'])){ echo $slide_img['customclass']; } ?>" id="<?php if (isset($slide_img['customid'])) {echo $slide_img['customid']; } ?>">
						<div class="caption-title" style="">
					      <?php if ($slide_img['text_radio'] !='' ) { echo '<'.$slide_img['text_radio'].' text-style='.$slide_img['text_radio']; }else{ echo '<p ';} ?> caption-attr="<?php if ($slide_img['caption-animation'] !='' ) { echo $slide_img['caption-animation']; } ?> " class="<?php if ($slide_img['caption-animation'] !='' ) { echo $slide_img['caption-animation'].' animated'; } ?>" style="<?php if($slide_img['caption-animation'] !='') echo 'opacity:0;' ; ?> <?php if($slide_img['caption-color'] !=''){ echo 'color:'.$slide_img['caption-color'].';'; }else { echo 'color:black;'; } ?> <?php if($slide_img['text_size'] !=''){ echo 'font-size:'.$slide_img['text_size'].'px;'; } ?> padding:<?php if( $slide_img['padding-top'] !=''){echo $slide_img['padding-top'] ." ";}else { echo "0px";} if( $slide_img['padding-right'] !=''){ echo  $slide_img['padding-right'] ." "; }else { echo " 0px";} if( $slide_img['padding-bottom'] !=''){ echo $slide_img['padding-bottom'] ." "; }else { echo " 0px";} if( $slide_img['padding-left'] !=''){ echo $slide_img['padding-left'] ." "; }else { echo " 0px";}?>; margin:<?php if( $slide_img['margin-top'] !=''){echo $slide_img['margin-top'] ." ";}else { echo "0px";} if( $slide_img['margin-right'] !=''){ echo  $slide_img['margin-right'] ." "; }else { echo " auto";} if( $slide_img['margin-bottom'] !=''){ echo $slide_img['margin-bottom'] ." "; }else { echo " 0px ";} if( $slide_img['margin-left'] !=''){ echo $slide_img['margin-left'] ." "; }else { echo " auto";}?>;">
					       <?php if(isset($slide_img['slide-caption'])) {echo $slide_img['slide-caption']; } ?>
					      <?php if ($slide_img['text_radio'] !='' ) { echo '</'.$slide_img['text_radio'].'>' ; }else{ echo '</p> ';} ?>
					    </div>


						
						<?php if ($slide_img['slide-link'] !='' ) { ?>
							<a href="<?php echo $slide_img['slide-link']; ?>" target="<?php echo $slide_img['slide-linkoption']; ?>">
								<img src = "<?php echo $slide_img['slide_image']; ?>" width = "" />
							</a>
						<?php }else { ?>
							<img src = "<?php echo $slide_img['slide_image']; ?>" width = "" />
						<?php } ?>
					</div>
				<?php endforeach; ?>
			</div>
			<!-- apply if condition for showthumbs & showthumbsNavArrows -->
			<?php
				$table_name = $wpdb->prefix.'cyberslider';
				$slider_name_query = $wpdb->get_row( "SELECT name,settings FROM $table_name WHERE id = $slider_id" );
				$slider_options = $slider_name_query->settings;
				$cyber_slideroption = unserialize($slider_options);
			?>
			<?php if( $cyber_slideroption['showthumbs'] == 'on' ): ?>
				<div class="slider-nav" role="toolbar">
					<?php foreach ( $slides as $slide ):
						$cyber_thumbnails = unserialize($slide->settings);
						if ( $cyber_thumbnails['slide-state'] == 'unpublish')
					{
						continue;
					}
					?>
					<?php if ( $cyber_thumbnails['slide_thumbnail'] !='' ) { ?>
						<div class="abc "><img src = "<?php echo $cyber_thumbnails['slide_thumbnail']; ?>" /></div>
					<?php } else { ?>
						<div class="abc"><img src = "<?php echo $cyber_thumbnails['slide_image']; ?>" /></div>
					
					<?php } endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	<?php
}
add_shortcode('cyberslider','cyber_slider_shortcode_callback');

function cyberslider_head_css( $slider_id = null ){
	global $wpdb;
	
	$table_name = $wpdb->prefix.'cyberslider';
	$slider_name_query = $wpdb->get_row( "SELECT name,settings FROM $table_name WHERE id = $slider_id" );
	$slider_options = $slider_name_query->settings;
	$cyber_slideroption = unserialize( $slider_options );

	//echo "<pre>";print_r($cyber_slideroption);echo "</pre>";
	?>
		<style>
			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list,
			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-track,
			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-slide {
				width : <?php  if($cyber_slideroption['cyber_sliderdim_width']){ echo $cyber_slideroption['cyber_sliderdim_width']; }else{ echo '100%' ; } ?>;
				height : <?php if($cyber_slideroption['cyber_sliderdim_height'] && !is_admin()){ echo $cyber_slideroption['cyber_sliderdim_height']; }else{ if(is_admin()) { echo '600px';}else{ echo '500px'; } } ?>;
			}


			/*#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-list,
			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-list .slick-track,*/
			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-list .slick-slide {
				height : <?php if($cyber_slideroption['slider_thumbnail_height']){ echo $cyber_slideroption['slider_thumbnail_height']; }else{ echo '100px'; } ?> !important;
			}
			
			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-list img {
				width : <?php if($cyber_slideroption['slider_thumbnail_width']){ echo $cyber_slideroption['slider_thumbnail_width']; }else{ echo '100%'; } ?> !important;
				height : <?php if($cyber_slideroption['slider_thumbnail_height']){ echo $cyber_slideroption['slider_thumbnail_height']; }else{ echo '100%'; } ?> !important;
			}
			
			/*#cyber_slider_<?php echo $slider_id ?> button img{
				width : <?php echo $cyber_slideroption['slider_navigation_width'] ?> !important;
				height : <?php echo $cyber_slideroption['slider_navigation_height'] ?> !important;
			}
			*/
			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-slide{
				height: <?php echo $cyber_slideroption['thumbnail_container_height'] ?> !important;
			}

			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-arrow{
				width: <?php echo $cyber_slideroption['slider_navigation_width'] ?> !important;
				height: <?php echo $cyber_slideroption['slider_navigation_height'] ?> !important;
				z-index: 9;
			}

			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-arrow{
				width: <?php echo $cyber_slideroption['thumbnail_navigation_width'] ?> !important;
				height: <?php echo $cyber_slideroption['thumbnail_navigation_height'] ?> !important;
				z-index: 9;
			}

			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-arrow.slick-prev{
				margin-left: 6%;
				top: 50%;
			}

			#cyber_slider_<?php echo $slider_id ?> .slider-for .slick-arrow.slick-next{
				margin-right: 6%;
				top: 50%;
			}


			#cyber_slider_<?php echo $slider_id ?> .slider-nav {
				width: <?php echo $cyber_slideroption['thumb_container_width'] ?> !important;
				margin-left: auto;
				margin-right: auto;

			}


			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-arrow.slick-prev{
				top: 45%;
				margin-left: 4%;
			}

			#cyber_slider_<?php echo $slider_id ?> .slider-nav .slick-arrow.slick-next{
				top: 45%;
				margin-right: 4%;
			}


			/***** Thumb over slider *****/
			<?php if($cyber_slideroption['thumb_position'] == 'thumb_slider_bottom'){ ?>
				#cyber_slider_<?php echo $slider_id ?> .slider-nav.slick-initialized.slick-slider {
				    margin-top: <?php if($cyber_slideroption['slider_bottom_position']){ echo '-'.$cyber_slideroption['slider_bottom_position']; }else{ echo '-15%'; } ?>;
				}

				<?php } ?>
			
			  .widget_cyberslider_widgets ul.slick-dots{
			    margin-left : 0;
			   }
			   
			   .widget_cyberslider_widgets div.widefat .slick-dots li button:before {
			    font-size : 10px;
			   }
			   
			     /* ============ Media Queries ================== */
     
			   /* start media query for screen 481px to 768px */
			    @media screen and (min-width: 481px) and (max-width: 768px){

			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-slide img,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-track,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-slide,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list {
			      height : <?php if($cyber_slideroption['cyber_sliderdim_height']){ echo $cyber_slideroption['cyber_sliderdim_height']; }else{ echo '400px'; } ?> !important;
			        
			         }      
			       }
			    /* end media query for screen 481px to 768px */

			    /* start media query for screen 320px to 480px */
			    @media screen and (min-width: 320px) and (max-width: 480px){
			 
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-slide img,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-track,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list .slick-slide,
			      body #cyber_slider_<?php echo $slider_id ?> .slider-for .slick-list {
			       
			       height : <?php if($cyber_slideroption['cyber_sliderdim_height']){ echo $cyber_slideroption['cyber_sliderdim_height']; }else{ echo '300px'; } ?> !important;
			      }
			      
			    }
			    /* end media query for screen 320px to 480px */
		</style>
	<?php
}
add_action('wp_head', 'cyberslider_head_css');
?>