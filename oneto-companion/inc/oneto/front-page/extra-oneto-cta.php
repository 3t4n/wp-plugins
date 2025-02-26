<?php 
$oneto_cta_disabled = get_theme_mod('oneto_cta_disabled', true); 

$oneto_cta_four_area_title = get_theme_mod('oneto_cta_four_area_title', 'Grow with Oneto');
$oneto_cta_four_area_des = get_theme_mod('oneto_cta_four_area_des', 'Make the most out of your email marketing campaigns with our AI-powered, customizable, and powerful email marketing tool. Get rid of all complications and grow your business with our easy-to-use features.');
$oneto_cta_four_area_desbottom = get_theme_mod('oneto_cta_four_area_desbottom', 'Already have an account ? <a href="#">Log in</a>');
$oneto_cta_four_button_text_one = get_theme_mod('oneto_cta_four_button_text_one', 'Getting Started');
$oneto_cta_four_button_link_one = get_theme_mod('oneto_cta_four_button_link_one', '#');
$oneto_cta_four_button_text_two = get_theme_mod('oneto_cta_four_button_text_two', 'See pricing');
$oneto_cta_four_button_link_two = get_theme_mod('oneto_cta_four_button_link_two', '#');
$oneto_cta_four_image = get_theme_mod('oneto_cta_four_image', oneto_companion_plugin_url . '/inc/oneto/assets/img/cta-img02.png');
$oneto_cta_four_open_new_tab_disabled = get_theme_mod('oneto_cta_four_open_new_tab_disabled', true);
if($oneto_cta_disabled == true): ?>
	<!--Call to Action Section-->	
	<section id="theme-cta-four" class="theme-cta-four position-relative overflow-hidden text-white bg-primary bg-gradient pt-lg-0 pt-4">
		<div class="container">			
			<div class="row align-items-center">
				<div class="col-lg-7 text-lg-start text-center py-lg-5 pt-5 wow fadeInLeft">
					<?php if($oneto_cta_four_area_title != null): ?>
					<h2 class="theme-section-title mb-4"><?php echo wp_kses_post( $oneto_cta_four_area_title ); ?></h2>
					<?php endif; ?>
                	<?php if($oneto_cta_four_area_des != null): ?>
					<p class="theme-section-des mb-4"><?php echo wp_kses_post( $oneto_cta_four_area_des ); ?></p>
					<?php endif; ?>
					
					<?php if($oneto_cta_four_button_text_one != null || $oneto_cta_four_button_text_two != null): ?>
					<div class="buttons mt-4">
                        <?php if($oneto_cta_four_button_text_one != null): ?>
						<a href="<?php echo esc_url($oneto_cta_four_button_link_one); ?>" <?php if($oneto_cta_four_open_new_tab_disabled == true){?>target="_blank" <?php }?> class="btn btn-secondary"><?php echo esc_html($oneto_cta_four_button_text_one); ?></a>
						<?php endif; ?>
						<?php if($oneto_cta_four_button_text_two != null): ?>
						<a href="<?php echo esc_url($oneto_cta_four_button_link_two); ?>" <?php if($oneto_cta_four_open_new_tab_disabled == true){?>target="_blank" <?php }?> class="btn btn-white btn-outline-white"><?php echo esc_html($oneto_cta_four_button_text_two); ?></a>
						<?php endif; ?>
                    </div>
                	<?php endif; ?>

					<?php if($oneto_cta_four_area_desbottom != null): ?>
					<p class="theme-section-desbottom mt-3"><?php echo wp_kses_post( $oneto_cta_four_area_desbottom ); ?></p>
					<?php endif; ?>
				</div>
				<?php if( $oneto_cta_four_image != null ) : ?>
				<div class="col-lg-5 text-lg-end text-center mt-lg-5 mt-5 pt-lg-2 cta-image wow fadeInRight">
					<img class="pt-lg-5 pt-0" src="<?php echo esc_url( $oneto_cta_four_image ); ?>" alt="<?php echo esc_attr($oneto_cta_four_area_title); ?>" style="filter: drop-shadow(-10px -3px 5px rgba(0, 0, 0, 0.38));">
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!--/End of Call to Action Section-->
<?php endif; ?>	