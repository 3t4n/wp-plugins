<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$settings = $this->get_settings_for_display();
?>
<div class="aefe-tm-3-testimonial-area fix" style="background:<?php print_r($settings['aefe_testmonial_background_color']);?>">
	<div class="aefe-tm-3-testimonial fix">
		<div class="aefe-tm-3-testimonial-slider owl-carousel fix">
			<?php if(!empty($settings['aefe_testimonial_slider_list'])) : foreach($settings['aefe_testimonial_slider_list'] as $testimonial_slider) : ?>
			<!--Single Testimonial-->
			<div class="aefe-tm-3-single-testimonial">
				<div class="aefe-tm-3-testimonila-text fix">
					<div class="aefe-tm-3-testimonial-icon">
						<i class="fa fa-quote-right"></i>
					</div>
					<div class="aefe-tm-3-testimonial-message">
						<p><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_content']); ?></p>						
					</div>
					<div class="aefe-tm-3-testimonial-client-info fix">							
						<div class="aefe-tm-3-testimonial-img">
							<?php if(!empty($testimonial_slider['aefe_testimonial_slider_img']['url'])) : ?>
								<img src="<?php echo esc_url($testimonial_slider['aefe_testimonial_slider_img']['url']); ?>" alt="">
							<?php else : ?>
								<img src="<?php echo AEFE_URL ?>assets/img/single-team-member.png" alt="">
							<?php endif; ?>
						</div>
						<div class="aefe-tm-3-testi_client_name">
							<h2><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_title']); ?></h2>
							<h3><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_subtitle']); ?></h3>
						</div>
					</div>
				</div>
			</div><!--/ Single Testimonial-->
			<?php endforeach; else : ?>              
              <div class="aefe-single-some-review-title fix">
                  <h2><a><?php do_action('aefe_please_add_testimonial');?></a></h2>                  
              </div>
            <?php endif; ?>
		</div>
	</div>
</div><!--/ Testimonial Area-->