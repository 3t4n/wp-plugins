

<script>
	jQuery(document).ready(function ($) {
	var carousel = function() {
		$('.testimonial-carousel').owlCarousel({
	    loop: <?php echo esc_js($slide_loop);?>,
	    autoplay: <?php echo esc_js($slide_autoplay);?>,
	    margin: <?php echo esc_js($item_mergin);?>, 
	    animateOut: '<?php echo esc_js($slide_animate_out);?>',
	    animateIn: '<?php echo esc_js($slide_animate_in);?>',
	    nav: <?php echo esc_js($slide_nav);?>,
	    autoplayHoverPause: false,
	    items: <?php echo esc_js ($item_number);?>,
	    navText : ['<i class="<?php echo esc_attr( $settings['slide_left_icon']['value'] ); ?>"></i>','<i class="<?php echo esc_attr( $settings['slide_right_icon']['value'] ); ?>"></i>'],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items: <?php echo esc_js ($item_number);?>,  
	      }
	    }
		});
	};
	carousel();
});
</script>

<div class="testimonial-carousel owl-carousel">
<?php foreach($codex_repeat_slider as $codex_repeat_sliders){
                ?>
    <div>
 
    <section  class="test-slider-one" style="background:url('<?php echo esc_url($codex_repeat_sliders['slider_image']['url']); ?>');  background-repeat: no-repeat; background-size: cover">
        <div class="slider_grid <?php echo esc_html($overlay_bg); ?>" style="align-items: <?php echo esc_attr($vertical_align); ?>; ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<div class="slider_details" style="float: <?php echo esc_attr($horizontal_align); ?>;">
						<div class="testimonial_details" style="text-align: <?php echo esc_attr($box_textaligns); ?>"> 
							<h2>  <?php echo esc_html($codex_repeat_sliders['Slider_name']); ?>  </h2>
							<h3> <?php echo esc_html($codex_repeat_sliders['Slider_desigination']); ?>  </h3>
							<p> <?php echo esc_html($codex_repeat_sliders['Slider_text']); ?>  </p>
							
							<a href="<?php echo esc_url($codex_repeat_sliders['slider_link']); ?>"> <?php echo esc_html($codex_repeat_sliders['slider_btn']); ?> </a>
							
						</div>
					</div>
					</div>
				</div>
			</div>
        </div>
    </section> 
    </div>
     
    <?php

    }

    ?>

      

   
</div>